<?php

/**
 * This file is part of Spatial.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\Spatial;

include_once __DIR__ . '/Config/Constants.php';

class Spatial
{
    // Detect a format given a value. This function is meant to be SPEEDY.
    // It could make a mistake in XML detection if you are mixing or using namespaces in weird ways (ie, KML inside an RSS feed)
    public function detectFormat(&$input)
    {
        $mem = fopen('php://memory', 'r+b');
        fwrite($mem, (string) $input, 11); // Write 11 bytes - we can detect the vast majority of formats in the first 11 bytes
        fseek($mem, 0);

        $bytes = unpack('c*', fread($mem, 11));

        // If bytes is empty, then we were passed empty input
        if (empty($bytes)) {
            return false;
        }

        // First char is a tab, space or carriage-return. trim it and try again
        if ($bytes[1] === 9 || $bytes[1] === 10 || $bytes[1] === 32) {
            $ltinput = ltrim($input);

            return $this->detectFormat($ltinput);
        }

        // Detect WKB or EWKB -- first byte is 1 (little endian indicator)
        if ($bytes[1] === 1) {
            // If SRID byte is TRUE (1), it's EWKB
            if ($bytes[5]) {
                return 'ewkb';
            }

            return 'wkb';
        }

        // Detect HEX encoded WKB or EWKB (PostGIS format) -- first byte is 48, second byte is 49 (hex '01' => first-byte = 1)
        if ($bytes[1] === 48 && $bytes[2] === 49) {
            // The shortest possible WKB string (LINESTRING EMPTY) is 18 hex-chars (9 encoded bytes) long
            // This differentiates it from a geohash, which is always shorter than 18 characters.
            if (strlen($input) >= 18) {
                //@@TODO: Differentiate between EWKB and WKB -- check hex-char 10 or 11 (SRID bool indicator at encoded byte 5)
                return 'ewkb:1';
            }
        }

        // Detect GeoJSON - first char starts with {
        if ($bytes[1] === 123) {
            return 'json';
        }

        // Detect EWKT - first char is S
        if ($bytes[1] === 83) {
            return 'ewkt';
        }

        // Detect WKT - first char starts with P (80), L (76), M (77), or G (71)
        $wkt_chars = [80, 76, 77, 71];
        if (in_array($bytes[1], $wkt_chars, true)) {
            return 'wkt';
        }

        // Detect XML -- first char is <
        if ($bytes[1] === 60) {
            // grab the first 256 characters
            $string = substr($input, 0, 256);
            if (strpos($string, '<kml') !== false) {
                return 'kml';
            }
            if (strpos($string, '<coordinate') !== false) {
                return 'kml';
            }
            if (strpos($string, '<gpx') !== false) {
                return 'gpx';
            }
            if (strpos($string, '<georss') !== false) {
                return 'georss';
            }
            if (strpos($string, '<rss') !== false) {
                return 'georss';
            }
            if (strpos($string, '<feed') !== false) {
                return 'georss';
            }
        }

        // We need an 8 byte string for geohash and unpacked WKB / WKT
        fseek($mem, 0);
        $string = trim(fread($mem, 8));

        // Detect geohash - geohash ONLY contains lowercase chars and numerics
        preg_match('/[a-z0-9]+/', $string, $matches);
        if ($matches[0] === $string) {
            return 'geohash';
        }

        // What do you get when you cross an elephant with a rhino?
        // http://youtu.be/RCBn5J83Poc
        return false;
    }

    // Return Spatial Version
    public function getVersion()
    {
        return SPATIAL_VERSION;
    }
}

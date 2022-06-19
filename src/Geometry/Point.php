<?php

/**
 * This file is part of Spatial.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\Spatial\Geometry;

use atsanna\Spatial\Exceptions\GeometryException as Exception;

/**
 * Point: The most basic geometry type. All other geometries
 * are built out of Points.
 */
class Point extends Geometry
{
    public $coords       = [2];
    protected $geom_type = 'Point';
    protected $dimension = 2;

    /**
     * Constructor
     *
     * @param numeric $x The x coordinate (or longitude)
     * @param numeric $y The y coordinate (or latitude)
     * @param numeric $z The z coordinate (or altitude) - optional
     */
    public function __construct($x = null, $y = null, $z = null)
    {

    // Check if it's an empty point
        if ($x === null && $y === null) {
            $this->coords    = [null, null];
            $this->dimension = 0;

            return;
        }

        // Basic validation on x and y
        if (! is_numeric($x) || ! is_numeric($y)) {
            throw new Exception('Cannot construct Point. x and y should be numeric');
        }

        // Check to see if this is a 3D point
        if ($z !== null) {
            if (! is_numeric($z)) {
                throw new Exception('Cannot construct Point. z should be numeric');
            }
            $this->dimension = 3;
        }

        // Convert to floatval in case they are passed in as a string or integer etc.
        $x = (float) $x;
        $y = (float) $y;
        $z = (float) $z;

        // Add poitional elements
        if ($this->dimension === 2) {
            $this->coords = [$x, $y];
        }
        if ($this->dimension === 3) {
            $this->coords = [$x, $y, $z];
        }
    }

    /**
     * Get X (longitude) coordinate
     *
     * @return float The X coordinate
     */
    public function x()
    {
        return $this->coords[0];
    }

    /**
     * Returns Y (latitude) coordinate
     *
     * @return float The Y coordinate
     */
    public function y()
    {
        return $this->coords[1];
    }

    /**
     * Returns Z (altitude) coordinate
     *
     * @return float|null The Z coordinate or NULL is not a 3D point
     */
    public function z()
    {
        if ($this->dimension === 3) {
            return $this->coords[2];
        }

        return null;
    }

    /**
     * Author : Adam Cherti
     * inverts x and y coordinates
     * Useful with old applications still using lng lat
     *
     * @return void
     * */
    public function invertxy()
    {
        $x               = $this->coords[0];
        $this->coords[0] = $this->coords[1];
        $this->coords[1] = $x;
    }

    // A point's centroid is itself
    public function centroid()
    {
        return $this;
    }

    public function area()
    {
        return 0;
    }
}

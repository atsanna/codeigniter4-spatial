<?php

/**
 * This file is part of Spatial.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\Spatial\Postgre;

use CodeIgniter\Database\Postgre\Forge as BaseForge;

/**
 * Forge for Postgre
 */
class Forge extends BaseForge
{
    /**
     * Create the postgis extension
     *
     * @var string
     */
    protected $createPostisExtensionStr = 'CREATE EXTENSION postgis';

    /**
     * Create the postgis extension, if it doesn't already exist statement
     *
     * @var string
     */
    protected $createPostisExtensionIfNotExistStr = 'CREATE CREATE EXTENSION IF NOT EXISTS postgis';

    /**
     * Drop the postgis extension
     *
     * @var string
     */
    protected $dropPostisExtensionStr = 'DROP EXTENSION postgis';

    /**
     * Drop the postgis extension, if it exists
     *
     * @var string
     */
    protected $dropPostisExtensionIfExistStr = 'DROP EXTENSION IF EXISTS postgis';

    /**
     * Allowed geometry type
     *
     * @var array
     */
    protected $allowed_geom_types = ['GEOGRAPHY', 'GEOMETRY'];

    /**
     * Column type
     *
     * @var array
     */
    protected $columnType = [
        'POINT',
        'POINTZ',
        'MULTIPOINT',
        'POLYGON',
        'MULTIPOLYGON',
        'MULTIPOLYGONZ',
        'LINESTRING',
        'LINESTRINGZ',
        'MULTILINESTRING',
    ];

    /**
     * Add Geometry Field
     *
     * @param string $field
     * @param string $type
     * @param int    $srID
     *
     * @return Forge
     */
    public function addGeometryField($field = 'the_geom', $type = 'POINT', $srID = 4326)
    {
        $type = strtoupper($type);

        if (is_string($field) && in_array($type, $this->columnType, true)) {
            $this->addField([
                $field => [
                    'type' => 'geometry(' . $type . ',' . $srID . ')',
                ],
            ]);
        }

        return $this;
    }
}

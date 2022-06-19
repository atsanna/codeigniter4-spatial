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

/**
 * Geometry abstract class
 */
abstract class Geometry
{
    protected $geos;
    protected $srid;
    protected $geom_type;

    // Abtract: Standard
    // -----------------
    abstract public function area();

    abstract public function centroid();

    abstract public function y();

    abstract public function x();

    // Public: Standard -- Common to all geometries
    // --------------------------------------------
    public function SRID()
    {
        return $this->srid;
    }

    // Public: Aliases
    // ---------------
    public function getCentroid()
    {
        return $this->centroid();
    }

    public function getArea()
    {
        return $this->area();
    }

    public function getX()
    {
        return $this->x();
    }

    public function getY()
    {
        return $this->y();
    }
}

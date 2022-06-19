<?php

/**
 * This file is part of Spatial.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\Spatial\SpatialPostgre;

use CodeIgniter\Database\Postgre\Builder as BaseBuilder;

/**
 * Builder for Postgre
 */
class Builder extends BaseBuilder
{
    public function withDistance(string $column, string $geometryOrColumn, string $alias = 'distance'): self
    {
        return $this;
    }

    public function whereDistance(string $column, string $geometryOrColumn, string $operator, float $value): self
    {
        return $this;
    }

    public function orderByDistance(string $column, string $geometryOrColumn, string $direction = 'asc'): self
    {
        return $this;
    }

    public function withDistanceSphere(string $column, string $geometryOrColumn, string $alias = 'distance'): self
    {
        return $this;
    }

    public function whereDistanceSphere(string $column, string $geometryOrColumn, string $operator, float $value): self
    {
        return $this;
    }

    public function orderByDistanceSphere(string $column, string $geometryOrColumn, string $direction = 'asc'): self
    {
        return $this;
    }

    public function whereWithin(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereContains(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereTouches(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereIntersects(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereCrosses(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereDisjoint(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereOverlaps(string $column, string $geometryOrColumn): self
    {
        return $this;
    }

    public function whereEquals(string $column, string $geometryOrColumn): self
    {
        return $this;
    }
}

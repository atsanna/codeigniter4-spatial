<?php

/**
 * This file is part of Spatial.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\Spatial\Config;

use atsanna\Spatial\Spatial;
use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /**
     * Core utility class for Spatial's system.
     *
     * @return mixed|Spatial
     */
    public static function spatial(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('spatial');
        }

        return new Spatial();
    }
}

<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:18
 */



use Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface;

interface HasPermissionInterface {
    /**
     * Returns an instance of the PermissionCheckerInterface
     *
     * @return PermissionCheckerInterface
     */
    public function permissionChecker();
}
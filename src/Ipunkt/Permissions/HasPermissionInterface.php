<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:18
 */



use Ipunkt\Permissions\PermissionChecker\PermissionCheckerInterface;

/**
 * Interface HasPermissionInterface
 * @package Ipunkt\Permissions
 * 
 * An object implementing this interface can have its permissions checked.
 * 
 * @see HasPermissionTrait
 */
interface HasPermissionInterface {
    /**
     * Returns an instance of the PermissionCheckerInterface
     *
     * @return PermissionCheckerInterface
     */
    public function permissionChecker();
}
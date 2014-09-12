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
 * Implementing this interface allows the class to be a target resource of the can function.
 * e.g. $user->can('update', $classImplementingHasPermissionInterface); is now possible
 * 
 * It does not actualy decide whether or not the caller is allowed to perform the action. It just
 * Provides a class implementing PermissionCheckerInterface which then decides.
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
<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:19
 */

namespace Ipunkt\Permissions\PermissionChecker;


use Ipunkt\Permissions\CanInterface;
use Ipunkt\Permissions\HasPermissionInterface;

/**
 * Interface PermissionCheckerInterface
 * @package Ipunkt\Permissions\PermissionChecker
 * 
 * A class implementing this interface is used to do the actual permission checking on a
 * $user->can('do something', $onSomething) call.
 */
interface PermissionCheckerInterface {
    /**
     * Check if the given User has permission to do action on this objects assigned model
     *
     * @param UserInterface $user
     * @param string $action
     * @return boolean
     */
    function checkPermission(CanInterface $user, $action);
}
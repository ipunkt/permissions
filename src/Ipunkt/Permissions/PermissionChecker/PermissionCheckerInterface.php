<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:19
 */

namespace Ipunkt\Permissions\PermissionChecker;


use Ipunkt\Permissions\CanInterface;

/**
 * Interface PermissionCheckerInterface
 * @package Ipunkt\Permissions\PermissionChecker
 * 
 * A PermissionChecker checks if a given object has permission on a model assigned to the checker.
 * 
 * @see PermissionChecker
 */
interface PermissionCheckerInterface {
    /**
     * Check if the given User has permission to do action on this objects assigned model
     *
     * @param UserInterface $object
     * @param string $action
     * @return boolean
     */
    function checkPermission(CanInterface $object, $action);
}
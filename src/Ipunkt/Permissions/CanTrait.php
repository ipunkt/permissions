<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:52
 */



/**
 * Class CanTrait
 * @package Ipunkt\Permissions
 *
 * This is the default implementation of the can CanInterface.
 * It asks the $resource if we are allowed to do $action on it.
 */
trait CanTrait {

    /**
     * @param HasPermissionInterface $object
     * @param string $action
     * @return boolean
     */
    public function can($action, HasPermissionInterface $resource) {
        $has_permission = false;

        $checker = $resource->permissionChecker();
        $has_permission = $checker->checkPermission($this, $action);

        return $has_permission;
    }
}
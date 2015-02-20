<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:52
 */
use Ipunkt\Permissions\Exceptions\PermissionDeniedException;


/**
 * Class CanTrait
 * @package Ipunkt\Permissions
 *
 * Provides the `can` function to check permissions for an object
 */
trait CanTrait {

    /**
     * Checks if this model has permission to do $action on $object.
     * Returns true if it has, or false if it does not.
     *
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

    public function verify($action, HasPermissionInterface $resource) {
        if(!$this->can($action, $resource))
            throw new PermissionDeniedException($action, get_class($resource));
    }
}
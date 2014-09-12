<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 26.05.14
 * Time: 10:54
 */


/**
 * Interface CanInterface
 * @package Ipunkt\Permissions
 */
interface CanInterface {
    /**
     * Check if if this object can do $action ond $object.
     * Returns true if this object can, or false if it cannot.
     *
     * @param string $action
     * @param HasPermissionInterface $ressource
     * @return boolean
     */
    public function can($action, $object);
}
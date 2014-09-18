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
 * 
 * 'User' side of permission checking
 */
interface CanInterface {
    /**
     * get the identifier for this user
     * 
     * @return mixed
     */
    function getId();

    /**
     * Check if if this object can do $action ond $object.
     * Returns true if this object can, or false if it cannot.
     *
     * @param string $action
     * @param HasPermissionInterface $object
     * @return boolean
     */
    function can($action, HasPermissionInterface $object);
}

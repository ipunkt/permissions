<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 26.05.14
 * Time: 10:54
 */
use Ipunkt\Permissions\Exceptions\PermissionDeniedException;


/**
 * Interface CanInterface
 * @package Ipunkt\Permissions
 *
 * 'User' side of permission checking
 */
interface CanInterface {
    /**
     * get the identifier for this object
     *
     * @return mixed
     */
    function getId();

    /**
     * Check if if this object can do $action on $object.
     * Returns true if this object can, or false if it cannot.
     *
     * @param string $action
     * @param HasPermissionInterface $resource
     * @return boolean
     */
    function can($action, HasPermissionInterface $resource);

    /**
     * Check if if this object can do $action on $object.
     * If not, then a PermissionDeniedException is thrown
     *
     * @param $action
     * @param HasPermissionInterface $resource
     * @throws PermissionDeniedException
     */
    function verify($action, HasPermissionInterface $resource);
}

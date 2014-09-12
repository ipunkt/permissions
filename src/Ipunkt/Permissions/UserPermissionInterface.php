<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 26.05.14
 * Time: 10:54
 */


/**
 * Interface UserWithRolesInterface
 * @package Ipunkt\Permissions
 */
interface UserPermissionInterface {
    /**
     * @param $action
     * @param HasPermissionInterface $ressource
     * @param $id
     * @return mixed
     */
    function canObject($action, HasPermissionInterface $ressource);

    /**
     * @param $action
     * @param $ressource
     * @param $id
     * @return mixed
     */
    function canString($action, $ressource, $id);

    /**
     * Checks if the User this function is evoked on has the permission to do $action on the $ressource with $id.
     * $ressource can given as string or as an Object implementing HasPermissionInterface. If a HasPermissionInterface
     * is given then its permissionChecker() is used to check for permissions.
     *
     * @param string $action
     * @param string|HasPermissionInterface $ressource
     * @param string|null $id
     * @return boolean
     */
    public function can($action, $ressource, $id = null);
}
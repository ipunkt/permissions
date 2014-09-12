<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:19
 */

namespace Ipunkt\Permissions\PermissionChecker;


use Illuminate\Auth\UserInterface;
use Ipunkt\Permissions\HasPermissionInterface;

interface PermissionCheckerInterface {
    /**
     * Check if the given User has permission to do action on this objects assigned model
     *
     * @param UserInterface $user
     * @param string $action
     * @return boolean
     */
    function checkPermission(UserInterface $user, $action);
}
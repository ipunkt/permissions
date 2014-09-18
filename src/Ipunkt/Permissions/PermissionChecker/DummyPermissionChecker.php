<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:38
 */

namespace Ipunkt\Permissions\PermissionChecker;
use Ipunkt\Permissions\CanInterface;


/**
 * Class DummyPermissionChecker
 * @package Ipunkt\Permissions\PermissionChecker
 * 
 * This permission checker allows everyone to do everything.
 */
class DummyPermissionChecker extends PermissionChecker {
    /**
     * Check if the given User has permission to do action on this objects assigned model
     * Dummy implementation: Returns false to everything.
     *
     * @param UserInterface $user
     * @param string $action
     * @return boolean
     */
    public function checkPermission(Caninterface $user, $action)
    {
        return true;
    }

} 
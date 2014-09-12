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
 * This is a dummy which provides a default for the PermissionCheckerInterface in the IoC container.
 * Create your own PermissionChecker to replace it or use a more useful default from Packages like ipunkt/roles
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
<?php namespace Ipunkt\Permissions;
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:52
 */

use Ipunkt\Auth\models\UserInterface;


/**
 * Class UserPermissionTrait
 * @package Ipunkt\Simpleauth
 *
 * This trait offers the default implementation of the can function.
 */
trait UserPermissionTrait {

    /**
     * @param HasPermissionInterface $object
     * @param string $action
     * @return boolean
     */
    public function can($action, $ressource, $id = null) {
        $has_permission = false;

        /**
         * @var UserInterface $this
         */
        if($ressource instanceof HasPermissionInterface) {
            $has_permission = $this->canObject($action, $ressource);
        } else {
            $has_permission = $this->canString($action, $ressource, $id);
        }

        return $has_permission;
    }

    protected function canObject($action, HasPermissionInterface $ressource) {
        $has_permission = false;

        $checker = $ressource->permissionChecker();
        if( $this->isSuperuser()  )
            $has_permission = true;
        else
            $has_permission = $checker->checkPermission($this, $action);

        return $has_permission;
    }
}
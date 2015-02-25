<?php namespace Ipunkt\Permissions\Exceptions;

use RuntimeException;

/**
 * Class PermissionDeniedException
 * @package Ipunkt\Permissions\Exceptions
 */
class PermissionDeniedException extends RuntimeException {
	public function __construct($action, $resourceName) {
		parent::__construct("Permission denied to do $action on $resourceName");
	}
}
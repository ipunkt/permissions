permissions
===========

Check your permissions with a simple 1-liner: $user->can('do something', $onAnObject)

SimplePermissions provides a simple way to deal with dynamic permissions.

It provides 2 ways to ask for permissions
1. By string:
$user->can('container.action');
Or, if you want to check permission for a specific row of a table
$user->can('container.id.action');
2. By model
$user->can('action', $container_model);

By model is the recommended way, for now both will be supported.
By string might get removed in the future.

Usage:
Have your user model implement CanInterface and use CanTrait.

The model side of permission checking is similar to laracasts/presenter if you are familiar with it:

Have your models you want to check permission on implement HasPermissionInterface and use HasPermissionTrait.
The will now use the default PermissionChecker to check permissions.

There are 2 ways to change the PermissionChecker to use:

1. Change the default PermissionChecker by binding a class implementing PermissionCheckerInterface(or extending
PermissionChecker) in the IoC to  'Ipunkt\Simplepermission\PermissionChecker\PermissionCheckerInterface'
2. Have your model bring its own PermissionChecker by setting 'protected $permission_checker_path' to the classpath
of the checker you want to use

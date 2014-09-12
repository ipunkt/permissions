permissions
===========

Check your permissions with a simple 1-liner: $user->can('do something', $onAnObject)

# About
This package extracts your permission checking code both from your controllers AND your models.
To achieve this we use an approach similar to laracasts/presenter: instead of having the model test the permission and
have the permission code mingle with the model code we have it bring a new object, a PermissionChecker, which does all
the checking for it.

# Install

## Installation

Add to your composer.json following lines

	"require": {
		"ipunkt/permissions": "~1.0"
	}
	
## Configuration

Add 

    'Ipunkt\Permissions\PermissionsServiceProvider'
    
to your service provider list

## Use

Have your Usermodel implement CanInterface and use CanTrait  
Have your Models implement HasPermissionInterface and use HasPermissionTrait


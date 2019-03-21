# WP Jobvite

This plugin offers easy way (wrapper functions) to get jobs from your jobvite account.


## Installing

Download the plugin and extract in your /wp-content/plugins/ directory. After that go in you Plugins page in Admin Dashboard
and activate the plugin. A new menu should show in the Dashboard where you can enter your jobvite info.


## How to use it

Once you have it installed and connected with Jobvite these are the helper functions you can use directly into your template files:

* jv()->api->get_locations(string $args)  -> Get locations you have added in jobvite
* jv()->api->get_jobs(string $args)       -> Get jobs added in jobvite
* jv()->api->get_departments(string $args)-> Get departments addd in jobvite
* jv()->api->get_categories(string $args) -> Get categories added in jobvite

```
$args is a string with query params that can be used to filter the request. 
For more info on the query params refer to the jobvite API documentation.
``` 
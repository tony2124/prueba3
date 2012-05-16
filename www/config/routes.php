<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

$routes = array(
	0 => array(
			"pattern"	  => "/^test/",
			"application" => "admin",
			"controller"  => "admin",
			"method"	  => "test",
			"params"	  => array("Hi", "Goodbye")
		),
);
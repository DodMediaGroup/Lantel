<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	/******* DEVELOPMENT *******/
	'connectionString' => 'mysql:host=localhost;dbname=dodmedia_bd_lantel',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	
	/******* TESTING ********/
	/*'connectionString' => 'mysql:host=localhost;dbname=dodmedia_bd_lantel',
	'emulatePrepare' => true,
	'username' => 'dodmedia_sergio',
	'password' => ')$f)@J&Iv[I&',
	'charset' => 'utf8',*/
	
);
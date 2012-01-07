<?php if ( !defined( 'KISS' ) ) exit;
	
	//===============================================
	// Default settings.
	//===============================================

	// Path to system folder, with trailing slash
	$system_path = APP_ROOT.'/system/'; 

	// Path to app folder, with trailing slash
	$application_folder = APP_ROOT.'/app/';

	// Path to view directory, with trailing slash
	$view_path = $application_folder.'views/';

	// Path to controller directory, with trailing slash
	$controller_path = $application_folder.'controllers/';

	// Relative to the webroot, with trailing slash
	$subdirectory = '/';

	// HTTP host, no trailing slash
	$webhost = 'http://'.$_SERVER[ 'HTTP_HOST' ];

	// Routes
	$routes = array();

	// PDO Datasource name
	$pdo_dsn = 'sqlite:'.$application_folder.'db/db.sqlite';

	// Timezone See http://www.php.net/manual/en/timezones.php for valid values
	$timezone = 'Europe/Brussels';
	
	//===============================================
	// Globals
	//===============================================
	$GLOBALS['sitename']='Default Site';
	$GLOBALS['version'] = '0.7.0';
	
	define('_DEBUG', FALSE );
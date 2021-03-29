<?php
ini_set( "display_errors", true );
// date_default_timezone_set( "Africa/Lagos" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=mcpdp" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
/*define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "admin123" );*/
require( CLASS_PATH . "/Members.php" );
require( CLASS_PATH . "/Articles.php" );
require( CLASS_PATH . "/Emails.php" );
require( CLASS_PATH . "/Miscs.php" );
require( CLASS_PATH . "/Workshops.php" );


function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

//set_exception_handler( 'handleException' );
?>

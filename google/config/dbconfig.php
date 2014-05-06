<?php
define ( 'DB_SERVER', 'localhost' );
define ( 'DB_USERNAME', 'root' );
define ( 'DB_PASSWORD', 'root123' );
define ( 'DB_DATABASE', 'login_db' );

define ( 'USERS_TABLE_NAME', 'users' );

$connection = mysql_connect ( DB_SERVER, DB_USERNAME, DB_PASSWORD ) or die ( mysql_error () );
$database = mysql_select_db ( DB_DATABASE ) or die ( mysql_error () );

?>

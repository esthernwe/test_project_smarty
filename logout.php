<?PHP
require_once ("libs/config.php");
require_once ("libs/smarty_setup.php");

$fgmembersite->LogOut ();
if (array_key_exists ( "logout", $_GET )) {
	session_start ();
	unset ( $_SESSION ['id'] );
	unset ( $_SESSION ['username'] );
	unset ( $_SESSION ['oauth_provider'] );
	session_destroy ();
	header ( "location: index.php" );
}
$smarty->display('templates/logout.tpl');
?>

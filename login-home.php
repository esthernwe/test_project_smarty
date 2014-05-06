<?PHP
require_once ("libs/config.php");
require_once ("libs/smarty_setup.php");

if (! $fgmembersite->CheckLogin ()) {
	$fgmembersite->RedirectToURL ( "login.php" );
	exit ();
}

$userfullname = $fgmembersite->UserFullName();
$userrole=$fgmembersite->UserRole();

if ($userrole == 1)
	$role= "You are logging As Administrator";
else
	$role = "You are logging As Worker";



$smarty->assign('userfullname',$userfullname);
$smarty->assign('role',$role);
$smarty->display('templates/login-home.tpl');
?>

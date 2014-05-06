<?PHP
require_once ("libs/config.php");
require_once ("libs/smarty_setup.php");


if (isset ( $_POST ['submitted'] )) {
	if ($fgmembersite->Login ()) {
		
		$userrole=$fgmembersite->UserRole();
		
		if ($userrole == 1)
			$fgmembersite->RedirectToURL ( "admin-home.php" );
		else
			$fgmembersite->RedirectToURL ( "login-home.php" );
		
		
		
		
	}
}

session_start ();
if (isset ( $_SESSION ['id'] )) {
	
	header ( "location: google/show_data.php" );
}

if (array_key_exists ( "login", $_GET )) {
	$oauth_provider = $_GET ['oauth_provider'];
	if ($oauth_provider == 'google') {
		header ( "Location: google/google_actions.php" );
	}
}
session_destroy ();
$selfscript = $fgmembersite->GetSelfScript();
$errmsg =$fgmembersite->GetErrorMessage();
$display =$fgmembersite->SafeDisplay('username');

//$smarty -> assign('message',$message);
$smarty->assign('selfscript',$selfscript);
$smarty->assign('errmsg',$errmsg);
$smarty->assign('display',$display);
$smarty->display('templates/login.tpl');
?>

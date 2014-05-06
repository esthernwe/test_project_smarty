<?php
require_once ("libs/config.php");
require_once ("libs/smarty_setup.php");

if (isset ( $_POST ['submitted'] )) {
	if ($fgmembersite->RegisterUser ()) {
		$fgmembersite->RedirectToURL ( "thank-you.php" );
				
		
	}
}


$selfscript = $fgmembersite->GetSelfScript();
$errmsg =$fgmembersite->GetErrorMessage();
$display =$fgmembersite->SafeDisplay('username');
$inputname =$fgmembersite->GetSpamTrapInputName();
$display_email =$fgmembersite->SafeDisplay('email');

$smarty->assign('selfscript',$selfscript);
$smarty->assign('errmsg',$errmsg);
$smarty->assign('display',$display);
$smarty->assign('inputname',$inputname);
$smarty->assign('display_email',$display_email);
$smarty->display('templates/register.tpl');

?>
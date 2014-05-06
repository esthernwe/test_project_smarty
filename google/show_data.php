<?php

session_start ();

require('../smarty/libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir == './templates';
$smarty->config_dir == './config';
$smarty->cache_dir == './cache';
$smarty->compile_dir == './templates_c';
// Always place this code at the top of the Page

if (! isset ( $_SESSION ['id'] )) {
	// Redirection to login page gmail or facebook
	header ( "location: index.php" );
}




$id = $_SESSION ['id'];
$username = $_SESSION ['username'];
$email = $_SESSION ['email'];
$oauth = $_SESSION ['oauth_provider'];
$smarty->assign('id',$id);
$smarty->assign('username',$username);
$smarty->assign('email',$email);
$smarty->assign('oauth',$oauth);
$smarty->display('../templates/google_show_data.tpl');

//echo '<br/>Logout from <a href="../logout.php?logout">' . $_SESSION ['oauth_provider'] . '</a>';
?>

<?php
include 'library.php';

require ('../smarty/libs/Smarty.class.php');
$smarty = new Smarty ();
$smarty ->template_dir == './templates';
$smarty ->config_dir == './config';
$smarty ->cache_dir == './cache';
$smarty ->compile_dir == './templates_c';
$action = $_REQUEST ["action"];
switch ($action) {
	case "fblogin" :
		
		require_once ('inc/facebook.php');
		$appid = "512803428830335";
		$appsecret = "6bf7775eb87fe9e2a556fca830ea0314";
		$facebook = new Facebook ( array (
				'appId' => $appid,
				'secret' => $appsecret,
				'cookie' => TRUE 
		) );
		$fbuser = $facebook->getUser ();
		
		if ($fbuser) {
			try {
				$user_profile = $facebook->api ( '/me' );
			} catch ( Exception $e ) {
				echo $e->getMessage ();
				exit ();
			}
			
			$user_fbid = $fbuser;
			$user_email = $user_profile ["email"];
			$user_fnmae = $user_profile ["first_name"];
			$user_provider = "Facebook";
			$user_image = "https://graph.facebook.com/" . $user_fbid . "/picture?type=large";
			
			$dateTime = new DateTime ( "now", new DateTimeZone ( 'Asia/Rangoon' ) );
			$mysqldate = $dateTime->format ( "Y-m-d H:i:s" );
			
			$sql = mysql_query ( "SELECT email FROM users WHERE email = '$user_email'" );
			
			$numrow = mysql_num_rows ( $sql );
			if ($numrow == 0) {
				
				mysql_query ( "INSERT INTO users ( username, email, oauth_provider,admin,login_dt) VALUES ( '$user_fnmae', '$user_email', '$user_provider',0,'$mysqldate')" );
			}
			
			/*
			 * $check_select = mysql_num_rows ( mysql_query ( "SELECT * FROM users WHERE email = '$user_email'" ) ); mysql_query ( "INSERT INTO users ( username, email, oauth_provider) VALUES ( '$user_fnmae', '$user_email', '$user_provider')" ); if($check_select > 0)mysql_query ( "INSERT INTO users ( username, email, oauth_provider) VALUES ( '$user_fnmae', '$user_email', $user_provider)" );
			 */
		}
		
		$smarty->assign ( 'user_fnmae', $user_fnmae );
		$smarty->assign ( 'user_fbid', $user_fbid );
		$smarty->assign ( 'user_email', $user_email );
		$smarty->assign ( 'user_image', $user_image );
		$smarty->display ( '../templates/facebook_action.tpl' );
}
?>

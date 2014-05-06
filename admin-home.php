<?PHP
require_once ("libs/config.php");
require_once ("libs/smarty_setup.php");
require_once ("facebook/library.php");

/**
 * admin-home *
 */

if (! $fgmembersite->CheckLogin ()) {
	$fgmembersite->RedirectToURL ( "login.php" );
	exit ();
}

$userfullname = $fgmembersite->UserFullName ();
$userrole = $fgmembersite->UserRole ();

if ($userrole == 1)
	$role = "You are logging As Administrator";
else
	$role = "You are logging As Worker";

/**
 * admin-home *
 */

if (isset ( $_POST ['search'] )) {
	$maker = mysql_real_escape_string ( $_POST ['Make'] );
	$keyword = mysql_escape_string ( trim ( $_POST ['keyword'] ) );
	echo $maker;
	
	switch ($maker) {
		case '0' :
			$sql = "SELECT * FROM users";
			break;
		case '1' :
			$sql = "SELECT * FROM users where username='$keyword'";
			break;
		case '2' :
			$sql = "SELECT * FROM users where email='$keyword'";
			break;
		case '3' :
			$sql = "SELECT * FROM users where oauth_provider='$keyword'";
			break;
		
		default :
			$sql = "SELECT * FROM users";
	}
} 

else {
	$sql = "SELECT * FROM users";
}

$rows = array ();
$result = mysql_query ( $sql );
$count = mysql_num_rows ( $result );

if ($count == 0) {
	echo '<h3><font color= red>There is no search result</font></h3>';
}

while ( $row = mysql_fetch_array ( $result ) ) {
	
	$rows [] = $row;
}

// var_dump($rows);
/**
 * smarty assign and display*
 */
$smarty->assign ( 'userfullname', $userfullname );
$smarty->assign ( 'rows', $rows );
$smarty->assign ( 'role', $role );
$smarty->display ( 'templates/admin-home.tpl' )?>




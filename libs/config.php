<?PHP
require_once ("fg_membersite.php");
$fgmembersite = new FGMembersite ();
$fgmembersite->InitDB ( 'localhost', 'root', 'root123', 'login_db', 'users' );
?>

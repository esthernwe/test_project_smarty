<?php session_start();
include 'config/functions.php';



if (!empty($_GET['openid_ext1_value_firstname']) && !empty($_GET['openid_ext1_value_lastname']) && !empty($_GET['openid_ext1_value_email'])) {    
    $username = $_GET['openid_ext1_value_firstname'] . $_GET['openid_ext1_value_lastname'];
    $email = $_GET['openid_ext1_value_email'];

    $user = new User();
    $userdata = $user->checkUserGoogle($uid, 'Google', $username, $email);
    if(!empty($userdata)) {
        session_start();
        $_SESSION['id'] = $userdata['id'];
        $_SESSION['password'] = $uid;
        $_SESSION['username'] = $userdata['username'];
        $_SESSION['email'] = $userdata['email'];
        $_SESSION['oauth_provider'] = $userdata['oauth_provider'];
        
		echo"<script language='javascript'>window.location='show_data.php'</script>;";
      
    } 

}
?>

<?php /* Smarty version Smarty-3.1.18, created on 2014-04-11 05:51:47
         compiled from "templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69955343872cd9dee3-19429833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64dc0f53a42be5b3a7d2ba591c653348a6eeab8a' => 
    array (
      0 => 'templates\\login.tpl',
      1 => 1397195479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69955343872cd9dee3-19429833',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5343872ce19ee9_42512146',
  'variables' => 
  array (
    'selfscript' => 0,
    'errmsg' => 0,
    'display' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5343872ce19ee9_42512146')) {function content_5343872ce19ee9_42512146($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Login</title>
<link rel="STYLESHEET" type="text/css" href="style/fg_project.css" />

<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '512803428830335', // replace your app id here
	channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			window.location.href = "facebook/facebook_actions.php?action=fblogin";
		}
	}, {scope: 'email,user_likes'});
}
function GMLogin(){
	FB.login(function(response){
		if(response.authResponse){
			window.location.href = "google/google_actions.php";
		}
	}, {scope: 'email,user_likes'});
}
</script>

</head>
<body>

	<!-- Form Code Start -->
	<div id='fg_project'>
		<form id='login' action=<?php echo $_smarty_tpl->tpl_vars['selfscript']->value;?>
 method='post' accept-charset='UTF-8'>

			<table border="0" style="width: 500px">
				<tr>
					<th>
						<fieldset class="left">
							<legend>Login</legend>

							<input type='hidden' name='submitted' id='submitted' value='1' />

							<div class='short_explanation'>* required fields</div>

							<div>
								<span class='error'><?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>
</span>
							</div>
							<div class='container'>
								<label for='username'>UserName*:</label><br /> <input
									type='text' name='username' id='username'
									value='<?php echo $_smarty_tpl->tpl_vars['display']->value;?>
'
									maxlength="50" /><br /> <span id='login_username_errorloc'
									class='error'></span>
							</div>
							<div class='container'>
								<label for='password'>Password*:</label><br /> <input
									type='password' name='password' id='password' maxlength="50" /><br />
								<span id='login_password_errorloc' class='error'></span>
							</div>

							<div class='container'>
								<input type='submit' name='Submit' value='Submit' />
							</div>

							<div class='short_explanation'>
								<a href='register.php'>Register</a>
							</div>



						</fieldset>
					</th>
					<th>or</th>
					<th><fieldset class="right">
							<img src="images/facebook-connect.png" alt="Fb Connect"
								title="facebook" width="155" onclick="FBLogin();" /> <a
								href="?login&oauth_provider=google"><img
								src="images/login_with_google.png" title="google" /></a><br />
						</fieldset></th>
				</tr>


			</table>
		</form>
		
		<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether(); 

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>

	</div>
	<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html><?php }} ?>

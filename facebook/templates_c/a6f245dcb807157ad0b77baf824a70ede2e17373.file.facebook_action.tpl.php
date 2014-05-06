<?php /* Smarty version Smarty-3.1.18, created on 2014-04-22 01:37:37
         compiled from "..\templates\facebook_action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:268705343c27072e384-10515671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6f245dcb807157ad0b77baf824a70ede2e17373' => 
    array (
      0 => '..\\templates\\facebook_action.tpl',
      1 => 1397195479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268705343c27072e384-10515671',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5343c270899023_42586131',
  'variables' => 
  array (
    'user_fnmae' => 0,
    'user_email' => 0,
    'user_fbid' => 0,
    'user_image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5343c270899023_42586131')) {function content_5343c270899023_42586131($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST</title>

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

function FBLogout(){
	FB.logout(function(response) {
		window.location.href = "../index.php";
		
			 
		
		});
}
</script>

<style>
body {
	font-family: Arial;
	color: #333;
	font-size: 14px;
}

.mytable {
	margin: 0 auto;
	width: 600px;
	border: 2px dashed #17A3F7;
}

a {
	color: #0C92BE;
	cursor: pointer;
}
</style>
</head>

<body>
	<h1>Login with facebook</h1>
	<h3>here is the user details, for more details</h3>
	<table class="mytable">
		<tr>
			<td colspan="2" align="left"><h2>Hi <?php echo $_smarty_tpl->tpl_vars['user_fnmae']->value;?>
</h2> <b>Email:<?php echo $_smarty_tpl->tpl_vars['user_email']->value;?>
</b>
			</td>
		</tr>
		<tr>
			<td><b>Fb id:<?php echo $_smarty_tpl->tpl_vars['user_fbid']->value;?>
</b></td>
			<td valign="top" rowspan="2"><img src="<?php echo $_smarty_tpl->tpl_vars['user_image']->value;?>
"
				height="100" /></td>
		</tr>
		<tr>
			<td><b><a href="../logout.php?logout">Logout</a></b></td>		

		</tr>
	</table>
</body>
</html><?php }} ?>

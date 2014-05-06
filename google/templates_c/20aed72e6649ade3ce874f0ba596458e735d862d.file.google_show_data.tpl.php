<?php /* Smarty version Smarty-3.1.18, created on 2014-04-11 05:53:17
         compiled from "..\templates\google_show_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307905343c86c4ab5e2-24417096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20aed72e6649ade3ce874f0ba596458e735d862d' => 
    array (
      0 => '..\\templates\\google_show_data.tpl',
      1 => 1397195479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307905343c86c4ab5e2-24417096',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5343c86c5204a9_06529164',
  'variables' => 
  array (
    'username' => 0,
    'email' => 0,
    'oauth' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5343c86c5204a9_06529164')) {function content_5343c86c5204a9_06529164($_smarty_tpl) {?><html>
<head>
<meta charset="UTF-8">
<link href="google.ico" rel="shortcut icon">
<title>OpenID Testing</title>
<style>
div.code {
	font-family: Courier, monospace, Courier New;
	font-size: 13px;
	color: #000;
	border: dashed 2px #dedede;
	padding: 10px;
	line-height: 16px;
	word-wrap: break-word;
}
</style>
</head>
<body style="margin: 0px auto; width: 800px; text-align: left; font-family: arial">

<h1>Login with google  </h1>
<h3>here is the user details, for more details </h3>
<br/>Name : <?php echo $_smarty_tpl->tpl_vars['username']->value;?>

<br/>Email : <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

<br/>You are login with : <?php echo $_smarty_tpl->tpl_vars['oauth']->value;?>

<br>
<br/>Logout from <a href="../logout.php?logout"><?php echo $_smarty_tpl->tpl_vars['oauth']->value;?>
</a>



</body>
</html><?php }} ?>

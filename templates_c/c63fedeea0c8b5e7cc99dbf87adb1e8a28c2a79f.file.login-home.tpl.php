<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 03:31:00
         compiled from "templates\login-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190805343a4e35e4793-12044590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c63fedeea0c8b5e7cc99dbf87adb1e8a28c2a79f' => 
    array (
      0 => 'templates\\login-home.tpl',
      1 => 1397195479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190805343a4e35e4793-12044590',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5343a4e3654528_65551430',
  'variables' => 
  array (
    'userfullname' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5343a4e3654528_65551430')) {function content_5343a4e3654528_65551430($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Home page</title>

</head>
<body>
	<div id='fg_membersite_content'>
		<h2> Home Page</h2>
Welcome back <?php echo $_smarty_tpl->tpl_vars['userfullname']->value;?>
.</br>

<?php echo $_smarty_tpl->tpl_vars['role']->value;?>



		<p>
			<a href='logout.php'>Logout</a>
		</p>
	</div>
</body>
</html>
<?php }} ?>

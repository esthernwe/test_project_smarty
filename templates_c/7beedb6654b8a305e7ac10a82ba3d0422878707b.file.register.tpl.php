<?php /* Smarty version Smarty-3.1.18, created on 2014-04-22 01:37:28
         compiled from "templates\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187095343a204a7fa63-06825016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7beedb6654b8a305e7ac10a82ba3d0422878707b' => 
    array (
      0 => 'templates\\register.tpl',
      1 => 1397195479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187095343a204a7fa63-06825016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5343a204b1c4d6_91094799',
  'variables' => 
  array (
    'selfscript' => 0,
    'inputname' => 0,
    'errmsg' => 0,
    'display_email' => 0,
    'display' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5343a204b1c4d6_91094799')) {function content_5343a204b1c4d6_91094799($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Registeration Form</title>
<link rel="STYLESHEET" type="text/css" href="style/fg_project.css" />


</head>
<body>

	<!-- Form Code Start -->
	<div id='fg_project'>
		<form id='register'
			action= <?php echo $_smarty_tpl->tpl_vars['selfscript']->value;?>
 method='post'
			accept-charset='UTF-8'>
			<fieldset>
				<legend>Register</legend>

				<input type='hidden' name='submitted' id='submitted' value='1' />

				<div class='short_explanation'>* required fields</div>
				<input type='text' class='spmhidip'
					name=<?php echo $_smarty_tpl->tpl_vars['inputname']->value;?>
 />

				<div>
					<span class='error'><?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>
</span>
				</div>
				<div class='container'>
					<label for='email'>Email Address*:</label><br /> 
					<input type='text' name='email' id='email' maxlength="50" value='<?php echo $_smarty_tpl->tpl_vars['display_email']->value;?>
'  /><br /> <span id='register_email_errorloc'
						class='error'></span>
				</div>
				<div class='container'>
					<label for='username'>UserName*:</label><br /> 
					<input type='text' name='username' id='username' maxlength="50"	value= '<?php echo $_smarty_tpl->tpl_vars['display']->value;?>
'  /><br /> <span id='register_username_errorloc'
						class='error'></span>
				</div>
				<div class='container' style='height: 80px;'>
					<label for='password'>Password*:</label><br />
					<div id='thepwddiv'></div>

					<input type='password' name='password' id='password' maxlength="50" />

					<div id='register_password_errorloc' class='error'
						style='clear: both'></div>
				</div>
				

				<div class='container'>
					<input type='submit' name='Submit' value='Submit' />
				</div>
				<div class='short_explanation'>
					<a href='index.php'>Home</a>
				</div>
	
	</div>
	</fieldset>
	</form>
	<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

	<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>

	<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html><?php }} ?>

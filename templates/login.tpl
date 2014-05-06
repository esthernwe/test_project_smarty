<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Login</title>
<link rel="STYLESHEET" type="text/css" href="style/fg_project.css" />
{literal}
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
{/literal}
</head>
<body>

	<!-- Form Code Start -->
	<div id='fg_project'>
		<form id='login' action={$selfscript} method='post' accept-charset='UTF-8'>

			<table border="0" style="width: 500px">
				<tr>
					<th>
						<fieldset class="left">
							<legend>Login</legend>

							<input type='hidden' name='submitted' id='submitted' value='1' />

							<div class='short_explanation'>* required fields</div>

							<div>
								<span class='error'>{$errmsg}</span>
							</div>
							<div class='container'>
								<label for='username'>UserName*:</label><br /> <input
									type='text' name='username' id='username'
									value='{$display}'
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
		{literal}
		<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether(); 

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
{/literal}
	</div>
	<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>
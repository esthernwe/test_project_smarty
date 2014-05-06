<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST</title>
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

function FBLogout(){
	FB.logout(function(response) {
		window.location.href = "../index.php";
		
			 
		
		});
}
</script>
{/literal}
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
			<td colspan="2" align="left"><h2>Hi {$user_fnmae}</h2> <b>Email:{$user_email}</b>
			</td>
		</tr>
		<tr>
			<td><b>Fb id:{$user_fbid}</b></td>
			<td valign="top" rowspan="2"><img src="{$user_image}"
				height="100" /></td>
		</tr>
		<tr>
			<td><b><a href="../logout.php?logout">Logout</a></b></td>		

		</tr>
	</table>
</body>
</html>
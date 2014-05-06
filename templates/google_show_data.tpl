<html>
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
<br/>Name : {$username}
<br/>Email : {$email}
<br/>You are login with : {$oauth}
<br>
<br/>Logout from <a href="../logout.php?logout">{$oauth}</a>



</body>
</html>
<?PHP
require_once ("formvalidator.php");
class FGMembersite {
	var $admin_email;
	var $from_address;
	var $username;
	var $pwd;
	var $database;
	var $tablename;
	var $connection;
	var $rand_key;
	var $error_message;
	
	// -----Initialization -------
	function FGMembersite() {
		$this->sitename = 'YourWebsiteName.com';
		$this->rand_key = '0iQx5oBk66oVZep';
	}
	function InitDB($host, $uname, $pwd, $database, $tablename) {
		$this->db_host = $host;
		$this->username = $uname;
		$this->pwd = $pwd;
		$this->database = $database;
		$this->tablename = $tablename;
	}
	function SetAdminEmail($email) {
		$this->admin_email = $email;
	}
	function SetWebsiteName($sitename) {
		$this->sitename = $sitename;
	}
	function SetRandomKey($key) {
		$this->rand_key = $key;
	}
	
	// -------Main Operations ----------------------
	function RegisterUser() {
		if (! isset ( $_POST ['submitted'] )) {
			return false;
		}
		
		$formvars = array ();
		
		if (! $this->ValidateRegistrationSubmission ()) {
			return false;
		}
		
		$this->CollectRegistrationSubmission ( $formvars );
		
		if (! $this->SaveToDatabase ( $formvars )) {
			return false;
		}
		
		$this->SendAdminIntimationEmail ( $formvars );
		
		return true;
	}
	function ConfirmUser() {
		if (empty ( $_GET ['code'] ) || strlen ( $_GET ['code'] ) <= 10) {
			$this->HandleError ( "Please provide the confirm code" );
			return false;
		}
		$user_rec = array ();
		if (! $this->UpdateDBRecForConfirmation ( $user_rec )) {
			return false;
		}
		
		$this->SendUserWelcomeEmail ( $user_rec );
		
		$this->SendAdminIntimationOnRegComplete ( $user_rec );
		
		return true;
	}
	function Login() {
		if (empty ( $_POST ['username'] )) {
			$this->HandleError ( "UserName is empty!" );
			return false;
		}
		
		if (empty ( $_POST ['password'] )) {
			$this->HandleError ( "Password is empty!" );
			return false;
		}
		
		$username = trim ( $_POST ['username'] );
		$password = trim ( $_POST ['password'] );
		
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		if (! $this->CheckLoginInDB ( $username, $password )) {
			return false;
		}
		
		$_SESSION [$this->GetLoginSessionVar ()] = $username;
		
		return true;
	}
	function CheckLogin() {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		
		$sessionvar = $this->GetLoginSessionVar ();
		
		if (empty ( $_SESSION [$sessionvar] )) {
			return false;
		}
		return true;
	}
	function UserFullName() {
		return isset ( $_SESSION ['name_of_user'] ) ? $_SESSION ['name_of_user'] : '';
	}
	function UserEmail() {
		return isset ( $_SESSION ['email_of_user'] ) ? $_SESSION ['email_of_user'] : '';
	}
	function UserRole() {
		return isset ( $_SESSION ['role'] ) ? $_SESSION ['role'] : '';
	}
	function LogOut() {
		session_start ();
		
		$sessionvar = $this->GetLoginSessionVar ();
		
		$_SESSION [$sessionvar] = NULL;
		
		unset ( $_SESSION [$sessionvar] );
	}
	function EmailResetPasswordLink() {
		if (empty ( $_POST ['email'] )) {
			$this->HandleError ( "Email is empty!" );
			return false;
		}
		$user_rec = array ();
		if (false === $this->GetUserFromEmail ( $_POST ['email'], $user_rec )) {
			return false;
		}
		if (false === $this->SendResetPasswordLink ( $user_rec )) {
			return false;
		}
		return true;
	}
	function GetSelfScript() {
		return htmlentities ( $_SERVER ['PHP_SELF'] );
	}
	function SafeDisplay($value_name) {
		if (empty ( $_POST [$value_name] )) {
			return '';
		}
		return htmlentities ( $_POST [$value_name] );
	}
	function RedirectToURL($url) {
		header ( "Location: $url" );
		exit ();
	}
	function GetSpamTrapInputName() {
		return 'sp' . md5 ( 'KHGdnbvsgst' . $this->rand_key );
	}
	function GetErrorMessage() {
		if (empty ( $this->error_message )) {
			return '';
		}
		$errormsg = nl2br ( htmlentities ( $this->error_message ) );
		return $errormsg;
	}
	// -------Private Helper functions-----------
	function HandleError($err) {
		$this->error_message .= $err . "\r\n";
	}
	function HandleDBError($err) {
		$this->HandleError ( $err . "\r\n mysqlerror:" . mysql_error () );
	}
	function GetFromAddress() {
		if (! empty ( $this->from_address )) {
			return $this->from_address;
		}
		
		$host = $_SERVER ['SERVER_NAME'];
		
		$from = "nobody@$host";
		return $from;
	}
	function GetLoginSessionVar() {
		$retvar = md5 ( $this->rand_key );
		$retvar = 'usr_' . substr ( $retvar, 0, 10 );
		return $retvar;
	}
	function CheckLoginInDB($username, $password) {
		if (! $this->DBLogin ()) {
			$this->HandleError ( "Database login failed!" );
			return false;
		}
		$username = $this->SanitizeForSQL ( $username );
		$pwdmd5 = md5 ( $password );
		
		$qry = "Select username,email,admin from $this->tablename where username='$username' and password='$pwdmd5' ";
		
		$result = mysql_query ( $qry, $this->connection );
		
		if (! $result || mysql_num_rows ( $result ) <= 0) {
			$this->HandleError ( "Error logging in. The username or password does not match" );
			return false;
		}
		
		$row = mysql_fetch_assoc ( $result );
		
		$_SESSION ['name_of_user'] = $username;
		$_SESSION ['email_of_user'] = $row ['email'];
		$_SESSION ['role'] = $row ['admin'];
		
		return true;
	}
	function GetUserFromEmail($email, &$user_rec) {
		if (! $this->DBLogin ()) {
			$this->HandleError ( "Database login failed!" );
			return false;
		}
		$email = $this->SanitizeForSQL ( $email );
		
		$result = mysql_query ( "Select * from $this->tablename where email='$email'", $this->connection );
		
		if (! $result || mysql_num_rows ( $result ) <= 0) {
			$this->HandleError ( "There is no user with email: $email" );
			return false;
		}
		$user_rec = mysql_fetch_assoc ( $result );
		
		return true;
	}
	function SendUserWelcomeEmail(&$user_rec) {
		$mailer = new PHPMailer ();
		
		$mailer->CharSet = 'utf-8';
		
		$mailer->AddAddress ( $user_rec ['email'], $user_rec ['name'] );
		
		$mailer->Subject = "Welcome to " . $this->sitename;
		
		$mailer->From = $this->GetFromAddress ();
		
		$mailer->Body = "Hello " . $user_rec ['name'] . "\r\n\r\n" . "Welcome! Your registration  with " . $this->sitename . " is completed.\r\n" . "\r\n" . "Regards,\r\n" . "Webmaster\r\n" . $this->sitename;
		
		if (! $mailer->Send ()) {
			$this->HandleError ( "Failed sending user welcome email." );
			return false;
		}
		return true;
	}
	function SendAdminIntimationOnRegComplete(&$user_rec) {
		if (empty ( $this->admin_email )) {
			return false;
		}
		$mailer = new PHPMailer ();
		
		$mailer->CharSet = 'utf-8';
		
		$mailer->AddAddress ( $this->admin_email );
		
		$mailer->Subject = "Registration Completed: " . $user_rec ['name'];
		
		$mailer->From = $this->GetFromAddress ();
		
		$mailer->Body = "A new user registered at " . $this->sitename . "\r\n" . "Name: " . $user_rec ['name'] . "\r\n" . "Email address: " . $user_rec ['email'] . "\r\n";
		
		if (! $mailer->Send ()) {
			return false;
		}
		return true;
	}
	function ValidateRegistrationSubmission() {
		// This is a hidden input field. Humans won't fill this field.
		if (! empty ( $_POST [$this->GetSpamTrapInputName ()] )) {
			// The proper error is not given intentionally
			$this->HandleError ( "Automated submission prevention: case 2 failed" );
			return false;
		}
		
		$validator = new FormValidator ();
		$validator->addValidation ( "email", "email", "The input for Email should be a valid email value" );
		$validator->addValidation ( "email", "req", "Please fill in Email" );
		$validator->addValidation ( "username", "req", "Please fill in UserName" );
		$validator->addValidation ( "password", "req", "Please fill in Password" );
		
		if (! $validator->ValidateForm ()) {
			$error = '';
			$error_hash = $validator->GetErrors ();
			foreach ( $error_hash as $inpname => $inp_err ) {
				$error .= $inpname . ':' . $inp_err . "\n";
			}
			$this->HandleError ( $error );
			return false;
		}
		return true;
	}
	function CollectRegistrationSubmission(&$formvars) {
		$formvars ['email'] = $this->Sanitize ( $_POST ['email'] );
		$formvars ['username'] = $this->Sanitize ( $_POST ['username'] );
		$formvars ['password'] = $this->Sanitize ( $_POST ['password'] );
		$formvars ['admin'] = isset ( $_POST ["admin"] );
	}
	function GetAbsoluteURLFolder() {
		$scriptFolder = (isset ( $_SERVER ['HTTPS'] ) && ($_SERVER ['HTTPS'] == 'on')) ? 'https://' : 'http://';
		$scriptFolder .= $_SERVER ['HTTP_HOST'] . dirname ( $_SERVER ['REQUEST_URI'] );
		return $scriptFolder;
	}
	function SendAdminIntimationEmail(&$formvars) {
		if (empty ( $this->admin_email )) {
			return false;
		}
		$mailer = new PHPMailer ();
		
		$mailer->CharSet = 'utf-8';
		
		$mailer->AddAddress ( $this->admin_email );
		
		$mailer->Subject = "New registration: " . $formvars ['name'];
		
		$mailer->From = $this->GetFromAddress ();
		
		$mailer->Body = "A new user registered at " . $this->sitename . "\r\n" . "Name: " . $formvars ['name'] . "\r\n" . "Email address: " . $formvars ['email'] . "\r\n" . "UserName: " . $formvars ['username'];
		
		if (! $mailer->Send ()) {
			return false;
		}
		return true;
	}
	function SaveToDatabase(&$formvars) {
		if (! $this->DBLogin ()) {
			$this->HandleError ( "Database login failed!" );
			return false;
		}
		if (! $this->Ensuretable ()) {
			return false;
		}
		if (! $this->IsFieldUnique ( $formvars, 'email' )) {
			$this->HandleError ( "This email is already registered" );
			return false;
		}
		
		if (! $this->IsFieldUnique ( $formvars, 'username' )) {
			$this->HandleError ( "This UserName is already used. Please try another username" );
			return false;
		}
		if (! $this->InsertIntoDB ( $formvars )) {
			$this->HandleError ( "Inserting to Database failed!" );
			return false;
		}
		return true;
	}
	function IsFieldUnique($formvars, $fieldname) {
		$field_val = $this->SanitizeForSQL ( $formvars [$fieldname] );
		$qry = "select username from $this->tablename where $fieldname='" . $field_val . "'";
		$result = mysql_query ( $qry, $this->connection );
		if ($result && mysql_num_rows ( $result ) > 0) {
			return false;
		}
		return true;
	}
	function DBLogin() {
		$this->connection = mysql_connect ( $this->db_host, $this->username, $this->pwd );
		
		if (! $this->connection) {
			$this->HandleDBError ( "Database Login failed! Please make sure that the DB login credentials provided are correct" );
			return false;
		}
		if (! mysql_select_db ( $this->database, $this->connection )) {
			$this->HandleDBError ( 'Failed to select database: ' . $this->database . ' Please make sure that the database name provided is correct' );
			return false;
		}
		if (! mysql_query ( "SET NAMES 'UTF8'", $this->connection )) {
			$this->HandleDBError ( 'Error setting utf8 encoding' );
			return false;
		}
		return true;
	}
	function Ensuretable() {
		$result = mysql_query ( "SHOW COLUMNS FROM $this->tablename" );
		if (! $result || mysql_num_rows ( $result ) <= 0) {
			return $this->CreateTable ();
		}
		return true;
	}
	function CreateTable() {
		$qry = "Create Table $this->tablename (" . "id INT(11) NOT NULL AUTO_INCREMENT ," . "email VARCHAR( 64 ) NOT NULL ," . "username VARCHAR( 16 ) NOT NULL ," . "password VARCHAR( 32 )," . "oauth_provider VARCHAR(32) ," . "admin Int(10)," . "login_dt datetime,". "PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ";
		
		if (! mysql_query ( $qry, $this->connection )) {
			$this->HandleDBError ( "Error creating the table \nquery was\n $qry" );
			return false;
		}
		return true;
	}
	function InsertIntoDB(&$formvars) {
		$_admin = isset ( $_POST ["admin"] );
		$dateTime = new DateTime("now", new DateTimeZone('Asia/Rangoon'));
		$mysqldate = $dateTime->format("Y-m-d H:i:s");
		
		$insert_query = 'insert into ' . $this->tablename . '(
                email,
                username,
                password,
               oauth_provider,
        		admin,
				login_dt
                )
                values
                (
                "' . $this->SanitizeForSQL ( $formvars ['email'] ) . '",
                "' . $this->SanitizeForSQL ( $formvars ['username'] ) . '",
                "' . md5 ( $formvars ['password'] ) . '",
                "Database","' . $_admin . '","' . $mysqldate . '"		
                )';
		if (! mysql_query ( $insert_query, $this->connection )) {
			$this->HandleDBError ( "Error inserting data to the table\nquery:$insert_query" );
			return false;
		}
		return true;
	}
	function MakeConfirmationMd5($email) {
		$randno1 = rand ();
		$randno2 = rand ();
		return md5 ( $email . $this->rand_key . $randno1 . '' . $randno2 );
	}
	function SanitizeForSQL($str) {
		if (function_exists ( "mysql_real_escape_string" )) {
			$ret_str = mysql_real_escape_string ( $str );
		} else {
			$ret_str = addslashes ( $str );
		}
		return $ret_str;
	}
	function Sanitize($str, $remove_nl = true) {
		$str = $this->StripSlashes ( $str );
		
		if ($remove_nl) {
			$injections = array (
					'/(\n+)/i',
					'/(\r+)/i',
					'/(\t+)/i',
					'/(%0A+)/i',
					'/(%0D+)/i',
					'/(%08+)/i',
					'/(%09+)/i' 
			);
			$str = preg_replace ( $injections, '', $str );
		}
		
		return $str;
	}
	function StripSlashes($str) {
		if (get_magic_quotes_gpc ()) {
			$str = stripslashes ( $str );
		}
		return $str;
	}
}
?>
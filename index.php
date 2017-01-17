<?
// start secure session
include_once 'includes/sec_session.php';
include_once 'includes/check_WA_login.php';
sec_session_start();

// set the domain of your processing application including protocol
$processing_domain = "https://{YOUR_PROCESSING_DOMAIN}";

// returns to this page once logged in
$login_request = "{$processing_domain}{$_SERVER['PHP_SELF']}"; 
$login_url = "{$processing_domain}/sso/wa-login.php";
$query_string = $_SERVER['QUERY_STRING'];

// check for login
if (check_WA_login($login_url,$login_request,$query_string)) { ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SSO Sample Application</title>
</head>

<body>
You are logged in through the single sign-on service!<br>
<br>

<?

echo "first_name: ".$_SESSION['first_name']."<br>";
echo "last_name: ".$_SESSION['last_name']."<br>";
echo "email: ".$_SESSION['email']."<br>";
echo "display_name: ".$_SESSION['display_name']."<br>";
echo "organization_name: ".$_SESSION['organization_name']."<br>";
echo "membership_level: ".$_SESSION['membership_level']."<br>";
echo "membership_status: ".$_SESSION['membership_status']."<br>";
echo "member_id: ".$_SESSION['member_id']."<br>"; 
echo "is_admin: ".$_SESSION['is_admin']."<br>";
echo "tos_accepted: ".$_SESSION['tos_accepted']."<br>";
echo "WA_Login_Verified: ".$_SESSION['WA_Login_Verified']."<br>";
echo "timestamp: ".$_SESSION['timestamp']->format('Y-m-d H:i:s');

?>

</body>
</html>

<? 
} else { 
	session_destroy(); 
	die("Authorization failed.");
}
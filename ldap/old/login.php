<?php
if ($_POST['doLogin']=='Login')
{
$username = $_POST["username"];
$password = $_POST["password"];

$ldaphost = 'ldap://192.168.0.5';
$ldapport = 389;

//$ipaddressreceived = $_POST["ipaddress"];
$ldapcontext = "ou=people,dc=sahyadrischool,dc=org";

$ldapconn = ldap_connect($ldaphost, $ldapport)
or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

$ldaprdn = "uid=$username,$ldapcontext";

function authenticate($username, $password) {

        global $ldapconn;
        global $username;
        global $password;
        global $ldaprdn;
        // Prevent null binding
        if ($username === NULL || $password === NULL || empty($username) || empty($password)) 
        { 
        return false;
        } 
        
        // Bind as the user        
        $ldapbind = ldap_bind($ldapconn, $ldaprdn, $password);;
        if ($ldapbind) 
        {  
        $ret = true;
        } 
       else 
        {
        $ret = false;
        }
        return $ret;
        }

$authUser=authenticate($username, $password);

if ($authUser == true) {

    session_start();
    $_SESSION["username"]=$username;

    $_COOKIE['username']=$username;

    header("Location: index.php");
    exit;

    } 
   else
    {
    echo "Login failed: Incorrect user name, password, or rights";
    }
   }
  ?>

<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
    User: <input type="text" name="username" /><br />
    Password: <input type="password" name="password" /><br />
    <input type="submit" name="doLogin" value="Login" />
</form>

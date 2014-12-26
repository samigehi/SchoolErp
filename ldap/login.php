<?php

if (!isset($_POST['doLogin']))
{
$_POST['doLogin'] = '';
$mess_1 = '';
}

if ($_POST['doLogin'] == 'Login')
{
$mess_1 = '';
$user_name = $_POST['user_name'];
$password = $_POST['password'];

$ldaphost = 'ldap://192.168.0.5';
$ldapport = 389;

//$ipaddressreceived = $_POST["ipaddress"];
$ldapcontext = "ou=people,dc=sahyadrischool,dc=org";

$ldapconn = ldap_connect($ldaphost, $ldapport)
or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

$ldaprdn = "uid=$user_name,$ldapcontext";

function authenticate($user_name, $password) {

        global $ldapconn;
        global $user_name;
        global $password;
        global $ldaprdn;
        // Prevent null binding
        if ($user_name === NULL || $password === NULL || empty($user_name) || empty($password)) 
        { 
        return false;
        } 
        
        // Bind as the user        
        $ldapbind = ldap_bind($ldapconn, $ldaprdn, $password);
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

$authUser=authenticate($user_name, $password);

if ($authUser == true) {
// this sets session and logs user in  
session_start();        
session_regenerate_id (true); //prevent against session fixation attacks.
// this sets variables in the session 
$_SESSION['user_id']= $user_name;
$_SESSION['user_name']= $user_name;
$_SESSION['start_time'] = time(); 

	$filter="uid=$user_name";
	$justthese = array("gidnumber");
	$sr=ldap_search($ldapconn, $ldaprdn, $filter, $justthese);
	$info = ldap_get_entries($ldapconn, $sr);

	// Active Directory user group
	$ldap_teachers_group = "1002";
 
	// Active Directory manager group
	$ldap_manager_group = "1000";

	// Active Directory student group
	$ldap_students_group = "1003";

	for ($i=0; $i<$info["count"]; $i++){
	$group = $info[$i]["gidnumber"][0];
 
	if ($group == $ldap_manager_group) 
	{$access = 1;} 
 
        if ($group == $ldap_teachers_group)
	{$access = 2;}

	if ($group == $ldap_students_group) 
	{$access = 3;}

	$_SESSION['user_level']= $access;	

}
header("Location: index.php");
 } 
else
 {
//echo "Login failed: Incorrect user name, password, or rights";
$mess_1 = 1; 
}	
}
?>
<html>
<head>
<title>Intranet Login...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="../login/js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="../login/js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#logForm").validate();
  });
  </script>
<link href="styles.css" rel="stylesheet" type="text/css">

</head>

<body style="background-color:#DEEDFF;">
&nbsp; <a href="http://intranet" title="Go to Intranet"><font color="darkred">Intranet</font></a>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="300" valign="top"><p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Users Login</h3>  
	  
      <form action="login.php" method="post" name="logForm" id="logForm" >
        <table width="50%" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="28%"> &nbsp; &nbsp; Username :</td>
            <td width="72%"><input name="user_name" type="text" class="required" id="txtbox" size="20"></td>
          </tr>
          <tr> 
            <td> &nbsp; &nbsp; Password :</td>
            <td><input name="password" type="password" class="required password" id="txtbox" size="20"></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center">
                <input name="remember" type="checkbox" id="remember" value="1">
                Remember me</div></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doLogin" type="submit" id="doLogin3" value="Login">
                </p>


              </div></td>
  
          </tr>
        </table>
	</table>
        </form> 
<table align="center">
<tr>
<td colspan="2" align="center" style="font-size:12px; color:red;"> 
<?php 
//Incorrect username or password//
if($mess_1 == 1)
{
echo "Login failed: Incorrect username or password"; 
}

//session timed out message//
$mess = isset($_REQUEST['mess']) ? $_REQUEST['mess'] : null;
if($mess == 'expired') 
{
echo 'Your session has timed out'; 
}
?>
</td>
</tr>
</table>

<div style="margin-top:50px;">
<div style="font-size:10px; margin:auto auto auto auto; width:50%; color:gray; border:1px solid lightgray; background-color:white; padding:8px;">

<p align=center style="font-size:11px; color:darkblue;"><u>Sahyadri School - Intranet Applications</u></p><p>
This is a restricted network. Use of this network, its equipment, and resources is monitored at all times and requires explicit permission from the network administrator.<br>

<a href="mailto:sahyadri@mail">
<font size="1" color="darkred"> Contact </font>
</a>  administrator to report a problem or if you have forgotten your password. This login interface is available only for teachers and staff.</p></div>   
	
</div>
</body>
</html>

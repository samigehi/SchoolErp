<?php
if (!isset($_SESSION)) {
session_start();
}

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'nspasarkar' || $_SESSION['user_name'] == 'smanjani') 
{
	include ('connect.php');
	if(isset($_POST['update'])) {	
	$id = $_POST['id'];
	$status = $_POST['status'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$updated_by = $_SESSION['user_name'];
	$update_date = date ('Y-m-d');
	$fromdate= $_POST['fromdate'];
	$todate= $_POST['todate'];
	$find= $_POST['find'];
	$field= $_POST['field'];

$update = "UPDATE gathering_2014 SET status = '".$status."', updated_by='".$updated_by."', update_date='".$update_date."' WHERE id = '$id'";

$rsUpdate = mysql_query($update);

if($rsUpdate)
        {
        header ("Location: search.php?fromdate=$fromdate&todate=$todate&find=$find&field=$field");

if($status == 'Confirmed'){
$body = <<<END
<html>
<head>
<title>Study Centre Gathering-2014</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<div style="align:center; width:700px; padding:20px; border:1px solid lightgray; border-radius:15px;">
<p align=left>Dear $name, </p><p><font style="color:#556B2F; font-size:13px;">Your registration has been confirmed for the KFI Annual Gathering 2014!</p>
<p>This is an automated response to indicate that your payment has been received. Please do not reply to this mail.<br>If you have more queries, please contact us.</p><br>

<p align='left'>
<b>Office</b><br>
Krishnamurti Study centre<br>
Sahyadri, Pune
</p>
</div>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);
require_once('mailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//***************************************** SMTP SERVER SETTING **************************************// 
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "sahyadri.server@gmail.com";  // GMAIL username
$mail->Password   = "omnamo123";            // GMAIL password
$mail->SetFrom("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->AddReplyTo("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->Subject    = "KFI Annual Gathering 2014 - Confirmation";

$mail->AltBody    = "KFI Annual Gathering 2014 - Confirmation"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $email;
$address1 = "sahyadri.server@gmail.com";
$address2 = "kfisahyadri.study@gmail.com";	
$address3 = "sahyadriaccounts@gmail.com";

$mail->AddAddress($address, $name);
$mail->AddBCC($address1, "Sahyadri Server");
$mail->AddCC($address2, "Study Centre");
$mail->AddCC($address3, "Sahyadri Accounts");

$mail->AddAttachment("images2/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}
}
	
        }
        else
        {
     	echo "<h1>Error</h1>";
        echo "<p>Sorry, your record has been not updated. Please try again.</p>";    
        }    		
	mysql_close();
	}	
	}
	?>
</body>
</html>



<?php 
if(isset($_GET['name'])) {	
include ('index.php'); 
$name = $_GET['name'];
$email = $_GET['email'];
$mobile_no = $_GET['mobile_no'];
$address = $_GET['address'];
$nationality = $_GET['nationality'];
$age = $_GET['age'];
$sex = $_GET['sex'];
$occupation = $_GET['occupation'];
$payment_details = $_GET['payment_details'];
?>
<br>
<?php
$body = <<<END
<html>
<head>
<title>Study Centre Gathering-2014</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<div style="margin:auto auto auto auto; width:700px; padding:20px; border:1px solid lightgray; border-radius:15px;">
<p>Dear $name,</p>
<p style='color:#556B2F; font-size:13px;' >Thank you for Registering at KFI Annual Gathering 2014!</p>
<p>The Sahyadri Study centre will contact you to confirm your registration. Please remember that registrations are confirmed only when payment is received, therefore if you have selected the bank transfer option as method of payment please send details of such transfer to <a href='mailto:kfisahyadri.study@gmail.com'>kfisahyadri.study@gmail.com</a>. DDs received will be duly acknowledged.</p>

<p><b>Registered Details : </b></p>
<table style='color:#333333; border-width:1px; border-color:#999999; border-collapse: collapse; font-size:12px; color:#333333;'>
<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Name :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $name</td>
</tr>
<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Email :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $email</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Address :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $address</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Nationality :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $nationality</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Mobile No. :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $mobile_no</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Age :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $age</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Gender :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $sex</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Occupation :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $occupation</td>
</tr>

<tr>
<td style='border-width:1px; color:#556B2F; padding:8px; border-style:solid; border-color:lightgray;'> Payment Details :</td>
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'>$payment_details</td>
</tr>
</table>
<br>
<p>For any further information, The Sahyadri Study centre will be pleased to assist you!</p>
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

$mail->Subject    = "KFI Annual Gathering 2014 - Registration";

$mail->AltBody    = "KFI Annual Gathering 2014 - Registration"; // optional, comment out and test

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

echo $body; 
?>
<br><p>Please check your email to verify your registration.</p>

</div>
<br>
<?
}
?>
</body>
</html>

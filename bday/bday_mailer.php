<?php

include("connect.php");

$data = mysql_query("SELECT name, class, idphoto, date_format(birth_date,'%D, %M') birth_date FROM std_2014_15 WHERE DATE_FORMAT(birth_date,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')" ) or die(mysql_error());


$anymatches=mysql_num_rows($data);
if ($anymatches != 0)
{

//******************************************* DAILY REPORT SETTING ***************************************************************//
$body = <<<END
<html>
<head>
<title>Today's birthdays</title>
</head>
<body style="background-color:#FAEBD7; padding:10px; width:300px; border:1px solid gray; text-align:center;">
<h4 style="text-align:center; padding:5px; background-color:darkblue; color:yellow; font-size:13px;">Today's Birthdays</font></h4>

<table style="width:260px; font-family:verdana,arial,sans-serif; margin:auto auto auto auto; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">

END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//And display the results
	 while($result = mysql_fetch_array( $data ))		
	{
	$name = $result['name'];
	$class = $result['class'];
	$birth_date = $result['birth_date'];
	$idphoto = $result['idphoto'];

	$body .='
	<tr style="border:1px solid lightgray;">
	<td style="text-align:center; background-color:white; padding:10px;"><img style="width:50px; height:60px; overflow:auto; padding:1px; border:2px solid gray;" src="../std_2014-15/upload/'.$idphoto.'"></td>

	<td style="text-align:center; font-size:12px; background-color:white; padding:10px;">'.$name.'<br>Class - '.$class.'<br><br>

        <font style="font-size:10.5px; color:brown;">'.$birth_date.'</font></td>
</tr><br>';

	}

mysql_close();

//******************************************** SMTP SERVER SETTINGS ***************************************************************//

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

$mail->Subject    = "Today's Birthdays";

$mail->AltBody    = "Today's Birthdays"; // optional, comment out and test

$mail->MsgHTML($body);


include ("../staff/connect.php");

$staff_data = mysql_query("SELECT staff_name, staff_email FROM staff WHERE staff_email != '' AND status = 'Working'");

//And we display the results
while($result = mysql_fetch_array( $staff_data ))
{
$staff_name = $result ['staff_name'];
$staff_email = $result ['staff_email'];

$mail->AddAddress($staff_email, $staff_name);

//$mail->AddAddress('bhaugha@gmail.com', 'Bhau');
}

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//
}
?>



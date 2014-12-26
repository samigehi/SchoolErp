<html>
<head>
<title>added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");

if (isset($_POST['submit']))
{
include("connect.php");
$staff_name = trim($_POST['staff_name']);
$from_location = trim($_POST['from_location']);
$to_location = trim($_POST['to_location']);
$depart_on = trim($_POST['depart_on']);
$depart_time = trim($_POST['depart_time']);
$return_on = trim($_POST['return_on']);
$return_time = trim($_POST['return_time']);
$adult = trim($_POST['adult']);
$child = trim($_POST['child']);
$trip_type = trim($_POST['trip_type']);
$to_be_shared = trim($_POST['to_be_shared']);
$vehicle_type = trim($_POST['vehicle_type']);
$service_provider = trim($_POST['service_provider']);
$special_requirement = trim($_POST['special_requirement']);
$booked_date = date('Y-m-d');
$booked_by = $_SESSION['user_name'];
$booked_from = $_SESSION['user_ip'];

$query = "INSERT INTO transport_app (staff_name, from_location, to_location, depart_on, depart_time, return_on, return_time, adult, child, trip_type, to_be_shared, vehicle_type, service_provider, special_requirement, booked_date, booked_by, booked_from)
VALUES ('$staff_name', '$from_location', '$to_location', '$depart_on', '$depart_time', '$return_on', '$return_time', '$adult', '$child', '$trip_type', '$to_be_shared', '$vehicle_type', '$service_provider', '$special_requirement', '$booked_date', '$booked_by', '$booked_from')";

$results = mysql_query($query);
// -------------------------- show added record --------------------------//
if ($results)
{
header ("Location: add.php");

/*
$sql = "SELECT * FROM leave_app ORDER BY leave_id DESC LIMIT 1";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
extract($row);

$leave_id = trim($leave_id);
$staff_name = trim($staff_name);

mysql_close();

include ("../staff/connect.php");
$query = mysql_query("SELECT staff_email, designation FROM staff WHERE staff_name = '$staff_name'");
$email = mysql_fetch_array($query);
extract($email);

$staff_email = trim($staff_email);
$designation = trim($designation);

$body = <<<END
<html>
<head>
<title>Leave Request</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">

<p align=left>Dear $staff_name, </p><p> Your leave request has been registered and the details are as below. This is an automated response to indicate that your leave has been registered. Please do not reply to this email. </p>

<p align=center><font color=black size=2>Sahyadri School</font><br><font color=gray size=1>krishnamurti foundation india</font></p>
<hr color=green>
<br>
<table style='font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;'>
<tr>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Name</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Apply Date</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Apply By</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>From To</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Type</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Days</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Purpose</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Status</th>
</tr>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('mailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$body .=' 
<tr>
<td style="border-width:1px; padding:8px; text-align:left; border-style:solid; border-color:#666666; background-color:white;"><b>'."<a href=\"http://fileserver/leave_app/update.php?leave_id=$leave_id\"><b>$staff_name</b></a>".'</b></td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$apply_date.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$apply_by.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$leave_from.' - '.$leave_to.'</td>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:white;">'.$leave_type.'</td>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:white;">'.$leave_days.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$leave_reason.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$leave_status.'</td>
</tr>';

$body .= <<<END
</table>
</body>
</html>

END;
mysql_close();

//*****************************************************************************************\\
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

//$mail->AddReplyTo("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->Subject    = "Leave request";

$mail->AltBody    = "Leave request"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $staff_email;

//*** Teachers mails to Principal ***
if ($designation == 'Teacher'){
$address1 = "amreshkr@gmail.com";
$address2 = "shailesh.shirali@gmail.com";
$address3 = "sahyadri.server@gmail.com";
$address4 = "milindgmore@gmail.com";
$mail->AddAddress($address, $staff_name);
$mail->AddCC($address1, "Amresh Kumar");
$mail->AddCC($address2, "Shailesh Shirali");
$mail->AddBCC($address3, "Sahyadri Server");
$mail->AddCC($address4, "Milind More");
}
else
//*** Non-teaching mails to Administrative officer ****
{
$address1 = "milindgmore@gmail.com";
$address2 = "dilipsksi@gmail.com";
$address3 = "sahyadrischool@gmail.com";
$address4 = "sahyadri.server@gmail.com";
$address5 = "shailesh.shirali@gmail.com";
$mail->AddAddress($address, $staff_name);
$mail->AddCC($address1, "Milind More");
$mail->AddCC($address2, "Dilip Shelar");
$mail->AddBCC($address3, "Sahyadri School");
$mail->AddBCC($address4, "Sahyadri Server");
$mail->AddCC($address5, "Shailesh Shirali");
}

if ($leave_type == 'ML'){
$address_doc = "drpradnyavirnak@gmail.com";
$mail->AddCC($address_doc, "Pradnya Virnak");
}

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}
******************************************************************/
	
}
if (!$results)
{
echo "<h3>Record not added successfully, error!</h3>";
}
}
?>
 
</body>
</html>

<html>
<head>
<title>leave updated</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip'){

$leave_id = trim($_POST['leave_id']);
$staff_name= trim($_POST['staff_name']);

if (isset($_POST['update']))
{
include("connect.php");
$leave_type = trim($_POST['leave_type']);
$leave_from = trim($_POST['leave_from']);
$leave_to = trim($_POST['leave_to']);
//$leave_days = trim($_POST['leave_days']);

$leave_days = trim($_POST['leave_days'] + $_POST['half_days']);

$approved_by = $_SESSION['user_name'];
$approved_date = date('Y-m-d');
$leave_status = trim($_POST['leave_status']);
$leave_remark = mysql_escape_string($_POST['leave_remark']);

$apply_by = trim($_POST['apply_by']);
$apply_date = trim($_POST['apply_date']);
$leave_reason = mysql_escape_string($_POST['leave_reason']);


$query = "UPDATE leave_app SET leave_type = '$leave_type', leave_from='$leave_from', leave_to='$leave_to', leave_days='$leave_days', approved_by='$approved_by', approved_date='$approved_date', leave_status='$leave_status', leave_remark='$leave_remark' WHERE leave_id='$leave_id'";

$results = mysql_query($query);
// -------------------------- show added record --------------------------//
if ($results)
{
header ("Location: admin_leave_details.php?staff_name=$staff_name&fromdate=$leave_from&todate=$leave_to&leave_type=$leave_type&leave_status=$leave_status");

include ("../staff/connect.php");
$staff = mysql_query("SELECT staff_email, designation FROM staff WHERE staff_name = '$staff_name'");
$result = mysql_fetch_array($staff);
extract($result);

$staff_email = trim($staff_email);
$designation = trim($designation);

$body = <<<END
<html>
<head>
<title>Leave Update</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">

<p align=left>Dear $staff_name, </p><p> Your leave request has been updated and the details are as below. This is an automated response to indicate that your leave has been updated. Please do not reply to this email.</p>

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

//$mail->AddReplyTo("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->Subject    = "Leave update";

$mail->AltBody    = "Leave update"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $staff_email;

//*** Teachers mails to Principal ***
if ($designation == 'Teacher'){
$address1 = "amreshkr@gmail.com";
$address2 = "shailesh.shirali@gmail.com";
$address3 = "ramu1949@gmail.com";
$address4 = "prabhatbharat@gmail.com";
$address5 = "anjalikrishna@gmail.com";
$address6 = "padmapriya.shirali@gmail.com";
$address7 = "loktripathi@gmail.com";
$address8 = "sahyadrischool@gmail.com";
$address9 = "dilipsksi@gmail.com";
$address11 = "milindgmore@gmail.com";
$address12 = "ritesh.vispute@gmail.com";
$address13 = "rarunning@gmail.com";
$address10 = "sahyadri.server@gmail.com";

$mail->AddAddress($address, $staff_name);
$mail->AddCC($address1, "Amresh Kumar");
$mail->AddCC($address2, "Shailesh Shirali");
$mail->AddCC($address3, "P Ramesh");
$mail->AddCC($address4, "Prabhat Kumar");
$mail->AddCC($address5, "Anjali Krishna");
$mail->AddCC($address6, "Padmapriya Shirali");
$mail->AddCC($address7, "Alok Tripathi");
$mail->AddCC($address8, "Sahyadri School");
$mail->AddCC($address9, "Dilip Shelar");
$mail->AddCC($address11, "Milind More");
$mail->AddCC($address12, "Ritesh Vispute");
$mail->AddCC($address13, "Arun Kumar");
$mail->AddCC($address10, "Sahyadri Server");
}
else
//*** Non-teaching mails to Administrative officer ****
{
$address1 = "milindgmore@gmail.com";
$address2 = "dilipsksi@gmail.com";
$address3 = "sahyadrischool@gmail.com";
$address4 = "sahyadri.server@gmail.com";
$address5 = "amreshkr@gmail.com";
$address6 = "ramu1949@gmail.com";
$address7 = "shailesh.shirali@gmail.com";
$mail->AddAddress($address, $staff_name);
$mail->AddCC($address1, "Milind More");
$mail->AddCC($address2, "Dilip Shelar");
$mail->AddBCC($address3, "Sahyadri School");
$mail->AddBCC($address4, "Sahyadri Server");
$mail->AddBCC($address5, "Amresh Kumar");
$mail->AddBCC($address6, "P Ramesh");
$mail->AddCC($address7, "Shailesh Shirali");
}

if ($leave_type == 'ML'){
$address_doc = "drpradnyavirnak@gmail.com";
$mail->AddCC($address_doc, "Pradnya Virnak");
}

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}
	
}
if (!$results)
{
echo "<h3>Record not added successfully, error!</h3>";
}
}

//delete leave record
if (isset($_POST['delete']) && ($_SESSION['user_level'] == '1'))
{
?>
<br>
<table align="center" class=table1 style="text-align:center;">
<tr class=tr1>
<td class=td1>
<p align=center><b> You are deleting the record of : </b><label title="edit record"> <?php echo "<a href=\"update.php?leave_id=$leave_id\">$staff_name</a>";?> </label></p>

<font color=red size=3>Are you sure?</font><br><br>
<font color=blue size=3><a href="deleted.php?do=delete&leave_id=<?php echo $leave_id;?>"><b>Yes</b></a> &nbsp; &nbsp; -- &nbsp; &nbsp; <a href="index.php"><b>No</b></a></font>
</td>
</tr>
</table>
</div>
<?php
}
}
?>

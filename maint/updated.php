<html>
<head>
</head>
<body>
<?php
include("index.php");
include("connect.php");
$id = $_POST['id'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$department = $_POST['department'];
$name = $_POST['name'];
$email = trim($_POST['email']);

if ($_SESSION['user_name'] == 'gbhosale' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'gsatish')
{
//update new fields ---- second form---------//
$currentpro = trim($_POST['currentpro']);
$inprogress = trim($_POST['inprogress']);
$matrlreq = trim($_POST['matrlreq']);
$matrluse =  trim($_POST['matrluse']);
$finishdate = trim($_POST['finishdate']);
$finishtime = trim($_POST['finishtime']);
$coremark = mysql_escape_string($_POST['coremark']);
$finishdate = date("d-m-Y");
$finishtime = date("H:i:s");
$ip_address = $_SESSION['user_ip'];
$user_name = $_SESSION['user_name'];
$name = trim($_POST['name']);
$com_sugg = trim($_POST['com_sugg']);
$update = "UPDATE maint SET currentpro = '$currentpro', inprogress = '$inprogress', matrlreq = '$matrlreq', matrluse = '$matrluse', finishdate = '$finishdate', finishtime = '$finishtime', coremark = '$coremark', ip_address ='$ip_address', user_name = '$user_name' WHERE id = '$id' ";
$rsUpdate = mysql_query($update);
}

if ($_SESSION['user_level'] == '1')
{
//--------------------------------------------------update new fields second form-----------------------------------------------//
$currentpro = trim($_POST['currentpro']);
$inprogress = trim($_POST['inprogress']);
$matrlreq = trim($_POST['matrlreq']);
$matrluse =  trim($_POST['matrluse']);
$finishdate = trim($_POST['finishdate']);
$finishtime = trim($_POST['finishtime']);
$coremark = mysql_escape_string($_POST['coremark']);
$finishdate = date("d-m-Y");
$finishtime = date("H:i:s");
$ip_address = $_SESSION['user_ip'];
$user_name = $_SESSION['user_name'];
$com_sugg = trim($_POST['com_sugg']);

if (isset($_POST['admin_remark'])){
$admin_remark = trim($_POST['admin_remark']);
}
else
{
$admin_remark = '';
}

$update = "UPDATE maint SET currentpro = '$currentpro', inprogress = '$inprogress', matrlreq = '$matrlreq', matrluse = '$matrluse', finishdate = '$finishdate', finishtime = '$finishtime', coremark = '$coremark', ip_address ='$ip_address', user_name = '$user_name', admin_remark = '$admin_remark' WHERE id = '$id' ";
$rsUpdate = mysql_query($update);
}
		
if ($rsUpdate)
{
header("Location: datarange.php?fromdate=$fromdate&todate=$todate&name=$name");

$body = <<<END
<html>
<head>
<title>Com / Sug / Req</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">

<p align=left>Dear $name, </p><p> Your $com_sugg number -<b> $id </b>has been addressed and the details are as below. This is an automated response to indicate that your complaint has been addressed. Please do not reply to this email. </p>

<p align=center><font color=black size=2>Sahyadri School</font><br><font color=gray size=1>krishnamurti foundation india</font></p>

<hr color=orange>

<p align=left><font color=darkblue><b>CSR Update</b></font> &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b> Date :</b></font> $finishdate</p>

<table style='font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;'>

<tr>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Date</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Name</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Location</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>CSR</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Details of CSR</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Current progress</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Dept Remark</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Adm Remark</th>
</tr>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('mailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$today = date("d-m-Y");

$yesterday = date("d-m-Y", strtotime("-1 day"));

include("connect.php");
$sql = "SELECT * FROM maint WHERE id = '$id'";
$result = mysql_query($sql);	
	
while($data = mysql_fetch_array($result))
   {
$body .=' 
<tr>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['compldate'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['name'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['location'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['compldetails'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['description'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#D9F3FF;">'.$data['currentpro'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#D9F3FF;">'.$data['coremark'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#D9F3FF;">'.$data['admin_remark'].'</td>
</tr>';
}

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

$mail->AddReplyTo("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->Subject    = "update confirmation mail";

$mail->AltBody    = "update confirmation mail"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $email;
$address1 = "sahyadri.server@gmail.com";
$address2 = "milindgmore@gmail.com";
$address3 = "gbhosale56@gmail.com";

$mail->AddAddress($address, $name);
$mail->AddBCC($address1, "Sahyadri Server");
$mail->AddCC($address2, "Milind More");
$mail->AddCC($address3, "Gopal Bhosale");

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}

}
?>
</body>
</html>


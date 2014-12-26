<?php
$today = date("Y-m-d", strtotime("-1 day"));
$body = <<<END
<html>
<head>
<title>Daily report :: Inventory</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<p align=center><font color=black size=3>Sahyadri School</font><br><font color=gray size=2>krishnamurti foundation india</font></p>
<hr color=orange size=2></hr>
<p align=left><font color=darkblue><b>Date </b>- $today &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; <b>Daily Report </b> - Inventory  </font></p>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//------------------------------------------------------Total Records in Dept.-----------------------------------------------------//
//tkshop//
include("tkshop.php");
$tkshop_purchase = mysql_query("SELECT * FROM tk_purchase where pr_date = '$today'");
$tkshop_issue = mysql_query("SELECT * FROM tk_issue where iss_date = '$today'");
$tkshop_purchase_total = mysql_num_rows($tkshop_purchase);
$tkshop_issue_total = mysql_num_rows($tkshop_issue);
mysql_close();

//dhstore//
include("dhstore.php");
$dhstore_purchase = mysql_query("SELECT * FROM purchase where pr_date = '$today'");
$dhstore_issue = mysql_query("SELECT * FROM issue where iss_date = '$today'");
$dhstore_purchase_total = mysql_num_rows($dhstore_purchase);
$dhstore_issue_total = mysql_num_rows($dhstore_issue);
mysql_close();

//textbook//
include("text.php");
$textbook_purchase = mysql_query("SELECT * FROM text_purchase where pr_date = '$today'");
$textbook_issue = mysql_query("SELECT * FROM text_issue where iss_date = '$today'");
$textbook_purchase_total=mysql_num_rows($textbook_purchase);
$textbook_issue_total=mysql_num_rows($textbook_issue);
mysql_close();

//maintenance//
include("maint.php");
$maint_purchase = mysql_query("SELECT * FROM maint_purchase where pr_date = '$today'");
$maint_issue = mysql_query("SELECT * FROM maint_issue where iss_date = '$today'");
$maint_purchase_total = mysql_num_rows($maint_purchase);
$maint_issue_total = mysql_num_rows($maint_issue);
mysql_close();

//stationery//
include("stationery.php");
$stationery_purchase = mysql_query("SELECT * FROM stationery_purchase where pr_date = '$today'");
$stationery_issue = mysql_query("SELECT * FROM stationery_issue where iss_date = '$today'");
$stationery_purchase_total = mysql_num_rows($stationery_purchase);
$stationery_issue_total = mysql_num_rows($stationery_issue);
mysql_close();

//sports store//
include("sports.php");
$sports_purchase = mysql_query("SELECT * FROM sports_purchase where pr_date = '$today'");
$sports_issue = mysql_query("SELECT * FROM sports_issue where iss_date = '$today'");
$sports_purchase_total = mysql_num_rows($sports_purchase);
$sports_issue_total = mysql_num_rows($sports_issue);
mysql_close();

//general store//
include("general.php");
$general_purchase = mysql_query("SELECT * FROM general_purchase where pr_date = '$today'");
$general_issue = mysql_query("SELECT * FROM general_issue where iss_date = '$today'");
$general_purchase_total = mysql_num_rows($general_purchase);
$general_issue_total = mysql_num_rows($general_issue);
mysql_close();

//gatepass//
include("gatepass.php");
$gatepass = mysql_query("SELECT * FROM gatepass where gatepass_date = '$today'");
$gatepass_total = mysql_num_rows($gatepass);
mysql_close();

$body .='
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:2px; padding:8px; border-style:solid; border-color:#666666; background-color:#BBCCFF;">Sr. No.</th>
<th style="border-width:1px; width:150px; padding:8px; border-style:solid; border-color:#666666; background-color:#BBCCFF;">Application</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BBCCFF;">Purchase Records</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BBCCFF;">Issue Records</th>
</tr>';
	
$body .=' 
<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">1</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">Tuckshop</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$tkshop_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$tkshop_issue_total.'</td>
</tr>

</tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">2</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">DH Store</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$dhstore_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$dhstore_issue_total.'</td>
</tr>

<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">3</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">Textbook</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$textbook_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$textbook_issue_total.'</td>
</tr>

<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">4</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">Maintenance</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$maint_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$maint_issue_total.'</td>
</tr>

<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">5</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">Sports</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$sports_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$sports_issue_total.'</td>
</tr>

<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">6</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">Stationery</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$stationery_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$stationery_issue_total.'</td>
</tr>

<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">7</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">General</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$general_purchase_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$general_issue_total.'</td>
</tr>

<tr>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">8</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">Gatepass</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;">'.$gatepass_total.'</td>
<td style="border-width:1px; text-align:center; padding:8px; border-style:solid; border-color:#666666; background-color:#FFFFCC;"> - </td>
</tr>';

$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
</body>
</html>
END;

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

$mail->Subject    = "Daily Report - Inventory";

$mail->AltBody    = "Daily Report - Inventory"; // optional, comment out and test

$mail->MsgHTML($body);

$address1 = "shrikant.navale99@gmail.com";
$address3 = "milindgmore@gmail.com";
$address4 = "sahyadri.server@gmail.com";

$mail->AddAddress($address1, "Shrikant Navale");
$mail->AddAddress($address3, "Milind More");
$mail->AddAddress($address4, "Sahyadri Server");

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//
?>

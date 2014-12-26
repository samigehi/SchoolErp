
<html>
<head>
<title>KFI :: Thank you</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>
<?php include ('header.php'); 
$name = $_GET['name'];
$to_email = $_GET['email'];
$mobile_no = $_GET['mobile_no'];
$address = $_GET['address'];
$nationality = $_GET['nationality'];
$age = $_GET['age'];
$sex = $_GET['sex'];
$occupation = $_GET['occupation'];
$payment_details = $_GET['payment_details'];
?>

  <div id="content">
  <!-- Normal content: Stuff that's not going to be put in the left or right column. -->
  <div id="normalcontent">
  <div class="contentarea">
<br>

<?php
$message = "
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
<td style='border-width:1px; padding:8px; border-style:solid; border-color:lightgray;'> $to_email</td>
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

<p>For any further information, The Sahyadri Study centre will be pleased to assist you!</p>";

echo $message;
$from_email = "kfisahyadri.study@gmail.com";
$accounts = "sahyadriaccounts@gmail.com";

$xheaders = "";
$xheaders .= "From: Krishnamurti Study Centre Sahyadri <$from_email>\n";
$xheaders .= "X-Sender: <$from_email>\n";
$xheaders .= "Content-Type:text/html; charset=\"iso-8859-1\"\n";
$xheaders .= "Cc: ".$from_email."\n";
$xheaders .= "Cc: ".$accounts."\n";

//$from="From: $from_name<$from_email>\r\nReturn-path: $from_email";
$subject="KFI Annual Gathering 2014";
mail($to_email, $subject, $message, $xheaders);
?>  

<br><p>Please check your email to verify your registration.</p>

</div>
</div>
</div>
   
<?php include ('footer.php'); ?>

</body>
</html>

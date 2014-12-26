<?php
if (!isset($_SESSION)) {
session_start();
}
?>

<html>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Sahyadri Study centre | Gathering Registration</title>
<link rel="stylesheet" type="text/css" href="css/new.css" />
<script src="calendar/datetimepicker_css.js"></script>
<script src="js/validate_addform.js"></script>
</head>  
<body> 

<?php
include ("index.php");

if (isset($_GET['id'])){
include ("connect.php");
?>
<div id="column2">
<?php
$id = $_GET['id'];

$qP = "SELECT * FROM gathering_2014 WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
	$name = trim($name);
	$app_date = trim($app_date);
	$address = trim($address);
	$mobile_no = trim($mobile_no);
	$email = trim($email);
	$nationality = trim($nationality);
	$age = trim($age);
	$sex = trim($sex);
	$occupation = trim($occupation);
	$payment_details = trim($payment_details);
	$status = trim($status);
	$update_date = trim($update_date);
	mysql_close();
	?>

<form method="GET" action="update.php" name="profile_update">
<h1>Update Form</h1>
<table class=table1 style="width:50%">
<form method="post" name="a_addform" action="update.php" onsubmit="return validateForm();">
<tr>
<td class=td1>Name :</td><td class=td1><input class="text1" size="40" type="text" readonly="readonly" name="name" value="<?php echo $name;?>"></td>
</tr>
<tr>
<td class=td1>Date :</td> <td class=td1><input class="text1" size="12" type="text" readonly="readonly" name="app_date" value="<?php echo $app_date;?>"></td>
</tr>
<tr>

<td class=td1>Mobile No :</td><td class=td1><input class="text1" size="10" type="text" readonly="readonly" name="mobile_no" value="<?php echo $mobile_no;?>"></td>
</tr>
<tr>
<td class=td1>Email :</td><td class=td1><input class="text1" size="40" type="text" readonly="readonly" name="email" value="<?php echo $email;?>"></td>	
</tr>
<tr>
<td class=td1>Nationality :</td><td class=td1><input class="text1" size="10" readonly="readonly" type="text" name="nationality" value="<?php echo $nationality;?>"></td>
</tr>
<tr>
<td class=td1>Age :</td><td class=td1><input class="text1" size="10" readonly="readonly" type="text" name="age" value="<?php echo $age;?>"></td>
</tr>
<tr>
<td class=td1>Gender :</td><td class=td1><input class="text1" size="10" readonly="readonly" type="text" name="sex" value="<?php echo $sex;?>"></td>
</tr>
<tr>
<td class=td1>Occupation :</td><td class=td1><input class="text1" size="40" readonly="readonly" type="text" name="occupation" value="<?php echo $occupation;?>"></td>
</tr>
<tr>

<td class=td1>Address :</td><td class=td1><TEXTAREA ROWS="3" style="width:250px;" readonly="readonly" name="address"><?php echo $address;?></TEXTAREA></td>
</tr>
<tr>
<td class=td1>Payment Details :</td><td class=td1><TEXTAREA ROWS="3" style="width:250px;" readonly="readonly" name="payment_details"><?php echo $payment_details;?></TEXTAREA></td>
</tr>
<tr>

<td class=td1>Status :</td> 
<td class=td1>
<select name = "status">
<option value="status"><?php echo $status;?><option>
<option value="Pending">Pending<option>
<option value="Confirmed">Confirmed<option>
<option value="Canceled">Canceled<option>
</select> &nbsp; &nbsp;

Update date : <input class="text1" size="10" type="text" readonly="readonly" name="update_date" value="<?php echo $update_date;?>">

</td>
</tr>
</table>
</div>

<br>
<div align="center">
<input type="submit" name="submit" value="Edit"/><input type="hidden" name="id" value="<?php echo $id;?>"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'"></div>
<br>
</form>
<?php
}
else
{
echo "<div style='text-align:center; color:red;'>Please contact the administrator for editing rights.</div>";
}
?>
 
</div>
</div>
 
</body>
</html>

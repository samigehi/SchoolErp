
<html>
<head>
<title>Krishnamurti study centre :: register</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="default.css" />
<script language="javascript"> 
function validateForm()
{
var x=document.forms["addform"]["name"].value;
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

var x=document.forms["addform"]["mobile_no"].value;
if (x==null || x=="")
  {
  alert("Mobile no. must be filled out");
  return false;
  }

var x=document.forms["addform"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

}
</script>
</head>
<body>

<?php 
ob_start();
include ('header.php');
?>

<div id="content">
<!-- Normal content: Stuff that's not going to be put in the left or right column. -->
<div id="normalcontent">      
<div class="contentarea">

<div align=center><h4>KFI Annual Gathering 2014 - Online Registration Form </h4></div><br>

<table class="table1">
<form method="post" name="addform" action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return validateForm();">
<tr>
<td class=td1><font color="red"> * </font> Name :</td>
<td class=td1><input size="30" type="text" value="" name="name"></td> 
</tr>

<tr>
<td class=td1><font color="red"> &nbsp; </font> Address :</td>
<td class=td1><textarea cols="40" rows="4" value="" name="address"></textarea></td>
</tr>

<tr>
<td class=td1><font color="red"> * </font>Mobile No. :</td>
<td class=td1><input size="30" type="text" value="" name="mobile_no"></td>
</tr>

<tr>
<td class=td1><font color="red"> * </font>Email :</td>
<td class=td1><input size="30" type="text" value="" name="email"></td>
</tr>

<tr>
<td class=td1><font color="red"> &nbsp; </font> Nationality :</td>
<td class=td1><input size="20" type="text" value="" name="nationality"></td>
</tr>

<tr>
<td class=td1><font color="red"> &nbsp; </font>Age :</td>
<td class=td1><input size="10" type="text" value="" name="age"></td>
</tr>

<tr>
<td class=td1><font color="red"> * </font>Gender :</td>
<td class=td1>
<select name="sex">
<option value="">- Select -</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</td>
</tr>

<tr>
<td class=td1><font color="red"> &nbsp; </font>Occupation :</td>
<td class=td1><input size="30" type="text" value="" name="occupation"></td>
</tr>

<tr>
<td class=td1><font color="red"> &nbsp; </font>Payment Details :</td>
<td class=td1><textarea cols="30" rows="2" value="" name="payment_details"></textarea><br><font style="font-size:9px;"> [Details of Cheque / DD / Online Transfer]</font></td>
</tr>

</table>
<br>
<div align="center">
<input type="submit" name="submit" value="Submit"/> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'"></div>
</form>

<?php
include ("connect.php");
if (isset($_POST['submit'])){
$app_date = date ('Y-m-d');
$name = mysql_escape_string($_POST['name']);
$address = mysql_escape_string($_POST['address']);
$mobile_no = $_POST['mobile_no'];
$email = $_POST['email'];
$nationality = $_POST['nationality'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$occupation = $_POST['occupation'];
$payment_details = $_POST['payment_details'];

$data = "INSERT INTO gathering_2014 (app_date, name, address, mobile_no, email, nationality, age, sex, occupation, payment_details) VALUES ('$app_date', '$name', '$address', '$mobile_no', '$email', '$nationality', '$age', '$sex', '$occupation', '$payment_details')";

$add_form = mysql_query($data);

mysql_close();

if($add_form)
{
header ("Location:thank_you.php?name=$name&email=$email&address=$address&nationality=$nationality&mobile_no=$mobile_no&age=$age&sex=$sex&occupation=$occupation&payment_details=$payment_details");
}

if(!$add_form)
{
echo mysql_error();
}
}
?>

</div>
</div>
</div>      
<?php include ('footer.php');
ob_end_flush();
?>

</body>
</html>

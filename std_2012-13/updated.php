<?php
include("index.php");

if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office' || $_SESSION['user_name'] == 'pusha')
{

include("connect.php");

$id = $_POST['id'];

$adm = trim($_POST['adm']);
$name = trim($_POST['name']);
$birth_date = $_POST["birth_date"];
$adm_date = $_POST["adm_date"];
$sex = trim($_POST['sex']);
$class = trim($_POST['class']);
$bldgroup = trim($_POST['bldgroup']);
$class_teach = trim($_POST['class_teach']);
$house = trim($_POST['house']);
$house_parent = trim($_POST['house_parent']);
$hobby_1 = trim($_POST['hobby_1']);
$hobby_2 = trim($_POST['hobby_2']);
$hobby_3 = trim($_POST['hobby_3']);
$six_sub = trim($_POST['six_sub']);
$second_lang = trim($_POST['second_lang']);
$parent1 = trim($_POST['parent1']);
$parent2 = trim($_POST['parent2']);
$occupation = trim($_POST['occupation']);
$occupation_2 = trim($_POST['occupation_2']);

$address1 = trim($_POST['address1']);

$address = mysql_escape_string($address1);

//$address2 = trim($_POST['address2']);
//$address3 = trim($_POST['address3']);
$city = trim($_POST['city']);
$postalcode = trim($_POST['postalcode']);
$state = trim($_POST['state']);
$country = trim($_POST['country']);
$phone = trim($_POST['phone']);
$mobile_no = trim($_POST['mobile_no']);
$mobile_no_2 = trim($_POST['mobile_no_2']);
$email = trim($_POST['email']);
$email_2 = trim($_POST['email_2']);
//$idphoto = trim($_POST['idphoto']);

$updated_by = $_SESSION['user_name'] ;

$update_date = date("Y-m-d"); 

$update = "UPDATE name SET  
	adm = '$adm', 
	name = '$name', 
	birth_date = '$birth_date',
 	adm_date = '$adm_date',
	sex = '$sex', 
	class = '$class',
	bldgroup = '$bldgroup', 
	class_teach = '$class_teach', 
	house = '$house', 
	house_parent = '$house_parent',
	hobby_1 = '$hobby_1',
	hobby_2 = '$hobby_2',
	hobby_3 = '$hobby_3',
	six_sub = '$six_sub',
	second_lang = '$second_lang',
	parent1 = '$parent1', 
	parent2 = '$parent2', 
	occupation = '$occupation',
	occupation_2 = '$occupation_2',  
	address1 = '$address', 
	city = '$city', 
	postalcode = '$postalcode', 
	state = '$state', 
	country = '$country', 
	phone = '$phone', 
	mobile_no = '$mobile_no', 
	mobile_no_2 = '$mobile_no_2',	
	email = '$email', 
	email_2 = '$email_2',
	updated_by = '$updated_by',
	update_date = '$update_date'
	WHERE id = '$id'";

$rsUpdate = mysql_query($update);

mysql_close();

//---------------------------------update show form --------------------------------//
if ($rsUpdate)
{ 
header("Location: update_show.php?id=$id");
}
if (!$rsUpdate)
{
echo "<h3>Record not Updated successfully, error!</h3>";
}
}
?>

</body>
</html>

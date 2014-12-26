<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
include("connect.php");

$birth_date = trim($_POST['birth_date']);
$adm_date = trim($_POST['adm_date']);
$adm = trim($_POST['adm']);
$name = trim($_POST['name']);
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
//*************************************************************************//
$add_date = date("Y-m-d");
$add_time = date("H:i:s");
$add_user = $full_name;
$account_name = ($adm .' '. $name);

$query = "INSERT INTO std_2014_15 (adm, name, birth_date, adm_date, sex, class, bldgroup, class_teach, house, house_parent, hobby_1, hobby_2, hobby_3, six_sub, second_lang, parent1, parent2, occupation, occupation_2, address1, city, postalcode, state, country, phone, mobile_no, mobile_no_2, email, email_2, add_date, add_time, add_user, account_name)
VALUES ('$adm', '$name', '$birth_date', '$adm_date', '$sex', '$class', '$bldgroup', '$class_teach', '$house', '$house_parent', '$hobby_1', '$hobby_2', '$hobby_3', '$six_sub', '$second_lang', '$parent1', '$parent2', '$occupation', '$occupation_2', '$address', '$city', '$postalcode', '$state', '$country', '$phone', '$mobile_no', '$mobile_no_2', '$email', '$email_2', '$add_date', '$add_time', '$add_user', '$account_name')";
$results = mysql_query($query);

// -------------------------- show added record --------------------------//
if ($results)
{
$qP = "SELECT * FROM name ORDER BY id DESC LIMIT 1";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$id = trim($id);
$adm = trim($adm);
$name = trim($name);
$class = trim($class);
$class_teach = trim($class_teach);
$house = trim($house);
$house_parent = trim($house_parent);
$idphoto = trim($idphoto);
?>

<div class="contentB">
<table class=table_new >
<tr>
<th class=th1 style="width:30%;">Student Name</th>
<th class=th1 style="width:5px;">Adm No.</th>
<th class=th1 style="width:5px;">Class</th>
<th class=th1 style="width:10px;">House</th>
<th class=th1 style="width:10px;">Class Teacher</th>
<th class=th1 style="width:10px;">House Parent</th>
<th class=th1 style="width:20px;">Edit / Delete</th>
</tr>

<tr>
<td class=td1 title="<?php echo $name;?>"> &nbsp; <?php echo "<a href=\"update.php?id=$id\">$name</a>";?></td>
<td class=td1 style="text-align:center;"><?php echo $adm; ?></td>
<td class=td1 style="text-align:center;"><?php echo $class; ?></td>
<td class=td1 style="text-align:center;"><?php echo $house; ?></td>
<td class=td1><?php echo $class_teach; ?></td>
<td class=td1><?php echo $house_parent; ?></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"update.php?id=$id\">Edit</a>";?> &nbsp; <?php echo "<a href=\"delete.php?id=$id\">Delete</a>";?>  </td>

</tr>
</table>
</div>
</div>	

<?php
}
if (!$results)
{
echo "<h3>Record not added successfully, error!</h3>";
}
}
?>
 
</body>
</html>

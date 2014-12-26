<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
include("connect.php");
$id = $_POST['id'];
$staff_name = trim($_POST['staff_name']);
$birth_date = trim($_POST['birth_date']);
$designation = trim($_POST['designation']);
$teach_area = trim($_POST['teach_area']);
$teach_area_1 = trim($_POST['teach_area_1']);
$teach_area_2 = trim($_POST['teach_area_2']);
$department = trim($_POST['department']);
$join_date = trim($_POST['join_date']);
$bld_group = trim($_POST['bld_group']);
$gender = trim($_POST['gender']);
$staff_email = trim($_POST['staff_email']);
$address = trim($_POST['address']);
$city = trim($_POST['city']);
$postalcode = trim($_POST['postalcode']);
$state = trim($_POST['state']);
$country = trim($_POST['country']);
$phone = trim($_POST['phone']);
$mobile_no = trim($_POST['mobile_no']);
$ss_remark = trim($_POST['ss_remark']);
$updated_by = $_SESSION['user_name'] ;
$updated_date = date("Y-m-d");
$house_parent_of = trim($_POST['house_parent_of']);
$class_teacher_of = trim($_POST['class_teacher_of']);
$login_name = trim($_POST['login_name']);
$status = trim($_POST['status']);
$leave_cl = trim($_POST['leave_cl']);
$leave_el = trim($_POST['leave_el']);
$leave_ml = trim($_POST['leave_ml']);
$leave_sl = trim($_POST['leave_sl']);

$update = "UPDATE staff SET  
	staff_name = '$staff_name', 
	designation = '$designation',
	teach_area = '$teach_area',
	teach_area_1 = '$teach_area_1',
	teach_area_2 = '$teach_area_2',      
	department = '$department', 
	staff_email = '$staff_email',	
	birth_date = '$birth_date',
 	join_date = '$join_date',
	bld_group = '$bld_group', 
	gender = '$gender', 
	address = '$address', 
	city = '$city', 
	postalcode = '$postalcode', 
	state = '$state', 
	country = '$country', 
	phone = '$phone', 
	mobile_no = '$mobile_no', 
	ss_remark = '$ss_remark',
	updated_by = '$updated_by',
	updated_date = '$updated_date',
	house_parent_of	= '$house_parent_of',
	class_teacher_of = '$class_teacher_of', 
	login_name = '$login_name',
	status = '$status',
	leave_cl= '$leave_cl',
	leave_ml= '$leave_ml',
	leave_el= '$leave_el',
	leave_sl= '$leave_sl'
	WHERE id = '$id'";

	$rsUpdate = mysql_query($update);
	mysql_close();
//---------------------------------update show form --------------------------------//
if ($rsUpdate)
{ 
//update in student's database//

	include("../std_2014-15/connect.php");
		
	if ($_POST['class_teacher_of'] != ''){
        $update_class_teacher = mysql_query("UPDATE std_2014_15 SET class_teach = '$staff_name' WHERE class = '$class_teacher_of'");
	}

	if ($_POST['house_parent_of'] != ''){
        $update_house_parent = mysql_query("UPDATE std_2014_15 SET house_parent = '$staff_name' WHERE house = '$house_parent_of'");
	} 

	mysql_close();	

header ("Location: update_show.php?id=$id");
}
if (!$rsUpdate)
{
echo "<h3>Record not Updated successfully, error!</h3>";
}
}
?>

</body>
</html>

<?php
if (!isset($_SESSION)) {
session_start();
}

if (isset($_POST['update']) && $_SESSION['user_name'] == 'admin') 
{
	include ('connect.php');
	if(isset($_POST['update'])) {	
	$user_id = $_POST['user_id'];
	$username = $_POST['username'];
	$st_name = trim($_POST['st_name']);	
	$st_mobile_no = trim($_POST['st_mobile_no']);
	$adm = trim($_POST['adm']);
	$gender = trim($_POST['gender']);
	$birth_date = trim($_POST['birth_date']);
	$join_class = trim($_POST['join_class']);
	$join_year = trim($_POST['join_year']);
	$left_class = trim($_POST['left_class']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$postal_code = trim($_POST['postal_code']);
	$state = trim($_POST['state']);
	$country = trim($_POST['country']);
	$institution_studing = trim($_POST['institution_studing']);
	$course_studing = trim($_POST['course_studing']);
	$year_studing = trim($_POST['year_studing']);
	$location_studing = trim($_POST['location_studing']);
	$major_studing = trim($_POST['major_studing']);
	$organisation_working = trim($_POST['organisation_working']);
	$designation_working = trim($_POST['designation_working']);
	$location_working = trim($_POST['location_working']);
	$qualification_working = trim($_POST['qualification_working']);
	$major_working = trim($_POST['major_working']);
	$institute_working = trim($_POST['institute_working']);
	$fa_name = trim($_POST['fa_name']);
	$fa_email = trim($_POST['fa_email']);
	$fa_mobile_no = trim($_POST['fa_mobile_no']);
	$fa_occupation = trim($_POST['fa_occupation']);		
	$mo_name = trim($_POST['mo_name']);
	$mo_email = trim($_POST['mo_email']);	
	$mo_mobile_no = trim($_POST['mo_mobile_no']);
	$mo_occupation = trim($_POST['mo_occupation']);
	$update_date = date ('Y-m-d');
	$contribute = trim($_POST['contribute']);
	$batch = trim($_POST['batch']);
	
$update = "UPDATE members SET
st_name = '".$st_name."',
username = '".$username."',
st_mobile_no = '".$st_mobile_no."', 
adm = '".$adm."',
gender = '".$gender."', 
birth_date = '".$birth_date."', 
join_class = '".$join_class."', 
join_year = '".$join_year."', 
left_class = '".$left_class."',  
address = '".$address."', 
city = '".$city."', 
state = '".$state."',
country = '".$country."',
postal_code = '".$postal_code."',
institution_studing = '".$institution_studing."',
course_studing = '".$course_studing."',
year_studing = '".$year_studing."',
location_studing = '".$location_studing."',
major_studing = '".$major_studing."',
organisation_working = '".$organisation_working."',
designation_working = '".$designation_working."',
location_working = '".$location_working."',
qualification_working = '".$qualification_working."',
major_working = '".$major_working."',
institute_working = '".$institute_working."',
fa_name = '".$fa_name."',
fa_email = '".$fa_email."',
fa_mobile_no = '".$fa_mobile_no."',
fa_occupation = '".$fa_occupation."',
mo_name = '".$mo_name."',
mo_email = '".$mo_email."',
mo_mobile_no = '".$mo_mobile_no."',
mo_occupation = '".$mo_occupation."',
update_date = '".$update_date."',
contribute = '".$contribute."',
batch = '".$batch."'
WHERE user_id = '$user_id'";

$rsUpdate = mysql_query($update);

if($rsUpdate)
        {
        header ("Location: show_profile.php?user_id=$user_id");	
        }
        else
        {
     	echo "<h1>Error</h1>";
        echo "<p>Sorry, your record has been not updated. Please try again.</p>";    
        }    	
	
	mysql_close();
	}	
	}
	ob_flush();
	?>
</body>
</html>


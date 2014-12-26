<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'office')
{
include("connect.php");

$cad_id = $_POST['cad_id'];

$form_no = trim($_POST['form_no']);
$birth_date = trim($_POST['birth_date']);
$recd_date = trim($_POST['recd_date']);
$st_name = trim($_POST['st_name']);
$sex = trim($_POST['sex']);
$class = trim($_POST['class']);
$remarks = mysql_escape_string($_POST['remarks']);
$nationality = trim($_POST['nationality']);
$nri = trim($_POST['nri']);
$address = mysql_escape_string($_POST['address']);
$city = trim($_POST['city']);
$state = trim($_POST['state']);
$country = trim($_POST['country']);
$pincode = trim($_POST['pincode']);
$phone_no = trim($_POST['phone_no']);
$mobile_no = trim($_POST['mobile_no']);
$email = trim($_POST['email']);
$email_m = trim($_POST['email_m']);
$learning_diffy = trim($_POST['learning_diffy']);
$phy_illness = trim($_POST['phy_illness']);
$applied_earlier = trim($_POST['applied_earlier']);
$info_source_detail = mysql_escape_string($_POST['info_source_detail']);
$mother_tongue = trim($_POST['mother_tongue']);
$father_name = trim($_POST['father_name']);
$mother_name = trim($_POST['mother_name']);
$father_job = mysql_escape_string($_POST['father_job']);
$mother_job = mysql_escape_string($_POST['mother_job']);
$father_edu = mysql_escape_string($_POST['father_edu']);
$mother_edu = mysql_escape_string($_POST['mother_edu']);
$siblings = trim($_POST['siblings']);
$single_parent = trim($_POST['single_parent']);
$adopted_child = trim($_POST['adopted_child']);
$separated = trim($_POST['separated']);
$divorced = trim($_POST['divorced']);
$fee_paid = trim($_POST['fee_paid']);
$siblings_no = trim($_POST['siblings_no']);
$fee_paid = trim($_POST['fee_paid']);
$kfi_link = trim($_POST['kfi_link']);
$update_date = date("Y-m-d");
$update_by = $_SESSION['user_name'];
$update_from = $_SESSION['user_ip'];

$eng_grade = trim($_POST['eng_grade']);
$maths_grade = trim($_POST['maths_grade']);
$overall_grade = trim($_POST['overall_grade']);
$admn_status = trim($_POST['admn_status']);
$intervw_date = trim($_POST['intervw_date']);
$intvw_over = trim($_POST['intvw_over']);
$pc_profile = trim($_POST['pc_profile']);
$adm = trim($_POST['adm']);
$admn_fees_paid = trim($_POST['admn_fees_paid']);

$update = "UPDATE cad_app SET  
form_no = '".$form_no."', 
recd_date = '".$recd_date."', 
st_name = '".$st_name."', 
sex = '".$sex."', 
birth_date = '".$birth_date."', 
class = '".$class."', 
remarks = '".$remarks."', 
nationality = '".$nationality."', 
nri = '".$nri."', 
mother_tongue = '".$mother_tongue."', 
address = '".$address."', 
city = '".$city."', 
state = '".$state."',
country = '".$country."', 
pincode = '".$pincode."', 
phone_no = '".$phone_no."', 
mobile_no = '".$mobile_no."', 
email = '".$email."', 
email_m = '".$email_m."', 
learning_diffy = '".$learning_diffy."', 
phy_illness = '".$phy_illness."', 
applied_earlier = '".$applied_earlier."', 
kfi_link = '".$kfi_link."', 
info_source_detail = '".$info_source_detail."', 
father_name = '".$father_name."', 
father_edu = '".$father_edu."', 
father_job = '".$father_job."', 
mother_name = '".$mother_name."', 
mother_edu = '".$mother_edu."', 
mother_job = '".$mother_job."', 
siblings = '".$siblings."', 
single_parent = '".$single_parent."', 
adopted_child = '".$adopted_child."', 
separated = '".$separated."', 
divorced = '".$divorced."', 
fee_paid = '".$fee_paid."', 
siblings_no = '".$siblings_no."',
eng_grade = '".$eng_grade."',
maths_grade = '".$maths_grade."',
overall_grade = '".$overall_grade."',
admn_status = '".$admn_status."',
intervw_date = '".$intervw_date."',
intvw_over = '".$intvw_over."',
pc_profile = '".$pc_profile."',
admn_fees_paid = '".$admn_fees_paid."',
adm = '".$adm."', 
update_date = '".$update_date."', 
update_by = '".$update_by."', 
update_from = '".$update_from."'	
WHERE cad_id = '$cad_id'";

$rsUpdate = mysql_query($update);
mysql_close();
//---------------------------------update show form --------------------------------//
if ($rsUpdate)
{ 
header("Location: update_show.php?cad_id=$cad_id");
}
if (!$rsUpdate)
{
echo "<h3>Record not Updated successfully, error!</h3>";
}
}
?>

</body>
</html>

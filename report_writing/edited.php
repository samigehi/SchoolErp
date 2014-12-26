<?php
include ("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2')
{
include ("connect.php");
if (isset($_POST['submit']))
{
$class = $_POST['class'];
$ss_area = $_POST['ss_area'];

$last_update_teacher = $_SESSION['user_name'] ;
$last_update_date = date('Y-m-d h:i:s');
$update_from = $_SESSION['user_ip'];

//submit//
if (isset($_POST['submit']))
{
$adm = $_POST['adm'];
$economics_app_teacher = $_POST['economics_app_teacher'];
$economics_app = $_POST['economics_app'];
$economics_app_grade = $_POST['economics_app_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $economics_app[$i] = mysql_real_escape_string($economics_app[$i]);
    $economics_app_grade[$i] = mysql_real_escape_string($economics_app_grade[$i]);

$update = "UPDATE spring_2015 SET 
economics_app_teacher = '".$economics_app_teacher."',   
economics_app = '".$economics_app[$i]."',
economics_app_grade = '".$economics_app_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


if ($rsUpdate)
{
header ("Location: edit_show.php?class=$class&ss_area=$ss_area");
}

if (!$rsUpdate)
{ 
echo "Not Sucessfull";
}
}
}
?>


</body>
</html>

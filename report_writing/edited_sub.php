<?php
include ("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2')
{
include ("connect.php");
if (isset($_POST['submit']))
{
$class = $_POST['class'];
$ss_area = $_POST['ss_area'];
$adm = $_POST['adm'];
$subject = $_POST['subject'];

$last_update_teacher = $_SESSION['user_name'] ;
$last_update_date = date('Y-m-d h:i:s');
$update_from = $_SESSION['user_ip'];

$limit = count($adm);
for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $subject[$i] = mysql_real_escape_string($subject[$i]);
   
$update = "UPDATE spring_2015 SET 
$ss_area = '".$subject[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}

if ($rsUpdate)
{
header ("Location: view_sub.php?class=$class&ss_area=$ss_area");
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

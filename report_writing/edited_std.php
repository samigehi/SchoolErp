<?php
include ("index.php");
if (isset($_POST['submit']))
{
include ("connect.php");
$class = $_POST['class'];
$adm = $_POST['adm'];

$user_name = $_SESSION['user_name'];
$qP = "SELECT * FROM report_editor WHERE editor_user = '$user_name'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$class1 = trim($class1);
$class2 = trim($class2);

if ($_SESSION['user_level'] == '1' || $class == $class1 || $class == $class2){
//update reports
$class_teacher = mysql_escape_string($_POST['class_teacher']);
$house_parent = mysql_escape_string($_POST['house_parent']);
$english = mysql_escape_string($_POST['english']);
$hindi = mysql_escape_string($_POST['hindi']);
$marathi = mysql_escape_string($_POST['marathi']);
$history = mysql_escape_string($_POST['history']);
$geography = mysql_escape_string($_POST['geography']);
$social_studies = mysql_escape_string($_POST['social_studies']);
$maths = mysql_escape_string($_POST['maths']);
$biology = mysql_escape_string($_POST['biology']);
$chemistry = mysql_escape_string($_POST['chemistry']);
$physics = mysql_escape_string($_POST['physics']);
$science = mysql_escape_string($_POST['science']);
$games = mysql_escape_string($_POST['games']);
$yoga = mysql_escape_string($_POST['yoga']);
$art = mysql_escape_string($_POST['art']);
$music = mysql_escape_string($_POST['music']);
$commercial_studies = mysql_escape_string($_POST['commercial_studies']);
$economics_app = mysql_escape_string($_POST['economics_app']);
$computer_app = mysql_escape_string($_POST['computer_app']);
//update information
$last_update_teacher = $_SESSION['user_name'] ;
$last_update_date = date('Y-m-d h:i:s');
$update_from = $_SESSION['user_ip'];

$update = "UPDATE spring_2015 SET 
class_teacher = '$class_teacher',
house_parent = '$house_parent',
english = '$english',
hindi = '$hindi',
marathi = '$marathi',
history = '$history',
geography = '$geography',
social_studies = '$social_studies',
maths = '$maths',
biology = '$biology',
chemistry = '$chemistry',
physics = '$physics',
science = '$science',
games = '$games',
yoga = '$yoga',
art = '$art',
music = '$music',
commercial_studies = '$commercial_studies',
economics_app = '$economics_app',
computer_app = '$computer_app',
last_update_teacher = '$last_update_teacher',
last_update_date = '$last_update_date',
update_from = '$update_from'
WHERE adm = '$adm'";
$rsUpdate = mysql_query($update);
}

if ($rsUpdate)
{
header ("Location: view_std.php?class=$class&adm=$adm");
}

if (!$rsUpdate)
{ 
echo "Not Sucessfull";
}
}
else
{
echo "<br><p align=center><font color=red>Sorry! You do not have these privileges, please contact your account administrator.</font></p>";
}
?>


</body>
</html>

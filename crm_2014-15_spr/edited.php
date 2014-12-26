<?php
include ("index.php");
include ("connect.php");
if (isset($_POST['submit']))
{
$class = $_POST['class'];
$ss_area = $_POST['ss_area'];

$last_update_teacher = $_SESSION['user_name'] ;
$last_update_date = date('Y-m-d h:i:s');
$update_from = $_SESSION['user_ip'];
//class teacher area//
if (isset($_POST['class_teacher']))
{
$adm = $_POST['adm'];
$class_teacher_teacher = $_POST['class_teacher_teacher'];
$class_teacher = $_POST['class_teacher'];
$class_teacher_grade = $_POST['class_teacher_grade'];
$inputs_from_crm = $_POST['inputs_from_crm'];
$special_concern = $_POST['special_concern'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $class_teacher[$i] = mysql_real_escape_string($class_teacher[$i]);
    $class_teacher_grade[$i] = mysql_real_escape_string($class_teacher_grade[$i]);
    $inputs_from_crm[$i] = mysql_real_escape_string($inputs_from_crm[$i]);
    $special_concern[$i] = mysql_real_escape_string($special_concern[$i]);

$update = "UPDATE crm_2015_spring SET 
class_teacher_teacher = '".$class_teacher_teacher."',   
class_teacher = '".$class_teacher[$i]."',
class_teacher_grade = '".$class_teacher_grade[$i]."',
inputs_from_crm = '".$inputs_from_crm[$i]."',
special_concern = '".$special_concern[$i]."',
last_update_teacher = '$last_update_teacher',
last_update_date = '$last_update_date',
update_from = '$update_from'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//house_parent area//
if (isset($_POST['house_parent']))
{
$adm = $_POST['adm'];
$house_parent_teacher = $_POST['house_parent_teacher'];
$house_parent = $_POST['house_parent'];
$house_parent_grade = $_POST['house_parent_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $house_parent[$i] = mysql_real_escape_string($house_parent[$i]);
    $house_parent_grade[$i] = mysql_real_escape_string($house_parent_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
house_parent_teacher = '".$house_parent_teacher."',   
house_parent = '".$house_parent[$i]."',
house_parent_grade = '".$house_parent_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//english area//
if (isset($_POST['english']))
{
$adm = $_POST['adm'];
$english_teacher = $_POST['english_teacher'];
$english = $_POST['english'];
$english_grade = $_POST['english_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $english[$i] = mysql_real_escape_string($english[$i]);
    $english_grade[$i] = mysql_real_escape_string($english_grade[$i]);
    

$update = "UPDATE crm_2015_spring SET 
english_teacher = '".$english_teacher."',   
english = '".$english[$i]."',
english_grade = '".$english_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//hindi area//
if (isset($_POST['hindi']))
{
$adm = $_POST['adm'];
$hindi_teacher = $_POST['hindi_teacher'];
$hindi = $_POST['hindi'];
$hindi_grade = $_POST['hindi_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $hindi[$i] = mysql_real_escape_string($hindi[$i]);
    $hindi_grade[$i] = mysql_real_escape_string($hindi_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
hindi_teacher = '".$hindi_teacher."',   
hindi = '".$hindi[$i]."',
hindi_grade = '".$hindi_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//marathi area//
if (isset($_POST['marathi']))
{
$adm = $_POST['adm'];
$marathi_teacher = $_POST['marathi_teacher'];
$marathi = $_POST['marathi'];
$marathi_grade = $_POST['marathi_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $marathi[$i] = mysql_real_escape_string($marathi[$i]);
    $marathi_grade[$i] = mysql_real_escape_string($marathi_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
marathi_teacher = '".$marathi_teacher."',   
marathi = '".$marathi[$i]."',
marathi_grade = '".$marathi_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//social_studies area//
if (isset($_POST['social_studies']))
{
$adm = $_POST['adm'];
$social_studies_teacher = $_POST['social_studies_teacher'];
$social_studies = $_POST['social_studies'];
$social_studies_grade = $_POST['social_studies_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $social_studies[$i] = mysql_real_escape_string($social_studies[$i]);
    $social_studies_grade[$i] = mysql_real_escape_string($social_studies_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
social_studies_teacher = '".$social_studies_teacher."',   
social_studies = '".$social_studies[$i]."',
social_studies_grade = '".$social_studies_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//history area//
if (isset($_POST['history']))
{
$adm = $_POST['adm'];
$history_teacher = $_POST['history_teacher'];
$history = $_POST['history'];
$history_grade = $_POST['history_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $history[$i] = mysql_real_escape_string($history[$i]);
    $history_grade[$i] = mysql_real_escape_string($history_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
history_teacher = '".$history_teacher."',   
history = '".$history[$i]."',
history_grade = '".$history_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//geography area//
if (isset($_POST['geography']))
{
$adm = $_POST['adm'];
$geography_teacher = $_POST['geography_teacher'];
$geography = $_POST['geography'];
$geography_grade = $_POST['geography_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $geography[$i] = mysql_real_escape_string($geography[$i]);
    $geography_grade[$i] = mysql_real_escape_string($geography_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
geography_teacher = '".$geography_teacher."',   
geography = '".$geography[$i]."',
geography_grade = '".$geography_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//maths area//
if (isset($_POST['maths']))
{
$adm = $_POST['adm'];
$maths_teacher = $_POST['maths_teacher'];
$maths = $_POST['maths'];
$maths_grade = $_POST['maths_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $maths[$i] = mysql_real_escape_string($maths[$i]);
    $maths_grade[$i] = mysql_real_escape_string($maths_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
maths_teacher = '".$maths_teacher."',   
maths = '".$maths[$i]."',
maths_grade = '".$maths_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//science area//
if (isset($_POST['science']))
{
$adm = $_POST['adm'];
$science_teacher = $_POST['science_teacher'];
$science = $_POST['science'];
$science_grade = $_POST['science_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $science[$i] = mysql_real_escape_string($science[$i]);
    $science_grade[$i] = mysql_real_escape_string($science_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
science_teacher = '".$science_teacher."',   
science = '".$science[$i]."',
science_grade = '".$science_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//biology area//
if (isset($_POST['biology']))
{
$adm = $_POST['adm'];
$biology_teacher = $_POST['biology_teacher'];
$biology = $_POST['biology'];
$biology_grade = $_POST['biology_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $biology[$i] = mysql_real_escape_string($biology[$i]);
    $biology_grade[$i] = mysql_real_escape_string($biology_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
biology_teacher = '".$biology_teacher."',   
biology = '".$biology[$i]."',
biology_grade = '".$biology_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//chemistry area//
if (isset($_POST['chemistry']))
{
$adm = $_POST['adm'];
$chemistry_teacher = $_POST['chemistry_teacher'];
$chemistry = $_POST['chemistry'];
$chemistry_grade = $_POST['chemistry_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $chemistry[$i] = mysql_real_escape_string($chemistry[$i]);
    $chemistry_grade[$i] = mysql_real_escape_string($chemistry_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
chemistry_teacher = '".$chemistry_teacher."',   
chemistry = '".$chemistry[$i]."',
chemistry_grade = '".$chemistry_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//physics area//
if (isset($_POST['physics']))
{
$adm = $_POST['adm'];
$physics_teacher = $_POST['physics_teacher'];
$physics = $_POST['physics'];
$physics_grade = $_POST['physics_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $physics[$i] = mysql_real_escape_string($physics[$i]);
    $physics_grade[$i] = mysql_real_escape_string($physics_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
physics_teacher = '".$physics_teacher."',   
physics = '".$physics[$i]."',
physics_grade = '".$physics_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//resource_room area//
if (isset($_POST['resource_room']))
{
$adm = $_POST['adm'];
$resource_room_teacher = $_POST['resource_room_teacher'];
$resource_room = $_POST['resource_room'];
$resource_room_grade = $_POST['resource_room_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $resource_room[$i] = mysql_real_escape_string($resource_room[$i]);
    $resource_room_grade[$i] = mysql_real_escape_string($resource_room_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
resource_room_teacher = '".$resource_room_teacher."',   
resource_room = '".$resource_room[$i]."',
resource_room_grade = '".$resource_room_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//games area//
if (isset($_POST['games']))
{
$adm = $_POST['adm'];
$games_teacher = $_POST['games_teacher'];
$games = $_POST['games'];
$games_grade = $_POST['games_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $games[$i] = mysql_real_escape_string($games[$i]);
    $games_grade[$i] = mysql_real_escape_string($games_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
games_teacher = '".$games_teacher."',   
games = '".$games[$i]."',
games_grade = '".$games_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//yoga area//
if (isset($_POST['yoga']))
{
$adm = $_POST['adm'];
$yoga_teacher = $_POST['yoga_teacher'];
$yoga = $_POST['yoga'];
$yoga_grade = $_POST['yoga_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $yoga[$i] = mysql_real_escape_string($yoga[$i]);
    $yoga_grade[$i] = mysql_real_escape_string($yoga_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
yoga_teacher = '".$yoga_teacher."',   
yoga = '".$yoga[$i]."',
yoga_grade = '".$yoga_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//art area//
if (isset($_POST['art']))
{
$adm = $_POST['adm'];
$art_teacher = $_POST['art_teacher'];
$art = $_POST['art'];
$art_grade = $_POST['art_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $art[$i] = mysql_real_escape_string($art[$i]);
    $art_grade[$i] = mysql_real_escape_string($art_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
art_teacher = '".$art_teacher."',   
art = '".$art[$i]."',
art_grade = '".$art_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//music area//
if (isset($_POST['music']))
{
$adm = $_POST['adm'];
$music_teacher = $_POST['music_teacher'];
$music = $_POST['music'];
$music_grade = $_POST['music_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $music[$i] = mysql_real_escape_string($music[$i]);
    $music_grade[$i] = mysql_real_escape_string($music_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
music_teacher = '".$music_teacher."',   
music = '".$music[$i]."',
music_grade = '".$music_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//computer_app area//
if (isset($_POST['computer_app']))
{
$adm = $_POST['adm'];
$computer_app_teacher = $_POST['computer_app_teacher'];
$computer_app = $_POST['computer_app'];
$computer_app_grade = $_POST['computer_app_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $computer_app[$i] = mysql_real_escape_string($computer_app[$i]);
    $computer_app_grade[$i] = mysql_real_escape_string($computer_app_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
computer_app_teacher = '".$computer_app_teacher."',   
computer_app = '".$computer_app[$i]."',
computer_app_grade = '".$computer_app_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}

//commercial_studies//
if (isset($_POST['commercial_studies']))
{
$adm = $_POST['adm'];
$commercial_studies_teacher = $_POST['commercial_studies_teacher'];
$commercial_studies = $_POST['commercial_studies'];
$commercial_studies_grade = $_POST['commercial_studies_grade'];

$limit = count($adm);

for($i=0;$i<$limit;$i++) {
    $adm[$i] = mysql_real_escape_string($adm[$i]);
    $commercial_studies[$i] = mysql_real_escape_string($commercial_studies[$i]);
    $commercial_studies_grade[$i] = mysql_real_escape_string($commercial_studies_grade[$i]);

$update = "UPDATE crm_2015_spring SET 
commercial_studies_teacher = '".$commercial_studies_teacher."',   
commercial_studies = '".$commercial_studies[$i]."',
commercial_studies_grade = '".$commercial_studies_grade[$i]."',
last_update_teacher = '".$last_update_teacher."',
last_update_date = '".$last_update_date."',
update_from = '".$update_from."'
WHERE adm = '".$adm[$i]."'";
$rsUpdate = mysql_query($update);
}
}


//economics_app//
if (isset($_POST['economics_app']))
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

$update = "UPDATE crm_2015_spring SET 
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
?>


</body>
</html>

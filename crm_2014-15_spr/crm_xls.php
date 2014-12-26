<?php
include("connect.php");
$class = $_GET['class'];
ob_start();
mysql_connect('localhost','thevall7_erp','thevalleyschool123');
mysql_select_db('thevall7_erp_crm_db');

//*************************************** classes 4,5 & 6 ***************************************// 
if ($class == '4' || $class == '5' || $class == '6A' || $class == '6B')
{
$sql = ("SELECT name, 
class_teacher_teacher, class_teacher, class_teacher_grade,
house_parent_teacher, house_parent, house_parent_grade,
english_teacher, english, english_grade,
hindi_teacher, hindi, hindi_grade,
marathi_teacher, marathi, marathi_grade,
social_studies_teacher, social_studies, social_studies_grade,
science_teacher, science, science_grade,
maths_teacher, maths, maths_grade,
resource_room_teacher, resource_room, resource_room_grade,
games_teacher, games, games_grade,
yoga_teacher, yoga, yoga_grade,
art_teacher, art, art_grade,
music_teacher, music, music_grade, 
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(social_studies_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(science_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(social_studies_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(science_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(social_studies_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(science_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`, remarks, inputs_from_crm
FROM crm_2015_spring WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
}

//******************************************* class 7A & 7B ***********************************************//
if ($class == '7A' || $class == '7B')
{
$sql = ("SELECT name, 
class_teacher_teacher, class_teacher, class_teacher_grade,
house_parent_teacher, house_parent, house_parent_grade,
english_teacher, english, english_grade,
hindi_teacher, hindi, hindi_grade,
marathi_teacher, marathi, marathi_grade,
history_teacher, history, history_grade,
geography_teacher, geography, geography_grade,
science_teacher, science, science_grade,
maths_teacher, maths, maths_grade,
resource_room_teacher, resource_room, resource_room_grade,
games_teacher, games, games_grade,
yoga_teacher, yoga, yoga_grade,
art_teacher, art, art_grade,
music_teacher, music, music_grade, 
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(science_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(science_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(science_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`, remarks, inputs_from_crm
FROM crm_2015_spring WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
}



//*************************************** classes 8A & 8B******************************************//
if ($class == '8A' || $class == '8B')
{
$sql = ("SELECT name, 
class_teacher_teacher, class_teacher, class_teacher_grade,
house_parent_teacher, house_parent, house_parent_grade,
english_teacher, english, english_grade,
hindi_teacher, hindi, hindi_grade,
marathi_teacher, marathi, marathi_grade,
history_teacher, history, history_grade,
geography_teacher, geography, geography_grade,
physics_teacher, physics, physics_grade,
chemistry_teacher, chemistry, chemistry_grade,
biology_teacher, biology, biology_grade,
maths_teacher, maths, maths_grade,
resource_room_teacher, resource_room, resource_room_grade,
games_teacher, games, games_grade,
yoga_teacher, yoga, yoga_grade,
art_teacher, art, art_grade,
music_teacher, music, music_grade, 
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(physics_grade LIKE 'A%',1,0)+
IF(chemistry_grade LIKE 'A%',1,0)+
IF(biology_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(physics_grade LIKE 'B%',1,0)+
IF(chemistry_grade LIKE 'B%',1,0)+
IF(biology_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(physics_grade LIKE 'C%',1,0)+
IF(chemistry_grade LIKE 'C%',1,0)+
IF(biology_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`, remarks, inputs_from_crm
FROM crm_2015_spring WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
}


//*********************************************classes 9A & 9B Area************************************************//
if ($class == '9A' || $class == '9B')
{
$sql = ("SELECT name, 
class_teacher_teacher, class_teacher, class_teacher_grade,
house_parent_teacher, house_parent, house_parent_grade,
english_teacher, english, english_grade,
hindi_teacher, hindi, hindi_grade,
marathi_teacher, marathi, marathi_grade,
history_teacher, history, history_grade,
geography_teacher, geography, geography_grade,
physics_teacher, physics, physics_grade,
chemistry_teacher, chemistry, chemistry_grade,
maths_teacher, maths, maths_grade,
resource_room_teacher, resource_room, resource_room_grade,
games_teacher, games, games_grade,
yoga_teacher, yoga, yoga_grade,
art_teacher, art, art_grade,
commercial_studies_teacher, commercial_studies, commercial_studies_grade,
economics_app_teacher, economics_app, economics_app_grade,
computer_app_teacher, computer_app, computer_app_grade,
music_teacher, music, music_grade, 
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(physics_grade LIKE 'A%',1,0)+
IF(chemistry_grade LIKE 'A%',1,0)+
IF(biology_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(commercial_studies_grade LIKE 'A%',1,0)+
IF(economics_app_grade LIKE 'A%',1,0)+
IF(computer_app_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(physics_grade LIKE 'B%',1,0)+
IF(chemistry_grade LIKE 'B%',1,0)+
IF(biology_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(commercial_studies_grade LIKE 'B%',1,0)+
IF(economics_app_grade LIKE 'B%',1,0)+
IF(computer_app_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(physics_grade LIKE 'C%',1,0)+
IF(chemistry_grade LIKE 'C%',1,0)+
IF(biology_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(commercial_studies_grade LIKE 'C%',1,0)+
IF(economics_app_grade LIKE 'C%',1,0)+
IF(computer_app_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`, remarks, inputs_from_crm
FROM crm_2015_spring WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
}


//class 10A & 10B//
if ($class == '10A' || $class == '10B')
{
$sql = ("SELECT name, 
class_teacher_teacher, class_teacher, class_teacher_grade,
house_parent_teacher, house_parent, house_parent_grade,
english_teacher, english, english_grade,
hindi_teacher, hindi, hindi_grade,
marathi_teacher, marathi, marathi_grade,
history_teacher, history, history_grade,
geography_teacher, geography, geography_grade,
physics_teacher, physics, physics_grade,
chemistry_teacher, chemistry, chemistry_grade,
maths_teacher, maths, maths_grade,
resource_room_teacher, resource_room, resource_room_grade,
games_teacher, games, games_grade,
yoga_teacher, yoga, yoga_grade,
art_teacher, art, art_grade,
economics_app_teacher, economics_app, economics_app_grade,
computer_app_teacher, computer_app, computer_app_grade,
music_teacher, music, music_grade, 
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(physics_grade LIKE 'A%',1,0)+
IF(chemistry_grade LIKE 'A%',1,0)+
IF(biology_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(economics_app_grade LIKE 'A%',1,0)+
IF(computer_app_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(physics_grade LIKE 'B%',1,0)+
IF(chemistry_grade LIKE 'B%',1,0)+
IF(biology_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(economics_app_grade LIKE 'B%',1,0)+
IF(computer_app_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(physics_grade LIKE 'C%',1,0)+
IF(chemistry_grade LIKE 'C%',1,0)+
IF(biology_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(economics_app_grade LIKE 'C%',1,0)+
IF(computer_app_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`, remarks, inputs_from_crm
FROM crm_2015_spring WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
}

$res = mysql_query( $sql) or die();
 
$count = mysql_num_fields($res);

 // fetch table header from database
 $header = '';
 for ($i = 0; $i < $count; $i++){
    $header .= mysql_field_name($res, $i)."\t";
    }

 // fetch data each row, store on tabular row data
 while($row = mysql_fetch_row($res)){
   $line = '';
   foreach($row as $value){
   if(!isset($value) || $value == ""){
     $value = "\t";
   }else{
     $value = str_replace('"', '""', $value);
     $value = '"' . $value . '"' . "\t";
   }
   $line .= $value;
   }
   $data .= trim($line)."\n";
   $data = str_replace("\r", "", $data);
  }
 
 $name='CRM_Report_'.$class.'.xls';
 header("Content-type:application/vnd.ms-excel;name='excel'");
 header("Content-Disposition: attachment; filename=$name");
 header("Pragma: no-cache");
 header("Expires: 0");

 // Output data
 echo $header."\n\n".$data;
 ?>

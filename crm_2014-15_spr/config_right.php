<?php

include("../staff/connect.php");
$user_name = $_SESSION['user_name'] ;

//define subjects// 
$data_teach=mysql_query("SELECT class_teacher_of, house_parent_of, teach_area, teach_area_1 FROM staff WHERE login_name = '$user_name'");

while($result_teach = mysql_fetch_array( $data_teach ))		
{
$class_teacher_of = $result_teach['class_teacher_of'];
$house_parent_of = $result_teach['house_parent_of'];
$teach_area = $result_teach['teach_area'];
$teach_area_1 = $result_teach['teach_area_1'];
}

$anymatches=mysql_num_rows($data_teach);
if ($anymatches == 0)
 {
$class_teacher_of = '';
$house_parent_of = '';
$teach_area = '';
$teach_area_1 = '';
}

//class teacher rights
if ($class_teacher_of == $find || $_SESSION['user_level'] == '1')
{
$clt_readonly = '';
$clt_disabled = '';
}
else
{
$clt_readonly = 'readonly=readonly';
$clt_disabled = 'disabled';
}


//house parent rights
if ($house_parent_of != '' || $_SESSION['user_level'] == '1')
{
$hp_readonly = '';
$hp_disabled = '';
}
else
{
$hp_readonly = 'readonly=readonly';
$hp_disabled = 'disabled';
}


//english rights
if ($teach_area == 'English' || $teach_area_1 == 'English' || $_SESSION['user_level'] == '1')
{
$eng_readonly = '';
$eng_disabled = '';
}
else
{
$eng_readonly = 'readonly=readonly';
$eng_disabled = 'disabled';
}


if ($teach_area == 'Hindi' || $teach_area_1 == 'Hindi' || $_SESSION['user_level'] == '1')
{
$hin_readonly = '';
$hin_disabled = '';
}
else
{
$hin_readonly = 'readonly=readonly';
$hin_disabled = 'disabled';
}


if ($teach_area == 'History' || $teach_area_1 == 'History' || $_SESSION['user_level'] == '1')
{
$his_readonly = '';
$his_disabled = '';
}
else
{
$his_readonly = 'readonly=readonly';
$his_disabled = 'disabled';
}

if ($teach_area == 'Gogoraphy' || $teach_area_1 == 'Gogoraphy' || $_SESSION['user_level'] == '1')
{
$gog_readonly = '';
$gog_disabled = '';
}
else
{
$gog_readonly = 'readonly=readonly';
$gog_disabled = 'disabled';
}


if ($teach_area == 'Social Studies' || $teach_area_1 == 'Social Studies' || $_SESSION['user_level'] == '1')
{
$st_readonly = '';
$st_disabled = '';
}
else
{
$st_readonly = 'readonly=readonly';
$st_disabled = 'disabled';
}

if ($teach_area == 'Mathematics' || $teach_area_1 == 'Mathematics' || $_SESSION['user_level'] == '1')
{
$maths_readonly = '';
$maths_disabled = '';
}
else
{
$maths_readonly = 'readonly=readonly';
$maths_disabled = 'disabled';
}

if ($teach_area == 'Science' || $teach_area_1 == 'Science' || $_SESSION['user_level'] == '1')
{
$sc_readonly = '';
$sc_disabled = '';
}
else
{
$sc_readonly = 'readonly=readonly';
$sc_disabled = 'disabled';
}

if ($teach_area == 'Physics' || $teach_area_1 == 'Physics' || $_SESSION['user_level'] == '1')
{
$phy_readonly = '';
$phy_disabled = '';
}
else
{
$phy_readonly = 'readonly=readonly';
$phy_disabled = 'disabled';
}

if ($teach_area == 'Chemistry' || $teach_area_1 == 'Chemistry' || $_SESSION['user_level'] == '1')
{
$chm_readonly = '';
$chm_disabled = '';
}
else
{
$chm_readonly = 'readonly=readonly';
$chm_disabled = 'disabled';
}


if ($teach_area == 'Biology' || $teach_area_1 == 'Biology' || $_SESSION['user_level'] == '1')
{
$bio_readonly = '';
$bio_disabled = '';
}
else
{
$bio_readonly = 'readonly=readonly';
$bio_disabled = 'disabled';
}

if ($teach_area == 'Resource Room' || $teach_area_1 == 'Resource Room' || $_SESSION['user_level'] == '1')
{
$re_readonly = '';
$re_disabled = '';
}
else
{
$re_readonly = 'readonly=readonly';
$re_disabled = 'disabled';
}


if ($teach_area == 'Games' || $teach_area_1 == 'Games' || $_SESSION['user_level'] == '1')
{
$gm_readonly = '';
$gm_disabled = '';
}
else
{
$gm_readonly = 'readonly=readonly';
$gm_disabled = 'disabled';
}


if ($teach_area == 'Yoga' || $teach_area_1 == 'Yoga' || $_SESSION['user_level'] == '1')
{
$y_readonly = '';
$y_disabled = '';
}
else
{
$y_readonly = 'readonly=readonly';
$y_disabled = 'disabled';
}

if ($teach_area == 'Art' || $teach_area_1 == 'Art' || $_SESSION['user_level'] == '1')
{
$art_readonly = '';
$art_disabled = '';
}
else
{
$art_readonly = 'readonly=readonly';
$art_disabled = 'disabled';
}


if ($teach_area == 'Music' || $teach_area_1 == 'Music' || $_SESSION['user_level'] == '1')
{
$m_readonly = '';
$m_disabled = '';
}
else
{
$m_readonly = 'readonly=readonly';
$m_disabled = 'disabled';
}
?>

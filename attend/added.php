<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type = "text/javascript" >

window.history.forward();

</script>
</head>
<body>

<?php

include ("connect.php");

$st_name = $_POST['st_name'];
$st_adm = $_POST['st_adm'];
$st_class = $_POST['st_class'];
$st_area = $_POST['st_area'];
$st_house = $_POST['st_house'];
$attend_code = $_POST['attend_code'];
$coment = $_POST['coment'];

$school_date = $_POST['school_date'];
$attend_date = date("Y-m-d");
$attend_time = date("H:i:s");

session_start ();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$attend_teacher = $_SESSION['user_name'] ;
}

$limit = count($st_name);

for($i=0;$i<$limit;$i++) {
    $st_name[$i] = mysql_real_escape_string($st_name[$i]);
    $st_adm[$i] = mysql_real_escape_string($st_adm[$i]);
    $st_class[$i] = mysql_real_escape_string($st_class[$i]);
    $st_area[$i] = mysql_real_escape_string($st_area[$i]);
    $st_house[$i] = mysql_real_escape_string($st_house[$i]);
    $attend_code[$i] = mysql_real_escape_string($attend_code[$i]);
    $coment[$i] = mysql_real_escape_string($coment[$i]);

    $query = "INSERT INTO attend (st_name, st_adm, st_class, st_area, st_house, attend_code, school_date, coment, attend_date, attend_time, attend_teacher) VALUES ('".$st_name[$i]."', '".$st_adm[$i]."', '".$st_class[$i]."', '".$st_area[$i]."', '".$st_house[$i]."', '".$attend_code[$i]."', '".$school_date."', '".$coment[$i]."', '".$attend_date."', '".$attend_time."', '".$attend_teacher."')";

$results = mysql_query($query);

   if($results)
{

header ("Location: add.php");

}else{ echo "Not Successfull"; }
}
?>



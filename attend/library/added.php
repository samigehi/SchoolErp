<html>
<head>
<title>Items : issued</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../av_records/css/new.css" rel="stylesheet" type="text/css" />
<script type = "text/javascript" >
window.history.forward();
</script>
</head>
<body>
<?php
if (isset($_POST['submit'])){
include ("connect.php");

$av_date = $_POST['av_date'];
$event = $_POST['event'];
$event_holder = $_POST['event_holder'];
$requirement1 = $_POST['requirement1'];
$requirement2 = $_POST['requirement2'];
$requirement3 = $_POST['requirement3'];
$av_name = $_POST['av_name'];
$attend_code = $_POST['attend_code'];
$av_remark = $_POST['av_remark'];

$limit = count($av_name);

for($i=0;$i<$limit;$i++) {
    $av_name[$i] = mysql_real_escape_string($av_name[$i]);
    $attend_code[$i] = mysql_real_escape_string($attend_code[$i]);
    $av_remark[$i] = mysql_real_escape_string($av_remark[$i]);

    $query = "INSERT INTO av_records (av_date, event, event_holder, requirement1, requirement2 ,requirement3, av_name, attend_code, av_remark) VALUES ('".$av_date."', '".$event."', '".$event_holder."', '".$requirement1."', '".$requirement2."', '". $requirement3."', '".$av_name[$i]."', '".$attend_code[$i]."', '".$av_remark[$i]."')";

$results = mysql_query($query);
}

mysql_close();

if($results)
{
header ("Location: ../av_records/add.php");
}

if(!$results)
{
echo "Not Sucessfull!";
}
}
?>



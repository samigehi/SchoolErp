<html>
<head>
<title>delete record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

include("index.php");
include("connect.php");

$id = $_GET['id'];

$qP = "delete FROM diagnosis_name WHERE id = '$id'";

$delete = mysql_query($qP);

mysql_close();


if ($delete)
{
header ("Location: diagnosis_add.php");
}

if (!$delete)
{
echo mysql_error();
}

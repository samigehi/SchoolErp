<html>
<head>
<title>upload staff photo...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
include("connect.php");

if (!isset($_POST['upload'])){

$id = $_GET['id'];

$qP = "SELECT * FROM staff WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$staff_name = trim($staff_name);
$designation = trim($designation);
$idphoto = trim($idphoto);

mysql_close();
?>


<div class=addform>
<div class="contentA">
<table class=table1>
<h3><font color=yellow>Upload profile photo</font></h3>

<tr>
<td class=td1 style="text-align:center;">
<b><?php echo $staff_name;?>'s profile Photo: </b><br><br><img style="background:lightgreen;" class="img2" src="upload/<?php echo $idphoto;?>"></td></tr><br>

<tr>
<!----------------------------- PHOTO UPLOAD Form --------------------------->
<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'office' || $_SESSION['user_name'] == 'dilip')
{
?>
<td class=td1 style="text-align:center;"> 
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<lable> Filename: </lable>
<input type="file" name="idphoto" id="file" />
<input type="submit" name="upload" value="Upload" />
<input type="hidden" name="id" value="<?=$id;?>">
</form>
<?php
}
?>

<?php
}

if (isset($_POST['upload'])){

$id = $_POST['id'];

if ((($_FILES["idphoto"]["type"] == "image/gif")
|| ($_FILES["idphoto"]["type"] == "image/jpeg")
|| ($_FILES["idphoto"]["type"] == "image/pjpeg"))
&& ($_FILES["idphoto"]["size"] < 20000))
  {
  if ($_FILES["idphoto"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["idphoto"]["error"] . "<br />";
    }
  
    if (file_exists("upload/" . $_FILES["idphoto"]["name"]))
      {
      echo $_FILES["idphoto"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["idphoto"]["tmp_name"],
      "upload/" . $_FILES["idphoto"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["idphoto"]["name"];

	}     
	}

if(move_uploaded_file($_FILES['idphoto']['tmp_name'], "upload/" . $_FILES["idphoto"]["name"]))
{
//upload file to databse
include("connect.php");

$idphoto = ($_FILES["idphoto"]["name"]);

//Writes the information to the database
$query = "UPDATE staff set idphoto = '$idphoto' WHERE id = '$id'";

$upload_query = mysql_query($query);
 
if ($upload_query)
{ 
header ("Location: search.php?id=$id");
 }  

 	 
if (!$upload_query)
{ 
echo "Not successful! Please try again.";
} 
}
}
?>
</td></tr>
</table>
</div>
</body>
</html>

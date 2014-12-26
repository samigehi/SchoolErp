<html>
<head>
<title>upload std photo...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
include("connect.php");

if (isset($_GET['id'])){
$id = $_GET['id'];
$find = $_GET['find'];
$field = $_GET['field'];

$qP = "SELECT * FROM std_2013_14 WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$name = trim($name);
$class = trim($class);
$idphoto = trim($idphoto);

mysql_close();
?>

<div class=addform>
<div class="contentA">
<table class=table1>
<h3>Upload profile photo</h3>

<tr>
<td class=td1 style="text-align:center;">
<b><?php echo $name;?>'s profile Photo: </b><br><br><img style="background:lightgreen;" class="img2" src="upload/<?php echo $class;?>/<?php echo $idphoto;?>"></td></tr><br>

<tr>
<!----------------------------- PHOTO UPLOAD Form --------------------------->
<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'office' || $_SESSION['user_name'] == 'dilip')
{
?>
<td class=td1 style="text-align:center;"> 
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<lable> Filename: </lable>
<input type="file" name="idphoto" id="file" />
<input type="submit" name="upload" value="Upload" />
<input type="hidden" name="id" value="<?=$id;?>">
<input type="hidden" name="find" value="<?=$find;?>">
<input type="hidden" name="field" value="<?=$field;?>">
<input type="hidden" name="class" value="<?php echo $class;?>">
</form>
<?php
}
}

if (isset($_POST['upload'])){

$class = $_POST['class'];
$id = $_POST['id'];
$find = $_POST['find'];
$field = $_POST['field'];

if ((($_FILES["idphoto"]["type"] == "image/gif")
|| ($_FILES["idphoto"]["type"] == "image/jpeg")
|| ($_FILES["idphoto"]["type"] == "image/pjpeg"))
&& ($_FILES["idphoto"]["size"] < 20000))
  {
  if ($_FILES["idphoto"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["idphoto"]["error"] . "<br />";
    }
  
    if (file_exists("upload/$class/" . $_FILES["idphoto"]["name"]))
      {
      echo $_FILES["idphoto"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["idphoto"]["tmp_name"],
      "upload/$class/" . $_FILES["idphoto"]["name"]);
      echo "Stored in: " . "upload/$class/" . $_FILES["idphoto"]["name"];
	}     
	}

if(move_uploaded_file($_FILES['idphoto']['tmp_name'], "upload/$class/" . $_FILES["idphoto"]["name"]))
{
//upload file to databse
include("connect.php");

$idphoto = ($_FILES["idphoto"]["name"]);

//Writes the information to the database
$query = "UPDATE std_2013_14 set idphoto = '$idphoto' WHERE id = '$id'";

$upload_query = mysql_query($query);
 
mysql_close();
if ($upload_query)
{ 
header("Location: search.php?find=$find&field=$field");
}   	 
}
}
?>
</td></tr>
</table>
</div>
</body>
</html>

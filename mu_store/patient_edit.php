<html>
<head>
<title>Medical unit | Edit records</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");

include ("connect.php");
$id = $_GET['id'];
$qP = "SELECT * FROM patient_records WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$id = trim($id);
$customer_name = trim($customer_name);
$pt_date = trim($pt_date);
$complaint = trim($complaint);
$diagnosis = trim($diagnosis);
$dr_remark = trim($dr_remark);
?>
<h3>Edit Patient Records</h3>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form1">
<table class=table1>
<tr>
<th class=th1 style="width:100px;">Patient's Name</th>
<th class=th1 style="width:10px;">Date</th>
<th class=th1 style="width:20px;">Complaint</th>
<th class=th1 style="width:10px;">Diagnosis</th>
<th class=th1 style="width:30px;">Dr Remark</th>
<th class=th1 style="width:10px;">Option</th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input type="text" readonly=readonly size="20" name="customer_name" value="<?php echo $customer_name; ?>"></td>
<td class=td1 style="width:30px;"><input type="text" name="pt_date" size="10" value="<?php echo $pt_date;?>"></td>
<td class=td1><input type="text" name="complaint" size="25" value="<?php echo $complaint;?>"></td>
<td class=td1><input type="text" name="diagnosis" size="15" value="<?php echo $diagnosis;?>"></td>
<td class=td1><input type="text" name="dr_remark" size="20" value="<?php echo $dr_remark;?>"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="submit" value="save"><input type="hidden" name="id" value="<?php echo $id;?>"></td>
</tr>

</table>
</form>
</br>
</div>

<?php
if (isset($_GET['submit'])){
$id = $_GET['id'];
$customer_name = trim($_GET['customer_name']);
$pt_date = trim($_GET['pt_date']);
$complaint = trim($_GET['complaint']);
$diagnosis = trim($_GET['diagnosis']);
$dr_remark = trim($_GET['dr_remark']);

$edit = "UPDATE patient_records SET customer_name = '$customer_name', pt_date = '$pt_date', complaint = '$complaint', diagnosis = '$diagnosis', dr_remark = '$dr_remark' WHERE id = '$id'";
$update = mysql_query($edit);
if($update)
{
header ("Location: patient_details.php");
}

if(!$update)
{
echo "Not Sucessfull!";
}
mysql_close();
}
?>
</body>
</html>

<?php
include("index.php");
include "connect.php";

$id = $_GET['id'];

$qP = "SELECT * FROM staff WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$staff_name = trim($staff_name);
$birth_date = trim($birth_date);
$join_date = trim($join_date);
$staff_email = trim($staff_email);
$designation = trim($designation);
$department = trim($department);
$gender = trim($gender);

$bld_group = trim($bld_group);
$address = trim($address);
$city = trim($city);
$postalcode = trim($postalcode);
$state = trim($state);
$country = trim($country);
$phone = trim($phone);
$mobile_no = trim($mobile_no);

$html='
<html>
<body>

<div style="text-align:left;"><p style="font-size:10px;"><b>Sahyadri School</b><br>
Krishnamurti Foundation India</p>
</div>

<div style="text-align:center;"><p style="font-size:11px;">'.$staff_name.''."'s".' Details</p></div>

<table style="font-family:verdana,arial,sans-serif; margin:auto auto auto auto; width:90%; font-size:9.5px; color:#333333; border-width:1px; border-color:#999999; border-collapse: collapse;">

<tr>
<td style="border:0px; padding:5px;"><b>'."Staff's Information:".'</b></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="width:280px; border:.5px solid gray; padding:5px;"> Photo: </td>
<td style="text-align:center; border:.5px solid gray; padding:5px;">
<img style="border:1px solid orange; padding:2px;" width=80 height=90 src="upload/'.$idphoto.'"></td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Name: </td>
<td style="border:.5px solid gray; padding:5px;">'.$staff_name.'</td>
</tr>


<tr>
<td style="border:.5px solid gray; padding:5px;"> Designation: </td>
<td style="border:.5px solid gray; padding:5px;">'.$designation.'</td>
</tr>


<tr>
<td style="border:.5px solid gray; padding:5px;"> Department: </td>
<td style="border:.5px solid gray; padding:5px;">'.$department.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Email: </td>
<td style="border:.5px solid gray; padding:5px;">'.$staff_email.'</td>
</tr>	
	

<tr>
<td style="border:.5px solid gray; padding:5px;"> Date of Birth: </td>
<td style="border:.5px solid gray; padding:5px;">'.$birth_date.'</td>
</tr>		

<tr>
<td style="border:.5px solid gray; padding:5px;"> Date of Join: </td>
<td style="border:.5px solid gray; padding:5px;">'.$join_date.'</td>
</tr>


<tr>
<td style="border:.5px solid gray; padding:5px;"> Blood Group: </td>
<td style="border:.5px solid gray; padding:5px;">'.$bld_group.'</td>
</tr>	

<tr>
<td style="border:.5px solid gray; padding:5px;"> Gender: </td>
<td style="border:.5px solid gray; padding:5px;">'.$gender.'</td>
</tr>

<tr>
<td style="border:0px; padding:5px;"></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="border:0px; padding:5px;"><b>Contact & Address </b></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Phone No: </td>
<td style="border:.5px solid gray; padding:5px;">'.$phone.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Mobile No: </td>
<td style="border:.5px solid gray; padding:5px;">'.$mobile_no.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Street Address: </td>
<td style="border:.5px solid gray; padding:5px;">'.$address.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> City/Town: </td>
<td style="border:.5px solid gray; padding:5px;">'.$city.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Postal Code: </td>
<td style="border:.5px solid gray; padding:5px;">'.$postalcode.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> State: </td>
<td style="border:.5px solid gray; padding:5px;">'.$state.'</td>
</tr>


<tr>
<td style="border:.5px solid gray; padding:5px;"> Country: </td>
<td style="border:.5px solid gray; padding:5px;">'.$country.'</td>
</tr>

</table>



</body>
</html>	
';


//==============================================================
//==============================================================
//==============================================================

include("../std/app_pdf/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================

?>

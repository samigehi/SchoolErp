<?php
include("index.php");
include "connect.php";

$adm = $_GET['adm'];

$qP = "SELECT * FROM std_2013_14 WHERE adm = '$adm'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$adm = trim($adm);
$name = trim($name);
$birth_date = trim($birth_date);
$adm_date = trim($adm_date);
$sex = trim($sex);
$class = trim($class);
$bldgroup = trim($bldgroup);
$class_teach = trim($class_teach);
$house = trim($house);
$house_parent = trim($house_parent);
$hobby_1 = trim($hobby_1);
$hobby_2 = trim($hobby_2);
$hobby_3 = trim($hobby_3);
$six_sub = trim($six_sub);
$second_lang = trim($second_lang);
$parent1 = trim($parent1);
$parent2 = trim($parent2);
$occupation = trim($occupation);
$occupation_2 = trim($occupation_2);
$address1 = trim($address1);
//$address2 = trim($address2);
//$address3 = trim($address3);
$city = trim($city);
$postalcode = trim($postalcode);
$state = trim($state);
$country = trim($country);
$phone = trim($phone);
$mobile_no = trim($mobile_no);
$mobile_no_2 = trim($mobile_no_2);
$email = trim($email);
$email_2 = trim($email_2);
$idphoto = trim($idphoto);


$html='
<html>
<body>

<div style="text-align:left;"><p style="font-size:10px;"><b>Sahyadri School</b><br>
Krishnamurti Foundation India</p>
</div>


<div style="text-align:center;"><p style="font-size:11px;">'.$name.''."'s".' Details</p></div>

<table style="font-family:verdana,arial,sans-serif; margin:auto auto auto auto; width:90%; font-size:9.5px; color:#333333; border-width:1px; border-color:#999999; border-collapse: collapse;">

<tr>
<td style="border:0px; padding:5px;"><b>'."Student Information:".'</b></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="width:280px; border:.5px solid gray; padding:5px;"> Photo: </td>
<td style="text-align:center; border:.5px solid gray; padding:5px;">
<img style="border:1px solid orange; padding:2px;" width=80 height=90 src="upload/'.$class.'/'.$idphoto.'"></td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Name: </td>
<td style="border:.5px solid gray; padding:5px;">'.$name.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Admission No: </td>
<td style="border:.5px solid gray; padding:5px;">'.$adm.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Class: </td>
<td style="border:.5px solid gray; padding:5px;">'.$class.'</td>
</tr>


<tr>
<td style="border:.5px solid gray; padding:5px;"> House: </td>
<td style="border:.5px solid gray; padding:5px;">'.$house.'</td>
</tr>	
	

<tr>
<td style="border:.5px solid gray; padding:5px;"> Date of Birth: </td>
<td style="border:.5px solid gray; padding:5px;">'.$birth_date.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Date of Adm: </td>
<td style="border:.5px solid gray; padding:5px;">'.$adm_date.'</td>
</tr>		

<tr>
<td style="border:.5px solid gray; padding:5px;"> Blood Group: </td>
<td style="border:.5px solid gray; padding:5px;">'.$bldgroup.'</td>
</tr>	

<tr>
<td style="border:.5px solid gray; padding:5px;"> Gender: </td>
<td style="border:.5px solid gray; padding:5px;">'.$sex.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> House Parent: </td>
<td style="border:.5px solid gray; padding:5px;">'.$house_parent.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Class Teacher : </td>
<td style="border:.5px solid gray; padding:5px;">'.$class_teach.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Hobbys : </td>
<td style="border:.5px solid gray; padding:5px;">'.$hobby_1.' &nbsp; '.$hobby_1.' &nbsp; '.$hobby_1.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Class 9/10 - Group VI Subject: </td>
<td style="border:.5px solid gray; padding:5px;">'.$six_sub.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Second Language: </td>
<td style="border:.5px solid gray; padding:5px;">'.$second_lang.'</td>
</tr>

<tr>
<td style="border:0px; padding:5px;"></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="border:0px; padding:5px;"><b>'."Parent's Information:".' </b></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;">'."Father's Name:".': </td>
<td style="border:.5px solid gray; padding:5px;">'.$parent1.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;">'."Mother's Name:".': </td>
<td style="border:.5px solid gray; padding:5px;">'.$parent2.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Occupation (F): </td>
<td style="border:.5px solid gray; padding:5px;">'.$occupation.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Occupation (M): </td>
<td style="border:.5px solid gray; padding:5px;">'.$occupation_2.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Email (F): </td>
<td style="border:.5px solid gray; padding:5px;">'.$email.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Email (M): </td>
<td style="border:.5px solid gray; padding:5px;">'.$email_2.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Phone No: </td>
<td style="border:.5px solid gray; padding:5px;">'.$phone.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Mobile No (F): </td>
<td style="border:.5px solid gray; padding:5px;">'.$mobile_no.'</td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Mobile No (M): </td>
<td style="border:.5px solid gray; padding:5px;">'.$mobile_no_2.'</td>
</tr>

<tr>
<td style="border:0px; padding:5px;"></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="border:0px; padding:5px;"><b>Postal Address: </b></td>
<td style="border:0px; padding:5px;"></td>
</tr>

<tr>
<td style="border:.5px solid gray; padding:5px;"> Street Address: </td>
<td style="border:.5px solid gray; padding:5px;">'.$address1.'</td>
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

include("app_pdf/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================

?>

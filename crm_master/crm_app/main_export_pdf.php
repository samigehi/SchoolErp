
<html>
<head>
<title>CRM pdf Export</title>
</head>
<body>

<?php
include("connect.php");
$find = $_GET['find'];
require('fpdf/fpdf.php');

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	$w=array(30,30,55,25,20,20);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
		$this->Cell(30,6,$eachResult["ID"],1);
		$this->Cell(30,6,$eachResult["Student"],1);
		$this->Cell(55,6,$eachResult["Class Teacher"],1);
		$this->Cell(25,6,$eachResult["House Parent"],1,0,'C');
		$this->Cell(20,6,$eachResult["English"],1);
		$this->Cell(20,6,$eachResult["Hindi"],1);
		$this->Ln();
	}
}

//Better table
function ImprovedTable($header,$data)
{
	//Column widths
	$w=array(20,30,55,25,25,25);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data

	foreach ($data as $eachResult) 
	{
		$this->Cell(20,6,$eachResult["ID"],1);
		$this->Cell(30,6,$eachResult["Student"],1);
		$this->Cell(55,6,$eachResult["Class Teacher"],1);
		$this->Cell(25,6,$eachResult["House Parent"],1,0,'C');
		$this->Cell(25,6,$eachResult["English"],1,0,'R');
		$this->Cell(25,6,$eachResult["Hindi"],1,0,'R');
		$this->Ln();
	}

	//Closure line
	$this->Cell(array_sum($w),0,'','T');
}

//Colored table
function FancyTable($header,$data)
{
	//Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	//Header
	$w=array(20,30,55,25,25,25);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	//Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Data
	$fill=false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
		$this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles
$header=array(
'ID',
'Student',
'Class Teacher',
'House Parent',
'English',
'hindi');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("std_master");
$strSQL = "SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
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
IF(social_studies_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(science_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE name LIKE '%$find%' OR class LIKE '%$find%' OR  adm LIKE '$find' GROUP BY name ORDER BY class, name";

$objQuery = mysql_query($strSQL);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//



$pdf->SetFont('Arial','',10);

//*** Table 1 ***//
//$pdf->AddPage();
//$pdf->Image('fpdf/logo.png',80,8,33);
//$pdf->Ln(35);
//$pdf->BasicTable($header,$resultData);

//*** Table 2 ***//
//$pdf->AddPage();
//$pdf->Image('fpdf/logo.png',80,8,33);
//$pdf->Ln(35);
//$pdf->ImprovedTable($header,$resultData);

//*** Table 3 ***//
$pdf->AddPage();
$pdf->Image('fpdf/logo.png',0,0,0);
$pdf->Ln(35);
$pdf->FancyTable($header,$resultData);

$pdf->Output("fpdf/MyPDF.pdf","F");
?>

PDF Created Click <a href="fpdf/MyPDF.pdf">here</a> to Download
</body>
</html>



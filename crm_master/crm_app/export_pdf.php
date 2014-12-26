    <?php
   $class = $_GET['class'];
   
    $date = date('Y-m-d');

    $con=mysqli_connect('localhost','thevall7_erp','thevalleyschool123','thevall7_erp_crm_db');
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
   $result_t = mysqli_query($con,"SELECT * FROM crm_2014 where class LIKE '%$class%' ORDER BY class, name");

   while($row_t = mysqli_fetch_array($result_t))
    {	
   $class_teacher_teacher = $row_t['class_teacher_teacher'];
   $house_parent_teacher  = $row_t['house_parent_teacher'];
   $english_teacher = $row_t['english_teacher'];
   $hindi_teacher = $row_t['hindi_teacher'];
   $social_studies_teacher = $row_t['social_studies_teacher'];
   $maths_teacher = $row_t['maths_teacher'];
   $science_teacher = $row_t['science_teacher'];
   $resource_room_teacher = $row_t['resource_room_teacher'];
   $games_teacher = $row_t['games_teacher'];
   $yoga_teacher = $row_t['yoga_teacher'];
   $art_teacher = $row_t['art_teacher'];
   $music_teacher = $row_t['music_teacher'];
   }



$tbl ='';
$tbl .= '
<style>
table{
    border:1px solid black;
    table-layout:fixed;
    width:100%;
    border-collapse:collapse;
    font-size:12px;
}

td {
    border:1px solid black;
    overflow:hidden;  
  }

th {
    border:1px solid black;
    overflow:hidden;
    word-wrap: break-word;
    width:200px;
    max-width:200px;		
   }
</style>

<body>
<p><font size="10" color="gray"><b>CRM Report :: '.$find.' &nbsp; &nbsp; Date - '.$date.'</b></font></p>
<table>
<tr style="background-color:#00BFFF;">
<th style="border:1px solid gray; font-weight:bold; padding:8px;" align="center">Student Name</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Class Teacher </th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">House Parent</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">English</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Hindi</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Social Studies</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Maths</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Science</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Resource Room</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Games</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Yoga</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Art</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" colspan="2" align="center">Music</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" align="center">Remarks By Class Teacher</th>
<th style="border:1px solid gray; font-weight:bold; padding:8px;" align="center">Inputs After CRM</th>	
</tr>
';

$result = mysqli_query($con,"SELECT * FROM crm_2014 where class LIKE '%$class%' ORDER BY class, name");

while($row = mysqli_fetch_array($result))
{
   
$tbl .= '
<tr style="background-color:#ffffff;">
<td style="border:1px solid gray; font-weight:bold; width:100px; padding:8px;">'.$row['name'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['class_teacher'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['class_teacher_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['house_parent'].'</td>
<td style="border:1px solid gray; padding:8px; " align="center">'.$row['house_parent_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['english'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['english_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['hindi'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['hindi_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['social_studies'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['social_studies_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['maths'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['maths_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['science'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['science_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['resource_room'].'</td>
<td style="border:1px solid gray; padding:8px; " align="center">'.$row['resource_room_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" width="160">'.$row['games'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['games_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['yoga'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['yoga_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['art'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['art_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;" >'.$row['music'].'</td>
<td style="border:1px solid gray; padding:8px;" align="center">'.$row['music_grade'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;">'.$row['remarks'].'</td>
<td style="border:1px solid gray; padding:8px; width:100px;">'.$row['inputs_from_crm'].'</td>
</tr>';
    }
 $tbl .= '</table>';  

//==============================================================
//==============================================================
//==============================================================
include("app_pdf/mpdf.php");

//$mpdf=new mPDF('en-GB-x','A3','','',10,5,10,10,6,3); 

$mpdf=new mPDF('c','A3'); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('new.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->AddPage('L');

$mpdf->WriteHTML($tbl);

$mpdf->Output('CRM_'.$find.'.pdf', 'I');
exit;
//==============================================================
//==============================================================
//==============================================================

 ?>

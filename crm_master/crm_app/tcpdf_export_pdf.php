    <?php
ob_clean(); 
    require_once('tcpdf/config/lang/eng.php');
    require_once('tcpdf/tcpdf.php');
    $find = $_GET['find'];
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Dario Balas');
    $pdf->SetTitle('PDF');
    $pdf->SetSubject('PDF');
    $pdf->SetKeywords('PDF');
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    //set some language-dependent strings
    $pdf->setLanguageArray($l);
    // ---------------------------------------------------------
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 10, '', true);
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    // Set some content to print
    $date = date('Y-m-d');

    $con=mysqli_connect("localhost","root","root","std_master");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
   $result_t = mysqli_query($con,"SELECT * FROM crm_2013_14 where name LIKE '%$find%' OR class LIKE '%$find%' OR  adm LIKE '$find' ORDER BY class, name");

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



    $tbl_header = '<p><font size="11" color="gray"><b>CRM Report :: '.$find.' &nbsp; &nbsp; Date - '.$date.'</b></font></p>
<table border="1">
<tr>
<td bgcolor="#00BFFF" align="center">Student</td>
<td bgcolor="#00BFFF" colspan="2" align="center">'.$class_teacher_teacher.' Class Teacher </td>
<td bgcolor="#00BFFF" colspan="2" align="center">House Parent '.$house_parent_teacher.'</td>
<td bgcolor="#00BFFF" colspan="2" align="center">English</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Hindi</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Social Studies</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Maths</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Science</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Resource Room</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Games</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Yoga</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Art</td>
<td bgcolor="#00BFFF" colspan="2" align="center">Music</td>
<td bgcolor="#00BFFF" align="center">Remarks</td>
<td bgcolor="#00BFFF" align="center">Inputs After CRM</td>	
</tr>
';
     
    $tbl_footer = '</table>';
    $tbl ='';
    
$result = mysqli_query($con,"SELECT * FROM crm_2013_14 where name LIKE '%$find%' OR class LIKE '%$find%' OR  adm LIKE '$find' ORDER BY class, name");

    while($row = mysqli_fetch_array($result))
    {
   
$tbl .= '
<tr>
<td>'.$row['name'].'</td>
<td>'.$row['class_teacher'].'</td>
<td size="5" align="center">'.$row['class_teacher_grade'].'</td>
<td>'.$row['house_parent'].'</td>
<td align="center">'.$row['house_parent_grade'].'</td>
<td>'.$row['english'].'</td>
<td align="center">'.$row['english_grade'].'</td>
<td>'.$row['hindi'].'</td>
<td align="center">'.$row['hindi_grade'].'</td>
<td>'.$row['social_studies'].'</td>
<td align="center">'.$row['social_studies_grade'].'</td>
<td>'.$row['maths'].'</td>
<td align="center">'.$row['maths_grade'].'</td>
<td>'.$row['science'].'</td>
<td align="center">'.$row['science_grade'].'</td>
<td>'.$row['resource_room'].'</td>
<td align="center">'.$row['resource_room_grade'].'</td>
<td>'.$row['games'].'</td>
<td align="center">'.$row['games_grade'].'</td>
<td>'.$row['yoga'].'</td>
<td align="center">'.$row['yoga_grade'].'</td>
<td>'.$row['art'].'</td>
<td align="center">'.$row['art_grade'].'</td>
<td>'.$row['music'].'</td>
<td align="center">'.$row['music_grade'].'</td>
<td>'.$row['remarks'].'</td>
<td>'.$row['inputs_from_crm'].'</td>
</tr>';
    }
    // Print text using writeHTMLCell()
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
    // ---------------------------------------------------------
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('mypdf.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+
    ?>

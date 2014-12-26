<html>
<head>
</head>

<body>
<?php
	include('index.php');
	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
	 	  
	 // Otherwise we connect to our Database 
	include("connect.php");
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);

	$data = mysql_query("SELECT *, TIMESTAMPDIFF(YEAR, birth_date, CURRENT_DATE) AS `age` FROM cad_app WHERE upper($field) LIKE'%$find%' ORDER BY form_no");
	?>
<div id="printme">
<div class="tbody">
<table style="margin:auto auto auto auto; width:100%; font-size:11.5px; color:#333333; border-width:1px; border-color:#999999; border-collapse: collapse;">
<tr>
	<th class=th1 style="width:2px;">Sr. no.</th>
	<th class=th1 style="width:2px;">Form no.</th>
	<th class=th1 style="width:2px;">Recd date</th>
	<th class=th1 style="width:30px;">Name</th>
	<th class=th1 style="width:2px;">Sex</th>
	<th class=th1 style="width:2px;">Class</th>	
	<th class=th1 style="width:4px;">Status</th>
	<th class=th1 style="width:4px;">Fee paid</th>
	<th class=th1 style="width:2px;">Intervw date</th>
	<th class=th1 style="width:2px;">Intervw over</th>
	<th class=th1 style="width:30px;">Edit / delete</th>
</tr>
	<?php 
	$count = '0';
	$new = '0';	
	$admit = '0';
	$waitlist = '0';
	$reject = '0';
	$color = 'blue';
	 //And we display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	$count++;
	$cad_id = $result['cad_id'];	
	$st_name = $result['st_name'];	
	$admn_status = $result['admn_status'];

	if ($admn_status == "Admit"){
	$admit++;
	$color = 'green';
	}
	
	if ($admn_status == "New"){
	$new++;
	$color = '#660066';
	}
	
	if ($admn_status == "Waitlist"){
	$waitlist++;
	$color = 'blue';
	}
	
	if ($admn_status == "Reject"){
	$reject++;
	$color = 'red';
	}

	?>
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['form_no'];?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['recd_date'];?></td>
	<td class=td1 title="Mobile no : <?php echo $result['mobile_no'];?>"><?php echo "<a href=\"update_show.php?cad_id=$cad_id&find=$find&field=$field\">$st_name</a>";?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['sex'];?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['class'];?></td>			
	<td class=td1 style="color:<?php echo $color;?>; text-align:center;"><?php echo $admn_status;?></td>	
	<td class=td1 style="text-align:center;"><?php echo $result['fee_paid'];?></td>
        <td class=td1 style="text-align:center;"><?php echo $result['intervw_date'];?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['intvw_over'];?></td>
	<td class=td1 style="text-align:center;">
<?php echo "<a href=\"update.php?cad_id=$cad_id&find=$find&field=$field\" title='edit'><img src='images2/edit.gif' border='0'></a>";?> &nbsp;
<?php echo "<a href=\"intrvw_board.php?cad_id=$cad_id\" title='intrvw board report'><img src='images2/report.png' border='0'></a>";?> &nbsp;
<?php echo "<a href=\"delete.php?cad_id=$cad_id\" title='delete'><img src='images2/delete.png' border='0'></a>";?></td>
	</tr>

	<?php
	 }?>
	</table>
	<br>
	</div>
	<div align=right>	
	</div>
	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "Sorry, but we can not find an entry to match your query<br><br>";
	 }
	  
	 //And we remind them what they searched for
	?>
	<table style="font-size:11px;" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr style="background:#F4A460;"><td style="padding:3px;">	
	<div style="float:left; width:600px;">
	<?php
	 echo "&nbsp; [ <b>Searched For : </b>$find ] &nbsp; &nbsp; &nbsp; ";
	 echo "[ <b>Total Records : </b>$anymatches</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color='660066'>New : </b>$new</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=green>Admit : </b>$admit</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=blue>Waitlist : </b>$waitlist</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=red>Reject : </b>$reject</font> ] &nbsp; &nbsp; &nbsp;";
	 ?></td>
	</div>

	<td><div style="float:right;">
	<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp;	
	<?php echo "<a href=\"export_xls.php?field=$field&find=$find\" title='export to xls'> <img src='images2/xls.gif' border='0' alt='xls'> Export</a>";?> &nbsp; 
	</div>
	</td>	
	</tr>
	</table>
	</div>
	<br>
	</body>
	</html>


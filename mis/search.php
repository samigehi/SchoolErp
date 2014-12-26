	<?php
	include('index.php');

	$fromdate=$_GET['fromdate'];
	$todate=$_GET['todate']; //This code right here was left out
	  
	include ("connect.php");
  
	 //Now we search for our search term, in the field the user specified
	$data = mysql_query("SELECT * FROM ele_mis WHERE el_date BETWEEN '$fromdate' AND '$todate' ORDER BY el_date");

	//filter complaints / suggestions / requests
	?>

<div class="contentB">
<div class="tbody">
<table class=table1>
<tr>
<th class=th1 style="width:10px;">Date</th>
<th class=th1 style="width:10px;">MSEB kWh</th>
<th class=th1 style="width:10px;">30KVA kWh</th>
<th class=th1 style="width:10px;">125KVA kWh</th>
<th class=th1 style="width:10px;">30 KVA Diesel Cons</th>
<th class=th1 style="width:10px;">125 KVA Diesel Cons</th>
<th class=th1 style="width:10px;">kWh Per Ltrs. </th>
<th class=th1 style="width:10px;">Total kWh</th>
<th class=th1 style="width:10px;">Water Ltrs. (kL)</th>
<th class=th1 style="width:10px;">Water kWh</th>
</tr>
	<?php
	$total_mseb_kwh = '0';
	$total_125kva_kwh = '0';
	$total_30kva_kwh = '0';
	$total_125kva_disl = '0';
	$total_30kva_disl = '0';
	$total_water_ltr = '0';
	$total_water_kwh = '0';
	$total_units = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))	
	{
	$id = $result['id']; 
	$el_date = $result['el_date'];
	?>
<tr>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"update.php?id=$id&fromdate=$fromdate&todate=$todate\" title='click to edit'>$el_date</a>";?></td>
<td class=td1 style="text-align:right;"><?php echo $result['total_mseb_units']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['dg_30_kwh']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['dg_125_kwh']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['dg_30_disl']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['dg_125_disl']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['per_litrs_kwh']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['total_units']; ?></td>
<td class=td1 style="text-align:right;"><? echo $result['total_water_ltrs'];?></td>
<td class=td1 style="text-align:right;"> <? echo $result['total_water_kwh']; ?></td>
</tr>
	<?php
	$total_mseb_kwh += $result['total_mseb_units'];
	$total_125kva_kwh += $result['dg_125_kwh'];
	$total_30kva_kwh += $result['dg_30_kwh'];
	$total_125kva_disl += $result['dg_125_disl'];
	$total_30kva_disl += $result['dg_30_disl'];
	$total_water_ltr += $result['total_water_ltrs'];
	$total_water_kwh += $result['total_water_kwh'];
	$total_units += $result['total_units'];
	 }
	?>
	<tr style="text-align:right; background-color:#A9F5E1;">
	<td class=td1 style="text-align:center;"><b> Total Cons.</b></td>
	<td class=td1><b><?php echo $total_mseb_kwh;?> kWh</b></td>
	<td class=td1><b><?php echo $total_30kva_kwh;?> kWh</b></td>
	<td class=td1><b><?php echo $total_125kva_kwh;?> kWh</b></td>
	<td class=td1><b><?php echo $total_30kva_disl;?> Ltr</b></td>
	<td class=td1><b><?php echo $total_125kva_disl;?> Ltr</b></td>
	<td class=td1 style="text-align:center;"> - </td>
	<td class=td1><b><?php echo $total_units;?> kWh</b></td>
	<td class=td1><b><?php echo $total_water_ltr;?> kL</b></td>
	<td class=td1><b><?php echo $total_water_kwh;?> kWh</b></td>
	</tr>
	</table>
	<br>	
	</div>

	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "<p>No entries found matching your query</p>";
	 }

	//And we remind them what they searched for
	 echo "<br>[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";
	?>

<div align=right><?php echo "<a href=\"exportxls.php?fromdate=$fromdate&todate=$todate\" title='Export to Excel'>Export to xls</a>";?></div> 

	<?php
	mysql_close();
	 ?>

</div>
<div class="clear"></div>
</div>
</body>
</html>

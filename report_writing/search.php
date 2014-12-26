	<?php
	include('index.php');
	$find=$_GET['find'];
	//$field=$_POST['field']; //This code right here was left out

	//If they did not enter a search term we give them an error
	 if ($find == "")
	 {
	 echo "You forgot to enter a search term.";
	 echo exit;
	 }
	  
	include ("connect.php");
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	
	  
	 //Now we search for our search term, in the field the user specified
	//$data = mysql_query("SELECT * FROM crm_2014 WHERE upper($field) LIKE '%$find%' ORDER BY class, name");

	$data_1 = mysql_query("SELECT * FROM spring_2015 WHERE name LIKE '%$find%' OR class LIKE '%$find%' OR  adm LIKE '$find' ORDER BY class, name");
	$class = '';	
	while($result_1 = mysql_fetch_array($data_1))		
	 {
	$class = $result_1['class'];  
	}	
	?>	
	<div align="right" style="width:90%; padding:5px">
	<?php echo "<a href=\"crm_report.php?class=$class\" title='view report' target='_blank'>view report</a>";?> &nbsp;<font color=red><b> | </b></font> &nbsp;
	<A HREF="javascript:window.print()" title="print">print this page</A> &nbsp;	
	</div>
	<table class=table_search>
		
	<tr>
	<th class=th1 style="width:20px;"></th>
	<th class=th1 style="width:70px;">Name</th>
	<th class=th1 style="width:10px;">Class</th>
	<th class=th1 style="width:10px;">Last Update</th>
	</tr>

	<?php
	$data = mysql_query("SELECT * FROM spring_2015 WHERE name LIKE '%$find%' OR class LIKE '%$find%' OR  adm LIKE '$find' ORDER BY class, name");
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array($data))		
	 {
	 $count++;
	 $crm_id = $result['crm_id']; 
	 $name = $result['name']; 
	 $class = $result['class'];
	?>
	<tr>
	<td class=td1 style="text-align:center;">
	<?php echo "<a href=\"edit.php?class=$class\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?> &nbsp;
	</td>
	<td class=td1 title="Adm- <?php echo $result['adm'];?>"><?php echo $result['name'];?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['class'];?></td>	 
        <td class=td1 style="width:5px;"><?php echo $result['last_update_date'];?> &nbsp; <?php echo $result['last_update_teacher'];?> &nbsp; <?php echo $result['update_from'];?></td>
	</tr>	
	<?php
	 }?>

	</table>
	<br>
	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "No records found<br>";
	 }
	 //And we remind them what they searched for
	 echo "[ <font color=red>Searched For : &nbsp; $find </font> ]";
	mysql_close();
	 ?>
	<br>
	<hr color=lightgray size=1>	
	</html>	
	</body>
	<html>


<html>
<head>
<title>show books request...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<table class=table1>
<h3>New Book Requests</h3>
<tr>
<th class=th1 style="width:5px;">Req. No.</th>
<th class=th1 style="width:5px;">Req. Date</th>
<th class=th1 style="width:70px;">Name</th>
<th class=th1 style="width:100px;">Book Title</th>
<th class=th1 style="width:100px;">Author</th>
<th class=th1 style="width:10px;">Edition</th>
<th class=th1 style="width:100px;">Remarks</th>
</tr>

<?php
include("connect.php");

$data = mysql_query("SELECT * FROM books_request order By id, req_date, user_name");

	 //And display the results
	 while($result = mysql_fetch_array( $data ))		
	 {
	?>

<tr class=tr1>
<td class=td1 style="text-align:center;"><font color="darkblue"><b><?php echo $result['id']; ?></b></font></td>
<td class=td1 style="text-align:center;"><?php echo $result['req_date']; ?></td>
<td class=td1><font color="darkblue"><?php echo $result['user_name']; ?></font></td>
<td class=td1><?php echo $result['title']; ?></td>
<td class=td1><?php echo $result['author']; ?></td>
<td class=td1><?php echo $result['edition']; ?></td>
<td class=td1><?php echo $result['remarks']; ?></td>
</tr>	
	<?php
	}
	?>
	</table>
	<hr color=lightgray size=1>	
	<div style="font-weight:normal;">	
	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 
	 //And we remind them what they searched for
	 echo "[ <b>Total Requests : </b> <font color=red>$anymatches</font> ]";	 
	mysql_close();
	 ?>

	</div>
	</body>
	</html>

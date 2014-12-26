
<html>
<head>
<title>Gatepass search...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php 
$gatepass_id = $result['gatepass_id'];
$items_name = $result['items_name'];
$status = $result['status'];
?>
<tr class=tr1>
<td class=td1 style="text-align:center; font-weight:bold;"><?php echo $result['gatepass_no']; ?></td>
<?php
if ($_SESSION['user_name'] != 'admin')
{
?>
<td class=td1><?php echo "<a href=\"in_update.php?gatepass_id=$gatepass_id&field=$field&find=$find&fromdate=$fromdate&todate=$todate\" title='click to edit'><font color=darkblue>$items_name</font></a>";?></td>
<?php
}
?>

<?php
if ($_SESSION['user_name'] == 'admin')
{
?>
<td class=td1><?php echo "<a href=\"update.php?gatepass_id=$gatepass_id&field=$field&find=$find&fromdate=$fromdate&todate=$todate\" title='click to edit'><font color=darkblue>$items_name</font></a>";?></td>
<?php
}
?>
<td class=td1 style="text-align:right;"><?php echo $result['items_qty']; ?></td>
<td class=td1><?php echo $result['going_to']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['party_contact']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['gatepass_date']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['in_date']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['return_able']; ?></td>
<?php
if ($status == 'OUT')
{
?>
<td class=td1 style="text-align:center; font-weight:bold; color:red;"><?php echo $status; ?></td>
<?php
}

if ($status == 'IN')
{
?>
<td class=td1 style="text-align:center; font-weight:bold; color:green;"><?php echo $status; ?></td>
<?php
}
?>
</tr>
</div>
</body>
</html>

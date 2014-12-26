
<?php

include("../attend/index.php");
include("../attend/connect.php");

$id = $_POST['id'];

//update new fields //

$attend_code = trim($_POST['attend_code']);
$school_date = trim($_POST['school_date']);
$coment = trim($_POST['coment']);

$update = "UPDATE attend SET attend_code = '$attend_code', school_date = '$school_date', coment='$coment' WHERE id = '$id'";
$rsUpdate = mysql_query($update);

if ($rsUpdate)
{
?>
<script type="text/javascript">
window.history.go(-3);
</script>
<?php
}

if (!$rsUpdate)
{ 
echo "Not Sucessful!";
}
?>

</div>
<div class="clear"></div>
</div>

</body>
</html>

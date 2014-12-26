
<html>
<head>
<title>Krishnamurti study centre :: Contact</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>

<?php include ('header.php');?>

<div id="content">
<div style="float:left; width: 320px;">
<h4>Contact us </h4> <br>
<br><p>Secretary, SEC<br>
<a href="index.php">Krishnamurti Study Centre Sahyadri</a><br>
Post : Tiwai Hill, Tal : Rajgurunagar (Khed),<br>
Dist : Pune, Pin - 410513<br> 
Maharashtra, India<br>
Telephone : (02135) 306192, 288442, 288443, 288772<br>
Email : <a href="mailto:kfisahyadri.study@gmail.com">kfisahyadri.study@gmail.com</a><br>
Email : <a href="mailto:sahyadrischool@gmail.com">sahyadrischool@gmail.com</a><br></p>
</div>

<div style="float:right; margin-top:20px; padding:30px; border:1px solid lightgray; border-radius:15px;">
<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form  action="" method="POST" name="addform" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    <font color="red"> * </font> Name :<br>
    <input name="name" type="text" value="" size="40"/><br><br>
    <font color="red"> * </font> Email :<br>
    <input name="email" type="text" value="" size="40"/><br><br>
    <font color="red"> * </font> Message :<br>
    <textarea name="message" rows="5" cols="45"></textarea><br><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Enquiry Mail";
        mail("gbhau@mail", $subject, $message, $from);
        echo "Thank you for contacting us. We will be in touch with you very soon.";
        }
     }  
?>       
</div>
</div>    
<?php include ('footer.php');?>

</body>
</html>

    <html>  
    <head>  
    <title>Book Search</title>
	<link href="new.css" rel="stylesheet" type="text/css" />  
    </head>  
    <body>
  
    <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">  
    <table width="599" border="1">  
    <tr>  
    <th>Keyword  
    <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>">  
    <input type="submit" value="Search"></th>  
    </tr>  
    </table>  
    </form>  
    <?  
    if($_GET["txtKeyword"] != "")  
    {  
    $objConnect = mysql_connect('localhost','thevall7_erp',Õthevalleyschool123Õ) or die(mysql_error());  
    $objDB = mysql_select_db("thevall7_erp_library");  
    // Search By Name or Email  
    $strSQL = "SELECT * FROM books WHERE (title LIKE '%".$_GET["txtKeyword"]."%' or author LIKE '%".$_GET["txtKeyword"]."%')";  
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");  
    $Num_Rows = mysql_num_rows($objQuery);  
      
    $Per_Page = 10;   // Per Page  
      
    $Page = $_GET["Page"];  
    if(!$_GET["Page"])  
    {  
    $Page=1;  
    }  
      
    $Prev_Page = $Page-1;  
    $Next_Page = $Page+1;  
      
    $Page_Start = (($Per_Page*$Page)-$Per_Page);  
    if($Num_Rows<=$Per_Page)  
    {  
    $Num_Pages =1;  
    }  
    else if(($Num_Rows % $Per_Page)==0)  
    {  
    $Num_Pages =($Num_Rows/$Per_Page) ;  
    }  
    else  
    {  
    $Num_Pages =($Num_Rows/$Per_Page)+1;  
    $Num_Pages = (int)$Num_Pages;  
    }  
      
    $strSQL .=" order by id ASC LIMIT $Page_Start , $Per_Page";  
    $objQuery  = mysql_query($strSQL);  
      
    ?>  
    <table class=table1>  
    <tr>  
    <th class=th1 width="91"> <div align="center">Id</div></th>  
    <th class=th1 width="98"> <div align="center">Title</div></th>  
    <th class=th1 width="198"> <div align="center">Author</div></th>  
    <th class=th1 width="97"> <div align="center">Class No.</div></th>  
    <th class=th1 width="59"> <div align="center">Keywords</div></th>  
    <th class=th1 width="71"> <div align="center">Status</div></th>  
    </tr>  
    <?  
    while($objResult = mysql_fetch_array($objQuery))  
    {  
    ?>  
    <tr>  
    <td class=td1><div align="center"><?=$objResult["id"];?></div></td>  
    <td class=td1><?=$objResult["title"];?></td>  
    <td class=td1><?=$objResult["author"];?></td>  
    <td class=td1><div align="center"><?=$objResult["class_no"];?></div></td>  
    <td class=td1 align="right"><?=$objResult["keywords"];?></td>  
    <td class=td1 align="right"><?=$objResult["status"];?></td>  
    </tr>  
    <?  
    }  
    ?>  
    </table>  
    <br>  
    Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :  
    <?  
    if($Prev_Page)  
    {  
    echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[txtKeyword]'><< Back</a> ";  
    }  
      
    for($i=1; $i<=$Num_Pages; $i++){  
    if($i != $Page)  
    {  
    echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[txtKeyword]'>$i</a> ]";  
    }  
    else  
    {  
    echo "<b> $i </b>";  
    }  
    }  
    if($Page!=$Num_Pages)  
    {  
    echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[txtKeyword]'>Next>></a> ";  
    }  
      
    mysql_close($objConnect);  
    }  
    ?>  
    </body>  
    </html>  

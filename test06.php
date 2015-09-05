 <?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link=mysql_connect("localhost","root","")or die("Can't Connect...");

mysql_select_db("random",$link) or die("Can't Connect to Database...");

$query = "SELECT * FROM finalproject";
//$query2 = "SELECT * FROM secondone1";

$result=mysql_query($query) or die("Query Failed : ".mysql_error());
//$result1=mysql_query($query2) or die("Query Failed : ".mysql_error());

?>
<html>
<head>
<title>Hi</title>
</head>
<body>
<div align="right"><a href="login.php"><input type="button" value="LogOut" name="logout"></a></div>
<h2><b><div align="center"><u>The results of the scan are here</u></div></b></h2>

<div align="center"><h3><b><u>The table below gives you the machine status and a host of other details too</u></b></h3>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>Machine Name</th>
		<th>User Name</th>
          <th>Status</th>
		  <th>Comment Author</th>
		  <th>Most Recent Comment</th>
		   <th>TimeStamp of Comment</th>
        
        </tr>
        <?php
          while( $row = mysql_fetch_assoc( $result ) ){
            echo "<tr>";
             echo  "<td>".$row['machine_name']."</td>";
            echo  "<td>".$row['user_name']."</td>";
			//echo  "<td>".$row['time_stamp']."</td>";
              //echo  "<td>".$row['comments']."</td>";
			  echo  "<td>".$row['status']."</td>";
			  echo  "<td>".$row['user_name']."</td>";
			  echo  "<td>".$row['lastest_comment']."</td>";
			   echo  "<td>".$row['timestamp']."</td>";
            echo "</tr>";
          }
        ?>
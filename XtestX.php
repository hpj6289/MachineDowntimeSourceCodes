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
<head><title>Hello</title>
	<body>
		<div align="right"><a href="scriptX2.php"><input type="button" name="input" value="GoBack"/></a></div>
		<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>Machine Name</th>
		<th>Machine Status</th>
		  <th>Status Description</th>
        </tr>
        <?php
		
          while( $row = mysql_fetch_assoc( $result ) ){
            echo "<tr>";
			$machine=$row['machine_name'];
			$username=$row['status'];
           //  echo  "<td><a href='testX.php?machine=$machine'>$machine</a></td>";
            //echo  "<td><a href='Page4.php?username=$username'>$username</a></td>";
			//echo  "<td>".$row['time_stamp']."</td>";
			echo "<td><a href='testX.php?machine=$machine'>$machine</a></td>";
              echo  "<td>".$row['status']."</td>";
			 echo  "<td>".$row['status_description']."</td>";
			  //echo  "<td>".$row['status_desc']."</td>";
            echo "</tr>";
          }
        ?>
    </table></div>
	<br><br>
	</body>
	</html>
<html>
<body>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
$query = "SELECT DISTINCT user_name FROM finalproject";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$username[$i]=$rows['user_name'];
$i++;
}
$total_elmt=count($username);
?>
<form method="POST" action="">
Select Roll No: <select name="user">
<option>Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $username[$j];
?></option><?php
}
?>
</select>

<input name="submit" type="submit" value="Search"/><br />

</form>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>Machine Name</th>
		<th>User Name</th>

		  
		  <th>Most Recent Comment</th>
		 
		  <th>TimeStamp of Comment</th>
		  <th>Author of Comment</th>
		  
        
        </tr>
		
<?php

if(isset($_POST['submit']))
{
$value=$_POST['user'];

$query2 = "SELECT * FROM finalproject WHERE user_name='$value'";
$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());

while($row=mysql_fetch_array($result2))
{
	
            echo "<tr>";
             echo  "<td>".$row['machine_name']."</td>";
            echo  "<td>".$row['user_name']."</td>";
			//echo  "<td>".$row['time_stamp']."</td>";
              //echo  "<td>".$row['comments']."</td>";
			 // echo  "<td>".$row['status']."</td>";
			  echo  "<td>".$row['lastest_comment']."</td>";
			 // echo  "<td>".$row['Author_of_Comment']."</td>";
			   echo  "<td>".$row['timestamp']."</td>";
			   echo  "<td>".$row['Author_of_Comment']."</td>";
            echo "</tr>";
          }
}
mysql_close($connect_mysql);

?>
</table>

<p align=right><a href="index.php">HOME</a></p>
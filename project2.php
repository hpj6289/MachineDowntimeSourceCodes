 <?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link=mysql_connect("localhost","root","")or die("Can't Connect...");

mysql_select_db("random",$link) or die("Can't Connect to Database...");

$query = "SELECT * FROM finalproject";
//$query2 = "SELECT * FROM secondone1";

$result=mysql_query($query) or die("Query Failed : ".mysql_error());
//$result1=mysql_query($query2) or die("Query Failed : ".mysql_error());
?>
<?php
$server="localhost";
$username="root";
$password="";
error_reporting(E_ALL ^ E_DEPRECATED);
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
$query4="SELECT DISTINCT user_name from finalproject";
$result4=mysql_query($query4) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result4))
{
$Title[$i]=$rows['user_name'];
$i++;
}
$total_elmt=count($Title);
$query = "SELECT * FROM finalproject";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$Title2[$i]=$rows['machine_name'];
$i++;
}
$total_elmt2=count($Title2);
?>
<div align="center"><form method="POST" action="">
<h3><b><u>Select the machine to Update:</u></b></h3> <select name="sel2">
<option value = "-1" >Select</option>
<?php 
for($j=0;$j<$total_elmt2;$j++)
{
?><option><?php 
echo $Title2[$j];
?></option><?php
}
?>
</select><br />
<h3><b><u>Reassign the user:</u></b></h3> <select name="sel">
<option value="-1">Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $Title[$j];
?></option><?php
}
?>
</select>
<br><h3><b><u>New User comments:</u></b></h3><input name="comments" type="text" /><br />
<br><input name="submit" type="submit" value="Update"/><br />
<br><br>
</form></div>
<html>
<body>

<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>User Name</th>
          <th>Machine Name</th>
		  <th>Comments</th>
          <th>Timestamp</th>
        </tr>
        <?php
          while( $row = mysql_fetch_assoc( $result ) ){
            echo "<tr>";
             echo  "<td>".$row['user_name']."</td>";
            echo  "<td>".$row['machine_name']."</td>";
			echo  "<td>".$row['comments']."</td>";
              echo  "<td>".$row['timestamp']."</td>";
			//  echo  "<td>".$row['status']."</td>";
			  //echo  "<td>".$row['output']."</td>";
			  //echo  "<td>".$row['output']."</td>";
            echo "</tr>";
          }
        ?>
    </table>

<?php

if(isset($_POST['submit']))
{
$machinename=$_POST['sel2'];
$username=$_POST['sel'];
$comments=$_POST['comments'];
//$timestamp=$_POST['timestamp'];

$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");

$query = "INSERT INTO project2(comments,timestamp) VALUES ('$comments',now()) WHERE username='$username' and machinename='$machinename'";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$message="Student Details Successfully Added";
echo $message;
mysql_close($connect_mysql);


}
?>
</body>
</html>

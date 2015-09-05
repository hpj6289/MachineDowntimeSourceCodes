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
<div align="right"><a href="finalproject27.php"><input type="button" name="button" value="GoBack"/></a>
<div align="center"><h2><u>History of all comments made by different users on all machines according to timestamps are given below</u></h2>
<div align="right"><a href="login.php"><input type="button" value="LogOut" name="logout"></a></div>
<div align="left"><a href="SX3.php"><input type="button" value="Click Here to See User Specific Details" name="button"></a></div>

<div align="center"><h3><b><u>The table below gives you the machine status and a host of other details too</u></b></h3>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
	
		<th>Machine Name</th>
          <th>User Comments</th>
		  <th>Machine Status</th>
		  <th>Authorof  Comments</th>
		   <th>Most Recent TimeStamp</th>
		 
        </tr>
        <?php
          while( $row = mysql_fetch_assoc( $result ) ){
			  //echo .$row['user_name' will get 'machine_name'];
            echo "<tr>";
			// 
			 echo  "<td>".$row['machine_name']."</td>";
             
			 echo  "<td>".$row['lastest_comment']."</td>";
			  echo  "<td>".$row['status']."</td>";
			  echo  "<td>".$row['user_name']."</td>";
            echo  "<td>".$row['timestamp']."</td>";
            echo "</tr>";
          }
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

$query = "SELECT * FROM finalproject";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result4))
{
$Title[$i]=$rows['user_name'];
$i++;
}
$total_elmt=count($Title);
$query = "SELECT DISTINCT machine_name FROM finalproject";
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
<h3><b><u>Select the machine to Update:</u></b></h3> <select name="mch">
<option value="-1">Select</option>
<?php 
for($j=0;$j<$total_elmt2;$j++)
{
?><option><?php 
echo $Title2[$j];
?></option><?php
}
?>
</select><br />
<h3><b><u>Reassign the user:</u></b></h3> <select name="usr">
<option value="-1">Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $Title[$j];
?></option><?php
}
?>
<br><br>
</select>
<h3><b><u><br>New User comments:</br></u></b></h3><input name="comment" type="text" />
<br><input name="submit" type="submit" value="Update"/><br />
<br><br>
</form></div>
    </table></div>
	</body>
	</html>
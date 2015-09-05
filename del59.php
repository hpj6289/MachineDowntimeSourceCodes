<html>
<head>
<title>Delete</title>
</head>
<body>
<div align="right"><a href="finalproject27.php"><input type="button" name="del" value="GoBack"></a></div>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
$query = "SELECT * FROM finalproject";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$name[$i]=$rows['user_name'];
$i++;
}
$total_elmt=count($name);
?>
<form method="POST" action="">
Select the Name to Delete: <select name="sel">
<option>Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $name[$j];
?></option><?php
}
?>
</select><br />

<input name="submit" type="submit" value="Delete"/><br />

</form>
<?php

if(isset($_POST['submit']))
{
$name=$_POST['sel'];


$query = "DELETE FROM finalproject WHERE user_name='$name'";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
echo "Successfully Deleted!";
}


?>
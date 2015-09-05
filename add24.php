<html>
<body>
<a href="finalproject27.php"><input type="button" name="add" value="GoBack"></a>
<form method="POST" action="">
<b><u>User-Name:</u></b> <input name="user_name" type="text" /><br />
<b><u>Last Updated On:</u></b> <input name="luo" type="text" /><br />
<b><u>User Comments:</u></b> <input name="comment" type="text" /><br />
<b><u>Status:</u></b> <input name="status" type="text" /><br />
<b><u>Output:</u></b> <input name="output" type="text" /><br />
<b><u>Machine Name:</u></b> <input name="machinename" type="text" /><br />
<b><u>Date of Commisioning:</u></b> <input name="doc" type="text" /><br />
<input name="submit" type="submit" value="Insert"/><br />
<input name="reset" type="reset" value="Reset"/>
</form>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
$username=$_POST['user_name'];
$timestamp=$_POST['luo'];
$comments=$_POST['comment'];
$status=$_POST['status'];
$output=$_POST['output'];
$machinename=$_POST['machinename'];
$dateofcomm=$_POST['doc'];
$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
$query = "INSERT INTO finalproject(user_name,timestamp,comments,status,output,machine_name) VALUES ('$username','$timestamp','$comments','$status','$output','$machinename')";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$message="Student Details Successfully Added";
echo $message;
mysql_close($connect_mysql);
}
?>


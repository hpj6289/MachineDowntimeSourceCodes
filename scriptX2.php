	  
<html>
<head>
<title>Hi</title>
</head>
<body>

<div align="center"><h2><b><u>Choose the machine from the dropdown and enter the status and status description</u></b></h2>
<div align="right"><a href="XtestX.php"><input type="button" name="button" value="StatusCheck"/></a></div>

<?php
$server="localhost";
$username="root";
$password="";
error_reporting(E_ALL ^ E_DEPRECATED);
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");

$query = "SELECT DISTINCT machinename FROM finalproject2";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$Title2[$i]=$rows['machinename'];
$i++;
}
$total_elmt2=count($Title2);
?>
<div align="center"><form method="POST" action="">
<h3><b><u>Select the machine:</u></b></h3> <select name="mch">
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

<h3><b><u><br>New Machine Status:</br></u></b></h3><input name="status" type="text" />
<h3><b><u><br>New Status Description:</br></u></b></h3><input name="statusdesc" type="text" />
<br><input name="submit" type="submit" value="Insert"/><br />
<br><br>
</form></div>

<?php
if(isset($_POST['submit'])){

//$comments=$_POST['comment'];
$machine=$_POST['mch'];
//$user=$_POST['usr'];
$status=$_POST['status'];

$statusdesc=$_POST['statusdesc'];

		$query2="UPDATE finalproject SET status='$status',status_description='$statusdesc' WHERE machine_name='$machine'";
		$result3=mysql_query($query2);
		echo "Details inserted successfully";
	}

?>




</body>
</html>
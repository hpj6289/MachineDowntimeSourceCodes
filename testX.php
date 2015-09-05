
<html>
<head>
<title>Hi</title>
</head>
<body>
<div align="right"><a href="finalproject27.php"><input type="button" name="button" value="GoBack"/></a>
<div align="center"><h2><u>History of all comments made by different users on all machines according to timestamps are given below</u></h2>


<div align="center"><h3><b><u>The table below gives you the machine status and a host of other details too</u></b></h3>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
$query = "SELECT DISTINCT machinename FROM finalproject2";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$machine2[$i]=$rows['machinename'];
$i++;
}
$total_elmt=count($machine2);
?>
<form method="POST" action="">
<label for="Select User">Select Machine</label>
<select name="mch">
<option>Select</option></h3></b>
<br><br>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $machine2[$j];
?></option><?php
}
?>
</select>

<input name="submit" type="submit" value="Search"/><br />

</form>
<br><br><br>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
	
		<th>Machine Name</th>
          <th>Author</th>
		  <th>Machine Status</th>
		  <th>Status Description</th>
		   <th>Comment History</th>
		 <th>Timestamp</th>
        </tr>
        <?php
		
		if(isset($_POST['submit']))
{
$value=$_POST['mch'];
}
else{
	
	$value=$_GET['machine'];
}

$query2 = "SELECT * FROM finalproject2 WHERE machinename='$value' ORDER BY timestamp DESC";

$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());




          while( $row = mysql_fetch_assoc( $result2 ) ){
			  //echo .$row['user_name' will get 'machine_name'];
            echo "<tr>";
			// 
			 echo  "<td>".$row['machinename']."</td>";
             
			 echo  "<td>".$row['author']."</td>";
			  echo  "<td>".$row['status']."</td>";
			  echo  "<td>".$row['status_description']."</td>";
            echo  "<td>".$row['comments']."</td>";
			echo  "<td>".$row['timestamp']."</td>";
            echo "</tr>";
          }

        ?>
		</body>
		</html>
			
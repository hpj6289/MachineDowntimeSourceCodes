
	  <?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link=mysql_connect("localhost","root","")or die("Can't Connect...");

mysql_select_db("random",$link) or die("Can't Connect to Database...");

$query = "SELECT * FROM finalproject2 ORDER BY timestamp DESC";
//$query2 = "SELECT * FROM secondone1";

$result=mysql_query($query) or die("Query Failed : ".mysql_error());
//$result1=mysql_query($query2) or die("Query Failed : ".mysql_error());

?>
<?php

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['sess_user'])) {
header('Location: Page3.php');
}
echo "<strong>";
echo "Welcome  ", $_SESSION['sess_user'];
echo "</strong>";
?> 

<br><br><br>

<html>
<head>
<title>Hi</title>
</head>
<body>

<div align="center"><h2><b><u>The table below displays a comment history releavent to the user and machine</u></b></h2>
<div align="right"><input type="button" value="GoBack" onclick="location.href='SX3.php'" name="button"></div>
<div align="right"><a href="testX.php"><input type="button" name="Click" value="ClickHere for MachineSpecificInfo"/></a></div>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>Machine Name</th>
		<th>Author</th>
<th>Status of Machine</th>
<th>Status Description</th>
		  
		  <th>Comment History</th>
		 
		  <th>TimeStamp of Comment</th>
		  
		  
        
        </tr>
        <?php
          while( $row = mysql_fetch_assoc( $result ) ){
            echo "<tr>";
             $machine=$row['machinename'];
			 $username=$row['author'];
			 echo  "<td><a href='testX.php?machine=$machine'>$machine</a></td>";
            echo  "<td><a href='Page4.php?username=$username'>$username</a></td>";
			//echo  "<td>".$row['time_stamp']."</td>";
              //echo  "<td>".$row['comments']."</td>";
			 // echo  "<td>".$row['status']."</td>";
			  echo  "<td";
			  if ($row["status"]=='ok')
				   {
					
				   echo ' style="background-color:#008000"';}
				   else if($row["status"]=='critical'){
					   echo ' style="background-color:	#8B0000"';
				   }
				   else if($row["status"]=='down'){
					   echo ' style="background-color:	#DC143C"';
				   }
				   echo ">".$row['status']."</td>";
			   
				
				
			 // echo  "<td>".$row['Author_of_Comment']."</td>";
			   echo  "<td>".$row['status_description']."</td>";
			   echo  "<td>".$row['comments']."</td>";
			   echo  "<td>".$row['timestamp']."</td>";
            echo "</tr>";
          }
        ?>
    </table></div>
	<br><br>
<?php
$server="localhost";
$username="root";
$password="";
error_reporting(E_ALL ^ E_DEPRECATED);
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
if (isset($_GET['test'])) {
    echo $_GET['test'];
}else{
    //echo "Failure";// Fallback behaviour goes here
}
$query4="SELECT DISTINCT author from finalproject2";
$result4=mysql_query($query4) or die("Query Failed : ".mysql_error());

$query = "SELECT * FROM finalproject2";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result4))
{
$Title[$i]=$rows['author'];
$i++;
}
$total_elmt=count($Title);
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

		$query2="UPDATE finalproject2 SET status='$status',status_description='$statusdesc' WHERE machinename='$machine'";
		$result3=mysql_query($query2);
		echo "Details inserted successfully";
	}

?>




</body>
</html>
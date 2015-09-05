<?php

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['sess_user'])) {
header('Location: SX3.php');
}
echo "<strong>";
echo "Welcome  ", $_SESSION['sess_user'];
echo "</strong>";
?> 
<html>
<head>
<title>NextPage</title>
</head>
<body>

<div align="center"><b><h2><u>The table below shows user specific information only</u></b></h2></div>
<div align="right"><a href="testX.php"><input type="button" name="test" value="Click Here for Machine Specific Information"/></a></div>
<div align="right"><a href="finalproject27.php"><input type="button" name="button" value="GoBack"></a></div>

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
$roll[$i]=$rows['user_name'];
$i++;
}
$total_elmt=count($roll);
?>
<form method="POST" action="">
<label for="Select User">Select User</label>
<select name="sel">
<option>Select</option></h3></b>
<br><br>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $roll[$j];
?></option><?php
}
?>
</select>

<input name="submit" type="submit" value="Search"/><br />

</form>
<br><br><br>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
$value=$_POST['sel'];

$query2 = "SELECT * FROM finalproject WHERE user_name='$value'";
$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());

mysql_close($connect_mysql);
}
?>
<div align="center">
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		
		<th>Machine Name</th>
		
		<th>Comment</th>
		<th>Author of Comments</th>
		<th>TimeStamp</th>
		         
        
        </tr>
     
	
   <?php
		
		while($row = mysql_fetch_assoc( $result2 ) )
		  {
            echo "<tr>";
            echo  "<td>".$row['machine_name']."</td>";
			//echo  "<td>".$row['status']."</td>";
			//echo  "<td>".$row['status_description']."</td>";
			echo  "<td>".$row['lastest_comment']."</td>";
			echo  "<td>".$row['Author_of_Comment']."</td>";
			echo  "<td>".$row['timestamp']."</td>";
		   echo "</tr>";
			
		            }
					
					?>
	
		    </table></div>
		
			<br><br><br>
			<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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
<br><input name="user_submit" type="submit" value="Update"/><br />
<br><br>
</form></div>
	<?php	
error_reporting(E_ALL ^ E_DEPRECATED);
//include login.php;
if(isset($_POST['user_submit'])){
	//echo "hi";
$comments=$_POST['comment'];
$machine=$_POST['mch'];
$user=$_POST['usr'];

if($machine==-1){
	 
		echo "Please select the machine from the DropDown";
	}else {	//If the selected user is not null, then only run the query:

$query1 = "UPDATE finalproject SET user_name='$user' WHERE machine_name='$machine'";
$result1=mysql_query($query1) or die("Query Failed : ".mysql_error());
$query7 = "UPDATE finalproject SET timestamp=now() WHERE machine_name='$machine'" ;
$result2=mysql_query($query7) or die("Query Failed : ".mysql_error());
echo "Details Updated";
//echo"$value";
//echo "$value1";
if(empty($comments))
  {
	  echo"";
	 //$comments=$_POST['comment'];
    }else{
		
		$query1="UPDATE finalproject SET lastest_comment='$comments',Author_of_Comment='$_SESSION[sess_user]' WHERE machine_name='$machine'";
		$result1=mysql_query($query1);
	}
}
}
?>

	</body>
	</html>



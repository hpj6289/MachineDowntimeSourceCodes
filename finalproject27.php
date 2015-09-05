
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

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['sess_user'])) {
header('Location: finalproject27.php');
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


<div align="center"><h2><b><u>The table below displays a history of relevant user and machine information</u></b></h2>
<div align="right"><input type="button"onclick="location.href='SX3.php'" value="GoBack" name="button"></div>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>Machine Name</th>
		<th>User Name</th>

		  
		  <th>Most Recent Comment</th>
		 
		  <th>TimeStamp of Comment</th>
		  <th>Author of Comment</th>
		  
        
        </tr>
        <?php
		
          while( $row = mysql_fetch_assoc( $result ) ){
            echo "<tr>";
			$machine=$row['machine_name'];
			$username=$row['user_name'];
             echo  "<td><a href='testX.php?machine=$machine'>$machine</a></td>";
            echo  "<td><a href='Page4.php?username=$username'>$username</a></td>";
			//echo  "<td>".$row['time_stamp']."</td>";
              //echo  "<td>".$row['comments']."</td>";
			 // echo  "<td>".$row['status']."</td>";
			  echo  "<td>".$row['lastest_comment']."</td>";
			 // echo  "<td>".$row['Author_of_Comment']."</td>";
			   echo  "<td>".$row['timestamp']."</td>";
			   echo  "<td>".$row['Author_of_Comment']."</td>";
            echo "</tr>";
          }
        ?>
    </table></div>
	<br><br>
	<p>
	
<div align="center"><h2><b><u>Enter the following details below</u></b></h2></div>
</p><br>
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

<?php
if(isset($_POST['submit'])){

$comments=$_POST['comment'];
$machine=$_POST['mch'];
$user=$_POST['usr'];

	if($user!=-1){
		$query6="SELECT user_name FROM finalproject WHERE machine_name='$machine'";
		$result6=mysql_query($query6);
		while($rows=mysql_fetch_array($result6))
{
$olduser=$rows['user_name'];

}
		$query2="INSERT into finalproject2(author,machinename,comments,timestamp)values('$user','$machine','Admin changed  from $olduser to $user',now())";
		$result3=mysql_query($query2);
    $query1 = "UPDATE finalproject SET user_name='$user' WHERE machine_name='$machine'";
$result1=mysql_query($query1) or die("Query Failed : ".mysql_error());
	}else{
		
		echo"";
	}	
if($machine==-1){
	 
		echo "Please select the machine from the DropDown";
	}else {	
echo "Details Updated";
	}
if(empty($comments))
  {
	  echo"";
    }else{
		$query2="INSERT into finalproject2(author,machinename,comments,timestamp)values('$user','$machine','$comments',now())";
		$result3=mysql_query($query2);
		$query1="UPDATE finalproject SET lastest_comment='$comments',timestamp=now(),Author_of_Comment='$_SESSION[sess_user]' WHERE machine_name='$machine'";
		$result1=mysql_query($query1);
	}
	}

?>



</body>
</html>
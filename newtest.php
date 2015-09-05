  <?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link=mysql_connect("localhost","root","")or die("Can't Connect...");

mysql_select_db("random",$link) or die("Can't Connect to Database...");

$query = "SELECT * FROM project3";
//$query2 = "SELECT * FROM secondone1";

$result=mysql_query($query) or die("Query Failed : ".mysql_error());
//$result1=mysql_query($query2) or die("Query Failed : ".mysql_error());

?>
<table border="2" border="1" cellpadding="1" cellspacing="1" >
        <tr>
		<th>Machine Name</th>
          <th>User Name</th>
		  <th>Comments</th>
          <th>Timestamp</th>
        </tr>
        <?php
          while( $row = mysql_fetch_assoc( $result ) ){
            echo "<tr>";
             echo  "<td>".$row['machinename']."</td>";
            echo  "<td>".$row['username']."</td>";
			echo  "<td>".$row['comments']."</td>";
              echo  "<td>".$row['timestamps']."</td>";
			  //echo  "<td>".$row['status']."</td>";
			 // echo  "<td>".$row['output']."</td>";
			  //echo  "<td>".$row['output']."</td>";
            echo "</tr>";
          }
        ?>
    </table></div>
		<?php
$server="localhost";
$username="root";
$password="";
error_reporting(E_ALL ^ E_DEPRECATED);
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
$query4="SELECT DISTINCT username from project3";
$result4=mysql_query($query4) or die("Query Failed : ".mysql_error());

$query = "SELECT * FROM project3";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result4))
{
$Title[$i]=$rows['username'];
$i++;
}
$total_elmt=count($Title);
$query = "SELECT * FROM project3";
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
<h3><b><u>Reassign the user:</u></b></h3>
<input type="text" name="user"/><br/>
<br><h3><b><u>New User comments:</u></b></h3><input name="comment" type="text" /><br />
<br><input name="submit" type="submit" value="Update"/><br />
<br><br>
</form></div>
<?php
//include login.php;
if(isset($_POST['submit'])){

$comments=$_POST['comment'];
//$timestamp=$_POST['timestamp'];
$value=$_POST['sel2'];
$value1=$_POST['user'];

if(empty($comments))
    {
    echo "You did not fill out the required fields.";
    die();  // Note this
    }
if($value==-1){
		echo "Please select from the DropDown";
	return;}	
$query7 = "INSERT INTO project3 (username,comments,timestamps) VALUES('$value1','$comments',now()) WHERE username='$value1'" ;
$result2=mysql_query($query7) or die("Query Failed : ".mysql_error());
echo"Details successfully updated";
}

?>
</body>
</html>
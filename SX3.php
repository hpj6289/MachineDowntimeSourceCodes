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
<body >
<div align="right"><b><h2><input type="button" name="button" onclick="location.href='Page3.php'" value="Click Here for Comment History"></h2></b></div>
<div align="left"><b><h2><input type="button"  name="button" onclick="location.href='finalproject27.php'" value="Click Here for Summary"></h2></b><div>
<div align="center"><b><h2><u>The table below shows user specific information only</u></b></h2></div>
<div align="right"><input type="button" onclick="location.href ='login.php'" name="button" value="LogOut"></div>

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
$author[$i]=$rows['user_name'];
$i++;
}
$total_elmt=count($author);
?>
<form method="POST" action="">
<label for="Select User">Select User</label>
<select name="sel">
<option value="-1">Select</option></h3></b>
<br><br>
<?php 
//$select=$_POST['sel'];
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $author[$j];
?></option><?php
}
?>
</select>

<input name="submit" type="submit" value="Search"/><br />

</form>
<br><br><br>


 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
<script>
 $(function() {
  $("input[type='checkbox']").change(function() {
		alert(""+$(this).parent().parent().find('.machine').text());
		
//alert("Cookie done")
//$(":checkbox").each(function(){
 // checkboxValues[this.id] = this.checked;
//});
 // alert("Cookie created again");
  $.cookie(this.id, this.checked, { expires: 7, path: '/' });

        //alert($.cookie(this.id));
        //alert(this.id);
        //alert(this.checked);
    })
})
</script>



<div align="center">
<table border="2" border="1" cellpadding="1" cellspacing="1" >

        <tr>
		<th>	
      <input type="checkbox"  id="mybox" value="checked" onChange= "persistCheckBox(this);" />
 </th>

		<th>Machine Name</th>
		<th>Machine Status</th>
		
		<th>Status Description</th>
		
		<th>Comment</th>
		<th>TimeStamp</th>
		 
        </tr>
		
		
	
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//echo "<script>console.log('hi');</script>";
if(isset($_POST['submit']))
{
	
	//echo $_POST['submit'];
$value=$_POST['sel'];
}else{
	
	$value=$_SESSION['sess_user'];
}
$query2 = "SELECT * FROM finalproject WHERE user_name='$value'";

$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
$varCheck=1;
		while($row = mysql_fetch_assoc( $result2 ) )
		  {
            echo "<tr>";
			echo "<td><input type='checkbox' name='box' id='mybox".$varCheck++."' value='Box' /></td>";
			$machine=$row['machine_name'];
           echo  "<td class='machine'><a href='testX.php?machine=$machine'>$machine</a></td>";
			echo  "<td>".$row['status']."</td>";
			echo  "<td>".$row['status_description']."</td>";
			echo  "<td>".$row['lastest_comment']."</td>";
			
			echo  "<td>".$row['timestamp']."</td>";
		   echo "</tr>";
			
		            }

					
					?>

	
		    </table></div>
		    <script>

		   
		    	
		    	$(':checkbox').each(function(){
		    		//alert(this.id);
		    		//alert($.cookie(this.id));

		    		if($.cookie(this.id)&& $.cookie(this.id)=='true'){

		    			$(this).prop('checked','true');

		    		}

		    	});
		    	
 
    

   
    </script>


		
			<br><br><br>
			

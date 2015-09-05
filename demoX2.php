<html>
<head>
<title>Hello World</title>
</head>
<body>
<div>Hello World</div>


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
<h3><b><u>Select the machine:

<h3><b><u><br>New Machine Status:</br></u></b></h3>
<h3><b><u><br>New Status Description:</br></u></b></h3>
<br><input name="submit" type="submit" value="Insert"/><br />
<br><br>
</form></div>

<?php
$var=0;
if(!isset($_GET['machine'])){
	$var=1;
}else if(isset($_GET['machine'])&&(empty(trim($_GET['machine'])))){

	$var=1;
}else{

$machine=$_GET['machine'];


}
//$user=$_POST['usr'];
if(!isset($_GET['status'])){
	$var=1;}
else if(isset($_GET['status'])&&(empty(trim($_GET['status'])))){

$var=1;
}
else{

$status=$_GET['status'];

}

if(!isset($_GET['status_desc'])){

	$var=1;
	
}else if(isset($_GET['status_desc'])&&(empty(trim($_GET['status_desc'])))){

$var=1;
}else{

$statusdesc=$_GET['status_desc'];
//echo "SUCCESS";
}
if($var>0){
	echo "ERROR";
}else{
	echo "SUCCESS";
$query2="INSERT INTO finalproject2(machinename,status,status_description,timestamp)VALUES('$machine','$status','$statusdesc',now())";
	$result3=mysql_query($query2);}
		//echo "Details inserted successfully";



		
	

?>





</body>
</html>



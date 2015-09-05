<html>
<head>
	<title>HiAll</title>
</head>
<body>
	<p>Let's get this thing done with actually</p>
</body>
<?php
if(!isset($_GET['machine'])){

	echo "The machine parameter  is generally empty actually";
}else if(isset($_GET['machine'])&&empty(trim($_GET['machine'])))){

	echo "The machine field value is generally missing";
}else
{
	machine=$_GET['machine'];
}
if(!isset($_GET['status'])){

	echo "The field descriptions of the status is missing generally actually";

}else if(isset($_GET['status'])&&(empty(trim($_GET['status'])))){

	echo "Need to enter the status field value basically actually";
}elsse{

status=$_GET['status'];
}
if(!isset($_GET['status_desc'])&&(empty(trim($_GET['status_desc'])))){

	echo "You're missing the value for the status description field actually basically";

}else{

	status_desc=$_GET['status_desc'];
}
?>
</html>

<html>
<head>
<title>Hello World</title>
</head>
<body>
<div><?php
if(!isset($_GET['test'])){
	echo "Parameter empty";
}else if (isset($_GET['test'])&&(empty(trim($_GET['test'])))){

	echo "No value to the parameter";
}else{

echo $_GET['test'];
}
?>
</div>
</body>
</html>
<!doctype html>
<html>
<head>
<title>STOCK</title>
</head>
<body>

<h1 align="center"><u>User Login</u></h1>

<br><h3 align="left">Please login before checking machine status</h3>
</br>
<h3><u>Registered Users!</u></h3>
<form action="" method="POST">
<b>Username:</b> <input type="text" name="user"><br />
<b>Password:</b> <input type="password" name="pass"><br />
<br><input type="submit" value="Login" name="submit" /></br>
</form>
<div align="right"><h3><u><b>Guest Users: Please sign up!</b></u></h3>
<input type="button" onclick="location.href='register.php'" value="SignUp" name="signup"></div>

<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
$user=$_POST['user'];
$pass=$_POST['pass'];
error_reporting(E_ALL ^ E_DEPRECATED);
$link=mysql_connect("localhost","root","")or die("Can't Connect...");
mysql_select_db("random",$link) or die("Can't Connect to
Database...");
$query=mysql_query("SELECT * FROM login WHERE
username='".$user."' AND password='".$pass."'");
$numrows=mysql_num_rows($query);
if($numrows!=0)
{
while($row=mysql_fetch_assoc($query))
{
$dbusername=$row['username'];
$dbpassword=$row['password'];
}
if($user == $dbusername && $pass == $dbpassword)
{
session_start();
$_SESSION['sess_user']=$_POST['user'];
echo $_SESSION['sess_user'];
/* Redirect browser */
//echo "Welcome $sess_user";
header("Location: SX3.php");
}

} else {
echo "Invalid username or password!";}
}else{
echo "All fields are required!";
}
}
?>
</body>
</html>
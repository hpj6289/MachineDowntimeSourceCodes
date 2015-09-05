<!doctype html>
<html>
<head>
<title>Register</title>
</head>
<body>
<h1 align="center"><i><u>Please fill out the account registration
form</u></i><h1>
<p><h2><a href="register.php">Register</a> | <a
href="login.php">Login</a></h2></p>
<h1 align="center"><u><Registration Form</u></h1>
<form action="" method="POST">
<h3>Username:</h3> <input type="text" name="user"><br />
<br><h3>Password:</h3></br> <input type="password"
name="pass"><br />
<br><h3>Firstname:</h3></br><input type="text" name="first"><br
/>
<br><h3>Lastname:</h3></br> <input type="text" name="last"><br
/>
<br><h3>E-Mail:</h3></br> <input type="text" name="mail"><br />
<br><h3>Contact :</h3></br> <input type="integer"
name="con"><br />
<br><input type="submit" value="Register" name="submit" ></br>
</form>
<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
$user=$_POST['user'];
$pass=$_POST['pass'];
$firstname=$_POST['first'];
$lastname=$_POST['last'];
$email=$_POST['mail'];
$contact=$_POST['con'];
error_reporting(E_ALL ^ E_DEPRECATED);
$link=mysql_connect("localhost","root","")or die("Can't Connect...");
mysql_select_db("random",$link) or die("Can't Connect to
Database...");
$query=mysql_query("SELECT * FROM login WHERE
username='".$user."'");
$numrows=mysql_num_rows($query);
if($numrows==0)
{
$sql="INSERT INTO
login(username,password,firstname,lastname,email,contact)
VALUES('$user','$pass','$firstname','$lastname','$email','$contact
')";
$result=mysql_query($sql);
if($result){
echo "Account Successfully Created";
} else {
echo "Failure!";
}
} else {
echo "That username already exists! Please try again with
another.";
}
} else {
echo "All fields are required!";
}
}
?>
</body>
</html>
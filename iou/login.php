
<?php
if(isset($_POST['register']))
{
session_start();
mysql_connect("localhost","root","");
mysql_selectdb("software");

$e=$_POST['email'];
$f=$_POST['fname'];
$l=$_POST['lname'];
$s=$_POST['sex'];
$p = $_POST['pass'];

$var2="insert into user_account values('$f','$l','$p','$e','$s')";

$var3=mysql_query($var2) or die(mysql_error());;
if($var3)
{
$_SESSION['msg']="Registered Successfully!";
header('Location: first.php');
}
mysql_close();
}
?>
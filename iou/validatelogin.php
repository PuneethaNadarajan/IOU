<html>
<body>
<?php
mysql_connect("localhost","root","");
mysql_selectdb("software");
$a=$_POST['ee'];
$b=$_POST['pp'];
$m=mysql_query("select * from user_account where email='$a' and password='$b'");
$r=mysql_fetch_array($m);
$f=$r['fname'];
if($r==null)
{
echo "<script type='text/javascript'>alert('Wrong username or password!')</script>";
}
else
 {
	session_start();
	$_SESSION['user_id']=$a;
	$_SESSION['user_name']=$f;
	header('Location: creategroup.php');
 }
 
?>
</body>
</html>
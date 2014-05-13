<html>
<head>
<title>
</title>
</head>

<body background="images/100.jpg">
<table width="1350" height="61" border="1">
  <tr bgcolor="#339999">

  
    <td height="55"><img src="images/logo.png">
	
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp; &nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<img src="images/ioumate-51932b731d15738b60383b26656a084a.png">

    
  </td>
  </tr>
  </table>
  
  <div style="float:right;">
  <a href="first.php"><img src="images/logout.png" length="250" width="200" ></a>
   </div>
<?php
session_start();
echo "<h1><b>Welcome  " .$_SESSION['user_name']."</b></h1>";
	mysql_connect("localhost","root","");
	mysql_selectdb("software");
/*	$m=mysql_query("select * from groups");
	while($r=mysql_fetch_array($m))
	{
		echo "<br/>";
		echo $r['gname'];
		
	}*/
  if(isset($_POST['submit']))
  {
	$gu = $_POST['gname'];
	$gi = $_POST['gg'];
	$gd = $_POST['d'];
	$leader=$_SESSION['user_id'];
	$name=$_SESSION['user_name'];
		$amount=0;
		if($gu==null||$gi==null||$gd==null)
{
echo "<script type='text/javascript'>alert('fields cannot be empty! Enter all details!!')</script>";
}
else
{
	$var2="insert into groups values('$gu','$gi','$gd','$leader')";
	$var3=mysql_query($var2) or die(mysql_error());
	$ins="insert into participant values ('$gi','$name','$leader')";
		mysql_query($ins) or die(mysql_error());
		$ins="insert into balance values('$gi','$name','$leader','$amount')";
		mysql_query($ins) or die(mysql_error());
	if($var3)
	{
		$_SESSION['group_code']=$gi;
	  header('Location:pot.php');
	}
	}
	mysql_close();
   }
?>

<br>
<center>
<h1><font color="#660000"><b><i><u>Create Group</i></b></u></font></h1>
<br>
  <form action="" method="post">
  <b><i><font color="#0000CC">Group Name</font></i></b>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="gname"></i></b>
  <br>
  <br>
  <b><i><font color="#003399">Group Id</font></i></b>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="gg"></i></b>
  <br>
  <br>
   <b><i><font color="#0033FF">Creation Date</font></i></b>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="date" name="d"></i></b>
  
<br>
<br>
<input type="submit" name="submit" value="Create">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type="reset" name="reset">
</form>
<br>
<br>
<h1><font color="#330000"><b><i><u>Select Your Group</u></i></b></font></h1>
<form action="group.php" method="post">
<?php
	$user=$_SESSION['user_id'];
	mysql_connect("localhost","root","");
	mysql_selectdb("software");
	$m=mysql_query("select gname,group_code from groups,participant where gid=group_code and email='$user'");
	while($r=mysql_fetch_array($m))
	{
		
		echo "<input type='radio' name='group' value='".$r['group_code']."'>".$r['gname'];
		echo "<br>";
	}
	?>
	
	<input type="submit" name="View" value="Show">

</form>
</body>
</html>
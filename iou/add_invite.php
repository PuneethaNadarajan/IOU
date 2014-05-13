<?php
session_start();
if(isset($_POST['afname']))
{
		$name=$_POST['afname'];
		$email=$_POST['aemail'];
		$group_code=$_SESSION['group_code'];
		$amount=0;
		$gn=$_SESSION['group_name'];

//connection 
require_once('conn.php');
$st="select * from participant where group_code='$group_code' and email='$email'";
	$num=mysql_num_rows(mysql_query($st));
	$m=mysql_query("select * from user_account where email='$email' and fname='$name'");
	$r=mysql_fetch_array($m);
	if($num>=1){
		$_SESSION['msg']="Already member of group";
		header('Location:pot.php');
	}
	else if($r==null)
	{
	$_SESSION['msg']="Your friend is not member of IOU";
	header('Location:pot.php');
	}
	else{
		$ins="insert into participant values ('$group_code','$name','$email')";
		mysql_query($ins) or die(mysql_error());
		$ins="insert into balance values('$group_code','$name','$email','$amount')";
		mysql_query($ins) or die(mysql_error());
		$_SESSION['msg']="Registration Successfully";
		header('Location:pot.php');
	
	}
}
?>

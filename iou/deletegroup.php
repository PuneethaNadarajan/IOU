<?php
	session_start();
	$group=$_SESSION['group_code'];
	$user=$_SESSION['user_id'];
	require_once('conn.php');
	$st="select groupLeader from groups where gid='$group'";
	$r=mysql_fetch_array(mysql_query($st));
	$lead=$r[0];
	if($lead==$user)
	{
		$del="delete from groups where gid='$group'";
		mysql_query($del) or die(mysql_error());
		$del="delete from balance where group_code='$group'";
		mysql_query($del) or die(mysql_error());
		$del="delete from expense where group_code='$group'";
		mysql_query($del) or die(mysql_error());
		$del="delete from participant where group_code='$group'";
		mysql_query($del) or die(mysql_error());
		header('Location:creategroup.php');
	}
	else
	{	
		$_SESSION['msg']="Only group leader can delete!!";
		header('Location:pot.php');
	}
?>

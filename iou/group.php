<?php
session_start();
	$_SESSION['group_code']=$_POST['group'];

	header('Location:pot.php');
?>
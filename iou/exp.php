<?php	
	require_once("conn.php");
	$group_code=$_SESSION['group_code'];
		
	if(isset($_POST['send']))
	{
	
	$purpose=$_POST['expenseP'];
	$amount=$_POST['expenseA'];
	$name=$_SESSION['user_name'];
	$email=$_SESSION['user_id'];
	$checked_arr = $_POST['friends'];
	$count = count($checked_arr);
	$count=$count+1;
	$perhead=ceil($amount/$count);
	$exp="select amount from balance where group_code='$group_code' and email='$email'";
	$res=mysql_query($exp);
	$row=mysql_fetch_row($res);
	$bal = $row[0] + $amount;
	$bal = $bal - $perhead;
	$st="update balance set amount=$bal where email='$email' and group_code='$group_code'";
		mysql_query($st);
	$ins="insert into expense values('$group_code','$purpose',$amount,'$name','$email')";
	mysql_query($ins);
	foreach($_POST['friends'] as $check)
	{
	$up="select amount from balance where group_code='$group_code' and email='$check'";
		$res=mysql_query($up);
		$row=mysql_fetch_row($res);
		$balance=$row[0] - $perhead;
		
		$st="update balance set amount=$balance where email='$check' and group_code='$group_code'";
		mysql_query($st);
		}
	$amount=$amount/$count;
	
	$n=1;
	$list[0]=$email;
	$result=mysql_query("select email from balance where group_code='$group_code'");
	//while($r=mysql_fetch_array($result))
	//{
	//	if(isset($_POST['friends']=='$r['email']')
	//	{
	//		$list[$n]='$r['email']';
	//		$n=$n + 1;
	//	}
	//}
	//$st="select count(*) from participant where group_code='$group_code'";
	//$res=mysql_query($st) or die(mysql_error());
	//$row=mysql_fetch_row($res);
	//$n=$row[0];
	//echo "Number of participant : ".$n;
	

	
	/*
		code for sending updated information to each of the participant.
	
	*/
	$_SESSION['msg']="Your expenses is added successfully.";
	}
	//header('Location:pot.php');
?>
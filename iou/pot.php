<?php
session_start();
if(!isset($_SESSION['group_code']))
{
$_SESSION['msg']="You should login to access this page";
header('location:home.php');
}
else{
require('exp.php');
}
?>
<!DOCTYPE HTML>
<html>
<head><!--GUEST8150687255-->
	<title>IOU</title>
<link rel="icon" href="images/logo.png" type="image/x-icon" />
<link href="fest.css" rel="stylesheet"  type="text/css" />
<script src="jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="fest.js" type="text/javascript"> </script>

<style>
.pics{
   padding:1px;
   <!--border:7px solid royalblue;-->
   box-shadow:5px 5px 5px white;
}
body{
background:Lavender;
}
</style>
</head>
<body id="body">

<div class="wrap" style="background:Lavender;margin-top:-20px;z-index:1;height:100%" >
	<div class="head" style="position:fixed;height:auto;float:left;margin-top:0px;margin-left:0px;width:100%;background:orange;height:80px;box-shadow:2px 2px 2px Lavender;">
		<div class="h1" style="background:inherit;margin-left:140px;float:left;">
			<img  src="images/logo.png"  hspace=20 style="margin-top:20px;"/>
		</div>
	</div>
	<hr>
<div class="cont">
<div id="slideshow" class="slider" style="margin-left:10px;margin-top:100px;" >
		<center><img class="pics" src="run.png"  /></center>
	</div>
<hr>

	
<div id="event" >
<h1 class="eventh1" >menu</h1><hr>
<h2 style="margin-left:50px;">
<ul>
<img src="point.png" height=50 width=50/> <a href="#"><input class="eve" id="cod" type="button" value="Add Friends" /></a><br>
<img src="point.png" height=50 width=50/> <a href="#"><input class="eve" id="debug" type="button" value="Add Expense" /></a><br>
<img src="point.png" height=50 width=50/> <a href="#"><input class="eve" id="lgame" type="button" value="Friend List" /></a><br>
<img src="point.png" height=50 width=50/> <a href="settle.php" ><input class="eve" id="quiz" type="button" value="Settle Amount"/></a><br>
<img src="point.png" height=50 width=50/> <a href="leavegroup.php" ><input class="eve" id="quiz" type="button" value="Leave Group" /></a><br>
<img src="point.png" height=50 width=50/> <a href="deletegroup.php" ><input class="eve" id="quiz" type="button" value="Delete Group" /></a><br>
<img src="point.png" height=50 width=50/> <a href="exitgroup.php" ><input class="eve" id="quiz" type="button" value="Back" /></a><br>
</ul>
</h2>
</div>

<div class="coding" style="">
<h3 style="margin-left:200px;color:red;margin-top:0px;">Add Member</h3>
<hr><h4 style="margin-left:30px;margin-top:0px;" >Enter Details...  </h4>
<b><u><label style="margin-left:10px;">Fill this</label></u></b>
<form action="add_invite.php" method="post">
<input name="afname" type="text" placeholder="first name" required/></li>
<input name="aemail" type="email" placeholder="enter participate mail" required/></li>
<input name="invite" type="submit" value="Add & Invite" /><br><hr>
</form>
<img class="pics" src="images/gt.jpg"  width=400 height=300 style="margin-left:70px;"/>
</div>
<div class="debugging" style="">
<h3 style="margin-left:180px;color:red;margin-top:0px;">Add Expense</h3>
<hr><h4 style="margin-left:30px;margin-top:0px;" >Money Expense Management Information </h4>
<b><u><label style="margin-left:10px;">Fill this</label></u></b><br><center>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input name="expenseP" type="text" placeholder="Expense purpose" /><br>
<input name="expenseA" type="text" placeholder="Expense Ammount" /><br>

<?php
	$user=$_SESSION['user_id'];
	mysql_connect("localhost","root","");
	mysql_selectdb("software");
	$id=$_SESSION['group_code'];
	$result=mysql_query("select email from balance where group_code='$id' and email != '$user'");
	while($r=mysql_fetch_array($result))
	{
		echo "<input type='checkbox' name='friends[]' value='".$r['email']."'>".$r['email']."<br>";
	}
?>
<input name="send" type="submit" value="Add & Send" /><br><hr></center>
</form>
<img class="pics" src="images/money-tree.jpg"  width=300 height=200 style="margin-left:70px;"/>
</div>
<div class="langame" id="participant_list" style="">
<h3 style="margin-left:160px;color:red;margin-top:0px;">Participant List</h3><hr>
<h4 style="margin-left:30px;margin-right:20px;" >Your IOU Group List </h4>
<hr>

</div>
</div>


	
</div>

</body>
</html>
<?php
if(isset($_SESSION['msg'])){
	//echo "<h1> hello</h1>";
		echo "<script>";
		echo "alert('".$_SESSION['msg']."');";
		echo "</script>";
		unset($_SESSION['msg']);
	}
	$gid=$_SESSION['group_code'];
$st="select a.name,a.email,a.group_code from participant a where a.group_code='$gid'";	
$res=mysql_query($st) or die(mysql_error());
while($row=mysql_fetch_row($res)){
	$email=$row[1];
	$st="select COALESCE(sum(amount),0) from expense where email='$email' and group_code='$gid'";
	$AM=mysql_query($st);
	$st="select COALESCE(sum(amount),0) from balance where email='$email' and group_code='$gid'";
	$BM=mysql_query($st);
	$AM=mysql_fetch_row($AM);
	$BM=mysql_fetch_row($BM);
	?>
	<script>
	document.getElementById('participant_list').innerHTML +="<?php
		 
    	echo "<b><label id='dlist' style='margin-left:10px;color:red;'>Member Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label></b>&nbsp;<span id='pname'>$row[0]</span><br>";
		echo "<b><label id='dlist' style='margin-left:10px;color:red;'>Group ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label></b>&nbsp;<span id='pgroup'>$row[2] </span><br>";
		//echo "<b><label id='dlist' style='margin-left:10px;color:red;'>Group Purpose&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label></b>&nbsp;<span id='groupP'>$row[3]</span><br>";
		echo "<b><label id='dlist' style='margin-left:10px;color:red;'>Email ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label></b><span id='pmail'>$email</span><br>";
		echo "<b><label id='dlist' style='margin-left:10px;color:red;'>Money Spent(Rs)&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label></b><span id='pmoney'>$AM[0]</span><br>";
		echo "<b><label id='dlist' style='margin-left:10px;color:red;'>Balance(Rs)&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label></b><span id='bmoney'>$BM[0]</span><br>";
		echo "<hr>";
		?>
	";
	</script>
<?php
}
?>
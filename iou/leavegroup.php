<html>
<head>
</head>
<body background="images/100.jpg">
<table>
<tr bgcolor="#99FF99">
<td height="57"><img src="images/logo.png">
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
<img src="images/ioumate-51932b731d15738b60383b26656a084a.png">
</td></tr></table>

<div style="float:right;">
  <a href="creategroup.php"><img src="images/back.jpg" length="450" width="250" ></a>
   </div>
<?php
	session_start();
	require_once("conn.php");
		$gid=$_SESSION['group_code'];
		$em=$_SESSION['user_id'];
		$sql= "SELECT amount FROM balance WHERE group_code='$gid' AND email='$em' AND amount";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		$p=$row[0];
		//if($p==NULL)
		//$row[0]=0;
		if($p<0)
		{
		header('Location:remove.php');
		}
		//echo "<input type='text' name='group' value='".$row['amount']."'>";
		?>
<center>
<form name="leavegroup" method="post">
                <legend><b><i><h1><u><font color="#660033">LEAVE GROUP</font></u></h1></i></b></legend>
				<br><p><b> <i><h3><font color="#330000">TOTAL AMOUNT YOU HAVE TO REPAY IS.. </font></h3></i></b></p></b>
			<input type="text" name="debt" value=0 readonly>
			<br>
            <?php
		$sql= "SELECT amount FROM balance WHERE group_code='$gid' AND email='$em'";
		$result=mysql_query($sql);
		$r = mysql_fetch_row($result);
		$v=$r[0];
		if($v>=0)
		{
			echo "<b>You don't have any remaining debts.. <br> But, your friends owe you rupees '$v' ! stil you want to leave?!<br><br></b>";
			//$row[0]=0;
		}
		if(isset($_POST['yes']))
		{
		$sq="DELETE FROM balance WHERE group_code='$gid' AND email='$em'";
			$re=mysql_query($sq);
			$que="DELETE FROM expense WHERE group_code='$gid' AND email='$em'";
			$st=mysql_query($que);
			$que="DELETE FROM participant WHERE group_code='$gid' AND email='$em'";
			$st=mysql_query($que);
			echo "<script type='text/javascript'>alert('you are successfully removed from the group!')</script>";
		}
		if(isset($_POST['no']))
		{
		header('Location:pot.php');
		}
		
		?>
				
				<input type="submit" name="yes" value="YES">
		<input type="submit" name="no" value="NO">
		<br><br>
		
				
				</form>
                </center>
				</body>
				</html>




				
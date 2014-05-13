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
		$sql= "SELECT amount FROM balance WHERE group_code='$gid' AND email='$em' AND amount<0";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		$p=$row[0];
		if(!$row)
		{
		echo "<script type='text/javascript'>alert('you dont have any remaining debts!')</script>";
		}
if(isset($_POST['pay']))
	{
		$selected_radio = $_POST['group'];
		$gid=$_SESSION['group_code'];
		$user=$_SESSION['user_name'];
		$b=-$_POST['debt'];
		$sql="INSERT into repay_details values('$gid','$user','$selected_radio',$b)";
		$res=mysql_query($sql);
		$sql="SELECT amount FROM balance WHERE name='$selected_radio' AND group_code='$gid'";
		$res=mysql_query($sql);
		$row = mysql_fetch_row($res);
		$bal=$row[0] + $_POST['debt'];
		$sqli= "UPDATE balance SET amount=$bal WHERE group_code='$gid' AND name='$selected_radio'";
		$res=mysql_query($sqli);
		$ba=0;
		$sqli= "UPDATE balance SET amount=$ba WHERE group_code='$gid' AND name='$user'";
		$res=mysql_query($sqli);
		$row[0]=0;
		echo "<script type='text/javascript'>alert('Amount paid!!you dont have any more remaining debts!')</script>";
	} 
	
	?>
	<center>
<form name="SETTLEDEBT" method="post">
        <legend><b><center><b><i><font color="brown"><h2>SETTLE YOUR DEBT</h2></font></i></b></legend>
		<p> <b><i><font color="brown"><h2>Total amount you have to PAY is </h2></font></i></b></p>
		<input type="text" name="debt" value="<?php echo $row[0];?>" readonly>
		<br>
				<br>
                <table border="5"
                <tr>
                <td>
				<b> <font color="#000000"><h3>SELECT WHOM TO PAY</h3></font></b>
                </td>
                </tr>
                </table>
                <br>
                <br>
		<?php	
		
		$user=$_SESSION['user_name'];
		$sql="select name from balance where group_code='$gid' and name != '$user'";
		$result=mysql_query($sql);
		if($result)
		{
		while($r=mysql_fetch_row($result))
		{
			echo "<input type='radio' name='group' value='".$r[0]."'>".$r[0];
			//if ($_POST['group'] == $r["name"]) 
			//echo 'checked';
			//echo "<input id='myTextArea' name='texta' type='text'>";
			//echo "Enter Amount<br>";
			echo "<br>";
			echo "<br>";
		
		}
		}?>
				<br><br><input type="submit" name="pay" value="SETTLE">
				
				</form>
				</body>
				</html>
				
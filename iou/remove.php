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
		$em=$_SESSION['user_id'];
		$que="DELETE FROM balance WHERE group_code='$gid' AND email='$em'";
		$st=mysql_query($que);
		$que="DELETE FROM expense WHERE group_code='$gid' AND email='$em'";
		$st=mysql_query($que);
		$que="DELETE FROM participant WHERE group_code='$gid' AND email='$em'";
		$st=mysql_query($que);
		echo "<br><b>Amount repaid to '$selected_radio' and you are removed from the group</b><br/><br/>";
		$row[0]=0;
	} 
	if(isset($_POST['aa']))
	{
		$gid=$_SESSION['group_code'];
echo "<table border='2'>  <tr>  <th>GROUP CODE</th>  <th>PAYER</th>  <th>PAYEE</th>  <th>AMOUNT</th></tr>"; 
$sql="SELECT * from repay_details";
$result=mysql_query($sql);
 while($row = mysql_fetch_array($result))
 {
 echo "<tr>"; echo "<td>" . $row['group_code'] . "</td>";
echo "<td>" . $row['payer'] . "</td>";
 echo "<td>" . $row['payee'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
 echo "</tr>"; }
 echo "</table><br><br>";
	}
	?>
	<center>
<form name="leavegroup" method="post">
        <legend><b>LEAVE GROUP</b></legend>
		<p><b> Total amount you have to repay is </p></b> 
		<input type="text" name="debt" value="<?php echo $row[0];?>" readonly>
		<br>
				<br>
                <table border="5"
                <tr>
                <td>
				<b> <font color="#000000"><h3>YOUR GROUP MATES...SELECT ONE TO REPAY</h3></font></b>
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
				<br><br><input type="submit" name="pay" value="REPAY">
				<br><br><input type="submit" name="aa" value="SHOW REPAID DETAILS">
				</form>
				</body>
				</html>
				
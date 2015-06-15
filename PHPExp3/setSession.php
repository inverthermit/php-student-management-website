<?php 
ob_start();
session_start();
if($_SESSION['admin']=="yes")
{
$con=mysql_connect("localhost:3306","root","root");
if(!$con)
{
	die('Couldn\'t connect:' .mysql_error());
}
mysql_select_db("phpexp3",$con);
$result=mysql_query("select * from info where id=".$_GET['id']);
	$num=0;
	$num=mysql_num_rows($result);
 if($num==0)
 { echo 'No such user!'; }
else{
	$row=mysql_fetch_array($result);
	Session_start();
	$_SESSION['id']=$row['id'];
	$_SESSION['name']=$row['name'];
	$_SESSION['sNo']=$row['sNo'];
	$_SESSION['class']=$row['class'];
	$_SESSION['gender']=$row['gender'];
	$_SESSION['hobbies']=$row['hobbies'];
	$_SESSION['Introduction']=$row['Introduction'];
	header("location:user.php");
	exit;

}
}
else
{
	?>
	Wrong.
	<input type="button" class="ui button" value="Back" onclick="history.go(-1)" />
	<?php 
}
?>
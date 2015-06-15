<?php 
$sNo=$_POST["sNo"];
$password=$_POST["password"];
if($sNo=="admin"&&$password=="admin")
{
	Session_start();
	$_SESSION['admin']="yes";
	header("location:admin.php");
	exit();
}
else
{
	$con=mysql_connect("localhost:3306","root","root");
	if(!$con)
	{
		die('Couldn\'t connect:' .mysql_error());
	}
	mysql_select_db("phpexp3",$con);
	$result=mysql_query("select * from info where sNo='".$sNo."' and password='".$password."';");
	$num=0;
	$num=mysql_num_rows($result);
 if($num==0)
 { echo 'No such user!'; }
 else{ 
 	$row=mysql_fetch_array($result);
 	Session_start();
 	$_SESSION['admin']="no";
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

?>

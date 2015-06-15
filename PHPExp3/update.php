<?php
ob_start();
session_start();
$id=$_SESSION['id'];
if(!empty($_FILES['file']['tmp_name'])){
if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/bmp")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 200000))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
				

			move_uploaded_file($_FILES["file"]["tmp_name"],
			"upload/" . $_SESSION['sNo'].".bmp");
			echo "Stored in: " . "upload/" . $_SESSION['sNo'].".bmp";
				
		}
	}
	else
	{
		echo "Invalid file, size should be less than 200000B. Fail to regist.";
	}
}

$con=mysql_connect("localhost:3306","root","root");
if(!$con)
{
	die('Couldn\'t connect:' .mysql_error());
}
mysql_select_db("phpexp3",$con);
$str="";
foreach($_POST['hobbies'] as $c)
{
	$str=$c." ".$str;
}
mysql_query("update info set name='" .$_POST["name"] ."',class='". $_POST["class"]. "',gender='".$_POST["gender"] . "',hobbies='".$str. "',Introduction='" .$_POST["Introduction"]. "' where id=".$id." ;");
$result=mysql_query("select * from info where id=".$_SESSION['id'].";");
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
?>
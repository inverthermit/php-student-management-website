<?php
ob_start();
session_start();
$con=mysql_connect("localhost:3306","root","root");
if(!$con)
{
	die('Couldn\'t connect:' .mysql_error());
}
mysql_select_db("phpexp3",$con);
$result=mysql_query("select * from info where id=".$_SESSION['id'].";");
	$num=0;
	$num=mysql_num_rows($result);
 if($num==0)
{ 
	mysql_query("insert into score values('".$_SESSION['sNo']."','".$_POST['chinese']."','".$_POST['math']."','".$_POST['english']."');");
	header("location:academic.php");
}
else{
	mysql_query("update score set chinese='" .$_POST["chinese"] ."',math='". $_POST["math"]. "',english='".$_POST["english"]."' where sNo=".$_SESSION[sNo]." ;");
	header("location:academic.php");
}

?>
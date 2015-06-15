<?php 
echo $_POST["name"];
echo "<br>";
echo $_POST["password"];
echo "<br>";
echo $_POST["password_again"];
echo "<br>";
if($_POST["password"]==$_POST["password_again"])
{
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
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	
			if (file_exists("upload/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"upload/" . $_POST["sNo"]);
				echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			}
		}
	}
	else
	{
		echo "Invalid file, size should be less than 200000B. Fail to regist.";
	}
}
else {
	echo "Two passwords are different! Failed to regist.";
}

  
echo $_POST["class"];
echo "<br>";
echo $_POST["sNo"];
echo "<br>";
echo $_POST["gender"];
echo "<br>";
foreach($_POST['hobbies'] as $c)
{
    echo $c;
    echo "<br>";
} 
echo $_POST["Introduction"];
echo "<br>";

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
mysql_query("insert into info(name,password,class,sNo,gender,hobbies,Introduction) values('" .$_POST["name"] .
 "','" .$_POST["password"]. "','". $_POST["class"]. "','".$_POST["sNo"] . "','".$_POST["gender"] . "','" 
 		.$str. "','" .$_POST["Introduction"]. "');");
$result=mysql_query("select * from test");
while($row=mysql_fetch_array($result))
{
	echo $row['a'];
	echo "<br>";
}


?>
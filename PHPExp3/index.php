<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Input Page</title>

  <link rel="stylesheet" type="text/css" href="./dist/semantic.css">

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="./dist/semantic.js"></script>
<link rel="stylesheet" type="text/css" href="kitchensink.css">
</head>
<body id="sink">
            <div class="ui grid">
<div class="one wide column">
</div>
<div class="fourteen wide column">
    <div class="demo container">
        <div class="example">
            <br>
            <h1 class="ui header"><a>Regist Information:</a></h1>
            <div class="ui form segment">
            <center>
 <?php 
if($_POST["password"]==$_POST["password_again"])
{
	if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/bmp")
			|| ($_FILES["file"]["type"] == "image/png")
			|| ($_FILES["file"]["type"] == "image/ico"))
			&& ($_FILES["file"]["size"] < 200000))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			$con=mysql_connect("localhost:3306","root","root");
			if(!$con)
			{
				die('Couldn\'t connect:' .mysql_error());
			}
			mysql_select_db("phpexp3",$con);
			$result=mysql_query("select * from info where sNo='".$_POST["sNo"]."';");
			$row=mysql_fetch_array($result);
			if(!empty($row[0]))
			{
				echo "<h1 class='ui red header'>Student number already exists! Failed to regist!</h1>";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"upload/" . $_POST["sNo"].".bmp");
				//echo "Stored in: " . "upload/" . $_POST["sNo"].".bmp";
				$str="";
				foreach($_POST['hobbies'] as $c)
				{
					$str=$c." ".$str;
				}
				mysql_query("insert into info(name,password,class,sNo,gender,hobbies,Introduction) values('" .$_POST["name"] .
				"','" .$_POST["password"]. "','". $_POST["class"]. "','".$_POST["sNo"] . "','".$_POST["gender"] . "','"
						.$str. "','" .$_POST["Introduction"]. "');");
				mysql_query("insert into score values('".$_POST["sNo"] . "',0,0,0);");
				echo "<h1 class='ui green header'>Successfully registed. Go back and log in !</h1>";
			}
	
				
			
		}
	}
	else
	{
		echo "<h1 class='ui red header'>Invalid file, size should be less than 200000B. Failed to regist.</h1>";
	}
}
else {
	echo "<h1 class='ui red header'>Two passwords are different! Failed to regist.</h1>";
}





?>         

        
            <div class="ui buttons" >
            <input type="button" class="ui button" value="Back" onclick="history.go(-1)" />
            <div class="or"></div>
            <a href="login.html"><input type="button" class="ui button" value="Go to Login" /></input></a>
          </div>
        </center>
           </div>
        
        </div>
        
    </div>
    </div>
    </div>
  
</body>

</html>



<?php ob_start();?>
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
  <link rel="stylesheet" type="text/css" href="homepage.css">

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="./dist/semantic.js"></script>

</head>
<body>
<?php 

Session_start();
//echo $_SESSION['admin'];
//echo $_SESSION['id'];
if($_SESSION['admin']=="yes"||$_SESSION['admin']=="no")
{
?>
    <div class="demo container">
        <div class="ui grid">
<div class="one wide column">
</div>
<div class="fourteen wide column">

<div class="ui segment">
    <div class="ui segment" style="background-color:lightgray;">
<h3 class="ui right floated header">
    <br>
<a href="logout.php">Logout</a>
</h3>
<h3 class="ui left floated header">
<?php 
if($_SESSION['admin']=="yes")
{
?>
<div onclick="location.href='admin.php';"  style="cursor:pointer;">
<img class="ui avatar image" src="upload/admin.bmp"/>Admin
</div>


<?php 
}
elseif($_SESSION['admin']=="no")
{
	?>
	<img class="ui avatar image" src="upload/<?php echo $_SESSION['sNo'];?>.bmp"/><?php echo $_SESSION['name'];?>
	<?php 
}
?>
</h3>
</div>
    <div class="ui tabular menu">
  <a herf="user.php" class="item active">
    Personal Information
  </a>
  <a href="academic.php" class="item">
    Academic Performance
  </a>
</div>
    <div  style="background-image:url('back.bmp');background-size: cover; -moz-background-size: cover;" class="ui inverted masthead segment">
    
<div class="ui inverted form">
<div class="ui info message">
<div class="header">Alter the information if you want!</div>
</div>
    
<div class="field">
    <form name="input" action="update.php" method="post" enctype="multipart/form-data">
        <div style="width: 200px;" class="field" >
            <h3>Name</h3>
            <input type="text" placeholder="Name" name="name" value="<?php echo $_SESSION['name'];?>"/>

        </div>
        <div style="width: 200px;" class="field" >
            <h3>Student No.</h3>
            <input type="text" placeholder="Name" disabled="true" value="<?php echo $_SESSION['sNo'];?>"/>

        </div>
        
        <div style="width: 200px;" class="field">
          <h3>Photo</h3>
          <img class="circular ui image" src="upload/<?php echo $_SESSION['sNo'];?>.bmp"/>
          <input class="ui blue button" accept="image/*" type="file" name="file"/>
        </div>
        
        <div style="width: 200px;" class="field">
          <h3>Class</h3>
          <select name="class" >
            <option value="1" <?php if($_SESSION['class']=="1") echo "selected"?>>1</option>
            <option value="2" <?php if($_SESSION['class']=="2") echo "selected"?>>2</option>
            <option value="3" <?php if($_SESSION['class']=="3") echo "selected"?>>3</option>
          </select>
        </div>
        <div class="field">
            <h3>Gender</h3>
            <label ><input class="ui radio checkbox checked" type="radio" name="gender" <?php if($_SESSION['gender']=="male") echo "checked"?> value="male">Male</label>
            <label><input class="ui radio checkbox checked" type="radio" name="gender" <?php if($_SESSION['gender']=="female") echo "checked"?> value="female">Female</label>
            
        </div>
        <div class="field">
            <h3>Hobbies</h3>
                <?php 
                $source = $_SESSION['hobbies'];
                $hello = explode(' ',$source);
                
                ?>
                    <input class="ui checkbox" type="checkbox" <?php foreach($hello as $k)
                    {
                    	if($k=="Basketball")
                    	{
                    		echo "checked";
                    		break;
                    	}
                    }

                    	?> name="hobbies[]" value="Basketball"> Basketball&nbsp;
                    <input class="ui checkbox" type="checkbox" <?php foreach($hello as $k)
                    {
                    	if($k=="Football")
                    	{
                    		echo "checked";
                    		break;
                    	}
                    }

                    	?> name="hobbies[]" value="Football"> Football&nbsp
                    <input class="ui checkbox" type="checkbox" <?php foreach($hello as $k)
                    {
                    	if($k=="Art")
                    	{
                    		echo "checked";
                    		break;
                    	}
                    }

                    	?> name="hobbies[]" value="Art"> Art&nbsp
                    <input class="ui checkbox" type="checkbox" <?php foreach($hello as $k)
                    {
                    	if($k=="Literature")
                    	{
                    		echo "checked";
                    		break;
                    	}
                    }

                    	?> name="hobbies[]" value="Literature"> Literature&nbsp
                    <input class="ui checkbox" type="checkbox" <?php foreach($hello as $k)
                    {
                    	if($k=="Others")
                    	{
                    		echo "checked";
                    		break;
                    	}
                    }
                    

                    	?> name="hobbies[]" value="Others"> Others<br>
                

        </div>
        <div class="field">
            <h3>Introduction</h3>
            <textarea name="Introduction"><?php echo $_SESSION['Introduction'];?></textarea>

        </div>
        

        <br>
        
        <center>
        
            <div class="ui buttons" >
            <input type="button" class="ui button" value="Back" onclick="history.go(-1)" />
            <div class="or"></div>
            <input type="button" class="ui button" value="History" onclick="location.reload()" />
            <div class="or"></div>
            <input type="submit" class="ui positive button" value="Submit" />
          </div>
        </center>
        
</form>
    


</div>
</div>
</div>
  </div>
</div>
</div>
<div class="one wide column">
</div>
</div>
  <?php 
}
else 
{
	echo "Please login again.";
	//session_start();
		//$_SESSION=array();
		//session_destroy();
		//header("Location: login.html");
		//exit();
}
  ?>
</body>

</html>

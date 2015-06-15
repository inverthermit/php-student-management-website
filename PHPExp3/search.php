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
            <?php 
ob_start();
@session_start();
if($_SESSION['admin']=="yes")
{
	?>
	 <div class="ui segment">
    <div class="ui segment" style="background-color:lightgray;">
<h3 class="ui right floated header">
    <br>
    
<a href="logout.php">Logout</a>
</h3>
<h3  class="ui left floated header">
<div onclick="location.href='admin.php';"  style="cursor:pointer;">
<img class="ui avatar image" src="upload/admin.bmp"/>Admin
</div>
</h3>

        
</div>
    <div class="ui segment">
    
    <form class="ui segment" action="search.php">
<div class="ui action left icon input">
  <i class="search icon"></i>
  <input type="text" name="search" placeholder="Search by sNo. or Name...">
  <div><input  class="ui teal button" type="submit" value="Search"></div>
</div>
</form>
</div>
<div class="ui segment">
<h1>Result of "<?php echo $_GET['search'];?>"</h1>
</div>
<div class="ui form segment">
<div class="ui divided very relaxed animated list">                 
               
	<?php 
	$con=mysql_connect("localhost:3306","root","root");
	if(!$con)
	{
		die('Couldn\'t connect:' .mysql_error());
	}
	mysql_select_db("phpexp3",$con);
			$result=mysql_query("select * from info where sNo='".$_GET['search']."' or name like '%".$_GET['search']."%';");
			while($row=mysql_fetch_array($result))
			{
				?>
				 
      <div onclick="location.href='setSession.php?id=<?php echo $row['id'];?>';" class="item" style="cursor:pointer;">
        <img src="upload/<?php echo $row['sNo'];?>.bmp" class="ui top aligned avatar image">
        <div class="content">
          <div class="header"><?php echo $row['name'];?></div>
          Student No. <?php echo $row['sNo'];?>
        </div>
      </div>
     
				<?php 
				
			}
			echo " </div> </div>";
}
else 
{
	?>
	Wrong.
	<input type="button" class="ui button" value="Back" onclick="history.go(-1)" />
	<?php 
}
?>
           
            
                

        
        </div>
        
    </div>
    </div>
    </div>
    </div>
</body>

</html>



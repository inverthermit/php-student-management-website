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
<script>
function checkInt(n,max){
    var regex = /^\d+$/;
    if(regex.test(n)){
       if(n<=max && n>=0){
          
       }else{
          alert("Score should be <"+max+"and >0 !")
       }
    }else{
       alert("Please input an Integer!");
    }
}
</script>
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
  <a href="user.php" class="item">
    Personal Information
  </a>
  <a href="academic.php" class="item active">
    Academic Performance
  </a>
</div>
    <div  style="background-image:url('back.bmp');background-size: cover; -moz-background-size: cover;" class="ui inverted masthead segment">
    
<div class="ui inverted form">
    
<?php 
$con=mysql_connect("localhost:3306","root","root");
if(!$con)
{
	die('Couldn\'t connect:' .mysql_error());
}
mysql_select_db("phpexp3",$con);
$result=mysql_query("select * from score where sNo='".$_SESSION["sNo"]."';");
$num=0;
$num=mysql_num_rows($result);
if($num==0)
{ $row[1]=0;
$row[2]=0;
$row[3]=0;
 }
else{
	$row=mysql_fetch_array($result);
	?>
	
	<?php 
}
?>
<form action="changescore.php" method="post" enctype="multipart/form-data">
    <table class="ui inverted teal celled striped table">
  <thead>
    <tr>
      <th>Subject</th>
      <th>Score</th>
      <th>Grade</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Chinese</td>
      <td>
      <?php 
      if($_SESSION['admin']=="yes")
      {
      	echo "<input type='text' name='chinese' onblur=\"checkInt(this.value,100);\" value='".$row[1]."'>";
      	
      }
      else echo $row[1];
      ?>
      </td>
      <td>
      <?php 
      if($row[1]>=85)
      {
      	echo "A";
      }
      else if($row[1]>=75&&$row[1]<85)
      {
      	echo "B";
      }
      else if($row[1]>=60&&$row[1]<75)
      {
      	echo "C";
      }
      else if($row[1]<60)
      {
      	echo "D";
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>Math</td>
      <td>
      <?php 
      if($_SESSION['admin']=="yes")
      {
      	echo "<input type='text' name='math' onblur=\"checkInt(this.value,100);\" value='".$row[2]."'>";
      	
      }
      else echo $row[2];
      ?>
      </td>
      <td>
      <?php 
      if($row[2]>=85)
      {
      	echo "A";
      }
      else if($row[2]>=75&&$row[2]<85)
      {
      	echo "B";
      }
      else if($row[2]>=60&&$row[2]<75)
      {
      	echo "C";
      }
      else if($row[2]<60)
      {
      	echo "D";
      }
      ?>
      </td>
    </tr><tr>
      <td>English</td>
      <td>
      <?php 
      if($_SESSION['admin']=="yes")
      {
      	echo "<input type='text' name='english' onblur=\"checkInt(this.value,100);\" value='".$row[3]."'>";
      	
      }
      else echo $row[3];
      ?>
      </td>
      <td>
      <?php 
      if($row[3]>=85)
      {
      	echo "A";
      }
      else if($row[3]>=75&&$row[3]<85)
      {
      	echo "B";
      }
      else if($row[3]>=60&&$row[3]<75)
      {
      	echo "C";
      }
      else if($row[3]<60)
      {
      	echo "D";
      }
      ?>
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>Average</th>
      <th>
      <?php 
      $average=($row[1]+$row[2]+$row[3])/3.0;
      echo $average;
      ?>
      </th>
      <th>
      <?php 
      if($average>=85)
      {
      	echo "A";
      }
      else if($average>=75&&$average<85)
      {
      	echo "B";
      }
      else if($average>=60&&$average<75)
      {
      	echo "C";
      }
      else if($average<60)
      {
      	echo "D";
      }
      ?>
      </th>
    </tr>
  </tfoot>
</table>
<?php 
if($_SESSION['admin']=="yes")
		{
?>
<center>
    <input type="submit" value="Save" class="ui orange button">
    </center>
    <?php }?>
    </form>

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

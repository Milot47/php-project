<html>
    <head>
    <title>Adminp</title>
    <link rel="stylesheet" href="style.css" type="text/css">
  
    </head>
<body>

<div class="container" onclick="openNav(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div><br>
    <div id="myNav" class="overlay" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav(this)">&times;</a>
      <div class="overlay-content">
    
   <a href="adminhome.php">Home</a><br></div>
  </div>


  <style>
.container {
  display: inline-block;
  cursor: pointer;
  float: left;
  
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  
  background-color:  #818181;
  margin: 6px 0;
  transition: 0.4s;
}


</style>



<script>
function openImg() {
  document.getElementById("myImg").style.width = "100%";
}
function closeImg() {
  document.getElementById("myImg").style.width = "0%";
}
function openNav(x) {
  document.getElementById("myNav").style.width = "20%";
  //x.classList.toggle("change");
}
function closeNav(x) {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>



<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");


$id = $_GET['id'];
if(isset($_GET['id'])){
    $_SESSION['id']=$id;

} else {
  echo "failed";
}


$query=" select * from tb_req where reqid='$id'";
$data=mysqli_query($con,$query);

if(mysqli_num_rows($data)>0)
{
   
    while($row = mysqli_fetch_assoc($data))
    {
?>
    
    

     
 
  <form action="approve.php" method="post">
        TOPIC   : <?php echo $row['topic'];?><br>
        CATEGORY: <?php echo $row['category'];?><br>
        AMOUNT  : <?php echo $row['amnt'];?><br>
       
        <button name="Approved" type="submit" value="YES" id="Approved">APPROVE</button>
    </form>
    <span style="cursor:pointer" onclick="openImg()"><img  src="uploads/<?php echo $row['img'];?>" style="width:500px;height:400px;" ><br></div></span>
    <div id="myImg" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeImg()">&times;</a>
      <div class="overlay-content">
        <img  src="uploads/<?php echo $row['img'];?>" style="width:568px;height:432px;" ><br></div>
  </div></body>
</html>     


<?php
    }
    
}
mysqli_close($con);
?>

<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Adminp</title>
    <link rel="stylesheet" href="style1.css" type="text/css">
  
    </head>
<body>

 
  <ul>
            <li><div class="container" onclick="openNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
                </div></li>
            <li> <?php echo "WELCOME  " .$email;?></li>
        </ul>
        
        <div id="myNav" class="overlay" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav(this)">&times;</a>
            <div class="overlay-content">
               
                <a href="adminhome.php">Home</a>
            </div>
        </div>
  



<script>
function openImg() {
  document.getElementById("myImg").style.width = "100%";
}
function closeImg() {
  document.getElementById("myImg").style.width = "0%";
}
function openNav() {
  document.getElementById("myNav").style.width = "20%";
  //x.classList.toggle("change");
}
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>



<?php
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
        <?php echo $row['img'];?>
        <button name="Approved" type="submit" value="YES" id="Approved">APPROVE</button>
    </form>
    <span style="cursor:pointer" onclick="openImg()"><img  src="uploads/<?php echo $row['img'];?>" style="width:500px;height:400px;" ><br></span>
    <div id="myImg" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeImg()">&times;</a>
      <div class="overlay-content">
        <img  src="<?php echo $row['img'];?>" style="width:568px;height:432px;" ><br></div>
  </div></body>
</html>     


<?php
    }
    
}
mysqli_close($con);
?>

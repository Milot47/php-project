<!DOCTYPE html>
<html>
<head>
  <title>student</title>
  <link rel="stylesheet" href="style1.css" type="text/css">
  <style>
  #myProgress {
    align:center;
    width:50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
    background-color: grey;
  }

  #myBar {
    text-align:center;
    height: 30px;
    background-color:skyblue;
    text-align: center;
    line-height: 30px;
    color: white;
    border-radius:2px;
  }

  </style>
</head>



<?php
    session_start();
    $em=$_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_req where email='$em' ";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0)
    {
     $row = mysqli_fetch_assoc($data);
     
     $per=round((( $row['payments']/$row['amnt'])*100),0);
     $p=$per/2;
     
?> 



<body>
<div class="container" onclick="openNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div><br>
        <div id="myNav" class="overlay" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav(this)">&times;</a>
            <div class="overlay-content">
               <a href="userhome.php">Home</a>
               <a href="deletereq.php">Delete</a>
                <a href="settings.php">Settings</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
      
   
    


     
       WELCOME <?php echo $row['email']; ?><br>
        
        TOPIC : <?php echo $row['topic']; ?><br>
        AMOUNT : <?php echo $row['amnt']; ?><br>
        



<div id="myProgress">
  <div id="myBar"style="width:<?php echo $p ."%"; ?>"><?php echo $per ."%"; ?></div>
</div>


<?php
}
else
{
 echo "Error";
}   
 mysqli_close($con);   
?>



</body>       
    
</html>  
<script>
function openNav(x) {
  document.getElementById("myNav").style.width = "20%";
  //x.classList.toggle("change");
}
function closeNav(x) {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>  
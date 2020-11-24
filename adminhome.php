<?php
    session_start();
   // $em=$_SESSION['email'];
   //session_register('email');
    $email = $_SESSION['email'];
    $_SESSION['email']=$email;
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_admin where email='$email'";
    $data=mysqli_query($con,$query);
    //echo $email;
    if(mysqli_num_rows($data)>0 && $email=="admin")
    {
     $row = mysqli_fetch_assoc($data);
    
?>

<!DOCTYPE html>
    <html>
        <head>
        <title>Admin</title>
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
                
                <a href="logout.php">Logout</a>
            </div>
        </div>
  </body>
    </html> 
  <style>


</style>



<script>

function openNav(x) {
  document.getElementById("myNav").style.width = "20%";
  //x.classList.toggle("change");
}
function closeNav(x) {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>
      
<?php 
$query1="select * from tb_req where approval='NO'";
$data1=mysqli_query($con,$query1);
if(mysqli_num_rows($data1)>0)
{
    if(mysqli_num_rows($data1)>0)
    {
        while($row = mysqli_fetch_assoc($data1))
        {$em= $row['reqid'];
            ?>
           <a href="padmin.php?id=<?php echo $em; ?>"><?php echo $row['topic'];?></a>
        <?php
        }
    }
}
else{
    printf("error  no data: %s\n", mysqli_error($con));
}
} 
else{
    printf("error  : %s\n", mysqli_error($con));
}
if ( false===$data ) {
    printf("error  v : %s\n", mysqli_error($con));
}

mysqli_close($con);
?>
    
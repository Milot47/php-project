<!DOCTYPE html>
<html>
    <head>
    <title>payment</title>
    <link rel="stylesheet" href="style1.css" type="text/css">
  
    </head>
    <html>

 <ul>
 <li><a href="userhome.php" style=color:white; >HOME</a><li>
 </ul>
 </html>


<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$pay=$_POST["pay"];
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$id = $_SESSION['id'];
if(isset($_SESSION['id'])){

  $query="select * from tb_req where reqid='$id'";
   $data=mysqli_query($con,$query);
   if(mysqli_num_rows($data)>0)
   {
    
     while($row = mysqli_fetch_assoc($data))
     {
        $qu=" update tb_req set payments=payments + $pay where reqid='$id '";
        if($dat=mysqli_query($con,$qu))
       {echo "Payment Success";}
     }
     if ( false===$dat ) {
        printf("error  v : %s\n", mysqli_error($con));
      }
   }
} else {
    echo "failed";
  }
mysqli_close($con);
?>
</html>
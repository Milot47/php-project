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
    if(mysqli_num_rows($data)>0)
    {
     $row = mysqli_fetch_assoc($data);
     echo "ds";
     printf("error  : %s\n", mysqli_error($con));
    } 
    else{
       echo "WELCOME  " .$email;
    }
    if ( false===$data ) {
        printf("error  v : %s\n", mysqli_error($con));
      }
?>
<html>
    <head>
    <title>student</title>
    <link rel="stylesheet" href="page1.css" type="text/css">
  
    </head>
   
    <body>
        <ul>
            <li><a href="request.php">Submit req</a></li>
            <li><a href="requpdate.php">Update req</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </body>
    </html> 
    <?php 
//session_start();
//$_SESSION['email']=$email;
//$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$query1='select topic amnt,category from tb_req where approval="YES"';
$data1=mysqli_query($con,$query1);
//echo $email;
if(mysqli_num_rows($data1)>0)
{
    if(mysqli_num_rows($data1)>0)
    {
        while($row = mysqli_fetch_assoc($data1))
        {?>
           <a href="p.php"><?php echo $row['amnt'];?></a>
        <?php
        }
    }
}
else{
    printf("error  : %s\n", mysqli_error($con));
    
}


mysqli_close($con);
?>
    
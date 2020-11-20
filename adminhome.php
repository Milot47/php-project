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
     echo "WELCOME  " .$email;
    } 
    else{
     //   echo "ds";
     printf("error  : %s\n", mysqli_error($con));
    }
    if ( false===$data ) {
        printf("error  v : %s\n", mysqli_error($con));
      }
?>


<html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" href="page.css" type="text/css">
  
    </head>
   
    <body>
        <ul>
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    </body>
    </html> 
    <?php 

$query1="select * from tb_req where approval='NO'";
$data1=mysqli_query($con,$query1);
//echo $email;
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


mysqli_close($con);
?>
    
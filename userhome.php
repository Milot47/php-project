<?php
    session_start();
    $email = $_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_admin where email='$email' or username='$email'";
    $data=mysqli_query($con,$query);
    
    
    //echo $email;
    if(mysqli_num_rows($data)>0)
    {
     $row = mysqli_fetch_assoc($data);
     echo "WELCOME  " .$email;
     $email = $row['email']; 
     $_SESSION['email']=$email;
    } 
    else{
        printf("error  : %s\n", mysqli_error($con));
    }
    if ( false===$data ) {
        printf("error  v : %s\n", mysqli_error($con));
      }
      
?>
<html>
    <head>
    <title>student</title>
    <link rel="stylesheet" href="page.css" type="text/css">
  
    </head>
   
    <body>
        <ul>
            <li><a href="request.php">REQUEST</a></li>
           
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    </body>
    </html> 
<?php 
$query1="select * from tb_req where approval='YES' AND email!='$email' ";
$data1=mysqli_query($con,$query1);

if(mysqli_num_rows($data1)>0)
{   
    while($row = mysqli_fetch_assoc($data1))
    {
        $em= $row['email'];
       
      {
        ?>
        <a href="p.php?id=<?php echo $em; ?>"><?php echo $row['topic'];?></a>
       
        
        <?php
      }
    }  
}
else{
    printf("error  : %s\n", mysqli_error($con));    
}
mysqli_close($con);
?>
    
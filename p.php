<html>
    <head>
    <title>student</title>
    <link rel="stylesheet" href="page.css" type="text/css">
  
    </head>
    
<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");

$query='select * from tb_req where approval="YES"';
$data=mysqli_query($con,$query);

if(mysqli_num_rows($data)>0)
{
   
    while($row = mysqli_fetch_assoc($data))
    {?>
     <h4>
        TOPIC   : <?php echo $row['topic'];?><br>
        CATEGORY: <?php echo $row['category'];?><br>
        AMOUNT  : <?php echo $row['amnt'];?><br>
     </h4>
     <?php
    }
}
mysqli_close($con);
?>
</html>
<html>
    <head>
    <title>student</title>
    <link rel="stylesheet" href="page1.css" type="text/css">
  
    </head>
    
<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$id = $_GET['id'];
if(isset($_GET['id'])){
  $row['email'] = $_GET['id'];

} else {
  echo "failed";
}
$query="select * from tb_req where reqid='$id'";
$data=mysqli_query($con,$query);


if(mysqli_num_rows($data)>0)
{
   
    while($row = mysqli_fetch_assoc($data))
    {

      ?>
      <h4>
        TOPIC   : <?php echo $row['topic'];?><br>
        CATEGORY: <?php echo $row['category'];?><br>
        AMOUNT  : <?php echo $row['amnt'];?><br>
        AMOUNT  : <?php echo $row['email'];?><br>
     </h4>
     <?php
    }
}
mysqli_close($con);
?>
</html>
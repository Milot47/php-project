<html>
    <head>
    <title>p</title>
    <link rel="stylesheet" href="page1.css" type="text/css">
  
    </head>
    
<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$id = $_GET['id'];
if(isset($_GET['id']))
{
  $_SESSION['id']=$id;
    $query="select * from tb_req where reqid='$id'";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0)
    {
      while($row = mysqli_fetch_assoc($data))
     {
?>
      <h4>
      <form action="payment.php" method="post">
        TOPIC   : <?php echo $row['topic'];?><br>
        CATEGORY: <?php echo $row['category'];?><br>
        AMOUNT  : <?php echo $row['amnt'];?><br>
        CERTIFICATE:<img src="uploads/<?php echo $row['bno'];?>.png" width="50" height="50"><br>
        PAY:<input type="tel" name="pay" placeholder="Enter amount " id="pay"><br>
        <button name="Pay" type="submit"  id="Pay">Pay</button>
        </form>
     </h4>
     <?php
    }
   }
}
else {
  echo "failed";
}
mysqli_close($con);
?>
</html>
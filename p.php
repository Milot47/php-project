<html>
    <head>
    <title>p</title>
    <link rel="stylesheet" href="page1.css" type="text/css">
    <style>

</style>
<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
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
    <body> 
    <ul>
                <li><a href="userhome.php">Home</a></li>
               
                <li><a href="logout.php">Logout</a></li>
      
            </ul>
<span style="cursor:pointer" onclick="openNav()">View Certificate</span>
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <img  src="uploads/<?php echo $row['bno'];?>.png" style="width:568px;height:432px;" ><br></div>
  </div>
          
      <form class="f" action="payment.php" method="post">
      <table>
      <tr><td>TOPIC   :</td>     <td> <?php echo $row['topic'];?><br></td></tr>
      <tr><td>  CATEGORY: </td>  <td><?php echo $row['category'];?><br></td></tr>
      <tr><td>  AMOUNT  :</td>   <td> <?php echo $row['amnt'];?><br></td></tr>
     
      
      <tr><td>  PAY:<input type="tel" name="pay" placeholder="Enter amount " id="pay"><br></td></tr>
      <tr><td> <button name="Pay" type="submit"  id="Pay">Pay</button></td></tr>
        </form>
        </table>  
 
  </body>
</html>     
<?php
    }
   }
}
else {
  echo "failed";
}
mysqli_close($con);
?>

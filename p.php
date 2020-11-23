<html>
    <head>
    <title>Userp</title>
    <link rel="stylesheet" href="page.css" type="text/css">
    <style>

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 5%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
 
  padding: 8px;
  font-size: 36px;
  color: #818181;
  transition: 0.3s;
}


.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}
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
    if(mysqli_num_rows($data)>0 )
    {
      while($row = mysqli_fetch_assoc($data))
     {
?>
    <body> 
    <ul>
      <li><a href="userhome.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>

       
      <form class="f"action="payment.php" method="post">
      <table>
      <tr><td>TOPIC   :</td>     <td> <?php echo $row['topic'];?><br></td></tr>
      <tr><td>  CATEGORY: </td>  <td><?php echo $row['category'];?><br></td></tr>
      <tr><td>  AMOUNT  :</td>   <td> <?php echo $row['amnt'];?><br></td></tr>
     
      
      <tr><td>  PAY:<input type="tel" name="pay" placeholder="Enter amount " id="pay"><br></td></tr>
      <tr><td> <button name="Pay" type="submit"  id="Pay">Pay</button></td></tr>
      
        </table>
        <span style="cursor:pointer" onclick="openNav()">View Certificate</span></form>
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <img  src="uploads/<?php echo $row['img'];?>" style="width:568px;height:432px;" ><br></div>
  </div>
 
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

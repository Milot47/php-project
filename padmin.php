<html>
    <head>
    <title>student</title>
    <link rel="stylesheet" href="page1.css" type="text/css">
  
    </head>
<body>
<ul>
                <li><a href="userhome.php">Home</a></li>    </ul>
    <script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");


$id = $_GET['id'];
if(isset($_GET['id'])){
    $_SESSION['id']=$id;

} else {
  echo "failed";
}


$query=" select * from tb_req where reqid='$id'";
$data=mysqli_query($con,$query);

if(mysqli_num_rows($data)>0)
{
   
    while($row = mysqli_fetch_assoc($data))
    {
?>
    <h4>
    <form action="approve.php" method="post">
        TOPIC   : <?php echo $row['topic'];?><br>
        CATEGORY: <?php echo $row['category'];?><br>
        AMOUNT  : <?php echo $row['amnt'];?><br>
        CERTIFICATE:<img src="uploads/<?php echo $row['bno'];?>.png" width="50" height="50"><br>
        <button name="Approved" type="submit" value="YES" id="Approved">APPROVE</button>
    </form>

     </h4><span style="cursor:pointer" onclick="openNav()">View Certificate</span>
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <img  src="uploads/<?php echo $row['bno'];?>.png" style="width:568px;height:432px;" ><br></div>
  </div>
  </body>
</html>     


<?php
    }
    
}
mysqli_close($con);
?>

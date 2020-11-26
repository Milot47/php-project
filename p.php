<!DOCTYPE html>
<html>
    <head>
    <title>Userp</title>
    <link rel="stylesheet" href="page.css" type="text/css">
    
    </head>
   <style>
    #myProgress {
    align:center;
    width:50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
  
    background-color: grey;
  }

  #myBar {
    text-align:center;
    height: 30px;
    background-color:skyblue;
    text-align: center;
    line-height: 30px;
    color: white;
    
  }

  </style>


    
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
      $per=round((( $row['payments']/$row['amnt'])*100),0);
      if($per<100)
      {
        
    
?>
    <body> 
    <ul>
            <li><div class="container" onclick="openNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
                </div></li>
            <li> <?php echo "WELCOME  " .$email;?></li>
        </ul>
        
        <div id="myNav" class="overlay" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav(this)">&times;</a>
            <div class="overlay-content">
               
                
      <a href="userhome.php">Home</a>
      <a href="logout.php">Logout</a>

            </div>
        </div>
   
       
     
    TOPIC   :</td>     <td> <?php echo $row['topic'];?><br>
    CATEGORY: </td>  <td><?php echo $row['category'];?><br>
    AMOUNT  :</td>   <td> <?php echo $row['amnt'];?><br>
  <span style="cursor:pointer" onclick="openImg()">View Certificate</span></form><br>
  <form class="f"action="payment.php" method="post">
  <input type="tel" name="pay" placeholder="Enter amount " id="pay"></td>   <td> <input type="submit" class="btn" value="PAY">
 <form>
 
  <div id="myImg" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeImg()">&times;</a>
      <div class="overlay-content">
        <img  src="<?php echo $row['img'];?>" ><br></div>
  </div>

    <div id="myProgress">
  <div id="myBar"style="width:<?php echo $per ."%" ; ?>"><?php echo $per ."% completed"; ?></div>
</div>


        
  </body>
</html>     
<?php
      }else{$qu=" update tb_req set approval='DONE' where reqid='$id '";
        if($dat=mysqli_query($con,$qu))
        {echo "Overflow";}
      }
    }
   }
}
else {
  echo "failed";
} //<button class="btn" type="submit"  id="Pay">Pay</button></td></tr>
mysqli_close($con);
?>


<script>
function openImg() {
  document.getElementById("myImg").style.width = "100%";
}
function closeImg() {
  document.getElementById("myImg").style.width = "0%";
}
function openNav() {
  document.getElementById("myNav").style.width = "20%";
  //x.classList.toggle("change");
}
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>
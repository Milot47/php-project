<html>
<head>
  <title>student</title>
  <link rel="stylesheet" href="page1.css" type="text/css">
  <style>
  #myProgress {
    align:center;
    width:50%;
    
    background-color: grey;
  }

  #myBar {
    text-align:center;
    height: 30px;
    background-color:skyblue;
    text-align: center;
    line-height: 30px;
    color: white;
    border-radius:2px;
  }

  </style>
</head>



<?php
    session_start();
    $em=$_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_req where email='$em' ";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0)
    {
     $row = mysqli_fetch_assoc($data);
     
     $per=round((( $row['payments']/$row['amnt'])*100),0);
     $p=$per/2;
     
?> 



<body>
    <ul>
     <li><a href="userhome.php">Home</a></li>
     <li><a href="deletereq.php?id=<?php echo $row['email']; ?>">Remove Request</a></li>
     <li><a href="logout.php">Logout</a></li>
    </ul>

    <table >    
        <tr><td><h3 >WELCOME <?php echo $row['email']; ?></h3></td></tr>
        <tr><td>EMAIL :</td><td> <?php echo $row['email']; ?></td></tr><br>
        <tr><td>TOPIC :</td><td> <?php echo $row['topic']; ?></td></tr><br>
        <tr><td>AMOUNT : </td><td><?php echo $row['amnt']; ?></td></tr><br>
        </table>



<div id="myProgress">
  <div id="myBar"style="width:<?php echo $p ."%"; ?>"><?php echo $per ."%"; ?></div>
</div>


<?php
}
else
{
 echo "Error";
}   
 mysqli_close($con);   
?>



</body>       
    
</html>    
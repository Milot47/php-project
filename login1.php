<?php
session_start();
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$name=$_POST['name'];
$email=$_POST["email"];
$password=$_POST['pswd'];
$_SESSION['email']=$email;



$query="select emailid,name,password,status from tb_admin where username='$name' and password='$password'";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)==1)
    {

        $row = mysqli_fetch_assoc($data);
            if($row['status'] != NULL)
      {
        header("Location:studenthome.php");
      }
      else{
          echo "you're not verified";
      }  
    }
    
   if(mysqli_query($con,$query))
    {
      echo "<script> alert('INVALID USERNAME OR PASSWORD')</script>";
      echo "<script>location.href='login.html'</script>";      
    }
   else
    {
      echo "asd";
    } 

mysqli_close($con);

?>
 <form class="f"> 
      <button><a href="req.php">view Time table</a></button>
 </form>
<?php
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$email=$_POST["mail"];
$password=$_POST["pswd"];
$name=$_POST["name"];
$phone=$_POST["num"];


$qu="insert into tb_admin (username,email,phone,password)values('$name','$email',$phone,'$password')";
if(mysqli_query($con,$qu))
{
    echo "<script> alert('data entered successfully')</script>";
    echo "<script>location.href='login.html'</script>";
 }
 else
 {
     echo "<script> alert('Unable to save data!!!')</script>";
   
 }
mysqli_close($con);
?> 
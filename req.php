<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$help=$_POST["help"];
$Bank=$_POST["Bno"];
$amt=$_POST["amt"];

$query="select * from tb_admin where email='$email' or username='$email'";
$data=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($data);

$email = $row['email'];
//$phno=$_POST["num"];
//echo $email;
$category=$_POST["category"];
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
if($con)
{
  //echo $em;
}


$sql = "INSERT INTO tb_req (email,topic,amnt,category) VALUES('$email','$help','$amt','$category' )";
if($sql){
    $s=1;
}
$result = mysqli_query($con, $sql);
if ( false===$result ) {
    printf("error: %s\n", mysqli_error($con));
  }
if($result)
{
     echo "dfs";
}
if($result)
{
    echo "<script> alert('data entered successfully')</script>";
    echo "<script>location.href='Userhome.php'</script>";
}
 else
{
    echo "<script> alert('Unable to save data!')</script>";
}
mysqli_close($con);
?> 
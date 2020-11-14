<?php
session_start();
$email = $_SESSION['email'];
$em=$_SESSION['email'];
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$help=$_POST["help"];
$Bank=$_POST["Bno"];
$amt=$_POST["amt"];
$phno=$_POST["num"];
$category=$_POST["category"];
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
if($con)
{
  //echo $em;
}
echo $em;
//$email= "SELECT email from tb_admin email where"
$sql = "INSERT INTO tb_req (topic,amnt,category,phone,email) VALUES('$help','$amt','$category','$phno','$em' )";
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
    echo "<script>location.href='login.html'</script>";
}
 else
{
    echo "<script> alert('Unable to save data!')</script>";
}
mysqli_close($con);
?> 
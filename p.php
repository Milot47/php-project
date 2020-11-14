<?php
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");

$query='select * from tb_req where topic=""';
$data=mysqli_query($con,$query);

if(mysqli_num_rows($data)>0)
{
while($row = mysqli_fetch_assoc($data))
{?>
<h1>
    <?php echo $row['topic'];?>
    <?php echo $row['username'];?>
    <?php echo $row['amnt'];?>
</h1>
<?php
}
}
mysqli_close($con);
?>
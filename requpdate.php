<?php
session_start();
    $em=$_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_admin where email='$em' or username='$em'";
    $data=mysqli_query($con,$query);
    echo '<form class="f"><table>';
    if(mysqli_num_rows($data)>0)
    {
     $row = mysqli_fetch_assoc($data);
    }
    else
    {
     echo "abcd";
    }
?>
    <table>    
        <font color="white"><h1 align="center">WELCOME <?php echo $row['username']; ?></h1></font> 
        <tr><td>EMAIL :</td><td> <input type="text" value="<?php echo $row['email']; ?>"></td></tr><br>
        <tr><td>NAME :</td><td> <input type="text" value="<?php echo $row['username']; ?>"></td></tr><br>
        <tr><td>PHONE : </td><td><input type="text" value="<?php echo $row['phone']; ?>"></td></tr><br>
    </table>
            <br><a href="requpdate.html">CLICK HERE TO UPDATE YOUR Req</a>
<?php
    
    echo "</form>";
    
 mysqli_close($con);   
?>

<button><a href="logout.php">logout</a></button><br>

</body>       
    
</html>    
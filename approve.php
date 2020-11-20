<?php
    session_start();
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $approval=$_POST["Approved"];
    if($approval=="YES")
    {
        $qu=" update tb_req set approval='YES' where reqid='$id'";
        $dat=mysqli_query($con,$qu);
        echo " REQUEST APPROVED";
    }
?>
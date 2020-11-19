<?php
  session_start();
  $em=$_SESSION['email'];
  $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
  /*$query="select * from tb_admin where email='$em' ";
  $data=mysqli_query($con,$query);*/
  echo $em;
  $query1="select * from tb_req where email='$em' ";
  $data1=mysqli_query($con,$query1);
  if(mysqli_num_rows($data1)!=0)
    {
      header("Location:requpdate.php");
    }
?>



<html>
<head>
<title>Application</title>
<link rel="stylesheet" href="form.css" type="text/css">
</head>

<script> function VALIDATION() 
  {
    var phone = document.getElementById('num').value;
    
    if(phone.length<10)
    {
      window.alert("please enter a valid phone number!!");
      document.getElementById('num').focus();
      return false;
    }
    return true;
  } </script>

<body>


   <h1>Application Form</h1>
<form  class="f" method="POST" action="req.php" name="req.php" onsubmit="return VALIDATION()"  enctype="multipart/form-data">
<table  >
    <tr><td>Help</td>                   <td><input type="text" name="help"value=""><br></td></tr>
    <tr><td>Attach certificate</td>     <td><input type="file" name="cert"value=""><br></td></tr>
    <tr><td>Bank account no</td>        <td><input type="num" name="Bno"value=""><br></td></tr> 
    <tr><td>Amount</td>                 <td><input type="num" name="amt"value=""><br></td></tr>
    <tr><td><label for="category">Category:</label></td>
    <td><select name="category" id="category">
        <option value="Edu">Education</option>
        <option value="Health">Health</option>
        <option value="Other">Other</option>
        <option value="Other">Other</option>
      </select></td></tr>
    
      
    
</table>   
     <input class="btn" type="submit" name="enter" value="Submit">
 
</form>


</body>
</html>
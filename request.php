<!DOCTYPE html>
<html>
<head>
<title>Application</title>
<link rel="stylesheet" href="style1.css" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<button  style="color:white; background:black; border:black; height:30px; cursor:pointer; " onclick="document.location='userhome.php'">
  <i class="material-icons" >	&#xe88a; </i> 
</button>


<?php
  session_start();
  $em=$_SESSION['email'];
  $_SESSION['email']=$em;
  $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");

  /*<?php echo $em;?><br>*/
  $query1="select * from tb_req where email='$em' ";
  $data1=mysqli_query($con,$query1);
  if(mysqli_num_rows($data1)>0)
    {
      header("Location:requpdate.php");
    }
?>





  
  
  
 Application Form<br>
<form  class="f" method="POST" action="req.php" name="req" onsubmit="return VALIDATION()"  enctype="multipart/form-data">

<table  >
    <tr><td>Help</td>                   <td><input type="text" name="help"  required ><br></td></tr>
    <tr><td>Attach certificate</td>     <td><input type="file" name="fil"  required  id="fil"><br></td></tr>
    <tr><td>Bank account no</td>        <td><input type="num" name="Bno"  required ><br></td></tr> 
    <tr><td>Amount</td>                 <td><input type="num" name="amt"  required ><br></td></tr>
    <tr><td><label for="category">Category:</label></td>
    <td><select name="category" id="category">
        <option value="Edu">Education</option>
        <option value="Health">Health</option>
        <option value="Other">Other</option>
        <option value="Other">Other</option>
      </select></td></tr></b>
    
      
    
</table>   
     <input class="btn" type="submit" name="enter" value="Submit">
 
</form>


</body>
</html>
<script> 
function VALIDATION() 
  {
     var p = document.forms["req"]["Bno"].value;
     
      return true;
     }
  } 
</script>
<?php
session_start();
if(isset($_SESSION['uid']))
{
  header('location:admin/admindash.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style type="text/css">
     .header
   {
   background-color:#202020;
   color: white;
  margin: 50px;
  padding: 50px;
}
   }
  </style>
</head>
<div class="header"
<h1 align="center">Student Management System</h1>
<h4><a href="index.php" style="float:right;margin-right:30px;color:#fff;font-size:20px">Back</a></h4>
</div>
<body style="background-color:#34495e">
<form action="login.php" method="POST">
  <table align="center">
    <tr>
      <td>username</td>
      <td><input type="text" name="uname" required="required"></td>
    </tr>
        <tr>
      <td>Password</td>
      <td><input type="Password" name="pass" required="required"></td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input type="submit" name="login"></td>
    </tr>
  </table>
</body>
</html>
  <?php
include('dbcon.php');
if(isset($_POST['login']))
{
  $username=$_POST['uname'];
  $password=$_POST['pass'];
  $qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
  $run=mysqli_query($con,$qry);
  $row=mysqli_num_rows($run);
  if($row<1)
  {
    ?>
    <script>
      alert('username or Password not match !!');
      window.open('test.php','_self');
    </script>
  <?php
    }
    else
    {
  $data=mysqli_fetch_assoc($run);
  $id=$data['id'];
  $_SESSION['uid']=$id;
  header('location:admin/admindash.php');
  }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="files/boot.css">
<link rel="stylesheet" href="css/style.css">

<title>Login</title>

<style>
html{
  height: 100vh;
}
body{
    background: linear-gradient(135deg, #ff9a9e, #fad961);
    overflow-x:hidden;
    font-family: 'Segoe UI', sans-serif;
}

.login-wrapper{
    background:white;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    padding:30px;
}

.form-control{
    border-radius:8px;
}

.btn{
    border-radius:25px;
    padding:8px 25px;
}

.page-header{
    color:white;
    font-weight:600;
}

img{
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

.alert{
    border-radius:10px;
}
</style>

</head>
<body>

<div class="container py-4">

<div class="row align-items-center mb-3">
<div class="col-lg-2 col-md-2 col-sm-12 mb-2">
<a href="registration.php" class="btn btn-light btn-block shadow-sm">Register</a>
</div>

<div class="col-lg-8 col-md-8 col-sm-12 text-center">
<h2 class="page-header" style="margin-top: 50px;">Login Form</h2>

<?php
session_start();

if(isset($_SESSION['error']))
{
?>
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
<strong>Error!</strong> <?php echo $_SESSION['error'] ?>
<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
<?php
unset($_SESSION['error']);
}
?>
</div>

<div class="col-lg-2 col-md-2 col-sm-12 mb-2">
<a href="index.php" class="btn btn-warning btn-block shadow-sm">Back</a>
</div>
</div>

<div class="row align-items-center">

<div class="col-lg-6 col-md-6 col-sm-12 mb-4 text-center">
<img src="image/GAS1.jpg" class="img-fluid">
</div>

<div class="col-lg-6 col-md-6 col-sm-12">

<div class="login-wrapper">

<form action="login2.php" method="post">

<table class="table table-borderless">

<tr>
<th>Email</th>
<td>
<input type="text" name="email" placeholder="Enter Email" required class="form-control"
value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
</td>
</tr>

<tr>
<td colspan="2" class="text-center font-weight-bold text-muted">OR</td>
</tr>

<tr>
<th>Mobile</th>
<td>
<input type="text" name="mob" placeholder="Enter Mobile" class="form-control"
value="<?php if(isset($_COOKIE['mob'])) { echo $_COOKIE['mob']; } ?>">
</td>
</tr>

<tr>
<th>Password</th>
<td>
<input type="password" name="password" placeholder="Enter Password" class="form-control"
value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
</td>
</tr>

<tr>
<td class="text-right">
<input type="checkbox" name="remember">
</td>
<td>Remember Me</td>
</tr>

<tr>
<td colspan="2" class="text-center">
<button type="submit" name="submit" class="btn btn-success btn-lg mt-3 shadow">
Login
</button>
</td>
</tr>

</table>
</form>

</div>
</div>

</div>
</div>

<script src="files/boot.js"></script> 
<script src="files/boot1.js"></script>
<script src="files/boot2.js"></script>

</body>
</html>

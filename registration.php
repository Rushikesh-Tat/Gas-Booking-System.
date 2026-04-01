<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="files/boot.css">
<link rel="stylesheet" href="css/style.css">

<title>LPG GAS - Registration</title>

<style>
body{
    background: linear-gradient(135deg, #ff9a9e, #fad961);
    overflow-x:hidden;
    font-family: 'Segoe UI', sans-serif;
}

.registration-wrapper{
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

.table th{
    width:35%;
    vertical-align:middle;
}
</style>
</head>

<body>

<div class="container py-4">

<!-- Top Buttons + Title -->
<div class="row align-items-center mb-3">

<div class="col-lg-2 col-md-2 col-sm-12 mb-2">
<a href="login.php" class="btn btn-light btn-block shadow-sm">Login</a>
</div>

<div class="col-lg-8 col-md-8 col-sm-12 text-center">
<h2 class="page-header">Registration Form</h2>

<?php
session_start();

if(isset($_SESSION['success'])){
?>
<div class="alert alert-success alert-dismissible fade show mt-3">
<strong>Success!</strong> <?php echo $_SESSION['success'] ?>
<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
<?php unset($_SESSION['success']); }

if(isset($_SESSION['error'])){
?>
<div class="alert alert-danger alert-dismissible fade show mt-3">
<strong>Error!</strong> <?php echo $_SESSION['error'] ?>
<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
<?php unset($_SESSION['error']); }
?>
</div>

<div class="col-lg-2 col-md-2 col-sm-12 mb-2">
<a href="index.php" class="btn btn-warning btn-block shadow-sm">Back</a>
</div>

</div>

<!-- Main Section -->
<div class="row align-items-center">

<div class="col-lg-6 col-md-6 col-sm-12 mb-4 text-center">
<img src="image/GAS1.jpg" class="img-fluid">
</div>

<div class="col-lg-6 col-md-6 col-sm-12">

<div class="registration-wrapper" style="height: 85vh">

<form action="registration2.php" method="post" enctype="multipart/form-data">

<table class="table table-borderless">

<tr>
<th>Name</th>
<td><input type="text" name="name" required pattern="[a-zA-Z\s]+" 
class="form-control" placeholder="Enter Name"></td>
</tr>

<tr>
<th>Email</th>
<td><input type="email" name="email" required 
class="form-control" placeholder="Enter Email"></td>
</tr>

<tr>
<th>Mobile</th>
<td><input type="text" name="mob" required pattern="[6789][0-9]{9}" 
class="form-control" placeholder="Enter Mobile"></td>
</tr>

<tr>
<th>Aadhar</th>
<td><input type="text" name="adhar" required pattern="[0-9]{12}" 
class="form-control" placeholder="Enter Aadhar"></td>
</tr>

<tr>
<th>Address</th>
<td><textarea name="address" required 
class="form-control" placeholder="Enter Address"></textarea></td>
</tr>

<tr>
<th>Photo</th>
<td><input type="file" name="photo" required class="form-control"></td>
</tr>

<tr>
<th>Password</th>
<td><input type="password" name="password" required 
class="form-control" placeholder="Enter Password"></td>
</tr>

<tr>
<td colspan="2" class="text-center">
<button type="submit" name="submit" 
class="btn btn-success btn-lg mt-3 shadow">
Create Account
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

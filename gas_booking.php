<?php
session_start();
include("dbcon.php");
if(empty($_SESSION['name']) && empty($_SESSION['id']))
{
    $_SESSION['error']="Something Went Wrong Please Login First"; 
    header("location:lgas_booking.php");    
}
$id=$_SESSION['id'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="files/boot.css">
<link rel="stylesheet" href="css/style.css">

<title>Gas Booking</title>

<style>

.container-fluid {
    margin:0px;
    padding:0px;
}

body {
    overflow-x:hidden;
    background:#f3e8ff;
    font-family:Arial, Helvetica, sans-serif;
}

/* Welcome Heading */
h1{
    font-weight:600;
    color:#333;
}

/* Navigation Tabs */
.nav-tabs{
    margin-top:15px;
}

.nav-tabs .nav-link{
    font-weight:500;
    color:#444;
}

/* Hover effect */
.nav-tabs .nav-link:hover{
    background:#0099ff;
    color:white;
    transition:0.3s;
}

/* Active tab */
.nav-tabs .nav-link.active{
    background:#ff0000;
    color:white;
    border-radius:5px;
}

/* Booking Form */
form{
    background:white;
    padding:25px;
    border-radius:8px;
    box-shadow:0px 4px 12px rgba(0,0,0,0.1);
}

/* Labels */
label{
    font-weight:600;
    color:#444;
}

/* Input Fields */
.form-control{
    border-radius:5px;
    border:1px solid #ccc;
}

/* Input Focus */
.form-control:focus{
    border-color:#007bff;
    box-shadow:0 0 5px rgba(0,123,255,0.3);
}

/* Submit Button */
.btn-primary{
    width:120px;
    font-weight:600;
    border-radius:6px;
}

/* Alerts */
.alert{
    margin-top:15px;
}

/* Logout Button */
.btn-outline-warning{
    font-weight:600;
}

</style>

</head>

<body>

<div class="container-fluid">

<div class="row mt-4">

<div class="col-lg-1 col-md-1 col-sm-1"></div>

<div class="col-lg-10 col-md-10 col-sm-10 mt-2">

<h1>Welcome <?php echo strtoupper($_SESSION['name']) ?></h1>

<ul class="nav nav-tabs">

<li class="nav-item">
<a class="nav-link" href="profile.php">My Profile</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="gas_booking.php">Gas Booking</a>
</li>

<li class="nav-item">
<a class="nav-link" href="new_connection.php">New Connection</a>
</li>

<li class="nav-item">
<a class="nav-link" href="bookinghistory.php">Booking History</a>
</li>

</ul>

<?php
if(isset($_SESSION['success']))
{
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success Message</strong> <?php echo $_SESSION['success'] ?>
<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>

<?php
unset($_SESSION['success']);
}
?>

<?php
if(isset($_SESSION['error']))
{
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error Message</strong> <?php echo $_SESSION['error'] ?>
<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>

<?php
unset($_SESSION['error']);
}
?>

</div>

<div class="col-lg-1 col-md-1 col-sm-1">
<a href="logout.php" class="btn btn-outline-warning float-right mr-4 my-3">logout</a>
</div>

</div>

<?php
$sql="select registration.name,registration.email,registration.mob,registration.adress,
connection.gastype from registration inner join connection on 
registration.id=connection.regid where registration.id=$id";

$x=mysqli_query($con,$sql);

if($r=mysqli_fetch_assoc($x))
{
?>

<div class="row">

<div class="col-lg-4 col-md-4 col-sm-12 p-4"></div>

<div class="col-lg-4 col-md-4 col-sm-12 p-4">

<form action="" method="post" enctype='multipart/form-data'>

<div class="form-group">
<label>Name</label>
<input type="text" name="name" value="<?= $r['name']?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" value="<?= $r['email']?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>Mobile</label>
<input type="text" name="mob" value="<?= $r['mob']?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>Gas Type</label>
<input type="text" name="gastype" value="<?= $r['gastype']?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>Address</label>
<textarea name="address" cols="30" rows="2" class="form-control"><?= $r['adress']?></textarea>
</div>

<div class="form-group text-center">
<button type="submit" class="btn btn-primary" name="id" value="<?= $id ?>">SUBMIT</button>
</div>

</form>

</div>

<div class="col-lg-4 col-md-4 col-sm-12"></div>

</div>

<?php
}
?>

</div>

<script src="files/boot.js"></script> 
<script src="files/boot1.js"></script>
<script src="files/boot2.js"></script>

</body>
</html>

<?php
include("dbcon.php");

if(isset($_POST['id']))
{
extract($_POST);

$bookingdate=date('d-M-Y');

$sql="INSERT INTO `booking`(`regid`, `name`, `email`, `mob`, `address`, `gastype`,`bookingdate`) 
VALUES ($id,'$name','$email','$mob','$address','$gastype','$bookingdate')";

if(mysqli_query($con,$sql))
{
$_SESSION['name']=$name;
$_SESSION['mob']=$mob;
$_SESSION['address']=$address;

$_SESSION['success']="You Successfully Booked Gas.."; 

header("location:payment.php"); 
}
else
{
$_SESSION['error']="Something went Wrong.."; 
header("location:gas_booking.php"); 
}
}
?>
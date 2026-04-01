<?php
session_start();
include("dbcon.php");
if(empty($_SESSION['name']) && empty($_SESSION['id']))
{
    $_SESSION['error']="Something Went Wrong Please Login First"; 
    header("location:login.php");    
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

<title>Booking History</title>

<style>

.container-fluid{
margin:0;
padding:0;
}

body{
overflow-x:hidden;
background:#f3e8ff;
font-family:Arial, Helvetica, sans-serif;
}

/* Heading */
h1{
font-weight:600;
color:#333;
}

/* NAVIGATION TABS */
.nav-tabs .nav-link{
color:#444;
font-weight:500;
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

/* Table styling */
.table{
background:white;
border-radius:8px;
overflow:hidden;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

/* Table header */
.table th{
background:#6f42c1;
color:white;
text-align:center;
}

/* Table rows */
.table td{
text-align:center;
vertical-align:middle;
}

/* Hover effect */
.table tbody tr:hover{
background:#f1e6ff;
transition:0.3s;
}

/* Status badge */
.status-pending{
background:#ffc107;
color:black;
padding:4px 10px;
border-radius:5px;
font-size:13px;
}

.status-delivered{
background:#28a745;
color:white;
padding:4px 10px;
border-radius:5px;
font-size:13px;
}

.status-cancel{
background:#dc3545;
color:white;
padding:4px 10px;
border-radius:5px;
font-size:13px;
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
<a class="nav-link" href="gas_booking.php">Gas Booking</a>
</li>

<li class="nav-item">
<a class="nav-link" href="new_connection.php">New Connection</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="bookinghistory.php">Booking History</a>
</li>

</ul>

</div>

<div class="col-lg-1 col-md-1 col-sm-1">
<a href="logout.php" class="btn btn-outline-warning float-right mr-4 my-3">logout</a>
</div>

</div>

<div class="row">

<div class="col-lg-1"></div>

<div class="col-lg-10 p-4">

<table class="table table-bordered">

<tr>
<th>Booking Id</th>
<th>Gas Type</th>
<th>Booking Date</th>
<th>Status</th>
</tr>

<?php
$sql="select * from booking where regid=$id";
$x=mysqli_query($con,$sql);

while($r=mysqli_fetch_assoc($x))
{
$status=$r['status'];

if($status=="pending"){
$badge="<span class='status-pending'>Pending</span>";
}
elseif($status=="delivered"){
$badge="<span class='status-delivered'>Delivered</span>";
}
else{
$badge="<span class='status-cancel'>Not Delivered</span>";
}
?>

<tr>
<td><?=$r['id']?></td>
<td><?=$r['gastype']?></td>
<td><?=$r['bookingdate']?></td>
<td><?=$badge?></td>
</tr>

<?php
}
?>

</table>

</div>

<div class="col-lg-1"></div>

</div>

</div>

<script src="files/boot.js"></script> 
<script src="files/boot1.js"></script>
<script src="files/boot2.js"></script>

</body>
</html>
<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="sidebar">
    <h2>OMCMS</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="modules/clients.php">Clients</a>
    <a href="modules/campaigns.php">Campaigns</a>
    <a href="modules/performance.php">Performance</a>
    <a href="modules/reports.php">Reports</a>
    <a href="logout.php">Logout</a>
    <a href="modules/performance.php">Performance</a>
</div>

<div class="main">

<h1>Dashboard Overview</h1>

<?php

$clients = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM clients"));
$campaigns = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM campaigns"));

?>

<div class="cards">

<div class="card">
<h3>Total Clients</h3>
<p><?php echo $clients; ?></p>
</div>

<div class="card">
<h3>Total Campaigns</h3>
<p><?php echo $campaigns; ?></p>
</div>

</div>

</div>

</body>
</html>

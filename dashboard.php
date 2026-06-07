<?php

include("includes/config.php");

$c1 = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM clients")
);

$c2 = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM campaigns")
);

?>

<h1>Dashboard</h1>

<div>

<h3>Total Clients</h3>

<p><?php echo $c1; ?></p>

</div>

<div>

<h3>Total Campaigns</h3>

<p><?php echo $c2; ?></p>

</div>

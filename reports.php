<?php

include("../includes/config.php");

$clients =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM clients"
));

$campaigns =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM campaigns"
));

?>

<h2>
System Report
</h2>

<p>
Total Clients:
<?php echo $clients; ?>
</p>

<p>
Total Campaigns:
<?php echo $campaigns; ?>
</p>

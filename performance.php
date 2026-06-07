<?php
include("../includes/config.php");

/* SAVE PERFORMANCE DATA */
if(isset($_POST['save'])){

$campaign_id = $_POST['campaign_id'];
$clicks = $_POST['clicks'];
$leads = $_POST['leads'];
$sales = $_POST['sales'];
$date = date("Y-m-d");

mysqli_query($conn,
"INSERT INTO performance
(campaign_id, clicks, leads, sales, record_date)
VALUES
('$campaign_id','$clicks','$leads','$sales','$date')"
);

}

/* GET CAMPAIGNS */
$campaigns = mysqli_query($conn,"SELECT * FROM campaigns");
?>

<h2>Campaign Performance Tracking</h2>

<form method="POST">

<select name="campaign_id" required>

<?php while($c = mysqli_fetch_array($campaigns)){ ?>

<option value="<?php echo $c['campaign_id']; ?>">
<?php echo $c['campaign_name']; ?>
</option>

<?php } ?>

</select>

<br><br>

<input type="number" name="clicks" placeholder="Clicks" required>
<br><br>

<input type="number" name="leads" placeholder="Leads" required>
<br><br>

<input type="number" name="sales" placeholder="Sales" required>
<br><br>

<button name="save">Save Performance</button>

</form>

<hr>

<h3>Performance Records</h3>

<table border="1" cellpadding="10">

<tr>
<th>Campaign</th>
<th>Clicks</th>
<th>Leads</th>
<th>Sales</th>
<th>Date</th>
</tr>

<?php

$data = mysqli_query($conn,"
SELECT performance.*, campaigns.campaign_name
FROM performance
JOIN campaigns
ON performance.campaign_id = campaigns.campaign_id
");

while($row = mysqli_fetch_array($data)){
?>

<tr>
<td><?php echo $row['campaign_name']; ?></td>
<td><?php echo $row['clicks']; ?></td>
<td><?php echo $row['leads']; ?></td>
<td><?php echo $row['sales']; ?></td>
<td><?php echo $row['record_date']; ?></td>
</tr>

<?php } ?>

</table>

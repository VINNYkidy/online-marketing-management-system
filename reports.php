<?php
include("../includes/config.php");

/* TOTAL COUNTS */
$total_clients = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM clients"));
$total_campaigns = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM campaigns"));

/* TOTAL PERFORMANCE */
$total_clicks = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(clicks) AS clicks FROM performance"));
$total_leads = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(leads) AS leads FROM performance"));
$total_sales = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(sales) AS sales FROM performance"));
?>

<h2>System Reports & Analytics</h2>

<div style="display:flex; gap:20px;">

<div>
<h3>Total Clients</h3>
<p><?php echo $total_clients; ?></p>
</div>

<div>
<h3>Total Campaigns</h3>
<p><?php echo $total_campaigns; ?></p>
</div>

<div>
<h3>Total Clicks</h3>
<p><?php echo $total_clicks['clicks']; ?></p>
</div>

<div>
<h3>Total Leads</h3>
<p><?php echo $total_leads['leads']; ?></p>
</div>

<div>
<h3>Total Sales</h3>
<p><?php echo $total_sales['sales']; ?></p>
</div>

</div>

<hr>

<h3>Campaign Performance Summary</h3>

<table border="1" cellpadding="10">

<tr>
<th>Campaign</th>
<th>Total Clicks</th>
<th>Total Leads</th>
<th>Total Sales</th>
</tr>

<?php

$data = mysqli_query($conn,"
SELECT campaigns.campaign_name,
SUM(performance.clicks) AS clicks,
SUM(performance.leads) AS leads,
SUM(performance.sales) AS sales

FROM performance
JOIN campaigns
ON performance.campaign_id = campaigns.campaign_id
GROUP BY performance.campaign_id
");

while($row = mysqli_fetch_array($data)){
?>

<tr>
<td><?php echo $row['campaign_name']; ?></td>
<td><?php echo $row['clicks']; ?></td>
<td><?php echo $row['leads']; ?></td>
<td><?php echo $row['sales']; ?></td>
</tr>

<?php } ?>

</table>

<?php
include("../includes/config.php");

$campaigns =
mysqli_query(
$conn,
"SELECT * FROM campaigns"
);

if(isset($_POST['save'])){

$campaign =
$_POST['campaign'];

$clicks =
$_POST['clicks'];

$leads =
$_POST['leads'];

$sales =
$_POST['sales'];

$date =
date("Y-m-d");

mysqli_query(
$conn,
"INSERT INTO performance
(campaign_id,clicks,
leads,sales,record_date)

VALUES
('$campaign',
'$clicks',
'$leads',
'$sales',
'$date')"
);

}
?>

<h2>
Campaign Performance
</h2>

<form method="POST">

<select name="campaign">

<?php

while(
$c =
mysqli_fetch_array($campaigns)
){

?>

<option
value="<?php
echo $c['campaign_id'];
?>">

<?php
echo $c['campaign_name'];
?>

</option>

<?php } ?>

</select>

<input
type="number"
name="clicks"
placeholder="Clicks">

<input
type="number"
name="leads"
placeholder="Leads">

<input
type="number"
name="sales"
placeholder="Sales">

<button
name="save">

Save

</button>

</form>

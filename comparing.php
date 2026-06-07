<?php
include("../includes/config.php");

$clients = mysqli_query($conn,"SELECT * FROM clients");

if(isset($_POST['add'])){
    $cid = $_POST['client_id'];
    $name = $_POST['name'];
    $platform = $_POST['platform'];
    $budget = $_POST['budget'];

    mysqli_query($conn,
    "INSERT INTO campaigns(client_id,campaign_name,platform,budget)
    VALUES('$cid','$name','$platform','$budget')");
}
?>

<h2>Campaigns</h2>

<form method="POST">

<select name="client_id">
<?php while($c = mysqli_fetch_array($clients)){ ?>
<option value="<?php echo $c['client_id']; ?>">
<?php echo $c['client_name']; ?>
</option>
<?php } ?>
</select>

<input name="name" placeholder="Campaign Name">
<input name="platform" placeholder="Platform">
<input name="budget" placeholder="Budget">

<button name="add">Add</button>
</form>

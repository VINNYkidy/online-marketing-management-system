<?php

include("../includes/config.php");

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM clients
WHERE client_id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$name = $_POST['client_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

mysqli_query(
$conn,
"UPDATE clients
SET
client_name='$name',
email='$email',
phone='$phone'
WHERE client_id='$id'"
);

header("Location: clients.php");

}

?>

<h2>Edit Client</h2>

<form method="POST">

<input
type="text"
name="client_name"
value="<?php echo $row['client_name']; ?>">

<br><br>

<input
type="email"
name="email"
value="<?php echo $row['email']; ?>">

<br><br>

<input
type="text"
name="phone"
value="<?php echo $row['phone']; ?>">

<br><br>

<button name="update">
Update Client
</button>

</form>

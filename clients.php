<?php
include("../includes/config.php");

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query($conn,
    "INSERT INTO clients(client_name,email,phone)
    VALUES('$name','$email','$phone')");
}

$data = mysqli_query($conn,"SELECT * FROM clients");
?>

<h2>Clients</h2>

<form method="POST">
<input name="name" placeholder="Name">
<input name="email" placeholder="Email">
<input name="phone" placeholder="Phone">
<button name="add">Add Client</button>
</form>

<hr>

<?php while($row = mysqli_fetch_array($data)){ ?>
<p>
<?php echo $row['client_name']; ?>
</p>
<?php } ?>
<form method="GET">
<input type="text"
name="search"
placeholder="Search Client">

<button type="submit">
Search
</button>
</form>
if(isset($_GET['search'])){

$search = $_GET['search'];

$data = mysqli_query(
$conn,
"SELECT * FROM clients
WHERE client_name
LIKE '%$search%'"
);

}else{

$data = mysqli_query(
$conn,
"SELECT * FROM clients"
);

}
<?php while($row = mysqli_fetch_array($data)){ ?>

<p>

<?php echo $row['client_name']; ?>

<a href="clients.php?delete=<?php
echo $row['client_id']; ?>">

Delete

</a>

</p>

<?php } ?>
if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query(
$conn,
"DELETE FROM clients
WHERE client_id='$id'"
);

}

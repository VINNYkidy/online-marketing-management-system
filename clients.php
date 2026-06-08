<?php
include("../includes/config.php");

/* ADD CLIENT */
if(isset($_POST['add'])){

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query(
        $conn,
        "INSERT INTO clients(client_name,email,phone)
        VALUES('$name','$email','$phone')"
    );
}

/* DELETE CLIENT */
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM clients
        WHERE client_id='$id'"
    );
}

/* SEARCH CLIENT */
if(isset($_GET['search'])){

    $search = $_GET['search'];

    $data = mysqli_query(
        $conn,
        "SELECT * FROM clients
        WHERE client_name LIKE '%$search%'"
    );

}else{

    $data = mysqli_query(
        $conn,
        "SELECT * FROM clients"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
</head>
<body>

<h2>Clients</h2>

<!-- Add Client Form -->
<form method="POST">

    <input
        type="text"
        name="name"
        placeholder="Name"
        required>

    <input
        type="email"
        name="email"
        placeholder="Email"
        required>

    <input
        type="text"
        name="phone"
        placeholder="Phone"
        required>

    <button name="add">
        Add Client
    </button>

</form>

<hr>

<!-- Search Form -->
<form method="GET">

    <input
        type="text"
        name="search"
        placeholder="Search Client">

    <button type="submit">
        Search
    </button>

</form>

<hr>

<!-- Client List -->
<?php while($row = mysqli_fetch_array($data)){ ?>

<p>

    <?php echo $row['client_name']; ?>

    |

    <?php echo $row['email']; ?>

    |

    <?php echo $row['phone']; ?>

    <a href="clients.php?delete=<?php echo $row['client_id']; ?>">
        Delete
    </a>

</p>

<?php } ?>

</body>
</html>
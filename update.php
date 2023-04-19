<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE DATA</title>
</head>
<link rel = "stylesheet" href= "style.css">

<body>
    <center>

<div class = "header">
<h1 > Updating User Data</h1>
</div>
<?php
    $conn = mysqli_connect("localhost", "root", "", "mydb");

    if (!$conn) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if (isset($_GET['cust'])) {
        $custid = $_GET['cust'];
        $query = "SELECT * FROM tbluser WHERE custid = $custid";

        if ($result = $conn->query($query)) {
            $row = $result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $custid = $_POST['custid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];

        $sql = "UPDATE tbluser SET firstname='$firstname', lastname='$lastname', email='$email' WHERE custid=$custid";

        if ($conn->query($sql) === true) {
            header("location: index.php");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
?>

<div class = "bg">
<form method="post">
    <label for="ID">ID:</label>
    <input type="text" name="custid" value="<?php echo htmlspecialchars($custid); ?>">

<label for="firstname">Firstname:</label>
<input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" required>

<label for="lastname">Lastname:</label>
<input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" required>

<label for="email">Email:</label>
<input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

<input type="submit" value="UPDATE">
<button type="button" onclick="window.location.href='index.php';">CANCEL</button>
</form>
</div>

</body>
</html>
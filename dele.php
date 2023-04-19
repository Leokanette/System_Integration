<?php



$conn = mysqli_connect("localhost", "root", "", "mydb");

if($conn===false){
    die("ERROR: Could connect" . mysqli_connect_error());
}
$sql = "DELETE FROM tbluser WHERE custid='" . $_GET["cust"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: index.php");
die();
?>
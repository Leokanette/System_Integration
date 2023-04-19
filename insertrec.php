<?php



$conn = mysqli_connect("localhost", "root", "", "mydb");

if($conn===false){
    die("ERROR: Could connect" . mysqli_connect_error());
}
$firstname= $_REQUEST['firstname'];
$lastname= $_REQUEST['lastname'];
$email =$_REQUEST['email'];
$custid = $_REQUEST['custid'];
echo "Here comes the bride ". $firstname . " " . $lastname . " " . $email . " " . $custid  ;

$sql ="INSERT INTO tbluser VALUES ('$custid','$firstname','$lastname','$email')";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('Data has been added');</script>";
}else{
    echo "ERROR: ";
}
mysqli_close($conn);
header("Location: index.php");
die();
?>


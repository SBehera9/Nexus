<?php
$server = "sql200.byetcluster.com";
$username = "if0_36934606";
$password = "jLAo0otBGYqC1";
$dbname = "if0_36934606_nexus";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['name'];
    $Mobile = $_POST['mobile'];
    $Email = $_POST['email'];
    $Qualification = $_POST['qualification'];
    $Address = $_POST['address'];
    $City = $_POST['city'];
    $District = $_POST['district'];
    $State = $_POST['state'];
    $Training = $_POST['training'];

    $sql = "INSERT INTO `traning_form`(`name`, `mobile`, `email`, `qualification`, `address`, `city`, `district`, `state`, `training`) VALUES ('$Name','$Mobile','$Email','$Qualification','$Address','$City','$District','$State','$Training')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>
                alert('Form is submitted successfully');
                window.location.href = '3_Training.html'; // Replace 'nextpage.php' with your actual redirect URL
              </script>";
    } else {
        echo "Query failed: " . mysqli_error($con);
    }
}
?>
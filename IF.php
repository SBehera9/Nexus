<?php
$server = "sql200.byetcluster.com";
$username = "if0_36934606";
$password = "jLAo0otBGYqC1";
$dbname = "if0_36934606_nexus";

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['name'];
    $Mobile = $_POST['mobile'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $City = $_POST['city'];
    $District = $_POST['district'];
    $State = $_POST['state'];
    $Massage = $_POST['message']; // Corrected variable name to match table column

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO inquiry_form (Name, Mobile, Email, Address, City, District, State, Massage) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $Name, $Mobile, $Email, $Address, $City, $District, $State, $Massage);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                alert('Form is submitted successfully');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$con->close();
?>

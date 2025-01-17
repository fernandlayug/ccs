<?php
// Database connection
$host = 'localhost';
$user = 'ccsadmin';
$password = '12345678';
$database = 'ccs_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student ID from the request
$studentID = $_POST['studentID'];

// Check if the student exists in the database
$sql = "SELECT * FROM tblstudent WHERE student_id = '$studentID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If the student is found, return 'found'
    echo "found";
   
} else {
    // If the student is not found, return 'not found'
    echo "not found";
}



// Close connection
$conn->close();
?>

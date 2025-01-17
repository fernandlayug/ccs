


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Conditional Textbox Based on Database</title>
    
    <script>
        function checkStudent() {
    // Get the student ID from the input
    var studentID = document.getElementById("studentID").value;

    // Create an AJAX request to send to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "checkstudent.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Send the student ID to the server
    xhr.send("studentID=" + studentID);

    // Handle the response from the server
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            // If student is found, activate the textbox
            if (response == "found") {
                
                //not needed
                document.getElementById("firstnameInfo").disabled = false;
                document.getElementById("middlenameInfo").disabled = false;
                document.getElementById("lastnameInfo").disabled = false;
                document.getElementById("student_id").disabled = false;
                document.getElementById("courseInfo").disabled = false;
                document.getElementById("contactnumberInfo").disabled = false;
                document.getElementById("emailInfo").disabled = false;
                document.getElementById("passwordInfo").disabled = false;
    

                //form control
                document.getElementById("signup").style.display = "flex";
            } else {
                alert("Student not found!");

                //not needed
                document.getElementById("firstnameInfo").disabled = true;
                document.getElementById("middlenameInfo").disabled = true;
                document.getElementById("lastnameInfo").disabled = true;
                document.getElementById("student_id").disabled = true;
                document.getElementById("courseInfo").disabled = true;
                document.getElementById("contactnumberInfo").disabled = true;
                document.getElementById("emailInfo").disabled = true;
                document.getElementById("passwordInfo").disabled = true;
                document.getElementById("signup").disabled = true;

                //form control
                document.getElementById("signup").style.display = "none";
            }
        }
    };
}

    </script>

    <script>
        function autoFill() {
            const input1 = document.getElementById('studentID').value;
            document.getElementById('student_id').value = input1;
        }
    </script>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">




<div  class="container" id="check" >
    <div class="col-xl-6">
        <label class = "form-control-label" for="studentID">Enter Student ID: </label>  
        <input type="text" id="studentID" name="studentID " oninput="autoFill()">
        <br>
        <br>
        <button type="button" style="width: 100px; height: 50px;" class="btn btn-success" onclick="checkStudent()">Check ID</button>
</div>
   
</div>

<br><br><br><br>
<div class="container" id="signup"  style="display: none;">
    <form  action="register.php" method="POST">
        
            <label class = "form-control-label" for="id">ID:</label>
            <input class = "form-control"type="text" id="student_id" name="student_id" disabled readonly><br><br>
           
        


        <label class = "form-control-label" for="extraInfo">FirstName: </label>
        <input class = "form-control" type="text" id="firstnameInfo" name="firstnameInfo" disabled required>
            
        <label for="name">MiddleName:</label>
        <input class = "form-control" type="text" id="middlenameInfo" name="middlenameInfo" disabled required><br>

        <label for="name">LastName:</label>
        <input class = "form-control" type="text" id="lastnameInfo" name="lastnameInfo" disabled required><br>


        <label for="dropdown">Choose an option:</label>
        <select id="courseInfo" name="courseInfo" class="form-control mb-3" disabled required>
            <option value="">--Select an option--</option>
            <option value="BSIS">BSIS</option>
            <option value="BSAIS">BSAIS</option>
            <option value="BEED">BEED</option>
            <option value="BSET">BSET</option>
        </select>


        <label for="name">Contactnumber:</label>
        <input class = "form-control" type="number" id="contactnumberInfo" name="contactnumberInfo" disabled required><br>
        
        <label for="name">email:</label>
        <input class = "form-control" type="email" id="emailInfo" name="emailInfo" disabled required><br>


        <label for="name">password:</label>
        <input class = "form-control" type="password" id="passwordInfo" name="passwordInfo" disabled required><br>

        <div>
            <br>
        <button type="submit" value="Register" name = "reg"class="btn btn-primary" onclick="checkStudent()"> Register</button>
        </div>
        
    </form>
 </div>








<?php
// Database connection
$host = 'localhost';
$dbname = 'ccs_db';
$username = 'ccsadmin';
$password = '12345678';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        $student_id = $_POST['student_id'];
        $firstname = $_POST['firstnameInfo'];
        $middlename = $_POST['middlenameInfo'];
        $lastname = $_POST['lastnameInfo'];
        $course = $_POST['courseInfo'];
        $contactnumber = $_POST['contactnumberInfo'];
        $email = $_POST['emailInfo'];
        $password = $_POST['passwordInfo'];
       
       
        
        // Update query
        $sql = "UPDATE tblstudent SET firstname = :firstname, middlename = :middlename, lastname = :lastname, course = :course,
        contactnumber = :contactnumber, email = :email, password = :password WHERE student_id = :student_id";
        
        // Prepare the query
        $stmt = $conn->prepare($sql);
        
        // Bind the parameters
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':contactnumber', $contactnumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);


   
        
        // Execute the query
        $stmt->execute();
        
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Your account has been successfully registered!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
          </script>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>


</body>
</html>

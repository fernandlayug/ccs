<?php
session_start();
include('../db.php');



if(isset($_POST['submit']))
{
    $student_id = $_POST['student_id'];
    $firstname = $_POST['firstnameInfo'];
    $middlename = $_POST['middlenameInfo'];
    $lastname = $_POST['lastnameInfo'];
    $course = $_POST['courseInfo'];
    $contactnumber = $_POST['contactnumberInfo'];
    $email = $_POST['emailInfo'];
    $password = $_POST['passwordInfo'];
   
$sql=mysqli_query($conn,"Update tblstudent set firstname='$firstname', middlename='$middlename', lastname='$lastname', course='$course', contactnumber='$contactnumber', email='$email', password='$password' where student_id='$student_id'");
    if($sql)
    {
        header("location:index.php");

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/stud.js"></script>

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
             
    

                //form control
                document.getElementById("signup").style.display = "flex";
            } else {
                alert("Student not found!");

                //not needed
              

                //form control
                document.getElementById("signup").style.display = "none";
            }
        }
    };
}

    </script>


    <script>

function checkCode() {
    // Get the student ID from the input
    var accessCode = document.getElementById("accessCode").value;

    // Create an AJAX request to send to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "checkcode.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Send the student ID to the server
    xhr.send("accessCode=" + accessCode);

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
<body class="d-flex justify-content-center align-items-center">
<div  class="container" id="check" style="padding: 20px; max-width: 500px; margin: auto; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <!-- Add logo at the top -->
    <img src="../pic/srclogo.png" alt="Logo" style="width: 80px; height: auto; display: block; margin: 0 auto;">
    <center>
    <div class="col-xl-6">
        <label class = "form-control-label" for="studentID">Enter Student ID: </label>  
        <input type="text" id="studentID" name="studentID " oninput="autoFill()" class="form-control">
        <br>
        <button type="button" style="width: 100px; height: 50px;" class="btn btn-success" onclick="checkStudent()" onclick="fecthstudent()" >Check ID</button>
    </div>

    <div class="col-xl-6">
        <label class = "form-control-label" for="accessCode">Enter Access Code: </label>  
        <input type="text" id="accessCode" name="accessCode " oninput="autoFill()" class="form-control">
        <br>
        <button type="button" style="width: 100px; height: 50px;" class="btn btn-success" onclick="checkCode()">Check</button>
       
    </div>
    <br>
    <a type="button" class="btn btn-danger" href="../index.php">back</a>
    </center>
</div>




<br><br><br><br>
<div class="container" id="signup" style="display: none; width: 500px; padding: 20px; margin: 20px auto; border: 2px solid #f3f3f3; border-radius: 8px; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
    <form action="register.php" method="POST">
        <!-- Logo and ID at the top -->
        <div class="text-center mb-4" style="display: flex; align-items: center; justify-content: center;">
            <img src="../pic/srclogo.png" alt="Logo 1" style="width: 75px; height: auto; margin-right: 15px;">
            <div style="text-align: left;">
                <label for="student_id" class="form-label" style="font-size: 16px; font-weight: bold;">Student ID:</label>
                <input type="text" id="student_id" name="student_id" class="form-control" disabled style="width: 200px; margin-top: 5px;">
            </div>
            <img src="../pic/ccs-logo.png" alt="Logo 2" style="width: 75px; height: auto; margin-left: 15px;">
        </div>

        <!-- Personal Information -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="firstnameInfo">First Name:</label>
                <input class="form-control" type="text" id="firstnameInfo" name="firstnameInfo" disabled required>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="lastnameInfo">Last Name:</label>
                <input class="form-control" type="text" id="lastnameInfo" name="lastnameInfo" disabled required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="middlenameInfo">Middle Name:</label>
                <input class="form-control" type="text" id="middlenameInfo" name="middlenameInfo" disabled required>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="courseInfo">Course:</label>
                <select id="courseInfo" name="courseInfo" class="form-control" disabled required>
                    <option value="">--Select Course--</option>
                    <option value="BSIS">Bachelor of Science in Information Systems</option>
                    <option value="BSAIS">Bachelor of Science in Accounting Information Systems</option>
                    <option value="BEED">Bachelor of Elementary Education</option>
                    <option value="BSET">Bachelor of Science in Entrepreneurship</option>
                </select>
            </div>
        </div>

        <!-- Contact Details -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="contactnumberInfo">Contact Number:</label>
                <input class="form-control" type="number" id="contactnumberInfo" name="contactnumberInfo" disabled required>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="emailInfo">Email:</label>
                <input class="form-control" type="email" id="emailInfo" name="emailInfo" disabled required>
            </div>
        </div>

        <!-- Password -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label" for="passwordInfo">Password:</label>
                <input class="form-control" type="password" id="passwordInfo" name="passwordInfo" disabled required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" value="Register" name="submit" class="btn btn-primary w-100">Register</button>
        </div>
    </form>
</div>









</body>
</html>

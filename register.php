<?php
session_start();

include('db.php');



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
    $msg=" Updated Successfully";

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/register.css">
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
<body class="d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">




<div  class="container" id="check" >
    <div class="col-xl-6">
        <label class = "form-control-label" for="studentID">Enter Student ID: </label>  
        <input type="text" id="studentID" name="studentID " oninput="autoFill()">
        <br>
        <br>
        <button type="button" style="width: 100px; height: 50px;" class="btn btn-success" onclick="checkStudent()" onclick="fecthstudent()" >Check ID</button>
    </div>

    <div class="col-xl-6">
        <label class = "form-control-label" for="accessCode">Enter Access Code: </label>  
        <input type="text" id="accessCode" name="accessCode " oninput="autoFill()">
        <br>
        <br>
        <button type="button" style="width: 100px; height: 50px;" class="btn btn-success" onclick="checkCode()">Check</button>
    </div>
   
</div>




<br><br><br><br>
<div class="container" id="signup"  style="display: none;">
    <form  action="register.php" method="POST">
        

    <?php
    
    ?>





        <label class = "form-control-label" for="id">ID:</label>
        <input class = "form-control"type="text" id="student_id" name="student_id" disabled readonly><br><br>
           
        


        <label class = "form-control-label" for="extraInfo">FirstName: </label>
        <input class = "form-control" type="text" id="firstnameInfo" name="firstnameInfo" disabled required>

        
        <br>
            
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
        <button type="submit" value="Register" name = "submit"class="btn btn-primary"> Register</button>
        </div>
        
    </form>
 </div>









</body>
</html>

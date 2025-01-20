<?php
session_start();
error_reporting(0);
include('../db.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.active {
            left: -250px;
        }

        .sidebar .logo {
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar h2 {
            color: #ecf0f1;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            font-size: 18px;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover, 
        .sidebar ul li a.active {
            background-color: #34495e;
            border-radius: 5px;
        }

        /* Hamburger Menu */
        .menu-toggle {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 24px;
            color: #2c3e50;
            cursor: pointer;
            display: none;
        }

        .menu-toggle.active {
            color: #ecf0f1;
        }

        /* Content Styling */
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.active ~ .content {
            margin-left: 0;
        }

        /* Form Styling */
        .capstone-form {
            max-width: 800px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        .capstone-form label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .capstone-form input[type="text"],
        .capstone-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .capstone-form textarea {
            resize: vertical;
        }

        .capstone-form .btn-submit {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .capstone-form .btn-submit:hover {
            background-color: #34495e;
        }

        /* Enhanced Content Styling */
        .content {
            margin-left: 250px; /* Ensure spacing when sidebar is visible */
            padding: 30px; /* Add extra padding */
            background: linear-gradient(145deg, #ffffff, #e6e6e6); /* Soft gradient background */
            border-radius: 15px; /* Smooth, rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            font-family: 'Arial', sans-serif; /* Clean and professional font */
            transition: all 0.3s ease;
        }

        /* Welcome Message */
        .content h1 {
            font-size: 2.5rem; /* Larger font for headline */
            color: #2c3e50; /* Dark color for contrast */
            font-weight: 700; /* Bold text */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Subtle text shadow */
            margin-bottom: 15px;
        }

        /* Description Text */
        .content p {
            font-size: 1.25rem; /* Slightly larger font size */
            color: #7f8c8d; /* Softer text color for description */
            line-height: 1.8; /* Better readability */
            text-align: justify; /* Align text for a cleaner look */
        }

        /* Decorative Divider */
        .content hr {
            border: none;
            border-top: 2px solid #bdc3c7; /* Neutral-colored divider */
            margin: 20px 0; /* Add spacing */
        }

        /* Highlight Box (Optional Section) */
        .content .highlight-box {
            background-color: #ecf0f1; /* Subtle contrast background */
            padding: 20px;
            border-left: 5px solid #2c3e50; /* Accent border */
            margin-top: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1); /* Inner shadow */
        }

        .content .highlight-box h2 {
            color: #2c3e50; /* Accent text color */
            margin-bottom: 10px;
        }

        .content .highlight-box p {
            font-size: 1.1rem;
            color: #34495e; /* Complementary text color */
        }

        /* Capstone List Styling */
        .capstone-list {
            margin-top: 20px;
        }

        .capstone-item {
            background-color: #ecf0f1; /* Light background */
            padding: 15px;
            margin-bottom: 15px;
            border-left: 5px solid #2c3e50; /* Accent border */
            border-radius: 8px; /* Smooth corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .capstone-item h3 {
            font-size: 1.5rem;
            color: #2c3e50; /* Dark color for title */
            margin-bottom: 10px;
        }

        .capstone-item p {
            font-size: 1rem;
            color: #34495e; /* Complementary text color */
            margin-bottom: 10px;
            line-height: 1.5; /* Better readability */
        }

        .capstone-item small {
            color: #7f8c8d; /* Subtle text for date and time */
        }

        .search-bar {
            width: 100%; /* Full width */
            max-width: 600px; /* Optional max width to control the size */
            margin: 0 auto; /* Center it */
            padding: 10px; /* Space around the form */
            background-color: #fff; /* White background */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        .search-bar input {
            font-size: 16px; /* Slightly larger text */
            border-radius: 5px; /* Rounded corners */
        }

        .search-bar button {
            border-radius: 5px; /* Rounded button */
            padding: 0.5rem 1.25rem; /* Add some padding for a comfortable size */
        }

        .search-bar button i {
            margin-right: 5px; /* Space between the icon and the text */
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .sidebar {
                width: 250px;
                left: -250px;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
<!-- Sidebar and Content Section -->
<div class="menu-toggle" id="menu-toggle">
    <i class="fas fa-bars"></i>
</div>

<div class="sidebar" id="sidebar">
    <center><img src="pic/Ccs.png" class="logo" alt="Logo" width="140px" height="100px"></center>
    <h2>CCS</h2>
    <ul>
        <li><a href="dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="addcapstone.php"><i class="fas fa-book"></i> Capstone Study</a></li>
        <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
        <br><br><br><br><br>
        <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>

<div class="content">
    <h1>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h1>
    <p>This is the Dashboard page where you can view your information and access other sections of the system. Enjoy an enhanced experience with our clean and professional design.</p>

    <hr>

    <div class="search-bar mb-4">
        <form method="GET" action="dashboard.php" class="d-flex align-items-center">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by Title" 
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                aria-label="Search">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Search
            </button>
        </form>
    </div>

    <h2>Submitted Capstone Projects</h2>
    <div class="capstone-list">
        <?php
        // Replace with your database connection code
        $conn = new mysqli("localhost", "root", "123456", "user_auth_system");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if search query is provided
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

        // Modify SQL query to filter by title if search term is provided
        $sql = "SELECT title, abstract AS description, submit_date AS submitted_at FROM tbl_capstone";
        if ($searchTerm) {
            $sql .= " WHERE title LIKE ?";
        }
        $sql .= " ORDER BY submit_date DESC";

        // Prepare and execute query
        $stmt = $conn->prepare($sql);
        if ($searchTerm) {
            $searchTerm = "%" . $searchTerm . "%"; // Add wildcard characters for LIKE search
            $stmt->bind_param("s", $searchTerm); // Bind the search term to the query
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="capstone-item">';
                echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                echo '<small>Student submitted: ' . (isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Unknown User') . '</small>';
                echo '<br>';
                echo '<small>Submitted on: ' . htmlspecialchars($row['submitted_at']) . '</small>';
                echo '</div><hr>';
            }
        } else {
            echo '<p>No capstone projects found matching your search.</p>';
        }

        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
</script>

</body>
</html>
<?php } ?>
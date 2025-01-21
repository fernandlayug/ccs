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
    <link rel="stylesheet" href="../static/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
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
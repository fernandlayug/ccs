<?php
include 'db.php';

try {
    // Fetch images from the database
    $result = $conn->query("SELECT * FROM tbl_capstone LIMIT 4");

    // Check if query was successful
    if (!$result) {
        throw new Exception("Error fetching images: " . $conn->error);
    }

    // Check if any images exist
    $images_exist = ($result->num_rows > 0);
} catch (Exception $e) {
    $error_message = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College of Computer Studies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #343a40;
        }
        .navbar .nav-link {
            color: #fff;
        }
        .navbar .nav-link.active {
            font-weight: bold;
            color: #ffc107;
        }
        .banner {
            background: linear-gradient(45deg, #6c757d, #343a40);
            color: #fff;
            padding: 3rem;
            border-radius: 0.5rem;
        }
        .grid-item {
            cursor: pointer;
            padding: 2rem;
            color: #fff;
            border-radius: 0.5rem;
            transition: transform 0.3s, background-color 0.3s;
        }
        .grid-item:hover {
            transform: scale(1.1);
            background-color: #ffc107;
        }
        .ssite {
            background-color: #007bff;
        }
        .dns {
            background-color: #28a745;
        }
        .class-offers {
            background-color: #17a2b8;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        .grid-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

    <!-- Navigator Section -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">CCS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Banner Section -->
<div class="container mt-4">
    <div class="banner text-center">
        <h1 class="display-4">Welcome to CCS</h1>
        <p class="lead">Your gateway to streamlined solutions</p>
    </div>
</div>

    <!-- Content Sections -->
    <div class="container">
        <!-- First Row -->
        <div class="row text-center mt-5 mb-4">
            <div class="col-md-4">
                <div class="grid-item ssite" onclick="window.location.href='ssite.html'">
                    <div class="grid-icon">📘</div>
                    <h4>SSITE</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid-item dns" onclick="window.location.href='dns.html'">
                    <div class="grid-icon">🌐</div>
                    <h4>DNS</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid-item class-offers" onclick="window.location.href='class-offers.html'">
                    <div class="grid-icon">📚</div>
                    <h4>Class Offers</h4>
                </div>
            </div>
        </div>



<!-- Grid Section 1 -->
<div class="row mb-3">

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($error_message) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($images_exist) && !$images_exist): ?>
        <div class="alert alert-info" role="alert">
            No images uploaded yet. Be the first to upload an image!
        </div>
    <?php endif; ?>

    <?php if (isset($images_exist) && $images_exist): ?>
        <?php while ($row = $result->fetch_assoc()): ?>

            <div class="col-md-3 mb-3">
                <div class="p-3 border grid-item" onclick="">
                    <img src="<?php echo $row['poster_path']; ?>" alt="Uploaded Image" class="img-fluid">
                    <!-- <h6 class="mt-2">Record Management</h6> -->
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</div> 

<div class="text-end mb-4">
            <a href="seemore1.php" class="btn btn-primary">See More...</a>
</div>

  <!-- Grid Section 2 -->
  <div class="row mb-3">
            <div class="col-md-3">
                <div class="p-3 border grid-item" onclick="window.location.href='item5.html'">
                    <img src="https://via.placeholder.com/150" alt="Item 5" class="img-fluid">
                    <h6 class="mt-2">Item 5</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border grid-item" onclick="window.location.href='item6.html'">
                    <img src="https://via.placeholder.com/150" alt="Item 6" class="img-fluid">
                    <h6 class="mt-2">Item 6</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border grid-item" onclick="window.location.href='item7.html'">
                    <img src="https://via.placeholder.com/150" alt="Item 7" class="img-fluid">
                    <h6 class="mt-2">Item 7</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border grid-item" onclick="window.location.href='item8.html'">
                    <img src="https://via.placeholder.com/150" alt="Item 8" class="img-fluid">
                    <h6 class="mt-2">Item 8</h6>
                </div>
            </div>
        </div>
        <div class="text-end">
            <a href="#" class="btn btn-primary">See More...</a>
        </div>
    </div>

    
<!-- Footer Section -->
<footer>
    <div class="container">
        <p>&copy; 2024 College of Computer Studies. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

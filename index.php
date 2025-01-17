<?php
include 'db.php';

try {
    // Prepare and execute query to fetch images
    $stmt = $conn->prepare("SELECT * FROM tbl_capstone LIMIT 4");
    $stmt->execute();

    // Check if any images exist
    $images_exist = ($stmt->rowCount() > 0);
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
         /* Fullscreen Image Modal */
         .fullscreen-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.9);
        }
        
        .fullscreen-modal img {
            margin: auto;
            display: block;
            width: 70%;
            max-width: 450px;
        }
        
        .fullscreen-modal .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .fullscreen-modal .close:hover,
        .fullscreen-modal .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .carousel {
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .carousel-inner {
            background: linear-gradient(45deg, #6c757d, #343a40);
            color: #fff;
        }

        .carousel-item {
            text-align: center;
            padding: 3rem 2rem;
        }

        .carousel-item h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffc107;
        }

        .carousel-item p {
            font-size: 1.2rem;
            margin-top: 1rem;
            color: #f8f9fa;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(100%);
        }

        .carousel-control-prev,
        .carousel-control-next {
            color: #fff;
            opacity: 0.8;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
        }

        .carousel-indicators [data-bs-target] {
            background-color: #ffc107;
            border: 1px solid #fff;
        }

        .carousel-indicators .active {
            background-color: #fff;
        }

    </style>
</head>
<body>

<!-- Navigator Section -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
            <img src="pic/Ccs.png" alt="CCS Logo" style="width: 70px; height: auto;"> College of Computer Studies
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="login.php">Student</a></li>
                    <li><a class="dropdown-item" href="login_admin.php">Admin</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Register
                </a>
                <ul class="dropdown-menu" aria-labelledby="registerDropdown">
                    <li><a class="dropdown-item" href="register.php">Student</a></li>
                    <li><a class="dropdown-item" href="register_admin.php">Admin</a></li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>

<h1>Sir Joshua</h1>

<!-- Banner Section -->
<div id="bannerCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="banner text-center">
                <h1 class="display-4">Welcome to CCS</h1>
                <p class="lead">Your gateway to streamlined solutions</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="banner text-center">
                <h1 class="display-4">Innovate with Us</h1>
                <p class="lead">Explore endless possibilities in technology</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="banner text-center">
                <h1 class="display-4">Join the Community</h1>
                <p class="lead">Empowering the next generation of tech leaders</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
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
                <h4>DiNs Circle</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="grid-item class-offers" onclick="window.location.href='class-offers.html'">
                <div class="grid-icon">📚</div>
                <h4>Class Officers</h4>
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

        <?php if ($images_exist): ?>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="col-md-3 mb-3">
                    <div class="p-3 border grid-item">
                        <img src="<?= htmlspecialchars($row['poster_path']) ?>" alt="Uploaded Image" class="img-fluid">
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                No images uploaded yet. Be the first to upload an image!
            </div>
        <?php endif; ?>
    </div> 

    <div class="text-end mb-4">
        <a href="seemore1.php" class="btn btn-primary">See More...</a>
    </div>

    
    
    <!-- Grid Section 2 -->
    <div class="row mb-3">
        <!-- Placeholder Items -->
        <?php for ($i = 5; $i <= 8; $i++): ?>
            <div class="col-md-3">
                <div class="p-3 border grid-item" onclick="window.location.href='item<?= $i ?>.html'">
                    <img src="https://via.placeholder.com/150" alt="Item <?= $i ?>" class="img-fluid">
                    <h6 class="mt-2">jj<?= $i ?></h6>
                </div>
            </div>
        <?php endfor; ?>
      
    </div>

  

    <div class="text-end">

        <a href="#" class="btn btn-primary">See More...</a>
    </div>

</div>




    <div id="fullscreenModal" class="fullscreen-modal">
        <span class="close" onclick="closeFullscreen()">&times;</span>
        <img id="fullscreenImage" src="">
    </di>

<!-- Footer Section -->
<footer>
    <div class="container">
        <p>&copy; 2024 College of Computer Studies. All Rights Reserved.</p>
    </div>
</footer>

    <script>
        function openFullscreen(src) {
            const modal = document.getElementById('fullscreenModal');
            const modalImage = document.getElementById('fullscreenImage');
            modal.style.display = 'block';
            modalImage.src = src;
        }

        function closeFullscreen() {
            document.getElementById('fullscreenModal').style.display = 'none';
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
  
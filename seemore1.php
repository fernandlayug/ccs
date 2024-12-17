<?php
include 'db.php';

try {

    $result = $conn->query("SELECT * FROM tbl_capstone");


    if (!$result) {
        throw new Exception("Error fetching images: " . $conn->error);
    }

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
    <title>All Images - College of Computer Studies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .grid-item img {
            max-width: 100%;
            border-radius: 5px;
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
                        <a class="nav-link active" href="index.php">Home</a>
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

    <!-- Grid Section -->
    <div class="container mt-5">
        <h1 class="mb-4 text-center">All Images</h1>
        
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
                        <div class="p-3 border grid-item">
                            <img src="<?php echo $row['poster_path']; ?>" alt="Uploaded Image" class="img-fluid">
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

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

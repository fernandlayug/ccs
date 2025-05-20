<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College of Computer Studies | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2d497a;
            --secondary-color: #ffc107;
            --accent-color: #4e73df;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand img {
            margin-right: 10px;
            height: 40px;
        }
        
        .navbar .nav-link {
            color: #fff;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .navbar .nav-link:hover,
        .navbar .nav-link:focus {
            color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .navbar .nav-link.active {
            color: var(--secondary-color);
            font-weight: 600;
            border-bottom: 2px solid var(--secondary-color);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1350&q=80') center/cover;
            opacity: 0.1;
            z-index: 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero-title {
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 700px;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: var(--dark-color);
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .section-title {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .feature-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
        }
        
        .feature-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 2rem 0;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            aspect-ratio: 16/9;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }
        
        .fullscreen-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }
        
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 1200px;
            animation: zoom 0.3s;
        }
        
        @keyframes zoom {
            from {transform: scale(0.9); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }
        
        .close-modal {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .close-modal:hover,
        .close-modal:focus {
            color: var(--secondary-color);
            text-decoration: none;
            cursor: pointer;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-logo {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        
        .footer-links h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .footer-links h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        .footer-links ul {
            list-style: none;
            padding-left: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--secondary-color);
            padding-left: 5px;
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: var(--secondary-color);
            color: var(--dark-color);
            transform: translateY(-3px);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="pic/ccs-logo.png" alt="CCS Logo"> College of Computer Studies
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registerandlogin.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-primary ms-2" href="registerandlogin.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="hero-title">Shaping the Future of Technology</h1>
                <p class="hero-subtitle">The College of Computer Studies provides cutting-edge education in computer science, information technology, and related fields, preparing students for successful careers in the digital age.</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title mb-5">Why Choose CCS?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="feature-title">Industry-Relevant Curriculum</h3>
                    <p>Our programs are designed in collaboration with industry leaders to ensure you learn the most in-demand skills.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3 class="feature-title">Expert Faculty</h3>
                    <p>Learn from experienced professors and industry professionals who are passionate about your success.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="feature-title">Career Opportunities</h3>
                    <p>Benefit from our strong industry connections and dedicated career services to launch your tech career.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">Campus Life</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://scontent.fmnl40-2.fna.fbcdn.net/v/t39.30808-6/481084748_651852873901305_5128868441286385821_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=zGmr3Hb7sicQ7kNvwF2OvQt&_nc_oc=AdnXIvZprJRR_YWjrhmv8vvpCGsV5dLpOXOf4uGk7Joi8acKqaqapEc7NFSIvRwAlJQ&_nc_zt=23&_nc_ht=scontent.fmnl40-2.fna&_nc_gid=mvpjqBICxC-AMNGjHSe2KA&oh=00_AfJGeydN4QSMIPUuMJJezhuohcCwpRww5ehlIlmcKPlAHA&oe=68306E74" alt="Students in computer lab">
                <div class="gallery-caption">State-of-the-art computer labs</div>
            </div>
            <div class="gallery-item">
                <img src="https://scontent.fmnl40-2.fna.fbcdn.net/v/t39.30808-6/494099482_694225912997334_4438594123007260395_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=f727a1&_nc_ohc=61xCT_Jdu-gQ7kNvwE27NnX&_nc_oc=Adl3Fsqd0CAYZcEMRyFi7oCbNbnK5-CbdSpdN_oBg4UbaVDKHzv90qjrxQdvIj_oo2g&_nc_zt=23&_nc_ht=scontent.fmnl40-2.fna&_nc_gid=GhXngMpqyvsu7FYMrsd-Jw&oh=00_AfK8JJ_7sF7bx7xf-5oYUzSGbuUfmQnnI1_c-5uYe_XoxA&oe=6830603C" alt="Students collaborating">
                <div class="gallery-caption">Collaborative learning environment</div>
            </div>
            <div class="gallery-item">
                <img src="https://scontent.fmnl40-1.fna.fbcdn.net/v/t39.30808-6/494179879_694226049663987_4709947889646437167_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=f727a1&_nc_ohc=6bTaU8C3EMEQ7kNvwElhO3H&_nc_oc=AdlUQfNW-EQfK2BGRjcCwnr4AGOEduV3iQLV_X7eC5X1_Vel_AZF6It9i1dfFPSjpKI&_nc_zt=23&_nc_ht=scontent.fmnl40-1.fna&_nc_gid=5j0F6ar7vyWMI057JY3c3Q&oh=00_AfIAj_MLwazbnUwIZwAGcbeFwGBBL5eztmLQK9wJIjFmMA&oe=68307737" alt="Coding workshop">
                <div class="gallery-caption">Hands-on coding workshops</div>
            </div>
            <div class="gallery-item">
                <img src="https://scontent.fmnl40-1.fna.fbcdn.net/v/t39.30808-6/494149896_694225259664066_4568550505628919741_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=f727a1&_nc_ohc=cnNRi4lxfIQQ7kNvwGm-3P5&_nc_oc=AdndIHMdEDQsAJ9DIR18hFcP31ALFMYflKytTYr-tZqPWK8aQ4GlVt731IwIrY_ClW8&_nc_zt=23&_nc_ht=scontent.fmnl40-1.fna&_nc_gid=XwPzGTD2nkITNHv14nZJlA&oh=00_AfK8aHZLfe5lt8WswJJP2cJm-3oAt4dGTkSuxDzd1nYkYA&oe=68306CA1" alt="Hackathon event">
                <div class="gallery-caption">Annual hackathon events</div>
            </div>
            <div class="gallery-item">
                <img src="https://scontent.fmnl40-1.fna.fbcdn.net/v/t39.30808-6/494142393_694225859664006_7110495985554218705_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=f727a1&_nc_ohc=i3cSTtN9XqEQ7kNvwG8R3_p&_nc_oc=Adnn64nJxipCEmwvkSR2vxvDku4EkHqK846e3ZmhrUT-ucvrar3k6lLAPQfTcXN2GNM&_nc_zt=23&_nc_ht=scontent.fmnl40-1.fna&_nc_gid=QnH7kL-ReAksLQmLy-XUFA&oh=00_AfJT_1473Hi1TACWGJEV8iLCfjOE7Yo5OrSbiGwnq6MNBQ&oe=683061D4" alt="Industry visit">
                <div class="gallery-caption">Industry visits and networking</div>
            </div>
            <div class="gallery-item">
                <img src="https://scontent.fmnl40-2.fna.fbcdn.net/v/t39.30808-6/494583703_694223272997598_1768046266358623797_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=f727a1&_nc_ohc=ehc_9_JrYHcQ7kNvwH-0OAX&_nc_oc=Adl3vufPTMAOo-3oRPnmOjutLI4k5YJrghNAt41KxrCzkw__B9eogygkreIaEfYbucU&_nc_zt=23&_nc_ht=scontent.fmnl40-2.fna&_nc_gid=mTr-9K1yLtMPS3pLl8tzvA&oh=00_AfIGMbYmnAAd7CtlRMhHHBYpoopigQmU1rpq1H1yicSTsg&oe=683081C4" alt="Graduation ceremony">
                <div class="gallery-caption">Successful graduates</div>
            </div>
        </div>
    </div>
</section>


<!-- Fullscreen Image Modal -->
<div class="fullscreen-modal" id="imageModal">
    <span class="close-modal" id="closeModal">&times;</span>
    <img class="modal-content" id="modalImage" src="">
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <span class="footer-logo">College of Computer Studies</span>
                <p>Empowering the next generation of technology leaders through innovative education and research.</p>
            </div>
        </div>
        <div class="copyright">
            <p class="mb-0">&copy; 2024 College of Computer Studies. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Image Modal Script
    document.addEventListener('DOMContentLoaded', function() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeModal = document.getElementById('closeModal');

        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const imgSrc = this.querySelector('img').src;
                const imgAlt = this.querySelector('img').alt;
                modalImage.src = imgSrc;
                modalImage.alt = imgAlt;
                modal.style.display = 'block';
            });
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
</script>

</body>
</html>
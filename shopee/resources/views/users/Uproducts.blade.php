<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - Premium Solutions</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-gradient: linear-gradient(135deg, #ff6b9d, #ff8a80);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--primary-gradient);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decorative elements */
        body::before {
            content: '';
            position: fixed;
            top: 10%;
            left: -5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: 10%;
            right: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Custom navbar styling */
        .navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 10px;
            border-radius: 10px;
            padding: 8px 16px !important;
        }

        .navbar-nav .nav-link:hover {
            background: var(--glass-bg);
            transform: translateY(-2px);
            color: white !important;
        }

        .btn-custom {
            background: var(--accent-gradient);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 15px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 157, 0.4);
            color: white;
        }

        /* Hero section */
        .hero-section {
            position: relative;
            z-index: 2;
            padding: 80px 0 60px;
            text-align: center;
            color: white;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #ffffff, #ff6b9d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Filter section */
        .filter-section {
            position: relative;
            z-index: 2;
            margin-bottom: 50px;
        }

        .filter-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 30px;
            color: white;
        }

        .filter-btn {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: white;
            border-radius: 15px;
            padding: 10px 20px;
            margin: 5px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--accent-gradient);
            border-color: transparent;
            transform: translateY(-2px);
            color: white;
        }

        /* Products section */
        .products-section {
            position: relative;
            z-index: 2;
            padding-bottom: 80px;
        }

        /* Custom card styling */
        .product-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            color: white;
        }

        .product-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .product-image {
            height: 200px;
            background: var(--accent-gradient);
            position: relative;
            overflow: hidden;
        }

        .product-image::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .product-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: white;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .price-tag {
            background: var(--accent-gradient);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }

        .rating {
            color: #ffd700;
            margin-bottom: 15px;
        }

        .btn-product {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: white;
            border-radius: 12px;
            padding: 12px 24px;
            transition: all 0.3s ease;
            width: 100%;
            font-weight: 600;
        }

        .btn-product:hover {
            background: var(--accent-gradient);
            border-color: transparent;
            transform: translateY(-2px);
            color: white;
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            backdrop-filter: blur(10px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .product-image {
                height: 150px;
            }
            
            .filter-section {
                margin-bottom: 30px;
            }
            
            .filter-card {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .col-6 .product-card {
                margin-bottom: 20px;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .product-image {
                height: 120px;
            }
            
            .product-icon {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">YourPlatform</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                @auth
                    <button class="btn btn-custom">
                    <i class="bi bi-person-circle"></i> Account
                    </button>
                
                @else
                    <button class="btn btn-custom">
                    <i class="bi bi-person-circle"></i> Login
                    </button>
                
                @endauth
                
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Our Premium Products</h1>
            <p class="hero-subtitle">Discover our cutting-edge solutions designed to transform your business and elevate your success to new heights.</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-card">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <h5 class="mb-3 mb-md-0">Filter by Category:</h5>
                    </div>
                    <div class="col-md-9">
                        <button class="btn filter-btn active" data-filter="all">All Products</button>
                        <button class="btn filter-btn" data-filter="software">Software</button>
                        <button class="btn filter-btn" data-filter="hardware">Hardware</button>
                        <button class="btn filter-btn" data-filter="services">Services</button>
                        <button class="btn filter-btn" data-filter="analytics">Analytics</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="row g-4" id="productsContainer">
                <!-- Product 1 -->
                <div class="col-xl-4 col-lg-6 col-sm-6" data-category="software">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="bi bi-laptop product-icon"></i>
                            <span class="category-badge">Software</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Cloud Management Suite</h5>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="text-muted ms-1">(4.5)</span>
                            </div>
                            <p class="card-text">Comprehensive cloud infrastructure management with advanced monitoring, scaling, and security features.</p>
                            <div class="price-tag">$99/month</div>
                            <button class="btn btn-product">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-xl-4 col-lg-6 col-sm-6" data-category="hardware">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="bi bi-cpu product-icon"></i>
                            <span class="category-badge">Hardware</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">AI Processing Unit</h5>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="text-muted ms-1">(5.0)</span>
                            </div>
                            <p class="card-text">Next-generation AI processing unit with unprecedented performance for machine learning workloads.</p>
                            <div class="price-tag">$2,499</div>
                            <button class="btn btn-product">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-xl-4 col-lg-6 col-sm-6" data-category="analytics">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="bi bi-graph-up product-icon"></i>
                            <span class="category-badge">Analytics</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Business Intelligence Pro</h5>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span class="text-muted ms-1">(4.2)</span>
                            </div>
                            <p class="card-text">Advanced analytics platform with real-time insights, predictive modeling, and interactive dashboards.</p>
                            <div class="price-tag">$149/month</div>
                            <button class="btn btn-product">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-xl-4 col-lg-6 col-sm-6" data-category="services">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="bi bi-shield-check product-icon"></i>
                            <span class="category-badge">Services</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Security Consultation</h5>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="text-muted ms-1">(4.7)</span>
                            </div>
                            <p class="card-text">Expert cybersecurity consultation to protect your business from evolving digital threats and vulnerabilities.</p>
                            <div class="price-tag">$299/hour</div>
                            <button class="btn btn-product">
                                <i class="bi bi-calendar-check me-2"></i>Book Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="col-xl-4 col-lg-6 col-sm-6" data-category="software">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="bi bi-phone product-icon"></i>
                            <span class="category-badge">Software</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mobile App Builder</h5>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span class="text-muted ms-1">(4.3)</span>
                            </div>
                            <p class="card-text">Drag-and-drop mobile app development platform with cross-platform deployment and native performance.</p>
                            <div class="price-tag">$79/month</div>
                            <button class="btn btn-product">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="col-xl-4 col-lg-6 col-sm-6" data-category="hardware">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="bi bi-server product-icon"></i>
                            <span class="category-badge">Hardware</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Enterprise Server Rack</h5>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="text-muted ms-1">(4.6)</span>
                            </div>
                            <p class="card-text">High-performance server rack solution with redundant power supply, advanced cooling, and modular design.</p>
                            <div class="price-tag">$4,999</div>
                            <button class="btn btn-product">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const productCards = document.querySelectorAll('[data-category]');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    
                    // Filter products
                    productCards.forEach(card => {
                        const cardColumn = card.closest('.col-xl-4, .col-lg-6, .col-sm-6');
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            cardColumn.style.display = 'block';
                            cardColumn.style.animation = 'fadeIn 0.5s ease-in';
                        } else {
                            cardColumn.style.display = 'none';
                        }
                    });
                });
            });
            
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.btn-product');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productName = this.closest('.card').querySelector('.card-title').textContent;
                    
                    // Simulate add to cart
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="bi bi-check-circle me-2"></i>Added!';
                    this.classList.add('btn-success');
                    
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.classList.remove('btn-success');
                    }, 2000);
                    
                    console.log(`Added "${productName}" to cart`);
                });
            });
        });
        
        // Add CSS animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
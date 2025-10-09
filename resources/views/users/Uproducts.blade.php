<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PenCart: Premium Solutions</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* ----------------------------------------------------------------- */
        /* Global & Variable Setup */
        /* ----------------------------------------------------------------- */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-gradient: linear-gradient(135deg, #ff6b9d, #ff8a80);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        /* 1. Reset Body: Remove background/color to prevent leakage and let the wrapper handle it */
        body {
            font-family: 'Inter', sans-serif;
            /* Important: Remove custom background/color from body tag */
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* 2. Page Wrapper (New ID for high specificity) */
        #page-wrapper {
            background: var(--primary-gradient); /* Applied here now */
            min-height: 100vh;
            color: white; /* Applied here now */
        }
        
        /* Background animation for visual appeal */
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 107, 157, 0.5);
            border-radius: 50%;
            animation: move-bubble 15s infinite alternate;
            z-index: 0;
            filter: blur(80px);
        }

        @keyframes move-bubble {
            0% { transform: translate(0, 0); }
            50% { transform: translate(200px, 100px); }
            100% { transform: translate(0, 0); }
        }

        /* ----------------------------------------------------------------- */
        /* Note: Custom Navbar CSS was removed from here. */
        /* If the included navbar needs external CSS, it must be in its own file/include. */
        /* ----------------------------------------------------------------- */

        /* ----------------------------------------------------------------- */
        /* Hero Section */
        /* ----------------------------------------------------------------- */
        .hero-section {
            position: relative;
            padding: 80px 0 60px;
            text-align: center;
            z-index: 5;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
        }

        /* ----------------------------------------------------------------- */
        /* Filter Section */
        /* ----------------------------------------------------------------- */
        .filter-section {
            padding-bottom: 40px;
            z-index: 5;
            position: relative;
        }

        .filter-card {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            padding: 20px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            /* Important: Ensure text inside filter card is white */
            color: white; 
        }
        
        .filter-btn {
            background: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 8px 18px;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: var(--accent-gradient);
            border-color: transparent;
            box-shadow: 0 4px 10px rgba(255, 107, 157, 0.5);
            color: white;
        }

        /* ----------------------------------------------------------------- */
        /* Products Section & Card Styling (Redesigned) */
        /* ----------------------------------------------------------------- */
        .products-section {
            position: relative;
            z-index: 2;
            padding-bottom: 80px;
        }

        .product-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            height: 100%;
            color: rgb(84, 146, 25);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3); 
        }

        .product-image {
            height: 180px; 
            background: var(--accent-gradient); 
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .product-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4.5rem; 
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: white;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        .price-tag {
            background: var(--accent-gradient);
            color: white;
            padding: 6px 14px;
            border-radius: 50px; 
            font-weight: 700;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(255, 107, 157, 0.4);
            font-size: 1.1rem;
        }

        .rating {
            color: #ffd700;
            font-size: 1.1rem; 
        }
        
        .btn-product {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: white;
            border-radius: 12px;
            padding: 10px 20px;
            transition: all 0.3s ease;
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-product:hover {
            background: var(--accent-gradient);
            border-color: transparent;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 5px 15px rgba(255, 107, 157, 0.5);
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 5px 12px;
            border-radius: 50px; 
            font-size: 0.85rem;
            backdrop-filter: blur(10px);
            font-weight: 600;
        }
    </style>
</head>
<body>
    
    <div id="page-wrapper">

        @include('layouts.navbar')

        <section class="hero-section">
            <div class="container">
                <h1 class="hero-title">Our Premium Products</h1>
                <p class="hero-subtitle">Discover our cutting-edge solutions designed to transform your business and elevate your success to new heights.</p>
            </div>
        </section>

        <section class="filter-section">
            <div class="container">
                <div class="filter-card">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <h5 class="mb-3 mb-md-0 text-white fw-bold">Filter by Category:</h5>
                        </div>
                        <div class="col-md-9 text-md-start text-center">
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

        <section class="products-section">
            <div class="container">
                <div class="row g-4" id="productsContainer">
                    
                    <div class="col-xl-4 col-lg-6 col-sm-6" data-category="software">
                        <div class="card product-card">
                            <div class="product-image">
                                <i class="bi bi-laptop product-icon"></i>
                                <span class="category-badge">Software</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Cloud Management Suite</h5> 
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span class="text-white-50 ms-1 small">(4.5)</span>
                                    </div>
                                    <span class="price-tag">$99/month</span> 
                                </div>

                                <p class="card-text">Comprehensive cloud infrastructure management with advanced monitoring, scaling, and security features.</p>
                                
                                <button class="btn btn-product mt-auto"> 
                                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-6" data-category="hardware">
                        <div class="card product-card">
                            <div class="product-image">
                                <i class="bi bi-cpu product-icon"></i>
                                <span class="category-badge">Hardware</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">AI Processing Unit</h5>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span class="text-white-50 ms-1 small">(5.0)</span>
                                    </div>
                                    <span class="price-tag">$2,499</span>
                                </div>
                                
                                <p class="card-text">Next-generation AI processing unit with unprecedented performance for machine learning workloads.</p>
                                
                                <button class="btn btn-product mt-auto">
                                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-6" data-category="analytics">
                        <div class="card product-card">
                            <div class="product-image">
                                <i class="bi bi-graph-up product-icon"></i>
                                <span class="category-badge">Analytics</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Business Intelligence Pro</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="text-white-50 ms-1 small">(4.2)</span>
                                    </div>
                                    <span class="price-tag">$149/month</span>
                                </div>
                                <p class="card-text">Advanced analytics platform with real-time insights, predictive modeling, and interactive dashboards.</p>
                                <button class="btn btn-product mt-auto">
                                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-sm-6" data-category="services">
                        <div class="card product-card">
                            <div class="product-image">
                                <i class="bi bi-shield-check product-icon"></i>
                                <span class="category-badge">Services</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Security Consultation</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span class="text-white-50 ms-1 small">(4.7)</span>
                                    </div>
                                    <span class="price-tag">$299/hour</span>
                                </div>
                                <p class="card-text">Expert cybersecurity consultation to protect your business from evolving digital threats and vulnerabilities.</p>
                                <button class="btn btn-product mt-auto">
                                    <i class="bi bi-calendar-check me-2"></i>Book Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-6" data-category="software">
                        <div class="card product-card">
                            <div class="product-image">
                                <i class="bi bi-phone product-icon"></i>
                                <span class="category-badge">Software</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Mobile App Builder</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="text-white-50 ms-1 small">(4.3)</span>
                                    </div>
                                    <span class="price-tag">$79/month</span>
                                </div>
                                <p class="card-text">Drag-and-drop mobile app development platform with cross-platform deployment and native performance.</p>
                                <button class="btn btn-product mt-auto">
                                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-6" data-category="hardware">
                        <div class="card product-card">
                            <div class="product-image">
                                <i class="bi bi-server product-icon"></i>
                                <span class="category-badge">Hardware</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Enterprise Server Rack</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span class="text-white-50 ms-1 small">(4.6)</span>
                                    </div>
                                    <span class="price-tag">$4,999</span>
                                </div>
                                <p class="card-text">High-performance server rack solution with redundant power supply, advanced cooling, and modular design.</p>
                                <button class="btn btn-product mt-auto">
                                    <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const productsContainer = document.getElementById('productsContainer');
            const productCards = productsContainer.querySelectorAll('.col-xl-4');

            // Function to handle filtering
            const filterProducts = (filter) => {
                productCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    if (filter === 'all' || category === filter) {
                        card.style.display = 'block';
                        // Using a simple delay or CSS visibility for filtering, since 
                        // the original classes 'animate-fade-in/out' were not defined.
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            // Add click listeners to filter buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove 'active' class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add 'active' class to the clicked button
                    button.classList.add('active');
                    
                    const filter = button.getAttribute('data-filter');
                    filterProducts(filter);
                });
            });

            // Initial load filter 
            filterProducts('all');
        });
    </script>
</body>
</html>
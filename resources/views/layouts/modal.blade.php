<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PenCart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-gradient: linear-gradient(135deg, #ff6b9d, #ff8a80);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        #page-wrapper {
            background: var(--primary-gradient);
            min-height: 100vh;
            color: white;
        }
        
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
        /* Products Section & Card Styling */
        /* ----------------------------------------------------------------- */
        .products-section {
            position: relative;
            z-index: 2;
            padding-bottom: 80px;
        }

        .card.product-card {
            background: var(--glass-bg); 
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            height: 100%;
            color: white; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3); 
        }

        .product-image {
            /* Taller height requested by user (from 180px) */
            height: 220px; 
            background: var(--accent-gradient); 
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer; /* Indicate it's clickable for the modal */
        }

        .product-image img {
            width: 100%;
            height: 100%;
            /* Contain ensures the full image is visible without cropping */
            object-fit: contain; 
            transition: transform 0.5s ease;
        }
        
        .card-title {
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: white;
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

        /* ----------------------------------------------------------------- */
        /* Modal Styling */
        /* ----------------------------------------------------------------- */
        .product-modal-content {
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            color: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        }
        
        .modal-title-text {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .modal-product-description {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        .modal-divider {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .price-tag-modal {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffd700; /* Bright accent for price */
        }

        .category-badge-modal {
            display: inline-block;
            background: var(--accent-gradient);
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .btn-product-action {
            background: var(--accent-gradient);
            border: none;
            color: white;
            font-weight: 700;
            padding: 12px 0;
            border-radius: 12px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-product-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(255, 107, 157, 0.5);
            color: white;
        }

        .btn-product-action-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-weight: 600;
            padding: 12px 0;
            border-radius: 12px;
            transition: background 0.2s;
        }

        .btn-product-action-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
        }

        .btn-product-action-fav {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            margin-top: 10px;
            transition: color 0.2s;
        }

        .btn-product-action-fav:hover {
            color: var(--accent-gradient);
        }

        .product-image-large {
            height: 400px; 
            border-radius: 15px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.2);
        }

        .product-image-large img {
            height: 100%;
            width: 100%;
            object-fit: contain; 
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
                            <button class="btn filter-btn" data-filter="Text Books">Text Books</button>
                            <button class="btn filter-btn" data-filter="Story Books">Story Books</button>
                            <button class="btn filter-btn" data-filter="Note Book">Note Books</button>
                            <button class="btn filter-btn" data-filter="Pens">Pens</button>
                            <button class="btn filter-btn" data-filter="pencils">Pencils</button>
                            <button class="btn filter-btn" data-filter="sharpners">Sharpners</button>
                            <button class="btn filter-btn" data-filter="Erasers">Erasers</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="products-section">
            <div class="container">
                <div class="row g-4" id="productsContainer">
                    
                    @foreach ($products as $product)
                        {{-- NOTE: data-category uses correct Blade syntax for filtering --}}
                        <div class="col-xl-4 col-lg-6 col-sm-6" data-category="{{ $product->category }}">
                            <div class="card product-card">
                                <div class="product-image">
                                    {{-- NOTE: Image path uses the correct 'storage/' prefix --}}
                                    <img src="{{ asset('storage/'.$product->images->first()->image) }}" 
                                         alt="{{$product->product_name}}" 
                                         data-product-id="{{$product->id}}">
                                    <span class="category-badge">{{$product->category}}</span>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{$product->product_name}}</h5> 
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="rating">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                                            <span class="text-white-50 ms-1 small">(4.5)</span>
                                        </div>
                                        <span class="price-tag">₹ {{$product->price}}</span> 
                                    </div>

                                    <p class="card-text">{{$product->description}}</p>
                                    
                                    <button class="btn btn-product mt-auto"> 
                                        <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div> 
    
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content product-modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div id="modalImageCarousel" class="carousel slide product-image-large" data-bs-ride="carousel">
                                <div class="carousel-inner" id="modal-image-gallery">
                                    <div class="carousel-item active">
                                        {{-- Image placeholder --}}
                                        <img src="" id="modal-image-main" class="d-block w-100" alt="Product Image">
                                    </div>
                                </div>
                                {{-- Carousel Controls go here if needed for multiple images --}}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h2 class="modal-title-text" id="modal-product-name">Product Name</h2>
                            <span class="category-badge-modal" id="modal-product-category">Category</span>
                            
                            <hr class="my-3 modal-divider">

                            <h3 class="price-tag-modal" id="modal-product-price">₹ 0.00</h3>
                            
                            <div class="rating my-3" id="modal-product-rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                                <span class="text-white-50 ms-1 small">(4.5)</span>
                            </div>

                            <p class="modal-product-description" id="modal-product-description">
                                Short description goes here.
                            </p>
                            
                            <hr class="my-3 modal-divider">

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary btn-product-action">
                                    <i class="bi bi-bag-fill me-2"></i> Buy Now
                                </a>
                                <button class="btn btn-product-action-secondary">
                                    <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                </button>
                                <button class="btn btn-product-action-fav">
                                    <i class="bi bi-heart me-2"></i> Add to Favourites
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const productsContainer = document.getElementById('productsContainer');
            const productCards = productsContainer.querySelectorAll('.col-xl-4');
            const detailModal = new bootstrap.Modal(document.getElementById('productDetailModal'));

            // Elements to update in the modal
            const modalName = document.getElementById('modal-product-name');
            const modalCategory = document.getElementById('modal-product-category');
            const modalPrice = document.getElementById('modal-product-price');
            const modalDescription = document.getElementById('modal-product-description');
            const modalImageMain = document.getElementById('modal-image-main');

            // --- Product Filtering Logic ---
            const filterProducts = (filter) => {
                productCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    if (filter === 'all' || category === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };
            
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    const filter = button.getAttribute('data-filter');
                    filterProducts(filter);
                });
            });
            filterProducts('all');


            // --- Modal Loading Logic ---
            const loadModalData = (productElement) => {
                // Get data from the clicked card
                const productName = productElement.querySelector('.card-title').textContent;
                const productPrice = productElement.querySelector('.price-tag').textContent;
                const productCategory = productElement.querySelector('.category-badge').textContent;
                const productDescription = productElement.querySelector('.card-text').textContent;
                const mainImagePath = productElement.querySelector('.product-image img').getAttribute('src');
                
                // Set Modal Content
                modalName.textContent = productName;
                modalCategory.textContent = productCategory;
                modalPrice.textContent = productPrice;
                modalDescription.textContent = productDescription;
                modalImageMain.setAttribute('src', mainImagePath);

                // For the purpose of this template, the carousel shows only the main image.
                // If you had multiple images, you'd populate the #modal-image-gallery innerHTML here.
            };

            // --- Event Listener to Open Modal on Image Click ---
            productCards.forEach(card => {
                const imageContainer = card.querySelector('.product-image');
                
                imageContainer.addEventListener('click', (e) => {
                    // Find the parent product card element
                    const productElement = e.currentTarget.closest('.col-xl-4'); 
                    
                    if (productElement) {
                        loadModalData(productElement);
                        detailModal.show();
                    }
                });
            });

        });
    </script>
</body>
</html>
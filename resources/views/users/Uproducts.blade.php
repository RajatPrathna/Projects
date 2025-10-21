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
            background: var(--primary-gradient); /* Applied here now */
            min-height: 100vh;
            color: white; /* Applied here now */
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
        /* Products Section & Card Styling (Redesigned) */
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
            /* ADJUSTMENT HERE: Increased height from 180px to 220px */
            height: 220px; 
            background: var(--accent-gradient); 
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            /* ADJUSTMENT HERE: Changed to 'contain' to show the full image */
            object-fit: contain; 
            transition: transform 0.5s ease;
            cursor: pointer;
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
        
        .btn.btn-product {
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

        /* // Modal Styling */

        .modal-content.product-modal-content {
            background: var(--primary-gradient); 
            backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border); 
            color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .btn-close.btn-close-white {
            filter: invert(1); 
        }

        /* Image Div Styling */
        .product-image-large {
            border: 2px solid rgba(255, 255, 255, 0.4);
            border-radius: 15px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.05); 
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .product-image-large img {
            border-radius: 12px;
            object-fit: contain;
            width: 100%;
            max-height: 400px;
        }

        .modal-button1 {
            background: var(--accent-gradient);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            transition: transform 0.2s;
            box-shadow: 0 4px 15px rgba(255, 107, 157, 0.5);
        }

        .modal-button1:hover {
            background: #ff8a80;
            transform: translateY(-2px);
            opacity: 0.9;
            color: white;
        }

        .modal-button2 {
            background: rgb(36, 146, 248);
            color: white;
            font-weight: 600;
            border-radius: 12px;
            transition: background 0.2s, transform 0.2s;
        }

        .modal-button2:hover {
            background: #0056b3;
            transform: translateY(-1px);
            color: white;
        }

        .modal-button3 {
            background: yellow;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: black;
            font-weight: 500;
            border-radius: 12px;
        }

        .modal-button3:hover {
            background: rgb(144, 245, 21);
            color: black;
            transform: translateY(-1px);
        }

        .category-badge-modal {
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 5px 12px;
            border-radius: 50px; 
            font-size: 0.9rem;
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
                            <button class="btn filter-btn" data-filter="text Books">Text Books</button>
                            <button class="btn filter-btn" data-filter="story Books">Story Books</button>
                            <button class="btn filter-btn" data-filter="note Book">Note Books</button>
                            <button class="btn filter-btn" data-filter="pens">Pens</button>
                            <button class="btn filter-btn" data-filter="pencils">Pencils</button>
                            <button class="btn filter-btn" data-filter="sharpners">Sharpners</button>
                            <button class="btn filter-btn" data-filter="erasers">Erasers</button>
                            {{-- <button class="btn filter-btn" data-filter="analytics">Boxes</button>
                            <button class="btn filter-btn" data-filter="analytics">Bags</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="products-section">
            <div class="container">
                <div class="row g-4" id="productsContainer">
                    
                    
                    

                    {{-- This is from database --}}
                    @foreach ($products as $product)
                        <div class="col-xl-4 col-lg-6 col-sm-6" data-category="{{ $product->category }}">
                        <div class="card product-card">
                                <div class="product-image" data-bs-toggle="modal" data-bs-target="#productDetailModal"
                                    data-bs-id="{{$product->id}}"    
                                    data-product-name="{{ $product->product_name }}"
                                    data-product-price="₹ {{ $product->price }}"
                                    data-product-description="{{ $product->description }}"
                                    data-product-category="{{ $product->category }}"
                                    data-product-image="{{ asset('storage/'.$product->images->first()->image) }}">
                                    <img src="{{ asset('storage/'.$product->images->first()->image) }}" alt="{{$product->product_name}}" style="object-fit: contain;">
                                    <span class="category-badge">{{$product->category}}</span>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{$product->product_name}}</h5> 
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
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
                    {{-- till here --}}
                </div>
            </div>
        </section>
    </div>

        {{--  Modal for product details --}}

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

                            <h3 class="price-tag-modal" id="modal-product-price"></h3>
                            
                            <div class="rating my-3" id="modal-product-rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                                <span class="text-white-50 ms-1 small">(4.5)</span>
                            </div>

                            <p class="modal-product-description" id="modal-product-description"></p>
                            
                            <hr class="my-3 modal-divider">

                            <div class="d-grid gap-2">
                                <a href="{{url('users/UbuyProduct')}}" class="btn btn-primary modal-button1">
                                    <i class="bi bi-bag-fill me-2"></i> Buy Now
                                </a>
                                <button class="btn modal-button2">
                                    <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                </button>
                                <button class="btn modal-button3">
                                    <i class="bi bi-heart me-2"></i> Add to Favourites
                                </button>
                            </div>
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
            const modalElement = document.getElementById('productDetailModal'); 

            const modalName = document.getElementById('modal-product-name');
            const modalCategory = document.getElementById('modal-product-category');
            const modalPrice = document.getElementById('modal-product-price');
            const modalDescription = document.getElementById('modal-product-description');
            const modalImageMain = document.getElementById('modal-image-main');
            

            const populateModalFromCard = (triggerElement) => {
                const productName = triggerElement.getAttribute('data-product-name');
                const productPrice = triggerElement.getAttribute('data-product-price');
                const productCategory = triggerElement.getAttribute('data-product-category');
                const productDescription = triggerElement.getAttribute('data-product-description');
                const mainImagePath = triggerElement.getAttribute('data-product-image');

                modalName.textContent = productName;
                modalCategory.textContent = productCategory;
                modalPrice.textContent = productPrice;
                modalDescription.textContent = productDescription;
                modalImageMain.setAttribute('src', mainImagePath);
            };


            modalElement.addEventListener('show.bs.modal', function (event) {
                const triggerElement = event.relatedTarget; 
                populateModalFromCard(triggerElement);
            });

            
            const filterProducts = (filter) => {
                productCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    card.style.display = (filter === 'all' || category === filter) ? 'block' : 'none';
                });
            };
            
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    filterProducts(button.getAttribute('data-filter'));
                });
            });
            filterProducts('all');
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Example Item</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* General Reset */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        /* Body CSS */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            min-height: 100vh;
            display: block; 
            color: white;
            padding: 100px 20px;
        }

        /* Main Container and Glassmorphism Styles */
        .cart-container {
            margin: 0 auto; 
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 90vw;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 
                        0 0 40px rgba(108, 92, 231, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .cart-container:hover {
            transform: translateY(-4px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3), 
                        0 0 50px rgba(108, 92, 231, 0.8);
        }
        .cart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6c5ce7, #a29bfe, #fd79a8);
            animation: shimmer 3s ease-in-out infinite;
        }
        @keyframes shimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Header Styling */
        .product-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fdcb6e;
            margin-bottom: 5px;
        }
        .product-header h5 {
            color: #a29bfe;
            font-weight: 400;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Product Image and Details */
        .product-image-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
        }
        .product-image {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Price Section */
        .price-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            margin-bottom: 30px;
        }

        /* Reviews Section Styles */
        .reviews-section {
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .review-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .review-stars .fa-star {
            color: #fdcb6e;
        }
        
        .review-author {
            font-weight: 700;
            color: #a29bfe;
        }

        /* Add Review Form Style */
        .add-review-form {
            background: rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .add-review-form textarea, .add-review-form input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }
        .add-review-form textarea::placeholder, .add-review-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .btn-purple {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
            color: white;
            transition: background-color 0.3s;
        }
        .btn-purple:hover {
            background-color: #5b4dd4;
            border-color: #5b4dd4;
            color: white;
        }

        /* Floating Elements */
        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 40px;
            height: 40px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.6;
            }
        }

        /* RESPONSIVE STYLES FOR MOBILE */
        @media (max-width: 991px) {
            body {
                padding: 80px 15px 40px 15px;
            }

            .cart-container {
                padding: 25px 20px;
                max-width: 95vw;
            }

            .product-header {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 15px;
            }

            .product-header h1 {
                font-size: 1.8rem;
            }

            .product-header h5 {
                font-size: 0.95rem;
            }

            .price-section {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .price-section h2 {
                font-size: 1.8rem;
                margin-bottom: 0;
            }

            .btn-purple {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 70px 10px 30px 10px;
            }

            .cart-container {
                padding: 20px 15px;
                border-radius: 15px;
            }

            .product-header h1 {
                font-size: 1.5rem;
            }

            .product-header h5 {
                font-size: 0.9rem;
                margin-bottom: 15px;
                padding-bottom: 15px;
            }

            .product-image-container {
                margin-bottom: 20px;
            }

            .price-section {
                padding: 15px;
            }

            .price-section h2 {
                font-size: 1.5rem;
            }

            .reviews-section h3 {
                font-size: 1.3rem;
            }

            .review-card {
                padding: 12px;
            }

            .review-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .add-review-form {
                padding: 15px;
            }

            .btn-outline-light {
                font-size: 0.9rem;
                padding: 8px 16px;
            }

            ul.list-unstyled li {
                font-size: 0.9rem;
                margin-bottom: 8px;
            }
        }
    </style>
</head>

<body>
    
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>
    
    <div class="cart-container">
        
        <div class="product-header d-flex justify-content-between align-items-center">
            <div>
                <h1>{{$buyproduct->product_name}}</h1>
                <h5>{{$buyproduct->description}}</h5>
            </div>
            <a href="/Uproducts" class="btn btn-outline-light rounded-pill"><i class="fas fa-arrow-left me-2"></i> Back to Products</a>
        </div>
        
        <div class="row">
            
            <div class="col-lg-5">
                <div class="product-image-container mb-4">
                    <img src="{{ asset('storage/' . ($buyproduct->images->first()?->image ?? 'default.png')) }}" alt="Product Placeholder" class="product-image">
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-dark rounded-3 bg-opacity-25">
                    <h2>₹{{$buyproduct->price}}</h2>
                    <a href="{{url('/users/UbuyProduct/'.$buyproduct->id) }}" class="btn btn-purple btn-lg rounded-pill"><i class="fas fa-shopping-bag me-2"></i> Proceed to Buy</a>
                </div>

            </div>

            <div class="col-lg-7">
                
                <div class="mb-4">
                    <h3>Product Specifications</h3>
                    <p class="text-white-50">This is a high-quality USB condenser microphone featuring four polar patterns, dynamic RGB lighting effects, and an anti-vibration shock mount. It's built for serious content creators.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle me-2 text-success"></i> **Polar Patterns:** Stereo, Omnidirectional, Cardioid, Bidirectional</li>
                        <li><i class="fas fa-check-circle me-2 text-success"></i> **Frequency Response:** 20Hz–20kHz</li>
                        <li><i class="fas fa-check-circle me-2 text-success"></i> **Feature:** Tap-to-mute sensor with LED indicator</li>
                        <li><i class="fas fa-check-circle me-2 text-success"></i> **Connectivity:** USB-C to USB-A</li>
                    </ul>
                </div>
                
                <div class="reviews-section">
                    <h3 class="mb-3"><i class="fas fa-comments me-2"></i> Customer Reviews (125)</h3>
                    
                    <div class="review-card">
                        <div class="review-header">
                            <span class="review-author">Alice D.</span>
                            <div class="review-stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                <small class="text-white-50 ms-2">4.5/5</small>
                            </div>
                        </div>
                        <p class="mb-0">"The best microphone I've ever used. The sound quality is studio-grade, and the RGB lighting is a fun bonus. Worth every penny!"</p>
                    </div>

                    <div class="review-card">
                        <div class="review-header">
                            <span class="review-author">Bob S.</span>
                            <div class="review-stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                <small class="text-white-50 ms-2">4.0/5</small>
                            </div>
                        </div>
                        <p class="mb-0">"Great product, but it's a bit sensitive to background noise even on the cardioid setting. Good otherwise."</p>
                    </div>

                    <div class="add-review-form">
                        <h5 class="mb-3">Share Your Experience</h5>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your Name or Alias" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" placeholder="Your detailed review..." required></textarea>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label class="form-label me-3 mb-0">Rating:</label>
                                <div class="review-stars">
                                    <i class="far fa-star text-light"></i>
                                    <i class="far fa-star text-light"></i>
                                    <i class="far fa-star text-light"></i>
                                    <i class="far fa-star text-light"></i>
                                    <i class="far fa-star text-light"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-purple"><i class="fas fa-paper-plane me-2"></i> Submit Review</button>
                        </form>
                    </div>

                </div>
                
            </div>
            
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
    /* ----------------------------------
    // CUSTOM STYLES (MATCHING THE THEME)
    // ---------------------------------- */

    body {
        background-color: #1a1a2e; /* Dark background from your previous context */
        color: #fff;
    }

    .container {
        padding: 3rem 1rem;
    }

    .order-panel {
        background-color: #2c2c44; /* Slightly lighter dark panel background */
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        margin-bottom: 2rem;
    }

    .accent-green {
        color: #00ff7f; /* Your accent green */
    }

    /* --- Tracking Meter Styles --- */

    .tracking-meter-wrapper {
        padding: 2rem 0;
    }

    .meter-container {
        width: 100%;
        height: 10px;
        background-color: #3e3e5c;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }

    .meter-progress {
        height: 100%;
        background-color: #00ff7f; /* Accent green for progress */
        width: 0%; /* Initial state: 0% */
        border-radius: 5px;
        transition: width 1s ease-in-out; /* Smooth transition */
    }

    .meter-dot {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #00ff7f; /* Accent green dot */
        border-radius: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        transition: left 1s ease-in-out; /* Smooth movement */
        z-index: 2;
        box-shadow: 0 0 0 5px rgba(0, 255, 127, 0.3);
    }
    
    .tracking-status-label {
        color: #00ff7f;
        font-weight: bold;
        animation: pulse 1s infinite alternate;
    }

    @keyframes pulse {
        from {
            opacity: 1;
        }
        to {
            opacity: 0.7;
        }
    }

    /* --- Rating Styles --- */

    .rating-container i {
        color: #555;
        font-size: 1.5rem;
        transition: color 0.3s;
    }

    .rating-container i.rated {
        color: #ffd700; /* Gold color for rated stars */
    }
    
</style>

<div class="container">
    <header class="text-center mb-5">
        <h1 class="display-6 fw-bold text-white">Order #ORD-{{ $order->id ?? '987654' }}</h1>
        <p class="lead text-white opacity-75">Tracking Details & Status</p>
    </header>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="order-panel">
                <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Order Status</h2>
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="mb-0 text-white opacity-75">Current Status:</p>
                    <span id="currentStatus" class="tracking-status-label">
                        Processing
                    </span>
                </div>

                <div class="tracking-meter-wrapper">
                    <div class="meter-container">
                        <div class="meter-progress" id="meterProgress"></div>
                        <div class="meter-dot" id="meterDot"></div>
                    </div>
                    <div class="d-flex justify-content-between small text-white opacity-75 mt-2">
                        <span>Ordered</span>
                        <span>Shipped</span>
                        <span>Out for Delivery</span>
                        <span>Delivered</span>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="mb-1 fw-bold text-white">Estimated Delivery:</p>
                    <p class="accent-green h5" id="deliveryDate">Oct 26, 2025 (Max 10 Days)</p>
                </div>
                
                <hr class="border-white border-opacity-30 my-4">

                <h2 class="h4 fw-bold mb-3">Product Details</h2>
                <div class="d-flex align-items-start bg-white bg-opacity-10 p-3 rounded-3">
                    <img src="path/to/product/image.jpg" alt="Product" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                    
                    <div>
                        <p class="fw-bold mb-0 text-white">{{ $order->product_name ?? 'High-Performance Gaming GPU' }}</p>
                        <p class="small opacity-75 mb-1">Qty: {{ $order->quantity ?? 1 }} | Price: ₹ {{ number_format($order->total_amount ?? 142190.00) }}</p>
                        <p class="small opacity-75 mb-0">Order Date: {{ $order->order_date ?? '2025-10-20' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="order-panel">
                <h2 class="h5 fw-bold mb-3 border-bottom border-white border-opacity-30 pb-2">Delivery Information</h2>
                <p class="small text-white opacity-75 mb-1">**Tracking ID:** #TRK-{{ $order->tracking_id ?? '23145678' }}</p>
                <p class="small text-white opacity-75 mb-3">**Carrier:** FedX Priority</p>
                
                <p class="fw-bold mb-1 text-white">Shipping Address:</p>
                <div class="small bg-white bg-opacity-10 p-3 rounded-3 opacity-75">
                    {{ $order->shipping_address->name ?? 'John Doe' }}<br>
                    {{ $order->shipping_address->line1 ?? '123 Tech Avenue' }}<br>
                    {{ $order->shipping_address->city ?? 'Bangalore' }}, {{ $order->shipping_address->zip ?? '560001' }}
                </div>
                
                <hr class="border-white border-opacity-30 my-4">

                <h2 class="h5 fw-bold mb-3 border-bottom border-white border-opacity-30 pb-2">Rate Your Purchase</h2>
                <p class="small opacity-75">Once delivered, you can rate the product below:</p>
                
                <div class="rating-container text-center" id="ratingContainer">
                    <i class="bi bi-star" data-rating="1"></i>
                    <i class="bi bi-star" data-rating="2"></i>
                    <i class="bi bi-star" data-rating="3"></i>
                    <i class="bi bi-star" data-rating="4"></i>
                    <i class="bi bi-star" data-rating="5"></i>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-sm btn-outline-light d-none" id="submitRatingBtn">Submit Rating</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // --- 1. Delivery Date Setup ---
    
    const deliveryDateEl = document.getElementById('deliveryDate');
    const maxDays = 10;
    const orderDate = new Date('{{ $order->order_date ?? '2025-10-20' }}'); // Use the actual order date
    
    // Calculate the maximum delivery date (Order Date + 10 days)
    const maxDeliveryDate = new Date(orderDate);
    maxDeliveryDate.setDate(orderDate.getDate() + maxDays);

    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    const formattedDate = maxDeliveryDate.toLocaleDateString('en-US', options);

    deliveryDateEl.textContent = `${formattedDate} (Max ${maxDays} Days)`;

    // --- 2. Tracking Meter Logic ---
    
    const meterProgress = document.getElementById('meterProgress');
    const meterDot = document.getElementById('meterDot');
    const currentStatusEl = document.getElementById('currentStatus');
    
    // Define the possible statuses and their corresponding meter percentages
    const trackingSteps = {
        'Processing': { percent: 10, label: 'Processing' },
        'Shipped': { percent: 45, label: 'Shipped' },
        'Out for Delivery': { percent: 80, label: 'Out for Delivery' },
        'Delivered': { percent: 100, label: 'Delivered' }
    };

    // Simulate current order status (replace with actual backend data)
    const orderStatus = '{{ $order->status ?? 'Out for Delivery' }}'; 
    const statusData = trackingSteps[orderStatus] || trackingSteps['Processing'];

    // Update meter, dot, and label with smooth animation
    meterProgress.style.width = statusData.percent + '%';
    meterDot.style.left = statusData.percent + '%';
    currentStatusEl.textContent = statusData.label;
    
    // Smooth color change on the meter dot for 'Delivered' status
    if (orderStatus === 'Delivered') {
        meterDot.style.backgroundColor = '#00ff7f'; // Keep accent green for completion
    } else {
        meterDot.style.backgroundColor = '#00ff7f';
    }


    // --- 3. Interactive Rating System ---

    const ratingContainer = document.getElementById('ratingContainer');
    const submitRatingBtn = document.getElementById('submitRatingBtn');
    let selectedRating = 0;
    
    if (ratingContainer) {
        // Star hover/click interaction
        ratingContainer.addEventListener('mouseover', function(e) {
            if (e.target.tagName === 'I') {
                const hoverRating = parseInt(e.target.dataset.rating);
                // Highlight stars up to the hover rating
                ratingContainer.querySelectorAll('i').forEach(star => {
                    const starRating = parseInt(star.dataset.rating);
                    star.classList.toggle('rated', starRating <= hoverRating);
                });
            }
        });
        
        ratingContainer.addEventListener('mouseout', function() {
            // Revert to selected rating when mouse leaves
            ratingContainer.querySelectorAll('i').forEach(star => {
                const starRating = parseInt(star.dataset.rating);
                star.classList.toggle('rated', starRating <= selectedRating);
            });
        });

        ratingContainer.addEventListener('click', function(e) {
            if (e.target.tagName === 'I') {
                selectedRating = parseInt(e.target.dataset.rating);
                submitRatingBtn.classList.remove('d-none');
                
                // Final selection: Highlight permanently
                ratingContainer.querySelectorAll('i').forEach(star => {
                    const starRating = parseInt(star.dataset.rating);
                    star.classList.toggle('rated', starRating <= selectedRating);
                });
            }
        });

        // Submit button action (Add AJAX logic here later)
        submitRatingBtn.addEventListener('click', function() {
            alert(`Thanks for your ${selectedRating} star rating! (Logic to submit to backend goes here)`);
            submitRatingBtn.classList.add('d-none');
            // Disable further rating
            ratingContainer.style.pointerEvents = 'none';
        });
        
        // Disable rating if the order is not yet delivered
        if (orderStatus !== 'Delivered') {
            ratingContainer.style.opacity = 0.5;
            ratingContainer.style.pointerEvents = 'none';
            // Optional: Add a message
            // ratingContainer.insertAdjacentHTML('afterend', '<p class="small text-warning mt-2">Rating enabled after delivery.</p>');
        }
    }
});
</script>
</body>
</html>
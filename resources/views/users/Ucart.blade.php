<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Real-Time Checkout</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and Background */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        /* Glassmorphism Cart Container */
        .cart-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 1000px; /* Wider for cart layout */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 
                        0 0 40px rgba(108, 92, 231, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            color: white;
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .cart-container:hover {
            transform: translateY(-4px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3), 
                        0 0 50px rgba(108, 92, 231, 0.8);
        }

        /* Top Shimmer Effect */
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
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .cart-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
        }
        
        /* Total Amount Display */
        .total-display {
            font-size: 1.5rem;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #fdcb6e;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
        }

        /* Cart Item Card Styling */
        .cart-item-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            margin-bottom: 20px;
            padding: 15px;
            transition: background 0.3s ease;
        }
        
        .cart-item-card:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        /* Custom Checkbox Styling for Glassmorphism */
        .product-select-checkbox {
            width: 24px;
            height: 24px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            background-color: transparent;
            cursor: pointer;
            transition: all 0.2s;
            border-radius: 6px;
            margin: 0;
            flex-shrink: 0;
        }

        .product-select-checkbox:checked {
            background-color: #a29bfe; /* Purple highlight */
            border-color: #a29bfe;
            box-shadow: 0 0 10px rgba(162, 155, 254, 0.7);
        }


        .product-image {
            width: 100%;
            height: 100px;
            background: linear-gradient(45deg, #a29bfe, #6c5ce7);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
            margin-bottom: 10px;
        }

        .product-details h5 {
            font-weight: 600;
            color: #fd79a8;
            margin-bottom: 5px;
        }

        .product-price {
            font-weight: 500;
            color: #fdcb6e;
        }
        
        /* Quantity Controls */
        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .qty-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.2s;
            line-height: 1;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .qty-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #a29bfe;
        }

        .qty-input {
            width: 50px;
            text-align: center;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            margin: 0 10px;
            border-radius: 8px;
            padding: 5px 0;
        }
        
        /* Summary Card */
        .summary-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 30px;
        }
        
        .summary-card h4 {
            color: #fd79a8;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .summary-row.total {
            font-size: 1.3rem;
            font-weight: 700;
            color: #fdcb6e;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px dashed rgba(255, 255, 255, 0.4);
        }
        
        .checkout-btn {
            width: 100%;
            margin-top: 20px;
            background: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(253, 121, 168, 0.3);
        }

        /* Background Floaters */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
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

        /* Responsive adjustments for controls */
        @media (max-width: 767px) {
            .cart-item-card {
                /* On small screens, stack the checkbox and image properly */
                padding: 15px 10px;
            }
            .cart-item-card .col-md-1, 
            .cart-item-card .col-md-2, 
            .cart-item-card .col-md-5, 
            .cart-item-card .col-md-4 {
                width: 100% !important;
                margin-bottom: 10px;
            }

            .quantity-control {
                justify-content: center !important;
            }
        }
    </style>
</head>
<body>
    
    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>
    
    <div class="cart-container">
        
        <!-- Cart Header and Total Display -->
        <div class="cart-header">
            <h1><i class="fas fa-shopping-cart me-2"></i> Your Shopping Cart</h1>
            <div class="total-display">
                <i class="fas fa-dollar-sign me-2"></i>
                Total: <span id="cart-total-display">0.00</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div id="cart-items">
                    <div class="cart-item-card d-flex flex-column flex-md-row align-items-center" data-product-id="prod1" data-price="19.99">
                        <div class="col-12 col-md-1 d-flex justify-content-center mb-3 mb-md-0">
                            <input type="checkbox" class="product-select-checkbox form-check-input">
                        </div>
                        <div class="col-12 col-md-2 mb-3 mb-md-0 me-md-3">
                            <div class="product-image"><i class="fas fa-mug-hot"></i></div>
                        </div>
                        <div class="col-12 col-md-5 product-details text-center text-md-start mb-3 mb-md-0">
                            <h5>Cosmic Mug</h5>
                            <p class="product-price">Price: $<span class="unit-price">19.99</span></p>
                        </div>
                        <div class="col-12 col-md-4 quantity-control justify-content-center justify-content-md-end">
                            <button class="qty-btn btn btn-sm" data-action="decrement"><i class="fas fa-minus"></i></button>
                            <input type="number" class="qty-input form-control form-control-sm" value="1" min="1" readonly data-id="prod1">
                            <button class="qty-btn btn btn-sm" data-action="increment"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="cart-item-card d-flex flex-column flex-md-row align-items-center" data-product-id="prod2" data-price="129.00">
                        <div class="col-12 col-md-1 d-flex justify-content-center mb-3 mb-md-0">
                            <input type="checkbox" class="product-select-checkbox form-check-input">
                        </div>
                        <div class="col-12 col-md-2 mb-3 mb-md-0 me-md-3">
                            <div class="product-image"><i class="fas fa-keyboard"></i></div>
                        </div>
                        <div class="col-12 col-md-5 product-details text-center text-md-start mb-3 mb-md-0">
                            <h5>Galaxy Keyboard</h5>
                            <p class="product-price">Price: $<span class="unit-price">129.00</span></p>
                        </div>
                        <div class="col-12 col-md-4 quantity-control justify-content-center justify-content-md-end">
                            <button class="qty-btn btn btn-sm" data-action="decrement"><i class="fas fa-minus"></i></button>
                            <input type="number" class="qty-input form-control form-control-sm" value="1" min="1" readonly data-id="prod2">
                            <button class="qty-btn btn btn-sm" data-action="increment"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="cart-item-card d-flex flex-column flex-md-row align-items-center" data-product-id="prod3" data-price="79.50">
                        <div class="col-12 col-md-1 d-flex justify-content-center mb-3 mb-md-0">
                            <input type="checkbox" class="product-select-checkbox form-check-input">
                        </div>
                        <div class="col-12 col-md-2 mb-3 mb-md-0 me-md-3">
                            <div class="product-image"><i class="fas fa-headset"></i></div>
                        </div>
                        <div class="col-12 col-md-5 product-details text-center text-md-start mb-3 mb-md-0">
                            <h5>Nebula Headset</h5>
                            <p class="product-price">Price: $<span class="unit-price">79.50</span></p>
                        </div>
                        <div class="col-12 col-md-4 quantity-control justify-content-center justify-content-md-end">
                            <button class="qty-btn btn btn-sm" data-action="decrement"><i class="fas fa-minus"></i></button>
                            <input type="number" class="qty-input form-control form-control-sm" value="1" min="1" readonly data-id="prod3">
                            <button class="qty-btn btn btn-sm" data-action="increment"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="text-center text-md-start mt-4">
                    <button class="btn btn-outline-light rounded-pill"><i class="fas fa-arrow-left me-2"></i> Continue Shopping</button>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="summary-card">
                    <h4>Order Summary</h4>
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        $<span id="subtotal">0.00</span>
                    </div>

                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>$5.00</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Tax (5%)</span>
                        $<span id="tax-amount">0.00</span>
                    </div>
                    
                    <div class="summary-row total">
                        <span>Estimated Total</span>
                        $<span id="final-total">0.00</span>
                    </div>

                    <button class="checkout-btn" onclick="window.location.href='{{url('#')}}'">Proceed to Checkout</button >
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cartItemsContainer = document.getElementById('cart-items');
            
            // Define fixed values
            const SHIPPING_COST = 5.00;
            const TAX_RATE = 0.05; // 5%

            /**
             * Simulates an AJAX call to update the cart totals based on current quantities and selection.
             */
            async function updateCartTotal() {
                // Simulate network delay for real-time update feel
                await new Promise(resolve => setTimeout(resolve, 100));

                const items = document.querySelectorAll('.cart-item-card');
                let newSubtotal = 0;

                items.forEach(item => {
                    const isSelected = item.querySelector('.product-select-checkbox').checked;
                    
                    if (isSelected) {
                        const priceElement = item.querySelector('.unit-price');
                        const qtyInput = item.querySelector('.qty-input');
                        
                        if (priceElement && qtyInput) {
                            const price = parseFloat(priceElement.textContent);
                            const quantity = parseInt(qtyInput.value);
                            
                            // Calculate item total and add to overall subtotal
                            newSubtotal += price * quantity;
                        }
                    }
                });

                // Calculate taxes and final total
                const taxAmount = newSubtotal * TAX_RATE;
                
                // Only apply shipping if the subtotal is greater than zero
                const shipping = newSubtotal > 0 ? SHIPPING_COST : 0.00;
                
                const finalTotal = newSubtotal + taxAmount + shipping;
                
                // Update DOM elements
                document.getElementById('subtotal').textContent = newSubtotal.toFixed(2);
                document.getElementById('tax-amount').textContent = taxAmount.toFixed(2);
                document.getElementById('final-total').textContent = finalTotal.toFixed(2);
                document.getElementById('cart-total-display').textContent = finalTotal.toFixed(2);
            }
            
            /**
             * Handles click events for quantity increment/decrement and checkbox change.
             * @param {Event} event - The click event object.
             */
            function handleCartInteraction(event) {
                const target = event.target;
                
                // Use .closest() to correctly identify the button element, 
                // even if the click lands on the icon (<i>) inside the button.
                const qtyButton = target.closest('.qty-btn');

                // 1. Handle Quantity Change (increment/decrement)
                if (qtyButton) {
                    const action = qtyButton.dataset.action;
                    const itemCard = qtyButton.closest('.cart-item-card');
                    const input = itemCard.querySelector('.qty-input');
                    let currentValue = parseInt(input.value);

                    if (action === 'increment') {
                        currentValue += 1;
                    } else if (action === 'decrement' && currentValue > 1) {
                        currentValue -= 1;
                    } else {
                        return; // Do nothing if trying to decrement below 1
                    }

                    input.value = currentValue;
                    updateCartTotal(); // Recalculate after quantity change
                    return;
                }
                
                // 2. Handle Checkbox Toggle
                if (target.classList.contains('product-select-checkbox')) {
                    updateCartTotal();
                }
            }

            // Attach event listeners to the main cart container for delegation
            cartItemsContainer.addEventListener('click', handleCartInteraction);

            // Initial call to set the correct totals when the page loads
            // This will now correctly show $0.00 since all checkboxes start unchecked.
            updateCartTotal();
        });
    </script>
</body>
</html>

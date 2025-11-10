<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-gradient: linear-gradient(135deg, #ff6b9d, #ff8a80);
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.4);
            --accent-color: #ff6b9d;
            --success-color: #10b981;
            --reddish-pink-color: #f55b8e;
            --dark-reddish-pink: #ff4783;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--primary-gradient); 
            color: white; 
            min-height: 100vh;
        }

        .checkout-panel {
            background: var(--glass-bg); 
            backdrop-filter: blur(15px); 
            border: 1px solid var(--glass-border); 
            border-radius: 1.5rem; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3); 
            transition: all 0.5s ease-in-out; 
        }

        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.15) !important; 
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            color: white !important; 
            border-radius: 0.75rem !important;
        }
        .form-control::placeholder { color: rgba(255, 255, 255, 0.7); }

        .form-select option { color: rgba(255, 255, 255, 0.7); background-color: rgba(56, 110, 247, 0.9); }

        .form-control:focus, .form-select:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.5); 
            border-color: var(--accent-color) !important; 
        }
        .form-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") !important;
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .btn-primary-checkout {
            background: var(--accent-gradient) !important;
            color: white !important;
            font-weight: 700 !important; 
            padding: 0.75rem 1.5rem !important;
            border: none !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 4px 15px rgba(255, 107, 157, 0.4); 
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-primary-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 157, 0.6);
        }

        .btn-primary-backto-products {
            background-color: var(--reddish-pink-color) !important;
            color: white !important;
            font-weight: 700 !important; 
            padding: 0.75rem 1.5rem !important;
            border: none !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 4px 15px rgba(252, 86, 142, 0.6); 
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s;
        }
        .btn-primary-backto-products:hover {
            background-color: var(--dark-reddish-pink) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 71, 131, 0.7); 
        }
        .accent-green { color: var(--success-color); }
        .space-y-3 > * + * { margin-top: 0.75rem; }
        .space-y-4 > * + * { margin-top: 1rem; }
        
        .payment-option-label {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid transparent;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .payment-option-label:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .form-check-input:checked + .form-check-label {
            color: var(--accent-color);
        }
        .form-check-input:checked {
            border-color: var(--accent-color);
            background-color: var(--accent-color);
        }
        .form-check-input {
            border-radius: 50%;
        }
        
        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            transition: all 0.3s ease-in-out;
        }
        .step-active {
            background: var(--accent-gradient);
            box-shadow: 0 0 0 3px rgba(255, 107, 157, 0.5); 
        }
        .step-inactive {
            background: rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.7);
        }
        .stepper-line {
            width: 50px;
            height: 2px;
            margin: 0 1rem;
            background: rgba(255, 255, 255, 0.3);
            transition: background 0.3s;
        }
        .stepper-line.active {
            background: var(--accent-color);
        }
        .step-content {
            transition: opacity 0.3s ease-in-out;
        }


        /*quantity button styling */
        .quantityButtons {
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.3); 
            border-radius: 0.5rem; 
            overflow: hidden; 
            width: fit-content; 
        }

        .btn-quantity {
            background-color: transparent;
            color: white; 
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
            line-height: 1; 
        }

        
        .btn-quantity:hover {
            background-color: rgba(224, 68, 146, 0.8); 
            color: #000; 
        }

        .btn-quantity:focus {
            box-shadow: none; 
            outline: none;
        }

        /* The Quantity Display */
        #quantity {
            color: white;
            padding: 0 0.75rem;
            font-size: 1rem;
            font-weight: 500;
            min-width: 40px;
            text-align: center;
        }

        .orderSummary {
            background: var(--glass-bg); 
            backdrop-filter: blur(15px); 
            border: 1px solid var(--glass-border); 
            border-radius: 1.5rem; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3); 
            transition: all 0.5s ease-in-out; 
        }
        
    </style>
</head>
<body>

    <form id="addressForm">
        @csrf
    <div class="container p-3 p-md-5 my-3 my-lg-5">
        <header class="text-center mb-5">
            <h1 class="display-5 fw-bold text-white tracking-tight" id="main-header">Secure Checkout</h1>
            <p class="lead text-white opacity-75" id="step-subtitle">1. Enter Delivery Address</p>
        </header>

        <div class="d-none d-sm-flex justify-content-center mb-5">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div id="step-indicator-1" class="step-indicator step-active">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <span class="ms-3 fw-medium text-white">1. Address</span>
                </div>
                <div class="stepper-line" id="line-1-2"></div>
                <div class="d-flex align-items-center">
                    <div id="step-indicator-2" class="step-indicator step-inactive">
                        <i class="bi bi-credit-card-fill"></i>
                    </div>
                    <span class="ms-3 fw-medium text-white opacity-75" id="step-2-text">2. Payment</span>
                </div>
                <div class="stepper-line" id="line-2-3"></div>
                <div class="d-flex align-items-center">
                    <div id="step-indicator-3" class="step-indicator step-inactive">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <span class="ms-3 fw-medium text-white opacity-75" id="step-3-text">3. Confirm</span>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="checkout-panel p-4 p-md-5 min-vh-50 ">
                    {{-- delivery address content --}}
                    
                    <div id="step-1-content" class="step-content ">
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Delivery Information</h2>
                        
                            <div class="mb-4"><label for="fullName" class="form-label">Full Name</label>
                                <input type="text" id="fullName" class="form-control" placeholder="Your Name" required></div>
                            <div class="mb-4"><label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" class="form-control" placeholder="jane@example.com" required></div>
                            
                            <div class="mb-4"><label for="phoneNo" class="form-label">Contact Number</label>
                                <input type="text" id="phoneNumber" class="form-control" placeholder="Your Phone Number" required></div>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6"><label for="address" class="form-label">Address Line 1</label>
                                    <input type="text" id="address" class="form-control" placeholder="Your Address" required></div>
                                <div class="col-12 col-md-6"><label for="address2" class="form-label">Address Line 2 (Optional)</label>
                                    <input type="text" id="address2" class="form-control" placeholder="Your Other Address"></div>
                            </div>
                            
                            <div class="row g-3 mb-5">
                                <div class="col-12 col-sm-4"><label for="city" class="form-label">City</label>
                                    <input type="text" id="city" class="form-control" placeholder="Your City" required></div>
                                <div class="col-12 col-sm-4"><label for="state" class="form-label">State / Province</label>
                                    <input type="text" id="state" class="form-control" placeholder="Your state" required></div>
                                <div class="col-12 col-sm-4"><label for="zip" class="form-label">Zip / Postal Code</label>
                                    <input type="text" id="zip" class="form-control" placeholder="Your Pin Code" required></div>
                            </div>

                            <h3 class="h5 fw-bold mb-3 border-bottom border-white border-opacity-30 pb-2">Select Payment Method</h3>
                            <div class="space-y-3 mb-4" id="paymentTypeSelection">
                                <div class="form-check py-3 px-4 payment-option-label d-flex align-items-center" onclick="document.getElementById('paymentCard').click()">
                                    <input class="form-check-input flex-shrink-0 me-3 mt-1" type="radio" name="paymentType" value="card" id="paymentCard" checked>
                                    <label class="form-check-label fw-medium text-white d-flex align-items-center w-100" for="paymentCard">
                                        Credit/Debit Card <i class="bi bi-credit-card-2-front ms-auto"></i>
                                    </label>
                                </div>
                                <div class="form-check py-3 px-4 payment-option-label d-flex align-items-center" onclick="document.getElementById('paymentUpi').click()">
                                    <input class="form-check-input flex-shrink-0 me-3 mt-1" type="radio" name="paymentType" value="upi" id="paymentUpi">
                                    <label class="form-check-label fw-medium text-white d-flex align-items-center w-100" for="paymentUpi">
                                        UPI / Wallet <i class="bi bi-phone ms-auto"></i>
                                    </label>
                                </div>
                                <div class="form-check py-3 px-4 payment-option-label d-flex align-items-center" onclick="document.getElementById('paymentCod').click()">
                                    <input class="form-check-input flex-shrink-0 me-3 mt-1" type="radio" name="paymentType" value="cod" id="paymentCod">
                                    <label class="form-check-label fw-medium text-white d-flex align-items-center w-100" for="paymentCod">
                                        Cash on Delivery (COD) <i class="bi bi-wallet2 ms-auto"></i>
                                    </label>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-primary-checkout mt-4" id="continueBtn">
                                <i class="bi bi-arrow-right-circle-fill me-2"></i> Continue to Payment
                            </button>
                            <button type="button" onclick="window.location.href = '{{ url('/Uproducts') }}';" class="btn btn-primary-backto-products mt-4" id="backToProductsBtn">
                                <i class="bi bi-arrow-left-circle-fill me-2"></i> Back to Products
                            </button>
                        
                    </div>

                    {{-- card payment content --}}

                    <div id="card-content" class="step-content d-none" >
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Credit Card Details</h2>
                        <p class="text-white opacity-75 mb-4 d-flex align-items-center"><i class="bi bi-lock-fill me-2 text-success"></i> Secure and encrypted transaction.</p>
                        
                        
                            <div class="mb-4">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <div class="position-relative">
                                    <input type="tel" id="cardNumber" class="form-control" placeholder="xxxx xxxx xxxx xxxx" required>
                                    <i class="bi bi-credit-card-2-front position-absolute end-0 top-50 translate-middle-y me-3 text-white opacity-75"></i>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="cardName" class="form-label">Name on Card</label>
                                <input type="text" id="cardName" class="form-control" placeholder="Your name on card" required>
                            </div>

                            <div class="row g-3 mb-5">
                                <div class="col-8">
                                    <label for="expiryMonth" class="form-label">Expiration Date</label>
                                    <div class="d-flex gap-2 bg-transparent">
                                        <select id="expiryMonth" class="form-select flex-grow-1" required>
                                            <option value="" disabled selected>Month</option>
                                            <option value="01">01 - Jan</option>
                                            <option value="02">02 - Feb</option>
                                            <option value="03">03 - Mar</option>
                                            <option value="04">04 - Apr</option>
                                            <option value="05">05 - May</option>
                                            <option value="06">06 - Jun</option>
                                            <option value="07">07 - Jul</option>
                                            <option value="08">08 - Aug</option>
                                            <option value="09">09 - Sep</option>
                                            <option value="10">10 - Oct</option>
                                            <option value="11">11 - Nov</option>
                                            <option value="12">12 - Dec</option>
                                        </select>
                                        <select id="expiryYear" class="form-select flex-grow-1" required>
                                            <option value="" disabled selected>Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="tel" id="cvv" class="form-control" placeholder="123" maxlength="4" value="123" required>
                                </div>
                            </div>
                            
                            <button type="button"  class="btn btn-primary-checkout mt-3" id="payCardBtn">
                                <i class="bi bi-wallet2 me-2"></i> Pay <span id="paymentAmountCard"></span>
                            </button>

                            <button type="button" id="backToAddressBtns" class="mt-3 w-100 p-3 rounded-3 text-white opacity-75 fw-medium border border-white border-opacity-50 btn btn-outline-light btn-back-to-address">
                                <i class="bi bi-arrow-left me-2"></i> Back to Address
                            </button>
                        
                    </div>

                    {{-- upi payment content --}}

                    <div id="upi-content" class="step-content d-none">
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Pay with UPI</h2>
                        <p class="text-white opacity-75 mb-4 d-flex align-items-center"><i class="bi bi-phone me-2 text-success"></i> Enter your UPI.</p>

                        
                            <div class="mb-4">
                                <label for="upiId" class="form-label">UPI ID</label>
                                <div class="position-relative">
                                    <input type="text" id="upiId" class="form-control" placeholder="jdoe@bankname" required>
                                    <i class="bi bi-qr-code-scan position-absolute end-0 top-50 translate-middle-y me-3 text-white opacity-75"></i>
                                </div>
                                <p class="text-white opacity-50 small mt-1">Example: yourname@bank or 1234567890@upi</p>
                            </div>
                            
                            <button type="button" class="btn btn-primary-checkout mt-3" id="payUpiBtn">
                                <i class="bi bi-check-circle-fill me-2"></i> Initiate UPI Payment for <span id="paymentAmountUpi"></span>
                            </button>

                            <button type="button" id="backToAddressBtns" class="mt-3 w-100 p-3 rounded-3 text-white opacity-75 fw-medium border border-white border-opacity-50 btn btn-outline-light btn-back-to-address">
                                <i class="bi bi-arrow-left me-2"></i> Back to Address
                            </button>
                    </div>
                    
                    {{-- cod payment content --}}

                    <div id="cod-content" class="step-content d-none">
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Cash on Delivery (COD)</h2>
                        <p class="text-white opacity-75 mb-4 d-flex align-items-center"><i class="bi bi-cash-stack me-2 text-info"></i> Pay <span class="fw-bold ms-1 me-1">₹ 1,42,190</span> in cash when the order is delivered.</p>
                        <div class="alert alert-light alert-opacity-25 border border-white-50 text-white rounded-3">
                            <p class="mb-0 small"><i class="bi bi-exclamation-triangle-fill me-2 text-warning"></i>Note: COD may not be available for all pin codes or order values above a certain limit.</p>
                        </div>
                        
                            <button type="button" class="btn btn-primary-checkout mt-5" id="confirmCodBtn">
                                <i class="bi bi-check-circle-fill me-2"></i> Confirm COD Order
                            </button>
                            <button type="button" id="backToAddressBtns" class="mt-3 w-100 p-3 rounded-3 text-white opacity-75 fw-medium border 
                                border-white border-opacity-50 btn btn-outline-light btn-back-to-address">
                                <i class="bi bi-arrow-left me-2"></i> Back to Address
                            </button>
                        
                    </div>

                    {{-- order confirmation content --}}

                    <div id="step-3-content" class="step-content d-none">
                        <div class="text-center py-5">
                            <i class="bi bi-check-circle-fill accent-green display-4 mb-4"></i>
                            <div id="confirmationDetails" class="mt-4 p-3 bg-white bg-opacity-10 rounded-3 d-inline-block text-start small">
                            <h2 class="h3 fw-bold mb-3">Confirm Your Order</h2>
                            </div><br>
                            <button type="submit" class="mt-5 d-inline-block py-2 px-4 rounded-3 bg-white bg-opacity-10 border border-white 
                            border-opacity-50 text-white fw-medium btn btn-light text-white" style="--bs-bg-opacity: .1;">
                                Confirm and Place Order
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>

            
            {{-- order summary section --}}
            
                <div class="col-lg-4 ordersummarycol" >
                    <div class="checkout-panel p-4 p-md-4 orderSummary">
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Order Summary</h2>
                        
                        <div class="space-y-4 mb-4" id="itemsummary"> </div>
                        <div class="quantityButtons">
                            <button class="btn btn-quantity" id="decreaseBtn">-</button>
                            <span id="quantity">1</span>
                            <button class="btn btn-quantity" id="increaseBtn">+</button>
                        </div>
                        <div class="small space-y-3 pt-3 border-top border-white border-opacity-30">
                            <div class="d-flex justify-content-between">
                                <span class="text-white opacity-75">Subtotal</span>
                                <span class="text-white fw-medium" id="summarySubtotal">{{$buyproduct->price}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-white opacity-75">Shipping Charges </span>
                                <span class="text-white fw-medium" id="Shippingprice"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-white opacity-75" >Tax (GST)</span>
                                <span class="text-white fw-medium" id="gst"></span>
                            </div>
                        </div>
                        
                        <div class="mt-4 pt-3 border-top border-white border-opacity-50 border-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fs-5 fw-bold text-white">Grand Total</span>
                                <span class="fs-2 fw-bolder accent-green" id="summaryTotal"></span>
                            </div>
                        </div>

                        {{-- sending order summary data to backend --}}
                        
                        <input type="hidden" name="total_quantity" id="total_quantity" value="">
                        <input type="hidden" name="total_amount" id="total_amount">
                        <input type="hidden" name="prodid" id="prodid" value="{{ $buyproduct->id }}">
                    </div>
                </div>
            
        </div>
    </form>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script type="module">
    document.addEventListener('DOMContentLoaded', function() {

        // -------------------------
        // Expiry year population
        // -------------------------
        const expiryYear = document.getElementById('expiryYear');
        if (expiryYear) {
            const currentYear = new Date().getFullYear();
            const endYear = currentYear + 50;
            for (let year = currentYear; year <= endYear; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                expiryYear.appendChild(option);
            }
        }

        // -------------------------
        // Order summary elements
        // -------------------------
        const itemNameEl = document.getElementById('itemsummary');
        const gstEl = document.getElementById('gst');
        const shippingEl = document.getElementById('Shippingprice');
        const subtotalEl = document.getElementById('summarySubtotal');
        const totalEl = document.getElementById('summaryTotal');
        const quantityEl = document.getElementById('quantity');

        const increaseBtn = document.getElementById('increaseBtn');
        const decreaseBtn = document.getElementById('decreaseBtn');

        const productName = '{{ $buyproduct->product_name }}';
        const productPrice = parseFloat({{ $buyproduct->price }});
        const productWeight = parseFloat({{ $buyproduct->weight }});

        function calculateBaseShipping() {
            if (productWeight <= 100) return 40;
            else if (productWeight <= 500) return 100;
            else return 150;
        }

        function updateSummary(qty) {
            if (itemNameEl) itemNameEl.textContent = productName;

            const subtotal = productPrice * qty;
            if (subtotalEl) subtotalEl.textContent = subtotal.toFixed(2);

            const gst = subtotal * 0.18;
            if (gstEl) gstEl.textContent = gst.toFixed(2);

            let shipping = calculateBaseShipping();
            if (qty > 10) shipping *= 1.5;
            if (shippingEl) shippingEl.textContent = shipping.toFixed(2);

            const grandTotal = subtotal + gst + shipping;
            if (totalEl) totalEl.textContent = grandTotal.toFixed(2);

            // Update payment amount displays (if present)
            ['paymentAmountCard', 'paymentAmountUpi', 'paymentAmountCod'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = `₹ ${grandTotal.toLocaleString()}`;
            });

            // update hidden summary inputs if present
            const qIn = document.getElementById('quantityInput');
            if (qIn) qIn.value = qty;
            const shipIn = document.getElementById('shippingInput');
            if (shipIn) shipIn.value = shipping.toFixed(2);
            const gstIn = document.getElementById('gstInput');
            if (gstIn) gstIn.value = gst.toFixed(2);
            const grandIn = document.getElementById('grandTotalInput');
            if (grandIn) grandIn.value = grandTotal.toFixed(2);
            const total_amount = document.getElementById('total_amount');        
            if (total_amount) total_amount.value = grandTotal.toFixed(2);     
            const total_quantity = document.getElementById('total_quantity');               
            if (total_quantity) total_quantity.value = qty;        
            const productId = document.getElementById('prodid'); 
            if (productId) productId.value ;                           
        }

        // Quantity handlers
        let quantity = 1;
        updateSummary(quantity);
        let holdInterval = null;

        function changeQuantity(delta) {
            quantity += delta;
            if (quantity < 1) quantity = 1;
            if (quantityEl) quantityEl.textContent = quantity;
            updateSummary(quantity);
        }

        if (increaseBtn) {
            increaseBtn.addEventListener('mousedown', () => {
                changeQuantity(1);
                holdInterval = setInterval(() => changeQuantity(1), 200);
            });
            increaseBtn.addEventListener('mouseup', () => clearInterval(holdInterval));
            increaseBtn.addEventListener('mouseleave', () => clearInterval(holdInterval));
        }

        if (decreaseBtn) {
            decreaseBtn.addEventListener('mousedown', () => {
                changeQuantity(-1);
                holdInterval = setInterval(() => changeQuantity(-1), 200);
            });
            decreaseBtn.addEventListener('mouseup', () => clearInterval(holdInterval));
            decreaseBtn.addEventListener('mouseleave', () => clearInterval(holdInterval));
        }

        // initial payment amount display
        const paymentAmountCard = document.getElementById('paymentAmountCard');
        if (paymentAmountCard) {
            const displayedTotal = document.getElementById('summaryTotal')?.textContent || '0';
            paymentAmountCard.textContent = displayedTotal ? `₹ ${displayedTotal}` : paymentAmountCard.textContent;
        }

        // -------------------------
        // Steps & navigation
        // -------------------------
        let currentStep = 1;
        const addressStepDiv = document.getElementById('step-1-content');
        const paymentSections = {
            card: document.getElementById('card-content'),
            upi: document.getElementById('upi-content'),
            cod: document.getElementById('cod-content')
        };

        const stepSubtitles = {
            1: '1. Enter Delivery Address',
            2: '2. Complete Payment Details',
            3: '3. Order Confirmation'
        };

        const updateIndicators = () => {
            const subtitleEl = document.getElementById('step-subtitle');
            if (subtitleEl) subtitleEl.textContent = stepSubtitles[currentStep];
            for (let i = 1; i <= 3; i++) {
                const indicator = document.getElementById(`step-indicator-${i}`);
                if (indicator) {
                    indicator.classList.toggle('step-active', i <= currentStep);
                    indicator.classList.toggle('step-inactive', i > currentStep);
                }
            }
            const l12 = document.getElementById('line-1-2');
            const l23 = document.getElementById('line-2-3');
            if (l12) l12.classList.toggle('active', currentStep >= 2);
            if (l23) l23.classList.toggle('active', currentStep >= 3);
        };

        const hideAllContent = () => {
            document.querySelectorAll('.step-content').forEach(el => el.classList.add('d-none'));
        };

        const goToPaymentStep = () => {
            const selectedRadio = document.querySelector('input[name="paymentType"]:checked');
            const method = selectedRadio ? selectedRadio.value : 'card';
            const targetDiv = paymentSections[method];

            hideAllContent();
            if (addressStepDiv) addressStepDiv.classList.add('d-none');
            if (targetDiv) targetDiv.classList.remove('d-none');

            currentStep = 2;
            updateIndicators();
            document.querySelector('.checkout-panel')?.scrollIntoView({ behavior: 'smooth' });
        };

        const goToAddressStep = () => {
            hideAllContent();
            if (addressStepDiv) addressStepDiv.classList.remove('d-none');
            const orderSummaryDiv = document.querySelector('.ordersummarycol');
            if (orderSummaryDiv) {
                orderSummaryDiv.classList.remove('d-none');
                orderSummaryDiv.style.display = 'block';
            }
            currentStep = 1;
            updateIndicators();
            document.querySelector('.checkout-panel')?.scrollIntoView({ behavior: 'smooth' });
        };

        const orderSummary = () => {
            const orderSummaryDiv = document.querySelector('.ordersummarycol');
            if (orderSummaryDiv) orderSummaryDiv.style.display = 'none';
        };

        // back-to-address buttons
        document.querySelectorAll('.btn-back-to-address').forEach(button => {
            button.addEventListener('click', goToAddressStep);
        });

        // payment buttons -> step 3
        const step3Transition = () => {
            hideAllContent();
            const step3 = document.getElementById('step-3-content');
            if (step3) step3.classList.remove('d-none');
            currentStep = 3;
            updateIndicators();
            document.querySelector('.checkout-panel')?.scrollIntoView({ behavior: 'smooth' });
        };
        const codBtn = document.getElementById('confirmCodBtn');
        if (codBtn) codBtn.addEventListener('click', step3Transition);


        // -------------------------
        // Validation + Continue / Confirm handling
        // -------------------------
        // single references, no redeclarations
        const continueButton = document.getElementById('continueBtn');
        const confirmButton = document.querySelector('button[type="submit"].btn-light.text-white');

        // hide confirm initially (if present)
        if (confirmButton) confirmButton.style.display = 'none';

        function validateStep1() {
            const requiredFields = [
                { id: 'fullName', label: 'Full Name' },
                { id: 'email', label: 'Email Address' },
                { id: 'phoneNumber', label: 'Contact Number' },
                { id: 'address', label: 'Address Line 1' },
                { id: 'city', label: 'City' },
                { id: 'state', label: 'State / Province' },
                { id: 'zip', label: 'Zip / Postal Code' }
            ];

            let isValid = true;
            const messages = [];

            requiredFields.forEach(f => {
                const el = document.getElementById(f.id);
                if (!el || el.value.trim() === '') {
                    isValid = false;
                    messages.push(`${f.label} cannot be empty.`);
                    if (el) el.classList.add('is-invalid');
                } else {
                    el.classList.remove('is-invalid');
                }
            });

            const selectedPayment = document.querySelector('input[name="paymentType"]:checked');
            if (!selectedPayment) {
                isValid = false;
                messages.push('Please select a payment method.');
            }

            if (!isValid) {
                alert('Please fill all the input fields :\n\n' + messages.join('\n'));
                return null;
            }

            // return collected data object
            return {
                fullName: document.getElementById('fullName').value.trim(),
                email: document.getElementById('email').value.trim(),
                contactNumber: document.getElementById('phoneNumber').value.trim(),
                address: document.getElementById('address').value.trim(),
                address2: document.getElementById('address2')?.value.trim() || '',
                city: document.getElementById('city').value.trim(),
                state: document.getElementById('state').value.trim(),
                zip: document.getElementById('zip').value.trim(),
                paymentType: selectedPayment.value,
                productQuantity: document.getElementById('total_quantity').value.trim(),
                totalAmount: document.getElementById('total_amount').value.trim(),
                product_id: document.getElementById('prodid').value.trim() || '',  //need this data but this breaks the js code
            };
        }


        // Replace previous unconditional continue handlers with validated one
        if (continueButton) {
            continueButton.addEventListener('click', function (e) {
                // run validation
                const data = validateStep1();
                if (data) {
                    // store for use by confirm
                    window.checkoutData = data;

                    // perform existing behaviors: hide order summary and go to payment step
                    orderSummary();
                    goToPaymentStep();

                    // show Confirm button so user can finalize
                    if (confirmButton) {
                        confirmButton.style.display = 'inline-block';
                        // optional: add small visual cue
                        confirmButton.classList.add('fade-in'); // if you want to style in CSS
                    }
                }
            });
        }
//////////////////////////////////upload to backend /////////////////////////



        // Hidden form to POST to Laravel route
        const hiddenForm = document.createElement('form');
        hiddenForm.method = 'POST';
        hiddenForm.action = "{{ url('UplaceOrder/') }}";
        hiddenForm.style.display = 'none';

        // csrf
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        hiddenForm.appendChild(csrfInput);

        const hiddenFieldNames = ['fullName', 'email', 'address','contactNumber', 'address2', 'city', 'state', 'zip', 'paymentType', 
                                    'productQuantity', 'totalAmount','product_id',];
        hiddenFieldNames.forEach(name => {
            const i = document.createElement('input'); 
            i.type = 'hidden';
            i.name = name;
            i.id = 'hidden_' + name;
            hiddenForm.appendChild(i);
        });

        document.body.appendChild(hiddenForm);

        //payment methode data and validation on confirm

        if (confirmButton) {
        confirmButton.addEventListener('click', function (evt) {
        evt.preventDefault();

        const data = window.checkoutData; // address data
        const selectedPayment = data ? data.paymentType : null;

        if (!data) {
            alert('Please complete your address details first.');
            return;
        }

        if (!selectedPayment) {
            alert('Please select a payment method.');
            return;
        }

        // -----------------------------
        // Payment validation & data
        // -----------------------------
        let paymentData = {};

        if (selectedPayment === 'card') {
            const cardNumber = document.getElementById("cardNumber").value.trim();
            const cardName = document.getElementById("cardName").value.trim();
            const expiryMonth = document.getElementById("expiryMonth").value;
            const expiryYear = document.getElementById("expiryYear").value;
            const cvv = document.getElementById("cvv").value.trim();

            const cardNumberRegex = /^[0-9]{16}$/;
            const cvvRegex = /^[0-9]{3,4}$/;

            if (!cardNumberRegex.test(cardNumber.replace(/\s+/g, ''))) {
                alert("Please enter a valid 16-digit card number.");
                return;
            }
            if (cardName.length < 3) {
                alert("Please enter the name on the card.");
                return;
            }
            if (!expiryMonth || !expiryYear) {
                alert("Please select the card expiration date.");
                return;
            }
            if (!cvvRegex.test(cvv)) {
                alert("Please enter a valid CVV.");
                return;
            }

            paymentData = {
                paymentMethod: "card",
                cardNumber,
                cardName,
                expiryMonth,
                expiryYear,
                cvv
            };
        }
        else if (selectedPayment === 'upi') {
            const upiId = document.getElementById("upiId").value.trim();            //modification here
            const upiRegex = /^[a-zA-Z0-9.\-_]{2,256}@[a-zA-Z]{2,64}$/;

            if (!upiRegex.test(upiId)) {
                alert("Please enter a valid UPI ID (e.g., yourname@bank).");
                return;
            }

            paymentData = {     
                paymentMethod: "upi",
                upiId
            };
        }
        else if (selectedPayment === 'cod') {
            paymentData = {
                paymentMethod: "cod"
            };
        }
        else {
            alert("Invalid payment method selected.");
            return;
        }


        const combinedData = { ...data, ...paymentData };

        // Fill hidden form fields
        Object.entries(combinedData).forEach(([key, value]) => {
            let input = document.getElementById('hidden_' + key);
            if (!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.id = 'hidden_' + key;
                hiddenForm.appendChild(input);
            }
            input.value = value;
        });

        // Debug check
        console.log("Submitting order:", combinedData);


        // Submit to controller
        hiddenForm.submit();
    });
}





        // if (confirmButton) {
        //     confirmButton.addEventListener('click', function (evt) {
        //         evt.preventDefault();

        //         const data = window.checkoutData;
        //         if (!data) {
        //             alert('Please validate your address and payment details before confirming.');
        //             return;
        //         }

        //         // fill hidden inputs
        //         hiddenFieldNames.forEach(k => {
        //             const el = document.getElementById('hidden_' + k);
        //             if (el) el.value = data[k] || '';
        //         });

        //         // submit to controller
        //         hiddenForm.submit();
        //     });
        // }

// CARD PAYMENT VALIDATION
// ===============================
        const payCardBtn = document.getElementById("payCardBtn");
        if (payCardBtn) {
            payCardBtn.addEventListener("click", function (e) {
                e.preventDefault(); // stop default action / navigation

                const cardNumber = document.getElementById("cardNumber").value.trim();
                const cardName = document.getElementById("cardName").value.trim();
                const expiryMonth = document.getElementById("expiryMonth").value;
                const expiryYear = document.getElementById("expiryYear").value;
                const cvv = document.getElementById("cvv").value.trim();

                const cardNumberRegex = /^[0-9]{16}$/;
                if (!cardNumberRegex.test(cardNumber.replace(/\s+/g, ''))) {
                    alert("Please enter a valid 16-digit card number.");
                    return;
                }

                if (cardName.length < 3) {
                    alert("Please enter the name on the card.");
                    return;
                }

                if (!expiryMonth || !expiryYear) {
                    alert("Please select the card expiration month and year.");
                    return;
                }

                const cvvRegex = /^[0-9]{3,4}$/;
                if (!cvvRegex.test(cvv)) {
                    alert("Please enter a valid CVV.");
                    return;
                }

                alert("✅ Card details validated successfully!");
                step3Transition(); // move to next step only when valid
            });
        }


    // ===============================
    // UPI PAYMENT VALIDATION
    // ===============================

        const payUpiBtn = document.getElementById("payUpiBtn");
        if (payUpiBtn) {
            payUpiBtn.addEventListener("click", function (e) {
                e.preventDefault(); // block step change until valid

                const upiId = document.getElementById("upiId").value.trim();
                const upiRegex = /^[a-zA-Z0-9.\-_]{2,256}@[a-zA-Z]{2,64}$/;
                if (!upiRegex.test(upiId)) {
                    alert("Please enter a valid UPI ID (e.g., yourname@bank).");
                    return;
                }

                alert("validating upi ...");
                step3Transition();
            });
        }


    // ===============================
    // BACK TO ADDRESS (for both)
    // ===============================
    const backButtons = document.querySelectorAll("#backToAddressBtns");
    backButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            document.getElementById("card-content")?.classList.add("d-none");
            document.getElementById("upi-content")?.classList.add("d-none");
            document.getElementById("address-content")?.classList.remove("d-none");
        });
    });

    }); 
</script>

</body>
</html>       
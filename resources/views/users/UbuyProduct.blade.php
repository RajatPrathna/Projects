<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout (Bootstrap)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-gradient: linear-gradient(135deg, #ff6b9d, #ff8a80);
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.4);
            --accent-color: #ff6b9d;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--primary-gradient); 
            color: white; 
            min-height: 100vh;
        }
        .accent-green { color: #10b981; }

        .checkout-panel {
            background: var(--glass-bg); 
            backdrop-filter: blur(15px); 
            border: 1px solid var(--glass-border); 
            border-radius: 1rem; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); 
            transition: opacity 0.5s ease-in-out; 
        }

        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.2) !important; 
            border: 1px solid rgba(255, 255, 255, 0.4) !important;
            color: white !important; 
            border-radius: 0.5rem !important;
            padding: 0.75rem !important;
            transition: all 0.3s ease;
        }
        .form-control::placeholder { color: rgba(255, 255, 255, 0.7); }

        .form-control:focus, .form-select:focus {
             outline: none;
             box-shadow: 0 0 0 0.25rem rgba(255, 107, 157, 0.4); 
             border-color: #ff6b9d !important; 
        }

        /* Primary Button: Using Accent Gradient */
        .btn-primary-checkout {
            background: var(--accent-gradient) !important;
            color: white !important;
            font-weight: 600 !important; 
            padding: 0.75rem 1.5rem !important;
            border-radius: 1rem !important; 
            transition: opacity 0.3s ease;
            width: 100%;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-primary-checkout:hover:not(:disabled) {
            opacity: 0.9;
        }
        .btn-primary-checkout:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Stepper/Progress Indicator */
        .step-indicator {
            height: 40px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .step-active { 
            background: var(--accent-gradient); 
            border: 2px solid white;
            color: white !important;
        }
        .step-inactive { 
            background: rgba(255, 255, 255, 0.1); 
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: rgba(255, 255, 255, 0.7); 
        }

        /* Loader styles for submission */
        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Custom style for the separator line in the stepper */
        .stepper-line {
            width: 3rem;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.5);
            margin: auto 1rem;
        }

        /* --- Payment Option Specific Styles (FIXED ALIGNMENT AND HEIGHT) --- */
        .payment-option-label {
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.1) !important;
            transition: all 0.3s ease;
            position: relative;
            border-radius: 0.75rem; /* Smoother radius */
        }
        .payment-option-label:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }
        /* Highlight the div when the nested radio button is checked */
        .form-check-input:checked + .form-check-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 0.75rem;
            border: 2px solid var(--accent-color); /* Pink border when selected */
            z-index: 1; /* Place border below content */
        }
        .form-check-input {
            z-index: 2; /* Ensure input is clickable */
        }
        /* End of Payment Option Fixes */
    </style>
</head>
<body>

    <!-- Main Container: Bootstrap's fluid container with responsive padding -->
    <div class="container p-3 p-md-5 my-3 my-lg-5">

        <!-- Header -->
        <header class="text-center mb-5">
            <h1 class="display-5 fw-bold text-white tracking-tight" id="main-header">Secure Checkout</h1>
            <p class="lead text-white opacity-75" id="step-subtitle">1. Enter Delivery Address</p>
        </header>

        <!-- Stepper Indicator (Hidden on extra small devices, visible on small and up) -->
        <div class="d-none d-sm-flex justify-content-center mb-5">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div id="step-indicator-1" class="step-indicator step-active">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <span class="ms-3 fw-medium text-white">1. Address</span>
                </div>
                <div class="stepper-line"></div>
                <div class="d-flex align-items-center">
                    <div id="step-indicator-2" class="step-indicator step-inactive">
                        <i class="bi bi-credit-card-fill"></i>
                    </div>
                    <span class="ms-3 fw-medium text-white opacity-75">2. Payment</span>
                </div>
                <div class="stepper-line"></div>
                <div class="d-flex align-items-center">
                    <div id="step-indicator-3" class="step-indicator step-inactive">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <span class="ms-3 fw-medium text-white opacity-75">3. Confirm</span>
                </div>
            </div>
        </div>
        
        <!-- Main Checkout Grid: Responsive layout using Bootstrap row/col -->
        <div class="row g-5">
            
            <!-- LEFT COLUMN: Dynamic Forms (col-lg-8) -->
            <div class="col-lg-8">
                <div class="checkout-panel p-4 p-md-5 min-vh-50">
                    
                    <!--  ADDRESS & PAYMENT SELECTION === -->
                    <div id="content" class="step-content">
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Delivery Information</h2>
                        
                        <form id="addressForm">
                            <!-- Contact Info -->
                            <div class="mb-4"><label for="fullName" class="form-label">Full Name</label><input type="text" id="fullName" class="form-control"></div>
                            <div class="mb-4"><label for="email" class="form-label">Email Address</label><input type="email" id="email" class="form-control"></div>

                            <!-- Address: -->
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6"><label for="address" class="form-label">Address Line 1</label><input type="text" id="address" class="form-control" ></div>
                                <div class="col-12 col-md-6"><label for="address2" class="form-label">Address Line 2 (Optional)</label><input type="text" id="address2" class="form-control"></div>
                            </div>
                            
                            <!-- City, State, Zip: Uses 3 columns on small screens and up (col-sm-4) -->
                            <div class="row g-3 mb-5">
                                <div class="col-12 col-sm-4"><label for="city" class="form-label">City</label><input type="text" id="city" class="form-control"></div>
                                <div class="col-12 col-sm-4"><label for="state" class="form-label">State / Province</label><input type="text" id="state" class="form-control" ></div>
                                <div class="col-12 col-sm-4"><label for="zip" class="form-label">Zip / Postal Code</label><input type="text" id="zip" class="form-control"></div>
                            </div>

                            <h3 class="h5 fw-bold mb-3 border-bottom border-white border-opacity-30 pb-2">Select Payment Method</h3>
                            <div class="space-y-3 mb-4" id="paymentTypeSelection">
                                <!-- CARD Option -->
                                <div class="form-check py-3 px-4 payment-option-label d-flex align-items-center" onclick="this.querySelector('input').click()">
                                    <input class="form-check-input flex-shrink-0 me-3 mt-1" type="radio" name="paymentType" value="card" id="paymentCard" checked>
                                    <label class="form-check-label fw-medium text-white d-flex align-items-center w-100" for="paymentCard">
                                        Credit/Debit Card <i class="bi bi-credit-card-2-front ms-auto"></i>
                                    </label>
                                </div>
                                <!-- UPI Option -->
                                <div class="form-check py-3 px-4 payment-option-label d-flex align-items-center" onclick="this.querySelector('input').click()">
                                    <input class="form-check-input flex-shrink-0 me-3 mt-1" type="radio" name="paymentType" value="upi" id="paymentUpi">
                                    <label class="form-check-label fw-medium text-white d-flex align-items-center w-100" for="paymentUpi">
                                        UPI / Wallet <i class="bi bi-phone ms-auto"></i>
                                    </label>
                                </div>
                                <!-- COD Option -->
                                <div class="form-check py-3 px-4 payment-option-label d-flex align-items-center" onclick="this.querySelector('input').click()">
                                    <input class="form-check-input flex-shrink-0 me-3 mt-1" type="radio" name="paymentType" value="cod" id="paymentCod">
                                    <label class="form-check-label fw-medium text-white d-flex align-items-center w-100" for="paymentCod">
                                        Cash on Delivery (COD) <i class="bi bi-wallet2 ms-auto"></i>
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary-checkout mt-4" id="continueBtn">
                                <i class="bi bi-arrow-right-circle-fill me-2"></i> Continue
                            </button>
                        </form>
                    </div>

                    <!--  CARD PAYMENT FORM (Hidden by default) -->

                    <div id="card-content" class="step-content d-none">
                         <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Credit Card Details</h2>
                         <p class="text-white opacity-75 mb-4 d-flex align-items-center"><i class="bi bi-lock-fill me-2 text-success"></i> Secure and encrypted transaction.</p>
                         
                         <form id="cardForm">
                             <div class="mb-4">
                                 <label for="cardNumber" class="form-label">Card Number</label>
                                 <div class="position-relative">
                                     <input type="tel" id="cardNumber" class="form-control" placeholder="xxxx xxxx xxxx xxxx">
                                     <i class="bi bi-credit-card-2-front position-absolute end-0 top-50 translate-middle-y me-3 text-white opacity-75"></i>
                                 </div>
                             </div>

                             <div class="mb-4">
                                 <label for="cardName" class="form-label">Name on Card</label>
                                 <input type="text" id="cardName" class="form-control">
                             </div>

                             <div class="row g-3 mb-5">
                                 <div class="col-8">
                                     <label for="expiryMonth" class="form-label">Expiration Date</label>
                                     <div class="d-flex gap-2">
                                         <select id="expiryMonth" class="form-select flex-grow-1" required>
                                             <option value="" disabled selected>Month</option>
                                             <option value="01">01 - Jan</option><option value="02">02 - Feb</option><option value="03">03 - Mar</option>
                                             <option value="04">04 - Apr</option><option value="05">05 - May</option><option value="06">06 - Jun</option>
                                             <option value="07">07 - Jul</option><option value="08">08 - Aug</option><option value="09">09 - Sep</option>
                                             <option value="10">10 - Oct</option><option value="11">11 - Nov</option><option value="12">12 - Dec</option>
                                         </select>
                                         <select id="expiryYear" class="form-select flex-grow-1" required>
                                             <option value="" disabled selected>Year</option>
                                             <option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option>
                                             <option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option>
                                         </select>
                                     </div>
                                 </div>
                                 
                                 <div class="col-4">
                                     <label for="cvv" class="form-label">CVV</label>
                                     <input type="tel" id="cvv" class="form-control" placeholder="123" maxlength="4" required>
                                 </div>
                             </div>
                             
                             <button type="submit" class="btn btn-primary-checkout mt-3" id="payCardBtn">
                                 <i class="bi bi-wallet2 me-2"></i> Pay <span id="paymentAmountCard">₹ 1,42,190</span>
                             </button>

                             <button type="button" class="mt-3 w-100 p-3 rounded-3 text-white opacity-75 fw-medium border border-white border-opacity-50 btn btn-outline-light" onclick="showStep(1)">
                                 <i class="bi bi-arrow-left me-2"></i> Back to Address
                             </button>
                         </form>
                    </div>

                    <!--   UPI PAYMENT FORM (Hidden by default) -->

                    <div id="upi-content" class="step-content d-none">
                        <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">UPI ID / VPA Payment</h2>
                        <p class="text-white opacity-75 mb-4 d-flex align-items-center"><i class="bi bi-phone me-2 text-success"></i> Enter your Virtual Payment Address (VPA).</p>

                        <form id="upiForm">
                            <div class="mb-4">
                                <label for="upiId" class="form-label">UPI ID (VPA)</label>
                                <div class="position-relative">
                                    <input type="text" id="upiId" class="form-control" placeholder="jdoe@bankname" value="jane.doe@upi" required>
                                    <i class="bi bi-qr-code-scan position-absolute end-0 top-50 translate-middle-y me-3 text-white opacity-75"></i>
                                </div>
                                <p class="text-white opacity-50 small mt-1">Example: yourname@bank or 1234567890@upi</p>
                            </div>
                            
                            <button type="submit" class="btn btn-primary-checkout mt-3" id="payUpiBtn">
                                <i class="bi bi-check-circle-fill me-2"></i> Initiate UPI Payment for <span id="paymentAmountUpi">₹ 1,42,190</span>
                            </button>

                            <button type="button" class="mt-3 w-100 p-3 rounded-3 text-white opacity-75 fw-medium border border-white border-opacity-50 btn btn-outline-light" onclick="showStep(1)">
                                <i class="bi bi-arrow-left me-2"></i> Back to Address
                             </button>
                        </form>
                    </div>

                    <!--  CONFIRMATION MESSAGE (Initially hidden)  -->
                    <div id="step-3-content" class="step-content d-none">
                        <div class="text-center py-5">
                            <i class="bi bi-check-circle-fill accent-green display-4 mb-4"></i>
                            <h2 class="h3 fw-bold mb-3">Order Confirmed!</h2>
                            <p class="text-white opacity-75" id="confirmationMessage">Processing your order and saving details to the database...</p>
                            <a href="#" class="mt-4 d-inline-block py-2 px-4 rounded-3 bg-white bg-opacity-10 border border-white border-opacity-50 text-white fw-medium btn btn-light text-white" style="--bs-bg-opacity: .1;">
                                View Order History
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Order Summary (col-lg-4) -->
            <div class="col-lg-4">
                <div class="checkout-panel p-4 p-md-4 sticky-top" style="top: 1rem;">
                    <h2 class="h4 fw-bold mb-4 border-bottom border-white border-opacity-30 pb-3">Order Summary</h2>
                    
                    <div id="summaryItems" class="space-y-4 mb-4">
                        <!-- Product items will be rendered here -->
                    </div>
                    
                    <!-- Subtotals -->
                    <div class="small space-y-3 pt-3 border-top border-white border-opacity-30">
                        <div class="d-flex justify-content-between">
                            <span class="text-white opacity-75">Subtotal (1 item)</span>
                            <span class="text-white fw-medium" id="summarySubtotal"></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-white opacity-75">Shipping Estimate</span>
                            <span class="text-white fw-medium" id="summaryShipping"></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-white opacity-75">Tax (GST)</span>
                            <span class="text-white fw-medium" id="summaryTax"></span>
                        </div>
                    </div>
                    
                    <!-- Grand Total -->
                    <div class="mt-4 pt-3 border-top border-white border-opacity-50 border-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-5 fw-bold text-white">Grand Total</span>
                            <span class="fs-2 fw-bolder accent-green" id="summaryTotal"></span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script type="module">
        // import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        // import { getAuth, signInAnonymously, signInWithCustomToken } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        // import { getFirestore, collection, addDoc, setLogLevel } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";


        // const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
        // const firebaseConfig = typeof __firebase_config !== 'undefined' ? JSON.parse(__firebase_config) : null;
        // const initialAuthToken = typeof __initial_auth_token !== 'undefined' ? __initial_auth_token : null;

        // let db;
        // let auth;
        // let userId = 'loading'; 
        // let orderData = {}; 
        
    </script>
</body>
</html>





        
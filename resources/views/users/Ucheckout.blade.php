<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            min-height: 100vh;
            color: white;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .checkout-container {
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: white;
        }

        .header-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        /* Product Card Styles */
        .cart-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .product-image {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #a29bfe, #6c5ce7);
            border-radius: 12px;
            object-fit: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-name {
            font-weight: 600;
            font-size: 1.2rem;
            margin: 0 0 8px 0;
            color: white;
        }

        .product-price {
            color: #fdcb6e;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Quantity Controls */
        .quantity-controls {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 8px 12px;
            gap: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .qty-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: #fd79a8;
            transform: scale(1.1);
        }

        .qty-number {
            font-weight: 700;
            font-size: 1.1rem;
            min-width: 30px;
            text-align: center;
            color: white;
        }

        /* Order Summary */
        .order-summary {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .order-summary h2 {
            color: #fd79a8;
            margin-bottom: 24px;
            font-size: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }

        .summary-row .label {
            color: rgba(255, 255, 255, 0.7);
        }

        .summary-row .free {
            color: #2ecc71;
            font-weight: 600;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px dashed rgba(255, 255, 255, 0.3);
            font-size: 1.5rem;
            font-weight: 700;
            color: #fdcb6e;
        }

        .place-order-btn {
            width: 100%;
            background: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 24px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(253, 121, 168, 0.3);
        }

        .place-order-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(253, 121, 168, 0.5);
        }

        .place-order-btn i {
            margin-left: 8px;
        }

        /* Floating Background Elements */
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

        @media (max-width: 600px) {
            body {
                padding: 20px 15px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .product-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }

            .product-image {
                width: 80px;
                height: 80px;
            }

            .quantity-controls {
                align-self: flex-end;
            }

            .order-summary {
                padding: 24px;
            }

            .summary-row {
                font-size: 1rem;
            }

            .total-row {
                font-size: 1.3rem;
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




<div class="checkout-container">
    <form method="post" action="{{ url('/users/Ubuyproduct') }}">
        @csrf
        <div>
            <h1><i class="fas fa-shopping-bag me-2"></i>Review Your Cart</h1>
            <p class="header-text">You have 2 items in your bag</p>
        </div>

            
        @foreach($buyproduct as $item)
        <div class="product-card checkout-item" data-product-id="{{ $item->id }}" 
                                                data-qty="{{ $item->qty }}" 
                                                data-price="{{ $item->price }}">
            <div class="product-image">
                <i class="fas fa-headphones"></i>
            </div>
            <div class="product-info">
                <h3 class="product-name">{{ $item->product_name }}</h3>
                <span class="product-price">₹ {{ $item->price }}</span>
            </div>
            <div class="quantity-controls">
                <button type="button" class="qty-btn" data-action="decrease">-</button>
                <span class="qty-number" >{{ $item->qty}}</span>
                <button type="button" class="qty-btn" data-action="increase">+</button>
            </div>
        </div>
        @endforeach

        <div class="order-summary">
            <h2><i class="fas fa-receipt me-2" id="order-summary"></i>Order Summary</h2>
            <div class="summary-row">
                <span class="label">Subtotal</span>
                <span id="subtotal-price"></span>
            </div>
            <div class="summary-row">
                <span class="label">Shipping</span>
                <span class="free" id="shipping-price"></span>
            </div>
            <div class="summary-row">
                <span class="label">Estimated Tax</span>
                <span id="tax-price"></span>
            </div>
            <div class="total-row" >
                <span>Total</span>
                <span id="total-price"></span>
            </div>
            <input type="hidden" name="products" id="products">
            <button type="submit" class="place-order-btn" id="place-order-btn">
                Place Order Now <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>


<script>

document.getElementById('place-order-btn').addEventListener('click', function () {

    const products = [];

    document.querySelectorAll('.checkout-item').forEach(item => {
        products.push({
            id: item.dataset.productId,
            qty: item.dataset.qty
        });
    });

    document.getElementById('products').value = JSON.stringify(products);
});


    // Quantity controls
document.addEventListener('click', function (e) {

    const btn = e.target.closest('.qty-btn');
    const item = btn.closest('.checkout-item');
    if (!btn) return;

    const controls = btn.closest('.quantity-controls');
    const qtySpan = controls.querySelector('.qty-number');

    let qty = parseInt(qtySpan.textContent, 10) || 1;

    if (btn.dataset.action === 'increase') qty += 1;
    if (btn.dataset.action === 'decrease') qty = Math.max(1, qty - 1);

    qtySpan.textContent = qty;
    item.dataset.qty = qty; 

    calculateTotals();
});

const Subtotal = document.getElementById('subtotal-price');
const Shipping = document.getElementById('shipping-price');
const Tax = document.getElementById('tax-price');
const Total = document.getElementById('total-price');

function calculateTotals() {
    let sub_total = 0;
    let shippingPrice = 0;

    document.querySelectorAll('.checkout-item').forEach(item => {
        const price = parseFloat(item.dataset.price);
        const qty = parseInt(item.querySelector('.qty-number').textContent,10);
        sub_total += price * qty;


        if (qty < 10) {
            shippingPrice += qty * 10;
        } 
        else {
            shippingPrice += qty * 5;
        }
    });

    const tax_price = sub_total * 0.05;
    const shipping = shippingPrice;
    const total_price = sub_total + tax_price + shipping;

    Subtotal.textContent = '₹' + sub_total.toFixed(2);
    Tax.textContent = '₹' + tax_price.toFixed(2);
    Shipping.textContent = '₹' + shipping.toFixed(2);
    Total.textContent = '₹' + total_price.toFixed(2);
}

// Initialize totals on page load
document.addEventListener('DOMContentLoaded', calculateTotals);

</script>

</body>
</html>
@extends('layouts.sellerDashboard')

@section('title')
    <title>Seller Dashboard | Product Review Search</title>
@endsection

@section('style')
<style>
    header { margin-bottom: 25px; border-left: 4px solid #ffeaa7; padding-left: 15px; }

    /* Search & Filter Bar */
    .search-section {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 30px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: flex-end;
    }

    .search-box { flex: 2; min-width: 300px; }
    .filter-box { flex: 1; min-width: 150px; }

    .search-section label {
        display: block;
        font-size: 0.8rem;
        text-transform: uppercase;
        margin-bottom: 8px;
        opacity: 0.8;
        letter-spacing: 1px;
    }

    .search-section input, .search-section select {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        color: white;
        padding: 12px;
        border-radius: 8px;
    }

    /* Focused Product Header */
    .focused-product-info {
        background: var(--table-header-bg);
        padding: 20px 30px;
        border-radius: 12px;
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid var(--glass-border);
    }

    .rating-summary {
        text-align: center;
        background: rgba(255, 255, 255, 0.15);
        padding: 10px 20px;
        border-radius: 10px;
    }

    .stars-gold { color: #f1c40f; margin-top: 5px; }

    /* Review Cards */
    .review-card {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 20px;
        transition: 0.3s;
    }

    .review-card:hover { background: rgba(255, 255, 255, 0.15); }

    .review-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 15px;
    }

    .badge-verified {
        font-size: 0.7rem;
        background: rgba(46, 204, 113, 0.2);
        color: #2ecc71;
        padding: 3px 8px;
        border-radius: 4px;
        border: 1px solid #2ecc71;
    }
</style>
@endsection

@section('content')
    <header>
        <h1><i class="fas fa-search"></i> Review Lookup</h1>
        <p>Search for a product to see how customers are rating it.</p>
    </header>

    <div class="search-section">
        <div class="search-box">
            <label><i class="fas fa-box"></i> Search Product Name or SKU</label>
            <input type="text" placeholder="e.g. Wireless Headphones...">
        </div>
        
        <div class="filter-box">
            <label><i class="fas fa-filter"></i> Sort Reviews</label>
            <select>
                <option>Newest First</option>
                <option>Oldest First</option>
                <option>Highest Rating</option>
                <option>Lowest Rating</option>
            </select>
        </div>

        <button style="padding: 12px 25px; background: var(--accent-gradient); border: none; font-weight: bold; cursor: pointer;">
            Search
        </button>
    </div>

    <div class="focused-product-info">
        <div>
            <h2 style="margin:0;">Wireless Bluetooth Headphones</h2>
            <p style="margin:0; opacity: 0.8;">Showing 14 reviews for this product</p>
        </div>
        <div class="rating-summary">
            <div style="font-size: 1.5rem; font-weight: bold;">4.8 / 5.0</div>
            <div class="stars-gold">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
            </div>
        </div>
    </div>

    <div class="reviews-feed">
        
        <div class="review-card">
            <div class="review-header">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:40px; height:40px; background:#ffeaa7; color:#333; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">AM</div>
                    <div>
                        <strong>Andrew Miller</strong> 
                        <span class="badge-verified">Verified Buyer</span>
                    </div>
                </div>
                <div style="text-align:right;">
                    <div class="stars-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <small style="opacity:0.6;">3 days ago</small>
                </div>
            </div>
            <div class="review-body">
                <p style="line-height: 1.6;">"The noise cancelling is incredible. I use these in the gym and they stay perfectly in place even during heavy runs. Fast shipping too!"</p>
            </div>
        </div>

        <div class="review-card">
            <div class="review-header">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:40px; height:40px; background:#fab1a0; color:#333; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">CL</div>
                    <div>
                        <strong>Cindy Lou</strong> 
                        <span class="badge-verified">Verified Buyer</span>
                    </div>
                </div>
                <div style="text-align:right;">
                    <div class="stars-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                    <small style="opacity:0.6;">1 week ago</small>
                </div>
            </div>
            <div class="review-body">
                <p style="line-height: 1.6;">"Audio is crisp and clear. The only reason for 4 stars is that the charging cable included was a bit short."</p>
            </div>
        </div>

    </div>
@endsection
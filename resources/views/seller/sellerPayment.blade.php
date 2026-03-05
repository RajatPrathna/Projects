@extends('layouts.sellerDashboard')

@section('title')
    <title>Seller Dashboard | Payments & Earnings</title>
@endsection

@section('style')
<style>
    header { margin-bottom: 25px; border-left: 4px solid #ffeaa7; padding-left: 15px; }

    /* Income Summary Grid */
    .income-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 35px;
    }

    .income-card {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        padding: 25px;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .income-card.annual {
        background: linear-gradient(135deg, rgba(9, 132, 227, 0.2) 0%, rgba(0, 206, 201, 0.2) 100%);
        border: 1px solid #ffeaa7;
    }

    .income-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
        margin-bottom: 10px;
    }

    .income-amount {
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .income-trend {
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .trend-up { color: #f7f7f7; }

    /* Earnings Table */
    .table-wrapper {
        width: 100%;
        border-radius: 12px;
        border: 1px solid var(--glass-border);
        background: rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .earnings-table {
        width: 100%;
        border-collapse: collapse;
    }

    .earnings-table th {
        background: var(--table-header-bg);
        padding: 18px;
        text-align: left;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .earnings-table td {
        padding: 18px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .price-tag {
        font-weight: bold;
        color: #ffeaa7;
    }

    /* THE BRIGHT COLOR FIXES */
    .fee-highlight {
        color: #fcfbfb; /* Bright Pastel Coral - highly visible */
        font-weight: 600;
    }

    .income-highlight {
        color: #a2ffd5; /* Bright Electric Mint - highly visible */
        font-weight: 800;
    }

    .payout-btn {
        background: var(--accent-gradient);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .payout-btn:hover {
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(0, 206, 201, 0.4);
    }
</style>
@endsection

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <header style="margin: 0;">
            <h1><i class="fas fa-wallet"></i> Payments & Income</h1>
            <p>Track your earnings and manage your payouts</p>
        </header>
        <button class="payout-btn"><i class="fas fa-hand-holding-usd"></i> Withdraw Earnings</button>
    </div>

    <div class="income-overview">
        <div class="income-card">
            <div class="income-label">Current Balance</div>
            <div class="income-amount">$1,240.50</div>
            <div class="income-trend" style="opacity: 0.7;">Available for withdrawal</div>
        </div>

        <div class="income-card">
            <div class="income-label">Monthly Income (Oct)</div>
            <div class="income-amount">$4,850.00</div>
            <div class="income-trend trend-up">
                <i class="fas fa-arrow-up"></i> 12% increase from last month
            </div>
        </div>

        <div class="income-card annual">
            <div class="income-label">Annual Income (2023)</div>
            <div class="income-amount">$52,400.00</div>
            <div class="income-trend" style="color: #ffeaa7;">
                <i class="fas fa-trophy"></i> Top 5% Seller Achievement
            </div>
        </div>
    </div>

    <h2 style="margin-bottom: 20px;"><i class="fas fa-list-ul"></i> Product Wise Income</h2>

    <div class="table-wrapper">
        <table class="earnings-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Units Sold</th>
                    <th>Total Revenue</th>
                    <th>Platform Fee (5%)</th>
                    <th>Net Income</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 35px; height: 35px; background: white; border-radius: 5px;"></div>
                            <strong>Wireless Headphones</strong>
                        </div>
                    </td>
                    <td class="price-tag">$100.00</td>
                    <td>15</td>
                    <td>$1,500.00</td>
                    <td class="fee-highlight">-$75.00</td>
                    <td class="income-highlight">$1,425.00</td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 35px; height: 35px; background: white; border-radius: 5px;"></div>
                            <strong>Mechanical Keyboard</strong>
                        </div>
                    </td>
                    <td class="price-tag">$150.00</td>
                    <td>10</td>
                    <td>$1,500.00</td>
                    <td class="fee-highlight">-$75.00</td>
                    <td class="income-highlight">$1,425.00</td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 35px; height: 35px; background: white; border-radius: 5px;"></div>
                            <strong>Gaming Mouse</strong>
                        </div>
                    </td>
                    <td class="price-tag">$50.00</td>
                    <td>20</td>
                    <td>$1,000.00</td>
                    <td class="fee-highlight">-$50.00</td>
                    <td class="income-highlight">$950.00</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
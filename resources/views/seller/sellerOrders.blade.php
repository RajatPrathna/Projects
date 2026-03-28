@extends('layouts.sellerDashboard')

@section('title')
    <title>Seller Dashboard | Orders Management</title>
@endsection

@section('style')
<style>
    header { margin-bottom: 30px; border-left: 4px solid #ffeaa7; padding-left: 15px; }

    /* Order Filter Navigation */
    .order-filters {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        overflow-x: auto;
        padding-bottom: 10px;
    }

    .filter-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: 0.3s;
        white-space: nowrap;
    }

    .filter-btn:hover, .filter-btn.active {
        background: var(--accent-gradient);
        border-color: transparent;
        box-shadow: 0 4px 15px rgba(0, 206, 201, 0.3);
    }

    /* Table Adjustments */
    .table-wrapper {
        width: 100%;
        border-radius: 12px;
        border: 1px solid var(--glass-border);
        background: rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .seller-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px; /* Ensures table doesn't squash too much */
    }

    .seller-table th {
        background: var(--table-header-bg);
        padding: 18px 15px;
        text-align: left;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .seller-table td {
        padding: 18px 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Status Tags */
    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: bold;
        text-transform: uppercase;
    }
    .bg-shipped { background: #3498db; color: white; }
    .bg-delivered { background: #2ecc71; color: white; }
    .bg-returned { background: #e74c3c; color: white; }
    .bg-processing { background: #f39c12; color: white; }

    /* Tracking Number Styling */
    .tracking-code {
        font-family: 'Courier New', monospace;
        background: rgba(255, 255, 255, 0.1);
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 0.85rem;
    }

    .customer-info small {
        display: block;
        opacity: 0.6;
        font-size: 0.75rem;
    }
</style>
@endsection

@section('content')
    <header>
        <h1><i class="fas fa-shipping-fast"></i> Order Shipments</h1>
        <p>Track and manage your outbound orders and returns</p>
    </header>

    <div class="order-filters">
        <button class="filter-btn active">All Orders</button>
        <button class="filter-btn">In Processing</button>
        <button class="filter-btn">Shipped</button>
        <button class="filter-btn">Delivered</button>
        <button class="filter-btn">Returned/Disputed</button>
    </div>

    <div class="table-wrapper">
        <table class="seller-table">
            <thead>
                <tr>
                    <th>Order & Date</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Tracking No.</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    @foreach($product->orders as $order)
                        <tr>
                            <td>
                                <strong>Order Id:{{ $order->id }}</strong> <br>
                                <strong>Product Id: {{ $order->product_id }}</strong>
                                <small style="display:block; opacity: 0.6;">{{ $order->order_date->format('M j, Y') }}</small>
                            </td>
                            <td class="customer-info">
                                {{ $order->fullname}}
                                <small>{{ $order->address}}</small>
                            </td>
                            <td>{{ $order->quantity}} item(s)</td>
                            <td><span class="tracking-code">TRK9400122</span></td>
                            <td>₹{{ number_format($order->totalAmount, 2) }}</td>
                            <td><span class="badge bg-shipped">{{ $order->status }}</span></td>
                            <td>
                                <button title="View Details"><i class="fas fa-eye"></i></button>
                                <button title="Print Label"><i class="fas fa-print"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach 
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.sellerDashboard')

@section('title')
    <title>Seller Dashboard | My Products</title>
@endsection

@section('style')
<style>
    /* Header with Action Button */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-left: 4px solid #ffeaa7;
        padding-left: 15px;
    }

    .btn-add {
        background: rgba(63, 229, 241, 0.864);
        color: rgb(255, 255, 255);
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 10px;
        border: none;
        transition: transform 0.2s;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 184, 148, 0.4);
    }

    /* Product Table Styling */
    .table-wrapper {
        width: 100%;
        border-radius: 12px;
        border: 1px solid var(--glass-border);
        overflow: hidden;
        background: rgba(0, 0, 0, 0.05);
    }

    .seller-table {
        width: 100%;
        border-collapse: collapse;
    }

    .seller-table th {
        background: var(--table-header-bg);
        padding: 18px;
        text-align: left;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .seller-table td {
        padding: 18px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        vertical-align: middle;
    }

    /* Stock Indicators */
    .stock-badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: bold;
    }
    .in-stock { background: rgba(2, 90, 38, 0.2); color: #2ecc71; border: 1px solid #2ecc71; }
    .low-stock { background: rgba(180, 112, 3, 0.2); color: #f39c12; border: 1px solid #f39c12; }
    .out-stock { background: rgba(192, 44, 27, 0.2); color: #e74c3c; border: 1px solid #e74c3c; }

    .action-btns {
        display: flex;
        gap: 10px;
    }

    .btn-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        color: white;
        transition: 0.3s;
    }
    .edit-btn { background: rgba(52, 152, 219, 0.2); border: 1px solid #3498db; color: #3498db; }
    .delete-btn { background: rgba(231, 76, 60, 0.2); border: 1px solid #e74c3c; color: #e74c3c; }
    
    .edit-btn:hover { background: #3498db; color: white; }
    .delete-btn:hover { background: #e74c3c; color: white; }

</style>
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h1><i class="fas fa-box"></i> My Products</h1>
            <p>You have <strong>24 active products</strong> in your shop.</p>
        </div>
        <a href="/seller/selleraddProduct" class="btn-add">
            <i class="fas fa-plus"></i> Add New Product
        </a>
    </div>

    <div class="table-wrapper">
        <table class="seller-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Sales</th>
                    <th>Actions</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <div class="product-cell">
                                    @if($product->images && $product->images->count())
                                            <img src="{{ asset('storage/' . optional($product->images->first())->image) }}" 
                                            alt="{{ $product->product_name }}" width="50">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}" 
                                            alt="No Image" width="50">
                                    @endif
                                    
                                </div>
                                    <div>
                                        <p style="font-size: 0.75rem; opacity: 0.6;">ID: {{ $product->id }}</p>
                                    </div>
                            </td>   
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="stock-badge in-stock">
                                    {{ $product->stock }} In Stock
                                </span>
                            </td>
                            <td>{{ $product->orders->sum('quantity')}}</td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{url('seller/sellerEditProduct', $product->id)}}" class="btn-icon edit-btn"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('seller/sellerDeleteProduct', $product->id)}}" class="btn-icon delete-btn"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">
                                No products found. Start adding your products now!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
        </table>
    </div>
@endsection
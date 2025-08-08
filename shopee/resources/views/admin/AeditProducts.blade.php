<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #8B5FBF 0%, #6366F1 50%, #8B5FBF 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Floating spheres animation */
        .sphere {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            animation: float 20s infinite linear;
            z-index: 0;
        }

        .sphere:nth-child(1) {
            width: 80px;
            height: 80px;
            left: 10%;
            animation-delay: 0s;
            animation-duration: 25s;
        }

        .sphere:nth-child(2) {
            width: 120px;
            height: 120px;
            left: 20%;
            animation-delay: 5s;
            animation-duration: 30s;
        }

        .sphere:nth-child(3) {
            width: 60px;
            height: 60px;
            left: 70%;
            animation-delay: 10s;
            animation-duration: 20s;
        }

        .sphere:nth-child(4) {
            width: 100px;
            height: 100px;
            left: 80%;
            animation-delay: 15s;
            animation-duration: 35s;
        }

        .sphere:nth-child(5) {
            width: 90px;
            height: 90px;
            left: 50%;
            animation-delay: 8s;
            animation-duration: 28s;
        }

        .sphere:nth-child(6) {
            width: 70px;
            height: 70px;
            left: 30%;
            animation-delay: 12s;
            animation-duration: 22s;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .container {
            position: relative;
            z-index: 10;
        }
        
        .product-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }
        
        .card-header {
            background: white;
            color: #4B5563;
            padding: 2rem;
            border: none;
            border-bottom: 1px solid #f3f4f6;
        }

        .card-header h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #374151;
        }
        
        .form-label {
            font-weight: 600;
            color: #6B7280;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #E5E7EB;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #8B5FBF;
            box-shadow: 0 0 0 0.2rem rgba(139, 95, 191, 0.15);
        }
        
        .view-mode {
            background-color: #F9FAFB;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 2px solid #E5E7EB;
            color: #374151;
            font-weight: 500;
        }
        
        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-active {
            background-color: #10B981;
            color: white;
        }
        
        .status-inactive {
            background-color: #EF4444;
            color: white;
        }
        
        .status-draft {
            background-color: #F59E0B;
            color: white;
        }
        
        .btn-edit {
            background: #8B5FBF;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: #7C3AED;
            transform: translateY(-2px);
        }
        
        .btn-save {
            background: #10B981;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            background: #059669;
            transform: translateY(-2px);
        }
        
        .btn-cancel {
            background: #6B7280;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #4B5563;
            transform: translateY(-2px);
        }
        
        .field-icon {
            color: #8B5FBF;
            margin-right: 0.5rem;
        }
        
        .alert-info {
            background: rgba(139, 95, 191, 0.1);
            border: 2px solid rgba(139, 95, 191, 0.2);
            border-radius: 15px;
            color: #8B5FBF;
            font-weight: 500;
        }

        .input-group-text {
            background: #F9FAFB;
            border: 2px solid #E5E7EB;
            border-right: none;
            color: #6B7280;
            font-weight: 600;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group:focus-within .input-group-text {
            border-color: #8B5FBF;
        }

        .stats-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: #8B5FBF;
        }

        .stats-label {
            color: #9CA3AF;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <!-- Floating spheres -->
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>

    <div class="container mt-4">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="product-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Product Management</h3>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm" style="background: #EF4444; color: white; border-radius: 10px; padding: 0.5rem 1rem;">
                                <i class="fas fa-plus me-1"></i> ADD PRODUCT
                            </button>
                            <button class="btn btn-sm" style="background: #8B5FBF; color: white; border-radius: 10px; padding: 0.5rem 1rem;">
                                <i class="fas fa-chart-bar me-1"></i> ANALYTICS
                            </button>
                            <button class="btn btn-sm" style="background: #8B5FBF; color: white; border-radius: 10px; padding: 0.5rem 1rem;">
                                <i class="fas fa-cog me-1"></i> SETTINGS
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-number">247</div>
                    <div class="stats-label">Total Products</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-number">189</div>
                    <div class="stats-label">Active Products</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-number">32</div>
                    <div class="stats-label">Draft Products</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-number">26</div>
                    <div class="stats-label">Low Stock</div>
                </div>
            </div>
        </div>

        <!-- Edit Product Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="product-card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Edit Product Details</h3>
                            
                            <div id="viewButtons">
                                <button class="btn btn-edit" onclick="toggleEditMode()">
                                    <i class="fas fa-edit me-2"></i>EDIT
                                </button>
                            </div>
                            <div id="editButtons" style="display: none;">
                                <button class="btn btn-save me-2" onclick="saveProduct()">
                                    <i class="fas fa-save me-2"></i>SAVE
                                </button>
                                <button class="btn btn-cancel" onclick="cancelEdit()">
                                    <i class="fas fa-times me-2"></i>CANCEL
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Body -->
                    <div class="card-body p-4">
                        <form id="productForm">
                            <!-- Product Name -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-tag field-icon"></i>Product Name
                                </label>
                                <input type="text" class="form-control" id="productName" value="{{$products->name}}" readonly>
                                <div class="view-mode" id="nameView" style="display: none;">Premium Wireless Headphones</div>
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-list field-icon"></i>Category
                                </label>
                                <select class="form-select" id="productCategory" disabled>
                                    <option value="software">Software</option>
                                    <option value="hardware" selected>Hardware</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="accessories">Accessories</option>
                                </select>
                                <div class="view-mode" id="categoryView" style="display: none;">Hardware</div>
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-dollar-sign field-icon"></i>Price
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="productPrice" value="45.00" step="0.01" readonly>
                                </div>
                                <div class="view-mode" id="priceView" style="display: none;">$45.00</div>
                            </div>

                            <!-- Stock -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-warehouse field-icon"></i>Stock Quantity
                                </label>
                                <input type="number" class="form-control" id="productStock" value="45" min="0" readonly>
                                <div class="view-mode" id="stockView" style="display: none;">45 units</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-info-circle field-icon"></i>Status
                                </label>
                                <select class="form-select" id="productStatus" disabled>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="draft">Draft</option>
                                </select>
                                <div id="statusView" style="display: none;">
                                    <span class="status-badge status-active">ACTIVE</span>
                                </div>
                            </div>
                        </form>

                        <!-- Info Alert (shown only in edit mode) -->
                        <div class="alert alert-info" id="editAlert" style="display: none;">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> Make sure all fields are filled correctly before saving. Changes will be updated immediately.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        let isEditing = false;
        let originalData = {};

        function toggleEditMode() {
            isEditing = true;
            
            // Store original data
            originalData = {
                name: document.getElementById('productName').value,
                category: document.getElementById('productCategory').value,
                price: document.getElementById('productPrice').value,
                stock: document.getElementById('productStock').value,
                status: document.getElementById('productStatus').value
            };

            // Show/hide buttons
            document.getElementById('viewButtons').style.display = 'none';
            document.getElementById('editButtons').style.display = 'flex';
            
            // Enable form fields
            document.getElementById('productName').removeAttribute('readonly');
            document.getElementById('productCategory').removeAttribute('disabled');
            document.getElementById('productPrice').removeAttribute('readonly');
            document.getElementById('productStock').removeAttribute('readonly');
            document.getElementById('productStatus').removeAttribute('disabled');
            
            // Show inputs, hide view divs
            const inputs = ['productName', 'productCategory', 'productPrice', 'productStock', 'productStatus'];
            const views = ['nameView', 'categoryView', 'priceView', 'stockView', 'statusView'];
            
            inputs.forEach(id => {
                const element = document.getElementById(id);
                if (element.tagName === 'SELECT') {
                    element.parentElement.style.display = 'block';
                } else {
                    element.style.display = 'block';
                }
            });
            views.forEach(id => document.getElementById(id).style.display = 'none');
            
            // Show input group for price
            const inputGroup = document.querySelector('.input-group');
            if (inputGroup) {
                inputGroup.style.display = 'flex';
            }
            
            // Show alert
            document.getElementById('editAlert').style.display = 'block';
        }

        function saveProduct() {
            // Here you would typically send data to server
            const productData = {
                name: document.getElementById('productName').value,
                category: document.getElementById('productCategory').value,
                price: document.getElementById('productPrice').value,
                stock: document.getElementById('productStock').value,
                status: document.getElementById('productStatus').value
            };
            
            console.log('Saving product:', productData);
            
            // Update view displays
            updateViewMode();
            exitEditMode();
            
            // Show success message
            showSuccessMessage();
        }

        function cancelEdit() {
            // Restore original data
            document.getElementById('productName').value = originalData.name;
            document.getElementById('productCategory').value = originalData.category;
            document.getElementById('productPrice').value = originalData.price;
            document.getElementById('productStock').value = originalData.stock;
            document.getElementById('productStatus').value = originalData.status;
            
            exitEditMode();
        }

        function exitEditMode() {
            isEditing = false;
            
            // Show/hide buttons
            document.getElementById('viewButtons').style.display = 'block';
            document.getElementById('editButtons').style.display = 'none';
            
            // Disable form fields
            document.getElementById('productName').setAttribute('readonly', true);
            document.getElementById('productCategory').setAttribute('disabled', true);
            document.getElementById('productPrice').setAttribute('readonly', true);
            document.getElementById('productStock').setAttribute('readonly', true);
            document.getElementById('productStatus').setAttribute('disabled', true);
            
            updateViewMode();
            
            // Hide alert
            document.getElementById('editAlert').style.display = 'none';
        }

        function updateViewMode() {
            // Update view displays
            document.getElementById('nameView').textContent = document.getElementById('productName').value;
            document.getElementById('categoryView').textContent = document.getElementById('productCategory').value;
            document.getElementById('priceView').textContent = '$' + document.getElementById('productPrice').value;
            document.getElementById('stockView').textContent = document.getElementById('productStock').value + ' units';
            
            // Update status badge
            const status = document.getElementById('productStatus').value;
            const statusView = document.getElementById('statusView');
            const statusClasses = {
                'active': 'status-active',
                'inactive': 'status-inactive',
                'draft': 'status-draft'
            };
            
            statusView.innerHTML = `<span class="status-badge ${statusClasses[status]}">${status.toUpperCase()}</span>`;
            
            // Show view divs, hide inputs
            const inputs = ['productName', 'productCategory', 'productPrice', 'productStock', 'productStatus'];
            const views = ['nameView', 'categoryView', 'priceView', 'stockView', 'statusView'];
            
            inputs.forEach(id => {
                const element = document.getElementById(id);
                if (element.tagName === 'SELECT') {
                    element.parentElement.style.display = 'none';
                } else {
                    element.style.display = 'none';
                }
            });
            views.forEach(id => document.getElementById(id).style.display = 'block');
            
            // Hide input group for price
            const inputGroup = document.querySelector('.input-group');
            if (inputGroup) {
                inputGroup.style.display = 'none';
            }
        }

        function showSuccessMessage() {
            // Create a temporary success alert
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success position-fixed';
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; border-radius: 10px;';
            alertDiv.innerHTML = '<i class="fas fa-check-circle me-2"></i>Product updated successfully!';
            
            document.body.appendChild(alertDiv);
            
            // Remove after 3 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }

        // Initialize view mode on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateViewMode();
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Product Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .header::before {
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

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .admin-title {
            color: #333;
            font-size: 32px;
            font-weight: 700;
        }

        .admin-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            color: white;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #6c5ce7;
            margin-bottom: 8px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .products-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            color: #333;
            font-size: 24px;
            font-weight: 700;
        }

        .search-filter {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 12px 20px 12px 45px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 14px;
            width: 250px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .search-input:focus {
            outline: none;
            border-color: #6c5ce7;
            background: white;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c5ce7;
            font-size: 16px;
        }

        .filter-select {
            padding: 12px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 14px;
            background: #f8f9fa;
            cursor: pointer;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .products-table th {
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 12px;
        }

        .products-table th:first-child {
            border-radius: 12px 0 0 0;
        }

        .products-table th:last-child {
            border-radius: 0 12px 0 0;
        }

        .products-table td {
            padding: 20px 15px;
            border-bottom: 1px solid #e1e5e9;
            color: #555;
        }

        .products-table tr {
            transition: all 0.3s ease;
        }

        .products-table tr:hover {
            background: rgba(108, 92, 231, 0.05);
            transform: scale(1.01);
        }

        .product-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
        }

        .product-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .product-category {
            font-size: 12px;
            color: #666;
            background: #f1f3f4;
            padding: 4px 8px;
            border-radius: 6px;
            display: inline-block;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-active {
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: white;
        }

        .status-inactive {
            background: linear-gradient(135deg, #e17055, #fd79a8);
            color: white;
        }

        .status-draft {
            background: linear-gradient(135deg, #fdcb6e, #fd79a8);
            color: white;
        }

        .price {
            font-size: 18px;
            font-weight: 700;
            color: #6c5ce7;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 8px 12px;
            font-size: 12px;
            border-radius: 8px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            gap: 10px;
        }

        .pagination button {
            padding: 10px 15px;
            border: 2px solid #e1e5e9;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination button.active {
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            color: white;
            border-color: #6c5ce7;
        }

        .pagination button:hover:not(.active) {
            border-color: #6c5ce7;
            background: rgba(108, 92, 231, 0.1);
        }

        @media (max-width: 768px) {
            .header-top {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .admin-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .search-filter {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                width: 100%;
            }

            .products-table {
                font-size: 14px;
            }

            .products-table th,
            .products-table td {
                padding: 10px 8px;
            }
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 70%;
            right: 10%;
            animation-delay: 3s;
        }

        .floating-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 10%;
            left: 15%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.6;
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

    <div class="admin-container">
        <div class="header">
            <div class="header-top">
                <h1 class="admin-title">Product Management</h1>
                <div class="admin-actions">
                    <a href="/admin/Aaddproducts" class="btn btn-primary">
                        ➕ Add Product
                    </a>
                    <a href="#" class="btn btn-secondary">
                        📊 Analytics
                    </a>
                    <a href="#" class="btn btn-secondary">
                        ⚙️ Settings
                    </a>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">247</div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">189</div>
                <div class="stat-label">Active Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">32</div>
                <div class="stat-label">Draft Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">26</div>
                <div class="stat-label">Low Stock</div>
            </div>
        </div>

        <div class="products-section">
            <div class="section-header">
                <h2 class="section-title">Product Details</h2>
                <div class="search-filter">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Search products...">
                        <div class="search-icon">🔍</div>
                    </div>
                    <select class="filter-select">
                        <option>All Categories</option>
                        <option>Software</option>
                        <option>Hardware</option>
                        <option>Services</option>
                        <option>Analytics</option>
                    </select>
                </div>
            </div>

            <table class="products-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #6c5ce7, #a29bfe); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">💻</div>
                                <div>
                                    <div class="product-name">Cloud Management Suite</div>
                                    <div class="product-category">Software</div>
                                </div>
                            </div>
                        </td>
                        <td>Software</td>
                        <td><span class="price">$99/month</span></td>
                        <td>∞</td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-edit btn-sm">✏️ Edit</button>
                                <button class="btn btn-delete btn-sm">🗑️ Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination">
                <button>← Previous</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>Next →</button>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        const searchInput = document.querySelector('.search-input');
        const tableRows = document.querySelectorAll('.products-table tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const productName = row.querySelector('.product-name').textContent.toLowerCase();
                const category = row.cells[1].textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || category.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filter functionality
        const filterSelect = document.querySelector('.filter-select');
        
        filterSelect.addEventListener('change', function() {
            const filterValue = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const category = row.cells[1].textContent.toLowerCase();
                
                if (filterValue === 'all categories' || category === filterValue) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Action buttons functionality
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const productName = row.querySelector('.product-name').textContent;
                alert(`Edit product: ${productName}`);
            });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const productName = row.querySelector('.product-name').textContent;
                if (confirm(`Are you sure you want to delete: ${productName}?`)) {
                    row.remove();
                }
            });
        });

        // Pagination functionality
        document.querySelectorAll('.pagination button').forEach(btn => {
            btn.addEventListener('click', function() {
                if (!this.textContent.includes('Previous') && !this.textContent.includes('Next')) {
                    document.querySelector('.pagination button.active').classList.remove('active');
                    this.classList.add('active');
                }
            });
        });

        // Add hover effects to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>
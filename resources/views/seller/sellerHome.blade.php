<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard | My Sales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            /* Updated to match your Seller Signup Blue-Teal Palette */
            --primary-gradient: linear-gradient(135deg, #0984e3 0%, #00cec9 100%);
            --accent-gradient: linear-gradient(135deg, #00b894, #00cec9);
            --glass-bg: rgba(255, 255, 255, 0.12);
            --glass-border: rgba(255, 255, 255, 0.3);
            --light-text-color: #ffffff;
            --table-header-bg: linear-gradient(90deg, #0771c1, #00b0ab);
            
            /* Business Status Colors */
            --pending: #f39c12;
            --shipped: #3498db;
            --delivered: #2ecc71;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; }

        body {
            background: var(--primary-gradient);
            padding: 20px;
            min-height: 100vh;
            color: var(--light-text-color);
        }

        .dashboard-container {
            max-width: 95%;
            margin: 0 auto;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        header { margin-bottom: 30px; border-left: 4px solid #ffeaa7; padding-left: 15px; }
        header h1 { font-size: 2rem; margin-bottom: 5px; letter-spacing: -0.5px; }
        header p { opacity: 0.85; font-size: 0.95rem; }

        /* Stats Section */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: transform 0.3s ease;
        }

        .stat-box:hover { transform: translateY(-5px); background: rgba(255, 255, 255, 0.15); }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: #ffeaa7; /* Subtle contrast color */
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #0984e3;
        }

        .stat-info h3 { font-size: 0.75rem; text-transform: uppercase; opacity: 0.7; letter-spacing: 1px; }
        .stat-info p { font-size: 1.6rem; font-weight: bold; }

        /* Table Section */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.05);
            border: 1px solid var(--glass-border);
        }

        .seller-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        .seller-table th {
            background: var(--table-header-bg);
            padding: 18px 15px;
            text-align: left;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .seller-table td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            vertical-align: middle;
            background: rgba(255, 255, 255, 0.03);
        }

        .product-cell { display: flex; align-items: center; gap: 12px; }

        .dummy-img {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0984e3;
            font-weight: bold;
        }

        .status-pill {
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
        }
        .st-pending { background: var(--pending); color: #fff; }
        .st-shipped { background: var(--shipped); color: #fff; }
        .st-delivered { background: var(--delivered); color: #fff; }

        .action-select {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid var(--glass-border);
            padding: 6px 10px;
            border-radius: 6px;
            outline: none;
            cursor: pointer;
            font-size: 0.85rem;
        }
        .action-select option { color: #333; }

    </style>
</head>
<body>

    <div class="dashboard-container">
        <header>
            <h1><i class="fas fa-store"></i> Seller Dashboard</h1>
            <p>Managing orders for <strong>Your Global Store</strong></p>
        </header>

        <div class="stats-container">
            <div class="stat-box">
                <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                <div class="stat-info">
                    <h3>Today's Orders</h3>
                    <p>12</p>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon"><i class="fas fa-hand-holding-usd"></i></div>
                <div class="stat-info">
                    <h3>Pending Payout</h3>
                    <p>$1,240.50</p>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon"><i class="fas fa-box"></i></div>
                <div class="stat-info">
                    <h3>Active Shipments</h3>
                    <p>5</p>
                </div>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="seller-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Details</th>
                        <th>Customer</th>
                        <th>Net Earnings</th>
                        <th>Status</th>
                        <th>Quick Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-7721</td>
                        <td>
                            <div class="product-cell">
                                <div class="dummy-img">P1</div>
                                <div>
                                    <p style="font-weight: 600;">Wireless Headphones</p>
                                    <p style="font-size: 0.75rem; opacity: 0.7;">SKU: WH-001</p>
                                </div>
                            </div>
                        </td>
                        <td>John Doe</td>
                        <td>$89.00</td>
                        <td><span class="status-pill st-pending">Pending</span></td>
                        <td>
                            <select class="action-select">
                                <option>Update Status</option>
                                <option>Print Invoice</option>
                                <option>Contact Buyer</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-8812</td>
                        <td>
                            <div class="product-cell">
                                <div class="dummy-img">P2</div>
                                <div>
                                    <p style="font-weight: 600;">Mechanical Keyboard</p>
                                    <p style="font-size: 0.75rem; opacity: 0.7;">SKU: MK-099</p>
                                </div>
                            </div>
                        </td>
                        <td>Jane Smith</td>
                        <td>$150.00</td>
                        <td><span class="status-pill st-shipped">Shipped</span></td>
                        <td>
                            <select class="action-select">
                                <option>Update Status</option>
                                <option>Track Package</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
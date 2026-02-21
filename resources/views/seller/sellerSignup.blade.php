<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration - Partner With Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0984e3 0%, #00cec9 100%);
            min-height: 100vh;
            display: flex;
            padding: 40px 0;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            margin: auto;
            width: 100%;
            max-width: 650px; /* Widened to fit two columns */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }

        .logo-section { text-align: center; margin-bottom: 30px; }
        .logo {
            width: 50px; height: 50px;
            background: #fff;
            border-radius: 12px;
            display: inline-flex;
            align-items: center; justify-content: center;
            margin-bottom: 10px;
            color: #0984e3; font-size: 24px;
        }

        .form-section-title {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 5px;
            color: #ffeaa7;
            font-weight: bold;
        }

        .row { margin-bottom: 15px; }
        .form-group { margin-bottom: 20px; }
        
        label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 13px; }

        input, textarea {
            width: 100%; padding: 12px 15px 12px 45px;
            border: 2px solid transparent;
            border-radius: 10px; font-size: 15px;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            transition: 0.3s;
        }

        textarea { padding-left: 15px; height: 80px; resize: none; }

        input:focus { outline: none; border-color: #ffeaa7; box-shadow: 0 0 10px rgba(255, 234, 167, 0.3); }

        .input-container { position: relative; }
        .input-icon { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #0984e3; }

        .signup-btn {
            width: 100%;
            background: #ffeaa7;
            color: #2d3436; padding: 16px; border: none; border-radius: 12px;
            font-size: 17px; font-weight: 700; cursor: pointer;
            text-transform: uppercase; margin-top: 20px;
        }

        .signup-btn:hover { background: #fff; transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="signup-container">
        <div class="logo-section">
            <div class="logo"><i class="fas fa-store"></i></div>
            <h1>Seller Registration</h1>
            <p>Enter your details to start your business journey</p>
        </div>

        <form action="{{ url('Ssignup') }}" method="POST">
            @csrf
            
            <div class="form-section-title">Personal & Account Info</div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Full Name</label>
                    <div class="input-container">
                        <input type="text" name="name" placeholder="e.g. John Doe" required>
                        <i class="input-icon fas fa-user"></i>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Professional Email (Gmail)</label>
                    <div class="input-container">
                        <input type="email" name="email" placeholder="john@example.com" required>
                        <i class="input-icon fas fa-envelope"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Phone Number</label>
                    <div class="input-container">
                        <input type="text" name="phone" placeholder="+1 234 567 890" required>
                        <i class="input-icon fas fa-phone"></i>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Password</label>
                    <div class="input-container">
                        <input type="password" name="password" placeholder="••••••••" required>
                        <i class="input-icon fas fa-lock"></i>
                    </div>
                </div>
            </div>

            <div class="form-section-title">Business & Location</div>
            <div class="form-group">
                <label>Shop Name</label>
                <div class="input-container">
                    <input type="text" name="shop_name" placeholder="e.g. Elite Electronics" required>
                    <i class="input-icon fas fa-shopping-cart"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Complete Business Address</label>
                <textarea name="address" placeholder="Building number, Street, City, State, Zip Code..." required></textarea>
            </div>

            <button type="submit" class="signup-btn">Register as Seller</button>
        </form>

        <div style="text-align: center; margin-top: 25px; font-size: 14px;">
            Already have a seller account? <a href="{{ url('seller/sellersLogin') }}" style="color: #ffeaa7; font-weight: bold;">Login here</a>
        </div>
    </div>

</body>
</html>
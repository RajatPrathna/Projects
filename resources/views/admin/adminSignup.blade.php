<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Join Us Today</title>
    <!-- Adding Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

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
            display: flex;
        }

        .alert {
            position: fixed;
            width: 100%;
            height: 5%;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            margin: auto;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 
                        0 0 40px rgba(108, 92, 231, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .signup-container:hover {
            transform: translateY(-8px); /* Lifts the container */
            /* Shadow becomes more pronounced */
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.35), 
                        0 0 60px rgba(108, 92, 231, 0.9);
        }

        .signup-container::before {
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

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .logo::after {
            content: '✨';
            font-size: 24px;
            color: white;
        }

        h1 {
            color: white; /* Changed for contrast */
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.9); /* Changed for contrast */
            font-size: 16px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        label {
            display: block;
            color: white; /* Changed for contrast */
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-container {
            position: relative;
        }

        input[type="email"], input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input[type="email"]:focus, input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #6c5ce7;
            background: white;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c5ce7;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        input:focus + .input-icon {
            color: #6c5ce7;
            transform: translateY(-50%) scale(1.1);
        }
        
        .signup-btn {
            width: 100%;
            background: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .signup-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .signup-btn:hover::before {
            left: 100%;
        }

        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(253, 121, 168, 0.3);
        }

        .signup-btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
            color: rgba(255, 255, 255, 0.7); /* Changed for contrast */
            font-size: 14px;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.3); /* Lighter line */
        }

        .divider span {
            background: rgba(108, 92, 231, 0.6); /* Slightly darker hue to blend with body gradient */
            padding: 0 20px;
            position: relative;
            border-radius: 5px;
        }

        .login-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.9); /* Changed for contrast */
            font-size: 14px;
        }

        .login-link a {
            color: #fd79a8; /* Keeping a bright accent color */
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #fdcb6e;
            text-decoration: underline;
        }

        .features {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.3); /* Lighter border */
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.8); /* Changed for contrast */
            font-size: 14px;
        }

        .feature-item::before {
            content: '✓';
            color: #fdcb6e; /* Using a vibrant highlight color */
            font-weight: bold;
            margin-right: 10px;
            width: 16px;
        }

        @media (max-width: 480px) {
            .signup-container {
                padding: 30px 25px;
                margin: 10px;
            }
            
            h1 {
                font-size: 24px;
            }
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
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
    </style>
</head>
<body>
    @if ($errors->has('login_email'))
    <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color:#d0ebff; color:#084298;">
        <i class="fas fa-info-circle me-2"></i>{{ $errors->first('login_email') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>
    <div class="signup-container">
        <div class="logo-section">
            <div class="logo"></div>
            <h1>Welcome! <br> Admin</h1>
            <p class="subtitle">Create your account to get started</p>
        </div>

        <form id="adminsignupForm" method="post" action="{{url('admin/adminSignup')}}">
            @csrf
            <div class="form-group">
                <label for="gmail">Email Address</label>
                <div class="input-container">
                    <input type="email" id="gmail" name="gmail" placeholder="Enter your email address" required>
                    <i class="input-icon fas fa-envelope"></i>
                </div>
            </div>

            <!-- Password Input Field - Structured for icon -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-container">
                    <!-- Note: Changed type to 'password' for security -->
                    <input type="password" id="password" name="password" placeholder="Choose a secure password" required> 
                    <i class="input-icon fas fa-lock"></i>
                </div>
            </div>

            <button type="submit" name="signup" class="signup-btn">
                Sign Up Now
            </button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="login-link">
            Already have an account? <a href="{{url('admin/adminLogin')}}">Log In</a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enhanced focus effects (Updated to use ID selectors)
        const emailInput = document.getElementById('gmail');
        const passwordInput = document.getElementById('password');

        if (emailInput) {
             emailInput.addEventListener('focus', function() {
                this.closest('.input-container').style.transform = 'scale(1.01)';
            });

            emailInput.addEventListener('blur', function() {
                this.closest('.input-container').style.transform = 'scale(1)';
            });
        }
        
        if (passwordInput) {
            passwordInput.addEventListener('focus', function() {
                this.closest('.input-container').style.transform = 'scale(1.01)';
            });

            passwordInput.addEventListener('blur', function() {
                this.closest('.input-container').style.transform = 'scale(1)';
            });
        }

        // error alert fade out
        
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 3000);
    </script>
</body>
</html>

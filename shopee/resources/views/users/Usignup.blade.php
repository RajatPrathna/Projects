<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Join Us Today</title>
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
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
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
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-container {
            position: relative;
        }

        input[type="email"], input[type="text"] {
        width: 100%;
        padding: 15px 20px 15px 50px;
        border: 2px solid #e1e5e9;
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #f8f9fa;
        }

        input[type="email"]:focus, input[type="text"]:focus {
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

        input[type="email"]:focus + .input-icon {
            color: #6c5ce7;
            transform: translateY(-50%) scale(1.5);
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
            color: #999;
            font-size: 14px;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
            position: relative;
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .login-link a {
            color: #6c5ce7;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #a29bfe;
            text-decoration: underline;
        }

        .features {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e1e5e9;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            color: #666;
            font-size: 14px;
        }

        .feature-item::before {
            content: '✓';
            color: #6c5ce7;
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
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="signup-container">
        <div class="logo-section">
            <div class="logo"></div>
            <h1>Welcome!</h1>
            <p class="subtitle">Create your account to get started</p>
        </div>

        <form id="signupForm" method="POST" action="users/Usignup">
            
            @csrf
            <div class="form-group">
                <label for="gmail">Gmail Address</label>
                <div class="input-container">
                    <input type="email" id="gmail" name="gmail" placeholder="Enter your Gmail address">
                    <div class="input-icon">@</div>    
                </div>
                <div class="input-container">
                    <input type="text" id="password" name="password" placeholder="Enter your password">   
                </div>
            </div>

            {{-- <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#terms">Terms of Service</a> and <a href="#privacy">Privacy Policy</a></label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="newsletter" name="newsletter">
                <label for="newsletter">Subscribe to our newsletter for updates and tips</label>
            </div> --}}

            <button type="submit" name="signup" class="signup-btn">
                Sign Up Now
            </button>
        </form>

        <div class="features">
            <div class="feature-item">Instant access to premium features</div>
            <div class="feature-item">Secure and encrypted data protection</div>
            <div class="feature-item">24/7 customer support</div>
        </div>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="login-link">
            Already have an account? <a href="users/Ulogin">Log In</a>
        </div>
    </div>

    {{-- <script>
        const form = document.getElementById('signupForm');
        const emailInput = document.getElementById('gmail');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = emailInput.value.trim();
            
            // Validate Gmail address
            if (!email.endsWith('@gmail.com')) {
                alert('Please enter a valid Gmail address ending with @gmail.com');
                emailInput.focus();
                return;
            }
            
            Success animation
            const submitBtn = document.querySelector('.signup-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Creating Account...';
            submitBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
            
            setTimeout(() => {
                submitBtn.textContent = '✓ Account Created!';
                setTimeout(() => {
                    alert(`Welcome! Account created successfully for ${email}`);
                    form.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.style.background = 'linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%)';
                }, 1000);
            }, 2000);
        });

        //Real-time email validation
        emailInput.addEventListener('input', function() {
            const email = this.value.trim();
            
            if (email && !email.endsWith('@gmail.com')) {
                this.style.borderColor = '#ff6b6b';
            } else if (email) {
                this.style.borderColor = '#51cf66';
            } else {
                this.style.borderColor = '#e1e5e9';
            }
        });

        // Enhanced focus effects
        emailInput.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });

        emailInput.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    </script> --}}
</body>
</html>
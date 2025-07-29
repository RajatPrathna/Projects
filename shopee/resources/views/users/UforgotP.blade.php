<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Reset Your Password</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --success-gradient: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }

        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            left: 80%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 70%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .forgot-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .forgot-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideInUp 0.8s ease-out;
            max-width: 450px;
            width: 100%;
            transition: all 0.3s ease;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .forgot-header {
            background: var(--secondary-gradient);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
        }

        .forgot-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .forgot-header .icon-container {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            position: relative;
            z-index: 1;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .forgot-header h2 {
            margin: 0 0 0.5rem 0;
            font-weight: 600;
            font-size: 1.8rem;
            position: relative;
            z-index: 1;
        }

        .forgot-header p {
            margin: 0;
            opacity: 0.9;
            position: relative;
            z-index: 1;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .forgot-body {
            padding: 2.5rem 2rem;
        }

        .info-alert {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1.2rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .info-alert i {
            color: #f5576c;
            margin-right: 0.5rem;
        }

        .form-floating {
            margin-bottom: 2rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.95);
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .form-floating > label {
            color: rgba(0, 0, 0, 0.6);
            font-weight: 500;
        }

        .btn-reset {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-reset::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-reset:hover::before {
            left: 100%;
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-reset:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .back-to-login {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-to-login a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-to-login a:hover {
            color: white;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
            transform: translateX(-3px);
        }

        .success-message {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid rgba(40, 167, 69, 0.3);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.95);
            text-align: center;
            display: none;
        }

        .success-message.show {
            display: block;
            animation: fadeInScale 0.5s ease-out;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .success-message i {
            color: #28a745;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .resend-timer {
            text-align: center;
            margin-top: 1rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .btn-resend {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-resend:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
        }

        .btn-resend:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        @media (max-width: 576px) {
            .forgot-card {
                margin: 10px;
            }
            
            .forgot-header {
                padding: 2rem 1.5rem;
            }
            
            .forgot-body {
                padding: 2rem 1.5rem;
            }

            .forgot-header h2 {
                font-size: 1.5rem;
            }

            .forgot-header .icon-container {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="forgot-container">
            <div class="forgot-card">
                <div class="forgot-header">
                    <div class="icon-container">
                        <i class="fas fa-key fa-2x"></i>
                    </div>
                    <h2>Forgot Password?</h2>
                    <p>Don't worry, we'll send you reset instructions</p>
                </div>
                
                <div class="forgot-body">
                    <div class="info-alert">
                        <i class="fas fa-info-circle"></i>
                        Enter your email address and we'll send you a secure link to reset your password.
                    </div>

                    <div class="success-message" id="successMessage">
                        <i class="fas fa-check-circle"></i>
                        <h5 class="mb-2">Reset Link Sent!</h5>
                        <p class="mb-0">We've sent a password reset link to your email address. Please check your inbox and spam folder.</p>
                    </div>
                    
                    <form id="forgotForm">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                            <label for="floatingEmail"><i class="fas fa-envelope me-2"></i>Email address</label>
                        </div>
                        
                        <button type="submit" class="btn btn-reset text-white w-100 mb-3" id="resetBtn">
                            <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                        </button>

                        <div class="resend-timer text-center" id="resendTimer" style="display: none;">
                            <p class="mb-2">Didn't receive the email?</p>
                            <button type="button" class="btn btn-resend" id="resendBtn" disabled>
                                Resend in <span id="countdown">60</span>s
                            </button>
                        </div>
                        
                        <div class="back-to-login">
                            <a href="#" id="backToLogin">
                                <i class="fas fa-arrow-left"></i>
                                Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forgotCard = document.querySelector('.forgot-card');
            const forgotForm = document.getElementById('forgotForm');
            const resetBtn = document.getElementById('resetBtn');
            const successMessage = document.getElementById('successMessage');
            const resendTimer = document.getElementById('resendTimer');
            const resendBtn = document.getElementById('resendBtn');
            const countdown = document.getElementById('countdown');
            const emailInput = document.getElementById('floatingEmail');
            
            let countdownInterval;
            let timeLeft = 60;
            
            // Add hover effect to forgot card
            // forgotCard.addEventListener('mouseenter', function() {
            //     this.style.transform = 'translateY(-5px)';
            //     this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15)';
            // });
            
            // forgotCard.addEventListener('mouseleave', function() {
            //     this.style.transform = 'translateY(0)';
            //     this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.1)';
            // });

            // Add focus effects to form inputs
            emailInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            emailInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });

            // Form submission handler
            forgotForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const email = emailInput.value.trim();
                
                if (!email) {
                    showError('Please enter your email address');
                    return;
                }

                if (!isValidEmail(email)) {
                    showError('Please enter a valid email address');
                    return;
                }
                
                const originalText = resetBtn.innerHTML;
                resetBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                resetBtn.disabled = true;
                
                // Simulate sending reset email
                setTimeout(() => {
                    resetBtn.innerHTML = '<i class="fas fa-check me-2"></i>Sent!';
                    resetBtn.style.background = 'var(--success-gradient)';
                    
                    setTimeout(() => {
                        successMessage.classList.add('show');
                        resetBtn.style.display = 'none';
                        resendTimer.style.display = 'block';
                        startCountdown();
                    }, 1000);
                }, 2000);
            });

            // Email validation function
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // Show error function
            function showError(message) {
                emailInput.style.borderColor = '#dc3545';
                emailInput.focus();
                
                // Remove error styling after 3 seconds
                setTimeout(() => {
                    emailInput.style.borderColor = '';
                }, 3000);
            }

            // Countdown timer function
            function startCountdown() {
                timeLeft = 60;
                countdownInterval = setInterval(() => {
                    timeLeft--;
                    countdown.textContent = timeLeft;
                    
                    if (timeLeft <= 0) {
                        clearInterval(countdownInterval);
                        resendBtn.disabled = false;
                        resendBtn.innerHTML = 'Resend Email';
                        resendBtn.style.background = 'var(--primary-gradient)';
                        resendBtn.style.border = 'none';
                        resendBtn.style.color = 'white';
                    }
                }, 1000);
            }

            // Resend button handler
            resendBtn.addEventListener('click', function() {
                if (!resendBtn.disabled) {
                    resendBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                    resendBtn.disabled = true;
                    
                    setTimeout(() => {
                        resendBtn.innerHTML = 'Resend in <span id="countdown">60</span>s';
                        resendBtn.style.background = 'transparent';
                        resendBtn.style.border = '2px solid rgba(255, 255, 255, 0.3)';
                        resendBtn.style.color = 'rgba(255, 255, 255, 0.9)';
                        
                        // Re-get countdown element after innerHTML change
                        const newCountdown = document.getElementById('countdown');
                        countdown = newCountdown;
                        startCountdown();
                    }, 1500);
                }
            });

            // Back to login handler
            document.getElementById('backToLogin').addEventListener('click', function(e) {
                e.preventDefault();
                
                // Add animation before redirect
                forgotCard.style.animation = 'slideInUp 0.5s ease-in reverse';
                
                setTimeout(() => {
                    // In a real application, this would redirect to login page
                    console.log('Redirecting to login page...');
                    window.history.back();
                }, 500);
            });

            // Auto-resize email input on mobile
            function handleResize() {
                if (window.innerWidth <= 576) {
                    emailInput.style.fontSize = '16px'; // Prevents zoom on iOS
                }
            }
            
            window.addEventListener('resize', handleResize);
            handleResize();
        });
    </script>
</body>
</html>
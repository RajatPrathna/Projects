<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Join Our Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        .bg-element {
            position: fixed;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            transition: transform 0.1s ease-out;
        }

        .bg-element-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: -5%;
        }

        .bg-element-2 {
            width: 150px;
            height: 150px;
            top: 60%;
            left: 80%;
        }

        .bg-element-3 {
            width: 300px;
            height: 300px;
            bottom: 10%;
            right: -8%;
        }

        .bg-element-4 {
            width: 120px;
            height: 120px;
            top: 30%;
            right: 15%;
        }

        .bg-element-5 {
            width: 180px;
            height: 180px;
            top: 70%;
            left: 5%;
        }

        .container {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .signup-wrapper {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 50px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.1s ease-out;
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .header-section h1 {
            background: linear-gradient(135deg, #ff6b9d, #ff8a80);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header-section p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        input, select {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            color: white;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        input:focus, select:focus {
            outline: none;
            border-color: #ff6b9d;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 20px rgba(255, 107, 157, 0.3);
            transform: translateY(-2px);
        }

        select {
            cursor: pointer;
        }

        select option {
            background: #764ba2;
            color: white;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin: 30px 0;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 12px;
            accent-color: #ff6b9d;
            transform: scale(1.2);
        }

        .checkbox-group label {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .checkbox-group a {
            color: #ff6b9d;
            text-decoration: none;
            font-weight: 500;
        }

        .checkbox-group a:hover {
            text-decoration: underline;
        }

        .signup-btn {
            width: 100%;
            background: linear-gradient(135deg, #ff6b9d, #ff8a80);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .signup-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 107, 157, 0.4);
        }

        .signup-btn:active {
            transform: translateY(-1px);
        }

        .divider {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 1;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.1);
            padding: 0 15px;
            position: relative;
            z-index: 2;
            backdrop-filter: blur(10px);
        }

        .social-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .social-btn {
            flex: 1;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 14px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        .social-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
        }

        .login-link a {
            color: #ff6b9d;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 5px;
            height: 3px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #ff4757; width: 25%; }
        .strength-medium { background: #ffa502; width: 50%; }
        .strength-good { background: #2ed573; width: 75%; }
        .strength-strong { background: #00d2d3; width: 100%; }

        /* Responsive Design */
        @media (max-width: 768px) {
            .signup-wrapper {
                padding: 30px;
                margin: 20px;
                border-radius: 20px;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .header-section h1 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px 10px;
            }

            .signup-wrapper {
                padding: 25px;
            }

            .social-buttons {
                flex-direction: column;
            }
        }

        /* Floating animation for form */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .signup-wrapper {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Animated background elements -->
    <div class="bg-element bg-element-1"></div>
    <div class="bg-element bg-element-2"></div>
    <div class="bg-element bg-element-3"></div>
    <div class="bg-element bg-element-4"></div>
    <div class="bg-element bg-element-5"></div>

    <div class="container">
        <div class="signup-wrapper">
            <div class="header-section">
                <h1>Create Account</h1>
                <p>Join thousands of users already using our platform</p>
            </div>

            <form method="POST" action="users/Udetails" id="signupForm">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="John" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Doe" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="john@example.com" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567">
                </div>

                <div class="form-group">
                    <label for="address">Address (Optional)</label>
                    <input type="text" id="address" name="address" placeholder="Your Address">
                </div>

                {{-- <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="">Select your role</option>
                        <option value="developer">Developer</option>
                        <option value="designer">Designer</option>
                        <option value="manager">Manager</option>
                        <option value="student">Student</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                    <div class="password-strength">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Repeat your password" required>
                </div> --}}

                

                <button type="submit" class="signup-btn">Save</button>
            </form>
        </div>
    </div>

    <script>
        // Parallax scrolling effect
        function handleScroll() {
            const scrollY = window.scrollY;
            const elements = document.querySelectorAll('.bg-element');
            const formWrapper = document.querySelector('.signup-wrapper');
            
            elements.forEach((element, index) => {
                const speed = 0.3 + (index * 0.1);
                const yPos = scrollY * speed;
                const xPos = Math.sin(scrollY * 0.002 + index) * 20;
                
                element.style.transform = `translate3d(${xPos}px, ${yPos}px, 0) rotate(${scrollY * 0.1}deg)`;
            });

            // Subtle form movement
            const formOffset = scrollY * 0.1;
            formWrapper.style.transform = `translateY(${formOffset}px)`;
        }

        // Mouse movement parallax
        function handleMouseMove(e) {
            const elements = document.querySelectorAll('.bg-element');
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            elements.forEach((element, index) => {
                const intensity = 20 + (index * 5);
                const x = (mouseX - 0.5) * intensity;
                const y = (mouseY - 0.5) * intensity;
                
                element.style.transform += ` translate3d(${x}px, ${y}px, 0)`;
            });
        }

        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('strengthBar');
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z\d]/.test(password)) strength++;
            
            const strengthClasses = ['strength-weak', 'strength-medium', 'strength-good', 'strength-strong'];
            strengthBar.className = `strength-bar ${strengthClasses[strength - 1] || ''}`;
        }

        // Form validation
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return false;
            }
            
            if (password.length < 8) {
                alert('Password must be at least 8 characters long!');
                return false;
            }
            
            return true;
        }

        // Event listeners
        window.addEventListener('scroll', handleScroll);
        window.addEventListener('mousemove', handleMouseMove);
        
        document.getElementById('password').addEventListener('input', (e) => {
            checkPasswordStrength(e.target.value);
        });
        handleScroll();
    </script>
</body>
</html>
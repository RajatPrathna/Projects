<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Platform</title>
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

        /* Background decorative elements */
        body::before {
            content: '';
            position: absolute;
            top: 10%;
            left: -5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: 10%;
            right: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            padding: 20px 0;
            position: relative;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 10px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .sign-in-btn {
            background: linear-gradient(135deg, #ff6b9d, #ff8a80);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .sign-in-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 157, 0.4);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 80px 0;
            color: white;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b9d, #ff8a80);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 107, 157, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 16px 32px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.1);
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            margin: 60px 20px;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .features h2 {
            text-align: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 60px;
            font-weight: 700;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            padding: 0 40px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            color: white;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff6b9d, #ff8a80);
            border-radius: 15px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .feature-card p {
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 40px 0;
            color: rgba(255, 255, 255, 0.8);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 60px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 20px;
            }

            .nav-links {
                gap: 20px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .features {
                margin: 40px 10px;
            }

            .features-grid {
                padding: 0 20px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .nav {
                padding: 15px 20px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @auth()
    <div class="container">
        <!-- Header -->
        <header class="header">
            <nav class="nav">
                <div class="logo">PenCart</div>
                <ul class="nav-links">
                    <li><a href="Uhome">Home</a></li>
                    <li><a href="Ufeatures">Features</a></li>
                    <li><a href="Uabout">About</a></li>
                    <li><a href="Ucontact">Contact</a></li>
                    <li><a href="users/Udetails">Details</a></li>
                    <li><a href="Aaddproducts">Add Products</a></li>
                    <form action="users/Ulogout" method="POST">
                    @csrf
                    <button type="submit" class="sign-in-btn">Logout</button>
                    </form>
                </ul>
                {{-- <a href="Usignup" class="sign-in-btn">Sign In</a> --}}
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <h1>Welcome to the Future</h1>
            <p>Experience the next generation of digital solutions designed to transform the way you work, connect, and achieve your goals.</p>
            <div class="cta-buttons">
                <a href="Uproducts" class="btn-primary">Get Started/products</a>
                <a href="#learn" class="btn-secondary">Learn More</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <h2>Why Choose Us</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Lightning Fast</h3>
                    <p>Experience blazing fast performance with our optimized infrastructure designed for speed and reliability.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure & Private</h3>
                    <p>Your data is protected with enterprise-grade security measures and end-to-end encryption.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💡</div>
                    <h3>Smart Solutions</h3>
                    <p>Intelligent features powered by cutting-edge technology to simplify your workflow and boost productivity.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>Global Reach</h3>
                    <p>Connect with users worldwide through our robust global network and multi-language support.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile First</h3>
                    <p>Seamless experience across all devices with our responsive design and native mobile applications.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛠️</div>
                    <h3>Easy Integration</h3>
                    <p>Integrate with your existing tools and workflows effortlessly with our comprehensive API and plugins.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2025 YourPlatform. All rights reserved. Built with passion and innovation.</p>
        </footer>
    </div>
    @else()
    <div class="container">
        <!-- Header -->
        <header class="header">
            <nav class="nav">
                <div class="logo">YourPlatform</div>
                <ul class="nav-links">
                    <li><a href="Uhome">Home</a></li>
                    <li><a href="Ufeatures">Features</a></li>
                    <li><a href="Uabout">About</a></li>
                    <li><a href="Ucontact">Contact</a></li>
                    <li><a href="users/Udetails">Details</a></li>
                     <li><a href="users/Ulogin">Login</a></li>
                </ul>
                <a href="/Usignup" class="sign-in-btn">Sign In</a>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <h1>Welcome to the Future</h1>
            <p>Experience the next generation of digital solutions designed to transform the way you work, connect, and achieve your goals.</p>
            <div class="cta-buttons">
                <a href="Uproducts" class="btn-primary">Get Started/products</a>
                <a href="#learn" class="btn-secondary">Learn More</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <h2>Why Choose Us</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Lightning Fast</h3>
                    <p>Experience blazing fast performance with our optimized infrastructure designed for speed and reliability.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure & Private</h3>
                    <p>Your data is protected with enterprise-grade security measures and end-to-end encryption.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💡</div>
                    <h3>Smart Solutions</h3>
                    <p>Intelligent features powered by cutting-edge technology to simplify your workflow and boost productivity.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>Global Reach</h3>
                    <p>Connect with users worldwide through our robust global network and multi-language support.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile First</h3>
                    <p>Seamless experience across all devices with our responsive design and native mobile applications.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛠️</div>
                    <h3>Easy Integration</h3>
                    <p>Integrate with your existing tools and workflows effortlessly with our comprehensive API and plugins.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2025 YourPlatform. All rights reserved. Built with passion and innovation.</p>
        </footer>
    </div>
    @endauth()
    
</body>
</html>
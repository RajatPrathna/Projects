<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
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
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Spheres */
        .sphere {
            position: fixed;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: float 20s infinite ease-in-out;
            z-index: 1;
        }

        .sphere:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -150px;
            left: -150px;
            animation-delay: 0s;
            animation-duration: 25s;
        }

        .sphere:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 50%;
            right: -100px;
            animation-delay: 2s;
            animation-duration: 20s;
        }

        .sphere:nth-child(3) {
            width: 150px;
            height: 150px;
            bottom: -75px;
            left: 20%;
            animation-delay: 4s;
            animation-duration: 22s;
        }

        .sphere:nth-child(4) {
            width: 250px;
            height: 250px;
            top: 20%;
            right: 15%;
            animation-delay: 1s;
            animation-duration: 28s;
        }

        .sphere:nth-child(5) {
            width: 180px;
            height: 180px;
            bottom: 20%;
            right: -90px;
            animation-delay: 3s;
            animation-duration: 24s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(30px, -30px) rotate(90deg);
            }
            50% {
                transform: translate(-20px, 20px) rotate(180deg);
            }
            75% {
                transform: translate(40px, 10px) rotate(270deg);
            }
        }

        /* Stencil Items */
        .stencil {
            position: fixed;
            color: rgba(255, 255, 255, 0.08);
            font-size: 120px;
            z-index: 1;
            animation: rotate 30s infinite linear;
        }

        .stencil:nth-child(6) {
            top: 10%;
            left: 5%;
            animation-duration: 35s;
        }

        .stencil:nth-child(7) {
            top: 60%;
            left: 70%;
            font-size: 150px;
            animation-duration: 40s;
            animation-direction: reverse;
        }

        .stencil:nth-child(8) {
            bottom: 10%;
            right: 10%;
            font-size: 100px;
            animation-duration: 45s;
        }

        .stencil:nth-child(9) {
            top: 40%;
            left: 50%;
            font-size: 90px;
            animation-duration: 38s;
            animation-direction: reverse;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        /* Delete Modal Styles - Purple Theme */
        .delete-modal .modal-content {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            background: white;
            overflow: hidden;
        }

        .delete-modal .modal-header {
            background: linear-gradient(135deg, #8B5FBF 0%, #6366F1 50%, #8B5FBF 100%);
            color: white;
            border: none;
            padding: 1.5rem 2rem;
        }

        .delete-modal .modal-title {
            font-weight: 700;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
        }

        .delete-modal .modal-title i {
            margin-right: 10px;
            font-size: 1.5rem;
            color: #FFD700;
        }

        .delete-modal .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .delete-modal .btn-close:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        .delete-modal .modal-body {
            padding: 2.5rem 2rem;
            text-align: center;
            background: #F9FAFB;
        }

        .warning-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #8B5FBF, #6366F1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: white;
            animation: pulse 2s infinite;
            box-shadow: 0 10px 30px rgba(139, 95, 191, 0.3);
        }

        @keyframes pulse {
            0% { 
                transform: scale(1);
                box-shadow: 0 10px 30px rgba(139, 95, 191, 0.3);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 15px 40px rgba(139, 95, 191, 0.4);
            }
            100% { 
                transform: scale(1);
                box-shadow: 0 10px 30px rgba(139, 95, 191, 0.3);
            }
        }

        .delete-message {
            font-size: 1.2rem;
            color: #4B5563;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .product-name-highlight {
            font-weight: 700;
            color: #8B5FBF;
            font-size: 1.3rem;
            padding: 0.5rem 1rem;
            background: rgba(139, 95, 191, 0.1);
            border-radius: 10px;
            border: 2px solid rgba(139, 95, 191, 0.2);
            display: inline-block;
            margin: 0.5rem 0;
        }

        .delete-modal .modal-footer {
            border: none;
            padding: 1rem 2rem 2rem;
            justify-content: center;
            gap: 1.5rem;
            background: white;
        }

        .btn-delete-confirm {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border: none;
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            min-width: 140px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-delete-confirm:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(239, 68, 68, 0.5);
            color: white;
            background: linear-gradient(135deg, #DC2626, #B91C1C);
        }

        .btn-cancel {
            background: linear-gradient(135deg, #8B5FBF, #6366F1);
            border: none;
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            min-width: 140px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(139, 95, 191, 0.3);
        }

        .btn-cancel:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(139, 95, 191, 0.5);
            color: white;
            background: linear-gradient(135deg, #7C3AED, #5B21B6);
        }

        .modal-backdrop {
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body>
    <!-- Animated Background Spheres -->
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>
    <div class="sphere"></div>

    <!-- Stencil Items -->
    <i class="stencil fas fa-code"></i>
    <i class="stencil fas fa-laptop-code"></i>
    <i class="stencil fas fa-database"></i>
    <i class="stencil fas fa-server"></i>

    <div class="container">
        <!-- Add your content here -->
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Parallax effect for spheres and stencils on scroll and mouse movement
        const spheres = document.querySelectorAll('.sphere');
        const stencils = document.querySelectorAll('.stencil');

        // Mouse movement effect
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;

            spheres.forEach((sphere, index) => {
                const speed = (index + 1) * 20;
                const x = (mouseX - 0.5) * speed;
                const y = (mouseY - 0.5) * speed;
                sphere.style.transform = `translate(${x}px, ${y}px)`;
            });

            stencils.forEach((stencil, index) => {
                const speed = (index + 1) * 15;
                const x = (mouseX - 0.5) * speed;
                const y = (mouseY - 0.5) * speed;
                const rotation = (mouseX - 0.5) * 20;
                stencil.style.transform = `translate(${x}px, ${y}px) rotate(${rotation}deg)`;
            });
        });

        // Scroll effect
        let lastScrollY = window.scrollY;
        
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            const scrollDiff = scrollY - lastScrollY;

            spheres.forEach((sphere, index) => {
                const currentTransform = sphere.style.transform || 'translate(0px, 0px)';
                const speed = (index + 1) * 0.5;
                const offset = scrollDiff * speed;
                
                // Extract current translate values
                const matches = currentTransform.match(/translate\(([^,]+),\s*([^)]+)\)/);
                if (matches) {
                    const currentX = parseFloat(matches[1]) || 0;
                    const currentY = parseFloat(matches[2]) || 0;
                    sphere.style.transform = `translate(${currentX}px, ${currentY + offset}px)`;
                }
            });

            stencils.forEach((stencil, index) => {
                const currentTransform = stencil.style.transform || 'translate(0px, 0px) rotate(0deg)';
                const speed = (index + 1) * 0.3;
                const offset = scrollDiff * speed;
                
                // Extract current values
                const translateMatch = currentTransform.match(/translate\(([^,]+),\s*([^)]+)\)/);
                const rotateMatch = currentTransform.match(/rotate\(([^)]+)\)/);
                
                if (translateMatch) {
                    const currentX = parseFloat(translateMatch[1]) || 0;
                    const currentY = parseFloat(translateMatch[2]) || 0;
                    const currentRotation = rotateMatch ? parseFloat(rotateMatch[1]) : 0;
                    stencil.style.transform = `translate(${currentX}px, ${currentY + offset}px) rotate(${currentRotation}deg)`;
                }
            });

            lastScrollY = scrollY;
        });
    </script>
</body>
</html>
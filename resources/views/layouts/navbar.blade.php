<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Navigation Bar</title>
    
    <style>
        .header-wrapper {
            padding: 20px 0;
            position: relative;
        }

        .nav-glass {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            margin: 0 auto; 
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white; 
        }

        .navbar-nav .nav-link {
            color: white !important; 
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 16px !important; 
            border-radius: 10px;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.15) !important;
            transform: translateY(-2px);
        }

        .sign-in-btn {
            background: linear-gradient(135deg, #ff6b9d, #ff8a80); 
            color: white;
            border: none;
            padding: 10px 20px; 
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block; 
        }

        .sign-in-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 157, 0.4);
        }
        
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid rgba(255, 255, 255, 0.7); 
            transition: border-color 0.2s ease, transform 0.2s ease;
        }
        
        /* Dropdown Menu */
        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }
        
        .dropdown-item {
            font-size: 1rem;
        }

        .dropdown-item-form {
            padding: 0;
        }

        .navbar {
            position: relative;
            z-index: 9999 !important;
        }

        .dropdown-menu {
            z-index: 99999 !important;
        }

    </style>
</head>
<body>

<div class="container header-wrapper">
    
    @auth()
        <!-- AUTHENTICATED USER NAVIGATION -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark nav-glass">
                <div class="container-fluid p-0">
                    <a class="navbar-brand logo me-auto" href="#">PenCart</a>
                    
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAuth" aria-controls="navbarNavAuth" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars text-white"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAuth">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                            
                            <!-- Main Nav Links -->
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('users/Ucart')}}"><i class="fas fa-shopping-cart me-2"></i>Cart</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('users/Uview_Orders')}}"><i class="fas fa-box me-2"></i>Orders</a></li>
                            <li class="nav-item"><a class="nav-link me-4" href="#"><i class="fas fa-question-circle me-2"></i>Help</a></li>

                            <!-- Profile Dropdown (FIX APPLIED HERE) -->
                            <li class="nav-item dropdown">
                                <a class="nav-link p-0 **dropdown-toggle**" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                    <!-- Using a reliable placeholder image URL -->
                                    <img src="https://placehold.co/40x40/667eea/ffffff?text=U" alt="ProfilePic" class="profile-pic">
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                    <!-- Links -->
                                    <li><a href="{{ url('users/Udetails') }}" class="dropdown-item text-dark"><i class="fas fa-user-circle me-2"></i>My Profile</a></li>
                                    <li><a href="{{ url('users/Ucart') }}" class="dropdown-item text-dark"><i class="fas fa-shopping-cart me-2"></i>View Cart</a></li>
                                    <li><a href="{{ url('admin/adminDashboard') }}" class="dropdown-item text-dark"><i class="fas fa-tools me-2"></i>Admin/dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    
                                    <!-- Logout Form -->
                                    <li class="dropdown-item-form">
                                        <form action="{{ url('users/Ulogout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    @else()
        <!-- GUEST USER NAVIGATION -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark nav-glass">
                <div class="container-fluid p-0">
                    <a class="navbar-brand logo me-auto" href="#">YourPlatform</a>

                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNavGuest" aria-controls="navbarNavGuest" aria-expanded="false" aria-label="Toggle navigation">
                         <i class="fas fa-bars text-white"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavGuest">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- Guest Nav Links -->
                            <li class="nav-item"><a class="nav-link" href="{{ url('Uhome') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('Ufeatures') }}">Features</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('Uabout') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('Ucontact') }}">Contact</a></li>
                        </ul>
                        
                        <!-- Sign In/Login Button -->
                        <div class="d-flex ms-auto">
                            <a href="{{ url('users/Ulogin') }}" class="sign-in-btn">
                                <i class="fas fa-sign-in-alt me-2"></i>Login / Sign Up
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    @endauth() 
</div>


</body>
</html>

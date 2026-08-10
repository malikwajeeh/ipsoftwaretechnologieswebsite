<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'IP Software Technologies - Premium Software Development Company')">
    <meta name="keywords" content="@yield('meta_keywords', 'software house, web development, laravel, php, flutter')">
    <title>@yield('title', 'IP Software Technologies')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    
    @stack('styles')
</head>
<body class="loading">
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-logo">IP <span>Software</span></div>
        <div class="loader-bar"></div>
    </div>
    
    <!-- Scroll Progress -->
    <div class="scroll-progress"></div>
    
    <!-- Cursor Follower -->
    <div class="cursor-follower"></div>
    
    <!-- Pre-Header -->
    <div class="pre-header">
        <div class="container">
            <div class="pre-header-left">
                <a href="mailto:info@ipsoftwaretechnologies.com"><i class="fas fa-envelope"></i> info@ipsoftwaretechnologies.com</a>
                <a href="tel:+923001234567"><i class="fas fa-phone-alt"></i> +92 300 123 4567</a>
                <span class="pre-header-address"><i class="fas fa-map-marker-alt"></i> Lahore, Pakistan</span>
            </div>
            <div class="pre-header-right">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header transparent">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="IP Software Technologies" class="logo-img">
            </a>
            
            <nav class="nav-menu">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}">Services</a>
                <a href="{{ route('projects') }}" class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('careers') }}" class="nav-link {{ request()->routeIs('careers') ? 'active' : '' }}">Careers</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </nav>
            
            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm nav-cta">Get a Quote</a>
            
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
        <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}">Services</a>
        <a href="{{ route('projects') }}" class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}">Projects</a>
        <a href="{{ route('careers') }}" class="nav-link {{ request()->routeIs('careers') ? 'active' : '' }}">Careers</a>
        <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        <a href="{{ route('contact') }}" class="btn btn-primary" style="margin-top: 20px;">Get a Quote</a>
    </div>
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="IP Software Technologies" class="logo-img">
                    </a>
                    <p>Empowering businesses with cutting-edge software solutions. We build world-class digital products that transform industries.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> Services</a></li>
                        <li><a href="{{ route('projects') }}"><i class="fas fa-chevron-right"></i> Projects</a></li>
                        <li><a href="{{ route('technologies') }}"><i class="fas fa-chevron-right"></i> Technologies</a></li>
                        <li><a href="{{ route('team') }}"><i class="fas fa-chevron-right"></i> Team</a></li>
                        <li><a href="{{ route('careers') }}"><i class="fas fa-chevron-right"></i> Careers</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> Web Development</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> Laravel Development</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> Mobile Apps</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> ERP Solutions</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> E-Commerce</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> UI/UX Design</a></li>
                    </ul>
                </div>
                
                <div class="footer-col footer-newsletter">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter for the latest updates and tech news.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} IP Software Technologies. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- WhatsApp Button -->
    <a href="https://wa.me/923001234567" class="whatsapp-btn" target="_blank" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Back to Top -->
    <button class="back-to-top" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')
</body>
</html>

@extends('frontend.layouts.app')

@section('title', 'Our Services | IP Software Technologies')
@section('meta_description', 'IP Software Technologies - Our Services. Custom web development, Laravel, PHP, Flutter apps, ERP, CRM, e-commerce, API development, UI/UX design, and more.')
@section('meta_keywords', 'web development services, laravel development, php development, flutter app, ERP solutions, CRM development, e-commerce, API development, UI/UX design')

@section('content')
    <section class="page-hero">
        <div class="hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <div class="section-badge reveal" style="background: rgba(29, 170, 216, 0.1); border-color: rgba(29, 170, 216, 0.2); color: var(--primary-light);">
                    <i class="fas fa-cog"></i> Our Services
                </div>
                <h1 class="page-hero-title reveal">
                    Solutions That <span class="gradient-text">Transform</span> Businesses
                </h1>
                <p class="page-hero-desc reveal">
                    From custom web applications to enterprise systems, we deliver end-to-end software solutions that drive growth and innovation.
                </p>
                <div class="breadcrumb reveal">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span class="current">Services</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="services">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-cog"></i> What We Offer
                </div>
                <h2 class="section-title reveal">
                    Comprehensive <span class="gradient-text">Software Solutions</span>
                </h2>
                <p class="section-subtitle reveal">
                    From concept to deployment, we offer comprehensive software development services tailored to your unique business needs.
                </p>
            </div>

            @if($services && count($services) > 0)
            <div class="services-grid stagger-children">
                @foreach($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="service-card tilt-card" style="text-decoration: none; color: inherit;">
                    <div class="service-icon"><i class="{{ $service->icon ?? 'fas fa-code' }}"></i></div>
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-desc">{{ $service->short_description ?? $service->description }}</p>
                    <span class="service-link">Learn More <i class="fas fa-arrow-right"></i></span>
                </a>
                @endforeach
            </div>
            @else
            <div class="services-grid stagger-children">
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="fas fa-code"></i></div>
                    <h3 class="service-title">Custom Web Development</h3>
                    <p class="service-desc">We build powerful, scalable web applications tailored to your unique business requirements.</p>
                    <a href="{{ route('contact') }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="fab fa-laravel"></i></div>
                    <h3 class="service-title">Laravel Development</h3>
                    <p class="service-desc">Harness the power of Laravel for robust, secure, and maintainable backend systems.</p>
                    <a href="{{ route('contact') }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="fab fa-flutter"></i></div>
                    <h3 class="service-title">Flutter App Development</h3>
                    <p class="service-desc">Build beautiful, natively compiled mobile applications for iOS and Android from a single codebase.</p>
                    <a href="{{ route('contact') }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="fas fa-chart-line"></i></div>
                    <h3 class="service-title">ERP Solutions</h3>
                    <p class="service-desc">Streamline your entire business operation with a custom ERP system.</p>
                    <a href="{{ route('contact') }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="fas fa-shopping-cart"></i></div>
                    <h3 class="service-title">E-Commerce Development</h3>
                    <p class="service-desc">Launch your online store with a feature-rich e-commerce platform.</p>
                    <a href="{{ route('contact') }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="fas fa-palette"></i></div>
                    <h3 class="service-title">UI/UX Design</h3>
                    <p class="service-desc">Create exceptional user experiences that delight your customers.</p>
                    <a href="{{ route('contact') }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endif
        </div>
    </section>

    <section class="section cta-section" id="cta">
        <div class="cta-shape cta-shape-1"></div>
        <div class="cta-shape cta-shape-2"></div>
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title reveal">Ready to Transform Your Business?</h2>
                <p class="cta-desc reveal">Let's discuss your project and create something extraordinary together. Get a free consultation today.</p>
                <div class="cta-buttons reveal">
                    <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                        Start Your Project <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="tel:+923001234567" class="btn btn-glass btn-lg">
                        <i class="fas fa-phone"></i> Call Us Now
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

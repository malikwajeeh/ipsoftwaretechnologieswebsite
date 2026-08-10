@extends('frontend.layouts.app')

@section('title', 'Our Projects | IP Software Technologies')
@section('meta_description', 'IP Software Technologies - Explore our portfolio of successful projects including web applications, mobile apps, ERP systems, and e-commerce platforms.')
@section('meta_keywords', 'projects, portfolio, web development, mobile apps, ERP, e-commerce, Laravel, Flutter')

@section('content')
    <section class="page-hero">
        <div class="page-hero-bg">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920" alt="Projects Background" loading="lazy">
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-hero-title reveal">Our Projects</h1>
                <p class="page-hero-desc reveal">Explore our diverse portfolio of successful projects delivered to clients worldwide.</p>
                <nav class="breadcrumb reveal" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="section" id="projects">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-briefcase"></i> Portfolio
                </div>
                <h2 class="section-title reveal">
                    Our Featured <span class="gradient-text">Projects</span>
                </h2>
                <p class="section-subtitle reveal">
                    From web applications to mobile apps, we deliver innovative solutions that drive business growth and digital transformation.
                </p>
            </div>

            <div class="projects-filter reveal">
                <button class="filter-btn active" data-filter="all">All</button>
                @if($categories && count($categories) > 0)
                    @foreach($categories as $category)
                        <button class="filter-btn" data-filter="{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach
                @endif
            </div>

            <div class="projects-grid">
                @if($projects && count($projects) > 0)
                    @foreach($projects as $project)
                    <div class="project-card" data-category="{{ $project->category->slug ?? 'web' }}">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" loading="lazy">
                        @else
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600" alt="{{ $project->title }}" loading="lazy">
                        @endif
                        <div class="project-overlay">
                            <span class="project-category">{{ $project->category->name ?? 'Web Application' }}</span>
                            <h3 class="project-title">{{ $project->title }}</h3>
                            @if($project->technologies && count($project->technologies) > 0)
                            <div class="project-techs">
                                @foreach($project->technologies as $tech)
                                    <span class="project-tech">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
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

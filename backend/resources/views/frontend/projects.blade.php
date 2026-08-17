@extends('frontend.layouts.app')

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

            @php
                $fallbackImages = [
                    'healthtrack-pro' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600',
                    'shopease' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600',
                    'fleetguard' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=600',
                    'eduverse-lms' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=600',
                    'agrismart' => 'https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=600',
                    'foodieapp' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600',
                ];
                $defaultFallback = 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600';
            @endphp

            <div class="projects-grid">
                @if($projects && count($projects) > 0)
                    @foreach($projects as $project)
                    <div class="project-card" data-category="{{ $project->category->slug ?? 'web' }}">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" loading="lazy">
                        @else
                            <img src="{{ $fallbackImages[$project->slug] ?? $defaultFallback }}" alt="{{ $project->title }}" loading="lazy">
                        @endif
                        <div class="project-overlay">
                            <div class="project-overlay-content">
                                <span class="project-category">{{ $project->category->name ?? 'Web Application' }}</span>
                                <h3 class="project-title">{{ $project->title }}</h3>
                                @if($project->short_description)
                                    <p class="project-desc">{{ $project->short_description }}</p>
                                @endif
                                @if($project->technologies && count($project->technologies) > 0)
                                <div class="project-techs">
                                    @foreach(array_slice($project->technologies, 0, 4) as $tech)
                                        <span class="project-tech">{{ $tech }}</span>
                                    @endforeach
                                </div>
                                @endif
                                <div class="project-action">
                                    <span class="project-view-btn">View Details <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
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

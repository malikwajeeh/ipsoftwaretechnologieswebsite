@extends('frontend.layouts.app')

@section('content')
    <section class="page-hero">
        <div class="page-hero-bg">
            @if($project->image)
                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" loading="lazy">
            @else
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920" alt="{{ $project->title }}" loading="lazy">
            @endif
            <div class="page-hero-overlay"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <span class="project-category" style="display:inline-block; margin-bottom:16px;">
                    {{ $project->category->name ?? 'Project' }}
                </span>
                <h1 class="page-hero-title reveal">{{ $project->title }}</h1>
                <nav class="breadcrumb reveal" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects') }}">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="section" id="project-detail">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2 class="about-title">
                        {{ $project->title }}
                    </h2>
                    <p class="about-desc">
                        {{ $project->description }}
                    </p>

                    <div class="about-features">
                        @if($project->category)
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-tag"></i></div>
                            <span class="about-feature-text"><strong>Category:</strong> {{ $project->category->name }}</span>
                        </div>
                        @endif

                        @if($project->client_name)
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-user"></i></div>
                            <span class="about-feature-text"><strong>Client:</strong> {{ $project->client_name }}</span>
                        </div>
                        @endif

                        @if($project->project_url)
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-link"></i></div>
                            <span class="about-feature-text">
                                <strong>Live URL:</strong>
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener">{{ $project->project_url }}</a>
                            </span>
                        </div>
                        @endif
                    </div>

                    @if($project->technologies && count($project->technologies) > 0)
                    <h3 style="margin-top: 24px; margin-bottom: 12px; font-size: 1.1rem;">Technologies Used</h3>
                    <div class="about-features">
                        @foreach($project->technologies as $tech)
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-check"></i></div>
                            <span class="about-feature-text">{{ $tech }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="about-visual">
                    <div class="about-image-wrapper">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" loading="lazy">
                        @else
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800" alt="{{ $project->title }}" loading="lazy">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($relatedProjects && count($relatedProjects) > 0)
    <section class="section section-bg" id="related-projects">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-briefcase"></i> Related Projects
                </div>
                <h2 class="section-title reveal">
                    Explore Our <span class="gradient-text">Other Projects</span>
                </h2>
                <p class="section-subtitle reveal">
                    Discover more of our work and see how we help businesses succeed with technology.
                </p>
            </div>

            <div class="projects-grid">
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
                @foreach($relatedProjects as $related)
                <div class="project-card" data-category="{{ $related->category->slug ?? 'web' }}">
                    @if($related->image)
                        <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" loading="lazy">
                    @else
                        <img src="{{ $fallbackImages[$related->slug] ?? $defaultFallback }}" alt="{{ $related->title }}" loading="lazy">
                    @endif
                    <div class="project-overlay">
                        <div class="project-overlay-content">
                            <span class="project-category">{{ $related->category->name ?? 'Web Application' }}</span>
                            <h3 class="project-title">{{ $related->title }}</h3>
                            @if($related->short_description)
                                <p class="project-desc">{{ $related->short_description }}</p>
                            @endif
                            @if($related->technologies && count($related->technologies) > 0)
                            <div class="project-techs">
                                @foreach(array_slice($related->technologies, 0, 4) as $tech)
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
            </div>
        </div>
    </section>
    @endif

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

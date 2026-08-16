@extends('frontend.layouts.app')

@section('content')
    <section class="page-hero">
        <div class="page-hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
            <div class="mesh-gradient-3"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-hero-title reveal">Our <span class="gradient-text">Technologies</span></h1>
                <p class="page-hero-desc reveal">We leverage cutting-edge technologies to build world-class software solutions that drive business growth.</p>
                <nav class="breadcrumb reveal">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="separator"><i class="fas fa-chevron-right"></i></span>
                    <span class="current">Technologies</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="tech-marquee-section">
        <div class="tech-track">
            @if($technologies && count($technologies) > 0)
                @foreach($technologies as $tech)
                <div class="tech-item">
                    <div class="tech-item-icon"><i class="{{ $tech->icon }}" style="color: {{ $tech->color ?? '#6c757d' }};"></i></div>
                    <span class="tech-item-name">{{ $tech->name }}</span>
                </div>
                @endforeach
                @foreach($technologies as $tech)
                <div class="tech-item">
                    <div class="tech-item-icon"><i class="{{ $tech->icon }}" style="color: {{ $tech->color ?? '#6c757d' }};"></i></div>
                    <span class="tech-item-name">{{ $tech->name }}</span>
                </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="section section-bg">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-microchip"></i> Tech Stack
                </div>
                <h2 class="section-title reveal">
                    Technologies We <span class="gradient-text">Master</span>
                </h2>
                <p class="section-subtitle reveal">
                    Our carefully selected technology stack enables us to build robust, scalable, and high-performance software solutions.
                </p>
            </div>

            @if($technologies && count($technologies) > 0)
                @php
                    $grouped = $technologies->groupBy('category');
                @endphp

                @foreach($grouped as $category => $techs)
                <div class="tech-category reveal">
                    <div class="tech-category-header">
                        <div class="tech-category-icon {{ strtolower($category) }}">
                            @if(strtolower($category) === 'frontend')
                                <i class="fas fa-palette"></i>
                            @elseif(strtolower($category) === 'backend')
                                <i class="fas fa-server"></i>
                            @elseif(strtolower($category) === 'mobile')
                                <i class="fas fa-mobile-alt"></i>
                            @elseif(strtolower($category) === 'database')
                                <i class="fas fa-database"></i>
                            @elseif(strtolower($category) === 'devops')
                                <i class="fas fa-cloud"></i>
                            @else
                                <i class="fas fa-cog"></i>
                            @endif
                        </div>
                        <div class="tech-category-info">
                            <h3>{{ $category }}</h3>
                            @if(strtolower($category) === 'frontend')
                                <p>Building stunning, responsive user interfaces</p>
                            @elseif(strtolower($category) === 'backend')
                                <p>Powering robust server-side applications and APIs</p>
                            @elseif(strtolower($category) === 'mobile')
                                <p>Crafting beautiful cross-platform mobile experiences</p>
                            @elseif(strtolower($category) === 'database')
                                <p>Managing and optimizing data storage solutions</p>
                            @elseif(strtolower($category) === 'devops')
                                <p>Streamlining deployment and infrastructure</p>
                            @else
                                <p>Specialized tools and technologies</p>
                            @endif
                        </div>
                    </div>
                    <div class="tech-cards-grid stagger-children">
                        @foreach($techs as $tech)
                        <div class="tech-card tilt-card">
                            <div class="tech-card-header">
                                <div class="tech-card-icon">
                                    <i class="{{ $tech->icon }}" style="color: {{ $tech->color ?? '#6c757d' }};"></i>
                                </div>
                                <div>
                                    <div class="tech-card-name">{{ $tech->name }}</div>
                                    <div class="tech-card-type">{{ $category }}</div>
                                </div>
                            </div>
                            @if($tech->description)
                                <p class="tech-card-desc">{{ $tech->description }}</p>
                            @endif
                            @if($tech->proficiency)
                            <div class="tech-proficiency">
                                <div class="tech-proficiency-header">
                                    <span class="tech-proficiency-label">Proficiency</span>
                                    <span class="tech-proficiency-value">{{ $tech->proficiency }}%</span>
                                </div>
                                <div class="tech-proficiency-bar">
                                    <div class="tech-proficiency-fill" style="--progress: {{ $tech->proficiency }}%;"></div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
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

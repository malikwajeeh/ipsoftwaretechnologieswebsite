@extends('frontend.layouts.app')

@section('content')
    <section class="page-hero">
        <div class="hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <div class="section-badge reveal" style="background: rgba(29, 170, 216, 0.1); border-color: rgba(29, 170, 216, 0.2); color: var(--primary-light);">
                    <i class="{{ $service->icon ?? 'fas fa-cog' }}"></i> {{ $service->title }}
                </div>
                <h1 class="page-hero-title reveal">
                    {{ $service->title }}
                </h1>
                <p class="page-hero-desc reveal">
                    {{ $service->short_description ?? $service->description }}
                </p>
                <div class="breadcrumb reveal">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <a href="{{ route('services') }}">Services</a>
                    <span>/</span>
                    <span class="current">{{ $service->title }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="service-detail-section">
        <div class="container">
            <div class="service-detail-row">
                <div class="service-detail-content reveal-left">
                    <div class="service-detail-badge blue">
                        <i class="{{ $service->icon ?? 'fas fa-code' }}"></i> {{ $service->title }}
                    </div>
                    <h2 class="service-detail-title">{{ $service->title }}</h2>
                    <p class="service-detail-desc">
                        {{ $service->description }}
                    </p>

                    @if($service->features)
                        @php
                            $features = is_string($service->features) ? json_decode($service->features, true) : $service->features;
                        @endphp
                        @if(is_array($features) && count($features) > 0)
                        <div class="service-features-list">
                            @foreach($features as $feature)
                            <div class="service-feature-item">
                                <div class="service-feature-icon blue"><i class="fas fa-check"></i></div>
                                <div class="service-feature-text">
                                    <h5>{{ is_array($feature) ? $feature['title'] ?? $feature['name'] ?? $feature[0] ?? '' : $feature }}</h5>
                                    @if(is_array($feature) && isset($feature['description']))
                                        <p>{{ $feature['description'] }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    @endif

                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        Start Your Project <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="service-detail-visual reveal-right">
                    <div class="service-visual-card">
                        <div class="service-floating-shape service-floating-shape-1"></div>
                        <div class="service-floating-shape service-floating-shape-2"></div>
                        <div class="service-visual-icon blue"><i class="{{ $service->icon ?? 'fas fa-code' }}"></i></div>
                        <div class="service-visual-stats">
                            <div class="service-visual-stat">
                                <div class="service-visual-stat-number">100+</div>
                                <div class="service-visual-stat-label">Projects Done</div>
                            </div>
                            <div class="service-visual-stat">
                                <div class="service-visual-stat-number">99%</div>
                                <div class="service-visual-stat-label">Client Satisfaction</div>
                            </div>
                            <div class="service-visual-stat">
                                <div class="service-visual-stat-number">24/7</div>
                                <div class="service-visual-stat-label">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($relatedServices && count($relatedServices) > 0)
    <section class="section section-bg" id="related-services">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-th-large"></i> Related Services
                </div>
                <h2 class="section-title reveal">
                    Explore Our <span class="gradient-text">Other Services</span>
                </h2>
                <p class="section-subtitle reveal">
                    Discover more solutions we offer to help your business grow and succeed.
                </p>
            </div>

            <div class="services-grid stagger-children">
                @foreach($relatedServices as $related)
                <a href="{{ route('services.show', $related->slug) }}" class="service-card tilt-card" style="text-decoration: none; color: inherit;">
                    <div class="service-icon"><i class="{{ $related->icon ?? 'fas fa-code' }}"></i></div>
                    <h3 class="service-title">{{ $related->title }}</h3>
                    <p class="service-desc">{{ $related->short_description ?? $related->description }}</p>
                    <span class="service-link">Learn More <i class="fas fa-arrow-right"></i></span>
                </a>
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

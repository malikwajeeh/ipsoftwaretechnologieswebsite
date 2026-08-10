@extends('frontend.layouts.app')

@section('title', 'Testimonials | IP Software Technologies')
@section('meta_description', 'Read what our clients say about IP Software Technologies. Real testimonials from businesses we have helped with web development, mobile apps, ERP systems, and custom software solutions.')
@section('meta_keywords', 'client testimonials, software company reviews, IP Software Technologies feedback, client success stories')

@section('content')
    <section class="page-hero">
        <div class="page-hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
            <div class="mesh-gradient-3"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-hero-title reveal">Testimonials</h1>
                <nav class="breadcrumb reveal">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="separator"><i class="fas fa-chevron-right"></i></span>
                    <span class="current">Testimonials</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="section" id="testimonials">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-quote-left"></i> Client Reviews
                </div>
                <h2 class="section-title reveal">
                    What Our Clients <span class="gradient-text">Say</span>
                </h2>
                <p class="section-subtitle reveal">
                    Don't just take our word for it. Here's what our valued clients have to say about working with us.
                </p>
            </div>

            <div class="testimonials-grid stagger-children">
                @if($testimonials && count($testimonials) > 0)
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-card tilt-card">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= $testimonial->rating ? '' : ' text-muted' }}"></i>
                            @endfor
                        </div>
                        <p class="testimonial-text">"{{ $testimonial->testimonial }}"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">
                                @php
                                    $nameParts = explode(' ', $testimonial->client_name);
                                    $initials = '';
                                    foreach($nameParts as $part) {
                                        $initials .= strtoupper(substr($part, 0, 1));
                                    }
                                    $initials = substr($initials, 0, 2);
                                @endphp
                                {{ $initials }}
                            </div>
                            <div class="testimonial-info">
                                <h4>{{ $testimonial->client_name }}</h4>
                                <p>{{ $testimonial->client_role }}, {{ $testimonial->client_company }}</p>
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

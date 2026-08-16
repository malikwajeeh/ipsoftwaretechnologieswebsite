@extends('frontend.layouts.app')

@section('content')
    <section class="page-hero">
        <div class="hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-hero-title reveal">Our <span class="gradient-text">Team</span></h1>
                <p class="page-hero-desc reveal">Meet the talented professionals behind our world-class software solutions.</p>
                <div class="breadcrumb reveal">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span class="current">Team</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="team">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-users"></i> Our Experts
                </div>
                <h2 class="section-title reveal">
                    The People Behind <span class="gradient-text">Our Success</span>
                </h2>
                <p class="section-subtitle reveal">
                    A dedicated team of passionate professionals committed to delivering exceptional software solutions.
                </p>
            </div>

            <div class="team-grid stagger-children">
                @if($team && count($team) > 0)
                    @foreach($team as $member)
                    <div class="team-card tilt-card">
                        <div class="team-image">
                            @if($member->avatar)
                                <img src="{{ Storage::url($member->avatar) }}" alt="{{ $member->name }}" loading="lazy">
                            @else
                                <div class="team-avatar-initials" style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2.5rem;font-weight:700;background:var(--gradient-primary);color:#fff;border-radius:var(--radius-lg);">
                                    @php
                                        $nameParts = explode(' ', $member->name);
                                        $initials = '';
                                        foreach($nameParts as $part) {
                                            $initials .= strtoupper(substr($part, 0, 1));
                                        }
                                        $initials = substr($initials, 0, 2);
                                    @endphp
                                    {{ $initials }}
                                </div>
                            @endif
                            @if($member->social_links)
                                @php
                                    $socialLinks = is_string($member->social_links) ? json_decode($member->social_links, true) : $member->social_links;
                                @endphp
                                @if(is_array($socialLinks))
                                <div class="team-social">
                                    @if(isset($socialLinks['linkedin']))
                                        <a href="{{ $socialLinks['linkedin'] }}" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                    @endif
                                    @if(isset($socialLinks['twitter']))
                                        <a href="{{ $socialLinks['twitter'] }}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if(isset($socialLinks['github']))
                                        <a href="{{ $socialLinks['github'] }}" aria-label="GitHub"><i class="fab fa-github"></i></a>
                                    @endif
                                </div>
                                @endif
                            @endif
                        </div>
                        <div class="team-info">
                            <h4>{{ $member->name }}</h4>
                            <p>{{ $member->role }}</p>
                            @if($member->bio)
                                <p class="team-bio" style="font-size: 0.88rem; color: var(--text-light); margin-top: 8px;">{{ $member->bio }}</p>
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

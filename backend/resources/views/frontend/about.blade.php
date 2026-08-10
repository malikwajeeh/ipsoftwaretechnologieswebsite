@extends('frontend.layouts.app')

@section('title', 'About Us | IP Software Technologies')
@section('meta_description', 'About IP Software Technologies - Learn about our mission, vision, values, and the passionate team behind world-class software solutions.')
@section('meta_keywords', 'about IP Software Technologies, software company, our story, mission, vision, team')

@section('content')
    <section class="page-hero">
        <div class="page-hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
            <div class="mesh-gradient-3"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-hero-title reveal">About Us</h1>
                <nav class="breadcrumb reveal">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="separator"><i class="fas fa-chevron-right"></i></span>
                    <span class="current">About Us</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="section section-bg" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <div class="about-badge reveal-left">
                        <i class="fas fa-star"></i> Who We Are
                    </div>
                    <h2 class="about-title reveal-left">
                        @php
                            $aboutTitleParts = explode(' ', $about->title ?? 'We Are IP Software Technologies');
                        @endphp
                        @if(count($aboutTitleParts) >= 3)
                            {{ $aboutTitleParts[0] }} {{ $aboutTitleParts[1] }} <span class="gradient-text">{{ $aboutTitleParts[2] }}</span> {{ implode(' ', array_slice($aboutTitleParts, 3)) }}
                        @else
                            We Are <span class="gradient-text">IP Software</span> Technologies
                        @endif
                    </h2>

                    @if($about && $about->description)
                        @php
                            $descParts = array_filter(explode("\n", $about->description));
                        @endphp
                        @foreach($descParts as $desc)
                            <p class="about-desc reveal-left">{{ trim($desc) }}</p>
                        @endforeach
                    @else
                        <p class="about-desc reveal-left">
                            Founded with a passion for innovation, IP Software Technologies is a premier software development company dedicated to building world-class digital solutions. We combine technical expertise with creative design to deliver products that transform businesses.
                        </p>
                        <p class="about-desc reveal-left">
                            Our team of skilled developers, designers, and strategists work collaboratively to turn your ideas into powerful software that drives growth and efficiency. With over 8 years of experience, we've established ourselves as a trusted technology partner for businesses across the globe.
                        </p>
                    @endif

                    @if($about && $about->features && count($about->features) > 0)
                    <div class="about-features reveal-left">
                        @foreach($about->features as $feature)
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-check"></i></div>
                            <span class="about-feature-text">{{ is_array($feature) ? $feature['text'] ?? $feature['name'] ?? $feature[0] ?? '' : $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="about-features reveal-left">
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-check"></i></div>
                            <span class="about-feature-text">Custom Solutions</span>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-check"></i></div>
                            <span class="about-feature-text">Agile Development</span>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-check"></i></div>
                            <span class="about-feature-text">24/7 Support</span>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon"><i class="fas fa-check"></i></div>
                            <span class="about-feature-text">Quality Assurance</span>
                        </div>
                    </div>
                    @endif

                    <a href="{{ route('services') }}" class="btn btn-primary reveal-left">
                        Our Services <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="about-visual reveal-right">
                    <div class="about-floating-shape"></div>
                    <div class="about-image-wrapper">
                        @if($about && $about->image)
                            <img src="{{ Storage::url($about->image) }}" alt="Our Team Collaboration" loading="lazy">
                        @else
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800" alt="Our Team Collaboration" loading="lazy">
                        @endif
                    </div>
                    <div class="about-experience-badge">
                        <div class="about-experience-number">{{ $about->experience_years ?? '8' }}+</div>
                        <div class="about-experience-text">Years of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="mission">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-bullseye"></i> Our Foundation
                </div>
                <h2 class="section-title reveal">
                    Mission, Vision & <span class="gradient-text">Values</span>
                </h2>
                <p class="section-subtitle reveal">
                    The principles that guide everything we do and the future we're building towards.
                </p>
            </div>

            <div class="mission-grid stagger-children">
                <div class="mission-card tilt-card">
                    <div class="mission-icon"><i class="fas fa-rocket"></i></div>
                    <h3 class="mission-title">Our Mission</h3>
                    <p class="mission-desc">
                        @if($about && $about->mission)
                            {{ $about->mission }}
                        @else
                            To empower businesses with innovative software solutions that drive growth, efficiency, and digital transformation. We are committed to delivering excellence through technology, helping organizations achieve their full potential in the digital era.
                        @endif
                    </p>
                </div>

                <div class="mission-card tilt-card">
                    <div class="mission-icon"><i class="fas fa-eye"></i></div>
                    <h3 class="mission-title">Our Vision</h3>
                    <p class="mission-desc">
                        @if($about && $about->vision)
                            {{ $about->vision }}
                        @else
                            To become a globally recognized leader in software development, known for creating transformative digital products that reshape industries. We envision a future where technology seamlessly connects businesses with their customers, creating value at every touchpoint.
                        @endif
                    </p>
                </div>

                <div class="mission-card tilt-card">
                    <div class="mission-icon"><i class="fas fa-gem"></i></div>
                    <h3 class="mission-title">Our Values</h3>
                    @if($about && $about->values)
                        @php
                            $values = is_string($about->values) ? json_decode($about->values, true) : $about->values;
                        @endphp
                        @if(is_array($values))
                        <ul class="mission-values-list">
                            @foreach($values as $value)
                                <li><i class="fas fa-check-circle"></i> {{ is_array($value) ? $value['text'] ?? $value['name'] ?? $value[0] ?? '' : $value }}</li>
                            @endforeach
                        </ul>
                        @endif
                    @else
                        <ul class="mission-values-list">
                            <li><i class="fas fa-check-circle"></i> Innovation & Excellence</li>
                            <li><i class="fas fa-check-circle"></i> Integrity & Transparency</li>
                            <li><i class="fas fa-check-circle"></i> Client-Centric Approach</li>
                            <li><i class="fas fa-check-circle"></i> Continuous Learning</li>
                            <li><i class="fas fa-check-circle"></i> Team Collaboration</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($team && count($team) > 0)
    <section class="section section-dark" id="team">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-users"></i> Our People
                </div>
                <h2 class="section-title reveal">
                    Meet The <span class="gradient-text">Team</span>
                </h2>
                <p class="section-subtitle reveal">
                    The talented professionals behind our success. Passionate, skilled, and dedicated to delivering excellence.
                </p>
            </div>

            <div class="team-preview-grid stagger-children">
                @foreach($team->take(4) as $member)
                <div class="team-card tilt-card">
                    <div class="team-avatar">
                        @if($member->avatar)
                            <img src="{{ Storage::url($member->avatar) }}" alt="{{ $member->name }}" loading="lazy">
                        @else
                            <div class="team-avatar-initials">
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
                    </div>
                    <div class="team-info">
                        <h3 class="team-name">{{ $member->name }}</h3>
                        <p class="team-role">{{ $member->role }}</p>
                        @if($member->bio)
                            <p class="team-bio">{{ $member->bio }}</p>
                        @endif
                    </div>
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
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 50px;" class="reveal">
                <a href="{{ route('team') }}" class="btn btn-outline">
                    View Full Team <i class="fas fa-arrow-right"></i>
                </a>
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

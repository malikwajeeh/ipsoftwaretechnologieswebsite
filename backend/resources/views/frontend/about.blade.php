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

            <div class="foundation-grid reveal">
                <div class="foundation-image">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800" alt="Our Foundation" loading="lazy">
                </div>

                <div class="foundation-content">
                    <div class="foundation-item">
                        <div class="foundation-item-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="foundation-item-body">
                            <h3>Our Mission</h3>
                            <p>
                                @if($about && $about->mission)
                                    {{ $about->mission }}
                                @else
                                    To empower businesses with innovative software solutions that drive growth, efficiency, and digital transformation.
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="foundation-item">
                        <div class="foundation-item-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="foundation-item-body">
                            <h3>Our Vision</h3>
                            <p>
                                @if($about && $about->vision)
                                    {{ $about->vision }}
                                @else
                                    To become a globally recognized leader in software development, known for creating transformative digital products.
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="foundation-item">
                        <div class="foundation-item-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <div class="foundation-item-body">
                            <h3>Our Values</h3>
                            @if($about && $about->values)
                                @php
                                    $values = is_string($about->values) ? json_decode($about->values, true) : $about->values;
                                @endphp
                                @if(is_array($values))
                                <div class="foundation-values">
                                    @foreach($values as $value)
                                        <span class="foundation-value-tag">{{ is_array($value) ? $value['text'] ?? $value['name'] ?? $value[0] ?? '' : $value }}</span>
                                    @endforeach
                                </div>
                                @endif
                            @else
                                <div class="foundation-values">
                                    <span class="foundation-value-tag">Innovation</span>
                                    <span class="foundation-value-tag">Quality</span>
                                    <span class="foundation-value-tag">Integrity</span>
                                    <span class="foundation-value-tag">Collaboration</span>
                                    <span class="foundation-value-tag">Excellence</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .foundation-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .foundation-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
        }

        .foundation-image img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            display: block;
            border-radius: 20px;
        }

        .foundation-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(11, 17, 32, 0.9));
            padding: 30px;
            border-radius: 0 0 20px 20px;
        }

        .foundation-stats {
            display: flex;
            gap: 30px;
        }

        .foundation-stat {
            text-align: center;
        }

        .foundation-stat-number {
            display: block;
            font-size: 28px;
            font-weight: 800;
            color: #fff;
            font-family: var(--font-heading);
        }

        .foundation-stat-label {
            display: block;
            font-size: 13px;
            color: rgba(255,255,255,0.7);
            margin-top: 2px;
        }

        .foundation-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .foundation-item {
            display: flex;
            gap: 20px;
            padding: 24px;
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .foundation-item:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 30px rgba(29, 170, 216, 0.1);
            transform: translateY(-2px);
        }

        .foundation-item-icon {
            width: 50px;
            height: 50px;
            min-width: 50px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(29,170,216,0.1), rgba(237,143,40,0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--primary);
        }

        .foundation-item-body h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
            font-family: var(--font-heading);
        }

        .foundation-item-body p {
            font-size: 14px;
            color: var(--text-light);
            line-height: 1.7;
            margin: 0;
        }

        .foundation-values {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .foundation-value-tag {
            padding: 6px 14px;
            background: linear-gradient(135deg, rgba(29,170,216,0.08), rgba(237,143,40,0.08));
            border: 1px solid rgba(29,170,216,0.15);
            border-radius: 20px;
            font-size: 13px;
            color: var(--primary-dark);
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .foundation-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .foundation-image img {
                height: 300px;
            }
        }

        @media (max-width: 575px) {
            .foundation-stats {
                gap: 20px;
            }

            .foundation-stat-number {
                font-size: 22px;
            }

            .foundation-item {
                padding: 18px;
            }
        }
    </style>

    @if($team && count($team) > 0)
    <section class="section" id="team">
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

            <div class="about-team-grid stagger-children">
                @php
                    $teamImages = [
                        'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400',
                        'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400',
                        'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400',
                        'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400',
                    ];
                @endphp
                @foreach($team->take(4) as $key => $member)
                <div class="about-team-card">
                    <div class="about-team-image">
                        @if($member->avatar)
                            <img src="{{ Storage::url($member->avatar) }}" alt="{{ $member->name }}" loading="lazy">
                        @else
                            <img src="{{ $teamImages[$key] }}" alt="{{ $member->name }}" loading="lazy">
                        @endif
                        <div class="about-team-social">
                            @if($member->social_links)
                                @php
                                    $socialLinks = is_string($member->social_links) ? json_decode($member->social_links, true) : $member->social_links;
                                @endphp
                                @if(is_array($socialLinks))
                                    @if(isset($socialLinks['linkedin']))
                                        <a href="{{ $socialLinks['linkedin'] }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                    @endif
                                    @if(isset($socialLinks['twitter']))
                                        <a href="{{ $socialLinks['twitter'] }}" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if(isset($socialLinks['github']))
                                        <a href="{{ $socialLinks['github'] }}" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="about-team-info">
                        <h3 class="about-team-name">{{ $member->name }}</h3>
                        <p class="about-team-role">{{ $member->role }}</p>
                        @if($member->bio)
                            <p class="about-team-bio">{{ $member->bio }}</p>
                        @endif
                    </div>
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

    <style>
        .about-team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .about-team-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .about-team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }

        .about-team-image {
            position: relative;
            width: 100%;
            height: 260px;
            overflow: hidden;
        }

        .about-team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .about-team-card:hover .about-team-image img {
            transform: scale(1.05);
        }

        .about-team-social {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 14px;
            display: flex;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(transparent, rgba(11,17,32,0.8));
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .about-team-card:hover .about-team-social {
            transform: translateY(0);
        }

        .about-team-social a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .about-team-social a:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        .about-team-info {
            padding: 20px;
            text-align: center;
        }

        .about-team-name {
            font-size: 17px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
            font-family: var(--font-heading);
        }

        .about-team-role {
            font-size: 13px;
            color: var(--primary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .about-team-bio {
            font-size: 13px;
            color: var(--text-light);
            line-height: 1.6;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 1199px) {
            .about-team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575px) {
            .about-team-grid {
                grid-template-columns: 1fr;
                max-width: 350px;
                margin: 0 auto;
            }

            .about-team-image {
                height: 280px;
            }
        }
    </style>
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

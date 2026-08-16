@extends('frontend.layouts.app')

@section('content')
    <section class="hero" style="min-height: 50vh;">
        <div class="hero-bg">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920&q=80" alt="Careers at IP Software Technologies" style="width:100%;height:100%;object-fit:cover;position:absolute;top:0;left:0;" loading="eager">
            <div class="hero-overlay"></div>
        </div>

        <div class="hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
        </div>

        <div class="container">
            <div class="hero-content" style="padding-top: 120px;">
                <div class="section-badge reveal" style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);padding:10px 24px;border-radius:50px;margin-bottom:20px;border:1px solid rgba(255,255,255,0.15);color:#fff;">
                    <i class="fas fa-briefcase"></i> Join Our Team
                </div>

                <h1 class="hero-title" style="font-size: clamp(2.5rem, 5vw, 4rem);">
                    <span class="line reveal">Build Your</span>
                    <span class="line reveal"><span class="gradient-text">Dream Career</span> With Us</span>
                </h1>

                <p class="hero-desc" style="max-width: 650px; margin: 0 auto;">
                    Join a team of passionate innovators shaping the future of technology. We offer exciting opportunities for growth, learning, and creativity.
                </p>

                <div class="reveal" style="margin-top: 20px; color: rgba(255,255,255,0.7); font-size: 1rem;">
                    <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Home</a>
                    <span style="margin: 0 10px;"><i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></span>
                    <span style="color: #fff; font-weight: 500;">Careers</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-bg" id="why-work">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-star"></i> Why Work With Us
                </div>
                <h2 class="section-title reveal">
                    Benefits That <span class="gradient-text">Inspire Excellence</span>
                </h2>
                <p class="section-subtitle reveal">
                    We invest in our people because we believe that happy teams build exceptional products. Discover what makes working at IP Software Technologies truly special.
                </p>
            </div>

            <div class="choose-grid stagger-children">
                <div class="choose-card tilt-card">
                    <div class="choose-number">01</div>
                    <div class="choose-icon"><i class="fas fa-wallet"></i></div>
                    <h3 class="choose-title">Competitive Salary</h3>
                    <p class="choose-desc">We offer industry-leading compensation packages that recognize your skills and reward your contributions to the team.</p>
                </div>

                <div class="choose-card tilt-card">
                    <div class="choose-number">02</div>
                    <div class="choose-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h3 class="choose-title">Continuous Learning</h3>
                    <p class="choose-desc">Access to online courses, workshops, conferences, and certifications. We invest in your professional growth and skill development.</p>
                </div>

                <div class="choose-card tilt-card">
                    <div class="choose-number">03</div>
                    <div class="choose-icon"><i class="fas fa-clock"></i></div>
                    <h3 class="choose-title">Flexible Hours</h3>
                    <p class="choose-desc">Work-life balance matters. Enjoy flexible scheduling and remote work options that fit your lifestyle and peak productivity hours.</p>
                </div>

                <div class="choose-card tilt-card">
                    <div class="choose-number">04</div>
                    <div class="choose-icon"><i class="fas fa-users"></i></div>
                    <h3 class="choose-title">Team Events</h3>
                    <p class="choose-desc">Regular team outings, hackathons, celebrations, and social events that build camaraderie and strengthen our collaborative culture.</p>
                </div>

                <div class="choose-card tilt-card">
                    <div class="choose-number">05</div>
                    <div class="choose-icon"><i class="fas fa-heartbeat"></i></div>
                    <h3 class="choose-title">Health Insurance</h3>
                    <p class="choose-desc">Comprehensive health and medical insurance coverage for you and your family, because your wellbeing is our priority.</p>
                </div>

                <div class="choose-card tilt-card">
                    <div class="choose-number">06</div>
                    <div class="choose-icon"><i class="fas fa-chart-line"></i></div>
                    <h3 class="choose-title">Career Growth</h3>
                    <p class="choose-desc">Clear career progression paths with mentorship from senior leaders. Your ambitions drive our commitment to your advancement.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="positions">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-briefcase"></i> Open Positions
                </div>
                <h2 class="section-title reveal">
                    Find Your <span class="gradient-text">Perfect Role</span>
                </h2>
                <p class="section-subtitle reveal">
                    We're always looking for talented individuals to join our growing team. Explore our current openings and find the role that matches your passion.
                </p>
            </div>

            <div class="services-grid stagger-children">
                @if($jobs && count($jobs) > 0)
                    @foreach($jobs as $job)
                    <div class="service-card tilt-card">
                        <div class="service-icon">
                            @if($job->department == 'Engineering')
                                <i class="fas fa-code"></i>
                            @elseif($job->department == 'Mobile')
                                <i class="fas fa-mobile-alt"></i>
                            @elseif($job->department == 'Design')
                                <i class="fas fa-palette"></i>
                            @elseif($job->department == 'Management')
                                <i class="fas fa-project-diagram"></i>
                            @elseif($job->department == 'Quality Assurance')
                                <i class="fas fa-check-double"></i>
                            @else
                                <i class="fas fa-briefcase"></i>
                            @endif
                        </div>
                        <h3 class="service-title">{{ $job->title }}</h3>
                        <div style="display:flex;gap:8px;flex-wrap:wrap;margin: 12px 0 16px;">
                            @if($job->department)
                            <span style="display:inline-flex;align-items:center;gap:6px;padding:5px 14px;border-radius:50px;font-size:0.8rem;font-weight:500;background:rgba(99,102,241,0.1);color:#818cf8;border:1px solid rgba(99,102,241,0.2);">
                                <i class="fas fa-code"></i> {{ $job->department }}
                            </span>
                            @endif
                            @if($job->type)
                            <span style="display:inline-flex;align-items:center;gap:6px;padding:5px 14px;border-radius:50px;font-size:0.8rem;font-weight:500;background:rgba(34,197,94,0.1);color:#22c55e;border:1px solid rgba(34,197,94,0.2);">
                                <i class="fas fa-briefcase"></i> {{ $job->type }}
                            </span>
                            @endif
                            @if($job->location)
                            <span style="display:inline-flex;align-items:center;gap:6px;padding:5px 14px;border-radius:50px;font-size:0.8rem;font-weight:500;background:rgba(251,191,36,0.1);color:#fbbf24;border:1px solid rgba(251,191,36,0.2);">
                                <i class="fas fa-map-marker-alt"></i> {{ $job->location }}
                            </span>
                            @endif
                            @if($job->salary_range)
                            <span style="display:inline-flex;align-items:center;gap:6px;padding:5px 14px;border-radius:50px;font-size:0.8rem;font-weight:500;background:rgba(16,185,129,0.1);color:#10b981;border:1px solid rgba(16,185,129,0.2);">
                                <i class="fas fa-dollar-sign"></i> {{ $job->salary_range }}
                            </span>
                            @endif
                        </div>
                        @if($job->description)
                            <p class="service-desc">{{ $job->description }}</p>
                        @endif
                        <a href="{{ route('contact') }}" class="service-link">Apply Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                    @endforeach
                @else
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                        <i class="fas fa-briefcase" style="font-size: 3rem; color: var(--primary); margin-bottom: 20px; opacity: 0.5;"></i>
                        <h3 style="margin-bottom: 12px;">No Open Positions Right Now</h3>
                        <p style="color: var(--text-light);">We're not actively hiring at the moment, but we're always interested in hearing from talented people. Send your resume to <a href="mailto:careers@ipsoftwaretechnologies.com">careers@ipsoftwaretechnologies.com</a></p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="section cta-section" id="cta">
        <div class="cta-shape cta-shape-1"></div>
        <div class="cta-shape cta-shape-2"></div>
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title reveal">Ready to Start Your Journey?</h2>
                <p class="cta-desc reveal">Don't see a role that fits? Send us your resume anyway. We're always looking for exceptional talent to join our team.</p>
                <div class="cta-buttons reveal">
                    <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                        Apply Now <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="mailto:careers@ipsoftwaretechnologies.com" class="btn btn-glass btn-lg">
                        <i class="fas fa-envelope"></i> Send Your Resume
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

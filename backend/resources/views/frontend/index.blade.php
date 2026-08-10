@extends('frontend.layouts.app')

@section('title', 'IP Software Technologies | Premium Software Development Company')
@section('meta_description', 'IP Software Technologies - Premium Software Development Company. We build world-class web applications, mobile apps, ERP systems, and custom software solutions.')
@section('meta_keywords', 'software house, web development, laravel, php, flutter, ERP, CRM, mobile app development')

@section('content')
    <!-- ========== HERO SECTION ========== -->
    <section class="hero" id="home">
        <div class="hero-bg">
            @if($hero && $hero->video_url)
                <video autoplay muted loop playsinline>
                    <source src="{{ $hero->video_url }}" type="video/mp4">
                </video>
            @else
                <video autoplay muted loop playsinline>
                    <source src="https://assets.mixkit.co/videos/preview/mixkit-programmer-working-on-code-screen-close-up-25138-large.mp4" type="video/mp4">
                </video>
            @endif
            <div class="hero-overlay"></div>
        </div>

        <div class="hero-mesh">
            <div class="mesh-gradient-1"></div>
            <div class="mesh-gradient-2"></div>
            <div class="mesh-gradient-3"></div>
        </div>

        <canvas id="particleCanvas" class="hero-particles"></canvas>

        <div class="container">
            <div class="hero-content">
                <div class="hero-badge reveal">
                    <div class="hero-badge-dot"></div>
                    <span class="hero-badge-text">{{ $hero->badge_text ?? 'Available for new projects' }}</span>
                </div>

                <h1 class="hero-title">
                    @php
                        $titleParts = explode(' ', $hero->title ?? 'We Build World-Class Digital Products');
                    @endphp
                    @if(count($titleParts) >= 3)
                        <span class="line reveal">{{ $titleParts[0] }} {{ $titleParts[1] }}</span>
                        <span class="line reveal"><span class="gradient-text">{{ $titleParts[2] }}</span> {{ $titleParts[3] ?? '' }}</span>
                        <span class="line reveal"><span class="typing-text" data-words='["Products", "Solutions", "Experiences", "Innovations"]'>{{ $titleParts[4] ?? 'Products' }}</span></span>
                    @else
                        <span class="line reveal">We Build</span>
                        <span class="line reveal"><span class="gradient-text">World-Class</span> Digital</span>
                        <span class="line reveal"><span class="typing-text" data-words='["Products", "Solutions", "Experiences", "Innovations"]'>Products</span></span>
                    @endif
                </h1>

                <p class="hero-desc reveal">
                    {{ $hero->description ?? 'Empowering businesses with cutting-edge software solutions. From enterprise web applications to mobile apps, we transform your vision into powerful digital reality.' }}
                </p>

                <div class="hero-buttons reveal">
                    <a href="{{ $hero->button_link ?? route('contact') }}" class="btn btn-primary btn-lg">
                        {{ $hero->button_text ?? 'Start Your Project' }} <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ $hero->secondary_button_link ?? route('projects') }}" class="btn btn-secondary btn-lg">
                        {{ $hero->secondary_button_text ?? 'View Our Work' }} <i class="fas fa-play"></i>
                    </a>
                </div>

                <div class="hero-stats reveal">
                    <div class="hero-stat">
                        <div class="hero-stat-number"><span class="counter" data-count="150" data-suffix="+">0</span></div>
                        <div class="hero-stat-label">Projects Delivered</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number"><span class="counter" data-count="50" data-suffix="+">0</span></div>
                        <div class="hero-stat-label">Happy Clients</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number"><span class="counter" data-count="8" data-suffix="+">0</span></div>
                        <div class="hero-stat-label">Years Experience</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Cards -->
        <div class="hero-floating">
            <div class="floating-card floating-card-1">
                <i class="fab fa-laravel"></i>
                <div class="floating-card-text">Laravel Expert</div>
            </div>
            <div class="floating-card floating-card-2">
                <i class="fab fa-flutter"></i>
                <div class="floating-card-text">Flutter Apps</div>
            </div>
            <div class="floating-card floating-card-3">
                <i class="fas fa-cloud"></i>
                <div class="floating-card-text">Cloud Deploy</div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span>Scroll Down</span>
            <div class="scroll-mouse"></div>
        </div>
    </section>

    <!-- ========== STATS SECTION ========== -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-wrapper reveal">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-project-diagram"></i></div>
                    <div class="stat-number"><span class="counter" data-count="150" data-suffix="+">0</span></div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-number"><span class="counter" data-count="50" data-suffix="+">0</span></div>
                    <div class="stat-label">Satisfied Clients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-code"></i></div>
                    <div class="stat-number"><span class="counter" data-count="30" data-suffix="+">0</span></div>
                    <div class="stat-label">Team Members</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                    <div class="stat-number"><span class="counter" data-count="12" data-suffix="">0</span></div>
                    <div class="stat-label">Awards Won</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== ABOUT SECTION ========== -->
    @if($about)
    <section class="section section-bg" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <div class="about-badge reveal-left">
                        <i class="fas fa-star"></i> About Us
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

                    @if($about->description)
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
                            Our team of skilled developers, designers, and strategists work collaboratively to turn your ideas into powerful software that drives growth and efficiency.
                        </p>
                    @endif

                    @if($about->features && count($about->features) > 0)
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

                    <a href="{{ route('about') }}" class="btn btn-primary reveal-left">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="about-visual reveal-right">
                    <div class="about-floating-shape"></div>
                    <div class="about-image-wrapper">
                        @if($about->image)
                            <img src="{{ Storage::url($about->image) }}" alt="Our Team" loading="lazy">
                        @else
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800" alt="Our Team" loading="lazy">
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
    @endif

    <!-- ========== SERVICES SECTION ========== -->
    @if($services && count($services) > 0)
    <section class="section" id="services">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-cog"></i> Our Services
                </div>
                <h2 class="section-title reveal">
                    Solutions That Drive <span class="gradient-text">Business Growth</span>
                </h2>
                <p class="section-subtitle reveal">
                    From concept to deployment, we offer comprehensive software development services tailored to your unique business needs.
                </p>
            </div>

            <div class="services-grid stagger-children">
                @foreach($services as $service)
                <div class="service-card tilt-card">
                    <div class="service-icon"><i class="{{ $service->icon ?? 'fas fa-code' }}"></i></div>
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-desc">{{ $service->short_description ?? $service->description }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 50px;" class="reveal">
                <a href="{{ route('services') }}" class="btn btn-outline">
                    View All Services <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- ========== TECHNOLOGIES SECTION ========== -->
    @if($technologies && count($technologies) > 0)
    <section class="section section-bg" id="technologies">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-microchip"></i> Technologies
                </div>
                <h2 class="section-title reveal">
                    Technologies We <span class="gradient-text">Master</span>
                </h2>
                <p class="section-subtitle reveal">
                    We leverage the latest technologies to build cutting-edge solutions that stand the test of time.
                </p>
            </div>
        </div>

        <div class="tech-marquee">
            <div class="tech-track">
                @foreach($technologies as $tech)
                <div class="tech-item">
                    <div class="tech-item-icon"><i class="{{ $tech->icon }}" style="color: {{ $tech->color ?? '#6c757d' }};"></i></div>
                    <span class="tech-item-name">{{ $tech->name }}</span>
                </div>
                @endforeach
                <!-- Duplicate for infinite scroll -->
                @foreach($technologies as $tech)
                <div class="tech-item">
                    <div class="tech-item-icon"><i class="{{ $tech->icon }}" style="color: {{ $tech->color ?? '#6c757d' }};"></i></div>
                    <span class="tech-item-name">{{ $tech->name }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ========== INDUSTRIES SECTION ========== -->
    @if($industries && count($industries) > 0)
    <section class="section section-dark" id="industries">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-industry"></i> Industries
                </div>
                <h2 class="section-title reveal">
                    Industries We <span class="gradient-text">Serve</span>
                </h2>
                <p class="section-subtitle reveal">
                    We deliver tailored software solutions across diverse industries, understanding unique challenges and requirements.
                </p>
            </div>

            <div class="industries-grid stagger-children">
                @foreach($industries as $industry)
                <div class="industry-card">
                    <div class="industry-icon"><i class="{{ $industry->icon ?? 'fas fa-building' }}"></i></div>
                    <h3 class="industry-name">{{ $industry->name }}</h3>
                    <p class="industry-desc">{{ $industry->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ========== WHY CHOOSE US ========== -->
    @if($whyChooseUs && count($whyChooseUs) > 0)
    <section class="section" id="why-choose">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-medal"></i> Why Choose Us
                </div>
                <h2 class="section-title reveal">
                    Why Clients <span class="gradient-text">Trust Us</span>
                </h2>
                <p class="section-subtitle reveal">
                    Our commitment to excellence and innovation sets us apart in the competitive software development landscape.
                </p>
            </div>

            <div class="choose-grid stagger-children">
                @foreach($whyChooseUs as $item)
                <div class="choose-card tilt-card">
                    <div class="choose-number">{{ str_pad($item->number ?? ($loop->iteration), 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="choose-icon"><i class="{{ $item->icon ?? 'fas fa-check-circle' }}"></i></div>
                    <h3 class="choose-title">{{ $item->title }}</h3>
                    <p class="choose-desc">{{ $item->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ========== PROCESS SECTION ========== -->
    @if($processes && count($processes) > 0)
    <section class="section section-dark" id="process">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-project-diagram"></i> Our Process
                </div>
                <h2 class="section-title reveal">
                    How We <span class="gradient-text">Work</span>
                </h2>
                <p class="section-subtitle reveal">
                    Our streamlined development process ensures transparency, efficiency, and exceptional results.
                </p>
            </div>

            <div class="process-timeline stagger-children">
                @foreach($processes as $process)
                <div class="process-step">
                    <div class="process-step-number">{{ str_pad($process->step_number ?? $loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="process-step-icon"><i class="{{ $process->icon ?? 'fas fa-cog' }}"></i></div>
                    <h3 class="process-step-title">{{ $process->title }}</h3>
                    <p class="process-step-desc">{{ $process->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ========== PROJECTS SECTION ========== -->
    @if($projects && count($projects) > 0)
    <section class="section section-bg" id="projects">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-briefcase"></i> Portfolio
                </div>
                <h2 class="section-title reveal">
                    Our Featured <span class="gradient-text">Projects</span>
                </h2>
                <p class="section-subtitle reveal">
                    Explore our diverse portfolio of successful projects delivered to clients worldwide.
                </p>
            </div>

            <div class="projects-filter reveal">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="web">Web App</button>
                <button class="filter-btn" data-filter="mobile">Mobile</button>
                <button class="filter-btn" data-filter="erp">ERP</button>
                <button class="filter-btn" data-filter="ecommerce">E-Commerce</button>
            </div>

            <div class="projects-grid">
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
            </div>

            <div style="text-align: center; margin-top: 50px;" class="reveal">
                <a href="{{ route('projects') }}" class="btn btn-outline">
                    View All Projects <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- ========== TESTIMONIALS SECTION ========== -->
    @if($testimonials && count($testimonials) > 0)
    <section class="section" id="testimonials">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-quote-left"></i> Testimonials
                </div>
                <h2 class="section-title reveal">
                    What Our Clients <span class="gradient-text">Say</span>
                </h2>
                <p class="section-subtitle reveal">
                    Don't just take our word for it. Here's what our valued clients have to say about working with us.
                </p>
            </div>

            <div class="testimonials-grid stagger-children">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-card tilt-card">
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
            </div>
        </div>
    </section>
    @endif

    <!-- ========== FAQ SECTION ========== -->
    @if($faqs && count($faqs) > 0)
    <section class="section section-bg" id="faq">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-question-circle"></i> FAQ
                </div>
                <h2 class="section-title reveal">
                    Frequently Asked <span class="gradient-text">Questions</span>
                </h2>
                <p class="section-subtitle reveal">
                    Got questions? We've got answers. Find everything you need to know about our services.
                </p>
            </div>

            <div class="faq-container">
                @foreach($faqs as $faq)
                <div class="faq-item{{ $loop->first ? ' active' : '' }}">
                    <div class="faq-question">
                        <h4>{{ $faq->question }}</h4>
                        <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                    </div>
                    <div class="faq-answer"{{ $loop->first ? ' style="max-height: 200px;"' : '' }}>
                        <div class="faq-answer-content">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ========== CTA SECTION ========== -->
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

    <!-- ========== CONTACT SECTION ========== -->
    <section class="section" id="contact">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-envelope"></i> Contact Us
                </div>
                <h2 class="section-title reveal">
                    Get In <span class="gradient-text">Touch</span>
                </h2>
                <p class="section-subtitle reveal">
                    Have a project in mind? We'd love to hear from you. Send us a message and we'll respond within 24 hours.
                </p>
            </div>

            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-info-content">
                            <h4>Our Office</h4>
                            <p>Office No. 123, Tech Hub,<br>Lahore, Pakistan</p>
                        </div>
                    </div>

                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-info-content">
                            <h4>Email Us</h4>
                            <a href="mailto:info@ipsoftwaretechnologies.com">info@ipsoftwaretechnologies.com</a>
                        </div>
                    </div>

                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="contact-info-content">
                            <h4>Call Us</h4>
                            <a href="tel:+923001234567">+92 300 123 4567</a>
                        </div>
                    </div>

                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-clock"></i></div>
                        <div class="contact-info-content">
                            <h4>Working Hours</h4>
                            <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper reveal-right">
                    <h3 class="contact-form-title">Send Us a Message</h3>
                    <p class="contact-form-subtitle">Fill out the form below and we'll get back to you shortly.</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address *</label>
                                <input type="email" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+92 300 123 4567" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Service Interested In</label>
                                <select name="service" class="form-control">
                                    <option value="">Select a service</option>
                                    <option value="web-development" {{ old('service') == 'web-development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="laravel-development" {{ old('service') == 'laravel-development' ? 'selected' : '' }}>Laravel Development</option>
                                    <option value="mobile-app-development" {{ old('service') == 'mobile-app-development' ? 'selected' : '' }}>Mobile App Development</option>
                                    <option value="erp-solutions" {{ old('service') == 'erp-solutions' ? 'selected' : '' }}>ERP Solutions</option>
                                    <option value="crm-development" {{ old('service') == 'crm-development' ? 'selected' : '' }}>CRM Development</option>
                                    <option value="e-commerce" {{ old('service') == 'e-commerce' ? 'selected' : '' }}>E-Commerce</option>
                                    <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Your Message *</label>
                            <textarea name="message" class="form-control" placeholder="Tell us about your project..." required>{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            Send Message <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
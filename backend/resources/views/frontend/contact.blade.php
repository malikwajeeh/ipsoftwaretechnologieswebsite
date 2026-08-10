@extends('frontend.layouts.app')

@section('title', 'Contact Us | IP Software Technologies')
@section('meta_description', 'Contact IP Software Technologies - Get in touch for custom software development, web applications, mobile apps, ERP solutions, and more.')
@section('meta_keywords', 'contact, software development, web development, laravel, php, flutter, ERP, CRM, mobile app development')

@section('content')
    <section class="page-hero">
        <div class="page-hero-bg">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1600" alt="Contact Background" loading="lazy">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-hero-title reveal">Contact Us</h1>
                <nav class="breadcrumb reveal" aria-label="breadcrumb">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="separator"><i class="fas fa-chevron-right"></i></li>
                        <li class="active">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="section" id="contact-info">
        <div class="container">
            <div class="contact-cards-grid">
                <div class="contact-card tilt-card reveal">
                    <div class="contact-card-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="contact-card-title">Our Office</h3>
                    <p class="contact-card-text">Office No. 123, Tech Hub,<br>Lahore, Pakistan</p>
                </div>

                <div class="contact-card tilt-card reveal">
                    <div class="contact-card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="contact-card-title">Email Us</h3>
                    <a href="mailto:info@ipsoftwaretechnologies.com" class="contact-card-text">info@ipsoftwaretechnologies.com</a>
                </div>

                <div class="contact-card tilt-card reveal">
                    <div class="contact-card-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="contact-card-title">Call Us</h3>
                    <a href="tel:+923001234567" class="contact-card-text">+92 300 123 4567</a>
                </div>

                <div class="contact-card tilt-card reveal">
                    <div class="contact-card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="contact-card-title">Working Hours</h3>
                    <p class="contact-card-text">Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 2:00 PM</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-bg" id="contact">
        <div class="container">
            <div class="section-header">
                <div class="section-badge reveal">
                    <i class="fas fa-paper-plane"></i> Get In Touch
                </div>
                <h2 class="section-title reveal">
                    Let's Start a <span class="gradient-text">Conversation</span>
                </h2>
                <p class="section-subtitle reveal">
                    Have a project in mind? We'd love to hear from you. Send us a message and we'll respond within 24 hours.
                </p>
            </div>

            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-headset"></i></div>
                        <div class="contact-info-content">
                            <h4>General Inquiries</h4>
                            <a href="mailto:info@ipsoftwaretechnologies.com">info@ipsoftwaretechnologies.com</a>
                            <p>For general questions and information about our services.</p>
                        </div>
                    </div>

                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-briefcase"></i></div>
                        <div class="contact-info-content">
                            <h4>Business Development</h4>
                            <a href="mailto:sales@ipsoftwaretechnologies.com">sales@ipsoftwaretechnologies.com</a>
                            <p>For partnership opportunities and business collaborations.</p>
                        </div>
                    </div>

                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-life-ring"></i></div>
                        <div class="contact-info-content">
                            <h4>Technical Support</h4>
                            <a href="mailto:support@ipsoftwaretechnologies.com">support@ipsoftwaretechnologies.com</a>
                            <p>For existing clients needing support assistance.</p>
                        </div>
                    </div>

                    <div class="contact-info-card reveal-left">
                        <div class="contact-info-icon"><i class="fas fa-users"></i></div>
                        <div class="contact-info-content">
                            <h4>Careers</h4>
                            <a href="mailto:careers@ipsoftwaretechnologies.com">careers@ipsoftwaretechnologies.com</a>
                            <p>Join our team and build the future of technology.</p>
                        </div>
                    </div>

                    <div class="contact-social reveal-left">
                        <h4>Follow Us</h4>
                        <div class="contact-social-links">
                            <a href="#" class="contact-social-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="contact-social-link" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="contact-social-link" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="contact-social-link" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="contact-social-link" aria-label="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper reveal-right">
                    <div class="contact-form-header">
                        <h3 class="contact-form-title">Send Us a Message</h3>
                        <p class="contact-form-subtitle">Fill out the form below and we'll get back to you shortly.</p>
                    </div>

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

                    <form id="contactForm" class="contact-form" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Full Name <span class="required">*</span></label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address <span class="required">*</span></label>
                                <div class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" name="phone" class="form-control" placeholder="+92 300 123 4567" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Service Interested In</label>
                                <div class="input-icon">
                                    <i class="fas fa-cog"></i>
                                    <select name="service" class="form-control">
                                        <option value="">Select a service</option>
                                        <option value="web-development" {{ old('service') == 'web-development' ? 'selected' : '' }}>Web Development</option>
                                        <option value="laravel-development" {{ old('service') == 'laravel-development' ? 'selected' : '' }}>Laravel Development</option>
                                        <option value="mobile-app-development" {{ old('service') == 'mobile-app-development' ? 'selected' : '' }}>Mobile App Development</option>
                                        <option value="erp-solutions" {{ old('service') == 'erp-solutions' ? 'selected' : '' }}>ERP Solutions</option>
                                        <option value="crm-development" {{ old('service') == 'crm-development' ? 'selected' : '' }}>CRM Development</option>
                                        <option value="e-commerce" {{ old('service') == 'e-commerce' ? 'selected' : '' }}>E-Commerce</option>
                                        <option value="ui-ux-design" {{ old('service') == 'ui-ux-design' ? 'selected' : '' }}>UI/UX Design</option>
                                        <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Your Message <span class="required">*</span></label>
                            <div class="input-icon textarea-icon">
                                <i class="fas fa-comment"></i>
                                <textarea name="message" class="form-control" placeholder="Tell us about your project..." rows="5" required>{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            Send Message <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="map-container">
            <div class="map-placeholder">
                <div class="map-overlay">
                    <div class="map-info">
                        <div class="map-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Find Us Here</h3>
                        <p>Office No. 123, Tech Hub,<br>Lahore, Pakistan</p>
                        <a href="https://maps.google.com" target="_blank" class="btn btn-primary btn-sm">
                            Open in Google Maps <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27225.92867341539!2d74.3313754!3d31.5203695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3918ff80baddd30b%3A0x52de35f650b5aab4!2sLahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1699999999999!5m2!1sen!2s"
                    width="100%"
                    height="450"
                    style="border:0; filter: grayscale(30%) contrast(110%);"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <section class="section cta-section">
        <div class="cta-shape cta-shape-1"></div>
        <div class="cta-shape cta-shape-2"></div>
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title reveal">Have an Urgent Project?</h2>
                <p class="cta-desc reveal">Call us directly and speak with our team. We're here to help you bring your vision to life.</p>
                <div class="cta-buttons reveal">
                    <a href="tel:+923001234567" class="btn btn-white btn-lg">
                        <i class="fas fa-phone"></i> Call Us Now
                    </a>
                    <a href="https://wa.me/923001234567" target="_blank" class="btn btn-glass btn-lg">
                        <i class="fab fa-whatsapp"></i> WhatsApp Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

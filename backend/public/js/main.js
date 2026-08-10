/* ============================================
   IP Software Technologies - Main JavaScript
   ============================================ */

document.addEventListener('DOMContentLoaded', function() {
    // ---------- Page Loader ----------
    const pageLoader = document.querySelector('.page-loader');
    if (pageLoader) {
        window.addEventListener('load', function() {
            setTimeout(function() {
                pageLoader.classList.add('loaded');
                document.body.classList.remove('loading');
            }, 2000);
        });
        // Fallback - remove loader after 4 seconds max
        setTimeout(function() {
            pageLoader.classList.add('loaded');
            document.body.classList.remove('loading');
        }, 4000);
    }

    // ---------- Scroll Progress Bar ----------
    const scrollProgress = document.querySelector('.scroll-progress');
    if (scrollProgress) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrollTop / docHeight) * 100;
            scrollProgress.style.width = progress + '%';
        });
    }

    // ---------- Header Scroll Effect ----------
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
                header.classList.remove('transparent');
            } else {
                header.classList.remove('scrolled');
                header.classList.add('transparent');
            }
        });
        // Initial state
        if (window.scrollY <= 50) {
            header.classList.add('transparent');
        }
    }

    // ---------- Mobile Menu Toggle ----------
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        });

        // Close on link click
        mobileMenu.querySelectorAll('.nav-link').forEach(function(link) {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    // ---------- Active Nav Link on Scroll ----------
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    function setActiveNav() {
        const scrollPos = window.scrollY + 150;
        sections.forEach(function(section) {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');
            if (scrollPos >= top && scrollPos < top + height) {
                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }
    window.addEventListener('scroll', setActiveNav);

    // ---------- Smooth Scroll for Anchor Links ----------
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const header = document.querySelector('.header');
                const preHeader = document.querySelector('.pre-header');
                const headerHeight = header ? header.offsetHeight : 80;
                const preHeaderHeight = preHeader ? preHeader.offsetHeight : 0;
                const targetPosition = target.offsetTop - headerHeight - preHeaderHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ---------- Scroll Reveal Animations ----------
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale, .stagger-children');

    function revealOnScroll() {
        const windowHeight = window.innerHeight;
        revealElements.forEach(function(el) {
            const elementTop = el.getBoundingClientRect().top;
            const elementVisible = 120;
            if (elementTop < windowHeight - elementVisible) {
                el.classList.add('revealed');
            }
        });
    }

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Initial check

    // ---------- Animated Counter ----------
    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(function() {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            el.textContent = Math.floor(current).toLocaleString();
            if (el.getAttribute('data-suffix')) {
                el.textContent += el.getAttribute('data-suffix');
            }
        }, 16);
    }

    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(function(counter) {
        counterObserver.observe(counter);
    });

    // ---------- FAQ Accordion ----------
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(function(item) {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            // Close all
            faqItems.forEach(function(i) {
                i.classList.remove('active');
                i.querySelector('.faq-answer').style.maxHeight = '0';
            });
            // Open clicked if it wasn't active
            if (!isActive) {
                item.classList.add('active');
                const answer = item.querySelector('.faq-answer');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    // ---------- Project Filter ----------
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(function(b) { b.classList.remove('active'); });
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            projectCards.forEach(function(card) {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    setTimeout(function() {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.8)';
                    setTimeout(function() {
                        card.style.display = 'none';
                    }, 400);
                }
            });
        });
    });

    // ---------- Back to Top Button ----------
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ---------- Typed.js Effect (Typing Animation) ----------
    const typingElement = document.querySelector('.typing-text');
    if (typingElement) {
        const words = JSON.parse(typingElement.getAttribute('data-words'));
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typingSpeed = 100;

        function typeEffect() {
            const currentWord = words[wordIndex];

            if (isDeleting) {
                typingElement.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
                typingSpeed = 50;
            } else {
                typingElement.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
                typingSpeed = 100;
            }

            if (!isDeleting && charIndex === currentWord.length) {
                isDeleting = true;
                typingSpeed = 2000; // Pause at end
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                typingSpeed = 500; // Pause before new word
            }

            setTimeout(typeEffect, typingSpeed);
        }

        typeEffect();
    }

    // ---------- Parallax Effect ----------
    const parallaxElements = document.querySelectorAll('[data-parallax]');
    if (parallaxElements.length > 0) {
        window.addEventListener('scroll', function() {
            parallaxElements.forEach(function(el) {
                const speed = parseFloat(el.getAttribute('data-parallax')) || 0.5;
                const yPos = -(window.scrollY * speed);
                el.style.transform = 'translateY(' + yPos + 'px)';
            });
        });
    }

    // ---------- Tilt Card Effect ----------
    const tiltCards = document.querySelectorAll('.tilt-card');
    tiltCards.forEach(function(card) {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;

            card.style.transform = 'perspective(1000px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) scale3d(1.02, 1.02, 1.02)';
        });

        card.addEventListener('mouseleave', function() {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        });
    });

    // ---------- Cursor Follower ----------
    const cursor = document.querySelector('.cursor-follower');
    if (cursor && window.innerWidth > 768) {
        let mouseX = 0, mouseY = 0;
        let cursorX = 0, cursorY = 0;

        document.addEventListener('mousemove', function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        function animateCursor() {
            cursorX += (mouseX - cursorX) * 0.1;
            cursorY += (mouseY - cursorY) * 0.1;
            cursor.style.left = cursorX + 'px';
            cursor.style.top = cursorY + 'px';
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Hover effect on interactive elements
        document.querySelectorAll('a, button, .service-card, .project-card, .tech-item').forEach(function(el) {
            el.addEventListener('mouseenter', function() { cursor.classList.add('active'); });
            el.addEventListener('mouseleave', function() { cursor.classList.remove('active'); });
        });
    }

    // ---------- Contact Form Submission ----------
    const contactForm = document.querySelector('#contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            const formData = new FormData(form);

            // Loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
            })
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Network response was not ok');
            })
            .then(function(data) {
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
                submitBtn.style.background = '#10B981';
                form.reset();

                setTimeout(function() {
                    submitBtn.innerHTML = originalText;
                    submitBtn.style.background = '';
                    submitBtn.disabled = false;
                }, 3000);

                // Show success alert
                var alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success';
                alertDiv.textContent = 'Your message has been sent successfully!';
                alertDiv.style.cssText = 'position:fixed;top:100px;right:20px;z-index:99999;padding:16px 24px;background:#10B981;color:#fff;border-radius:8px;box-shadow:0 4px 20px rgba(0,0,0,0.15);';
                document.body.appendChild(alertDiv);
                setTimeout(function() { alertDiv.remove(); }, 5000);
            })
            .catch(function() {
                // Fallback: submit form normally
                form.submit();
            });
        });
    }

    // ---------- Newsletter Form ----------
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const input = this.querySelector('input');
            const originalValue = input.value;
            input.value = 'Thank you for subscribing!';
            input.style.color = '#10B981';
            setTimeout(function() {
                input.value = '';
                input.style.color = '';
            }, 3000);
        });
    }

    // ---------- Service Card Hover Sound (Optional) ----------
    // Uncomment below to add subtle hover sounds
    // const hoverSound = new Audio('assets/sounds/hover.mp3');
    // document.querySelectorAll('.service-card, .project-card').forEach(card => {
    //     card.addEventListener('mouseenter', () => {
    //         hoverSound.volume = 0.1;
    //         hoverSound.play();
    //     });
    // });

    // ---------- Lazy Load Images ----------
    const lazyImages = document.querySelectorAll('img[data-src]');
    if (lazyImages.length > 0) {
        const imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.getAttribute('data-src');
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        }, { rootMargin: '50px' });

        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    }

    // ---------- Dynamic Year in Footer ----------
    const yearSpan = document.querySelector('.current-year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }

    // ---------- WhatsApp Button Tooltip ----------
    const whatsappBtn = document.querySelector('.whatsapp-btn');
    if (whatsappBtn) {
        whatsappBtn.addEventListener('mouseenter', function() {
            this.setAttribute('title', 'Chat with us on WhatsApp');
        });
    }

    // ---------- Navbar Scroll to Section on Page Load ----------
    if (window.location.hash) {
        setTimeout(function() {
            const target = document.querySelector(window.location.hash);
            if (target) {
                const header = document.querySelector('.header');
                const preHeader = document.querySelector('.pre-header');
                const headerHeight = header ? header.offsetHeight : 80;
                const preHeaderHeight = preHeader ? preHeader.offsetHeight : 0;
                window.scrollTo({
                    top: target.offsetTop - headerHeight - preHeaderHeight,
                    behavior: 'smooth'
                });
            }
        }, 100);
    }
});

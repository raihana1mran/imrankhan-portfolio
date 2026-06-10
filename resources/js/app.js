import './bootstrap';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', function() {
    // Floating background shapes animation
    gsap.to('.shape', {
        y: 'random(-50, 50)',
        x: 'random(-30, 30)',
        duration: 'random(8, 15)',
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        stagger: {
            each: 0.5,
            from: 'random'
        }
    });

    // Hero section animations
    gsap.from('.hero-text > *', {
        y: 50,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: 'power3.out'
    });

    gsap.from('.hero-visual', {
        x: 50,
        opacity: 0,
        duration: 1.2,
        delay: 0.5,
        ease: 'power3.out'
    });

    // Floating cards animation
    gsap.to('.floating-card', {
        y: -15,
        rotation: 2,
        duration: 4,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        stagger: {
            each: 0.5,
            from: 'random'
        }
    });

    // Profile card float animation
    gsap.to('.profile-card-animate', {
        y: -15,
        duration: 6,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut'
    });

    // About section animation
    gsap.from('.about-image', {
        x: -50,
        opacity: 0,
        duration: 1,
        scrollTrigger: {
            trigger: '#about',
            start: 'top 70%'
        }
    });

    gsap.from('.about-text', {
        x: 50,
        opacity: 0,
        duration: 1,
        scrollTrigger: {
            trigger: '#about',
            start: 'top 70%'
        }
    });

    // Service cards animation
    gsap.from('.service-card', {
        y: 50,
        opacity: 0,
        duration: 0.8,
        stagger: 0.15,
        scrollTrigger: {
            trigger: '#services',
            start: 'top 70%'
        }
    });

    // Timeline items animation
    gsap.from('.timeline-item', {
        x: -30,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        scrollTrigger: {
            trigger: '#experience',
            start: 'top 70%'
        }
    });

    // Skills animation
    gsap.from('.skill-item', {
        x: -30,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '#skills',
            start: 'top 70%'
        }
    });

    gsap.from('.tool-item', {
        scale: 0.9,
        opacity: 0,
        duration: 0.5,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '#skills',
            start: 'top 70%'
        }
    });

    // Testimonials animation
    gsap.from('.testimonial-card', {
        y: 50,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        scrollTrigger: {
            trigger: '#testimonials',
            start: 'top 70%'
        }
    });

    // Contact cards animation
    gsap.from('.contact-card', {
        y: 30,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '#contact',
            start: 'top 70%'
        }
    });

    // Skill bars animation on scroll
    gsap.utils.toArray('.skill-progress').forEach(progress => {
        const width = progress.style.width;
        progress.style.width = '0%';
        
        gsap.to(progress, {
            width: width,
            duration: 1.5,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: progress,
                start: 'top 80%'
            }
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-black/90');
        } else {
            navbar.classList.remove('bg-black/90');
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                gsap.to(target, {
                    duration: 1,
                    ease: 'power3.out'
                });
            }
        });
    });

    // Form submission
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = contactForm.querySelector('button');
            const originalText = btn.textContent;
            
            btn.textContent = 'Sending...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.textContent = 'Message Sent!';
                btn.style.background = 'linear-gradient(135deg, #00d4aa 0%, #4f8cf5 100%)';
                
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.disabled = false;
                    contactForm.reset();
                    btn.style.background = '';
                }, 2000);
            }, 1500);
        });
    }
});
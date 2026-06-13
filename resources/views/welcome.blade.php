<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, viewport-fit=cover" name="viewport"/>
    <title>Imran Khan R - Portfolio</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Alpine.js & GSAP -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0F1053", // Deep Navy
                        "deep-navy": "#0F1053",
                        "pale-blue": "#F0F9FF",
                        "light-blue": "#BDE3FF",
                        "surface": "#F0F9FF",
                        "on-surface": "#0F1053",
                        "on-surface-variant": "#464650",
                        "outline-variant": "#c7c5d1",
                        "pure-white": "#FFFFFF"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1.5rem",
                        "3xl": "2.5rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "section-gap": "120px",
                        "margin-desktop": "80px",
                        "gutter": "24px",
                        "margin-mobile": "20px",
                        "container-max": "1280px",
                        "card-padding": "32px"
                    },
                    fontFamily: {
                        "headline": ["Hanken Grotesk", "sans-serif"],
                        "body": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        html.lenis, html.lenis body {
            height: auto;
        }
        .lenis-smooth {
            scroll-behavior: auto !important;
        }
        .lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }
        .lenis-stopped {
            overflow: hidden;
        }
        .lenis-scrolling iframe {
            pointer-events: none;
        }
        body { background-color: #FFFFFF; color: #0F1053; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        .font-headline { font-family: 'Hanken Grotesk', sans-serif; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.5); }
        .step-number { -webkit-text-stroke: 1px #0F1053; color: transparent; font-size: 8rem; line-height: 1; opacity: 0.1; }
        .outline-num { -webkit-text-stroke: 1px currentColor; color: transparent; transition: all 0.3s ease; }
        .hover-card:hover .outline-num { opacity: 0.2; transform: scale(1.1); -webkit-text-stroke: 1px white; color: rgba(255,255,255,0.1); }
        
        /* Pre-hide sections for GSAP fade-in */
        .reveal-section { opacity: 0; transform: translateY(40px); }

        /* 3D Tilt Reveal Animation for timeline cards via Alpine.js transitions */
        .transition-3d-enter-active {
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 20;
        }
        .transition-3d-enter-from {
            opacity: 0;
            transform: translateY(20px) scale(0.96);
        }
        .transition-3d-enter-to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .transition-3d-leave-active {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 10;
        }
        .transition-3d-leave-from {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .transition-3d-leave-to {
            opacity: 0;
            transform: translateY(-20px) scale(0.96);
        }
        /* Alternating 3D Tilt Reveal Animation for even timeline cards */
        .transition-3d-even-enter-active {
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 20;
        }
        .transition-3d-even-enter-from {
            opacity: 0;
            transform: translateY(20px) scale(0.96);
        }
        .transition-3d-even-enter-to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .transition-3d-even-leave-active {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 10;
        }
        .transition-3d-even-leave-from {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .transition-3d-even-leave-to {
            opacity: 0;
            transform: translateY(-20px) scale(0.96);
        }
        .hover-tilt-3d {
            transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s ease;
            transform-style: preserve-3d;
        }
        .hover-tilt-3d:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(-5deg) translateY(-5px);
            box-shadow: 0 20px 35px rgba(15, 16, 83, 0.12);
        }
        .sliding-italic-text {
            display: block;
            transform: skewX(-12deg) translateX(0);
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease;
        }
        .sliding-italic-text:hover {
            transform: skewX(0deg) translateX(15px);
            opacity: 0.25;
        }

        /* New Hero Keyframe Animations */
        @keyframes drift {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(25px, -35px) scale(1.1); }
            100% { transform: translate(0, 0) scale(1); }
        }
        .hero-gradient-bubble {
            animation: drift 14s ease-in-out infinite;
        }

        @keyframes float-slow {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(4deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .float-element {
            animation: float-slow 7s ease-in-out infinite;
        }

        /* Perspective rendering for mouse parallax */
        #hero-section {
            perspective: 1200px;
        }
        @keyframes scroll-wheel {
            0% { transform: translateY(0); opacity: 1; }
            50% { transform: translateY(6px); opacity: 0.3; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .scroll-wheel-dot {
            animation: scroll-wheel 1.6s ease-in-out infinite;
        }
        .glow-border-card {
            position: relative;
            transition: border-color 0.4s ease, box-shadow 0.4s ease, transform 0.4s ease;
            border: 1px solid transparent;
        }
        .glow-border-card:hover {
            border-color: rgba(189, 227, 255, 0.6);
            box-shadow: 0 0 20px rgba(189, 227, 255, 0.4), 0 10px 25px rgba(15, 16, 83, 0.08);
        }
        .competency-card {
            position: relative;
            transition: border-color 0.5s ease, box-shadow 0.5s ease, transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
            border: 1px solid transparent;
        }
        .competency-card:hover {
            border-color: rgba(189, 227, 255, 0.5);
            box-shadow: 0 0 30px rgba(189, 227, 255, 0.6);
            transform: translateY(-6px);
        }

        /* Shine Sweep Effect */
        .shine-card {
            position: relative;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), border-color 0.4s ease, box-shadow 0.4s ease;
        }
        .shine-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent
            );
            transform: skewX(-20deg);
        }
        .shine-card:hover {
            transform: scale(1.05);
        }
        .shine-card:hover::after {
            animation: shine-sweep 1.2s ease-in-out;
        }
        @keyframes shine-sweep {
            0% { left: -150%; }
            100% { left: 150%; }
        }

        /* 3D Flip Card CSS */
        .perspective-container {
            perspective: 1000px;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
        }
        .flip-card-inner.is-flipped {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            border-radius: 1.5rem; /* rounded-3xl equivalent */
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }

        /* Animated underline links */
        .footer-link-underline {
            position: relative;
            display: inline-block;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-link-underline::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 1px;
            bottom: -1px;
            left: 0;
            background-color: #BDE3FF; /* light-blue */
            transform-origin: bottom right;
            transition: transform 0.35s ease-out;
        }
        .footer-link-underline:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        /* Particle Movement */
        @keyframes float-particle {
            0% { transform: translateY(0px) translateX(0px); opacity: 0.15; }
            50% { transform: translateY(-40px) translateX(20px); opacity: 0.75; }
            100% { transform: translateY(0px) translateX(0px); opacity: 0.15; }
        }
        .float-particle {
            animation: float-particle infinite ease-in-out;
        }
        .footer-fade-item {
            opacity: 0;
        }

        /* Safe Areas and Dynamic Island support */
        nav.fixed {
            padding-top: calc(1rem + env(safe-area-inset-top, 0px)) !important;
            padding-bottom: 1rem !important;
        }
        main {
            padding-top: calc(6rem + env(safe-area-inset-top, 0px)) !important;
        }

        /* Hero Parallax Badge Responsive Sizing */
        .hero-parallax-badge {
            position: absolute;
            bottom: 24px;
            right: 24px;
            border-radius: 1.5rem;
            padding: 20px;
            max-width: 200px;
            box-sizing: border-box;
        }
        @media (max-width: 640px) {
            .hero-parallax-badge {
                bottom: 12px !important;
                right: 12px !important;
                padding: 12px !important;
                max-width: 145px !important;
                border-radius: 1rem !important;
            }
            .hero-parallax-badge h4 {
                font-size: 10px !important;
            }
            .hero-parallax-badge p {
                font-size: 8px !important;
            }
        }

        @media (max-width: 400px) {
            h1, h2 {
                word-break: break-word;
            }
        }

        /* Section 3: AI Expertise Section Sizing */
        .expertise-sec {
            max-width: 1320px;
            width: 100%;
            margin: 50px auto 0 auto;
            box-sizing: border-box;
        }
        @media (max-width: 1024px) {
            .expertise-sec {
                margin: 30px auto 0 auto !important;
            }
        }

        /* Section 3: AI Expertise Grid and Card Responsive Styling */
        .expertise-grid-container {
            min-height: 320px !important;
        }
        .expertise-item-card {
            width: 280px;
            height: 320px;
            box-sizing: border-box;
            transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275), opacity 0.8s ease;
        }
        .expertise-item-card ul {
            max-height: 200px !important;
        }
        @media (max-width: 1280px) {
            .expertise-item-card {
                width: 250px;
                height: 310px;
            }
            .expertise-item-card ul {
                max-height: 180px !important;
            }
        }
        @media (max-width: 1024px) {
            .expertise-item-card {
                width: 280px;
                height: 320px;
            }
            .expertise-item-card ul {
                max-height: 200px !important;
            }
        }
        @media (max-width: 640px) {
            .expertise-item-card {
                width: 100% !important;
                max-width: 320px;
                height: 320px;
            }
        }

        /* Section 4: Professional Journey Responsive Styling */
        .experience-sec {
            max-width: 1320px;
            width: 100%;
            height: 400px;
            margin: 120px auto 0 auto;
            box-sizing: border-box;
        }
        .experience-grid {
            height: 260px;
        }
        @media (max-width: 1024px) {
            .experience-sec {
                height: auto !important;
                margin: 60px auto 0 auto !important;
            }
            .experience-grid {
                height: auto !important;
            }
            .timeline-details-panel {
                min-height: 280px !important;
            }
            .job-card-details {
                width: 100% !important;
                height: 240px !important;
            }
        }
        @media (max-width: 640px) {
            .timeline-list-container {
                align-items: center !important;
                padding-right: 0 !important;
            }
            .timeline-item-text {
                align-items: center !important;
                text-align: center !important;
            }
            .timeline-item-text p {
                text-align: center !important;
            }
            .timeline-list-container .absolute {
                display: none !important; /* Hide vertical timeline line on mobile to keep clean stacked look */
            }
            .timeline-dot {
                display: none !important; /* Hide dot as well since the line is hidden */
            }
            .timeline-details-panel {
                padding-left: 0 !important;
                align-items: center !important;
            }
            .job-card-details {
                margin-left: auto !important;
                margin-right: auto !important;
            }
        }

        /* Section 5: Core Competencies Responsive Styling */
        .competencies-sec {
            max-width: 1320px;
            width: 100%;
            height: 420px;
            margin: 100px auto 90px auto;
            box-sizing: border-box;
        }
        .competencies-grid {
            width: 624px;
            height: 584px;
            max-width: 100%;
        }
        .competency-item-card {
            width: 300px;
            height: 280px;
            box-sizing: border-box;
        }

        /* Auto Hover Animation for Competency Cards */
        .competency-card.auto-hover {
            background-color: #0F1053 !important; /* bg-primary */
            color: white !important;
        }
        .competency-card.auto-hover h3 {
            color: white !important;
        }
        .competency-card.auto-hover p {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        .competency-card.auto-hover .outline-num {
            opacity: 0.2 !important;
            transform: scale(1.1) !important;
            -webkit-text-stroke: 1px white !important;
            color: rgba(255,255,255,0.1) !important;
        }
        .competency-card.auto-hover .material-symbols-outlined {
            transform: scale(1.1) rotate(12deg) !important;
        }
        @media (max-width: 1024px) {
            .competencies-sec {
                height: auto !important;
                margin: 60px auto 60px auto !important;
            }
            .competencies-grid {
                width: 100% !important;
                height: auto !important;
            }
            .competency-item-card {
                width: 100% !important;
                height: auto !important;
                min-height: 200px !important;
            }
        }

        /* Section 6: Certifications & Tech Stack Responsive Styling */
        .skills-sec {
            max-width: 1320px;
            width: 100%;
            height: auto;
            margin: 15px auto 0 auto;
            box-sizing: border-box;
            padding-bottom: 40px;
        }
        @media (max-width: 1024px) {
            .skills-sec {
                margin: 30px auto 0 auto !important;
            }
        }
        .skills-grid {
            height: 260px;
        }
        .skill-item-card {
            width: 410px;
            max-width: 100%;
            height: 260px;
            box-sizing: border-box;
        }
        .cert-item-card {
            width: 410px;
            max-width: 100%;
            height: 140px;
            box-sizing: border-box;
        }
        @media (max-width: 1024px) {
            .skills-grid {
                height: auto !important;
            }
            .skill-item-card {
                width: 100% !important;
                height: auto !important;
                min-height: 200px !important;
            }
            .cert-item-card {
                width: 100% !important;
                height: auto !important;
                min-height: 130px !important;
            }
        }

        /* Footer Responsive Styling */
        .footer-sec {
            max-width: 1320px;
            width: 100%;
            height: 360px;
            margin: 60px auto 0 auto;
            padding: 40px 40px 20px 40px;
            box-sizing: border-box;
            border-radius: 40px 40px 0 0;
        }
        .footer-col-300 {
            width: 300px;
            max-width: 100%;
            box-sizing: border-box;
        }
        .footer-col-200 {
            width: 200px;
            max-width: 100%;
            box-sizing: border-box;
        }
        @media (max-width: 1024px) {
            .footer-sec {
                height: auto !important;
                margin: 30px auto 0 auto !important;
                padding: 40px 24px 20px 24px !important;
                border-radius: 24px 24px 0 0 !important;
            }
            .footer-col-300, .footer-col-200 {
                width: 100% !important;
            }
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">
    <!-- TopNavBar -->
    <nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-outline-variant/10">
        <div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto">
            <a href="#" class="flex items-center gap-3 group cursor-pointer">
                <span class="font-headline text-lg font-black bg-primary text-white px-2.5 py-0.5 rounded-[6px] tracking-tighter group-hover:scale-105 transition-transform">IKR</span>
                <span class="font-headline text-2xl font-bold tracking-tight text-primary">IMRAN KHAN</span>
            </a>
            <div class="hidden md:flex items-center gap-6">
                <a href="#contact" class="px-6 py-2 rounded-full border border-primary/20 hover:bg-primary hover:text-white transition-all duration-300 font-medium text-sm">Let's Connect</a>
                <div class="flex items-center gap-4 text-primary">
                    <a href="tel:+919715620426" class="hover:text-primary/60 transition-colors"><span class="material-symbols-outlined cursor-pointer">call</span></a>
                    <a href="mailto:111imrankhan111@gmail.com" class="hover:text-primary/60 transition-colors"><span class="material-symbols-outlined cursor-pointer">mail</span></a>
                </div>
            </div>
            
            <!-- Mobile Toggle -->
            <div class="flex md:hidden items-center gap-3">
                <a href="tel:+919715620426" class="hover:text-primary/60 transition-colors flex items-center justify-center w-10 h-10 rounded-full bg-primary/5 text-primary"><span class="material-symbols-outlined text-lg">call</span></a>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-primary hover:text-primary/60 focus:outline-none transition-colors w-10 h-10 flex items-center justify-center rounded-full bg-primary/5" aria-label="Toggle Menu">
                    <span class="material-symbols-outlined" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="-translate-y-full opacity-0"
             x-transition:enter-end="translate-y-0 opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-y-0 opacity-100"
             x-transition:leave-end="-translate-y-full opacity-0"
             class="md:hidden absolute top-full left-0 w-full bg-white border-b border-outline-variant/10 shadow-lg px-margin-mobile py-6 flex flex-col gap-6"
             style="display: none;">
            <div class="flex flex-col gap-4">
                <a href="#achievements" @click="mobileMenuOpen = false" class="font-headline text-base font-bold text-primary hover:text-primary/70 py-2 border-b border-primary/5">Achievements</a>
                <a href="#expertise" @click="mobileMenuOpen = false" class="font-headline text-base font-bold text-primary hover:text-primary/70 py-2 border-b border-primary/5">Expertise</a>
                <a href="#experience" @click="mobileMenuOpen = false" class="font-headline text-base font-bold text-primary hover:text-primary/70 py-2 border-b border-primary/5">Experience</a>
                <a href="#competencies" @click="mobileMenuOpen = false" class="font-headline text-base font-bold text-primary hover:text-primary/70 py-2 border-b border-primary/5">Competencies</a>
                <a href="#skills" @click="mobileMenuOpen = false" class="font-headline text-base font-bold text-primary hover:text-primary/70 py-2 border-b border-primary/5">Certifications</a>
            </div>
            <div class="flex flex-col gap-4 mt-2">
                <a href="#contact" @click="mobileMenuOpen = false" class="px-6 py-3 rounded-full bg-primary text-white hover:bg-primary-dark transition-all duration-300 font-bold text-sm text-center">Let's Connect</a>
                <div class="flex justify-center gap-6 text-primary mt-2">
                    <a href="tel:+919715620426" class="hover:text-primary/60 transition-colors flex items-center gap-2 font-medium text-sm"><span class="material-symbols-outlined text-lg">call</span> Call</a>
                    <a href="mailto:111imrankhan111@gmail.com" class="hover:text-primary/60 transition-colors flex items-center gap-2 font-medium text-sm"><span class="material-symbols-outlined text-lg">mail</span> Email</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="pt-24">
        <!-- Hero Section -->
        <!-- 
            Specs: width 1320px, height 520px, top-margin 80px, padding 40px
            2-col: left 45% (≈594px → set to 520px content), right 55% (≈726px → set to 700px image), gap 3px
        -->
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-10 mb-16 relative overflow-hidden" id="hero-section">
            <!-- Background gradient bubbles -->
            <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-light-blue/20 blur-[100px] pointer-events-none hero-gradient-bubble"></div>
            <div class="absolute -bottom-10 -left-10 w-80 h-80 rounded-full bg-pale-blue/50 blur-[90px] pointer-events-none hero-gradient-bubble"></div>

            <!-- Floating elements -->
            <div class="absolute top-1/4 left-1/2 w-8 h-8 rounded-full bg-light-blue/30 blur-sm float-element pointer-events-none" style="animation-duration: 6s;"></div>
            <div class="absolute bottom-1/3 right-1/3 w-12 h-6 rounded-full bg-primary/5 border border-primary/10 float-element pointer-events-none" style="animation-duration: 9s; animation-delay: 1s;"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch relative z-10">
                <!-- Left Column: Content block -->
                <div class="lg:col-span-6 flex flex-col justify-between gap-6">

                    <!-- Title -->
                    <div class="max-w-md">
                        <h1 class="font-headline font-bold text-primary uppercase tracking-tight text-4xl sm:text-5xl lg:text-[2.6rem] lg:leading-[1.1] m-0 hero-title">
                            <span class="split-char">SALES</span> <span class="font-light uppercase text-light-blue split-char">Excellence</span><br/>
                            <span class="split-char">&amp;</span> <span class="split-char">AI</span> <span class="font-light uppercase text-light-blue split-char">Innovation</span>
                        </h1>
                    </div>

                    <!-- Subtitle -->
                    <p class="text-on-surface-variant/70 uppercase tracking-widest text-[10px] sm:text-xs font-semibold my-2 hero-subtitle opacity-0">
                        <span class="split-char-name text-primary font-bold">Imran Khan R</span> &nbsp;|&nbsp; Madurai, India
                    </p>

                    <!-- CTA Card (dark) -->
                    <div class="bg-primary text-white relative overflow-hidden group hover:shadow-2xl transition-all duration-300 rounded-[1.5rem] p-6 max-w-sm w-full hero-cta-card opacity-0">
                        <div class="relative z-10">
                            <h3 class="text-xs sm:text-sm font-medium leading-relaxed m-0 mb-2">
                                Driving Revenue Growth Through<br/>Strategic Sales &amp; Operational Executive.
                            </h3>
                            <p class="text-[10px] opacity-60 m-0">8+ years · B2B Sales · Retail Ops</p>
                        </div>
                        <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <!-- CTA Light card -->
                    <div class="bg-pale-blue group hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 rounded-[1.5rem] p-6 flex flex-col justify-between gap-4 flex-1 max-w-sm w-full hero-cta-card opacity-0">
                        <div>
                            <p class="text-[10px] font-bold text-primary uppercase tracking-wider opacity-40 m-0 mb-1">Modern Solutions</p>
                            <p class="text-xs sm:text-sm text-primary/80 leading-relaxed m-0">Combining sales leadership with Agentic AI — automation, analytics &amp; CRM.</p>
                        </div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <a href="#experience" class="magnetic-btn flex items-center gap-2 bg-white rounded-full hover:bg-primary hover:text-white transition-all duration-300 group/btn px-4 py-2 text-xs font-bold w-fit text-primary decoration-none">
                                Explore Work <span class="material-symbols-outlined group-hover/btn:translate-x-1 transition-transform text-sm">arrow_forward</span>
                            </a>
                            <a href="/resume.pdf" download class="magnetic-btn flex items-center gap-2 bg-transparent border border-primary/20 rounded-full hover:bg-primary hover:text-white transition-all duration-300 px-4 py-2 text-xs font-bold w-fit text-primary decoration-none">
                                Download Resume <span class="material-symbols-outlined text-sm">download</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Hero Image container -->
                <div class="lg:col-span-6 rounded-[2rem] overflow-hidden relative bg-pale-blue min-h-[350px] sm:min-h-[440px] parallax-container group hero-parallax-target opacity-0">
                    <img
                        alt="Imran Khan R"
                        class="parallax-bg absolute inset-0 w-full h-full object-cover"
                        src="/images/hero-imran.png"
                        style="object-position: center top;"
                    />
                    <!-- Floating badge -->
                    <div class="glass-card hover:-translate-y-1 transition-all duration-300 shadow-lg hero-parallax-badge z-20">
                        <p class="text-[9px] font-bold tracking-widest text-primary uppercase opacity-40 m-0 mb-1">MY APPROACH</p>
                        <h4 class="font-headline font-bold text-primary uppercase text-xs leading-snug m-0 mb-2">DATA-DRIVEN DECISIONS</h4>
                        <a href="#expertise" class="flex items-center gap-1 group/link hover:opacity-60 transition-opacity text-[9px] font-bold tracking-wider text-primary uppercase decoration-none">
                            VIEW EXPERTISE <span class="material-symbols-outlined group-hover/link:-translate-y-1 group-hover/link:translate-x-1 transition-transform text-xs">arrow_outward</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom tagline bar -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center mt-8 pt-4 border-t border-primary/5 hero-tagline opacity-0">
                <p class="text-[10px] font-medium opacity-40 max-w-xs m-0">Specializing in Retail Operations, Area Management &amp; Distributor Networks</p>
                <p class="text-[10px] font-medium opacity-40 max-w-xs sm:text-right m-0">Building high-performing sales teams &amp; modern business solutions.</p>
            </div>

            <!-- Scroll Indicator -->
            <div class="hidden sm:flex absolute bottom-2 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 opacity-60 hover:opacity-100 transition-opacity scroll-down-indicator cursor-pointer z-20" onclick="document.getElementById('achievements').scrollIntoView({behavior: 'smooth'})">
                <span class="text-[9px] font-bold tracking-widest uppercase text-primary">Scroll Down</span>
                <div class="w-[18px] h-[30px] border-2 border-primary rounded-full relative flex justify-center">
                    <div class="w-1 h-2 bg-primary rounded-full absolute top-1.5 scroll-wheel-dot"></div>
                </div>
            </div>
        </section>

        <!-- Core Achievements -->
        <!-- Core Achievements / Statistics -->
        <!--
            Specs: width 1320px, height 450px, top-gap 100px
            3-col: left stats 220px, center image 520px, right text 420px, gap 24px
        -->
        <section class="reveal-section max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-8 mb-24 py-6 overflow-hidden" id="achievements">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center mb-12">
                <h2 class="font-headline font-bold text-primary uppercase text-3xl sm:text-4xl lg:text-5xl leading-none m-0">
                    MEASURABLE <span class="font-light uppercase text-light-blue">Business</span>
                </h2>
                <h2 class="font-headline font-bold text-primary uppercase text-3xl sm:text-4xl lg:text-5xl leading-none m-0 text-left sm:text-right">
                    Growth <span class="font-light uppercase text-light-blue">&amp; Results +</span>
                </h2>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 items-center">
                <!-- Left: Stats Column -->
                <div class="lg:col-span-3 flex flex-col gap-8 w-full">
                    <div class="group cursor-default stat-card transform translate-y-8 opacity-0">
                        <p class="font-headline font-bold text-primary group-hover:-translate-y-1 transition-transform text-4xl sm:text-5xl m-0 mb-1"><span class="count-up" data-target="20">0</span>%</p>
                        <p class="text-xs sm:text-sm text-primary/60 m-0">Market Expansion</p>
                        <div class="mt-3 w-20 h-9 rounded-full overflow-hidden flex items-center justify-center bg-pale-blue group-hover:bg-light-blue transition-colors duration-300">
                            <span class="material-symbols-outlined text-primary/40 group-hover:text-primary group-hover:scale-110 transition-all text-xl">trending_up</span>
                        </div>
                    </div>
                    <div class="group cursor-default stat-card transform translate-y-8 opacity-0">
                        <p class="font-headline font-bold text-primary group-hover:-translate-y-1 transition-transform text-4xl sm:text-5xl m-0 mb-1"><span class="count-up" data-target="15">0</span>%</p>
                        <p class="text-xs sm:text-sm text-primary/60 m-0">Warehouse Efficiency</p>
                        <div class="mt-3 flex">
                            <div class="w-9 h-9 rounded-full border-2 border-white flex items-center justify-center bg-light-blue group-hover:scale-110 transition-transform z-10">
                                <span class="material-symbols-outlined text-primary/60 text-xs">inventory_2</span>
                            </div>
                            <div class="w-9 h-9 rounded-full border-2 border-white flex items-center justify-center -ml-[10px] text-xs bg-primary text-white group-hover:scale-110 transition-transform font-bold">+</div>
                        </div>
                    </div>
                </div>

                <!-- Center: Image Column -->
                <div class="lg:col-span-5 w-full h-[250px] sm:h-[300px] rounded-[2rem] overflow-hidden parallax-container group relative bg-pale-blue">
                    <img alt="Analytics Dashboard" class="parallax-bg absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2000&auto=format&fit=crop"/>
                </div>

                <!-- Right: Text Column -->
                <div class="lg:col-span-4 text-left lg:text-right w-full">
                    <p class="text-[10px] font-bold tracking-widest text-primary/40 uppercase mb-4">CORE ACHIEVEMENTS</p>
                    <p class="text-sm text-primary/70 leading-relaxed max-w-md lg:max-w-none ml-0 lg:ml-auto m-0">
                        Consistently exceeded territory sales targets, optimized inventory planning, and delivered structured performance improvement initiatives to increase overall productivity.
                    </p>
                </div>
            </div>
        </section>

        <!-- AI Expertise -->
        <section class="bg-white reveal-section relative overflow-hidden expertise-sec" id="expertise">
            <!-- Background mesh bubbles for glassmorphism backdrop -->
            <div class="absolute top-1/4 -left-20 w-80 h-80 rounded-full bg-light-blue/15 blur-[90px] pointer-events-none hero-gradient-bubble"></div>
            <div class="absolute bottom-10 -right-10 w-96 h-96 rounded-full bg-pale-blue/45 blur-[100px] pointer-events-none hero-gradient-bubble"></div>

            <div class="px-margin-mobile md:px-margin-desktop relative z-10">
                <div class="flex justify-between items-end mb-10">
                    <div>
                        <h2 class="font-headline text-3xl font-bold text-primary mb-2">Agentic AI &<br/>Automation</h2>
                        <p class="text-xs text-primary/50 max-w-[300px]">Intelligent business solutions tailored for modern sales, recruitment, and operational workflows.</p>
                    </div>
                    <a href="#skills" class="flex items-center gap-2 px-6 py-2.5 rounded-full border border-primary/20 text-xs font-semibold hover:bg-primary hover:text-white transition-all duration-300 group">
                        Technical Skills <span class="material-symbols-outlined text-xs group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[20px] justify-items-center perspective-container expertise-grid-container">
                    <!-- Card 1: Sales Intelligence -->
                    <div x-data="{ flipped: false }" class="relative expertise-card transform translate-y-8 opacity-0 expertise-item-card">
                        <div class="flip-card-inner w-full h-full" :class="flipped ? 'is-flipped' : ''" @mouseenter="flipped = true" @mouseleave="flipped = false">
                            <!-- Front -->
                            <div class="flip-card-front bg-light-blue/30 backdrop-blur-xl border border-light-blue/40 p-4 rounded-3xl flex flex-col justify-between group glow-border-card w-full h-full" 
                                 :class="flipped ? 'pointer-events-none' : 'hover-tilt-3d cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <h3 class="font-headline text-base font-bold relative z-10 group-hover:text-primary/70 transition-colors">Sales Intelligence Agent</h3>
                                <div class="relative z-10">
                                    <p class="text-[11px] text-primary/60 mb-4">AI-powered assistant for lead qualification, pipeline monitoring, and automated follow-ups.</p>
                                    <div class="flex justify-between items-center border-t border-primary/10 pt-3 mt-3">
                                        <span class="text-[9px] font-bold tracking-widest uppercase">AUTOMATION</span>
                                        <span class="material-symbols-outlined text-primary/50 group-hover:text-primary group-hover:rotate-[15deg] transition-all duration-500 text-lg">smart_toy</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Back -->
                            <div class="flip-card-back bg-primary text-white p-4 rounded-3xl flex flex-col justify-between w-full h-full" 
                                 :class="!flipped ? 'pointer-events-none' : 'cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <div>
                                    <h4 class="font-headline text-[13px] font-bold text-light-blue mb-3 border-b border-white/10 pb-2">Sales Intelligence Features</h4>
                                    <ul class="space-y-1 text-[10px] opacity-90 overflow-y-auto pr-1" style="max-height: 160px;">
                                        <li class="flex items-start gap-1.5"><span>🔍</span> <div><strong>Live Research:</strong> Real-time web search for competitor intelligence</div></li>
                                        <li class="flex items-start gap-1.5"><span>📊</span> <div><strong>Feature Analysis:</strong> Deep dive into competitor product capabilities</div></li>
                                        <li class="flex items-start gap-1.5"><span>🎯</span> <div><strong>Positioning Intel:</strong> Uncover how competitors position against you</div></li>
                                        <li class="flex items-start gap-1.5"><span>⚖️</span> <div><strong>SWOT Analysis:</strong> Honest strengths/weaknesses comparison</div></li>
                                        <li class="flex items-start gap-1.5"><span>💬</span> <div><strong>Objection Scripts:</strong> Ready-to-use responses for sales calls</div></li>
                                        <li class="flex items-start gap-1.5"><span>📄</span> <div><strong>Battle Card:</strong> Professional HTML battle card for reps</div></li>
                                        <li class="flex items-start gap-1.5"><span>📈</span> <div><strong>Comparison Infographic:</strong> AI-generated visual comparison</div></li>
                                    </ul>
                                </div>
                                <span class="text-[8px] font-bold tracking-wider text-light-blue/50 text-center uppercase block mt-2">Hover off to return</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Data Analyst Agent -->
                    <div x-data="{ flipped: false }" class="relative expertise-card transform translate-y-8 opacity-0 expertise-item-card">
                        <div class="flip-card-inner w-full h-full" :class="flipped ? 'is-flipped' : ''" @mouseenter="flipped = true" @mouseleave="flipped = false">
                            <!-- Front -->
                            <div class="flip-card-front bg-light-blue/30 backdrop-blur-xl border border-light-blue/40 p-4 rounded-3xl flex flex-col justify-between group glow-border-card w-full h-full" 
                                 :class="flipped ? 'pointer-events-none' : 'hover-tilt-3d cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <h3 class="font-headline text-base font-bold relative z-10 group-hover:text-primary/70 transition-colors">Data Analyst Agent</h3>
                                <div class="relative z-10 space-y-3">
                                    <p class="text-[11px] text-primary/80 font-medium">Platform for KPI monitoring, inventory analytics, and automated executive reporting.</p>
                                    <div class="flex flex-wrap gap-1.5 pt-2">
                                        <span class="px-2 py-0.5 bg-white text-[8px] font-bold tracking-widest rounded-full uppercase group-hover:bg-primary group-hover:text-white transition-colors">SQL</span>
                                        <span class="px-2 py-0.5 bg-white text-[8px] font-bold tracking-widest rounded-full uppercase group-hover:bg-primary group-hover:text-white transition-colors delay-75">TABLEAU</span>
                                        <span class="px-2 py-0.5 bg-white text-[8px] font-bold tracking-widest rounded-full uppercase group-hover:bg-primary group-hover:text-white transition-colors delay-100">DASHBOARDS</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Back -->
                            <div class="flip-card-back bg-primary text-white p-4 rounded-3xl flex flex-col justify-between w-full h-full" 
                                 :class="!flipped ? 'pointer-events-none' : 'cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <div>
                                    <h4 class="font-headline text-[13px] font-bold text-light-blue mb-3 border-b border-white/10 pb-2">Data Analyst Agent Features</h4>
                                    <ul class="space-y-1 text-[10px] opacity-90 overflow-y-auto pr-1" style="max-height: 160px;">
                                        <li class="flex items-start gap-1.5"><span>📤</span> <div><strong>File Upload Support:</strong> Upload CSV/Excel; auto data type detection and schema inference</div></li>
                                        <li class="flex items-start gap-1.5"><span>💬</span> <div><strong>Natural Language Queries:</strong> Convert plain questions to SQL; get instant data answers</div></li>
                                        <li class="flex items-start gap-1.5"><span>🔍</span> <div><strong>Advanced Analysis:</strong> Complex aggregations, statistical summaries, and visual graphs</div></li>
                                        <li class="flex items-start gap-1.5"><span>🎯</span> <div><strong>Interactive UI:</strong> Streamlit-based interface, real-time query processing, clear results</div></li>
                                    </ul>
                                </div>
                                <span class="text-[8px] font-bold tracking-wider text-light-blue/50 text-center uppercase block mt-2">Hover off to return</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Recruitment -->
                    <div x-data="{ flipped: false }" class="relative expertise-card transform translate-y-8 opacity-0 expertise-item-card">
                        <div class="flip-card-inner w-full h-full" :class="flipped ? 'is-flipped' : ''" @mouseenter="flipped = true" @mouseleave="flipped = false">
                            <!-- Front -->
                            <div class="flip-card-front bg-light-blue/30 backdrop-blur-xl border border-light-blue/40 p-4 rounded-3xl flex flex-col justify-between glow-border-card group w-full h-full" 
                                 :class="flipped ? 'pointer-events-none' : 'hover-tilt-3d cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <h3 class="font-headline text-base font-bold relative z-10 group-hover:text-primary/70 transition-colors">Recruitment Intelligence</h3>
                                <div class="relative z-10">
                                    <p class="text-[11px] text-primary/60 mb-4">AI solution for resume screening, candidate matching, and talent pipeline management.</p>
                                    <div class="flex justify-between items-center border-t border-primary/10 pt-3 mt-3">
                                        <span class="text-[9px] font-bold tracking-widest uppercase">HR TECH</span>
                                        <span class="material-symbols-outlined text-primary/50 group-hover:text-primary group-hover:rotate-[15deg] transition-all duration-500 text-lg">group</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Back -->
                            <div class="flip-card-back bg-primary text-white p-4 rounded-3xl flex flex-col justify-between w-full h-full" 
                                 :class="!flipped ? 'pointer-events-none' : 'cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <div>
                                    <h4 class="font-headline text-[13px] font-bold text-light-blue mb-3 border-b border-white/10 pb-2">Technical Recruiter Agent Features</h4>
                                    <ul class="space-y-1 text-[10px] opacity-90 overflow-y-auto pr-1" style="max-height: 160px;">
                                        <li class="flex items-start gap-1.5"><span>🕵️</span> <div><strong>Technical Recruiter:</strong> Analyzes resumes and evaluates technical skills</div></li>
                                        <li class="flex items-start gap-1.5"><span>✉️</span> <div><strong>Communication Agent:</strong> Handles professional email correspondence</div></li>
                                        <li class="flex items-start gap-1.5"><span>📅</span> <div><strong>Scheduling Coordinator:</strong> Manages interview scheduling and coordination</div></li>
                                        <li class="flex items-start gap-1.5"><span>🤝</span> <div><strong>Collaborative Team:</strong> Specific expertise agents collaborate for recruitment</div></li>
                                        <li class="flex items-start gap-1.5"><span>⚙️</span> <div><strong>End-to-End Process:</strong> Automated screening, evaluation, scheduling, and feedback</div></li>
                                    </ul>
                                </div>
                                <span class="text-[8px] font-bold tracking-wider text-light-blue/50 text-center uppercase block mt-2">Hover off to return</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Customer Engagement -->
                    <div x-data="{ flipped: false }" class="relative expertise-card transform translate-y-8 opacity-0 expertise-item-card">
                        <div class="flip-card-inner w-full h-full" :class="flipped ? 'is-flipped' : ''" @mouseenter="flipped = true" @mouseleave="flipped = false">
                            <!-- Front -->
                            <div class="flip-card-front bg-light-blue/30 backdrop-blur-xl border border-light-blue/40 p-4 rounded-3xl flex flex-col justify-between glow-border-card group w-full h-full" 
                                 :class="flipped ? 'pointer-events-none' : 'hover-tilt-3d cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <h3 class="font-headline text-base font-bold relative z-10 group-hover:text-primary/70 transition-colors">Customer Engagement</h3>
                                <div class="relative z-10">
                                    <p class="text-[11px] text-primary/60 mb-4">AI-driven interaction system supporting WhatsApp automation and CRM integrations.</p>
                                    <div class="flex justify-between items-center border-t border-primary/10 pt-3 mt-3">
                                        <span class="text-[9px] font-bold tracking-widest uppercase">CRM</span>
                                        <span class="material-symbols-outlined text-primary/50 group-hover:text-primary group-hover:rotate-[15deg] transition-all duration-500 text-lg">forum</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Back -->
                            <div class="flip-card-back bg-primary text-white p-4 rounded-3xl flex flex-col justify-between w-full h-full" 
                                 :class="!flipped ? 'pointer-events-none' : 'cursor-pointer'" 
                                 style="box-sizing: border-box;">
                                <div>
                                    <h4 class="font-headline text-[13px] font-bold text-light-blue mb-3 border-b border-white/10 pb-2">Customer Support Agent Features</h4>
                                    <ul class="space-y-1 text-[10px] opacity-90 overflow-y-auto pr-1" style="max-height: 160px;">
                                        <li class="flex items-start gap-1.5"><span>💬</span> <div><strong>Interactive Chat:</strong> Chat interface for interacting with the AI support agent</div></li>
                                        <li class="flex items-start gap-1.5"><span>🧠</span> <div><strong>Persistent Memory:</strong> Remembers customer interactions and profiles</div></li>
                                        <li class="flex items-start gap-1.5"><span>📊</span> <div><strong>Synthetic Data:</strong> Generates mock data for testing and demonstrations</div></li>
                                        <li class="flex items-start gap-1.5"><span>🤖</span> <div><strong>GPT-4o Engine:</strong> Utilizes OpenAI's GPT-4o model for responses</div></li>
                                    </ul>
                                </div>
                                <span class="text-[8px] font-bold tracking-wider text-light-blue/50 text-center uppercase block mt-2">Hover off to return</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Professional Experience (Interactive GSAP + Alpine) -->
        <section class="bg-white overflow-visible relative experience-sec" id="experience" 
            x-data="{ activeJob: 'aqualite' }"
            @scroll-job.window="activeJob = $event.detail">
            
            <!-- This container will be pinned by GSAP ScrollTrigger -->
            <div id="experience-pinned-container" class="px-margin-mobile md:px-margin-desktop w-full reveal-section">
                <div class="flex justify-between items-start mb-6">
                    <h2 class="font-headline text-3xl font-bold text-primary m-0">Professional Journey</h2>
                    <div class="text-right">
                        <p class="text-[10px] font-bold tracking-widest text-primary/30 uppercase mb-2">CAREER PATH</p>
                        <ul class="text-[9px] font-bold text-primary/30 space-y-1 uppercase">
                            <li @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'aqualite'}))" :class="activeJob === 'aqualite' ? 'text-primary' : 'hover:text-primary'" class="transition-colors cursor-pointer">2026 - Present</li>
                            <li @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'campus'}))" :class="activeJob === 'campus' ? 'text-primary' : 'hover:text-primary'" class="transition-colors cursor-pointer">2025 - 2026</li>
                            <li @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'jeeth'}))" :class="activeJob === 'jeeth' ? 'text-primary' : 'hover:text-primary'" class="transition-colors cursor-pointer">2023 - 2025</li>
                            <li @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'fashion'}))" :class="activeJob === 'fashion' ? 'text-primary' : 'hover:text-primary'" class="transition-colors cursor-pointer">2020 - 2023</li>
                            <li @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'fenner'}))" :class="activeJob === 'fenner' ? 'text-primary' : 'hover:text-primary'" class="transition-colors cursor-pointer">2018</li>
                        </ul>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-12 items-start experience-grid">
                    <!-- Left Timeline (45%): Align right -->
                    <div class="w-full flex flex-col items-end text-right relative">
                        <p class="text-[10px] font-bold tracking-widest text-primary/30 uppercase mb-6 w-full text-right pr-2">TIMELINE</p>
                        
                        <!-- Visual timeline reversed to match scrolling (Top to Bottom chronologically) -->
                        <div class="space-y-3 pr-8 relative w-full flex flex-col items-end timeline-list-container">
                            <!-- Background timeline track -->
                            <div class="absolute -right-[1px] top-2 bottom-2 w-[2px] bg-primary/10"></div>
                            <!-- Drawing line that fills as you scroll -->
                            <div class="absolute -right-[1px] top-2 bottom-2 w-[2px] bg-primary origin-top timeline-line-draw" style="height: 0%;"></div                            <div class="relative group cursor-pointer w-full flex flex-col items-end timeline-item-text opacity-0" data-job="aqualite" 
                                  @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'aqualite'})); gsap.fromTo('.job-card-details', {opacity: 0, x: 20}, {opacity: 1, x: 0, duration: 0.4, ease: 'power2.out'});">
                                <div class="absolute w-4 h-4 bg-white border-2 rounded-full -right-[41px] top-1.5 transition-all duration-300 timeline-dot opacity-0"
                                     :class="activeJob === 'aqualite' ? 'border-primary bg-primary scale-125' : 'border-primary/20 group-hover:scale-125 group-hover:border-primary'"></div>
                                <p class="font-headline font-bold transition-all duration-300 text-right m-0"
                                     :class="activeJob === 'aqualite' ? 'text-2xl text-primary leading-tight' : 'text-sm text-primary/40 group-hover:text-primary'">Aqualite</p>
                                <p class="text-[10px] font-bold text-primary/20 transition-all duration-300 text-right mt-1"
                                     :class="activeJob === 'aqualite' ? 'text-primary/50 text-[11px]' : ''">2026 - Present</p>
                            </div>

                            <!-- Campus Activewear -->
                            <div class="relative group cursor-pointer w-full flex flex-col items-end timeline-item-text opacity-0" data-job="campus" 
                                  @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'campus'})); gsap.fromTo('.job-card-details', {opacity: 0, x: -20}, {opacity: 1, x: 0, duration: 0.4, ease: 'power2.out'});">
                                <div class="absolute w-4 h-4 bg-white border-2 rounded-full -right-[41px] top-1.5 transition-all duration-300 timeline-dot opacity-0"
                                     :class="activeJob === 'campus' ? 'border-primary bg-primary scale-125' : 'border-primary/20 group-hover:scale-125 group-hover:border-primary'"></div>
                                <p class="font-headline font-bold transition-all duration-300 text-right m-0"
                                     :class="activeJob === 'campus' ? 'text-2xl text-primary leading-tight' : 'text-sm text-primary/40 group-hover:text-primary'">Campus Activewear</p>
                                <p class="text-[10px] font-bold text-primary/20 transition-all duration-300 text-right mt-1"
                                     :class="activeJob === 'campus' ? 'text-primary/50 text-[11px]' : ''">2025 - 2026</p>
                            </div>

                            <!-- Jeeth Enterprises -->
                            <div class="relative group cursor-pointer w-full flex flex-col items-end timeline-item-text opacity-0" data-job="jeeth" 
                                  @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'jeeth'})); gsap.fromTo('.job-card-details', {opacity: 0, x: 20}, {opacity: 1, x: 0, duration: 0.4, ease: 'power2.out'});">
                                <div class="absolute w-4 h-4 bg-white border-2 rounded-full -right-[41px] top-1.5 transition-all duration-300 timeline-dot opacity-0"
                                     :class="activeJob === 'jeeth' ? 'border-primary bg-primary scale-125' : 'border-primary/20 group-hover:scale-125 group-hover:border-primary'"></div>
                                <p class="font-headline font-bold transition-all duration-300 text-right m-0"
                                     :class="activeJob === 'jeeth' ? 'text-2xl text-primary leading-tight' : 'text-sm text-primary/40 group-hover:text-primary'">Jeeth Enterprises</p>
                                <p class="text-[10px] font-bold text-primary/20 transition-all duration-300 text-right mt-1"
                                     :class="activeJob === 'jeeth' ? 'text-primary/50 text-[11px]' : ''">2023 - 2025</p>
                            </div>

                            <!-- FashionWalks -->
                            <div class="relative group cursor-pointer w-full flex flex-col items-end timeline-item-text opacity-0" data-job="fashion" 
                                  @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'fashion'})); gsap.fromTo('.job-card-details', {opacity: 0, x: -20}, {opacity: 1, x: 0, duration: 0.4, ease: 'power2.out'});">
                                <div class="absolute w-4 h-4 bg-white border-2 rounded-full -right-[41px] top-1.5 transition-all duration-300 timeline-dot opacity-0"
                                     :class="activeJob === 'fashion' ? 'border-primary bg-primary scale-125' : 'border-primary/20 group-hover:scale-125 group-hover:border-primary'"></div>
                                <p class="font-headline font-bold transition-all duration-300 text-right m-0"
                                     :class="activeJob === 'fashion' ? 'text-2xl text-primary leading-tight' : 'text-sm text-primary/40 group-hover:text-primary'">FashionWalks</p>
                                <p class="text-[10px] font-bold text-primary/20 transition-all duration-300 text-right mt-1"
                                     :class="activeJob === 'fashion' ? 'text-primary/50 text-[11px]' : ''">2020 - 2023</p>
                            </div>

                            <!-- J.K Fenner -->
                            <div class="relative group cursor-pointer w-full flex flex-col items-end timeline-item-text opacity-0" data-job="fenner" 
                                  @click="window.dispatchEvent(new CustomEvent('scroll-job', {detail: 'fenner'})); gsap.fromTo('.job-card-details', {opacity: 0, x: 20}, {opacity: 1, x: 0, duration: 0.4, ease: 'power2.out'});">
                                <div class="absolute w-4 h-4 bg-white border-2 rounded-full -right-[41px] top-1.5 transition-all duration-300 timeline-dot opacity-0"
                                     :class="activeJob === 'fenner' ? 'border-primary bg-primary scale-125' : 'border-primary/20 group-hover:scale-125 group-hover:border-primary'"></div>
                                <p class="font-headline font-bold transition-all duration-300 text-right m-0"
                                     :class="activeJob === 'fenner' ? 'text-2xl text-primary leading-tight' : 'text-sm text-primary/40 group-hover:text-primary'">J.K Fenner</p>
                                <p class="text-[10px] font-bold text-primary/20 transition-all duration-300 text-right mt-1"
                                     :class="activeJob === 'fenner' ? 'text-primary/50 text-[11px]' : ''">2018</p>
                            </div>ext-primary/50 text-[11px]' : ''">2018</p>
                            </div>

                        </div>
                    </div>

                    <!-- Right Side Content Area (55%): Align left -->
                    <div class="w-full relative flex flex-col items-start justify-start pl-2 timeline-details-panel opacity-0 transform translate-x-8" style="min-height: 240px;">
                        <p class="text-[10px] font-bold tracking-widest text-primary/30 uppercase mb-6">DETAILS</p>
                        
                        <!-- Aqualite Details -->
                        <div x-show="activeJob === 'aqualite'" 
                             x-transition:enter="transition-3d-enter-active"
                             x-transition:enter-start="transition-3d-enter-from"
                             x-transition:enter-end="transition-3d-enter-to"
                             x-transition:leave="transition-3d-leave-active"
                             x-transition:leave-start="transition-3d-leave-from"
                             x-transition:leave-end="transition-3d-leave-to"
                             class="absolute top-8 left-0 w-full" style="z-index: 10;">
                            <div class="bg-pale-blue rounded-3xl p-4 hover-tilt-3d flex flex-col justify-between ml-0 mr-auto job-card-details" style="width: 280px; max-width: 100%; height: 240px; box-sizing: border-box;">
                                <div class="overflow-y-auto pr-1" data-lenis-prevent style="max-height: 180px;">
                                    <h3 class="text-sm font-bold text-primary mb-2">Sales Executive</h3>
                                    <ul class="space-y-1.5 text-[11px] text-primary/70 font-medium">
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Achieve monthly and annual sales targets.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Drive primary and secondary sales growth.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Manage distributors, retailers, and stock availability.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Appoint and develop new distributors and retail outlets.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Generate orders and ensure timely collections.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Execute promotions, merchandising, and branding activities.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Increase market coverage and product visibility.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Monitor competitor activities and market trends.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Maintain strong dealer and retailer relationships.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Submit sales reports and update CRM/DMS records.</li>
                                    </ul>
                                </div>
                                <p class="text-[9px] font-bold text-primary/30 uppercase m-0">Aqualite</p>
                            </div>
                        </div>

                        <!-- Campus Activewear Details -->
                        <div x-show="activeJob === 'campus'" 
                             x-transition:enter="transition-3d-even-enter-active"
                             x-transition:enter-start="transition-3d-even-enter-from"
                             x-transition:enter-end="transition-3d-even-enter-to"
                             x-transition:leave="transition-3d-even-leave-active"
                             x-transition:leave-start="transition-3d-even-leave-from"
                             x-transition:leave-end="transition-3d-even-leave-to"
                             class="absolute top-8 left-0 w-full"
                             style="display: none; z-index: 10;">
                            <div class="bg-pale-blue rounded-3xl p-4 hover-tilt-3d flex flex-col justify-between ml-0 mr-auto job-card-details" style="width: 280px; max-width: 100%; height: 240px; box-sizing: border-box;">
                                <div class="overflow-y-auto pr-1" data-lenis-prevent style="max-height: 180px;">
                                    <h3 class="text-sm font-bold text-primary mb-2">Sales Executive</h3>
                                    <ul class="space-y-1.5 text-[11px] text-primary/70 font-medium">
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Leading market expansion and territory growth.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Expanding distributor coverage by 20% and retail partnerships.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Driving sales growth across assigned territories.</li>
                                    </ul>
                                </div>
                                <p class="text-[9px] font-bold text-primary/30 uppercase m-0">Campus Activewear</p>
                            </div>
                        </div>

                        <!-- Jeeth Enterprises Details -->
                        <div x-show="activeJob === 'jeeth'" 
                             x-transition:enter="transition-3d-enter-active"
                             x-transition:enter-start="transition-3d-enter-from"
                             x-transition:enter-end="transition-3d-enter-to"
                             x-transition:leave="transition-3d-leave-active"
                             x-transition:leave-start="transition-3d-leave-from"
                             x-transition:leave-end="transition-3d-leave-to"
                             class="absolute top-8 left-0 w-full"
                             style="display: none; z-index: 10;">
                            <div class="bg-pale-blue rounded-3xl p-4 hover-tilt-3d flex flex-col justify-between ml-0 mr-auto job-card-details" style="width: 280px; max-width: 100%; height: 240px; box-sizing: border-box;">
                                <div class="overflow-y-auto pr-1" data-lenis-prevent style="max-height: 180px;">
                                    <h3 class="text-sm font-bold text-primary mb-2">Sales Executive</h3>
                                    <ul class="space-y-1.5 text-[11px] text-primary/70 font-medium">
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Exceeded sales targets consistently across all quarters.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Built relationships with distributors and key retail partnerships.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Executed promotional activities for customer engagement.</li>
                                    </ul>
                                </div>
                                <p class="text-[9px] font-bold text-primary/30 uppercase m-0">Jeeth Enterprises</p>
                            </div>
                        </div>

                        <!-- FashionWalks Details -->
                        <div x-show="activeJob === 'fashion'" 
                             x-transition:enter="transition-3d-even-enter-active"
                             x-transition:enter-start="transition-3d-even-enter-from"
                             x-transition:enter-end="transition-3d-even-enter-to"
                             x-transition:leave="transition-3d-even-leave-active"
                             x-transition:leave-start="transition-3d-even-leave-from"
                             x-transition:leave-end="transition-3d-even-leave-to"
                             class="absolute top-8 left-0 w-full"
                             style="display: none; z-index: 10;">
                            <div class="bg-pale-blue rounded-3xl p-4 hover-tilt-3d flex flex-col justify-between ml-0 mr-auto job-card-details" style="width: 280px; max-width: 100%; height: 240px; box-sizing: border-box;">
                                <div class="overflow-y-auto pr-1" data-lenis-prevent style="max-height: 180px;">
                                    <h3 class="text-sm font-bold text-primary mb-2">Warehouse & Sales Coordinator</h3>
                                    <ul class="space-y-1.5 text-[11px] text-primary/70 font-medium">
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Oversaw inventory management, receiving, and dispatch.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Improved warehouse utilization efficiency by over 15%.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Coordinated labor teams and established workflows.</li>
                                    </ul>
                                </div>
                                <p class="text-[9px] font-bold text-primary/30 uppercase m-0">FashionWalks</p>
                            </div>
                        </div>

                        <!-- J.K Fenner Details -->
                        <div x-show="activeJob === 'fenner'" 
                             x-transition:enter="transition-3d-enter-active"
                             x-transition:enter-start="transition-3d-enter-from"
                             x-transition:enter-end="transition-3d-enter-to"
                             x-transition:leave="transition-3d-leave-active"
                             x-transition:leave-start="transition-3d-leave-from"
                             x-transition:leave-end="transition-3d-leave-to"
                             class="absolute top-8 left-0 w-full"
                             style="display: none; z-index: 10;">
                            <div class="bg-pale-blue rounded-3xl p-4 hover-tilt-3d flex flex-col justify-between ml-0 mr-auto job-card-details" style="width: 280px; max-width: 100%; height: 240px; box-sizing: border-box;">
                                <div class="overflow-y-auto pr-1" data-lenis-prevent style="max-height: 180px;">
                                    <h3 class="text-sm font-bold text-primary mb-2">Quality Controller</h3>
                                    <ul class="space-y-1.5 text-[11px] text-primary/70 font-medium">
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Performed quality inspection of mechanical components and finished goods.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Ensured products met company and industry quality standards.</li>
                                        <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[12px] text-primary/40 mt-0.5">check_circle</span> Documented quality reports and maintained inspection records.</li>
                                    </ul>
                                </div>
                                <p class="text-[9px] font-bold text-primary/30 uppercase m-0">J.K Fenner Pvt Ltd</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Core Competencies -->
        <section class="bg-white reveal-section overflow-visible relative competencies-sec" id="competencies">
            <!-- Background gradient bubbles -->
            <div class="absolute top-10 left-10 w-72 h-72 rounded-full bg-light-blue/20 blur-[100px] pointer-events-none hero-gradient-bubble" style="animation-duration: 16s; animation-delay: -3s;"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 rounded-full bg-pale-blue/60 blur-[120px] pointer-events-none hero-gradient-bubble" style="animation-duration: 18s; animation-delay: -5s;"></div>

            <div class="px-margin-mobile md:px-margin-desktop relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-[1fr_624px] gap-8 lg:gap-12 items-start">
                    <!-- Left: Header -->
                    <div class="flex flex-col justify-start">
                        <h2 class="font-headline text-4xl font-bold text-primary m-0">Core<br/>Competencies</h2>
                    </div>
                    <!-- Right: Grid 2x2 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[24px] competencies-grid">
                        <div class="bg-pale-blue p-8 rounded-3xl relative overflow-hidden competency-card hover-card hover:bg-primary transition-colors duration-500 cursor-default group competency-item-card">
                            <span class="outline-num text-9xl absolute -bottom-8 -right-4 font-bold opacity-10">01</span>
                            <h3 class="font-headline text-xl font-bold mb-4 group-hover:text-white transition-colors duration-500 flex items-center gap-2">
                                <span class="material-symbols-outlined text-2xl transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12">trending_up</span>
                                Sales & Revenue
                            </h3>
                            <p class="text-xs text-primary/60 max-w-[240px] group-hover:text-white/80 transition-colors duration-500">Territory development, sales forecasting, revenue planning, and market expansion strategies.</p>
                        </div>
                        <div class="bg-pale-blue p-8 rounded-3xl relative overflow-hidden competency-card hover-card hover:bg-primary transition-colors duration-500 cursor-default group competency-item-card">
                            <span class="outline-num text-9xl absolute -bottom-8 -right-4 font-bold opacity-10">02</span>
                            <h3 class="font-headline text-xl font-bold mb-4 group-hover:text-white transition-colors duration-500 flex items-center gap-2">
                                <span class="material-symbols-outlined text-2xl transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12">storefront</span>
                                Retail Operations
                            </h3>
                            <p class="text-xs text-primary/60 max-w-[240px] group-hover:text-white/80 transition-colors duration-500">Store performance management, KPI monitoring, inventory optimization, and compliance.</p>
                        </div>
                        <div class="bg-pale-blue p-8 rounded-3xl relative overflow-hidden competency-card hover-card hover:bg-primary transition-colors duration-500 cursor-default group competency-item-card">
                            <span class="outline-num text-9xl absolute -bottom-8 -right-4 font-bold opacity-10">03</span>
                            <h3 class="font-headline text-xl font-bold mb-4 group-hover:text-white transition-colors duration-500 flex items-center gap-2">
                                <span class="material-symbols-outlined text-2xl transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12">groups</span>
                                Staff Development
                            </h3>
                            <p class="text-xs text-primary/60 max-w-[240px] group-hover:text-white/80 transition-colors duration-500">Recruitment, team leadership, sales coaching, performance evaluation, and succession planning.</p>
                        </div>
                        <div class="bg-primary p-8 rounded-3xl relative overflow-hidden text-white competency-card hover-card hover:bg-primary/90 transition-colors duration-300 cursor-default group competency-item-card">
                            <span class="outline-num text-9xl absolute -bottom-8 -right-4 font-bold opacity-20" style="-webkit-text-stroke: 1px white;">04</span>
                            <h3 class="font-headline text-xl font-bold mb-4 flex items-center gap-2">
                                <span class="material-symbols-outlined text-2xl transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12">terminal</span>
                                Tech & AI Innovation
                            </h3>
                            <p class="text-xs opacity-80 max-w-[240px]">Executive business reporting, n8n workflows, HubSpot CRM, and multi-agent system orchestration.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mid Banner Quote -->
        <section class="pt-32 pb-12 text-center max-w-4xl mx-auto px-4 group reveal-section">
            <h2 class="font-headline text-3xl md:text-5xl font-bold text-primary uppercase leading-[1.1] transition-transform duration-500 group-hover:scale-105">
                DELIVERING <span class="font-light text-light-blue transition-colors duration-500">MEASURABLE</span> RESULTS THROUGH <span class="font-light text-light-blue transition-colors duration-500 delay-100">STRATEGY</span>, EXECUTION, AND <span class="font-light text-light-blue transition-colors duration-500 delay-200">INNOVATION</span>.
            </h2>
        </section>

        <!-- Certifications & Tech Stack -->
        <section class="reveal-section overflow-visible skills-sec" id="skills" 
            x-data="{ 
                selectedCert: null,
                certificates: [
                    {
                        id: 'cisco',
                        title: 'Cisco Data Analyst',
                        issuer: 'Cisco Networking Academy',
                        date: '2025',
                        skills: 'SQL, Analytics Pipelines, Data Quality & Interpretation',
                        desc: 'Rigorous validation on structured query design, exploratory data assessment, KPI tracking, and statistical summarization.'
                    },
                    {
                        id: 'tableau',
                        title: 'Tableau Fundamentals',
                        issuer: 'Tableau Software',
                        date: '2025',
                        skills: 'Interactive Dashboard Design, Data Connections, Storytelling',
                        desc: 'Certifies competency in designing executive dashboards, blending multi-source databases, and telling stories through visuals.'
                    },
                    {
                        id: 'hubspot',
                        title: 'HubSpot Certified',
                        issuer: 'HubSpot Academy',
                        date: '2025',
                        skills: 'CRM Operations, Lead Automations, Pipeline Setup',
                        desc: 'Official certification verifying core administration skills for marketing automations, customer lifecycle mapping, and pipeline config.'
                    }
                ]
            }">
            <div class="px-margin-mobile md:px-margin-desktop">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h2 class="font-headline text-4xl font-bold text-primary mb-2 uppercase">TECHNICAL <span class="font-light uppercase text-light-blue">Stack</span><br/>&amp; <span class="font-light uppercase text-light-blue">Certifications</span></h2>
                        <p class="text-xs text-primary/50 max-w-[300px]">Combining advanced analytical tools with modern CRM and AI workflow orchestration to drive intelligent business operations.</p>
                    </div>
                    <p class="text-[10px] font-bold tracking-widest text-primary/30 uppercase">SKILLSET</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-[40px] justify-items-center skills-grid">
                    <!-- Card 1: Business & Analytics -->
                    <div class="bg-pale-blue rounded-[40px] p-8 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group skill-item-card">
                        <div class="flex justify-between items-start">
                            <span class="font-headline text-3xl font-bold opacity-10 group-hover:text-primary group-hover:opacity-20 transition-colors duration-500">SKILLS</span>
                        </div>
                        <div class="mt-2">
                            <h3 class="text-sm font-bold mb-1 text-primary">Business & Analytics</h3>
                            <p class="text-[11px] text-primary/60 leading-relaxed">Advanced Excel, SQL, Tableau, Google Data Studio, KPI Dashboards.</p>
                        </div>
                        <div class="flex flex-wrap gap-1.5 mt-auto">
                            <span class="px-2 py-0.5 bg-white text-[8px] font-bold tracking-widest rounded-full uppercase shadow-sm hover:bg-primary hover:text-white hover:scale-105 transition-all cursor-default text-primary">CISCO DATA ANALYST</span>
                            <span class="px-2 py-0.5 bg-white text-[8px] font-bold tracking-widest rounded-full uppercase shadow-sm hover:bg-primary hover:text-white hover:scale-105 transition-all cursor-default text-primary">TABLEAU FUNDAMENTALS</span>
                        </div>
                    </div>
                    <!-- Card 2: CRM & AI Tools -->
                    <div class="bg-pale-blue rounded-[40px] p-8 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group skill-item-card">
                        <div class="flex justify-between items-start">
                            <span class="font-headline text-3xl font-bold opacity-10 group-hover:text-primary group-hover:opacity-20 transition-colors duration-500">AI TOOLS</span>
                        </div>
                        <div class="mt-2">
                            <h3 class="text-sm font-bold mb-1 text-primary">CRM & AI Tools</h3>
                            <p class="text-[11px] text-primary/60 leading-relaxed">HubSpot, OpenAI GPT, n8n Workflow, Multi-Agent Systems, OpenRouter.</p>
                        </div>
                        <div class="flex flex-wrap gap-1.5 mt-auto">
                            <span class="px-2 py-0.5 bg-white text-[8px] font-bold tracking-widest rounded-full uppercase shadow-sm hover:bg-primary hover:text-white hover:scale-105 transition-all cursor-default text-primary">HUBSPOT CERTIFIED</span>
                        </div>
                    </div>
                    <!-- Card 3: Languages -->
                    <div class="bg-pale-blue rounded-[40px] p-8 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group skill-item-card">
                        <div class="flex justify-between items-start">
                            <span class="font-headline text-3xl font-bold opacity-10 group-hover:text-primary group-hover:opacity-20 transition-colors duration-500">LANGUAGES</span>
                        </div>
                        <div class="mt-2">
                            <h3 class="text-sm font-bold mb-1 text-primary">English & Tamil</h3>
                            <p class="text-[11px] text-primary/60 leading-relaxed">Effective communication across stakeholders, operational teams, and distribution networks.</p>
                        </div>
                        <div class="flex items-center justify-end mt-auto">
                            <span class="material-symbols-outlined text-[24px] text-primary/20 group-hover:text-primary/60 group-hover:scale-110 transition-all duration-500">translate</span>
                        </div>
                    </div>
                </div>

                <!-- Dedicated Certificate Cards Row -->
                <div class="mt-16 pt-4">
                    <p class="text-[10px] font-bold tracking-widest text-primary/30 uppercase mb-6 text-center md:text-left">OFFICIAL CERTIFICATIONS (Click to preview details)</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-[40px] justify-items-center">
                        <template x-for="cert in certificates">
                                <div @click="selectedCert = cert" 
                                     class="shine-card bg-pale-blue rounded-3xl p-6 flex flex-col justify-between cursor-pointer border border-primary/5 hover:border-light-blue transition-all duration-300 certificate-card opacity-0 transform translate-y-8 cert-item-card"
                                     style="box-sizing: border-box;">
                                <div>
                                    <h4 class="text-xs font-bold text-primary" x-text="cert.title"></h4>
                                    <p class="text-[10px] text-primary/50 mt-1" x-text="cert.issuer"></p>
                                </div>
                                <div class="flex justify-between items-center mt-2 pt-2 border-t border-primary/5">
                                    <span class="text-[9px] font-bold text-primary/40" x-text="'Issued: ' + cert.date"></span>
                                    <span class="material-symbols-outlined text-sm text-primary/30 group-hover:text-primary transition-colors">visibility</span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Certificate Modal Preview -->
            <div x-show="selectedCert !== null" 
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-primary/20 backdrop-blur-md"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 style="display: none;"
                 @click.self="selectedCert = null">
                <div class="bg-white/90 backdrop-blur-2xl rounded-3xl p-8 max-w-lg w-full border border-white/40 shadow-2xl relative">
                    <button @click="selectedCert = null" class="absolute top-4 right-4 text-primary/40 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                    <span class="text-[9px] font-bold tracking-widest text-light-blue uppercase block mb-1">CERTIFICATE PROFILE</span>
                    <h3 class="font-headline text-2xl font-bold text-primary mb-2" x-text="selectedCert?.title"></h3>
                    <p class="text-xs text-primary/50 mb-4" x-text="selectedCert?.issuer + ' · ' + selectedCert?.date"></p>
                    
                    <div class="space-y-4 text-xs text-primary/70">
                        <div>
                            <span class="font-bold text-[10px] text-primary/40 uppercase block mb-1">Description</span>
                            <p class="leading-relaxed font-medium" x-text="selectedCert?.desc"></p>
                        </div>
                        <div>
                            <span class="font-bold text-[10px] text-primary/40 uppercase block mb-1">Key Skills Validated</span>
                            <p class="leading-relaxed font-semibold text-primary" x-text="selectedCert?.skills"></p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button @click="selectedCert = null" class="px-6 py-2.5 bg-primary text-white rounded-full text-xs font-bold hover:bg-primary/90 transition-all">
                            Close Preview
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-primary text-white relative footer-sec" id="contact">
            <!-- Floating Background Particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-25">
                <div class="absolute w-2 h-2 bg-white rounded-full float-particle" style="top: 20%; left: 10%; animation-duration: 8s;"></div>
                <div class="absolute w-1.5 h-1.5 bg-light-blue rounded-full float-particle" style="top: 60%; left: 30%; animation-duration: 12s; animation-delay: -3s;"></div>
                <div class="absolute w-2.5 h-2.5 bg-white rounded-full float-particle" style="top: 35%; left: 70%; animation-duration: 10s; animation-delay: -5s;"></div>
                <div class="absolute w-1.5 h-1.5 bg-light-blue rounded-full float-particle" style="top: 80%; left: 45%; animation-duration: 15s; animation-delay: -2s;"></div>
                <div class="absolute w-2 h-2 bg-white rounded-full float-particle" style="top: 15%; left: 80%; animation-duration: 9s; animation-delay: -7s;"></div>
            </div>

            <div class="flex flex-col justify-between h-full w-full relative z-10">
                <!-- Top Content Grid -->
                <div class="flex flex-col lg:flex-row justify-between items-stretch lg:items-start w-full gap-8">
                    <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start w-full">
                        <!-- About (300px) -->
                        <div class="footer-fade-item footer-col-300">
                            <p class="text-[10px] font-bold tracking-widest uppercase opacity-40 mb-3">About</p>
                            <p class="text-sm font-semibold mb-1 text-light-blue">Available for Opportunities</p>
                            <p class="text-[10px] opacity-50 leading-relaxed uppercase tracking-wider">Focusing on delivering measurable business results through sales execution & AI solutions.</p>
                        </div>
                        
                        <!-- Contact (300px) -->
                        <div class="footer-fade-item footer-col-300">
                            <p class="text-[10px] font-bold tracking-widest uppercase opacity-40 mb-3">Contact</p>
                            <div class="text-[11px] opacity-60 leading-relaxed uppercase tracking-wider space-y-1">
                                <p class="m-0">Madurai, Tamil Nadu, India</p>
                                <p class="m-0">Phone: <a href="tel:+919715620426" class="footer-link-underline text-light-blue font-bold">+91 97156 20426</a></p>
                                <p class="m-0">Email: <a href="mailto:111imrankhan111@gmail.com" class="footer-link-underline text-light-blue font-bold">111imrankhan111@gmail.com</a></p>
                            </div>
                        </div>
 
                        <!-- Social (200px) -->
                        <div class="footer-fade-item footer-col-200">
                            <p class="text-[10px] font-bold tracking-widest uppercase opacity-40 mb-3">Socials</p>
                            <div class="flex gap-3">
                                <a href="tel:+919715620426" class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary hover:-translate-y-2 hover:scale-115 hover:shadow-2xl transition-all duration-300">
                                    <span class="material-symbols-outlined text-sm">call</span>
                                </a>
                                <a href="mailto:111imrankhan111@gmail.com" class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary hover:-translate-y-2 hover:scale-115 hover:shadow-2xl transition-all duration-300">
                                    <span class="material-symbols-outlined text-sm">mail</span>
                                </a>
                                <a href="https://linkedin.com" target="_blank" class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary hover:-translate-y-2 hover:scale-115 hover:shadow-2xl transition-all duration-300">
                                    <span class="material-symbols-outlined text-sm">public</span>
                                </a>
                            </div>
                        </div>
                    </div>
 
                    <!-- Logo Area (Remaining) -->
                    <div class="flex flex-col items-start lg:items-end text-left lg:text-right footer-fade-item mt-4 lg:mt-0">
                        <span class="font-headline text-3xl font-extrabold bg-white text-primary px-3.5 py-1 rounded-[10px] tracking-tighter inline-block select-none">IKR</span>
                        <p class="text-[10.5px] font-bold tracking-widest uppercase opacity-55 mt-2">Sales Professional</p>
                        <p class="text-[9px] opacity-30 uppercase tracking-widest mt-4">© 2026 Imran Khan. All rights reserved.</p>
                    </div>
                </div>
 
                <!-- Large Background Typography -->
                <div class="text-center overflow-hidden w-full select-none mt-2 pt-2 border-t border-white/5 footer-fade-item">
                    <span class="font-headline text-[8.5vw] leading-none font-bold tracking-tighter opacity-10 uppercase block cursor-default sliding-italic-text">IMRAN KHAN</span>
                </div>
            </div>
        </footer>
    </main>

    <!-- GSAP ScrollTrigger Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger);

            // Initialize Lenis Smooth Scroll
            const lenis = new Lenis({
                duration: 1.5,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                orientation: 'vertical',
                gestureOrientation: 'vertical',
                smoothWheel: true,
                wheelMultiplier: 1,
                touchMultiplier: 1.5,
                infinite: false,
            });

            // Update ScrollTrigger on Lenis scroll
            lenis.on('scroll', ScrollTrigger.update);

            // Integrate Lenis with GSAP ticker
            gsap.ticker.add((time) => {
                lenis.raf(time * 1000);
            });

            // Disable lag smoothing in GSAP to avoid sync issues
            gsap.ticker.lagSmoothing(0);

            // Bind page links to Lenis smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const targetEl = document.querySelector(targetId);
                    if (targetEl) {
                        lenis.scrollTo(targetEl, { offset: -80 });
                    }
                });
            });

            // Hero Split-text character animation for name & titles
            document.querySelectorAll(".split-char, .split-char-name").forEach(el => {
                const text = el.textContent.trim();
                el.innerHTML = text.split("").map(char => {
                    return `<span class="inline-block char-span" style="opacity:0; transform: translateY(20px);">${char === " " ? "&nbsp;" : char}</span>`;
                }).join("");
            });

            // Set initial states for entrance sequence
            gsap.set(".hero-gradient-bubble", { opacity: 0 });
            gsap.set(".hero-parallax-target", { transform: "perspective(1200px) rotateX(10deg) rotateY(-10deg) scale(0.95)", opacity: 0 });
            gsap.set(".scroll-down-indicator", { opacity: 0 });

            const heroTl = gsap.timeline({ defaults: { ease: "power3.out" } });
            
            // Entrance Sequence
            // 1. Background fades in
            heroTl.to(".hero-gradient-bubble", {
                opacity: 1,
                duration: 1,
                stagger: 0.2
            });

            // 2. Name reveals character-by-character
            heroTl.to(".split-char-name .char-span", {
                opacity: 1,
                y: 0,
                stagger: 0.05,
                duration: 0.6
            }, "-=0.5");

            // 3. Titles reveal character-by-character
            heroTl.to(".hero-title .split-char .char-span", {
                opacity: 1,
                y: 0,
                stagger: 0.015,
                duration: 0.6
            }, "-=0.3");

            // 4. Subtitle slides up
            heroTl.to(".hero-subtitle", {
                opacity: 1,
                y: 0,
                duration: 0.5
            }, "-=0.4");

            // 5. Buttons scale in
            heroTl.to(".hero-cta-card", {
                scale: 1,
                opacity: 1,
                duration: 0.8,
                stagger: 0.15,
                ease: "back.out(1.5)"
            }, "-=0.4");

            // 6. Profile image/card rotates slightly into view
            heroTl.to(".hero-parallax-target", {
                opacity: 1,
                transform: "perspective(1200px) rotateX(0deg) rotateY(0deg) scale(1)",
                duration: 1.2,
                ease: "power2.out"
            }, "-=0.8");

            // 7. Scroll indicator and taglines fade in
            heroTl.to([".hero-tagline", ".scroll-down-indicator"], {
                opacity: 1,
                duration: 0.6
            }, "-=0.3");

            // Mouse-based Parallax on Hero Section
            const heroSection = document.getElementById("hero-section");
            if (heroSection) {
                heroSection.addEventListener("mousemove", (e) => {
                    const { left, top, width, height } = heroSection.getBoundingClientRect();
                    const x = (e.clientX - left - width / 2) / width;
                    const y = (e.clientY - top - height / 2) / height;

                    gsap.to(".hero-parallax-target", {
                        x: x * 25,
                        y: y * 25,
                        rotateX: -y * 8,
                        rotateY: x * 8,
                        duration: 0.6,
                        ease: "power2.out"
                    });
                    
                    gsap.to(".hero-parallax-badge", {
                        x: x * 40,
                        y: y * 40,
                        duration: 0.6,
                        ease: "power2.out"
                    });
                });

                heroSection.addEventListener("mouseleave", () => {
                    gsap.to(".hero-parallax-target", { x: 0, y: 0, rotateX: 0, rotateY: 0, duration: 0.8, ease: "power2.out" });
                    gsap.to(".hero-parallax-badge", { x: 0, y: 0, duration: 0.8, ease: "power2.out" });
                });
            }

            // Magnetic Button Effect for CTA buttons
            document.querySelectorAll(".magnetic-btn").forEach(btn => {
                btn.addEventListener("mousemove", (e) => {
                    const { left, top, width, height } = btn.getBoundingClientRect();
                    const x = e.clientX - left - width / 2;
                    const y = e.clientY - top - height / 2;
                    gsap.to(btn, { x: x * 0.4, y: y * 0.4, duration: 0.3, ease: "power2.out" });
                });
                btn.addEventListener("mouseleave", () => {
                    gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: "elastic.out(1, 0.3)" });
                });
            });

            // Section 2: Stats Achievements Animations
            // Count-up numbers
            gsap.utils.toArray(".count-up").forEach(el => {
                const target = parseInt(el.getAttribute("data-target"), 10);
                gsap.fromTo(el, { textContent: 0 }, {
                    textContent: target,
                    duration: 2,
                    ease: "power2.out",
                    snap: { textContent: 1 },
                    scrollTrigger: {
                        trigger: el,
                        start: "top 90%",
                        toggleActions: "play none none none"
                    }
                });
            });

            // Progress bars fill
            gsap.utils.toArray(".progress-bar").forEach(bar => {
                const percent = bar.getAttribute("data-percent");
                gsap.to(bar, {
                    width: percent + "%",
                    duration: 1.8,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: bar,
                        start: "top 90%",
                        toggleActions: "play none none none"
                    }
                });
            });

            // Cards fade-up sequentially
            gsap.to(".stat-card", {
                opacity: 1,
                y: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "#achievements",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });

            // Section 3: Card stagger fade-up reveal from bottom
            gsap.to(".expertise-card", {
                opacity: 1,
                y: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "#expertise",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });

            // 1. Professional Journey - Timeline Line Draw Effect
            gsap.to(".timeline-line-draw", {
                height: "100%",
                ease: "none",
                scrollTrigger: {
                    trigger: ".timeline-list-container",
                    start: "top 30%",
                    end: "bottom 70%",
                    scrub: 2.5
                }
            });

            // Company logo / text items slide alternately, logos fade in, year indicators scale in
            gsap.utils.toArray(".timeline-item-text").forEach((item, index) => {
                const dot = item.querySelector(".timeline-dot");
                const companyLogo = item.querySelector("p:first-of-type");
                const yearIndicator = item.querySelector("p:last-of-type");
                const jobName = item.getAttribute("data-job");
                
                // Determine direction for alternate slide effect
                const slideDirectionX = index % 2 === 0 ? -40 : 40;

                // Set initial properties before GSAP takes over
                gsap.set(item, { opacity: 0 });
                if (companyLogo) gsap.set(companyLogo, { x: slideDirectionX, opacity: 0 });
                if (yearIndicator) gsap.set(yearIndicator, { scale: 0, opacity: 0 });
                if (dot) gsap.set(dot, { scale: 0, opacity: 0 });

                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: item,
                        start: "top 85%",
                        toggleActions: "play none none none"
                    }
                });

                tl.to(item, { opacity: 1, duration: 0.1 })
                  .to(companyLogo, { x: 0, opacity: 1, duration: 0.6, ease: "power2.out" })
                  .to(yearIndicator, { scale: 1, opacity: 1, duration: 0.5, ease: "back.out(1.5)" }, "-=0.3")
                  .to(dot, { scale: 1, opacity: 1, duration: 0.5, ease: "back.out(2)" }, "-=0.4");

                // Auto-trigger Alpine tab switch when scrolling past milestones
                ScrollTrigger.create({
                    trigger: item,
                    start: "top 50%",
                    end: "bottom 50%",
                    onEnter: () => {
                        if (jobName) {
                            window.dispatchEvent(new CustomEvent('scroll-job', { detail: jobName }));
                        }
                    },
                    onEnterBack: () => {
                        if (jobName) {
                            window.dispatchEvent(new CustomEvent('scroll-job', { detail: jobName }));
                        }
                    }
                });
            });

            // Timeline details panel slides/fades in
            gsap.to(".timeline-details-panel", {
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: "#experience",
                    start: "top 70%",
                    toggleActions: "play none none none"
                }
            });

            // Section 5: Header and Competency cards stagger reveal
            const compTl = gsap.timeline({
                scrollTrigger: {
                    trigger: "#competencies",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
            compTl.from("#competencies h2", {
                x: -50,
                opacity: 0,
                duration: 0.8,
                ease: "power3.out"
            })
            .from(".competency-card", {
                y: 50,
                opacity: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power3.out"
            }, "-=0.4");
            // Section 6: Certifications stagger fade-up reveal
            gsap.to(".certificate-card", {
                opacity: 1,
                y: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: "#skills",
                    start: "top 75%",
                    toggleActions: "play none none none"
                }
            });

            // Select all images inside parallax-container
            gsap.utils.toArray(".parallax-container").forEach(container => {
                const img = container.querySelector(".parallax-bg");
                if (img) {
                    // Set initial scale to hide borders when moving
                    gsap.set(img, { scale: 1.15, yPercent: -10 });
                    
                    gsap.to(img, {
                        yPercent: 10,
                        ease: "none",
                        scrollTrigger: {
                            trigger: container,
                            start: "top bottom", // when top of container hits bottom of viewport
                            end: "bottom top",   // when bottom of container hits top of viewport
                            scrub: true
                        }
                    });
                }
            });
            // Footer content fade-up reveal
            gsap.fromTo(".footer-fade-item", {
                y: 35,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                stagger: 0.12,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "#contact",
                    start: "top bottom",
                    toggleActions: "play none none none"
                }
            });

            // 3. Reveal Animation for Sections
            // Make sections float up gently as you scroll down
            gsap.utils.toArray(".reveal-section").forEach(section => {
                gsap.to(section, {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: section,
                        start: "top 85%", // Reveal when top of section hits 85% down viewport
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Auto Hover Cycle for Core Competencies Cards
            const competencyCards = document.querySelectorAll(".competency-card");
            let compIndex = 0;
            let compInterval = null;
            let isUserHoveringComp = false;

            function startCompAutoHover() {
                if (compInterval) clearInterval(compInterval);
                compInterval = setInterval(() => {
                    if (isUserHoveringComp) return;
                    
                    competencyCards.forEach(card => card.classList.remove("auto-hover"));
                    
                    // Add auto-hover style class to the active card
                    competencyCards[compIndex].classList.add("auto-hover");
                    
                    // Advance to next index
                    compIndex = (compIndex + 1) % competencyCards.length;
                }, 2500);
            }

            function stopCompAutoHover() {
                clearInterval(compInterval);
                competencyCards.forEach(card => card.classList.remove("auto-hover"));
            }

            const compGrid = document.querySelector(".competencies-grid");
            if (compGrid) {
                compGrid.addEventListener("mouseenter", () => {
                    isUserHoveringComp = true;
                    stopCompAutoHover();
                });
                compGrid.addEventListener("mouseleave", () => {
                    isUserHoveringComp = false;
                    startCompAutoHover();
                });
            }

            // Start auto-hover cycle initially
            startCompAutoHover();
        });
    </script>
</body>
</html>
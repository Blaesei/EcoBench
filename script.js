// ===================================
// SCROLL PROGRESS BAR
// ===================================
function updateScrollProgress() {
    const scrollProgress = document.getElementById('scrollProgress');
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const progress = (scrollTop / scrollHeight) * 100;
    scrollProgress.style.width = progress + '%';
}

window.addEventListener('scroll', updateScrollProgress);

// ===================================
// HEADER SCROLL EFFECT
// ===================================
function handleHeaderScroll() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
}

window.addEventListener('scroll', handleHeaderScroll);

// ===================================
// MOBILE MENU TOGGLE
// ===================================
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const navMenu = document.getElementById('navMenu');

mobileMenuToggle.addEventListener('click', () => {
    mobileMenuToggle.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// Close menu when clicking on a nav link
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenuToggle.classList.remove('active');
        navMenu.classList.remove('active');
    });
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (!navMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
        mobileMenuToggle.classList.remove('active');
        navMenu.classList.remove('active');
    }
});

// ===================================
// SLIDESHOW FUNCTIONALITY
// ===================================
let slideIndex = 0;
let slideTimer;

function showSlides() {
    const slides = document.getElementsByClassName('slide');
    const dots = document.getElementsByClassName('dot');
    
    if (slides.length === 0) return;
    
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
    }
    
    // Increment index
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    // Remove active from all dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }
    
    // Show current slide and activate dot
    slides[slideIndex - 1].classList.add('active');
    if (dots.length > 0) {
        dots[slideIndex - 1].classList.add('active');
    }
    
    // Auto advance
    slideTimer = setTimeout(showSlides, 5000);
}

function currentSlide(n) {
    clearTimeout(slideTimer);
    slideIndex = n - 1;
    
    const slides = document.getElementsByClassName('slide');
    const dots = document.getElementsByClassName('dot');
    
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
    }
    
    // Remove active from all dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }
    
    // Show selected slide
    if (slides[slideIndex]) {
        slides[slideIndex].classList.add('active');
    }
    if (dots[slideIndex]) {
        dots[slideIndex].classList.add('active');
    }
    
    // Resume auto advance
    slideTimer = setTimeout(showSlides, 5000);
}

// Start slideshow when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    showSlides();
});

// ===================================
// STATS COUNTER ANIMATION
// ===================================
function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number');
    const speed = 200; // Lower is faster
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const targetValue = parseInt(target.getAttribute('data-target'));
                let count = 0;
                const increment = targetValue / speed;
                
                const updateCount = () => {
                    count += increment;
                    if (count < targetValue) {
                        target.textContent = Math.ceil(count);
                        setTimeout(updateCount, 1);
                    } else {
                        target.textContent = targetValue;
                    }
                };
                
                updateCount();
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });
    
    statNumbers.forEach(stat => {
        observer.observe(stat);
    });
}

document.addEventListener('DOMContentLoaded', animateStats);

// ===================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ===================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        
        // Don't prevent default for sign-in and other non-section links
        if (href === '#' || href === '#signin' || href === '#feedback') {
            return;
        }
        
        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();
            const headerOffset = 80;
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// ===================================
// ACTIVE NAV LINK ON SCROLL
// ===================================
function updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (window.pageYOffset >= sectionTop - 100) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
}

window.addEventListener('scroll', updateActiveNavLink);

// ===================================
// FEATURE CARDS ANIMATION ON SCROLL
// ===================================
function animateOnScroll() {
    const elements = document.querySelectorAll('.feature-card, .stat-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    entry.target.style.transition = 'all 0.6s ease';
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
                
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    elements.forEach(element => {
        observer.observe(element);
    });
}

document.addEventListener('DOMContentLoaded', animateOnScroll);

// ===================================
// KEYBOARD NAVIGATION FOR SLIDESHOW
// ===================================
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
        const dots = document.getElementsByClassName('dot');
        if (dots.length > 0) {
            let newIndex = slideIndex - 1;
            if (newIndex < 1) newIndex = dots.length;
            currentSlide(newIndex);
        }
    } else if (e.key === 'ArrowRight') {
        const dots = document.getElementsByClassName('dot');
        if (dots.length > 0) {
            let newIndex = slideIndex + 1;
            if (newIndex > dots.length) newIndex = 1;
            currentSlide(newIndex);
        }
    }
});

// ===================================
// PAUSE SLIDESHOW ON HOVER
// ===================================
const heroSection = document.querySelector('.hero');
if (heroSection) {
    heroSection.addEventListener('mouseenter', () => {
        clearTimeout(slideTimer);
    });
    
    heroSection.addEventListener('mouseleave', () => {
        slideTimer = setTimeout(showSlides, 5000);
    });
}

// ===================================
// LOADING ANIMATION
// ===================================
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
});
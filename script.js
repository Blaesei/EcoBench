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

// ===================================
// CONTACT PAGE INTERACTIONS
// ===================================

// Focus on contact form when "Get Started" is clicked
function focusContactForm() {
    const formWrapper = document.querySelector('.contact-form-wrapper');
    const firstInput = document.querySelector('.contact-form input[type="text"]');
    
    if (formWrapper && firstInput) {
        formWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        setTimeout(() => {
            firstInput.focus();
        }, 600);
    }
}

// Character counter for message textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('textarea.form-control');
    const charCount = document.getElementById('charCount');
    const maxChars = 500;
    
    if (textarea && charCount) {
        textarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            charCount.textContent = currentLength;
            
            // Change color when approaching limit
            if (currentLength > maxChars * 0.9) {
                charCount.style.color = '#dc2626';
            } else if (currentLength > maxChars * 0.7) {
                charCount.style.color = '#f59e0b';
            } else {
                charCount.style.color = 'var(--color-eco-green)';
            }
            
            // Prevent exceeding limit
            if (currentLength > maxChars) {
                this.value = this.value.substring(0, maxChars);
                charCount.textContent = maxChars;
            }
        });
    }
});

// Form submission handling
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('.submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnIcon = submitBtn.querySelector('.btn-icon');
            const btnLoader = submitBtn.querySelector('.btn-loader');
            
            // Show loading state
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual API call)
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            // Hide loading state
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
            
            // Show success message
            showSuccessMessage();
            
            // Reset form
            this.reset();
            
            // Reset character counter
            const charCount = document.getElementById('charCount');
            if (charCount) {
                charCount.textContent = '0';
                charCount.style.color = 'var(--color-eco-green)';
            }
        });
    }
});

// Show success message
function showSuccessMessage() {
    // Create success message element if it doesn't exist
    let successMsg = document.querySelector('.success-message');
    
    if (!successMsg) {
        successMsg = document.createElement('div');
        successMsg.className = 'success-message';
        successMsg.innerHTML = `
            <h4>✅ Message Sent Successfully!</h4>
            <p>Thank you for contacting us. We'll get back to you within 24 hours.</p>
        `;
        
        const form = document.getElementById('contactForm');
        form.parentNode.insertBefore(successMsg, form.nextSibling);
    }
    
    // Show the message
    successMsg.classList.add('show');
    
    // Scroll to message
    successMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    
    // Hide after 5 seconds
    setTimeout(() => {
        successMsg.classList.remove('show');
    }, 5000);
}

// Add floating animation to form inputs on focus
document.addEventListener('DOMContentLoaded', function() {
    const formControls = document.querySelectorAll('.form-control');
    
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        control.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
        
        // Check if already has value on page load
        if (control.value) {
            control.parentElement.classList.add('focused');
        }
    });
});

// Animate elements on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.contact-method-card, .info-card');
    
    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });
});

// Add ripple effect to buttons
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.method-btn, .submit-btn, .map-btn');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple-effect');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Add CSS for ripple effect dynamically
const style = document.createElement('style');
style.textContent = `
    .ripple-effect {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .method-btn,
    .submit-btn,
    .map-btn {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(style);

// Smooth scroll for navigation
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only prevent default for anchor links
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});

// Form validation with visual feedback
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('.form-control');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateInput(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('invalid')) {
                validateInput(this);
            }
        });
    });
    
    function validateInput(input) {
        const value = input.value.trim();
        const type = input.type;
        let isValid = true;
        
        if (input.hasAttribute('required') && !value) {
            isValid = false;
        }
        
        if (type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(value);
        }
        
        if (isValid) {
            input.classList.remove('invalid');
            input.classList.add('valid');
        } else {
            input.classList.remove('valid');
            input.classList.add('invalid');
        }
    }
});

// Add CSS for validation states
const validationStyle = document.createElement('style');
validationStyle.textContent = `
    .form-control.valid {
        border-color: var(--color-eco-green);
    }
    
    .form-control.invalid {
        border-color: #dc2626;
    }
    
    .form-control.valid + .input-border {
        background: var(--color-eco-green);
    }
    
    .form-control.invalid + .input-border {
        background: #dc2626;
    }
`;
document.head.appendChild(validationStyle);

// Parallax effect for hero section
document.addEventListener('DOMContentLoaded', function() {
    const heroParticles = document.querySelectorAll('.hero-particle');
    
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * 0.3;
        
        heroParticles.forEach((particle, index) => {
            const speed = (index + 1) * 0.5;
            particle.style.transform = `translateY(${rate * speed}px)`;
        });
    });
});

console.log('Contact page scripts loaded successfully!');
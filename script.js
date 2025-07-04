// Mobile Menu Toggle
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const closeMenu = document.getElementById('close-menu');
const body = document.body;

// Toggle mobile menu
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobileMenu.classList.toggle('active');
    body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : 'auto';
});

// Close mobile menu
closeMenu.addEventListener('click', () => {
    hamburger.classList.remove('active');
    mobileMenu.classList.remove('active');
    body.style.overflow = 'auto';
});

// Close mobile menu when clicking on links
const mobileLinks = document.querySelectorAll('.mobile-nav-links a');
mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        mobileMenu.classList.remove('active');
        body.style.overflow = 'auto';
    });
});

// Header scroll effect
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.style.background = 'rgba(255, 255, 255, 0.95)';
        header.style.backdropFilter = 'blur(10px)';
    } else {
        header.style.background = '#fff';
        header.style.backdropFilter = 'none';
    }
});

// Category cards interaction
const categoryCards = document.querySelectorAll('.category-card');
categoryCards.forEach(card => {
    card.addEventListener('click', () => {
        const searchInput = document.querySelector('.search-box input');
        const categoryName = card.querySelector('span').textContent.trim().toLowerCase();
        // Frase personalizada
        searchInput.value = `Olá, preciso de um serviço de ${categoryName}.`;
        searchInput.focus();
        // Scroll até o campo de busca
        document.querySelector('.search-box').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    });

    
    // Hover effects
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-8px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0) scale(1)';
    });
});

// Search functionality
const searchInput = document.querySelector('.search-box input');
const searchButton = document.querySelector('.search-box button');

searchButton.addEventListener('click', () => {
    const searchTerm = searchInput.value.trim();
    if (searchTerm) {
        alert(`Buscando profissionais para: ${searchTerm}`);
        // Aqui você integraria com sua API de busca
    }
});

searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        searchButton.click();
    }
});

// Professional card animation enhancement
const professionalCard = document.querySelector('.professional-card');
if (professionalCard) {
    professionalCard.addEventListener('mouseenter', () => {
        professionalCard.style.transform = 'scale(1.05)';
        professionalCard.style.boxShadow = '0 15px 50px rgba(0,0,0,0.2)';
    });
    
    professionalCard.addEventListener('mouseleave', () => {
        professionalCard.style.transform = 'scale(1)';
        professionalCard.style.boxShadow = '0 8px 30px rgba(0,0,0,0.15)';
    });
}

// Smooth animations on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
        }
    });
}, observerOptions);

// Observe category cards
categoryCards.forEach(card => {
    observer.observe(card);
});

// Add CSS animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);

// Loading effect
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

//Limitar Categorias
document.addEventListener('DOMContentLoaded', function() {
    const grid = document.getElementById('categoriesGrid');
    const btn = document.getElementById('seeMoreBtn');
    const cards = grid.querySelectorAll('.category-card');
    const limit = 6; // Quantidade de categorias visíveis inicialmente

    // Esconde as categorias extras
    cards.forEach((card, idx) => {
        if (idx >= limit) card.classList.add('hidden');
    });

    btn.addEventListener('click', function() {
        const isExpanded = btn.getAttribute('data-expanded') === 'true';
        if (!isExpanded) {
            // Mostrar todas
            cards.forEach(card => card.classList.remove('hidden'));
            btn.textContent = 'Ver menos';
            btn.setAttribute('data-expanded', 'true');
        } else {
            // Esconder extras
            cards.forEach((card, idx) => {
                if (idx >= limit) card.classList.add('hidden');
            });
            btn.textContent = 'Ver mais';
            btn.setAttribute('data-expanded', 'false');
        }
    });
});


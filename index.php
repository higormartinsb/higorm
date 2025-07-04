<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Conectando Profissionais e Clientes</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Inclusao do menu separado -->    
    <?php include 'header.php'; ?>

     <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Conectando quem sabe <span class="highlight">FAZER</span> com quem precisa <span class="highlight">RESOLVER</span> !!</h1>
                 <p>Você do lado de cá. O Profissional do lado de lá.<br>Encontre profissionais próximo a você.</p>
                <div class="search-box">
                    <input type="text" placeholder="O que você precisa hoje?">
                    <a href="Prestador/index.php"><button type="button">
                        <i class="fas fa-search"></i>
                    </button></a>
                </div>
            </div>
            
            <div class="hero-image">
                <div class="professional-showcase">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face" alt="Profissional" class="professional-img">
                    
                    <div class="floating-card">
                        <div class="professional-card">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face" alt="Profissional">
                            <div class="card-info">
                                <h4>Carlos Silva</h4>
                                <p>Profissional certificado</p>
                                <p class="year">desde 2018</p>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="score">4.8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
 <section class="categories">
    <div class="container">
        <h3 class="categories-title">Categorias e serviços</h3>
        <div class="categories-grid" id="categoriesGrid">
            <div class="category-card" data-category="assistencia">
                <div class="category-icon"><i class="fas fa-wrench"></i></div>
                <span>Assistência técnica</span>
            </div>
            <div class="category-card" data-category="aulas">
                <div class="category-icon"><i class="fas fa-graduation-cap"></i></div>
                <span>Aulas</span>
            </div>
            <div class="category-card" data-category="autos">
                <div class="category-icon"><i class="fas fa-car"></i></div>
                <span>Autos</span>
            </div>
            <div class="category-card" data-category="consultoria">
                <div class="category-icon"><i class="fas fa-handshake"></i></div>
                <span>Consultoria</span>
            </div>
            <div class="category-card" data-category="design">
                <div class="category-icon"><i class="fas fa-laptop-code"></i></div>
                <span>Design e Tecnologia</span>
            </div>
            <div class="category-card" data-category="eventos">
                <div class="category-icon"><i class="fas fa-calendar-alt"></i></div>
                <span>Eventos</span>
            </div>
            <div class="category-card" data-category="moda">
                <div class="category-icon"><i class="fas fa-tshirt"></i></div>
                <span>Moda e beleza</span>
            </div>
            <div class="category-card" data-category="reformas">
                <div class="category-icon"><i class="fas fa-hammer"></i></div>
                <span>Reformas e reparos</span>
            </div>
            <div class="category-card" data-category="saude">
                <div class="category-icon"><i class="fas fa-heartbeat"></i></div>
                <span>Saúde</span>
            </div>
            <div class="category-card" data-category="domesticos">
                <div class="category-icon"><i class="fas fa-home"></i></div>
                <span>Serviços Domésticos</span>
            </div>
        </div>
        <button class="see-more-btn" id="seeMoreBtn">Ver mais</button>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>ChamaJá</h3>
                    <p>Conectando profissionais e clientes de forma simples e segura.</p>
                </div>
                
                <div class="footer-section">
                    <h4>Para Clientes</h4>
                    <ul>
                        <li><a href="#">Como Contratar</a></li>
                        <li><a href="#">Segurança</a></li>
                        <li><a href="#">Suporte</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Para Profissionais</h4>
                    <ul>
                        <li><a href="#">Como Funciona</a></li>
                        <li><a href="#">Cadastre-se</a></li>
                        <li><a href="#">Central de Ajuda</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>

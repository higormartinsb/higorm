<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Conectando Profissionais e Clientes</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Inclusao do menu separado -->    
    <?php include '../header.php'; ?>

    <main class="profile-main">
        <section class="profile-card">
            <div class="profile-photo">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face" alt="Foto do profissional">
            </div>
            <div class="profile-info">
                <h1>Rogério Sena</h1>
                <span class="verified"><i class="fas fa-check-circle"></i> Verificado</span>
                <p class="profession">Eletricista Residencial</p>
                <div class="profile-rating">
                    <span class="stars">★★★★★</span>
                    <span class="score">4.8</span>
                    <span class="reviews">(120 avaliações)</span>
                </div>
                <div class="profile-details">
                    <span><i class="fas fa-map-marker-alt"></i> São Paulo, SP</span>
                    <span><i class="fas fa-briefcase"></i> Profissional desde 2018</span>
                </div>
                <div class="profile-tags">
                    <span>Instalação elétrica</span>
                    <span>Manutenção</span>
                    <span>Quadro de energia</span>
                    <span>Atende emergências</span>
                </div>
                <button class="contact-btn"><i class="fas fa-comment-dots"></i> Entrar em contato</button>
            </div>
        </section>

        <section class="profile-bio">
            <h2>Sobre Rogério</h2>
            <p>
                Profissional experiente, especializado em instalações e manutenções elétricas residenciais e comerciais. Atendo com rapidez, segurança e garantia de serviço. Disponível para emergências e orçamentos sem compromisso.
            </p>
        </section>

        <section class="profile-reviews">
            <h2>Depoimentos de clientes</h2>
            <div class="reviews-list">
                <div class="review-card">
                    <div class="review-author">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b93c?w=60&h=60&fit=crop&crop=face" alt="Cliente">
                        <div>
                            <h4>Maria Santos</h4>
                            <span>★★★★★</span>
                        </div>
                    </div>
                    <p class="review-text">"Excelente profissional, resolveu o problema rapidamente e explicou tudo com clareza."</p>
                </div>
                <div class="review-card">
                    <div class="review-author">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face" alt="Cliente">
                        <div>
                            <h4>Carlos Oliveira</h4>
                            <span>★★★★★</span>
                        </div>
                    </div>
                    <p class="review-text">"Ótimo atendimento, pontual e muito educado. Recomendo!"</p>
                </div>
                <div class="review-card">
                    <div class="review-author">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=60&h=60&fit=crop&crop=face" alt="Cliente">
                        <div>
                            <h4>Ana Costa</h4>
                            <span>★★★★★</span>
                        </div>
                    </div>
                    <p class="review-text">"Já contratei várias vezes, sempre muito profissional e eficiente."</p>
                </div>
            </div>
        </section>
    </main>

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

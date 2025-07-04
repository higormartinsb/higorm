<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Profissionais</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Inclusao do menu separado -->    
    <?php include '../header.php'; ?>

    <main class="container" style="padding-top:110px;">
        <h2 class="professionals-title">Profissionais</h2>
        <div class="professionals-list">
            <!-- Card 1 -->
            <div class="pro-card">
                <div class="pro-card-top">
                    <img class="pro-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=160&h=160&fit=crop&crop=face" alt="Foto do profissional">
                    <div class="pro-main">
                        <div class="pro-title-wrapper">
                       <h3 class="pro-name">Rogério Sena ltda comercio br e negocios online</h3>
                       </div>
                        <span class="pro-role">Eletricista Residencial</span>
                        <div class="pro-rating">
                            <span class="stars">★★★★★</span>
                            <span class="score">4.8</span>
                        </div>
                    </div>
                </div>
                <p class="pro-desc">
                    Especialista em instalações e manutenções elétricas. Atendimento rápido, seguro e com garantia.
                </p>
                <div class="pro-card-actions">
                    <a href="perfil.php" class="pro-btn primary">Ver perfil</a>
                    <a href="#" class="pro-btn outline">Solicitar orçamento</a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="pro-card">
                <div class="pro-card-top">
                    <img class="pro-avatar" src="https://images.unsplash.com/photo-1494790108755-2616b612b93c?w=160&h=160&fit=crop&crop=face" alt="Foto do profissional">
                    <div class="pro-main">
                        <div class="pro-title-wrapper">
                       <h3 class="pro-name">Maria Santos</h3>
                       </div>
                        <span class="pro-role">Encanadora</span>
                        <div class="pro-rating">
                            <span class="stars">★★★★☆</span>
                            <span class="score">4.6</span>
                        </div>
                    </div>
                </div>
                <p class="pro-desc">
                    Soluções para vazamentos, instalações e emergências hidráulicas. Atendimento em toda a cidade.
                </p>
                <div class="pro-card-actions">
                    <a href="perfil.php" class="pro-btn primary">Ver perfil</a>
                    <a href="#" class="pro-btn outline">Solicitar orçamento</a>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="pro-card">
                <div class="pro-card-top">
                    <img class="pro-avatar" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=160&h=160&fit=crop&crop=face" alt="Foto do profissional">
                    <div class="pro-main">
                        <div class="pro-title-wrapper">
                       <h3 class="pro-name">Carlos Oliveira</h3>
                       </div>
                        <span class="pro-role">Pintor</span>
                        <div class="pro-rating">
                            <span class="stars">★★★★★</span>
                            <span class="score">5.0</span>
                        </div>
                    </div>
                </div>
                <p class="pro-desc">
                    Pintura residencial e comercial com acabamento impecável e agilidade na entrega.
                </p>
                <div class="pro-card-actions">
                    <a href="perfil.php" class="pro-btn primary">Ver perfil</a>
                    <a href="#" class="pro-btn outline">Solicitar orçamento</a>
                </div>
            </div>
             <!-- Card 4 -->
            <div class="pro-card">
                <div class="pro-card-top">
                    <img class="pro-avatar" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=160&h=160&fit=crop&crop=face" alt="Foto do profissional">
                    <div class="pro-main">
                        <div class="pro-title-wrapper">
                       <h3 class="pro-name">Pedro Alves Cabral </h3>
                       </div>
                        <span class="pro-role">Pintor</span>
                        <div class="pro-rating">
                            <span class="stars">★★★★★</span>
                            <span class="score">5.0</span>
                        </div>
                    </div>
                </div>
                <p class="pro-desc">
                    Pintura residencial e comercial com acabamento impecável e agilidade na entrega.
                </p>
                <div class="pro-card-actions">
                    <a href="perfil.php" class="pro-btn primary">Ver perfil</a>
                    <a href="#" class="pro-btn outline"><i class="fa-brands fa-whatsapp"></i> Entrar em Contato</a>
                </div>
            </div>
            <!-- Adicione mais cards conforme necessário -->
        </div>
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

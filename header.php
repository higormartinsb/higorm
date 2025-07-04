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

 <header class="header">
        <nav class="navbar">
            <div class="nav-brand">
                <i class="fas fa-tools"></i>
                <h2>ChamaJá</h2>
            </div>
            
            <!-- Desktop Menu -->
            <ul class="nav-menu">
                <li><a href="/ChamaJa/index.php">Home</a></li>
                <li><a href="/ChamaJa/Prestador/cadastro.php">Cadastro</a></li>
                <li><a href="/ChamaJa/Prestador/perfil.php">Perfil profissional</a></li>
                <li><a href="/ChamaJa/Prestador/index.php">Cards dos profissionais</a></li>
                <li><a href="#como-funciona">Como funciona?</a></li>
                <li><a href="#seguranca">Segurança</a></li>
                <li><a href="#" class="btn-entrar">Entrar</a></li>
            </ul>

            <!-- Mobile Menu Button -->
            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <div class="mobile-menu-header">
                <h3>Menu</h3>
                <button class="close-btn" id="close-menu">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <ul class="mobile-nav-links">
                <li><a href="index.html"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#profissional"><i class="fas fa-user-tie"></i> Seja um profissional</a></li>
                <li><a href="#como-funciona"><i class="fas fa-info-circle"></i> Como funciona?</a></li>
                <li><a href="#seguranca"><i class="fas fa-shield-alt"></i> Segurança</a></li>
                <li><a href="#" class="mobile-login"><i class="fas fa-sign-in-alt"></i> Entrar</a></li>
            </ul>
        </div>
    </header>
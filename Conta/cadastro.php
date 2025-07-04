<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Criar Conta</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <main class="cadastro-main">
        <div class="cadastro-card">
            <div class="cadastro-logo">
                <i class="fas fa-bolt"></i>
                <span>Chama<span class="highlight">Já</span></span>
            </div>
            <h2>Criar sua conta</h2>
            <form class="cadastro-form" autocomplete="off">
                <div class="input-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>
                    <span class="toggle-password" onclick="togglePassword()"><i class="fas fa-eye"></i></span>
                </div>
                <button type="submit" class="cadastro-btn">Criar conta</button>
            </form>
            <div class="cadastro-links">
                <span>Já tem uma conta?</span>
                <a href="login.php" class="link-login">Entrar</a>
            </div>
        </div>
    </main>
    <script>
    function togglePassword() {
        const senha = document.getElementById('senha');
        const icon = document.querySelector('.toggle-password i');
        if (senha.type === 'password') {
            senha.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            senha.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    </script>
</body>
</html>

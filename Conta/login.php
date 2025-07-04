<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <main class="login-main">
        <div class="login-card">
            <div class="login-logo">
                <i class="fas fa-bolt"></i>
                <span>Chama<span class="highlight">Já</span></span>
            </div>
            <h2>Entrar na sua conta</h2>
            <form class="login-form" autocomplete="off">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Sua senha" required>
                    <span class="toggle-password" onclick="togglePassword()"><i class="fas fa-eye"></i></span>
                </div>
                <button type="submit" class="login-btn">Entrar</button>
            </form>
            <div class="login-links">
                <a href="recuperar-senha.php">Esqueceu a senha?</a>
                <span>ou</span>
                <a href="cadastro.php" class="link-cadastro">Criar conta</a>
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

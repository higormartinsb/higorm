<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Recuperar Senha</title>
    <link rel="stylesheet" href="css/recuperar-senha.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <main class="recupera-main">
        <div class="recupera-card">
            <div class="recupera-logo">
                <i class="fas fa-bolt"></i>
                <span>Chama<span class="highlight">Já</span></span>
            </div>
            <h2>Recuperar senha</h2>
            <p class="recupera-texto">
                Informe seu e-mail cadastrado para receber o link de redefinição de senha.
            </p>
            <form class="recupera-form" autocomplete="off">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>
                <button type="submit" class="recupera-btn">Enviar link</button>
            </form>
            <div class="recupera-links">
                <a href="login.php" class="link-login">Voltar para login</a>
            </div>
        </div>
    </main>
</body>
</html>

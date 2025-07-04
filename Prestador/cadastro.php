<?php
//echo file_exists('meubanco.db') ? 'Banco encontrado' : 'Banco NÃO encontrado';

// Ativar erros (para debug)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conectar ao banco via caminho de pasta
include '../BancoDados/conexao.php';

// Buscar os serviços
$servicos = $db->query("SELECT IdServico, NomeServico FROM servicos")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamaJá - Conectando Profissionais e Clientes</title>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>

<!-- Inclusao do menu separado -->    
<?php include '../header.php'; ?>

  <section class="section-cadastro">
    <form class="form-cadastro" action="salvarCadastro.php" method="post">

    <h2>Cadastro de Prestador</h2>

    <label class="label-cadastro">Nome:</label>
    <input class="input-cadastro" type="text" name="nome" required>

    <label class="label-cadastro">Email:</label>
    <input class="input-cadastro" type="email" name="email" required>

    <label class="label-cadastro">Telefone:</label>
    <input class="input-cadastro" type="text" name="telefone">

    <label class="label-cadastro">Cidade:</label>
    <input class="input-cadastro" ype="text" name="cidade">

    <label class="label-cadastro">Senha:</label>
    <input class="input-cadastro" ype="password" name="senha" required>

    <label class="label-cadastro">Serviços oferecidos:</label>
    <select name="servicos[]" multiple class="select2" style="width: 100%;" required>
      <option disabled value="">Selecione</option>
      <?php foreach ($servicos as $servico): ?>
        <option value="<?= $servico['IdServico'] ?>"><?= htmlspecialchars($servico['NomeServico']) ?></option>
      <?php endforeach; ?>
    </select>

    <button class="button-cadastro" type="submit">Cadastrar</button>
    </form>
  </section>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Inicialização do Select2 -->
  <script>
    $(document).ready(function() {
      $('.select2').select2({
        placeholder: "Selecione um ou mais serviços",
        allowClear: true
      });
    });
  </script>
</body>
</html>
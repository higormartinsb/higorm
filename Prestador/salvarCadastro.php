<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('sqlite:meubanco.db');

    // Criar tabela prestadores (caso não exista)
    $db->exec("CREATE TABLE IF NOT EXISTS prestadores (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT,
        email TEXT,
        telefone TEXT,
        cidade TEXT,
        senha TEXT
    )");

    // Criar tabela de associação prestador_servico (caso não exista)
    $db->exec("CREATE TABLE IF NOT EXISTS prestador_servico (
        idPrestador INTEGER,
        idServico INTEGER,
        PRIMARY KEY (idPrestador, idServico),
        FOREIGN KEY (idPrestador) REFERENCES prestadores(id),
        FOREIGN KEY (idServico) REFERENCES servicos(IdServico)
    )");

    // Capturar dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Inserir prestador
    $stmt = $db->prepare("INSERT INTO prestadores (nome, email, telefone, cidade, senha) 
                          VALUES (:nome, :email, :telefone, :cidade, :senha)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Pegar o ID do prestador recém-cadastrado
    $idPrestador = $db->lastInsertId();

    // Associar os serviços escolhidos
    if (!empty($_POST['servicos'])) {
        foreach ($_POST['servicos'] as $idServico) {
            $stmt = $db->prepare("INSERT INTO prestador_servico (idPrestador, idServico) 
                                  VALUES (:idPrestador, :idServico)");
            $stmt->bindParam(':idPrestador', $idPrestador);
            $stmt->bindParam(':idServico', $idServico);
            $stmt->execute();
        }
    }

    echo "Cadastro realizado com sucesso!";

} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
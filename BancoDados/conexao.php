<?php
try {
  $db = new PDO('sqlite:BancoDados/meubanco.db');
} catch (PDOException $e) {
  die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
<?php
  try {
    $username = "root";
    $password = "root";

    $pdo = new PDO('mysql:dbname=avaliacaoii_pweb2;host=localhost', $username, $password);

  } catch(PDOException $erro) {
    echo 'Conexão falhou, erro: ' . $erro->getMessage();
    exit();
  }
?>
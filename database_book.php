<?php
function conectarBancoDados() 
{
  try
  {
    // Conectar ao banco de dados SQLite
    $pdo = new PDO('sqlite:database.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar tabela se não existir
    $sql = "CREATE TABLE IF NOT EXISTS livraria (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titulo TEXT NOT NULL,
        autor TEXT NOT NULL,
        public TEXT NOT NULL
    )";
    $pdo->exec($sql);

    return $pdo;
  } catch (PDOException $e) 
  {
      echo "Erro na conexão: " . $e->getMessage();
      return null;
  }
}
?>
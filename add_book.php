<?php
require_once 'database_book.php';

  function adicionarLivro($titulo, $autor, $public) 
  {
    try 
    {
      $pdo = conectarBancoDados();
      $stmt = $pdo->prepare("INSERT INTO livraria (titulo, autor, public) VALUES (:titulo, :autor, :public)");
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':autor', $autor);
      $stmt->bindParam(':public', $public);
  
      if ($stmt->execute()) 
      {
        return "Registro criado com sucesso!";
      }
      return "Erro ao criar registro!";
    } catch (PDOException $e) 
    {
      return "Erro: " . $e->getMessage();
    }
  }
?>
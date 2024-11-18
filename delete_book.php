<?php
require_once 'database_book.php';

  function deletarLivro($id)
  {
    try
    {
      $pdo = conectarBancoDados();
      $stmt = $pdo->prepare("DELETE FROM livraria WHERE id = :id");
      $stmt->bindParam(':id', $id);

      if ($stmt->execute())
      {
          return "Registro deletado com sucesso!";
      }
      return "Erro ao deletar registro!";
    } catch (PDOException $e)
    {
      return "Erro: " . $e->getMessage();
    }
  }
?>
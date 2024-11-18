<?php
require_once 'database_book.php';

  function editarLivro($id, $titulo, $autor, $public) 
  {
    try 
    {
      $pdo = conectarBancoDados();
      $id = $_POST['id'];
      $titulo = $_POST['titulo'];
      $autor = $_POST['autor'];
      $public = $_POST['public'];

      $stmt = $pdo->prepare("UPDATE livraria SET titulo = :titulo, autor = :autor, public = :public WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':autor', $autor);
      $stmt->bindParam(':public', $public);
      if ($stmt->execute())
      {
          echo "Registro atualizado com sucesso!";
      } else {
          echo "Erro ao atualizar registro!";
      }
    } catch (PDOException $e) 
    {
      return "Erro: " . $e->getMessage();
    }
  }
?>
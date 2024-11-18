<?php
require_once 'database_book.php';

    function lerLivros() {
        try
        {
            $pdo = conectarBancoDados();
            $stmt = $pdo->query("SELECT * FROM livraria");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e)
        {
            return ["erro" => $e->getMessage()];
        }
    }
?>
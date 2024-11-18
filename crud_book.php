<?php 
// arquivo principal que controla as ações
require_once 'database_book.php';
require_once 'add_book.php';
require_once 'read_book.php';
require_once 'update_book.php';
require_once 'delete_book.php';

    try
    {
        // Conectar ao banco de dados SQLite
        $pdo = new PDO('sqlite:database_book.db');
        
        // Verificar a ação
        $action = isset($_GET['action']) ? $_GET['action'] : '';
    
        switch ($action)
        {
        case 'create':
            $response = adicionarLivro(
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['public']
            );
            echo $response;
            break;
        
        case 'read':
            $response = lerLivros();
            echo json_encode($response);
            break;
            
        case 'update':
            $response = editarLivro(
                $_POST['id'],
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['public']
            );
            echo $response;
            break;
    
        case 'delete':
            $response = deletarLivro($_GET['id']);
            echo $response;
            break;
    
        default:
            echo "Ação inválida";
            break;

        }        
    
    } catch (PDOException $e)
    {
        echo "Erro: " . $e->getMessage();
    }
?>

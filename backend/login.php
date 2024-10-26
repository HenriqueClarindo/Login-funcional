<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo "preencha seu E-mail";
    }elseif(strlen($_POST['senha']) == 0){
        echo "preencha sua Senha";
    }else{

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['sebrenome'] = $usuario['sobrenome'];

            header('Location: ../painel.php');

        }else{
            echo "Falha ao Logar, E-mail ou Senha incorretos!";
        }
    }

} 
?>
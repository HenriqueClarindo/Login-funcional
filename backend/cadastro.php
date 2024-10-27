<?php
include('conexao.php');

if (isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $sobrenome = $mysqli->real_escape_string($_POST['sobrenome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    if (strlen($nome) == 0) {
        echo "Preencha seu Nome";
    } elseif (strlen($sobrenome) == 0) {
        echo "Preencha seu Sobrenome";
    } elseif (strlen($email) == 0) {
        echo "Preencha seu E-mail";
    } elseif (strlen($senha) == 0) {
        echo "Preencha sua Senha";
    } else {
        $sql = "SELECT count(*) as total FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->fetch_assoc();

        if ($quantidade['total'] == 1) {
            $_SESSION['email_existe'] = true;
            header('Location: ../cadastro.html');
            exit;
        }

        $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email', '$senha')";

        if ($mysqli->query($sql) === true) {
            $_SESSION['status_cadastros'] = true;
            echo "<script>
            alert('Cadastro feito com sucesso!');
            window.location.href = '../cadastro.html';
            </script>";
            exit;
        } else {
            echo "Erro ao cadastrar usuário: " . $mysqli->error;
        }
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
var_dump($_POST); // Isso mostra os dados recebidos
exit;
$mysqli->close();
?>

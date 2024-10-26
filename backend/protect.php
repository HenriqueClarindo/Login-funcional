<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("Você não pode acessar essa pagina, faça Login Primeiro <p><a href = \"./index.html\">Login</a></p>");
}

?>
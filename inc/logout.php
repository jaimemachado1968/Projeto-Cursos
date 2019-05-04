<?php
    //iniciando a sessao do usuario
    session_start();
    //destruindo a sessao do usuario
    session_destroy();
    //redirecionando o usuario para o login.php
    header("Location: ../login.php");
    
    ?>
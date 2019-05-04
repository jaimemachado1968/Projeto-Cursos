<?php
    require "req/database.php";
    require "req/funcoesLogin.php";
    include "inc/head.php";

    if(isset($_REQUEST['email']) && $_REQUEST['email']) {
        // pegado os valores dos inputs
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        // verificando se o usuario esta logado atraves da função
        $infoLogado = logarUsuario($email, $senha);

        if ($infoLogado == true){
            // criando a sessão
            session_start();
            // criando o campo nome na sessão
            $_SESSION["nome"] = $infoLogado['nomeUsuario'];
            // criando o campo email na sessão
            $_SESSION["email"] = $email;
            // criando o campo nivelAcesso
            $_SESSION["nivelAcesso"] = $infoLogado['tipoUsuario'];
            // criando o campo logado na sessão
            $_SESSION["logado"] = true;
            // redirecionando o usuario para o index.php
            header("Location: index.php");
        } else {
            $erro = "Seu usuario não foi encontrado!";
        }
    }

?>
    <div class="page-center">
        <h2>Login</h2>
        <!-- mostra a mensagem de erro caso a variavel $erro esteja definida -->
        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger">
            <span><?php echo $erro; ?></span>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post" class="col-md-7">
                
                <div class="col-md-12">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail">
                </div>
                <div class="col-md-12">
                    <label for="inputSenha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="inputSenha">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Logar</button>
                    <a href="cadastro.php" class="col-md-offset-9">Fazer cadastro!</a>
                </div>
            </form>
    </div>
<?php
    include "inc/footer.php";
?>
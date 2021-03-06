<?php
    include "inc/head.php";
    include "inc/header.php";
    require "req/funcoesValidacao.php";
    // variaveis
    $nome = $_REQUEST["nomeCompleto"];
    $cpf = $_REQUEST["CPF"];
    $nroCartao = $_REQUEST["numeroCartao"];
    $validadeCartao = $_REQUEST["validadeCartao"];
    $CVV = $_REQUEST["CVV"];
    $nomeCurso = $_REQUEST["nomeCurso"];
    $precoCurso = $_REQUEST["precoCurso"];
    $erros = [];

   
    validarCompra($nome, $cpf, $nroCartao, $validadeCartao, $CVV)
?>


    <div class="container">
        <div class="col-md-6 col-md-offset-3"
            <?php if(count($erros) > 0): ?>
                <div class="painel painel-danger">
                    <div clas="panel-heading">
                    <span Preencha seus dados corretamente!></span>
                    </div>
                    <div class="painel-body">
                        <ul class="list-group">
                        <?php foreach ($erros as $chave => $valorErro) : ?>
                            <li class="list-group-item">
                                <?= $valorErro; ?>
                            </li>
                        <?php endforeach; ?>   
                        </ul>
                        <div class="center">
                            <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="painel painel-primary">
                    <div class="panel-heading">
                    <span Compra realizada com sucesso!></span>
                    </div>
                    <div class="painel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nome Curso</strong><?= $nomeCurso; ?></li>
                            <li class="list-group-item"><strong>Preço: R$</strong><?=$precoCurso; ?></li>
                            <li class="list-group-item"><strong>Nome Completo</strong> <?php echo $nome; ?></li>
                        </ul>
                        <div class="center">
                            <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php include "inc/footer.php"; ?>
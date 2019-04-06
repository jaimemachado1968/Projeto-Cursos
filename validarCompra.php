<?php
    $nome = $_REQUEST["nomeCompleto"];
    $cpf = $_REQUEST["CPF"];
    $nroCartao = $_REQUEST["numeroCartao"];
    $validadeCartao = $_REQUEST["validadeCartao"];
    $CVV = $_REQUEST["CVV"];
    $nomeCurso = $_REQUEST["nomeCurso"];
    $precoCurso = $_REQUEST["precoCurso"];
    $erros = [];

    // funcoes
    function validarNome($nome){
        return strlen($nome) > 0 && strlen($nome) <= 15;
    }
    var_dump(validarNome($nome));

    function validarCPF($cpf){
        return strlen($cpf) == 11;
    }

    function validarNroCartao($nroCartao){
        $primeiroNum = substr($nroCartao, 0, 1);
        return $primeiroNum == 4 || $primeiroNum == 5 || $primeiroNum == 6;
    }
    var_dump(validarNroCartao($nroCartao));

    function validarDtCartao($data){
        $dataAtual = date("Y-m");
        return $data >= $dataAtual;
    }
    var_dump(validarDtCartao($validadeCartao));

    function validadeCVV($CVV){
        return strlen($CVV) == 3;
    }
    
    function validarCompra($nome, $cpf, $nroCartao, $validadeCartao, $CVV){
        global $erros;
        if (validarNome($nome)){
            array_push($erros, "Preencha seu nome");
        }
        if (validarCPF($cpf)){
            array_push($erros, "Seu CPF precisa ter 11 caracteres");
        }
        if (validarNroCartao($nroCartao)){
            array_push($erros, "Seu cartao precisa comecar com 4, 5 ou 6");
        }
        if (validarDtCartao($validadeCartao)){
            array_push($erros, "validade precisa ser maior que a data atual");
        }
        if (validadeCVV($CVV)){
            array_push($erros, "seu CVV precisa ter 3 caracteres");
        }
    }
validarCompra($nome, $cpf, $nroCartao, $validadeCartao, $CVV)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
                                <? $valorErro; ?>
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
                    <div clas="panel-heading">
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
</body>
</html>
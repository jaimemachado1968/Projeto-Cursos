<?php
// funcoes
    function validarNome($nome){
        return strlen($nome) > 0 && strlen($nome) <= 15;
    }

    function validarCPF($cpf){
        return strlen($cpf) == 11;
    }

    function validarNroCartao($nroCartao){
        $primeiroNum = substr($nroCartao, 0, 1);
        return $primeiroNum == 4 || $primeiroNum == 5 || $primeiroNum == 6;
    }

    function validarDtCartao($data){
        $dataAtual = date("Y-m");
        return $data >= $dataAtual;
    }

    function validadeCVV($CVV){
        return strlen($CVV) == 3;
    }
    
    function validarCompra($nome, $cpf, $nroCartao, $validadeCartao, $CVV){
        global $erros;
        if (!validarNome($nome)){
            array_push($erros, "Preencha seu nome");
        }
        if (!validarCPF($cpf)){
            array_push($erros, "Seu CPF precisa ter 11 caracteres");
        }
        if (!validarNroCartao($nroCartao)){
            array_push($erros, "Seu cartao precisa comecar com 4, 5 ou 6");
        }
        if (!validarDtCartao($validadeCartao)){
            array_push($erros, "validade precisa ser maior que a data atual");
        }
        if (!validadeCVV($CVV)){
            array_push($erros, "seu CVV precisa ter 3 caracteres");
        }
    }
?>
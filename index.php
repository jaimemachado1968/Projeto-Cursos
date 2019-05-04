<?php
    include "inc/head.php";
    include "inc/header.php";
    include "req/database.php";

    try {
        $query = $conexao->query('SELECT * FROM cursos'); //consulta banco de dados

        $cursos = $query->fetchAll(PDO::FETCH_ASSOC); //traz todos as linhas em array associativo
        
        $conexao = null;
    } catch( PDOExcepetion $Exception ){
        echo $Exception->getMessage();
    }
        
?>



    <div class="container">
        <div class="row">
        <?php foreach ($cursos as $key => $infoCurso) : ?>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                <img src="assets/img/produtos/<?php echo $infoCurso['image']; ?>" alt="Foto curso<?php echo $infoCurso['nome']; ?>">
                <div class="caption">
                    <h3><?php echo $infoCurso['nome']; ?></h3>   
                    <p><?php echo $infoCurso['descricao']; ?></p>
                    <p>R$ <?php echo $infoCurso['preco']; ?></p>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#<?php echo $infoCurso['tag']; ?>" role="button">Comprar</a>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($cursos as $key => $infoCurso) : ?>
        <div class="modal fade" id="<?php echo $infoCurso['tag']; ?>" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Prencha os seus dados</h4>
        </div>
        <div class="modal-body">
            <h4>Curso de: <?php echo $infoCurso['nome']; ?></h4>
            <h4>Preço: R$ <?php echo $infoCurso['preco']; ?></h4>
            <form action="validarCompra.php" method="post">
                <input type="hidden" name="nomeCurso" value="<?php echo $infoCurso['nome']; ?>">
                <input type="hidden" name="precoCurso" value="<?php echo $infoCurso['preco']; ?>">
                <div class="input-group col-md-5">
                    <label for="nomeCompleto"> Nome Completo</label>
                    <input for="nomeCompleto" name="nomeCompleto" type="text" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="CPF"> CPF</label>
                    <input for="CPF" name= "CPF" type="number" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="numeroCartao"> Numero do Cartao</label>
                    <input for="numeroCartao" name="numeroCartao"type="number" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="validadeCartao"> Validade Cartao</label>
                    <input for="validadeCartao" name="validadeCartao" type="month" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="CVV"> CVV</label>
                    <input for="CVV" type="number" name="CVV" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Comprar</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php endforeach; ?>
        </div>
    </div>

    <?php include "inc/footer.php"; ?>
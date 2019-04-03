<?php 
    
    $cursos = [
        "Full Stack" => ["Curso de desenvolvimento web", 1000.99, "full.jpeg", "fullstack"],
        "Marketing" => ["Curso de Marketing", 1000.98, "marketing.jpg", "marketing"],
        "UX" => ["Curso de User Experience", 9000.98, "ux.png", "ux"],
        "Mobile Android" => ["Curso de apps", 1000.97, "android.jpg", "android"]
    ]; 

    $usuario = [
        "Nome" => "Jaime",
        "Email" => "jpmachado.1968@gmail.com",
        "Senha" => "123456",
        "NivelAcesso" => mt_rand(0, 1)
    ];
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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <span>Cursos</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if($usuario["NivelAcesso"] == 1): ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ações <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Aditionar Produto</a></li>
                            <li><a href="#">Editar Produto</a></li>
                        </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquise Aqui">
                </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </form>
                <p class="navbar-text navbar-right">
                    Logado Como
                    <strong>
                        <a href="#" class="navbar-link"><?php echo $usuario["Nome"]; ?></a>
                    </strong>
                </p>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
        <?php foreach ($cursos as $nomeCurso => $infoCurso) : ?>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                <img src="<?php echo "assets/img/$infoCurso[2]"; ?>" alt="<?php echo "Foto curso $nomeCurso"; ?>">
                <div class="caption">
                    <h3><?php echo $nomeCurso; ?></h3>
                    <p><?php echo $infoCurso[0]; ?></p>
                    <p><?php echo $infoCurso[1]; ?></p>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="<?php echo"#$infoCurso[3]"; ?>" role="button">Comprar</a>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($cursos as $nomeCurso => $infoCurso) : ?>
        <div class="modal fade" id="<?php echo $infoCurso[3]; ?>" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Prencha os seus dados</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="input-group col-md-5">
                    <label for="Nome Completo"> Nome Completo</label>
                    <input for="nome Completo" type="text" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="CPF"> CPF</label>
                    <input for="CPF" type="number" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="Numero do Cartao"> Numero do Cartao</label>
                    <input for="Numero do Cartao" type="number" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="Validade Cartao"> Validade Cartao</label>
                    <input for="Validade Cartao" type="month" class="form-control">
                </div>
                <div class="input-group col-md-5">
                    <label for="CVV"> CVV</label>
                    <input for="CVV" type="number" class="form-control">
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body>
</html>
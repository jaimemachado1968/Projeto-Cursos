<?php 
    $usuario = [
        "Nome" => "Jaime",
        "Email" => "jpmachado.1968@gmail.com",
        "Senha" => "123456",
        "NivelAcesso" => mt_rand(0, 1)
    ];
?>
<header>

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
</header>
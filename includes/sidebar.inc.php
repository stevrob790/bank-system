<?php
    include_once 'cuenta.inc.php';
?>

<div class="d-flex" id="wrapper">

<div class="bg-primary border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-white"> <img src="../img/bank.svg" width="40px"> Sistema Bancario</div>
    <div class="list-group list-group-flush">
        <a href="inventario.php" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-home"></i> Inicio</a>
        <a href="verSaldo.php" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-wallet"></i> Ver Saldos</a>
        <a href="consignar.php" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-piggy-bank"></i> Consignar</a>
        <a href="retirar.php" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-hand-holding-usd"></i> Retirar</a>
        <a href="transferir.php" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-comment-dollar"></i> Transferencia</a>
        <a href="extractos.php" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-file-alt"></i> Generacion de Extractos</a>
    </div>
</div>
<div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
        <button class="btn btn-warning" id="menu-toggle"><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ver Cuenta <i class="fas fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item"><i class="fas fa-address-card"></i> Cuenta: <?php echo $_SESSION['cuenta']; ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="perfil.php"><i class="fas fa-user-edit"></i> Actualizar Datos</a>
                        <a class="dropdown-item" href="eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar Cuenta</a>
                        <div class="dropdown-divider"></div>
                        <?php if(isset($_SESSION['cuenta'])): ?>
                            <a class="dropdown-item" role="button" href="inventario.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Salir</a>
                        <?php endif ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
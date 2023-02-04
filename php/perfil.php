<?php
    include_once '../includes/validar.inc.php';

    if (empty($_SESSION['cuenta'])) {
        header('location: index.php');
    } 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/inventario.css">
    <link rel="shortcut icon" type="icon/svg" href="../img/bank.svg">
    <title>Perfil</title>
</head>

<body>

    <?php 
        include_once '../includes/sidebar.inc.php';
    ?>

    <br>
    <?php
        if(isset($_SESSION['msg'])): ?>

            <div class="container alert alert-info text-center" role="alert">
                <?php 
                    echo "<i class='fas fa-check-circle'></i> " . $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                ?>
            </div>

         <?php endif ?>   

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light" style="width: 600px;">
                    <div class="card-header bg-secondary text-center">
                        <h4><i class="fas fa-user-edit"></i> Perfil</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="perfil.php">
                        <p id="error" style="color: red; font-size: 17px;" class="text-center"><?php echo $errorusuario; ?></p>

                            <p class="text-center" id="error" style="color: red; font-size: 18px;"></p>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Cuenta</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"  name="cuenta" readonly="" value="<?php echo $_SESSION['cuenta']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"  name="nombre" readonly="" value="<?php echo $_SESSION['nombre']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Correo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="correo" value="<?php echo $_SESSION['correo']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Fecha Nacimiento</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fechaNacimiento" readonly="" value="<?php echo $_SESSION['fechaNacimiento']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Direccion</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="direccion" value="<?php echo $_SESSION['direccion']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Celular</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" class="form-control" name="celular" value="<?php echo $_SESSION['celular']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Clave</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="clave" value="<?php echo $_SESSION['clave']; ?>">
                                </div>
                            </div>

                            <br>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" name="actualizar">Actualizar <i class="fas fa-edit"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
        </div>

    </div>

    <?php
        include_once '../includes/sidebartoggle.inc.php';
    ?>

    <script>
        
    </script>
</body>

</html>
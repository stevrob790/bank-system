<?php
    include_once '../includes/cuenta.inc.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <link rel="shortcut icon" type="icon/svg" href="../img/bank.svg">
    <title>Registro</title>
    <style>
        .tam {
            width: 600px;
        }
        
        .container {
            margin-top: 30px;
            padding: 30px 50px 30px 50px;
        }
    </style>
</head>

<body>
    
    <?php
        include_once '../includes/nav.inc.php';
    ?>  

    <div class="container" style="margin-left: 140px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 600px;">
                    <div class="card-header bg-light text-center">
                        <h4>Registro <i class="fas fa-sign-in-alt"></i></h4>
                    </div>
                    <div class="card-body">
                        <p id="error" style="color: red; font-size: 17px;" class="text-center"><?php echo $error ?></p>
                        <form action="crearCuenta.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Cedula</label>
                                    <input type="text" class="form-control" name="cedula" autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Correo</label>
                                    <input type="text" class="form-control" name="correo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha Nacimiento</label>
                                    <input type="date" class="form-control" name="fechaNacimiento">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direccion">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="clave">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger col" name="registrar">Crear Cuenta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://kit.fontawesome.com/ef6de34024.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
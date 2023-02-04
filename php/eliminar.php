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
    <title>Eliminar Cuenta</title>
</head>

<body>

    <?php 
        include_once '../includes/sidebar.inc.php';
    ?>

    <br>
    <br>
    <br> 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light" style="width: 600px;">
                    <div class="card-header bg-secondary text-center">
                        <h4><i class="fas fa-id-card"></i> Verificacion</h4>
                    </div>
                    <div class="card-body">
                        <form action="eliminar.php" method="post">
                        
                        <p id="error" style="color: red; font-size: 17px;" class="text-center"><?php echo $errorusuario; ?></p>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Cuenta</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"  name="cuenta">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Clave</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="clave">
                                </div>
                            </div>

                            <br>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger" name="eliminar">Eliminar <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/></svg></button>
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
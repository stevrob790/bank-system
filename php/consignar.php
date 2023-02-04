<?php
    include_once '../includes/banco.inc.php';

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
    <link rel="shortcut icon" type="icon/svg" href="../img/bank.svg">
    <title>Consignar</title>
</head>

<body>

    <?php 
        include_once '../includes/sidebar.inc.php';
    ?>

    <br>
    <br>

    <?php
        if(isset($_SESSION['msg'])): ?>

            <div class="container alert alert-success text-center" role="alert">
                <?php 
                    echo "<i class='fas fa-check-circle'></i> " . $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                ?>
            </div>

         <?php endif ?>  

        <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light" style="width: 600px;">
                    <div class="card-header bg-info text-center">
                        <h4><i class="fas fa-piggy-bank"></i> Consignar</h4>
                    </div>
                    <div class="card-body">
                        <form action="consignar.php" method="post">
                            <p id="error" style="color: red; font-size: 17px;" class="text-center"><?php echo $errorusuario; ?></p>
                            <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Cuenta</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"  name="cuenta">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Cantidad</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cantidad">
                                </div>
                            </div>

                            <br>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning" name="consignar">Consignar</button>
                            </div>
                        </form>
                    </div>
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
</body>

</html>
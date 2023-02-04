<?php
    include_once '../includes/conexion.inc.php';

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
    <title>Inicio</title>
</head>

<body>

    <?php 
        include_once '../includes/sidebar.inc.php';
    ?>

        <div class="features-boxed">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Features</h2>
                    <p class="text-center" style="font-size: 18px;">Nuestro servicio se destaca principalmente con las siguientes caracteristicas.</p>
                </div>
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-map-marker icon"></i>
                            <h3 class="name">Funciona en Todas Partes</h3>
                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-clock-o icon"></i>
                            <h3 class="name">Siempre Disponible</h3>
                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-plane icon"></i>
                            <h3 class="name">Veloz</h3>
                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p></div>
                </div>
            </div>
        </div>

    
        </div>
    </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Swal.fire({
            title: 'Bienvenido!',
            text: 'Recuerda utilizar todas nuestras funciones',
            icon: 'success',
            confirmButtonText: 'Continuar'
        })
    </script>

    <?php
        include_once '../includes/sidebartoggle.inc.php';
    ?>
</body>

</html>
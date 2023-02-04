
<?php
    include_once '../includes/conexion.inc.php';

    $errorusuario = "";
    $icon = "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-exclamation-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z'/></svg>";

    if (isset($_POST['consignar'])) {
        
        $cuenta = mysqli_real_escape_string($conn, $_POST['cuenta']);        
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
  
        if (empty($cuenta) || empty($nombre) || empty($cantidad)) {
        
            $errorusuario .= $icon . " Todos los campos son obligatorios";
        
        } else if (!is_numeric($cuenta)) {

            $errorusuario .= $icon . " Cuenta debe contener digitos";  

        } else if (is_numeric($nombre)) {

            $errorusuario .= $icon . " Nombre debe contener letras";

        } else if (!is_numeric($cantidad)) {

            $errorusuario .= $icon . " Ingrese una cantidad valida";  
       
        } else if ($cantidad < 0) {

            $errorusuario .= $icon . " Ingrese un cantidad valida";
            
        }

        if (empty($errorusuario)) {
            
            $user =  mysqli_query($conn, "SELECT numero_cuenta FROM cuenta WHERE numero_cuenta='$cuenta'");
            $result = mysqli_num_rows($user);

            if ($result) {

                $saldo = mysqli_query($conn, "SELECT saldo FROM cuenta WHERE numero_cuenta='$cuenta'");
                $num = mysqli_fetch_array($saldo);

                $impuesto = $cantidad * 4 / 1000;

                $suma = intval($num['saldo']) + ($cantidad - $impuesto);
                
                $sql = mysqli_query($conn, "UPDATE cuenta SET saldo = '$suma' WHERE numero_cuenta='$cuenta'");
                // mysqli_query($conn, $sql);

                $_SESSION['msg'] = "Consignacion Realizada";

            } else {
                $errorusuario = $icon . " Cuenta no esta registrada!";
            }
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <link rel="shortcut icon" type="icon/svg" href="../img/bank.svg">
    <title>Consignar</title>
</head>

<body>

    <?php
        include_once '../includes/nav.inc.php';
    ?>

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
    <br>

    <div class="container" style="margin-left: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light" style="width: 600px;">
                    <div class="card-header bg-info text-center">
                        <h4><i class="fas fa-piggy-bank"></i> Consignar</h4>
                    </div>
                    <div class="card-body">
                        <form action="consignarGeneral.php" method="post">
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
                                <button type="submit" class="btn btn-primary" name="consignar">Consignar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/ef6de34024.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx " crossorigin="anonymous "></script>
</body>

</html>
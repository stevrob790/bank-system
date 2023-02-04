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
    <link rel="shortcut icon" type="icon/svg" href="../img/bank.svg">
    <title>Ver Saldo</title>
</head>

<body>

    <?php 
        include_once '../includes/sidebar.inc.php';

        $cuenta = $_SESSION['cuenta'];

        $sql = "SELECT * FROM cuenta WHERE numero_cuenta = '$cuenta'";
        $query_run = mysqli_query($conn, $sql);

    ?>

         <br>
        <div class="container-fluid">
            <h2 class="mt-4 text-center"><i class="fas fa-search-dollar"></i> Consultar Saldo</h2>
        </div>
        
        <br>

        <div class="card">
            <br>
            <div class="card-body">
                <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"><i class="fas fa-address-card"></i> Cedula </th>
                                <th scope="col"><i class="fas fa-piggy-bank"></i> Saldo </th>
                            </tr>
                        </thead>
                <?php
                    if($query_run){
                        foreach($query_run as $row){
                ?>
                        <tbody class="table-success">
                            <tr>
                                <td> <?php echo $row['numero_cuenta']; ?> </td>                            
                                <td> $ <?php echo $row['saldo']; ?> </td>
                            </tr>
                        </tbody>
                <?php           
                        }
                    } else {
                        echo "Datos no encontrados";
                    }
                ?>
                    </table>
            </div>    
            <br>    
        </div>
    

        </div>
    </div>

    <?php
        include_once '../includes/sidebartoggle.inc.php';
    ?>
</body>

</html>
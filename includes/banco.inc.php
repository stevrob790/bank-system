<?php

    include_once 'conexion.inc.php';

    $errorusuario = "";
    $icon = "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-exclamation-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z'/></svg>";


    if (isset($_POST['consignar'])) {
        $principal = $_SESSION['cuenta'];
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

                $fecha = date("Y-m-d");

                $suma = intval($num['saldo']) + ($cantidad - $impuesto);

                $sql = mysqli_query($conn, "UPDATE cuenta SET saldo = '$suma' WHERE numero_cuenta='$cuenta'");
                $newsql = mysqli_query($conn, "INSERT INTO transaccion (numero_cuenta, operacion, valor, fecha) VALUES ('$principal', 'Consignacion', '$cantidad', '$fecha')");

                $_SESSION['msg'] = "Consignacion Realizada";

            } else {
                $errorusuario = $icon . " Cuenta no esta registrada!";
            }
        }
    }


    if (isset($_POST['retirar'])) {

        $cuenta = $_SESSION['cuenta'];
        $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);               
        $clave = mysqli_real_escape_string($conn, $_POST['clave']);

        if (empty($cantidad) || empty($clave)) {

            $errorusuario .= $icon . " Todos los campos son obligatorios";

        } else if (!is_numeric($cuenta)) {

            $errorusuario .= $icon . " Cuenta debe contener numeros";  

        } else if (!is_numeric($cantidad)) {

            $errorusuario .= $icon . " Cantidad debe contener numeros"; 

        } else if(!is_numeric($clave)){

            $errorusuario .= $icon . " La clave debe contener numeros";  

        } else if (strlen($clave) > 4 || strlen($clave) < 4) {

            $errorusuario .= $icon . " Ingrese una clave de 4 digitos";

        } else if ($cantidad < 0) {

            $errorusuario .= $icon . " Ingrese un cantidad valida";

        }

        if (empty($errorusuario)) {

            $clave = mysqli_query($conn, "SELECT * FROM cuenta WHERE clave = '$clave'");
            $result = mysqli_num_rows($clave);

            if ($result) {

                $saldo = mysqli_query($conn, "SELECT saldo FROM cuenta WHERE numero_cuenta = '$cuenta'");
                $num = mysqli_fetch_array($saldo);

                $aux = intval($num['saldo']);

                if ($cantidad < $aux) {   

                    //REALIZO RETIRO

                    $fecha = date("Y-m-d");

                    $sql = mysqli_query($conn, "SELECT saldo FROM cuenta WHERE numero_cuenta ='$cuenta'");
                    $num = mysqli_fetch_array($sql);

                    $total = $cantidad + 2000; 

                    $resta = intval($num['saldo']) - $total;
                    mysqli_query($conn, "UPDATE cuenta SET saldo ='$resta' WHERE numero_cuenta ='$cuenta'");

                    //INSERTO A LA TABLA TRANSACCION
                    $newsql = mysqli_query($conn, "INSERT INTO transaccion (numero_cuenta, operacion, valor, fecha) VALUES ('$cuenta', 'Retiro', '$cantidad', '$fecha')");


                    $_SESSION['success'] = "Retiro Exitoso \n Este mensaje tiene un valor de $2000";

                } else {
                    $_SESSION['error'] = "Fondos Insuficientes";
                }
            } else {
                $_SESSION['error'] = "Clave Incorrecta";
            }
        }
    }

    if (isset($_POST['transferir'])) {
        $origen = $_SESSION['cuenta'];
        $destino = mysqli_real_escape_string($conn, $_POST['destino']);
        $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
        $clave = mysqli_real_escape_string($conn, $_POST['clave']);

        if (empty($destino) || empty($cantidad) || empty($clave)) {
            
            $errorusuario .= $icon . " Todos los campos son obligatorios";

        } else if (!is_numeric($destino)) {

            $errorusuario .= $icon . " C/ Destino debe contener digitos";  

        } else if (!is_numeric($cantidad)) {

            $errorusuario .= $icon . " Ingrese una cantidad valida";  

        } else if (!is_numeric($clave)) {
            
            $errorusuario .= $icon . " Clave debe contener digitos";  

        } else if (strlen($clave) > 4 || strlen($clave) < 4) {

            $errorusuario .= $icon . " Ingrese una clave de 4 digitos";

        } else if ($cantidad < 0) {

            $errorusuario .= $icon . " Ingrese un cantidad valida";
            
        }

        if (empty($errorusuario)) {
            
            $user = mysqli_query($conn, "SELECT * FROM cuenta where numero_cuenta ='$destino'"); 
            $result1 = mysqli_num_rows($user);

            $clave = mysqli_query($conn, "SELECT * FROM cuenta WHERE clave = '$clave'");
            $result2 = mysqli_num_rows($clave);


            if ($result1) {

                if ($result2) {

                    $saldo = mysqli_query($conn, "SELECT saldo FROM cuenta WHERE numero_cuenta = '$origen'");
                    $num = mysqli_fetch_array($saldo);

                    $aux = intval($num['saldo']);

                    if ($cantidad < $aux) {
                        
                        $fecha = date("Y-m-d");

                        //RESTAR EL DINERO A LA CUENTA ORIGEN
                        $sql = mysqli_query($conn, "SELECT saldo FROM cuenta WHERE numero_cuenta ='$origen'");
                        $num = mysqli_fetch_array($sql);

                        $resta = intval($num['saldo']) - $cantidad; 
                        mysqli_query($conn, "UPDATE cuenta SET saldo ='$resta' WHERE numero_cuenta ='$origen'");

                        //SUMAR DINERO A CUENTA DESTINO
                        $query = mysqli_query($conn, "SELECT saldo FROM cuenta WHERE numero_cuenta ='$destino'");
                        $num2 = mysqli_fetch_array($query);

                        $suma = intval($num2['saldo']) + $cantidad;
                        mysqli_query($conn, "UPDATE cuenta SET saldo ='$suma' WHERE numero_cuenta ='$destino'");

                        //INSERTO A LA TABLA TRANSACCION
                        $newsql = mysqli_query($conn, "INSERT INTO transaccion (numero_cuenta, operacion, valor, fecha) VALUES ('$origen', 'Transferencia', '$cantidad', '$fecha')");

                        $_SESSION['success'] = "Transferencia Realizada";
                        
                    } else {
                        $_SESSION['error'] = "Fondos Insuficientes";
                    }

                } else {
                    $errorusuario .= $icon . " Clave Incorrecta!";
                }
            } else {
                $errorusuario .= $icon . " Cuenta no existe!";
            }
        }
    }
        
?>
<?php

    include_once 'conexion.inc.php';

    $error = "";
    $icon = "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-exclamation-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z'/></svg>";


    if (isset($_POST['registrar'])) {
        $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $correo = mysqli_real_escape_string($conn, $_POST['correo']);
        $fecha = mysqli_real_escape_string($conn, $_POST['fechaNacimiento']);
        $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
        $celular = mysqli_real_escape_string($conn, $_POST['celular']);
        $clave = mysqli_real_escape_string($conn, $_POST['clave']);

        $emailRegex = "/\w+@\w+\.+[a-z]/";


        if (empty($cedula) || empty($nombre) || empty($correo) || empty($fecha) || empty($direccion) || empty($celular) || empty($clave)) {
                
            $error .= $icon . " Todos los campos son obligatorios";
           
        } else if (!is_numeric($cedula)) {
                
            $error .= $icon . " Cedula debe contener digitos";
           
        } else if (is_numeric($nombre)) {
            
            $error .= $icon . " Nombre debe contener letras";

        } else if (!preg_match($emailRegex, $correo)) {
                
            $error .= $icon . " Ingrese un correo valido";
            
        } else if (!is_numeric($celular)) {
               
            $error .= $icon . " Celular debe contener digitos";
            
        } else if (strlen($clave) > 4 || strlen($clave) < 4) {

            $error .= $icon . " Ingrese una clave de 4 digitos";
            
        } else if (!is_numeric($clave)) {
            
            $error .= $icon . " Ingrese una clave con digitos";
        }

        if (empty($error)) {
                
            $user = mysqli_query($conn, "SELECT * FROM cliente where cedula='$cedula'");
            $result = mysqli_num_rows($user);

            if ($result) {
                
                $error = $icon . " Cuenta registrada, utilice otra!";
                
            } else {
                    
                $sql = "INSERT INTO cliente (cedula, nombre, email, fechaNacimiento, direccion, celular) VALUES ('$cedula', '$nombre', '$correo', '$fecha', '$direccion', '$celular');";
                $newsql = "INSERT INTO cuenta (numero_cuenta, saldo, clave) VALUES ('$cedula', '0', '$clave');";
                mysqli_query($conn, $sql);
                mysqli_query($conn, $newsql);
                        
                $_SESSION['cuenta'] = $cedula;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['correo'] = $correo;
                $_SESSION['fechaNacimiento'] = $fecha;
                $_SESSION['direccion'] = $direccion;
                $_SESSION['celular'] = $celular;
                $_SESSION['clave'] = $clave;
                 
                header('location: ../php/inventario.php');
            } 
        }
    }

    if (isset($_POST['login'])) {
        $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
        $clave = mysqli_real_escape_string($conn, $_POST['clave']);
        
        if (empty($cedula) || empty($clave)) {
           $error .= $icon . " Todos los campos son obligatorios";
        } else if (!is_numeric($cedula)) {
            $error .= $icon . " Cuenta debe contener digitos";
        } else if (!is_numeric($clave)) {
            $error .= $icon . " Clave debe contener digitos";
        } else if (strlen($clave) > 4 || strlen($clave) < 4) {
            $error .= $icon . " Ingrese una clave de 4 digitos";
        }

        if (empty($error)) {
            $query = "SELECT * FROM cuenta WHERE numero_cuenta ='$cedula' AND clave='$clave'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                
                $_SESSION['cuenta'] = $cedula;
                $_SESSION['correo'] = $correo;
                $_SESSION['fechaNacimiento'] = $fecha;
                $_SESSION['direccion'] = $direccion;
                $_SESSION['celular'] = $celular;
                $_SESSION['clave'] = $clave;
                
                header('location: ../php/inventario.php');
            } else {
                $error .= $icon . " Cuenta o clave incorrecta";
            }
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['cuenta']);
        header("location: ../php/index.php");
    }
?>

<?php

    include_once 'conexion.inc.php';

    $errorusuario = "";
    $icon = "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-exclamation-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z'/></svg>";

    if (isset($_POST['actualizar'])) {
        
        $cedula = mysqli_real_escape_string($conn, $_POST['cuenta']);
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $correo = mysqli_real_escape_string($conn, $_POST['correo']);
        $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
        $celular = mysqli_real_escape_string($conn, $_POST['celular']);
        $clave = mysqli_real_escape_string($conn, $_POST['clave']);

        
        if (!is_numeric($celular)) {
            $errorusuario .= $icon . " Celular debe contener digitos";  
        } else if (!is_numeric($clave)) {
            $errorusuario .= $icon . " Clave debe contener digitos";  
        } else if (strlen($clave) > 4 || strlen($clave) < 4) {
            $errorusuario .= $icon . " Ingrese una clave de 4 digitos";
        }


        if(empty($errorusuario)){    
            $query = "UPDATE cliente SET email ='$correo', direccion='$direccion', celular='$celular' WHERE cedula='$cedula'";
            $newquery = "UPDATE cuenta SET clave ='$clave'";

            $query_run = mysqli_query($conn, $query);
            $newquery = mysqli_query($conn, $newquery);

            $_SESSION['correo'] = $correo;
            $_SESSION['direccion'] = $direccion;
            $_SESSION['celular'] = $celular;
            $_SESSION['clave'] = $clave;

            
            if ($query_run) {
                $_SESSION['msg'] = "Usuario Actualizado";
            }
        }
    }

    if(isset($_POST['eliminar'])){
        $cedula = mysqli_real_escape_string($conn, $_POST['cuenta']);
        $clave = mysqli_real_escape_string($conn, $_POST['clave']);;

        if (empty($cedula) || empty($clave)) {
            $errorusuario .= $icon . " Todos los campos son obligatorios";
        } else if (!is_numeric($cedula)) {
            $errorusuario .= $icon . " Cuenta debe contener digitos";
        } else if (!is_numeric($clave)) {
            $errorusuario .= $icon . " Clave debe contener digitos";
        } else if (strlen($clave) > 4 || strlen($clave) < 4) {
            $errorusuario .= $icon . " Ingrese una clave de 4 digitos";
        }

        if (empty($errorusuario)) {
            $query = mysqli_query($conn, "DELETE FROM cliente WHERE cedula ='$cedula'");
            $newquery = mysqli_query($conn, "DELETE FROM cuenta WHERE numero_cuenta ='$cedula' AND clave ='$clave'");
            $nuevoquery = mysqli_query($conn, "DELETE FROM transaccion WHERE numero_cuenta = '$cedula'");

            header('location: ../php/index.php');
        }
    }
?>
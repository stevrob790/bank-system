<?php

    require('../php/fpdf/fpdf.php');
    include_once 'conexion.inc.php';
    
    class PDF extends FPDF{
    // Page header
        function Header() {
            // Logo
            $this->Image('../img/bank.jpg',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(30,10,'Generacion de Extractos',5,0,'C');
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer(){
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    

    if (isset($_POST['extractos'])) {

        $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);        

        if (empty($cedula)) {
            
            $_SESSION['error'] = "Ingrese Una Cedula";

        } else {

            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',12);
            //$pdf->Cell(0,10,'Cuenta          Operacion           Valor          Fecha',0,1);

    
            $query = "SELECT * FROM transaccion WHERE numero_cuenta = '$cedula'";
            $result = mysqli_query($conn, $query);
            
            $pdf->Cell(0,10,'',0,1);
            $pdf->Cell(0,10,'Cuenta: '.$_POST['cedula'],0,1);
            $pdf->Cell(0,10,'',0,1);
            $pdf->Cell(0,10,'',0,1);

            foreach ($result as $row){

                $pdf->Cell(0,10,'Operacion: '.$row['operacion'],0,1);
                $pdf->Cell(0,10,'Valor: '.$row['valor'],0,1);
                $pdf->Cell(0,10,'Fecha: '.$row['fecha'],0,1);
                $pdf->Cell(0,10,'',0,1);
                $pdf->Cell(0,10,'-------------------------------------------------------------',0,1);

                //$pdf->Cell(0,10,$row['numero_cuenta'].' - '.$row['operacion'].' - '.$row['valor'].' - '.$row['fecha'],0,1);
                //echo $row['numero_cuenta'];
                //echo $row['operacion'];
                //echo $row['valor'];
                //echo $row['fecha'];
                //echo "<BR>";
            }     
            
            //$pdf->Cell(0,10,'</table>',0,1);
            $pdf->Output();
        }
    }
?>
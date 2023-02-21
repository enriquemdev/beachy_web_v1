<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Beachy</title>
    <?php 
    require_once "../../config/app.php";
        include "inc/link.php"; /* SE INCLUYE REFERENCIA A LINKS */
        // include "./admin/inc/script.php"; /* SE INCLUYE REFERENCIA A SCRIPTS */


        
    ?>
    <!-- jQuery V3.4.1 -->
	<script src="<?php echo SERVERURL; ?>pages/admin/js/jquery-3.4.1.min.js" ></script>
</head>

<body>
    <?php 
    $peticionAjax = false;
        session_start(['name'=>'empleado']);
        require_once "../../controladores/loginControlador.php";
        $lc = new loginControlador();

        if(!isset($_SESSION['token']) || !isset($_SESSION['idEmpleado']))
        {
            echo $lc->forzar_cierre_sesion_empleado_controlador();
            exit();
        }

            ?>
            <!-- Main container -->
            <main class="full-box main-container">
                <!-- Nav lateral -->
                <?php 
                    include "inc/NavLateral.php"; /* SE INCLUYE REFERENCIA A BARRA NAVEGACIÓN LATERAL */
                ?>

                <!-- Page content -->
                <section class="full-box page-content">
                <?php 
                    include "inc/NavBar.php"; /* SE INCLUYE REFERENCIA A BARRA NAVEGACIÓN */
                    ?>
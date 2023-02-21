<?php
    $peticionAjax = true;
    require_once "../config/app.php";

    if(isset($_POST['compra_producto']) && isset($_POST['cantidadComprada'])){
        /* Insttancia al controlador */
        require_once "../controladores/comprasControlador.php";
        $ins_compra = new comprasControlador();
        /* agregar un usuario */
        if(isset($_POST['compra_producto'])){
            echo $ins_compra->agregar_compra_controlador();

        }

    }
    else{
        session_start(['name'=>'empleado']);
        session_unset();
        session_destroy();
        header("Location:".SERVERURL."pages/admin/login.php");
        exit();
    }
    
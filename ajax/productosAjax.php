<?php
    $peticionAjax = true;
    require_once "../config/app.php";

    if(isset($_POST['producto_categoria']) && isset($_POST['producto_descripcion'])){
        /* Insttancia al controlador */
        require_once "../controladores/productosControlador.php";
        $ins_producto = new productosControlador();
        /* agregar un usuario */
        if(isset($_POST['producto_categoria'])){
            echo $ins_producto->agregar_producto_controlador();

        }

    }
    else{
        session_start(['name'=>'empleado']);
        session_unset();
        session_destroy();
        header("Location:".SERVERURL."pages/admin/login.php");
        exit();
    }
    
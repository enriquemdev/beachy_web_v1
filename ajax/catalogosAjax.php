<?php
    $peticionAjax = true;
    require_once "../config/app.php";

    if(isset($_POST['nombreTalla_reg'])){
        /* Insttancia al controlador */
        require_once "../controladores/catalogosControlador.php";
        $ins_catalogo = new catalogosControlador();
        /* agregar un usuario */
        if(isset($_POST['nombreTalla_reg'])){
            echo $ins_catalogo->agregar_talla_controlador();

        }

    }
    else if(isset($_POST['nombreTela_reg']))
    {
        /* Insttancia al controlador */
        require_once "../controladores/catalogosControlador.php";
        $ins_catalogo = new catalogosControlador();
        /* agregar un usuario */
        if(isset($_POST['nombreTela_reg'])){
            echo $ins_catalogo->agregar_tela_controlador();

        }
    }
    else if(isset($_POST['nombreColor_reg']))
    {
        /* Insttancia al controlador */
        require_once "../controladores/catalogosControlador.php";
        $ins_catalogo = new catalogosControlador();
        /* agregar un usuario */
        if(isset($_POST['nombreColor_reg'])){
            echo $ins_catalogo->agregar_color_controlador();

        }
    }
    else if(isset($_POST['nombreMetodoPago_reg']))
    {
        /* Insttancia al controlador */
        require_once "../controladores/catalogosControlador.php";
        $ins_catalogo = new catalogosControlador();
        /* agregar un usuario */
        if(isset($_POST['nombreMetodoPago_reg'])){
            echo $ins_catalogo->agregar_metodoPago_controlador();

        }
    }
    else if(isset($_POST['nombreDepartamento_reg']))
    {
        /* Insttancia al controlador */
        require_once "../controladores/catalogosControlador.php";
        $ins_catalogo = new catalogosControlador();
        /* agregar un usuario */
        if(isset($_POST['nombreDepartamento_reg'])){
            echo $ins_catalogo->agregar_departamento_controlador();

        }
    }
    else if(isset($_POST['nombreCategoria_reg']))
    {
        /* Insttancia al controlador */
        require_once "../controladores/catalogosControlador.php";
        $ins_catalogo = new catalogosControlador();
        /* agregar un usuario */
        if(isset($_POST['nombreCategoria_reg'])){
            echo $ins_catalogo->agregar_categoria_controlador();

        }
    }
    else{
        session_start(['name'=>'empleado']);
        session_unset();
        session_destroy();
        header("Location:".SERVERURL."pages/admin/login.php");
        exit();
    }
    
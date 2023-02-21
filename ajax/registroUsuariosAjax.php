<?php
    $peticionAjax = true;
    require_once "../config/app.php";

    if(isset($_POST['usuarioEmail']) && isset($_POST['usuarioNombre'])){
        /* Insttancia al controlador */
        require_once "../controladores/registroUsuariosControlador.php";
        $ins_usuario = new registroUsuariosControlador();
        /* agregar un usuario */
        if(isset($_POST['usuarioEmail'])){
            echo $ins_usuario->agregar_usuario_controlador();

        }

    }
    // else{
    //     session_start(['name'=>'empleado']);
    //     session_unset();
    //     session_destroy();
    //     header("Location:".SERVERURL."pages/admin/login.php");
    //     exit();
    // }
    
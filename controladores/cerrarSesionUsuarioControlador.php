<?php
$peticionAjax = true;
require_once "../config/app.php";

if(isset($_POST['token']) && isset($_POST['usuario'])){
    /*Instancia al controlador*/
    require_once "loginUsuariosControlador.php";
    $ins_login = new loginUsuarioControlador();

    echo $ins_login->cerrar_sesion_cliente_controlador();

}else{
    session_start(['name'=>'cliente']);
    session_unset();
    session_destroy();
    header("Location:".SERVERURL."pages/home.php");
    exit();
}
?>
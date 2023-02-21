<?php
$peticionAjax = true;
require_once "../config/app.php";

if(isset($_POST['token']) && isset($_POST['usuario'])){
    /*Instancia al controlador*/
    require_once "loginControlador.php";
    $ins_login = new loginControlador();

    echo $ins_login->cerrar_sesion_empleado_controlador();

}else{
    session_start(['name'=>'empleado']);
    session_unset();
    session_destroy();
    header("Location:".SERVERURL."pages/admin/login.php");
    exit();
}
?>
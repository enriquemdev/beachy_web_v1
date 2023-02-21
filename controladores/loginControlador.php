<?php
            
            if($peticionAjax){
                require_once "../modelos/loginModelo.php";
            }else{
                require_once "../../modelos/loginModelo.php";
            }

    class loginControlador extends loginModelo{
        /*Controlador inicio de sesión*/
        public function iniciar_sesion_controlador(){
            $usuario=mainModel::limpiar_cadena($_POST['usuario_log']);
            $clave=mainModel::limpiar_cadena($_POST['clave_log']);

            /*Comprobar campos vacios */
            if($usuario=="" || $clave==""){
                echo '
                <script>
                    Swal.fire({
                    title: "Ocurrió un error inesperado",
                    text: "Campos requeridos no llenados",
                    type: "error",
                    confirmButtonText: "Aceptar"});
                </script>';
                exit();
            }
            /*Comprobar integridad de datos*/
            // if(mainModel::verificar_datos("[a-zA-Z0-9]{1,35}",$usuario)){
            //     echo '
            //     <script>
            //         Swal.fire({
            //         title: "Ocurrió un error inesperado",
            //         text: "El nombre de usuario no coincide con el formato solicitado",
            //         type: "error",
            //         confirmButtonText: "Aceptar"});
            //     </script>';
            // }
            if(mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
                echo '
                <script>
                    Swal.fire({
                    title: "Ocurrió un error inesperado",
                    text: "La clave no coincide con el formato solicitado",
                    type: "error",
                    confirmButtonText: "Aceptar"});
                </script>';
                exit();
            }
            $clave=mainModel::encryption($clave);
            $datos_login=[
                "Usuario"=>$usuario,
                "Clave"=>$clave
            ];
            $datos_cuenta=loginModelo::iniciar_sesion_empleado_modelo($datos_login);
            //$datos_cuenta_privilegio=loginModelo::iniciar_sesion_modelo2($datos_login);


            if($datos_cuenta->rowCount()==1){

                $row=$datos_cuenta->fetch();
                //$row2=$datos_cuenta_privilegio->fetch();/*ti*/

                //AQUI COMIENZA EL MANEJO DE SESIONES EN LA BD
                //Para manejar las sesiones a ver si no tiene ya sesion iniciada
               
                session_start(['name'=>'empleado']);

                $_SESSION['idEmpleado']=$row['idEmpleado'];
                $_SESSION['nombresEmpleado']=$row['nombresEmpleado'];
                // $_SESSION['clave_spm']=$row['Pass'];
                // $_SESSION['imagen-usuario_spm']=$row['imgUsuario'];
                // $_SESSION['estado_spm']=$row['Estado'];
                // $_SESSION['codPersona_spm']=$row['CodPersonaU'];

                ////TERMINA VARIABLE SESION CARGO

                $_SESSION['token']=md5(uniqid(mt_rand(),true));


                               


                return header("Location: ".SERVERURL."pages/admin/cita-new-view.php");//Que pueda ingresar al sistema :D                               
 
    
            }else{
                echo '
                <script>
                    Swal.fire({
                    title: "Ocurrió un error inesperado",
                    text: "El usuario o clave son incorrectos",
                    type: "error",
                    confirmButtonText: "Aceptar"});
                </script>';
            }

        }/*Fin controlador */
        /*Controlador para forzar cierre de sesión */
        public function forzar_cierre_sesion_empleado_controlador(){
            session_unset();
            session_destroy();
            if(headers_sent()){
                return"
                <script>
                    window.location.href='".SERVERURL."pages/admin/login.php';
                </script>";
            }else{
                return header("Location: ".SERVERURL."pages/admin/login.php");
            }
        }/*Fin controlador */

        public function redireccionar_home_controlador(){
            if(headers_sent()){
                return"
                <script>
                    window.location.href='".SERVERURL."home/';
                </script>";
            }else{
                return header("Location: ".SERVERURL."home/");
            }
        }/*Fin controlador */
        
        /*Controlador para cierre de sesión */
        public function cerrar_sesion_empleado_controlador(){
            session_start(['name'=>'empleado']);
            $token=mainModel::decryption($_POST['token']);
            $usuario=mainModel::decryption($_POST['usuario']);

            if($token==$_SESSION['token'] && $usuario==$_SESSION['idEmpleado']){
                
                session_unset();
                session_destroy();
                $alerta=[
                    "Alerta"=>"redireccionar",
                    "URL"=>SERVERURL."pages/admin/login.php"
                ];
            }else{
                $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrió un error",
                  "Texto"=>"No se pudo cerrar sesión",
                  "Tipo"=>"error"
                ];

            }
            
            echo json_encode($alerta);
        }
        /*Fin controlador */



}//fin clase


//Como lanzar una alerta en js con variable php
//echo '<script language="javascript">alert(" Numero de lineas es '.$datos_sesiones->rowCount().'");</script>';
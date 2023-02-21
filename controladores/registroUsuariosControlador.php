<?php
        if($peticionAjax){
            require_once "../modelos/registroUsuariosModelo.php";
        }else{
            $pagesFlag = 1;
            require_once "../modelos/registroUsuariosModelo.php";
        }

    class registroUsuariosControlador extends registroUsuariosModelo {

        public function agregar_usuario_controlador(){
            $usuarioNombre=mainModel::limpiar_cadena($_POST['usuarioNombre']);
            $usuarioApellido=mainModel::limpiar_cadena($_POST['usuarioApellido']);
            $usuarioEmail=mainModel::limpiar_cadena($_POST['usuarioEmail']);
            $usuarioTelefono=mainModel::limpiar_cadena($_POST['usuarioTelefono']);
            $usuarioContra=mainModel::limpiar_cadena($_POST['usuarioContra']);
            $usuarioContra2=mainModel::limpiar_cadena($_POST['usuarioContra2']);

            //Dejar solo digitos en el telefono
            $usuarioTelefono = preg_replace("/[^0-9]/", "", $usuarioTelefono);
            
            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($usuarioNombre=="" || $usuarioApellido=="" || $usuarioEmail==""
            || $usuarioContra=="" || $usuarioContra2=="")
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(mainModel::verificar_datos("[0-9]{8}",$usuarioTelefono) && $usuarioTelefono != ""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"El numero de telefono debe ser de 8 digitos",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (!(filter_var($usuarioEmail, FILTER_VALIDATE_EMAIL))) {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"El formato del email es incorrecto",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
              }

              if($usuarioContra != $usuarioContra2)
              {
                  $alerta=[
                      "Alerta"=>"simple",
                      "Titulo"=>"Ocurrió un error inesperado",
                      "Texto"=>"La confirmacion de la contraseña es diferente a la contraseña.",
                      "Tipo"=>"error"
                  ];
                  echo json_encode($alerta);
                  exit();
              }
              else{
                $usuarioContra = mainModel::encryption($usuarioContra);
              }

            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();

            //Buscar el codigo de la compra recien ingresado
            $verfEmailExiste="SELECT idUsuario FROM tblusuarios WHERE email = '$usuarioEmail'";
            $verfEmailExiste = $conexion->query($verfEmailExiste);
            if ($verfEmailExiste->rowCount() > 0){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"Esta direccion de correo electronico ya esta registrada.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
            else
            {
                 /*Datos por enviar */
                $datos_usuario_reg = [
                    "nombres"=>$usuarioNombre,
                    "apellidos"=>$usuarioApellido,
                    "email"=>$usuarioEmail,
                    "telefono"=>$usuarioTelefono,
                    "contra"=>$usuarioContra
                ];
                

                $agregar_usuario=registroUsuariosModelo::agregar_usuario_modelo($datos_usuario_reg);

                if($agregar_usuario->rowCount()==1){
                    $alerta=[
                        "Alerta"=>"recargar",
                        "Titulo"=>"Usuario Registrado",
                        "Texto"=>"Usuario registrado correctamente",
                        "Tipo"=>"success"
                    ];
                    echo json_encode($alerta);
    
                    
                }
                else
                {
                    $alerta=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrió un error inesperado",
                        "Texto"=>"No se logró añadir el usuario al sistema.",
                        "Tipo"=>"error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }
            

            
        }

        public function lista_compras_controlador()
        {
            
            $consulta="SELECT * FROM tbldetcompras
            INNER JOIN tblcompras ON tbldetcompras.compra = tblcompras.idCompra
            INNER JOIN tbldetproducto ON tbldetcompras.detalleProducto = tbldetproducto.idDetProducto
            INNER JOIN tblproducto ON tbldetproducto.producto = tblproducto.idProducto
            INNER JOIN cattallas ON tbldetproducto.tallaProducto = cattallas.idTalla
            ";
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $datos = $conexion->query($consulta);
            
            //$total = $conexion->query("SELECT FOUND_ROWS()");   

            if ($datos->rowCount()> 0){
                $datos = $datos->fetchAll();
            }
            else
            {
                $datos = 0;//No hay datos
            }

            return $datos;
        }

        public function lista_catalogos_controlador()
        {
            $tallas="SELECT * FROM cattallas";
  
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $tallas = $conexion->query($tallas);

            if ($tallas->rowCount()> 0){
                $tallas = $tallas->fetchAll();
            }
            else
            {
                $tallas = 0;//No hay datos
            }

            $datos = [
                "tallas"=>$tallas
            ];

            return $datos;
        }
        
    } 
<?php
        if($peticionAjax){
            require_once "../modelos/catalogosModelo.php";
        }else{
            require_once "../../modelos/catalogosModelo.php";
        }

        // if(isset($_POST['nombreTalla_reg']))
        // {
        //     mainModel::console_log("appiti".$_POST['nombreTalla_reg']);
        // }
        // else{
        //     mainModel::console_log("noooo");
        // }

    class catalogosControlador extends catalogosModelo {

        public function agregar_talla_controlador(){
            $nombreTalla=mainModel::limpiar_cadena($_POST['nombreTalla_reg']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($nombreTalla==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*Datos por enviar */
            $datos_talla_reg = [
                "nombreTalla"=>$nombreTalla
            ];
            

            $agregar_talla=catalogosModelo::agregar_talla_modelo($datos_talla_reg);
            if($agregar_talla->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Talla registrada",
                    "Texto"=>"Talla registrada correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir la talla al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_tallas_controlador()
        {
            
            $consulta="SELECT * FROM cattallas";
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

        public function agregar_color_controlador(){
            $nombreColor=mainModel::limpiar_cadena($_POST['nombreColor_reg']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($nombreColor==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*Datos por enviar */
            $datos_Color_reg = [
                "nombreColor"=>$nombreColor
            ];
            

            $agregar_Color=catalogosModelo::agregar_colores_modelo($datos_Color_reg);
            if($agregar_Color->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Color registrado",
                    "Texto"=>"Color registrado correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir el Color al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_colores_controlador()
        {
            
            $consulta="SELECT * FROM catcolores";
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

        public function agregar_categoria_controlador(){
            $nombreCategoria=mainModel::limpiar_cadena($_POST['nombreCategoria_reg']);
            $descripcionCategoria=mainModel::limpiar_cadena($_POST['descripcionCategoria_reg']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($nombreCategoria==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*Datos por enviar */
            $datos_Categoria_reg = [
                "nombreCategoria"=>$nombreCategoria,
                "descripcionCategoria"=>$descripcionCategoria
            ];
            

            $agregar_Categoria=catalogosModelo::agregar_categorias_modelo($datos_Categoria_reg);
            if($agregar_Categoria->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Categoria registrada",
                    "Texto"=>"Categoria registrada correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir la Categoria al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_categorias_controlador()
        {
            
            $consulta="SELECT * FROM catcategorias";
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

        public function agregar_tela_controlador(){
            $nombreTela=mainModel::limpiar_cadena($_POST['nombreTela_reg']);
            $descripcionTela=mainModel::limpiar_cadena($_POST['descripcionTela_reg']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($nombreTela==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*Datos por enviar */
            $datos_Tela_reg = [
                "nombreTela"=>$nombreTela,
                "descripcionTela"=>$descripcionTela
            ];
            

            $agregar_Tela=catalogosModelo::agregar_telas_modelo($datos_Tela_reg);
            if($agregar_Tela->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Tela registrada",
                    "Texto"=>"Tela registrada correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir la Tela al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_telas_controlador()
        {
            
            $consulta="SELECT * FROM cattela";
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

        public function agregar_metodoPago_controlador(){
            $nombreMetodoPago=mainModel::limpiar_cadena($_POST['nombreMetodoPago_reg']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($nombreMetodoPago==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*Datos por enviar */
            $datos_metodoPago_reg = [
                "nombreMetodoPago"=>$nombreMetodoPago
            ];
            

            $agregar_metodoPago=catalogosModelo::agregar_metodosPago_modelo($datos_metodoPago_reg);
            if($agregar_metodoPago->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Metodo de Pago registrada",
                    "Texto"=>"Metodo de Pago registrada correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir el Metodo de Pago al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_metodosPago_controlador()
        {
            
            $consulta="SELECT * FROM catmetodospago";
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

        public function agregar_departamento_controlador(){
            $nombreDepartamento=mainModel::limpiar_cadena($_POST['nombreDepartamento_reg']);
            $precioEnvio=mainModel::limpiar_cadena($_POST['precioEnvio_reg']);
            $diasEntrega=mainModel::limpiar_cadena($_POST['diasEntrega_reg']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($diasEntrega=="" || $nombreDepartamento=="" || $precioEnvio==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se han llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(mainModel::verificar_datos("[0-9]{1,8}",$diasEntrega)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"Los dias de entrega no coiniciden con el formato solicitado",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(mainModel::verificar_datos("^\d*(\.\d{1,2})?$",$precioEnvio)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"El precio del envío no coinicide con el formato solicitado",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*Datos por enviar */
            $datos_Departamento_reg = [
                "nombreDepartamento"=>$nombreDepartamento,
                "precioEnvio"=>$precioEnvio,
                "diasEntrega"=>$diasEntrega
            ];
            

            $agregar_Departamento=catalogosModelo::agregar_departamentos_modelo($datos_Departamento_reg);
            if($agregar_Departamento->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Departamento registrado",
                    "Texto"=>"Departamento registrado correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir el Departamento al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_departamentos_controlador()
        {
            
            $consulta="SELECT * FROM catdepartamentos";
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
        
    } 
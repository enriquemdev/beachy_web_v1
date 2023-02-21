<?php
        if($peticionAjax){
            require_once "../modelos/comprasModelo.php";
        }else{
            require_once "../../modelos/comprasModelo.php";
        }

    class comprasControlador extends comprasModelo {

        public function agregar_compra_controlador(){
            $compra_producto=mainModel::limpiar_cadena($_POST['compra_producto']);
            $compra_talla=mainModel::limpiar_cadena($_POST['compra_talla']);
            $cantidadComprada=mainModel::limpiar_cadena($_POST['cantidadComprada']);
            $costoUnitario=mainModel::limpiar_cadena($_POST['costoUnitario']);
            $costosEntrega=mainModel::limpiar_cadena($_POST['costosEntrega']);
            $notaCompra=mainModel::limpiar_cadena($_POST['notaCompra']);
            
            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($compra_producto=="" || $compra_talla=="" || $cantidadComprada==""
            || $costoUnitario=="" || $notaCompra=="")
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

            if(mainModel::verificar_datos("^\d*(\.\d{1,2})?$",$costoUnitario)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"El costo unitario no coinicide con el formato solicitado",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(mainModel::verificar_datos("^\d*(\.\d{1,2})?$",$costosEntrega)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"El costo de entrega no coinicide con el formato solicitado",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(mainModel::verificar_datos("[0-9]{1,8}",$cantidadComprada)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"La cantidad comprada no coinicide con el formato solicitado",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            //Ver el empleado que inicio sesion
            session_start(['name'=>'empleado']);

            /*Datos por enviar */
            $datos_compra_reg = [
                "empleadoCompra"=>$_SESSION['idEmpleado'],
                "costosEntrega"=>$costosEntrega,
                "notaCompra"=>$notaCompra
            ];
            

            $agregar_compra=comprasModelo::agregar_compra_modelo($datos_compra_reg);

            
  
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();

            //Buscar el codigo de la compra recien ingresado
            $lastCompraId="SELECT MAX(idCompra) FROM tblcompras";
            $lastCompraId = $conexion->query($lastCompraId);
            if ($lastCompraId->rowCount()> 0){
                $lastCompraId = $lastCompraId->fetch();
                $lastCompraId = (int)$lastCompraId['MAX(idCompra)'];
            }
            else
            {
                $lastCompraId = 0;//No hay datos
            }

            //Buscar el detalla del producto si no existe crearlo.
            $idDetProducto="SELECT idDetProducto, cantidadDisponible FROM tbldetproducto
            WHERE producto = '".$compra_producto."' 
            AND tallaProducto = '".$compra_talla."' 
            ";

            $idDetProducto = $conexion->query($idDetProducto);

            //Si no hay un detalle de producto agregado
            if ($idDetProducto->rowCount() < 1)
            {
                $datos_detproducto_reg = [
                    "producto"=>$compra_producto,
                    "tallaProducto"=>$compra_talla,
                    "cantidadDisponible"=>0
                ];
                
    
                $agregar_detproducto=comprasModelo::agregar_detproducto_modelo($datos_detproducto_reg);

                $idDetProducto="SELECT idDetProducto, cantidadDisponible FROM tbldetproducto
                WHERE producto = '".$compra_producto."' 
                AND tallaProducto = '".$compra_talla."' 
                ";

                $idDetProducto = $conexion->query($idDetProducto);
            }
            
            $idDetProducto = $idDetProducto->fetch();
            $idDetProducto2 = (int)$idDetProducto['idDetProducto'];
        

            $datos_detcompra_reg = [
                "compra"=>$lastCompraId,
                "detalleProducto"=>$idDetProducto2,
                "cantidadComprada"=>$cantidadComprada,
                "costoUnitario"=>$costoUnitario
            ];
            
            $agregar_detcompra=comprasModelo::agregar_detcompra_modelo($datos_detcompra_reg);


            $datos_actualizar_stock = [
                "producto"=>$compra_producto,
                "tallaProducto"=>$compra_talla,
                "cantidadDisponible"=>(((int)$idDetProducto['cantidadDisponible']) + ((int)$cantidadComprada))
            ];

            $actualizarStock=comprasModelo::actualizarStock_modelo($datos_actualizar_stock);

            if($actualizarStock->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Compra registrada",
                    "Texto"=>"Compra registrada correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);

                
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir la Compra al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
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
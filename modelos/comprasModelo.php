<?php
    require_once "mainModel.php";
    class comprasModelo extends mainModel{
        
        protected static function agregar_compra_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO tblcompras(empleadoCompra, costosEntrega, notaCompra)
             VALUES(:empleadoCompra, :costosEntrega, :notaCompra)");
            $sql->bindParam(":empleadoCompra",$datos['empleadoCompra']);
            $sql->bindParam(":costosEntrega",$datos['costosEntrega']);
            $sql->bindParam(":notaCompra",$datos['notaCompra']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_detproducto_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO tbldetproducto(producto, tallaProducto, cantidadDisponible)
             VALUES(:producto, :tallaProducto, :cantidadDisponible)");
            $sql->bindParam(":producto",$datos['producto']);
            $sql->bindParam(":tallaProducto",$datos['tallaProducto']);
            $sql->bindParam(":cantidadDisponible",$datos['cantidadDisponible']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_detcompra_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO tbldetcompras(compra, detalleProducto, cantidadComprada, costoUnitario)
             VALUES(:compra, :detalleProducto, :cantidadComprada, :costoUnitario)");
            $sql->bindParam(":compra",$datos['compra']);
            $sql->bindParam(":detalleProducto",$datos['detalleProducto']);
            $sql->bindParam(":cantidadComprada",$datos['cantidadComprada']);
            $sql->bindParam(":costoUnitario",$datos['costoUnitario']);
            $sql->execute();
            return $sql;
        }

        protected static function actualizarStock_modelo($datos){
            $sql =mainModel::conectar()->prepare("UPDATE tbldetproducto SET cantidadDisponible=:cantidadDisponible  
            WHERE (producto=:producto AND tallaProducto = :tallaProducto)");
            $sql->bindParam(":cantidadDisponible",$datos['cantidadDisponible']);
            $sql->bindParam(":producto",$datos['producto']);
            $sql->bindParam(":tallaProducto",$datos['tallaProducto']);
            $sql->execute();
            return $sql;
        }

        
    }/*Aquí termina la clase */
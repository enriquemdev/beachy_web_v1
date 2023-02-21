<?php
    require_once "mainModel.php";
    class productosModelo extends mainModel{
        
        protected static function agregar_producto_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO tblproducto(categoriaProducto, colorProducto, telaProducto, descripcionProducto, precioProducto, codigoEstilo)
             VALUES(:categoriaProducto, :colorProducto, :telaProducto, :descripcionProducto, :precioProducto, :codigoEstilo)");
            $sql->bindParam(":categoriaProducto",$datos['categoriaProducto']);
            $sql->bindParam(":colorProducto",$datos['colorProducto']);
            $sql->bindParam(":telaProducto",$datos['telaProducto']);
            $sql->bindParam(":descripcionProducto",$datos['descripcionProducto']);
            $sql->bindParam(":precioProducto",$datos['precioProducto']);
            $sql->bindParam(":codigoEstilo",$datos['codigoEstilo']);
            $sql->execute();
            return $sql;
        }

        
    }/*Aquí termina la clase */
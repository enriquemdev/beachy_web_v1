<?php
    require_once "mainModel.php";
    class catalogosModelo extends mainModel{
        
        protected static function agregar_talla_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO cattallas(nombreTalla) VALUES(:nombreTalla)");
            $sql->bindParam(":nombreTalla",$datos['nombreTalla']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_colores_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO catcolores(nombreColor) VALUES(:nombreColor)");
            $sql->bindParam(":nombreColor",$datos['nombreColor']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_telas_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO cattela(nombreTela, descripcionTela) VALUES(:nombreTela, :descripcionTela)");
            $sql->bindParam(":nombreTela",$datos['nombreTela']);
            $sql->bindParam(":descripcionTela",$datos['descripcionTela']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_metodosPago_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO catmetodospago(nombreMetodoPago) VALUES(:nombreMetodoPago)");
            $sql->bindParam(":nombreMetodoPago",$datos['nombreMetodoPago']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_departamentos_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO catdepartamentos(nombreDepartamento, precioEnvio, diasEntrega) VALUES(:nombreDepartamento, :precioEnvio, :diasEntrega)");
            $sql->bindParam(":nombreDepartamento",$datos['nombreDepartamento']);
            $sql->bindParam(":precioEnvio",$datos['precioEnvio']);
            $sql->bindParam(":diasEntrega",$datos['diasEntrega']);
            $sql->execute();
            return $sql;
        }

        protected static function agregar_categorias_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO catcategorias(nombreCategoria, descripcionCategoria) VALUES(:nombreCategoria, :descripcionCategoria)");
            $sql->bindParam(":nombreCategoria",$datos['nombreCategoria']);
            $sql->bindParam(":descripcionCategoria",$datos['descripcionCategoria']);
            $sql->execute();
            return $sql;
        }

        
    }/*Aquí termina la clase */
<?php
    require_once "mainModel.php";
    class loginModelo extends mainModel{
        /*Modelo para inicio de sesión */
        protected static function iniciar_sesion_empleado_modelo($datos){
            $sql=mainModel::conectar()->prepare("SELECT * FROM tblempleados WHERE emailEmpleado=
             :Usuario AND contraEmpleado= :Clave");
            $sql->bindParam(":Usuario",$datos['Usuario']);
            $sql->bindParam(":Clave",$datos['Clave']);
            $sql->execute();
            return $sql;
        }

        protected static function iniciar_sesion_cliente_modelo($datos){
            $sql=mainModel::conectar()->prepare("SELECT * FROM tblusuarios WHERE email=
             :Usuario AND contra= :Clave");
            $sql->bindParam(":Usuario",$datos['Usuario']);
            $sql->bindParam(":Clave",$datos['Clave']);
            $sql->execute();
            return $sql;
        }

    }/*Aquí termina main model */

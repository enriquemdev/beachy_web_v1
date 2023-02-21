<?php
    require_once "mainModel.php";
    class registroUsuariosModelo extends mainModel{
        
        protected static function agregar_usuario_modelo($datos){
            $sql =mainModel::conectar()->prepare("INSERT INTO tblusuarios(nombres, apellidos, email, telefono, contra)
             VALUES(:nombres, :apellidos, :email, :telefono, :contra)");
            $sql->bindParam(":nombres",$datos['nombres']);
            $sql->bindParam(":apellidos",$datos['apellidos']);
            $sql->bindParam(":email",$datos['email']);
            $sql->bindParam(":telefono",$datos['telefono']);
            $sql->bindParam(":contra",$datos['contra']);
            $sql->execute();
            return $sql;
        }
        
    }/*Aquí termina la clase */
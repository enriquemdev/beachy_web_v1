<?php
        if($peticionAjax){
            require_once "../config/Server.php" ;       /*Se vuelve true*/
    
        }else if (isset($pagesFlag)){
            require_once "../config/Server.php" ;

        }else{
            require_once "../../config/Server.php" ;
        }

    class mainModel{
        /*--------------Funcion para conectar a la bd -------------- */
        protected static function conectar(){
            $conexion = new  PDO(SGDB, USER, PASS);
            $conexion -> exec("SET CHARACTER SET utf8");
            return $conexion;

        }

        static function console_log( $data ){
            echo '<script>';
            echo 'console.log('. json_encode( $data ) .')';
            echo '</script>';
        }
        
        static function formatDollar($numero)
        {
            $numero = "$ " . number_format($numero, 2, ".", ",");
            return $numero;
        }
        
        /*--------------Funcion para consultas simples -------------- */
        protected static function ejecutar_consulta_simple($consulta){
            $sql = self::conectar()->prepare($consulta);
            $sql -> execute();
            return $sql;

        }
        public static function calculaedad($fechanacimiento){
            list($ano,$mes,$dia) = explode("-",$fechanacimiento);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
              $ano_diferencia--;
            return $ano_diferencia;
          }
        /*--------------Funcion para encriptar cadenas-------------- */
        public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
        /*--------------Funcion para desencriptar cadenas-------------- */
		protected static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
        /*--------------Funcion para generar codigos-------------- */
        protected static function generar_codigo_aleatorio($letra, $longitud, $numero){
            for($i=1; $i<=$longitud; $i++){
                $aleatorio = rand(0,9);
                $letra.= $aleatorio;
            }
            return $letra."-".$numero;
        
            }

        /*--------------Funcion para limpiar cadenas-------------- */
        public static function limpiar_cadena($cadena){
            $cadena=trim($cadena);
            $cadena=stripslashes($cadena);
            $cadena=str_ireplace("<script>","",$cadena);
            $cadena=str_ireplace("</script>","",$cadena);
            $cadena=str_ireplace("<script src>","",$cadena);
            $cadena=str_ireplace("<script type=>","",$cadena);
            $cadena=str_ireplace("SELECT * FROM","",$cadena);
            $cadena=str_ireplace("DELETE FROM","",$cadena);
            $cadena=str_ireplace("INSERT INTO","",$cadena);
            $cadena=str_ireplace("DROP TABLE","",$cadena);
            $cadena=str_ireplace("TRUNCATE TABLE","",$cadena);
            $cadena=str_ireplace("SHOW TABLE","",$cadena);
            $cadena=str_ireplace("SHOW DATABASES","",$cadena);
            $cadena=str_ireplace("<?P","",$cadena);
            $cadena=str_ireplace("?>","",$cadena);
            $cadena=str_ireplace("--","",$cadena);
            $cadena=str_ireplace(">","",$cadena);
            $cadena=str_ireplace("<","",$cadena);
            $cadena=str_ireplace("[","",$cadena);
            $cadena=str_ireplace("]","",$cadena);
            $cadena=str_ireplace("^","",$cadena);
            $cadena=str_ireplace("=","",$cadena);
            $cadena=str_ireplace(";","",$cadena);
            $cadena=str_ireplace("::","",$cadena);
            $cadena=stripslashes($cadena);
            $cadena=trim($cadena);
            return $cadena;
        }
        /*--------------Verificar datos-------------- */
        protected static function verificar_datos($filtro,$cadena){
            if(preg_match("/^".$filtro."$/",$cadena)){
                return false;
            }else{
                return true;
            }
        }
        /*--------------Verificar fecha-------------- */
        protected static function verificar_fecha($fecha,$cadena){
            $valores = explode('-',$fecha);
            if(count($valores)==3 && checkdate($valores[1],$valores[2],$valores[0]) ){
                return false;
            }else{
                return true;
            }
        }
        /*--------------Paginador de tablas-------------- */
        protected static function paginador_tablas($pagina, $Npaginas,$url,$botones){
            $tabla = '<nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center"';
            if($pagina==1){
                $tabla.='<li class="page-item disabled">
                <a class="page-link"><i class="fas fa-angle-double-left"></i></a></li>';
            }
            else{
                $tabla.='<li class="page-item">
                <a class="page-link" href="'.$url.'1/"><i class="fas fa-angle-double-left"></i></a></li>
                <li class="page-item">
                <a class="page-link" href="'.$url.($pagina-1).'/">Anterior</a></li>';
            }
            $ci=0;
            for($i=$pagina; $i<=$Npaginas; $i++){
                if($ci>=$botones){
                    break;
                }
                if($pagina==$i){
                    $tabla.= '<li class="page-item">
                    <a class="page-link active" href="'.$url.$i.'/">'.$i.'</a></li>';

                }else{
                    $tabla.= '<li class="page-item">
                    <a class="page-link" href="'.$url.$i.'/">'.$i.'</a></li>';
                }
                $ci++;

            }

            if($pagina==$Npaginas){
                $tabla.='<li class="page-item disabled">
                <a class="page-link"><i class="fas fa-angle-double-right"></i></a></li>';
            }
            else{
                $tabla.='<li class="page-item">
                <a class="page-link" href="'.$url.$Npaginas.'/"><i class="fas fa-angle-double-right"></i></a></li>
                <li class="page-item">
                <a class="page-link" href="'.$url.($pagina+1).'/">Siguiente</a></li>';
            }
            $tabla.='</ul></nav>';
            return $tabla;
        }
    }

?>
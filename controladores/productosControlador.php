<?php
        if($peticionAjax){
            require_once "../modelos/productosModelo.php";
        }else if (isset($pagesFlag)){
            require_once "../modelos/productosModelo.php";
        }else{
            require_once "../../modelos/productosModelo.php";
        }

    class productosControlador extends productosModelo {

        public function agregar_producto_controlador(){
            $producto_categoria=mainModel::limpiar_cadena($_POST['producto_categoria']);
            $producto_color=mainModel::limpiar_cadena($_POST['producto_color']);
            $producto_tela=mainModel::limpiar_cadena($_POST['producto_tela']);
            $producto_descripcion=mainModel::limpiar_cadena($_POST['producto_descripcion']);
            $producto_precio=mainModel::limpiar_cadena($_POST['producto_precio']);

            /*----------------Comprobar campos vacíos -----------------*/  
            
            if($producto_categoria=="" || $producto_color=="" || $producto_tela==""
            || $producto_descripcion=="" || $producto_precio=="")
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

            if(mainModel::verificar_datos("^\d*(\.\d{1,2})?$",$producto_precio)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"El precio no coinicide con el formato solicitado",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }


            //Crear el codigo unico de producto

            $colores="SELECT nombreColor FROM catcolores WHERE idColor = '$producto_color'";
            $categorias="SELECT nombreCategoria FROM catcategorias WHERE idCategoria = '$producto_categoria'";
            $tela="SELECT nombreTela FROM cattela WHERE idTela = '$producto_tela'";
            $lastProductId="SELECT MAX(idProducto) FROM tblproducto";
  
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $colores = $conexion->query($colores);
            $categorias = $conexion->query($categorias);
            $tela = $conexion->query($tela);

            if ($colores->rowCount()> 0){
                $colores = $colores->fetch();
            }
            else
            {
                $colores = 0;//No hay datos
            }

            if ($categorias->rowCount()> 0){
                $categorias = $categorias->fetch();
            }
            else
            {
                $categorias = 0;//No hay datos
            }

            if ($tela->rowCount()> 0){
                $tela = $tela->fetch();
            }
            else
            {
                $tela = 0;//No hay datos
            }

            $datos_codigo = [
                "producto_categoria"=>$categorias['nombreCategoria'],
                "producto_color"=>$colores['nombreColor'],
                "producto_tela"=>$tela['nombreTela'],
                "producto_descripcion"=>$producto_descripcion
            ];

            $uniqueCode = "";

            foreach($datos_codigo as $elem)
            {
                $first3 = substr($elem, 0, 3);

                $first3 = str_replace(" ", "0", $first3);

                if(strlen($first3) < 3)
                {
                    for($i = strlen($first3); $i < 3; $i++)
                    {
                        $first3 = '0'.$first3;
                    }
                }

                $uniqueCode = $uniqueCode.$first3;

            }

            $lastProductId = $conexion->query($lastProductId);
            if ($lastProductId->rowCount()> 0){
                $lastProductId = $lastProductId->fetch();
                $lastProductId = (int)$lastProductId['MAX(idProducto)'];
            }
            else
            {
                $lastProductId = 0;//No hay datos
            }

            $uniqueCode = $uniqueCode.((string)($lastProductId+1));

            //GUARDAR LAS FOTOS EN EL SERVER

            //creamos la carpeta
            $path = "../img/imgProductos/".$uniqueCode;
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $extensiones=[];
            $extensiones[]='image/png';
            $extensiones[]='image/jpeg';
            $extensiones[]='image/jpg';

            $tamañoMaximo=1000000000;

            $imgenTMP=$_FILES['main_pic']['tmp_name'];
            $imgenTYPE=$_FILES['main_pic']['type'];
            $imgenSIZE=$_FILES['main_pic']['size'];

            $ruta="";

            if(isset($imgenTMP)&&!empty($imgenTMP)){
                if ( in_array($imgenTYPE, $extensiones) ) {
                    if ($imgenSIZE < $tamañoMaximo ) {
                        $ruta='../img/imgProductos/'.$uniqueCode.'/main.jpeg';
                        if (move_uploaded_file($imgenTMP, $ruta)) {
                            //
                        }else{
                            $alerta=[
                                "Alerta"=>"simple",
                                "Titulo"=>"Ocurrió un error inesperado",
                                "Texto"=>"No se logro subir la imagen main seleccionada",
                                "Tipo"=>"error"
                            ];
                            echo json_encode($alerta);
                            exit();
                        }

                    }else{
                       $alerta=[
                           "Alerta"=>"simple",
                           "Titulo"=>"Ocurrió un error inesperado",
                           "Texto"=>"El tamaño de la imagen main no es permitido",
                           "Tipo"=>"error"
                       ];
                       echo json_encode($alerta);
                       exit();
                    }
               }else{
                   $alerta=[
                       "Alerta"=>"simple",
                       "Titulo"=>"Ocurrió un error inesperado",
                       "Texto"=>"La extención de la imagen main no es valida",
                       "Tipo"=>"error"
                   ];
                   echo json_encode($alerta);
                   exit();
               }
            }

            $imgenTMP=$_FILES['frontPic']['tmp_name'];
            $imgenTYPE=$_FILES['frontPic']['type'];
            $imgenSIZE=$_FILES['frontPic']['size'];

            $ruta="";

            if(isset($imgenTMP)&&!empty($imgenTMP)){
                if ( in_array($imgenTYPE, $extensiones) ) {
                    if ($imgenSIZE < $tamañoMaximo ) {
                        $ruta='../img/imgProductos/'.$uniqueCode.'/front.jpeg';
                        if (move_uploaded_file($imgenTMP, $ruta)) {
                            //
                        }else{
                            $alerta=[
                                "Alerta"=>"simple",
                                "Titulo"=>"Ocurrió un error inesperado",
                                "Texto"=>"No se logro subir la imagen front seleccionada",
                                "Tipo"=>"error"
                            ];
                            echo json_encode($alerta);
                            exit();
                        }

                    }else{
                       $alerta=[
                           "Alerta"=>"simple",
                           "Titulo"=>"Ocurrió un error inesperado",
                           "Texto"=>"El tamaño de la imagen front no es permitido",
                           "Tipo"=>"error"
                       ];
                       echo json_encode($alerta);
                       exit();
                    }
               }else{
                   $alerta=[
                       "Alerta"=>"simple",
                       "Titulo"=>"Ocurrió un error inesperado",
                       "Texto"=>"La extención de la imagen front no es valida",
                       "Tipo"=>"error"
                   ];
                   echo json_encode($alerta);
                   exit();
               }
            }

            $imgenTMP=$_FILES['backPic']['tmp_name'];
            $imgenTYPE=$_FILES['backPic']['type'];
            $imgenSIZE=$_FILES['backPic']['size'];

            $ruta="";

            if(isset($imgenTMP)&&!empty($imgenTMP)){
                if ( in_array($imgenTYPE, $extensiones) ) {
                    if ($imgenSIZE < $tamañoMaximo ) {
                        $ruta='../img/imgProductos/'.$uniqueCode.'/back.jpeg';
                        if (move_uploaded_file($imgenTMP, $ruta)) {
                            //
                        }else{
                            $alerta=[
                                "Alerta"=>"simple",
                                "Titulo"=>"Ocurrió un error inesperado",
                                "Texto"=>"No se logro subir la imagen back seleccionada",
                                "Tipo"=>"error"
                            ];
                            echo json_encode($alerta);
                            exit();
                        }

                    }else{
                       $alerta=[
                           "Alerta"=>"simple",
                           "Titulo"=>"Ocurrió un error inesperado",
                           "Texto"=>"El tamaño de la imagen back no es permitido",
                           "Tipo"=>"error"
                       ];
                       echo json_encode($alerta);
                       exit();
                    }
               }else{
                   $alerta=[
                       "Alerta"=>"simple",
                       "Titulo"=>"Ocurrió un error inesperado",
                       "Texto"=>"La extención de la imagen back no es valida",
                       "Tipo"=>"error"
                   ];
                   echo json_encode($alerta);
                   exit();
               }
            }

            /*Datos por enviar */
            $datos_producto_reg = [
                "categoriaProducto"=>$producto_categoria,
                "colorProducto"=>$producto_color,
                "telaProducto"=>$producto_tela,
                "descripcionProducto"=>$producto_descripcion,
                "precioProducto"=>$producto_precio,
                "codigoEstilo"=>$uniqueCode
            ];
            

            $agregar_Producto=productosModelo::agregar_producto_modelo($datos_producto_reg);
            if($agregar_Producto->rowCount()==1){
                $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Producto registrado",
                    "Texto"=>"Producto registrado correctamente",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta);

                
            }
            else
            {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrió un error inesperado",
                    "Texto"=>"No se logró añadir el Producto al sistema.",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        public function lista_productos_controlador()
        {
            
            $consulta="SELECT * FROM tblproducto
            INNER JOIN catcolores ON tblproducto.colorProducto = catcolores.idColor
            INNER JOIN catcategorias ON tblproducto.categoriaProducto = catcategorias.idCategoria
            INNER JOIN cattela ON tblproducto.telaProducto = cattela.idTela
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
            $colores="SELECT * FROM catcolores";
            $categorias="SELECT * FROM catcategorias";
            $tela="SELECT * FROM cattela";
  
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $colores = $conexion->query($colores);
            $categorias = $conexion->query($categorias);
            $tela = $conexion->query($tela);

            if ($colores->rowCount()> 0){
                $colores = $colores->fetchAll();
            }
            else
            {
                $colores = 0;//No hay datos
            }

            if ($categorias->rowCount()> 0){
                $categorias = $categorias->fetchAll();
            }
            else
            {
                $categorias = 0;//No hay datos
            }

            if ($tela->rowCount()> 0){
                $tela = $tela->fetchAll();
            }
            else
            {
                $tela = 0;//No hay datos
            }

            $datos = [
                "colores"=>$colores,
                "categorias"=>$categorias,
                "tela"=>$tela
            ];

            return $datos;
        }

        /*CONTRALADORES PARA EL CLIENTE*/
        public function lista_productos_cliente_controlador($tallas, $categorias, $telas, $colores, $limiteInferior, $cantRegistros)
        {
            
            $consulta="SELECT * FROM tblproducto
            INNER JOIN tbldetproducto ON tblproducto.idProducto = tbldetproducto.producto
            INNER JOIN cattallas ON tbldetproducto.tallaProducto = cattallas.idTalla
            INNER JOIN catcategorias ON tblproducto.categoriaProducto = catcategorias.idCategoria
            INNER JOIN cattela ON tblproducto.telaProducto = cattela.idTela
            INNER JOIN catcolores ON tblproducto.colorProducto = catcolores.idColor   
            WHERE (cantidadDisponible > 0) ";
            
            if($tallas != 0)
            {
                $cTalla = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($tallas as $talla)
                {
                    if ($cTalla < 1)
                    {
                        $consulta= $consulta."(cattallas.idTalla = ".$talla.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (cattallas.idTalla = ".$talla.") ";
                    }
                    $cTalla++;
                }
                $consulta= $consulta.") ";
            }

            if($categorias != 0)
            {
                $ccategoria = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($categorias as $categoria)
                {
                    if ($ccategoria < 1)
                    {
                        $consulta= $consulta."(catcategorias.idCategoria = ".$categoria.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (catcategorias.idCategoria = ".$categoria.") ";
                    }
                    $ccategoria++;
                }
                $consulta= $consulta.") ";
            }

            if($telas != 0)
            {
                $ctela = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($telas as $tela)
                {
                    if ($ctela < 1)
                    {
                        $consulta= $consulta."(cattela.idTela = ".$tela.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (cattela.idTela = ".$tela.") ";
                    }
                    $ctela++;
                }
                $consulta= $consulta.") ";
            }

            if($colores != 0)
            {
                $ccolor = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($colores as $color)
                {
                    if ($ccolor < 1)
                    {
                        $consulta= $consulta."(catcolores.idColor = ".$color.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (catcolores.idColor = ".$color.") ";
                    }
                    $ccolor++;
                }
                $consulta= $consulta.") ";
            }

            $consulta= $consulta."GROUP BY tbldetproducto.producto 
            LIMIT ".$limiteInferior.", ".$cantRegistros."";
            mainModel::console_log($consulta);
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

            mainModel::console_log($datos);
            return $datos;
        }

        public function lista_catalogos_cliente_controlador()
        {
            $colores="SELECT * FROM catcolores";
            $categorias="SELECT * FROM catcategorias";
            $tela="SELECT * FROM cattela";
            $tallas="SELECT * FROM cattallas";
  
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $colores = $conexion->query($colores);
            $categorias = $conexion->query($categorias);
            $tela = $conexion->query($tela);
            $tallas = $conexion->query($tallas);

            if ($colores->rowCount()> 0){
                $colores = $colores->fetchAll();
            }
            else
            {
                $colores = 0;//No hay datos
            }

            if ($categorias->rowCount()> 0){
                $categorias = $categorias->fetchAll();
            }
            else
            {
                $categorias = 0;//No hay datos
            }

            if ($tela->rowCount()> 0){
                $tela = $tela->fetchAll();
            }
            else
            {
                $tela = 0;//No hay datos
            }

            if ($tallas->rowCount()> 0){
                $tallas = $tallas->fetchAll();
            }
            else
            {
                $tallas = 0;//No hay datos
            }

            $datos = [
                "colores"=>$colores,
                "categorias"=>$categorias,
                "tela"=>$tela,
                "tallas"=>$tallas
            ];

            return $datos;
        }

        public function totalProductos_controlador($tallas, $categorias, $telas, $colores)
        {
            $consulta="SELECT COUNT(DISTINCT(idProducto)) FROM tblproducto
            INNER JOIN tbldetproducto ON tblproducto.idProducto = tbldetproducto.producto
            INNER JOIN cattallas ON tbldetproducto.tallaProducto = cattallas.idTalla
            INNER JOIN catcategorias ON tblproducto.categoriaProducto = catcategorias.idCategoria
            INNER JOIN cattela ON tblproducto.telaProducto = cattela.idTela
            INNER JOIN catcolores ON tblproducto.colorProducto = catcolores.idColor   
            WHERE (cantidadDisponible > 0) ";
            
            if($tallas != 0)
            {
                $cTalla = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($tallas as $talla)
                {
                    if ($cTalla < 1)
                    {
                        $consulta= $consulta."(cattallas.idTalla = ".$talla.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (cattallas.idTalla = ".$talla.") ";
                    }
                    $cTalla++;
                }
                $consulta= $consulta.") ";
            }

            if($categorias != 0)
            {
                $ccategoria = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($categorias as $categoria)
                {
                    if ($ccategoria < 1)
                    {
                        $consulta= $consulta."(catcategorias.idCategoria = ".$categoria.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (catcategorias.idCategoria = ".$categoria.") ";
                    }
                    $ccategoria++;
                }
                $consulta= $consulta.") ";
            }

            if($telas != 0)
            {
                $ctela = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($telas as $tela)
                {
                    if ($ctela < 1)
                    {
                        $consulta= $consulta."(cattela.idTela = ".$tela.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (cattela.idTela = ".$tela.") ";
                    }
                    $ctela++;
                }
                $consulta= $consulta.") ";
            }

            if($colores != 0)
            {
                $ccolor = 0;
                $consulta= $consulta."AND (";//El AND
                foreach($colores as $color)
                {
                    if ($ccolor < 1)
                    {
                        $consulta= $consulta."(catcolores.idColor = ".$color.") ";
                    }
                    else
                    {
                        $consulta= $consulta."OR (catcolores.idColor = ".$color.") ";
                    }
                    $ccolor++;
                }
                $consulta= $consulta.") ";
            }

            //$consulta= $consulta."GROUP BY tbldetproducto.producto";
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $productos = $conexion->query($consulta);

            $productos = $productos->fetch();

            // mainModel::console_log($consulta);
            // mainModel::console_log($productos['COUNT(DISTINCT(idProducto))']);

            return $productos['COUNT(DISTINCT(idProducto))'];
        }

        public function producto_cliente_controlador($codigoProducto)
        {
            $producto="SELECT * FROM tblproducto 
            WHERE idProducto = '".$codigoProducto."'
            ";
  
            /*Se establece la conexión con la bd */ 
            $conexion= mainModel::conectar();
            $producto = $conexion->query($producto);
            

            if ($producto->rowCount()> 0){
                $producto = $producto->fetch();
            }
            else
            {
                $producto = 0;//No hay datos
            }

            return $producto;
        }

        public function tallas_producto_cliente_controlador($codigoProducto)
        {
            $tallas="SELECT * FROM tbldetproducto
            INNER JOIN cattallas ON tbldetproducto.tallaProducto = cattallas.idTalla
            WHERE ((producto = '".$codigoProducto."')
            AND (cantidadDisponible > 0))
            ";
  
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

            return $tallas;
        }


        
    } 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
           
            // session_start(['name'=>'SPM']);

            // if(isset($_SESSION['id_spm']))
            // {
            //     if(headers_sent()){
            //         return"
            //         <script>
            //             window.location.href='".SERVERURL."home/';
            //         </script>";
            //     }else{
            //         return header("Location: ".SERVERURL."home/");
            //     }
            // } else
            //     {

                require_once "../../config/app.php" ;
                require_once "../../dependencias/css/link.php";
                ?>
</head>
<body>
    <h2>Bienvenido administrador</h2>
</body>
</html>



    
<?php
//}
?>

<?php

	if(isset($_POST['usuario_log']) && isset($_POST['clave_log'])){
		require_once "./controladores/loginControlador.php";
		$ins_login=new loginControlador();

		echo $ins_login->iniciar_sesion_controlador();
	}


?>

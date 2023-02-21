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
                //require_once "../dependencias/css/link.php";
                include "inc/link.php";
                ?>
</head>
<body>
<div class="login-container">
        <div class="login-content">
            <p class="text-center">
                <i class="fas fa-user-circle fa-5x"></i>
            </p>
                    <legend class="text-center">
                INICIA SESION CON TU CUENTA
            </legend><b</b>
            <form action="" method="POST" autocomplete="off" >
                <div class="form-group">
                    <label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; USUARIO</label>
                    <input type="email" class="form-control" id="UserName" name="usuario_log" maxlength="35" required="" >
                </div>
                <div class="form-group">
                    <label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; CONTRASEÑA</label>
                    <input type="password" class="form-control" id="UserPassword" name="clave_log" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
                </div>
                <button type="submit" class="btn-login text-center justify-center">INGRESAR</button>
                

            </form>
           
        </div>
    </div>
</body>
</html>



    
<?php
//}
?>

<?php
    $peticionAjax = false;
	if(isset($_POST['usuario_log']) && isset($_POST['clave_log'])){
		require_once "../../controladores/loginControlador.php";
		$ins_login=new loginControlador();

		echo $ins_login->iniciar_sesion_controlador();
	}


?>

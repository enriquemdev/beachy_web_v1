<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==26 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==26 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==26 && $key['CodPrivilegio']==3){
        $actualizar=true;
      }
    }


    if($ver==false){
        echo $lc->redireccionar_home_controlador();
        exit();
    }

?>

<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp;DETALLES DE COMPRAS DE LA FARMACIA
				</h3>
				<p class="text-justify">
					Lista de compras y sus detalles
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">

					<?php   
          			if($agregar==true){ ?> 
					<li>
						<a  href="<?php echo SERVERURL; ?>detalle-compras-farmacia-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DETALLE DE COMPRA</a>
					</li>
					<?php } ?>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>detalle-compras-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE COMPRAS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>detalle-compras-farmacia-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR COMPRA</a>
					</li>
				</ul>	
			</div>
			<!-- Content here-->
			<div class="container-fluid">
			<?php 
					require_once "./controladores/detalleComprasFarmaciaControlador.php";
					$ins_detalleComprasFarmaciaControlador = new detalleComprasFarmaciaControlador();
					echo $ins_detalleComprasFarmaciaControlador->paginador_detalle_compras_farmacia_controlador($pagina[1],15,$_SESSION['privilegio_spm'],$_SESSION['id_spm'],$pagina[0],"");

				?>
			</div>
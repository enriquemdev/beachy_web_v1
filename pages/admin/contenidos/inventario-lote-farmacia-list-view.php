<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==23 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==23 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==23 && $key['CodPrivilegio']==3){
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LOTES DE INVENTARIO
				</h3>
				<p class="text-justify">
					Lista de lotes en inventario
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="<?php echo SERVERURL; ?>inventario-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA INVENTARIO</a>
					</li>
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>inventario-lote-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA LOTES</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>inventario-rop-farmacia-list/"><i class="fa-solid fa-square-root-variable"></i> &nbsp; ROP</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>inventario-farmacia-search/"><i class="fas fa-search fa-fw"></i> &nbsp; SELECCIONAR PROVEEDOR</a>
					</li>
				</ul>	
			</div>
			<!-- Content here-->
			<div class="container-fluid">
			<?php 
					require_once "./controladores/inventarioFarmaciaControlador.php";
					$ins_inventario_farmacia = new inventarioFarmaciaControlador();
					echo $ins_inventario_farmacia->paginador_inventario_lotes_farmacia_controlador($pagina[1],15,$_SESSION['privilegio_spm'],$_SESSION['id_spm'],$pagina[0],"");

				?>
			</div>
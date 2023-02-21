<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==27 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==27 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==27 && $key['CodPrivilegio']==3){
        $actualizar=true;
      }
    }


    if($agregar==false){
        echo $lc->redireccionar_home_controlador();
        exit();
    }

?>
	
<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; DETALLE VENTA
				</h3>
				<p class="text-justify">
					Detallar venta
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>detalle-ventas-farmacia-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DETALLE DE VENTA</a>
					</li>

					<?php   
          			if($ver==true){ ?> 
					<li>
						<a href="<?php echo SERVERURL; ?>detalle-ventas-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE VENTAS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>detalle-ventas-farmacia-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR VENTA</a>
					</li>
					<?php } ?>
					
				</ul>	
			</div>
	
			<div class="container-fluid">
			<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/detalleVentasFarmaciaAjax.php" method="POST" data-form= "save" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="idVenta" class="bmd-label-floating">Venta<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="idVenta_reg" id="idVenta" maxlength="100">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="idDetalleReceta" class="bmd-label-floating">Detalle de receta<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="idDetalleReceta_reg" id="idDetalleReceta" maxlength="100">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nota" class="bmd-label-floating">Nota</label>
										<textarea type="text" class="textarea1" requiered="" name="nota_reg" id="nota" ></textarea>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; DESHACER</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; REGISTRAR</button>
					</p>
				</form>
			</div>	

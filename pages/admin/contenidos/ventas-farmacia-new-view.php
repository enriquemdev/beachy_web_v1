<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==25 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==25 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==25 && $key['CodPrivilegio']==3){
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
					<i class="fas fa-plus fa-fw"></i> &nbsp; VENTA
				</h3>
				<p class="text-justify">
					Registrar una venta
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>ventas-farmacia-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR VENTA</a>
					</li>

					<?php   
          			if($ver==true){ ?> 
					<li>
						<a href="<?php echo SERVERURL; ?>ventas-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE VENTAS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>ventas-farmacia-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR VENTA</a>
					</li>
					<?php } ?>
					
				</ul>	
			</div>
			
			<div class="container-fluid">
			<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/ventasFarmaciaAjax.php" method="POST" data-form= "save" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información basica de la venta</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="receta-medica" class="bmd-label-floating">Receta medica<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="receta-medica_reg" id="receta-medica" maxlength="100">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="fechaVenta" class="bmd-label-static" >FECHA VENTA <span class="Obligar">*</span></label>
										<input type="date" class="form-control" name="fechaVenta_reg" id="fechaVenta" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="descripcion" class="bmd-label-floating">Descripción</label>
										<textarea type="text" class="textarea1" requiered="" name="descripcion_reg" id="descripcion" ></textarea>
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

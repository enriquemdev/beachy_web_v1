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


    if($agregar==false){
        echo $lc->redireccionar_home_controlador();
        exit();
    }

?>
	
<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; DETALLE COMPRA
				</h3>
				<p class="text-justify">
					Detallar compra
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>detalle-compras-farmacia-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DETALLE DE COMPRA</a>
					</li>

					<?php   
          			if($ver==true){ ?> 
					<li>
						<a href="<?php echo SERVERURL; ?>detalle-compras-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE COMPRAS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>detalle-compras-farmacia-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR COMPRA</a>
					</li>
					<?php } ?>
					
				</ul>	
			</div>
	
			<div class="container-fluid">
			<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/detalleComprasFarmaciaAjax.php" method="POST" data-form= "save" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<table class="container-fluid" id="tabla">
							<tr class="row fila-fija" >
								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="idCompra" class="bmd-label-floating">ID Compra<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="idCompra_reg[]" id="idCompra" maxlength="100">
									</div>
					  			</td>
								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="medicamento" class="bmd-label-floating">Medicamento<span class="Obligar">*</span></label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ1-9 ]{3,70}" class="form-control" name="medicamento_reg[]" id="medicamento" maxlength="100">
									</div>
					  			</td>

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="fechaVencimiento" class="bmd-label-static" >FECHA VENCIMIENTO <span class="Obligar">*</span></label>
										<input type="date" class="form-control" name="fechaVencimiento_reg[]" id="fechaVencimiento" required="">
									</div>
					  			</td>

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="cantidad" class="bmd-label-floating">Cantidad<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="cantidad_reg[]" id="cantidad" maxlength="5">
									</div>
					  			</td>

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="precioUnidad" class="bmd-label-floating">Costo/Unidad<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9.]{1,11}" class="form-control" name="precioUnidad_reg[]" id="precioUnidad" maxlength="10">
									</div>
								</td>

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="observacion" class="bmd-label-floating">Observación</label>
										<textarea type="text" class="textarea1" requiered="" name="observacion_reg[]" id="observacion" ></textarea>
									</div>
								</td>

								<td class="col-12 col-md-6 eliminar">
									<input type="button" value="Menos">
								</td>

					  		</tr>
							<!-- <div class="row"> -->
								
							<!-- </div> -->
						</table>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="button" name="adicional" id="adicional" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; MAS</button>
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; DESHACER</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; REGISTRAR</button>
					</p>
				</form>
			</div>	

			
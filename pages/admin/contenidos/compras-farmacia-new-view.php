<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==24 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==24 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==24 && $key['CodPrivilegio']==3){
        $actualizar=true;
      }
    }


    if($agregar==false){
        echo $lc->redireccionar_home_controlador();
        exit();
    }

	require_once "./controladores/recetaControlador.php";
	$ins_item = new recetaControlador();

	for ($j = 0; $j < 10; $j++)
	{
		$datos_item[$j]=$ins_item->datos_medicamentos_controlador();
	if ($datos_item[$j]->rowCount()==1)
	{
		$campos=$datos_item[$j]->fetch();
	}
	}
	/*
	$datos_item[]=$ins_item->datos_medicamentos_controlador();
	if ($datos_item->rowCount()==1)
	{
		$campos=$datos_item->fetch();
	}

	$datos_item2=$ins_item->datos_medicamentos_controlador();
	if ($datos_item2->rowCount()==1)
	{
		$campos=$datos_item2->fetch();
	}*/


?>
	<style>
	/* .eliminar lo tiene el contenedor del boton de eliminar detalles de compra */
		.eliminar {			
			display: none;
			justify-content: left;
			align-items: center;
		}
	</style>
<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; COMPRA
				</h3>
				<p class="text-justify">
					Realizar una compra
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>compras-farmacia-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR COMPRA</a>
					</li>

					<?php   
          			if($ver==true){ ?> 
					<li>
						<a href="<?php echo SERVERURL; ?>compras-farmacia-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE COMPRAS</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>compras-farmacia-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR COMPRA</a>
					</li>
					<?php } ?>
					
				</ul>	
			</div>
			
			<div class="container-fluid">
			<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/comprasFarmaciaAjax.php" method="POST" data-form= "save" autocomplete="off">
					<fieldset>
						<legend><i class="fa fa-shopping-cart"></i> &nbsp; Información basica de la compra</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group" title="FORMATO: NombreProveedor__LeadTime">
										<label for="proveedor" class="bmd-label-floating">NOMBRE PROVEEDOR<span class="Obligar">*</span></label>
											<div class="autocompletar"> <!-- pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ.1-9 ]{3,70}" -->
											<input type="text" class="form-control" name="proveedor_reg" id="proveedor_reg" maxlength="100">
										</div>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="fechaCompra" class="bmd-label-static" >FECHA COMPRA <span class="Obligar">*</span></label>
										<input type="date" class="form-control" name="fechaCompra_reg" id="fechaCompra" required="">
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

					<!-- FIELDSET DEL DETALLE AQUI QUEDE-->
					<fieldset>
						<legend><i class="fa fa-shopping-cart"></i> &nbsp; Detalle de los Productos</legend>
						<table class="container-fluid" id="tabla">
							<tr class="row fila-fija" >
								<!-- <td class="col-12 col-md-6">
									<div class="form-group">
										<label for="idCompra" class="bmd-label-floating">ID Compra<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="idCompra_reg[]" id="idCompra" maxlength="100">
									</div>
					  			</td> -->
								<!-- <td class="col-12 col-md-6">
									<div class="form-group">
										<label for="medicamento" class="bmd-label-static">Medicamento<span class="Obligar">*</span></label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ1-9 ]{3,70}" class="form-control" name="medicamento_reg[]" id="medicamento" maxlength="100">
									</div>
					  			</td> -->

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="medicamento" class="bmd-label-static">Medicamento<span class="Obligar">*</span></label>
										<div class="autocompletar">
											<input type="text" class="form-control medicamento" name="medicamento_reg[]" id="medicamento" maxlength="100">
										</div>
										
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
										<label for="cantidad" class="bmd-label-static">Cantidad<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9]{1,11}" class="form-control" name="cantidad_reg[]" id="cantidad" maxlength="5">
									</div>
					  			</td>

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="precioUnidad" class="bmd-label-static">Costo/Unidad<span class="Obligar">*</span></label>
										<input type="text" pattern="[0-9.]{1,11}" class="form-control" name="precioUnidad_reg[]" id="precioUnidad" maxlength="10">
									</div>
								</td>

								<td class="col-12 col-md-6">
									<div class="form-group">
										<label for="observacion" class="bmd-label-static">Observación</label>
										<textarea type="text" class="textarea1" requiered="" name="observacion_reg[]" id="observacion" ></textarea>
									</div>
								</td>

								<td class="col-12 col-md-6 eliminar">
									
									<button type="button" class="btn btn-raised btn-secondary"><i class="fa fa-minus-circle"></i>  &nbsp; Eliminar Detalle de Compra</button>
								</td>

					  		</tr>
							<!-- <div class="row"> -->
								
							<!-- </div> -->
						</table>
					</fieldset>
						<div>
						<button type="button" name="adicional" id="adicional" class="btn btn-raised btn-success btn-sm"><i class="fa fa-plus-circle"></i> &nbsp; AÑADIR DETALLE DE COMPRA</button>
						</div>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; DESHACER</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; REGISTRAR</button>
					</p>
				</form>
			</div>
			<script src="<?php echo SERVERURL; ?>buscadores/nombreProveedor_creaCompra.js"></script><!--Para  buscador textbox-->
			<script src="<?php echo SERVERURL; ?>buscadores/Medicamento_creaCompra.js"></script><!--Para  buscador textbox-->

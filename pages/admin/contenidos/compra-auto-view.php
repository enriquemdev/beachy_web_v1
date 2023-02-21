<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==24 || $key['CodigoSubModulo']==26 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==24 || $key['CodigoSubModulo']==26 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==24 || $key['CodigoSubModulo']==26 && $key['CodPrivilegio']==3){
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
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; COMPRA 
				</h3>
				<p class="text-justify">
					Realizar una compra en base a ROP
				</p>
			</div>
            <div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">

				</ul>	
			</div>
		
		
			<!-- Content -->
			<?php 
				require_once "./controladores/diagnosticoControlador.php";
				$ins_item = new diagnosticoControlador();
				$datos_item=$ins_item->datos_item1_controlador();
				if($datos_item->rowCount()==1){
					$campos=$datos_item->fetch();
				}
				require_once "./controladores/diagnosticoControlador.php";
				$ins_item = new diagnosticoControlador();
				$datos_diagnostico=$ins_item->datos_consulta_controlador($pagina[1]);

				if($datos_diagnostico->rowCount()==1){
					$campos=$datos_diagnostico->fetch();
					
					
					?>
			<div class="container-fluid">
			<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/diagnosticoAjax.php" method="POST" data-form= "update" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información De Diagnóstico</legend>
						<div class="container-fluid">
							<div class="row">
							<div class="col-12 col-md-6">
									<div class="form-group">
										
										<label for="codigo_consulta_reg" class="bmd-label-floating">DIAGNOSTICO DE <span class="Obligar">*</span></label>
										<input type="text" class="form-control"name="codigo_consulta_reg2" id="codigo_consulta_reg2" readonly value="<?php echo $campos['Nombres'] ?> <?php echo $campos['Apellidos']?> - <?php echo $campos['CodigoP'] ?>">
										<input type="hidden" name="codigo_consulta_reg" id="codigo_consulta_reg" required="" value="<?php echo $pagina[1] ?>">
										
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="sintoma_reg" class="bmd-label-floating">SINTOMAS <span class="Obligar">*</span></label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#() ]{5,100}" class="form-control" name="sintoma_reg" id="sintoma_reg" maxlength="100" required=""> <!--Cambiar tamaño -->
									</div>
								</div>
                                
								<div class="col-12 col-md-6" > 
									<div class="form-group">
									<label for="NOTA" class="bmd-label-floating">DESCRIPCIÓN DEL DIAGNÓSTICO <span class="Obligar">*</span></label>
									<textarea type="text" class="textarea1" requiered="" name="diagnostico_desc"></textarea>
									</div>
								</div>
								<div class="col-12 col-md-6" > 
									<div class="form-group">
									<label for="NOTA" class="bmd-label-floating">NOTAS DEL DIAGNÓSTICO <span class="Obligar">*</span></label>
									<textarea type="text" class="textarea1" requiered="" name="NOTA"></textarea>
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="cod_enfermedad" class="bmd-label-floating">SELECCIONE ENFERMEDAD <span class="Obligar">*</span></label>
										<select class="form-control" name="cod_enfermedad_reg" id="cod_enfermedad" required="">
											<option value="" selected="" disabled=""></option>
											<?php foreach($datos_item as $campo){ ?>
											<option value="<?php echo$campo['ID'] ?>"><?php echo$campo['NombreEnfermedad'] ?></option>
											<?php }?>
										</select>
										</div>
								</div>
                                
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; DESHACER</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; REGISTRAR</button>
					</p>
				</form>
			</div>
			<script src="<?php echo SERVERURL; ?>buscadores/Consulta_creaDiagnostico.js"></script>
			<?php 	} else { ?>
				<div class="alert alert-danger text-center" role="alert">
				<p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
				<h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
				<p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
			</div>
			<?php }		?>
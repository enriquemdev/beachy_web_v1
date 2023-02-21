<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==19 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==19 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==19 && $key['CodPrivilegio']==3){
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
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; GESTION RESULTADO DE EXAMEN 
				</h3>
				<p class="text-justify">
					Agregar resultado examenes
				</p>
			</div>
            <div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="<?php echo SERVERURL; ?>resultado-examen-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR RESULTADO DE EXAMEN</a>
					</li>

					<?php   
          			if($ver==true){ ?> 
					<li>
						<a href="<?php echo SERVERURL; ?>resultado-examen-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE RESULTADO DE EXAMENES</a>
					</li>
					<!-- Identificador: 000 -->
					<li>
						<a href="<?php echo SERVERURL; ?>resultado-examen-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR RESULTADO EXAMEN</a>
					</li>
					<!-- Termino Identificador: 000 -->
					<?php } ?>
					
				</ul>	
			</div>
		
			<!-- Content -->
			<div class="container-fluid">
				<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/resultadoExamenAjax.php" method="POST" data-form= "save" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información De Resultado de Examen</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="codigo_examen" class="bmd-label-floating">CODIGO DEL EXAMEN</label>
										<input type="text" pattern="[0-9-]{1,27}" class="form-control" name="codigo_examen_reg" id="codigo_examen" maxlength="9">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">FECHA Y HORA
										<label for="fecha" class="bmd-label-floating"></label>
										<input type="date"  class="form-control" name="examen_date_reg" id="examen_fecha" >
										<input type="time"  class="form-control" name="examen_time_reg" id="examen_fecha" >
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="codigo_paciente" class="bmd-label-floating">DESCRIPCIÓN DE RESULTADO DE EXAMEN</label>
										<textarea name="comentarios" rows="10" cols="100" ></textarea>
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

		</section>
	</main>
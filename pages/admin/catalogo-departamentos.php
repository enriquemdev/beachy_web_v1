<?php 
require_once "top.php" ;
?>

<!-- Page header -->
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="far fa-calendar-alt fa-fw"></i> &nbsp; CATALOGO DEPAPRTAMENTOS
                </h3>
            </div>
            <div class="container-fluid">
                <div class="table-responsive">
				<?php 
					require_once "../../controladores/catalogosControlador.php";
					$ins_cataglogo = new catalogosControlador();
					$listaTallas = $ins_cataglogo->lista_departamentos_controlador();

					// echo '<script>';
					// echo 'console.log('. json_encode( $listaTallas ) .')';
					// echo '</script>';		
				?>

			<div class="table-responsive">
                <table class="table table-dark table-sm datatable">
                    <thead>
                        <tr class="text-center roboto-medium">
                        <th class="text-center">CODIGO DEPARTAMENTO</th>
                        <th class="text-center">NOMBRE DEPARTAMENTO</th>
						<th class="text-center">PRECIO ENVIO</th>
						<th class="text-center">DIAS ENTREGA</th>

                        </tr>
                    </thead>
                    <tbody>

					<?php 
					if ($listaTallas != 0)
					{
					foreach($listaTallas as $rows){ ?>
                    
                        <tr class="text-center" >
                                <td><?= $rows['idDepartamento'] ?></td>
								<td><?= $rows['nombreDepartamento'] ?></td>
								<td><?= mainModel::formatDollar($rows['precioEnvio'])?></td> 
								<td><?= $rows['diasEntrega'] ?></td>
						</tr>
					<?php 
					}
					}else{
					?>
						<tr class="text-center"><td colspan="9">No hay registros en el sistema</td></tr>
					<?php 
					} 
					?>
                	</tbody>
				</table>
			</div>
			<br><br>

					<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/catalogosAjax.php" method="POST" data-form= "save" autocomplete="off">
						<fieldset>
						<legend><i class="far fa-calendar-alt"></i> &nbsp; AGREGAR DEPARTAMENTO</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nombreDepartamento" class="bmd-label-floating">NOMBRE DEPARTAMENTO</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="nombreDepartamento_reg" id="nombreDepartamento_reg" maxlength="40" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="precioEnvio_reg" class="bmd-label-floating">PRECIO ENVIO</label>
										<input type="number" class="form-control" name="precioEnvio_reg" id="precioEnvio_reg" maxlength="8" min="0" step="0.01" required>
									</div>
								</div>
	
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="diasEntrega_reg" class="bmd-label-floating">DIAS ENTREGA</label>
										<input type="number" pattern="[0-9]" class="form-control" name="diasEntrega_reg" id="diasEntrega_reg" maxlength="8" step="1" min="0" required>
									</div>
								</div>
						   </div>
						</div>
						<br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; DESHACER</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; REGISTRAR</button>
					</p>
					</fieldset>
					</form>
				</div>
					
            </div>

			<?php
require_once "bottom.php" ;
?>
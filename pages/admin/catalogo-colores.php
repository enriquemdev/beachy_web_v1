<?php 
require_once "top.php" ;
?>

<!-- Page header -->
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="far fa-calendar-alt fa-fw"></i> &nbsp; CATALOGO COLORES
                </h3>
            </div>
            <div class="container-fluid">
                <div class="table-responsive">
				<?php 
					require_once "../../controladores/catalogosControlador.php";
					$ins_cataglogo = new catalogosControlador();
					$listaColores = $ins_cataglogo->lista_Colores_controlador();

					// echo '<script>';
					// echo 'console.log('. json_encode( $listaColores ) .')';
					// echo '</script>';		
				?>

			<div class="table-responsive">
                <table class="table table-dark table-sm datatable">
                    <thead>
                        <tr class="text-center roboto-medium">
                        <th class="text-center">CODIGO COLOR</th>
                        <th class="text-center">NOMBRE COLOR</th>

                        </tr>
                    </thead>
                    <tbody>

					<?php 
					if ($listaColores != 0)
					{
					foreach($listaColores as $rows){ ?>
                    
                        <tr class="text-center" >
                                <td><?= $rows['idColor'] ?></td>
								<td><?= $rows['nombreColor'] ?></td>
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
						<legend><i class="far fa-calendar-alt"></i> &nbsp; AGREGAR COLOR</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nombreColor" class="bmd-label-floating">NOMBRE COLOR</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="nombreColor_reg" id="nombreColor" maxlength="40">
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
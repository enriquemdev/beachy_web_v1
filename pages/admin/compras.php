<?php 
require_once "top.php" ;
?>

<!-- Page header -->
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="far fa-calendar-alt fa-fw"></i> &nbsp; COMPRAS
                </h3>
            </div>
            <div class="container-fluid">
                <div class="table-responsive">
				<?php 
					require_once "../../controladores/comprasControlador.php";
					$ins_compra = new comprasControlador();
					$listaCompra = $ins_compra->lista_compras_controlador();
					$listaDatosCatalogos = $ins_compra->lista_catalogos_controlador();

					if (isset($_GET['prod']) && $_GET['prod'] != "")
					{
						$idProducto = $_GET['prod'];
					}
					else
					{
						$idProducto = "";
					}

					// echo '<script>';
					// echo 'console.log('. json_encode( $listaProducto ) .')';
					// echo '</script>';
					
					//alter table nombre_de_la_tabla AUTO_INCREMENT=1;
				?>

			<div class="table-responsive">
                <table class="table table-dark table-sm datatable">
                    <thead>
                        <tr class="text-center roboto-medium">
                        <th class="text-center">ID</th>
                        <th class="text-center">FOTO</th>
						<th class="text-center">ID PRODUCTO</th>
						<th class="text-center">TALLA</th>
						<th class="text-center">CANTIDAD</th>
						<th class="text-center">COSTO UNITARIO</th>
						<th class="text-center">COSTO TOTAL</th>
						<th class="text-center">FECHA</th>
						<th class="text-center">DETALLES</th>
                        </tr>
                    </thead>
                    <tbody>

					<?php 
					if ($listaCompra != 0)
					{
					foreach($listaCompra as $rows){ ?>
                    
                        <tr class="text-center listaImagenes" >
							<!--  d-flex align-items-center justify-content-center-->
                                <td><div><?= $rows['idDetCompra'] ?></div></td>
								<td><div><img width="100px" height="105px" src="<?php echo SERVERURL;?>img/imgProductos/<?= $rows['codigoEstilo'] ?>/main.jpeg" alt=""></div></td>
								<td ><div><?= $rows['codigoEstilo'] ?></div></td>
								<td><div><?= $rows['nombreTalla'] ?></div></td>
								<td><div><?= $rows['cantidadComprada'] ?></div></td>
								<td><div><?= mainModel::formatDollar($rows['costoUnitario']) ?></div></td>
								<td><div><?php echo (mainModel::formatDollar(((int)$rows['cantidadComprada']) * ((int)$rows['costoUnitario']))); ?></div></td>
								<td ><div><?= $rows['fechaCompra'] ?></div></td>
								<td>
									<div>
									<button style="font-size: 28px; color: #0384fc " class ="btn btn-info p-0" onclick="loadData(this.getAttribute('data-id'));" data-id="<?= $rows['idDetCompra'] ?>">
                                    	<i class="fas fa-clipboard-list fa-fw"></i>
                                    </button>
									</div>
                                </td>
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

					<form id="formularioCompras" class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/comprasAjax.php" method="POST" data-form= "save" autocomplete="off">
						<fieldset>
						<legend><i class="far fa-calendar-alt"></i> &nbsp; AGREGAR COMPRAS</legend>
						<div class="container-fluid">
							<div class="row">
								
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="compra_producto" class="bmd-label-floating">ID PRODUCTO A COMPRAR <span class="Obligar">*</span></label>
										<input type="text" class="form-control" name="compra_producto" id="compra_producto" value="<?= $idProducto ?>" maxlength="8" required readonly>
									</div>
								</div>

								<div class="col-12 col-md-6 mb-3">
									
										<label for="compra_talla" class="bmd-label-floating">TALLA <span class="Obligar">*</span></label>
										<select class="form-control" name="compra_talla" id="compra_talla" required>
											<option value="" selected="" disabled=""></option>
											<?php foreach($listaDatosCatalogos['tallas'] as $campo){ ?>
											<option value="<?php echo$campo['idTalla'] ?>"><?php echo$campo['nombreTalla'] ?></option>
											<?php }?>
										</select>
		
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="cantidadComprada" class="bmd-label-floating">CANTIDAD COMPRADA <span class="Obligar">*</span></label>
										<input type="number" pattern="[0-9]" class="form-control" name="cantidadComprada" id="cantidadComprada" maxlength="8" step="1" min="0" required>
									</div>
								</div>

								<div class="col-12 col-md-6" title="Número entero o decimal(2 digitos decimales)">
									<div class="form-group">
										<label for="costoUnitario" class="bmd-label-floating">COSTO UNITARIO <span class="Obligar">*</span></label>
										<input type="number" class="form-control" name="costoUnitario" id="costoUnitario" maxlength="8" min="0" step="0.01" required>
									</div>
								</div>

								<div class="col-12 col-md-6" title="Número entero o decimal(2 digitos decimales) del costo de que nos enviaran los productos.">
									<div class="form-group">
										<label for="costosEntrega" class="bmd-label-floating">COSTO ENTREGA</label>
										<input type="number" class="form-control" name="costosEntrega" id="costosEntrega" maxlength="8" min="0" step="0.01" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="notaCompra" class="bmd-label-floating">NOTA DE COMPRA <span class="Obligar">*</span></label>
										<input type="text" class="form-control" name="notaCompra" id="notaCompra" value="" maxlength="255" required>
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

						<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
    
	<div class = "modal-dialog">
	   <div class = "modal-content">
		   
		  <div class = "modal-header">
			 <h4 class = "modal-title">
				Stock del producto
			 </h4>
  
			 <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
				×
			 </button>
		  </div>
		   
		  <div id = "modal-body">
			 Press ESC button to exit.
		  </div>
		   
		  <div class = "modal-footer">
			 <button type = "button" class = "btn btn-default" data-dismiss = "modal">
				OK
			 </button>
		  </div>
		   
	   </div>
	</div>
	 
 </div>
<!-- TERMINA MODAL -->

 <script>
    function loadData(id) {
        $.ajax({
            url: "modals/productoModal.php",
            method: "POST",
            data: {get_data: 1, id: id},
            success: function (response) {
				response = JSON.parse(response);
				console.log(response);
			
				var html = "";
			
				// Displaying city
				html += "<div class='row m-3'>";
					html += "<div class='col-md-6 d-flex align-items-center'>TALLA</div>";
					html += "<div class='col-md-6 d-flex align-items-center'>STOCK</div>";
					// html += "<div class='col-md-6 row'>";
					for(var elem of response)
					{
						html += "<div class='col-md-6 d-flex align-items-center'>" + elem['nombreTalla'] + "</div>";
						html += "<div class='col-md-6 d-flex align-items-center'>" + elem['cantidadDisponible'] + "</div>";
						// html += "<div class='col-md-12'>" + elem['nombreSintoma'] + "</div>";
					}
					// html += "</div>";
					//html += "<div class='col-md-6'>" + response.Nota + "</div>";
				html += "</div>";
			
				// And now assign this HTML layout in pop-up body
				$("#modal-body").html(html);
			
				// And finally you can this function to show the pop-up/dialog
				$("#myModal").modal();
			}
        });
    }
</script>

<!-- Script para ocultar formulario si no hay un producto en la url -->
<script>
	
	var flag = ""+"<?= $idProducto ?>";

	if(flag == "")
	{
		var formCompras = document.getElementById("formularioCompras");
		formCompras.style.display = 'none';
	}
	//console.log(flag);
</script>

			<?php
require_once "bottom.php" ;
?>
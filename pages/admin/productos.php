<?php 
require_once "top.php" ;
?>

<!-- Page header -->
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="far fa-calendar-alt fa-fw"></i> &nbsp; CATALOGO PRODUCTOS
                </h3>
            </div>
            <div class="container-fluid">
                <div class="table-responsive">
				<?php 
					require_once "../../controladores/productosControlador.php";
					$ins_producto = new productosControlador();
					$listaProducto = $ins_producto->lista_productos_controlador();
					$listaDatosCatalogos = $ins_producto->lista_catalogos_controlador();

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
						<th class="text-center">CATEGORIA</th>
						<th class="text-center">COLOR</th>
						<th class="text-center">TELA</th>
						<th class="text-center">PRECIO</th>
						<th class="text-center">DESCRIPCION</th>
						<th class="text-center">STOCK</th>
						<th class="text-center">BUY</th>

                        </tr>
                    </thead>
                    <tbody>

					<?php 
					if ($listaProducto != 0)
					{
					foreach($listaProducto as $rows){ ?>
                    
                        <tr class="text-center listaImagenes" >
							<!--  d-flex align-items-center justify-content-center-->
                                <td><div><?= $rows['codigoEstilo'] ?></div></td>
								<td><div><img width="100px" height="105px" src="<?php echo SERVERURL;?>img/imgProductos/<?= $rows['codigoEstilo'] ?>/main.jpeg" alt=""></div></td>
								<td ><div><?= $rows['nombreCategoria'] ?></div></td>
								<td><div><?= $rows['nombreColor'] ?></div></td>
								<td><div><?= $rows['nombreTela'] ?></div></td>
								<td><div><?= mainModel::formatDollar($rows['precioProducto']) ?></div></td>
								<td><div><?= $rows['descripcionProducto'] ?></div></td>
								<td>
									<div>
									<button style="font-size: 28px; color: #0384fc " class ="btn btn-info p-0" onclick="loadData(this.getAttribute('data-id'));" data-id="<?= $rows['idProducto'] ?>">
                                    	<i class="fas fa-clipboard-list fa-fw"></i>
                                    </button>
									</div>
                                </td>
								<td>
									<div>
									<a href="<?= SERVERURL ?>pages/admin/compras.php?prod=<?= $rows['idProducto'] ?>"  data-toggle="tooltip" title="Comprar Productos">
										<button style="font-size: 28px; " class ="btn btn-primary p-0">
											<i class="fa-solid fa-shopping-cart hover-shadow"></i>
										</button>
										</a>
										<!-- <a href="<?php //SERVERURL ?>pages/admin/compra-new?prod=<?php //$rows['idProducto'] ?>"  data-toggle="tooltip" title="Comprar Productos" style="margin-right:20px; text-decoration:none" >
										<i class="fa-solid fa-shopping-cart hover-shadow" style="font-size: 30px; color:#2B8288; " ></i>
										</a> -->
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

					<form class="form-neon FormularioAjax" action="<?php echo SERVERURL;?>ajax/productosAjax.php" method="POST" data-form= "save" autocomplete="off">
						<fieldset>
						<legend><i class="far fa-calendar-alt"></i> &nbsp; AGREGAR PRODUCTO</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6 mb-3">
									
										<label for="producto_categoria" class="bmd-label-floating">CATEGORIA <span class="Obligar">*</span></label>
										<select class="form-control" name="producto_categoria" id="producto_categoria" required>
											<option value="" selected="" disabled=""></option>
											<?php foreach($listaDatosCatalogos['categorias'] as $campo){ ?>
											<option value="<?php echo$campo['idCategoria'] ?>"><?php echo$campo['nombreCategoria'] ?></option>
											<?php }?>
										</select>
		
								</div>

								<div class="col-12 col-md-6 mb-3">
									
										<label for="producto_color" class="bmd-label-floating">COLOR <span class="Obligar">*</span></label>
										<select class="form-control" name="producto_color" id="producto_color" required>
											<option value="" selected="" disabled=""></option>
											<?php foreach($listaDatosCatalogos['colores'] as $campo){ ?>
											<option value="<?php echo$campo['idColor'] ?>"><?php echo$campo['nombreColor'] ?></option>
											<?php }?>
										</select>
		
								</div>

								<div class="col-12 col-md-6">
									
										<label for="producto_tela" class="bmd-label-floating">TELA <span class="Obligar">*</span></label>
										<select class="form-control" name="producto_tela" id="producto_tela" required>
											<option value="" selected="" disabled=""></option>
											<?php foreach($listaDatosCatalogos['tela'] as $campo){ ?>
											<option value="<?php echo$campo['idTela'] ?>"><?php echo$campo['nombreTela'] ?></option>
											<?php }?>
										</select>
		
								</div>
								
								<div class="col-12 col-md-6" title="Número entero o decimal(2 digitos decimales)">
									<div class="form-group">
										<label for="producto_precio" class="bmd-label-floating">PRECIO</label>
										<input type="number" class="form-control" name="producto_precio" id="producto_precio" maxlength="8" min="0" step="0.01" required>
									</div>
								</div>
								
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_descripcion" class="bmd-label-floating">DESCRIPCION</label>
										<input type="text" class="form-control" name="producto_descripcion" id="producto_descripcion" value="" maxlength="255" required>
									</div>
								</div>
						
						   </div>
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="main_pic" class="bmd-label-floating">Foto Principal</label>
										<input type="file" class="form-control" name="main_pic" id="main_pic" accept="image/*" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="frontPic" class="bmd-label-floating">Foto Frontal</label>
										<input type="file" class="form-control" name="frontPic" id="frontPic" accept="image/*">
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="backPic" class="bmd-label-floating">Foto de Espalda</label>
										<input type="file" class="form-control" name="backPic" id="backPic" accept="image/*">
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

			<?php
require_once "bottom.php" ;
?>
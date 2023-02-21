<?php 


   	?>
	<!-- Nav lateral -->
	<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					
					<?php if(isset($_SESSION['imagen-usuario_spm']) && !empty($_SESSION['imagen-usuario_spm'])){?>
						<img src="<?php echo SERVERURL.$_SESSION['imagen-usuario_spm']; ?>" class="img-fluid" alt="Avatar">
					<?php }else{ ?>
						<img src="<?php echo SERVERURL; ?>pages/admin/assets/avatar/avatarU.jpg" class="img-fluid" alt="Avatar">
					<?php } ?>

					<figcaption class="roboto-medium text-center">
						
							<?php  echo("Bienvenido ".$_SESSION['nombresEmpleado']);?> <br><small class="roboto-condensed-light">Administrador </small>
						
						
						
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
				<ul>
						<li>
							<a href="<?php echo SERVERURL; ?>pages/home.php"><i class="fas fa-regular fa-house-user"></i> &nbsp; HOME</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>pages/admin/lista-catalogos.php"><i class=" fas fa-light fa-folder"></i> &nbsp; CATALOGOS</i></a>	
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>pages/admin/productos.php"><i class=" fas fa-light fa-folder"></i> &nbsp; PRODUCTOS</i></a>	
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>pages/admin/compras.php"><i class=" fas fa-light fa-folder"></i> &nbsp; COMPRAS</i></a>	
						</li>
					
						
					</ul>
				</nav>
			</div>
		</section>
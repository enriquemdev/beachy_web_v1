<?php 
require_once "top.php" ;
?>

<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; GESTION CATALOGOS
				</h3>
				<p class="text-justify">
					<!-- COMENTARIO -->
				</p>
			</div>
			
			<!-- Content -->
            <div class="full-box tile-container">
                <a href="<?php echo SERVERURL; ?>pages/admin/catalogo-tallas.php" class="tile">
                    <div class="tile-tittle">TALLAS</div>
                    <div class="tile-icon">
                        <i class="fas fa-clipboard-list fa-fw"></i>

                    </div>
                </a>

				<a href="<?php echo SERVERURL; ?>pages/admin/catalogo-colores.php" class="tile">
                    <div class="tile-tittle">COLORES</div>
                    <div class="tile-icon">
                        <i class="fas fa-clipboard-list fa-fw"></i>

                    </div>
                </a>

				<a href="<?php echo SERVERURL; ?>pages/admin/catalogo-categorias.php" class="tile">
                    <div class="tile-tittle">CATEGORIAS</div>
                    <div class="tile-icon">
                        <i class="fas fa-clipboard-list fa-fw"></i>

                    </div>
                </a>

				<a href="<?php echo SERVERURL; ?>pages/admin/catalogo-telas.php" class="tile">
                    <div class="tile-tittle">TELAS</div>
                    <div class="tile-icon">
                        <i class="fas fa-clipboard-list fa-fw"></i>

                    </div>
                </a>

				<a href="<?php echo SERVERURL; ?>pages/admin/catalogo-departamentos.php" class="tile">
                    <div class="tile-tittle">DEPARTAMENTOS</div>
                    <div class="tile-icon">
                        <i class="fas fa-clipboard-list fa-fw"></i>

                    </div>
                </a>

				<a href="<?php echo SERVERURL; ?>pages/admin/catalogo-metodosPago.php" class="tile">
                    <div class="tile-tittle">METODOS DE PAGO</div>
                    <div class="tile-icon">
                        <i class="fas fa-clipboard-list fa-fw"></i>

                    </div>
                </a>
	
			</div>

			<?php
require_once "bottom.php" ;
?>
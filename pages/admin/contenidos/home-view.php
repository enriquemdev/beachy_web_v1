<?php 
		$auxiliar = new loginControlador();
		$listaVistas = $auxiliar -> navLateral_controlador();/*Aqui se recibe el array de la lista de la Vistas para este usuario*/
   	?>

<!-- Page header -->
<div class="full-box page-header">
        <h3 class="text-left">
            <i class="fab fa-dashcube fa-fw"></i> &nbsp; HOME
        </h3>
        <p class="text-justify">
            Bienvenido al sistema de control y gestion de clínica médica.
            Creado por:    
        -Br. Luis Manuel Matus. 
        -Br. Enrique José Muñoz.
        -Br. Manuel Salvador Espinoza Quiroz.  
        -Br. Marcos Antonio Duartes.
        -Br. Steven David Espinoza Ulloa.
        </p>

    </div>
   <!-- Content -->
   <div class="full-box tile-container">
       <div >
            <?php 
                    if(($_SESSION['name-cargo_spm'])=="Gerente"){
                    
					require_once "./controladores/dashboardControlador.php";
					$dashboard = new dashboardControlador();
					echo $dashboard->dashboard();
                } 

				    ?>
       </div>
   </div>
   
</div>



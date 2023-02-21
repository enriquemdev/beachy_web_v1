</section>
            </main>
            <?php 
                    include "inc/LogOut.php"; /* SE INCLUYE REFERENCIA A BOTON SALIR DE SISTEMA */
        
        include "inc/script.php"; /* SE INCLUYE REFERENCIA A SCRIPTS */
        ?>

<script>
				$(function(){
					//Clona la fila oculta que tiene los campos base y la agrega al final de la tabla
					$("#adicional").on('click', function(){
						$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
					});

					//Evento que selecciona la fila y la elimina
					$(document).on("click", ".eliminar", function(){
						var parent = $(this).parents().get(0);
						$(parent).remove();
					});
				});
			
			</script>
	
    <div style="display:none;" id="serverTi"><?php echo SERVERURL;?></div> <!--Esta etiqueta tiene en su cocntenido la constante de servidor de config/app-->	
</body>
</html>
<!-- COmienza BotMan -->
<script>
  var sesionIniciada = <?php echo json_encode($sesionIniciada); ?>;
  var sesionData = <?php echo json_encode($_SESSION); ?>;
  var direccionMAC = <?php echo json_encode($direccionMAC); ?>;

  //Si se inicio sesion entonces el id es el id del usuario en la bd, sino, es la direccion mac del dispositivo
  var idUsuario = sesionIniciada ? sesionData.idCliente : direccionMAC;
  
  console.log(idUsuario);
        var botmanWidget = {
            frameEndpoint: '../botman/chat.html',
            introMessage: 'Hola! Soy Yuniqua, la representante de servicio al cliente de la  tienda Beachy Nicaragua! Dime en que puedo ayudarte.',
            chatServer : '../botman/botman.php', 
            title: 'Agente Servicio al Cliente: Yuniqua',
            placeholderText: 'Escríbele un mensaje a la agente: Yuniqua',
            aboutText: '',
            aboutLink: '',
            userId: idUsuario,
            mainColor: '#3AF0F7',
            bubbleAvatarUrl: '../botman/yuniquaPP2.jpg'//https://img.freepik.com/premium-photo/female-customer-service-representative_13339-214435.jpg?w=2000
        }; 
    </script>
     <script src="../botman/widget.js"></script>
     
     <style>
      .desktop-closed-message-avatar {
        height: 100px !important;
        width: 100px !important;
        top: 8px !important;
      }


     </style>

      <!-- Parametro bot inicial -->
     <script>
        window.addEventListener('load', function(){
          botmanChatWidget.whisper('storeInfo123 '+sesionData.nombresCliente);
          botmanChatWidget.close();
        });
     </script>
<!-- Termina BotMan -->


<!-- FOOTER -->
<footer class=" text-center text-black" style="background-color: #3AF0F7;">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong onclick="//botmanChatWidget.whisper('storeInfo123 '+sesionData.nombresCliente);">Registrate en nuestra newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example29" class="form-control"/>
              <label class="form-label" for="form5Example29">Direccion de Correo Electronico</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-dark mb-4">
              Suscribete
            </button>
          </div>
          <!--Grid column-->
            <div class="col-auto" style="display: inline-flex ; gap: 12px;">
              <p class="pt-2">
                <li style="list-style:circle ; flex-direction: column;  " >
                <a href="contactanos.php" style=" color: black; text-decoration: none;" ><strong>Contáctanos</strong></a>
                </li>
                <li style="list-style:circle ; flex-direction: column;" >
                  <a href="preguntas.php" style=" color: black; text-decoration: none;" ><strong>Preguntas Frecuentes</strong></a>
                </li>
                <li style="list-style:circle ; flex-direction: column;" >
                  <a href="acerca.php" style=" color: black; text-decoration: none;" ><strong>Acerca de nosotros</strong></a>
                </li>
              </p>
            </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-black" href="https://mdbootstrap.com/">CODENAUT S.A.</a>
  </div>
  <!-- Copyright -->
</footer>


<?php
    require_once "../dependencias/js/scriptBody.php" ;
?>

</body>
</html>
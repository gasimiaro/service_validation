</div>
        </div>
    </div>
    
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12">
                <div class="player row">
                    
                    <div class="slider_container slider_music col-sm-5 col-md-4 col-lg-4">
                      <div class="h5">Copyright © Septembre 2023. SRSP Vakinakaratra.</div>
                    </div>
                   
                    
                </div>
              </div>
          </div>
        </div>
    </footer>
    <!-- Manao recherche agent --->
    
    <script>
      $(document).ready(function () {
        var immatriculeLength = 0;
        $("#immatricule").on('input', function() {
          var immatricule = $(this).val();
          var messageElement = $('#immatriculeMessage');
          var searchResults = $('#resultPage');
          var startPage = $('#startPage');

          immatriculeLength = immatricule.length; 
          var regex = /^[0-9]+$/;
          if (immatriculeLength === 0) {
            messageElement.text("");
            searchResults.hide();
            startPage.show();
          }else if (!regex.test(immatricule)) {
              messageElement.text("Immatricule doit contenir uniquement des chiffres");
              searchResults.hide();
          }else if(immatriculeLength === 6){
            messageElement.text("");
            searchResults.show();
            startPage.hide();
            console.log("hita");

            $.ajax({
              url: "<?php echo base_url()?>agentcontroller/searchAgent",
              data: { immatricule: immatricule },
              type: "POST",
              success: function(data) {
                // Afficher les résultats de la recherche
                searchResults.html(data);
                console.log("hita");
              },
              error: function(err) {
                // Afficher un message d'erreur
                $("#immatriculeMessage").html(err.responseText);
              }
            });
          }else {
              messageElement.text("Immatricule doit contenir 6 caractères");
              startPage.show();
              searchResults.hide(); 
          }
        })
      });
    </script>
    <!-- Manao recherche agent --->
    <!-- Footer END -->
  <script src="<?php echo base_url()?>/assets/js/title.js"></script>
	<script type='text/javascript' src='<?php echo base_url()?>assets/js/toaste.js'></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="<?php echo base_url()?>assets/template/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/template/js/bootstrap.min.js"></script>
    
    <!-- Appear JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/template/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/apexchartss.js"></script>
    <!-- Slick JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/smooth-scrollbar.js"></script>
    <!-- lottie JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/lottie.js"></script>
    <!-- am core JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/kelly.js"></script>
    <!-- am worldLow JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/worldLow.js"></script>
    <!-- Raphael-min JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/raphael-min.js"></script>
    <!-- Morris JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/morris.js"></script>
    <!-- Morris min JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/morris.min.js"></script>
    <!-- Flatpicker Js -->
    <script src="<?php echo base_url()?>assets/template/js/flatpickr.js"></script>
    <!-- highcharts JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/highcharts.js"></script>
    <script src="<?php echo base_url()?>assets/template/js/highcharts-3d.js"></script>
    <script src="<?php echo base_url()?>assets/template/js/highcharts-more.js"></script>
    <!-- Style Customizer -->
    <script src="<?php echo base_url()?>assets/template/js/style-customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <!-- <script src="<?php echo base_url()?>assets/template/js/chartCustom.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/chart-Customs.js"></script>

    <!-- Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/customs.js"></script>
    <!-- sweet alert JavaScript -->
    <script src="<?php echo base_url()?>assets/template/js/sweetAlert.js"></script>

  </body>
</html>
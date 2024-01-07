<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>
<script>
  var countFullTreat = <?php echo json_encode($countFullTreat); ?>;

  console.log("nombre bien traite : "+ countFullTreat);
  // console.log("bien traite : "+ countFullTreat1);

  </script>

<div id="resultPage"></div>

<div class="row" id="startPage">
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6>Demande reçue</h6>
              <span class="iq-icon"><i class="ri-information-fill"></i></span>
            </div>
            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
              <div class="iq-map text-primary font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
              <div class="d-flex align-items-center">
                  <h2><span class="counter" style="visibility: visible;">
                  <?php
                    if ($count<=9) {
                      echo '0'.$count;
                    }else {
                      echo $count;
                    } 
                     ?>
                  </span></h2>
                  <div class="rounded-circle iq-card-icon iq-bg-primary ml-3"> <i class="ri-inbox-fill"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  
  <!-- <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6>Année</h6>
              <span class="iq-icon"><i class="ri-information-fill"></i></span>
            </div>
            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
              <div class="iq-map text-danger font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
              <div class="d-flex align-items-center">
              <h2><span class="counter" style="visibility: visible;">
              <?php
              if ($countYear<=9) {
                echo '0'.$countYear;
              }else {
                echo $countYear;
              }
              ?>
              </span></h2>
                  <div class="rounded-circle iq-card-icon iq-bg-danger ml-3"><i class="ri-calendar-fill"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div> -->
 
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
            <h6>Demande En attente</h6>
            <span class="iq-icon"><i class="ri-information-fill"></i></span>
            </div>
            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                  <div class="iq-map text-danger font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                  <div class="d-flex align-items-center">
              <h2><span class="counter" style="visibility: visible;">
              <?php
              if ($countWait<=9) {
                echo '0'.$countWait;
              }else {
                echo $countWait;
              }
              ?>
              </span></h2>
              <div class="rounded-circle iq-card-icon iq-bg-danger ml-3"><i class="ion-alert"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-3">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
               <div class="d-flex align-items-center justify-content-between">
                  <h6>Avoir Anomalie</h6>
                  <span class="iq-icon"><i class="ri-information-fill"></i></span>
               </div>
               <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                  <div class="iq-map text-warning font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                  <div class="d-flex align-items-center">
                     <h2>
                        <span class="counter">
                           <?php echo 2; ?>
                        </span>
                     </h2>
                     <div class="rounded-circle iq-card-icon iq-bg-warning ml-3"><i class="ri-refund-line"></i></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
            <h6>Demande Traité</h6>
              <span class="iq-icon"><i class="ri-information-fill"></i></span>
            </div>
            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
              <div class="iq-map text-success font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
              <div class="d-flex align-items-center">
              <h2><span class="counter" style="visibility: visible;">
              <?php
              if ($countFullTreat<=9) {
                echo '0'.$countFullTreat;
              }else {
                echo $countFullTreat;
              }
              ?>
              </span></h2>
              <div class="rounded-circle iq-card-icon iq-bg-success ml-3"><i class="la la-check"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  <!-- Dans votre vue adminHome.php -->

  <!-- <div class="col-sm-6 col-lg-6">
    <div class="iq-card">
      <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
            <h4 class="card-title">Demade reçus par type de Budget</h4>
          </div>
      </div>
      <div class="iq-card-body">
          <div id="high-pie-chart"></div>
       
      </div>
    </div>
</div> -->
<!-- <div class="col-lg-6">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
              <h4 class="card-title">Demade reçus par mois</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div id="progress-chart-2"></div>
            <script>
                var numberPerMonthData = <?php echo json_encode($numberPerMonth); ?>;
            </script>
        </div>
    </div>
</div> -->


                <div class="col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title" style="display: inline-block;">Demande Par Mois  </h4>
                           <select class="form-control" id="year-filter-state">
                              <!-- <option selected="" disabled="">Select your age</option> -->
                           
                            </select>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div id="apex-column"></div>
                        <script>
                            
                            var statCompleteValidation = <?php echo json_encode($statCompleteValidation); ?>;
                            var statPendingValidation = <?php echo json_encode($statPendingValidation); ?>;
                            var statePerMonthYear = new Date().getFullYear();
                            


                            //graph par type de budget par annee
                            var countValidationsByYear = <?php echo json_encode($countValidationsByYear); ?>;
                            var countValidationsBG = <?php echo json_encode($countValidationsBG); ?>;
                            var countValidationsBA = <?php echo json_encode($countValidationsBA); ?>;
                            var countValidationsBABG = <?php echo json_encode($countValidationsBABG); ?>;


                            // console.log("statePerMonthYear: "+statePerMonthYear)
                            // console.log("BA : "+numberBAPerYearData)
                            // console.log("BABG : "+numberBAGPerYearData)
                            // console.log("countValidationsByYear: "+JSON.stringify(countValidationsByYear))
                            // console.log("countValidationsBG: "+JSON.stringify(countValidationsBG))
                            // console.log("countValidationsBA: "+JSON.stringify(countValidationsBA))
                            // console.log("countValidationsBABG: "+JSON.stringify(countValidationsBABG))



                          </script>
                     </div>
                  </div>
               </div>


               <div class="col-lg-6">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                              <h4 class="card-title"> Demande Par Cas Existe</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="am-3dpie-chart" style="height: 365px;"></div>
                            
                            
                        </div>
                            <script>
                              //numberPerCasExist.map(item => item.nombre)
                              var numberPerCasExist = <?php echo json_encode($numberPerCasExist); ?>;
                            </script>
                        
                      </div>
                </div>


               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Demande chaque année par Type de Budget</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">

                     
                        <div id="high-basicline-chart"></div>
                     </div>
                  </div>
               </div>



  <!-- <div class="col-lg-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center">
          <div class="iq-header-title">
              <h4 class="card-title" id="test">Comptable</h4>
            
               
          </div>
          <div id="feature-album-slick-arrow" class="slick-aerrow-block"></div>
        </div>
        <div class="iq-card-body">
          <ul class="list-unstyled row  feature-album iq-box-hover mb-0">
          <?php
          //  foreach ($comptable as $comptab){ 
          //   $imat = $comptab->imUser; 
          //   $nom = $comptab->nom; 
          //   $prenom = $comptab->prenom; 
          //   $image = $comptab->photo; 
          //   $fonction = $comptab->fonction; 
          //   $statut = $comptab->statut; 

          //   if ($image != "") {
          //       $imageUrl = base_url() . 'assets/template/images/user/' . $image;
          //   } else {
          //   $imageUrl = base_url() . 'assets/template/images/user/whatsapp-dp-for-boys.webp';
          //   }

          ?>
              <li class="col-lg-6  iq-music-box">
                <div class="iq-card mb-0">
                    <div class="iq-card-body p-0">
                      <div class="iq-thumb">
                          <div class="iq-music-overlay"></div>
                          <a href="#">
                            <img src="<?php echo $imageUrl; ?>" class="img-border-radius img-fluid w-100" alt="" style="width: 110px;height:150px">
                          </a>
                          <div class="overlay-music-icon">
                            <form action="<?php echo base_url(); ?>userdetailspagecontroller/userDetails" method="post">
                                <input type="hidden" name="imatComptable" id="" value="<?php echo $imat; ?>">
                                <button type="submit" style="display: inline-block; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;">
                                    <i class="las la-eye"></i>
                                </button>
                            </form>
                          </div>
                      </div>
                      <div class="feature-list text-center">
                          <h6 class="font-weight-600 mb-0"><?php echo $prenom; ?></h6>
                          <p class="mb-0">IM: <?php echo $imat; ?></p>
                      </div>
                    </div>
                </div>
              </li>
          <?php 
        // } 
        ?>
          </ul>
        </div>
    </div>
  </div> -->

</div>
          <script>
 

// Attendre que le document soit prêt
$(document).ready(function () {

      document.getElementById('adminHome').classList.add("active");

    // Obtenez l'élément select
    var yearFilterState = document.getElementById('year-filter-state');

    // Obtenez l'année actuelle
    var currentYear = new Date().getFullYear();

    // Boucle pour ajouter des options au menu déroulant
    for (var year = currentYear; year >= 2000; year--) {
        var option = document.createElement('option');
        option.value = year;
        option.text = year;
        yearFilterState.add(option);
    }

    // Sélectionnez par défaut l'option "Select your age"
    yearFilterState.selectedIndex = 0;


    // Sélectionner l'élément select par son ID
    var yearFilterState = $('#year-filter-state');
    var myChart = $('#apex-column');


    // Attacher un gestionnaire d'événements au changement de valeur du select
    yearFilterState.change(function () {
        // Récupérer la valeur sélectionnée
        var selectedYearRange = $(this).val();

        // Faire la requête Ajax avec la valeur sélectionnée
        $.ajax({
            type: 'POST', // ou 'GET' selon vos besoins
            url: '<?php echo base_url("adminpagecontroller/filterGraphStateValidation"); ?>' , // Append form data to the URL
            data: { selectedYearRange: selectedYearRange }, // Les données que vous souhaitez envoyer au script PHP
            dataType: 'json',

            success: function (response) {
                // Traitement de la réponse (ce que vous voulez faire avec les données renvoyées par le script PHP)
// console.log(myChart);
                chart.updateSeries([{
                    data: response.statPendingValidation
                }, {
                    data: response.statCompleteValidation
                }]);
                chart.updateOptions({
                    yaxis: {
                        title: {
                            text: 'Nombre de demandes en ' + selectedYearRange
                        }
                    }
                });


                // console.log(response.statCompleteValidation);
                // console.log(response.statPendingValidation);

            },
            error: function (error) {
                // Gestion des erreurs
                console.error('Erreur de requête Ajax :', error);
            }
        });
    });
});


            </script>
<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>

<div id="resultPage"></div>

<div class="row" id="startPage">
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6>Demade reçus</h6>
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
                  <div class="rounded-circle iq-card-icon iq-bg-primary ml-3"> <i class="ri-device-line"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  
  <div class="col-sm-6 col-md-6 col-lg-3">
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
  </div>
 
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6>En attente</h6>
              <span class="iq-icon"><i class="ri-information-fill"></i></span>
            </div>
            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
              <div class="iq-map text-info font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
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
                  <div class="rounded-circle iq-card-icon iq-bg-info ml-3"><i class="ri-information-fill h2"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6>Traitée </h6>
              <span class="iq-icon"><i class="ri-information-fill"></i></span>
            </div>
            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
              <div class="iq-map text-success font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
              <div class="d-flex align-items-center">
              <h2><span class="counter" style="visibility: visible;">
              <?php
              if ($countTraite<=9) {
                echo '0'.$countTraite;
              }else {
                echo $countTraite;
              }
              ?>
              </span></h2>
                  <div class="rounded-circle iq-card-icon iq-bg-success ml-3"><i class="ri-check-line h1"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  <!-- Dans votre vue adminHome.php -->

  <div class="col-sm-6 col-lg-6">
    <div class="iq-card">
      <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
            <h4 class="card-title">Demade reçus par type de Budget</h4>
          </div>
      </div>
      <div class="iq-card-body">
          <div id="high-pie-chart"></div>
          <script>
            // Stocker les données dans une variable JavaScript
            var numberBGPerYearData = <?php echo json_encode($numberBG); ?>;
            var numberBAPerYearData = <?php echo json_encode($numberBA); ?>;
            var numberBAGPerYearData = <?php echo json_encode($numberBAG); ?>;
          </script>
      </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
              <h4 class="card-title">Demade reçus par mois</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div id="progress-chart-2"></div>
            <script>
                // Stocker les données dans une variable JavaScript
                var numberPerMonthData = <?php echo json_encode($numberPerMonth); ?>;
            </script>
        </div>
    </div>
</div>


<div class="col-lg-5">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Demande Par Mois</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div id="apex-column"></div>
                     </div>
                  </div>
               </div>
<div class="col-lg-7">
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



  <div class="col-lg-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center">
          <div class="iq-header-title">
              <h4 class="card-title" id="test">Comptable</h4>
            
               
          </div>
          <div id="feature-album-slick-arrow" class="slick-aerrow-block"></div>
        </div>
        <div class="iq-card-body">
          <ul class="list-unstyled row  feature-album iq-box-hover mb-0">
          <?php foreach ($comptable as $comptab){ 
            $imat = $comptab->imUser; 
            $nom = $comptab->nom; 
            $prenom = $comptab->prenom; 
            $image = $comptab->photo; 
            $fonction = $comptab->fonction; 
            $statut = $comptab->statut; 

            if ($image != "") {
                $imageUrl = base_url() . 'assets/template/images/user/' . $image;
            } else {
            $imageUrl = base_url() . 'assets/template/images/user/whatsapp-dp-for-boys.webp';
            }

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
          <?php } ?>
          </ul>
        </div>
    </div>
  </div>

</div>
          <script>
              document.getElementById('adminHome').classList.add("active");
            </script>
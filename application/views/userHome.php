<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
    // css
?>


<div class="row" id="startPage">
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6><a href="<?php echo base_url(); ?>index.php/backend/receivedValidationPage" class="btn" id="allButton">Demade reçus</a></h6>
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
            //   if ($countYear<=9) {
            //     echo '0'.$countYear;
            //   }else {
            //     echo $countYear;
            //   }
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
              <h6><a href="#pendingList" class="btn" id="pendingButton" >En attente</a></h6>
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
                        
                        <?php
                            if ($countIncompleteTreat<=9) {
                              echo '0'.$countIncompleteTreat;
                            }else {
                              echo $countIncompleteTreat;
                            }
                            ?>
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
              <h6><a href="<?php echo base_url(); ?>index.php/backend/InfoValidationPage" class="btn" id="completeButton">Traitée</a>  </h6>
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
              <div class="rounded-circle iq-card-icon iq-bg-success ml-3"><i class="la la-check"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>


  <div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
              <h4 class="card-title">Liste des Demandes</h4>

              
              <script>
                $("#uname").on('input', function() {
                    var corps = $(this).val();
                    $("#val").removeClass("valid-feedback");
                    $('#val').text("");
                    $("#inval").addClass("invalid-feedback");
                    $('#inval').text("tsy mety");
                    if (corps.length === 4) {
                        
                        $('#form').addClass("was-validated");
                        $("#val").addClass("valid-feedback");
                        $('#val').text("Mety");
                        $("#inval").removeClass("invalid-feedback");
                        $('#inval').text("");
                        document.getElementById("val").style.display = "block";
                        document.getElementById("inval").style.display = "block";
                    }
                });
              </script>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">
            <div class="btn-group">
              <a href="#pendingList" class="btn btn-danger" id="pendingButton" >En attente</a>
            </div> 
              
          </div>
        </div>
        <div class="iq-card-body" id="pendingList">
          <div class="table-responsive">
              
              <table id="Pending" class="data-tables table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th></th>
                    <th>N°Dossier</th>
                    <th id="imPendig">Immatricule</th>
                    <th>Nom et Prenom</th>
                    <th>Cas</th>
                    <th>Budget</th>
                    <th>Date Arrivée</th>
                    <th>Observation</th>
                    <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($pendingValidation as $validation){ 
                      $numDossier = $validation->numDossier;
                      $immatricule = $validation->immatricule;
                      $nom = $validation->NOM;
                      $prenom = $validation->PRENOMS;
                      $duDateVal = $validation->DuDateValidation;
                      $auDateVal = $validation->AuDateValidation;
                      $cas = $validation->Cas; 
                      $typeBudget = $validation->typeBudget;
                      $dateArrive = $validation->dateArrive;
                      $comImmatricule = $validation->comptable;
                      $comPrenom = $validation->prenom;
                      $state = 'pending';


                      $elemDate = explode("-", $dateArrive);
                      $dateArrives = implode("-", array_reverse($elemDate));

                      if ($duDateVal == "" && $auDateVal == "") {
                        $statut = '<span class="badge badge-danger">En attente</span>';
                      }
                      else{
                        $statut = '<span class="badge badge-success">Traitée</span>';
                      }
                      
                    ?>
                    <tr>
                      <td></td>
                      <td><?php echo $numDossier; ?></td>
                        <td><?php echo $immatricule; ?></td>
                        <td><?php echo $nom.' '.$prenom; ?></td>
                        <td>
                          <p class="mb-0"><?php echo $cas; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $typeBudget; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $dateArrives; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $statut; ?></p>
                        </td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <!-- <a class="bg-primary validateButton" data-toggle="tooltip"  title="" data-original-title="Valider" id="validationButton" onclick="updateValueCasBG('<?php echo $cas; ?>')"><i class="ri-pencil-line" style="width:750%"></i></a> -->
                            <input type="hidden" value="<?php echo $state; ?>" name="state" id="state<?php echo $immatricule; ?>">

                            <input type="hidden" value="<?php echo $cas; ?>" name="Cas" id="Cas<?php echo $immatricule; ?>">
                                        <a class="bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" style="cursor:pointer" id="<?php echo $immatricule; ?>" onclick="traitement('<?php echo $immatricule; ?>')"><i class="ri-pencil-line"></i></a>
                            <a class="bg-link text-info" data-toggle="tooltip"  title="" data-original-title="Affiche" ><i class="fa fa-eye" ></i></a>
                          </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>

<?php  include(APPPATH.'views/treatementValidation.php'); ?>


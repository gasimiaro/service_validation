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
                  <div class="rounded-circle iq-card-icon iq-bg-success ml-3"><i class="ri-check-line h1"></i></div>
              </div>
            </div>
        </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h6><a href="#pendingList" class="btn" id="pendingButton" >En attente</a></h6>
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
                  <div class="rounded-circle iq-card-icon iq-bg-info ml-3"><i class="ion-alert h2"></i></div>
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
                            <a class="bg-primary validateButton" data-toggle="tooltip"  title="" data-original-title="Valider" id="validationButton" onclick="updateValueCasBG('<?php echo $cas; ?>')"><i class="ri-pencil-line" style="width:750%"></i></a>
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

<div class="row" id="validationPage" style=" display:none">
    <div class="col-sm-12 col-lg-12">
        <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Validation de demande</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div id="form-wizard1" id="validationInput" class="text-center mt-4">
                <ul id="top-tab-list" class="p-0">
                    <li class="active" id="account">
                        <a href="javascript:void();">
                            <i class="ri-check-fill"></i><span>Validation</span>
                        </a>
                    </li>
                    <li id="personal">
                        <a href="javascript:void();">
                            <i class="ri-award-fill"></i><span>Titularisation</span>
                        </a>
                    </li>
                    <li id="payment">
                        <a href="javascript:void();">
                        <i class="ri-terminal-window-line"></i><span id="stepHeader"></span>
                        </a>
                    </li>
                    <li id="confirm">
                        <a href="javascript:void();">
                            <i id="iconVeille" ></i><span id="veuille">Veille d'Integration</span>
                        </a>
                    </li>
                </ul>
                <!-- fieldsets -->
                <form class="was-validated" action="<?php echo base_url(); ?>index.php/backend/traiteValidation" method="post">
                    
                        
                    <fieldset>
                        <div class="form-card">
                        <div class="row text-left">
                            <div class="col-7">
                                <h3 class="mb-4">Information sur la Validation:</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps" id="step1">Etape 1 - 4</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6">
                                
                                <input type="hidden" name="immatricule" id="imInptut">
                                <input type="hidden" name="cas" id="casInptut">
                                <div class="form-group">
                                    <label>POSTE DE TRAVAIL: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="poste" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DIRECTION DE TRAVAIL: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">D</span>
                                        </div>
                                        <input type="text" class="form-control" name="direction" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>DATE DE VALIDATION: *</label>
                                    <button type="button" id="btnValM" class="btn btn-primary mb-1"><i class="fa fa-minus pr-0"></i></button>
                                    <button type="button" id="btnValP" class="btn btn-primary mb-1"><i class="fa fa-plus pr-0"></i></button>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">DU</span>
                                        </div>
                                        <input type="date" name="duDateValidation1" class="form-control" id="" value=" ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">AU</span>
                                        </div>
                                        <input type="date" name="auDateValidation1" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>DATE RETARD DU VALIDATION: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">DU</span>
                                        </div>
                                        <input type="date" name="duDateRetard" class="form-control" id="exampleInputdate">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">AU</span>
                                        </div>
                                        <input type="date" name="auDateRetard" class="form-control" id="exampleInputdate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card ">
                        <div class="row text-left">
                            <div class="col-7">
                                <h3 class="mb-4">Information sur la Tutilarisation:</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps" id="step2">Etape 2 - 4</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>INTEGRE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">i</span>
                                        </div>
                                        <input type="text" class="form-control" name="integre" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DATE D'INTEGRATION: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">D</span>
                                        </div>
                                        <input type="date" name="dateIntegration" class="form-control" id="exampleInputdate">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>CORPS: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="corpsIntegration" id="corpsIntegration" required placeholder="">
                                        <div id="verification"></div>
                                        
                                        <div id="default" class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>GRADE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="gradeIntegration" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>INDICE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="indiceIntegration" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>CATEGORIE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="categIntegration" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card ">
                        <div class="row text-left">
                            <div class="col-7">
                                <h3 class="mb-4" id="titleStep3"></h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps" id="step3"></h2>
                            </div>
                        </div>
                        <div class="row" id="infoPriseService">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DATE DU PRISE DE SERVICE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">D</span>
                                        </div>
                                        <input type="date" name="datePriseService" class="form-control" id="exampleInputdate">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CORPS: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">C</span>
                                        </div>
                                        <input type="text" class="form-control" name="corpsPriseService" id="corpsPriseService" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GRADE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="gradePriseService" id="gradePriseService" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INDICE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="indicePriseService" id="indicePriseService" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CATEGORIE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="categPriseService" id="categPriseService" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="infoTransfertCNaPS">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>DATE DE TRANSFERT CNaPS: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">DU</span>
                                        </div>
                                        <input type="date" name="duDateCNaPS" class="form-control" id="exampleInputdate" value=" ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">AU</span>
                                        </div>
                                        <input type="date" name="auDateCNaPS" class="form-control" id="exampleInputdate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>MONTANT CNaPS: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">C</span>
                                        </div>
                                        <input type="text" class="form-control" name="Montant" id="Montant" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="button" name="next" id="buttonStep3" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                        <button type="button" data-toggle="modal" id="openModalStep3" data-target="#myModal" class="btn btn-primary float-right">Valider </button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                    
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4 text-left">Information sur la Veille d'Integration:</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Etape 4 - 4</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DATE DU VEILLE D'INTEGRATION: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">D</span>
                                        </div>
                                        <input type="date" name="dateVeilleIntegre" class="form-control" id="exampleInputdate">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CORPS: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="corpsVeilleIntegre" id="corpsVeilleIntegre" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GRADE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="gradeVeilleIntegre" id="gradeVeilleIntegre" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>INDICE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="indiceVeilleIntegre" id="indiceVeilleIntegre" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CATEGORIE: *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">P</span>
                                        </div>
                                        <input type="text" class="form-control" name="categVeilleIntegre" id="categVeilleIntegre" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right">Valider </button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                        </div>
                    </fieldset>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-boxe">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voullez-vous l'inserer ?</p>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                        <button type="submit" class="btn btn-primary">OUI</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    
    $("#corpsIntegration").on('input', function() {
        var corpsIntegration = $(this).val();
        
        if (corpsIntegration.length === 0){
            
            $("#verification").addClass("invalid-feedback");
            $('#verification').text("cette input doit contenir 4 caracteres");
        }else if(corpsIntegration.length === 4){
            $("#verification").addClass("valid-feedback");
            $('#verification').text("Corps bien existe");
            
            /*$.ajax({
                      type: 'POST',
                      url: '<?php echo base_url(); ?>index.php/backend/searchCorps',
                      data: { corpsIntegration: corpsIntegration },
                      dataType: 'json',
                      success: function(response) {
                        if (response.exists) {
                          
                          $("#accept").addClass("valid-feedback");
                          if (indiceTitularisation.length === 4) {
                            $("#accept").addClass("valid-feedback");
                            $('#accept').text("Corps bien existe");
                          }
                        } else {
                            $("#refuse").addClass("invalid-feedback");
                            $('#refuse').text("Corps n'existe pas");
                            $("#accept").removeClass("valid-feedback");
                            $('#accept').text("");
                          if (indiceTitularisation.length === 4) {
                            $("#refuse").addClass("invalid-feedback");
                            $('#refuse').text("Corps n'existe pas");
                            $("#accept").removeClass("valid-feedback");
                            $('#accept').text("");
                        }
                        }
                      }
            });*/
        }else if(corpsIntegration.length === 4){
            $("#verification").addClass("invalid-feedback");
            $('#verification').text("n'existe pas");
        }
    });
</script>

<script>
    function updateValueCasBG(value) {
    const startPage = document.getElementById('startPage');
    const validationPage = document.getElementById('validationPage');
    const casInput = document.getElementById('casInptut');
    
   

    var currentValue = casInput.value;
    casInput.value = value;
        if (casInput.value !== "") {
            
            startPage.style.display = 'none';
            validationPage.style.display = 'block';
            if(casInput.value === "EFA"){
                $('#validationPage span[id="stepHeader"]').text("Prise de Service");
                $('#validationPage h3[id="titleStep3"]').text("Information sur le Prise de Service:");
                $('#validationPage h2[id="step1"]').text("Etape 1 - 4");
                $('#validationPage h2[id="step2"]').text("Etape 2 - 4");
                $('#validationPage div[id="infoPriseService"]').show();
                $('#validationPage div[id="infoTransfertCNaPS"]').hide();
                $('#validationPage button[id="openModalStep3"]').hide();
                $('#validationPage button[id="buttonStep3"]').show();
                $('#validationPage i[id="iconVeille"]').show();
                $('#validationPage span[id="veuille"]').show();
                $('#validationPage i[id="iconVeille"]').addClass("ri-terminal-window-line");
                $('#validationPage button[id="btnValM"]').hide();
                $('#validationPage button[id="btnValP"]').hide();

                document.querySelector('#Montant').required = false;
            }else{
                $('#validationPage span[id="stepHeader"]').text("Transfert CNaPS");
                $('#validationPage h3[id="titleStep3"]').text("Information sur le Transfer CNaPS:");
                $('#validationPage h2[id="step1"]').text("Etape 1 - 3");
                $('#validationPage h2[id="step2"]').text("Etape 2 - 3");
                $('#validationPage h2[id="step3"]').text("Etape 3 - 3");
                $('#validationPage div[id="infoTransfertCNaPS"]').show();
                $('#validationPage div[id="infoPriseService"]').hide();
                $('#validationPage button[id="openModalStep3"]').show();
                $('#validationPage button[id="buttonStep3"]').hide();
                $('#validationPage span[id="veuille"]').hide();
                $('#validationPage i[id="iconVeille"]').addClass("ri-terminal-windows-line bg-secondary");
                $('#validationPage button[id="btnValM"]').show();
                $('#validationPage button[id="btnValP"]').show();

                document.querySelector('#corpsPriseService').required = false;
                document.querySelector('#gradePriseService').required = false;
                document.querySelector('#indicePriseService').required = false;
                document.querySelector('#categPriseService').required = false;
                document.querySelector('#corpsVeilleIntegre').required = false;
                document.querySelector('#gradeVeilleIntegre').required = false;
                document.querySelector('#indiceVeilleIntegre').required = false;
                document.querySelector('#categVeilleIntegre').required = false;

                
            }
        }else if (casInput.value === "") {
            startPage.style.display = 'block';
            validationPage.style.display = 'none';
        }
    }
</script>

<script>
    $('.validateButton').click(function() {

        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        var immatricule = row.find('td:eq(1)').text();


        $('#validationPage input[name="immatricule"]').val(immatricule);
    });
</script>
          
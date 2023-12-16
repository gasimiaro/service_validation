<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>
<div class="row" id="startPage">
  <div class="col-sm-6 col-md-6 col-lg-3">
      <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h6><a href="#allList" class="btn" id="allButton">Demade reçus</a></h6>
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
              <h6><a href="<?php echo base_url(); ?>index.php/backend/infoValidationPage" class="btn" id="completeButton" >Traitée</a> </h6>
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
                <h6><a href="<?php echo base_url(); ?>index.php/backend/UserPageHome" class="btn" id="pendingButton">En attente</a> </h6>

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
          </div>

          <div class="iq-card-header-toolbar d-flex align-items-center">
            <form action="<?php echo base_url(); ?>index.php/backend/Data_export" method="post">
                <button type="submit">test</button>
            </form>
              <a href="#allList" class="btn btn-link" id="allButton" >Tous les Demandes</a>
             
              
          </div>
        </div>
        <div class="iq-card-body" id="allList">
          <div class="table-responsive">
              <table id="Complete" class="data-tables table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th id="imComplete">Immatricule</th>
                        <th>Nom et Prenom</th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th>Cas</th>
                        <th>Budget</th>
                        <th>Date Arrivée</th>
                        <th>Observation</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($validationData as $validation) {
                    $immatricule = $validation->immatricule;
                    $Poste = $validation->Poste;
                    $Direction = $validation->Direction;
                    $duDateValidation = $validation->DuDateValidation;
                    $auDateValidation = $validation->AuDateValidation;
                    $duDateRetard = $validation->DuDateRetard;
                    $auDateRetard = $validation->AuDateRetard;
                    $Cas = $validation->Cas;
                    $typeBudget = $validation->typeBudget;
                    $dateArrive = $validation->dateArrive;
                    $elemDate = explode("-", $dateArrive);
                    $dateArrives = implode("-", array_reverse($elemDate));

                    $nom = $validation->NOM;
                    $prenom = $validation->PRENOM;

                    $integre = $validation->integration;
                    $dateTitularisation = $validation->dateTitularisation;
                    $corpsTitularisation = $validation->corpsTitularisation;
                    $gradeTitularisation = $validation->gradeTitularisation;
                    $indiceTitularisation = $validation->indiceTitularisation;
                    $categorieTitularisation = $validation->categorieTitularisation;

                    $datePriseService = $validation->datePriseService;
                    $corpsPriseService = $validation->corpsPriseService;
                    $gradePriseService = $validation->gradePriseService;
                    $indicePriseService = $validation->indicePriseService;
                    $categoriePriseService = $validation->categoriePriseService;

                    $dateVeilleIntegration = $validation->dateVeilleIntegration;
                    $corpsVeilleIntegration = $validation->corpsVeilleIntegration;
                    $gradeVeilleIntegration = $validation->gradeVeilleIntegration;
                    $indiceVeilleIntegration = $validation->indiceVeilleIntegration;
                    $categorieVeilleIntegration = $validation->categorieVeilleIntegration;

                    
                    $duDateCNaPS = $validation->duDateCNaPS;
                    $auDateCNaPS = $validation->auDateCNaPS;
                    $Montant = $validation->Montant;

                    if ($duDateValidation == "" && $auDateValidation == "") {
                        $statut = '<span class="badge badge-danger">En attente</span>';
                        $editButton = '<a class="bg-info validation-dataButton" data-toggle="tooltip"  title="" data-original-title="Modifier" id="editvalidationButton" onclick="updateValueCasBG('.$Cas.')"><i class="ri-pencil-line" style="width:750%"></i></a>';
                      }
                      else{
                        $statut = '<span class="badge badge-success">Traitée</span>';
                        $editButton = '<a class="bg-primary update-dataButton" data-toggle="tooltip"  title="" data-original-title="Modifier" id="editvalidationButton" onclick="updateValueCasBG('.$Cas.')"><i class="ri-pencil-line" style="width:750%"></i></a>';

                      }
                    
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $immatricule; ?></td>
                        <td><?php echo $nom.' '.$prenom; ?></td>
                        <td hidden><?php echo $Poste ;?></td>
                        <td hidden><?php echo $Direction ;?></td>
                        <td hidden><?php echo $duDateValidation ;?></td>
                        <td hidden><?php echo $auDateValidation ;?></td>
                        <td hidden><?php echo $duDateRetard ;?></td>
                        <td hidden><?php echo $auDateRetard ;?></td>

                        <td hidden><?php echo $integre ;?></td>
                        <td hidden><?php echo $dateTitularisation ;?></td>
                        <td hidden><?php echo $corpsTitularisation ;?></td>
                        <td hidden><?php echo $gradeTitularisation ;?></td>
                        <td hidden><?php echo $indiceTitularisation ;?></td>
                        <td hidden><?php echo $categorieTitularisation ;?></td>
                        
                        <td hidden><?php echo $datePriseService ;?></td>
                        <td hidden><?php echo $corpsPriseService ;?></td>
                        <td hidden><?php echo $gradePriseService ;?></td>
                        <td hidden><?php echo $indicePriseService ;?></td>
                        <td hidden><?php echo $categoriePriseService ;?></td>

                        <td hidden><?php echo $dateVeilleIntegration; ?></td>
                        <td hidden><?php echo $corpsVeilleIntegration; ?></td>
                        <td hidden><?php echo $gradeVeilleIntegration; ?></td>
                        <td hidden><?php echo $indiceVeilleIntegration; ?></td>
                        <td hidden><?php echo $categorieVeilleIntegration; ?></td>

                        <td hidden><?php echo $duDateCNaPS; ?></td>
                        <td hidden><?php echo $auDateCNaPS; ?></td>
                        <td hidden><?php echo $Montant; ?></td>
                        <td>
                          <p class="mb-0"><?php echo $Cas; ?></p>
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
                            <?php if ($duDateValidation == "" && $auDateValidation == "") { ?>
                                <a class="bg-info update-dataButton" data-toggle="tooltip"  title="" data-original-title="Modifier" id="editvalidationButton" onclick="updateValueCasBG('<?php echo $Cas; ?>')"><i class="ri-pencil-line" style="width:750%"></i></a>
                            <?php } else{ ?>
                                <a class="bg-primary update-dataButton" data-toggle="tooltip"  title="" data-original-title="Modifier" id="editvalidationButton" onclick="updateValueCasBG('<?php echo $Cas; ?>')"><i class="ri-pencil-line" style="width:750%"></i></a>
                            <?php } ?>
                            
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
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

<div class="row" id="validationUpdatePage" style=" display:none">
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
                        <i class="ri-terminal-window-line"></i><span id="stepHeader">Prise de Service</span>
                        </a>
                    </li>
                    <li id="confirm">
                        <a href="javascript:void();">
                            <i id="iconVeille" ></i><span id="veuille">Veille d'Integration</span>
                        </a>
                    </li>
                </ul>
                <!-- fieldsets -->
                <form class="was-validated" action="<?php echo base_url(); ?>index.php/backend/updateValidation" method="post">
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
                                
                                <input type="text" name="immatricule" id="imInptut">
                                <input type="text" name="cas" id="casInptut">
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
                                        <input type="date" name="duDateValidation1" class="form-control" id="exampleInputdate">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">AU</span>
                                        </div>
                                        <input type="date" name="auDateValidation1" class="form-control" id="exampleInputdate" >
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
                                        <input type="date" name="dateTitularisation" class="form-control" id="exampleInputdate">
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
                                        <input type="text" class="form-control" name="corpsTitularisation" required placeholder="">
                                        <div class="valid-feedback">Remplit.</div>
                                        <div class="invalid-feedback">Veillez remplir le champ.</div>
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
                                        <input type="text" class="form-control" name="gradeTitularisation" required placeholder="">
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
                                        <input type="text" class="form-control" name="indiceTitularisation" required placeholder="">
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
                                        <input type="text" class="form-control" name="categTitularisation" required placeholder="">
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
                                    <h2 class="steps" id="step3">Etape 3 - 4</h2>
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
                                            <input type="text" class="form-control" id="corpsPriseService" name="corpsPriseService" required placeholder="">
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
                                            <input type="text" class="form-control" id="gradePriseService" name="gradePriseService" required placeholder="">
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
                                            <input type="text" class="form-control" id="indicePriseService" name="indicePriseService" required placeholder="">
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
                                            <input type="text" class="form-control" id="categPriseService" name="categPriseService" required placeholder="">
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
                        
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right" >Valider </button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                        </div>
                    </fieldset>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voullez-vous le Modifier ?</p>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                        <button type="submit" class="btn btn-danger">OUI</button>
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
    function updateValueCasBG(value) {
    const startPage = document.getElementById('startPage');
    const validationPage = document.getElementById('validationPage');
    const casInput = document.getElementById('casInptut');
    
   

    var currentValue = casInput.value;
    casInput.value = value;
        if (casInput.value !== "") {
            
            if(casInput.value === "EFA"){
                $('#validationUpdatePage span[id="stepHeader"]').text("Prise de Service");
                $('#validationUpdatePage h3[id="titleStep3"]').text("Information sur le Prise de Service:");
                $('#validationUpdatePage h2[id="step1"]').text("Etape 1 - 4");
                $('#validationUpdatePage h2[id="step2"]').text("Etape 2 - 4");
                $('#validationUpdatePage div[id="infoPriseService"]').show();
                $('#validationUpdatePage div[id="infoTransfertCNaPS"]').hide();
                $('#validationUpdatePage button[id="openModalStep3"]').hide();
                $('#validationUpdatePage button[id="buttonStep3"]').show();
                $('#validationUpdatePage i[id="iconVeille"]').show();
                $('#validationUpdatePage span[id="veuille"]').show();
                $('#validationUpdatePage i[id="iconVeille"]').addClass("ri-terminal-window-line");
                $('#validationUpdatePage button[id="btnValM"]').hide();
                $('#validationUpdatePage button[id="btnValP"]').hide();

                document.querySelector('#Montant').required = false;
            }else{
                $('#validationUpdatePage span[id="stepHeader"]').text("Transfert CNaPS");
                $('#validationUpdatePage h3[id="titleStep3"]').text("Information sur le Transfer CNaPS:");
                $('#validationUpdatePage h2[id="step1"]').text("Etape 1 - 3");
                $('#validationUpdatePage h2[id="step2"]').text("Etape 2 - 3");
                $('#validationUpdatePage h2[id="step3"]').text("Etape 3 - 3");
                $('#validationUpdatePage div[id="infoTransfertCNaPS"]').show();
                $('#validationUpdatePage div[id="infoPriseService"]').hide();
                $('#validationUpdatePage button[id="openModalStep3"]').show();
                $('#validationUpdatePage button[id="buttonStep3"]').hide();
                $('#validationUpdatePage span[id="veuille"]').hide();
                $('#validationUpdatePage i[id="iconVeille"]').addClass("ri-terminal-windows-line bg-secondary");
                $('#validationUpdatePage button[id="btnValM"]').show();
                $('#validationUpdatePage button[id="btnValP"]').show();

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
    $('.update-dataButton').click(function() {
        const startPage = document.getElementById('startPage');
        const validationUpdatePage = document.getElementById('validationUpdatePage');
        startPage.style.display = 'none';
        validationUpdatePage.style.display = 'block';

        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        var immatricule = row.find('td:eq(1)').text();
        var nom = row.find('td:eq(2)').text();
        var poste = row.find('td:eq(3)').text();
        var direction = row.find('td:eq(4)').text();
        var duDateValidation = row.find('td:eq(5)').text();
        var auDateValidation = row.find('td:eq(6)').text();
        var duDateRetard = row.find('td:eq(7)').text();
        var auDateRetard = row.find('td:eq(8)').text();

        var integre = row.find('td:eq(9)').text();
        var dateTitularisation = row.find('td:eq(10)').text();
        var corpsTitularisation = row.find('td:eq(11)').text();
        var gradeTitularisation = row.find('td:eq(12)').text();
        var indiceTitularisation = row.find('td:eq(13)').text();
        var categorieTitularisation = row.find('td:eq(14)').text();

        var datePriseService = row.find('td:eq(15)').text();
        var corpsPriseService = row.find('td:eq(16)').text();
        var gradePriseService = row.find('td:eq(17)').text();
        var indicePriseService = row.find('td:eq(18)').text();
        var categoriePriseService = row.find('td:eq(19)').text();

        var dateVeilleIntegration = row.find('td:eq(20)').text();
        var corpsVeilleIntegration = row.find('td:eq(21)').text();
        var gradeVeilleIntegration = row.find('td:eq(22)').text();
        var indiceVeilleIntegration = row.find('td:eq(23)').text();
        var categorieVeilleIntegration = row.find('td:eq(24)').text();

        var duDateCNaPS = row.find('td:eq(25)').text();
        var auDateCNaPS = row.find('td:eq(26)').text();
        var Montant = row.find('td:eq(27)').text();


        $('#validationUpdatePage input[name="immatricule"]').val(immatricule);
        $('#validationUpdatePage input[name="poste"]').val(poste);
        $('#validationUpdatePage input[name="direction"]').val(direction);
        $('#validationUpdatePage input[name="duDateValidation1"]').val(duDateValidation);
        $('#validationUpdatePage input[name="auDateValidation1"]').val(auDateValidation);
        $('#validationUpdatePage input[name="duDateRetard"]').val(duDateRetard);
        $('#validationUpdatePage input[name="auDateRetard"]').val(auDateRetard);
        
        $('#validationUpdatePage input[name="integre"]').val(integre);
        $('#validationUpdatePage input[name="dateTitularisation"]').val(dateTitularisation);
        $('#validationUpdatePage input[name="corpsTitularisation"]').val(corpsTitularisation);
        $('#validationUpdatePage input[name="gradeTitularisation"]').val(gradeTitularisation);
        $('#validationUpdatePage input[name="indiceTitularisation"]').val(indiceTitularisation);
        $('#validationUpdatePage input[name="categTitularisation"]').val(categorieTitularisation);
        
        $('#validationUpdatePage input[name="datePriseService"]').val(datePriseService);
        $('#validationUpdatePage input[name="corpsPriseService"]').val(corpsPriseService);
        $('#validationUpdatePage input[name="gradePriseService"]').val(gradePriseService);
        $('#validationUpdatePage input[name="indicePriseService"]').val(indicePriseService);
        $('#validationUpdatePage input[name="categPriseService"]').val(categoriePriseService);

        $('#validationUpdatePage input[name="dateVeilleIntegre"]').val(dateVeilleIntegration);
        $('#validationUpdatePage input[name="corpsVeilleIntegre"]').val(corpsVeilleIntegration);
        $('#validationUpdatePage input[name="gradeVeilleIntegre"]').val(gradeVeilleIntegration);
        $('#validationUpdatePage input[name="indiceVeilleIntegre"]').val(indiceVeilleIntegration);
        $('#validationUpdatePage input[name="categVeilleIntegre"]').val(categorieVeilleIntegration);

        $('#validationUpdatePage input[name="duDateCNaPS"]').val(duDateCNaPS);
        $('#validationUpdatePage input[name="auDateCNaPS"]').val(auDateCNaPS);
        $('#validationUpdatePage input[name="Montant"]').val(Montant);
    });
</script>
          
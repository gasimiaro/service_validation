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
                            <img src="<?php echo $imageUrl; ?>" class="img-border-radius img-fluid w-100" alt="">
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

  <div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
              <h4 class="card-title">Liste des Demandes</h4>
          </div>
          <div class="iq-card-header-toolbar d-flex align-items-center">
            <div class="btn-group">
              <a href="#allList" class="btn btn-link" id="allButton" >Tous le demande</a>
              <a href="#completeList" class="btn btn-success" id="completeButton" >Traitée</a>
              <a href="#pendingList" class="btn btn-danger" id="pendingButton" >En attente</a>
            </div> 
              
          </div>
        </div>
        <div class="iq-card-body" id="allList">
          <div class="table-responsive">
              <table id="All" class="data-tables table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th></th>
                    <th width="2%">Immatricule</th>
                    <th>Nom et Prenom</th>
                    <th>Cas</th>
                    <th>Budget</th>
                    <th>Date Arrivée</th>
                    <th>Traité par</th>
                    <th>Status</th>
                    <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($listValidation as $validation){ 
                      $id = $validation->id;
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
                        $delButton = '<a href="#myModal'.$id.'" class="bg-primary"  data-toggle="modal" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>';
                      }
                      else{
                        $statut = '<span class="badge badge-success">Traitée</span>';
                        $delButton = '<a href="#'.$id.'" class="bg-secondary disabled"><i class="ri-delete-bin-line"></i></a>';

                      }
                      
                    ?>
                    <div id="myModal<?php echo $id; ?>" class="modal fade">
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
                                  <p>Voullez-vous la supprimer ?</p>
                                  
                              </div>
                              <div class="modal-footer justify-content-center">
                                  
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                  <form action="<?php echo base_url(); ?>index.php/backend/delValidation" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-danger">OUI</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
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
                          <p class="mb-0"><?php echo $comPrenom; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $statut; ?></p>
                        </td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-category.html"><i class="ri-pencil-line"></i></a>
                            <?php echo $delButton; ?>

                          </div>
                        </td>
                    </tr>
                    
                    
                    <?php } ?>
                </tbody>
              </table>
              
          </div>
        </div>
        <div class="iq-card-body" id="completeList" style="display:none">
          <div class="table-responsive">
              <table id="Complete" class="data-tables table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th></th>
                    <th id="imComplete">Immatricule</th>
                    <th>Nom et Prenom</th>
                    <th>Cas</th>
                    <th>Budget</th>
                    <th>Date Arrivée</th>
                    <th>Traité par</th>
                    <th>Status</th>
                    <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($completeValidation as $validation){ 
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
                          <p class="mb-0"><?php echo $comPrenom; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $statut; ?></p>
                        </td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-category.html"><i class="ri-pencil-line"></i></a>
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                          </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
        <div class="iq-card-body" id="pendingList" style="display:none">
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
                    <th>Traité par</th>
                    <th>Status</th>
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
                          <p class="mb-0"><?php echo $comPrenom; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $statut; ?></p>
                        </td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-category.html"><i class="ri-pencil-line"></i></a>
                            <a class="bg-primary" data-toggle="tooltip"  title="" data-original-title="Delete" ><i class="ri-delete-bin-line"></i></a>
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
          
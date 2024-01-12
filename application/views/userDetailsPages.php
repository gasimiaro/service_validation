<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>
<div id="resultPage"></div>
<div id="UpdatePage"></div>
<div class="row" id="startPage">

<?php foreach ($results as $comptab){ 
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
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
              <div class="row">
                  <div class="col-lg-4">
                   <img src="<?php echo $imageUrl; ?>" class="img-fluid w-100" alt="">
                  </div>
                  <div class="col-lg-4">
                      <div class="d-flex align-items-top justify-content-between iq-music-play-detail">
                           <div class="music-detail">
                                <div class="music-right">
                                    <div class="d-flex align-items-center">
                                        <form id="switch-status-form">
                                        <div class="iq-circle mr-2"  >
                                                <input type="hidden" name="imat" value="<?php echo $imat; ?>"> 
                                                <input type="hidden" id="lock-state-value-input" value="<?php echo $statut == "Blocké" ? "Deblocké" : "Blocké" ?>" name="statut">
                                                <button type="submit" id="lock-state-div" style="display: <?php echo $statut == "Blocké" ? "inline-block" : "none" ?>; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;"><i class="fa fa-lock text-primary"></i></button>
                                                <button type="submit" id="unlock-state-div" style=" display: <?php  echo $statut == "Deblocké" ? "inline-block" : "none" ?>; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;"><i class="fa fa-unlock text-info"></i></button>

                                        </div>    
                                        </form>

                                    </div>
                                </div>
                              <h3><?php echo $nom; ?></h3>
                              <div class="prenom"><?php echo $prenom; ?></div>
                               <p class="mb-0 current-comptable-immat"><?php echo $imat; ?></p>
                              <span class="fonction"><?php echo $fonction; ?></span>
                               <h6 style="display:none"><?php echo $statut; ?></h6>
                        
                              <div class="d-flex align-items-center">                                       
                                <a href="javascript:void(0);" id="editButton" class="btn btn-success iq-play mr-2" data-toggle="modal" data-target="#editModal"><h4 class="text-white"><i class="las la-edit h4"></i> Modifier</h4></a>
                              </div>
                          </div>
                          <!-- <div class="music-right">
                              <div class="d-flex align-items-center">
                                  <form id="switch-status-form">
                                   <div class="iq-circle mr-2"  >
                                        <input type="hidden" name="imat" value="<?php echo $imat; ?>"> 
                                        <input type="hidden" id="lock-state-value-input" value="<?php echo $statut == "Blocké" ? "Deblocké" : "Blocké" ?>" name="statut">
                                        <button type="submit" id="lock-state-div" style="display: <?php echo $statut == "Blocké" ? "inline-block" : "none" ?>; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;"><i class="fa fa-lock text-primary"></i></button>
                                        <button type="submit" id="unlock-state-div" style=" display: <?php  echo $statut == "Deblocké" ? "inline-block" : "none" ?>; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;"><i class="fa fa-unlock text-info"></i></button>

                                   </div>    
                                  </form>

                             </div>
                          </div> -->
                       </div>
                  </div>
                  <div class="col-lg-4">
                        <!-- <div class="col-12 col-md-12 col-lg-8"> -->
                            
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                                <div class="iq-header-title">
                                <h4 class="card-title mb-0">Evaluation</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="list-inline p-0 mb-0">
                                <li>
                                    <div class="iq-details mb-2">
                                        <span class="title"><span><?php
                                        if ($count<=9) {
                                          echo '0'.$count;
                                        }else {
                                          echo $count;
                                        } 
                                        ?> </span>Demande</span>
                                        <div class="percentage float-right text-info">100 <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-info" data-percent="100"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iq-details mb-2">
                                        <span class="title"><span><?php
                                        if ($countWait<=9) {
                                            echo '0'.$countWait;
                                        }else {
                                            echo $countWait;
                                        }
                                        
                                        $waitPercent = ($countWait * 100)/($count != 0 ? $count : 1);
                                        $waitPercents = sprintf("%.2f", $waitPercent);
                                        ?> 
                                        </span>En attente</span>
                                        <div class="percentage float-right text-danger"><?php echo $waitPercents?> <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-danger" data-percent="<?php echo $waitPercents?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iq-details mb-2">
                                    <span>
                                    <?php
                                        if ($countAnomalie<=9) {
                                            echo '0'.$countAnomalie;
                                        }else {
                                            echo $countAnomalie;
                                        }
                                        $anomaliePercent = ($countAnomalie * 100)/($count != 0 ? $count : 1);
                                        $anomaliePercents = sprintf("%.2f", $anomaliePercent);
                                        ?> 
                                        </span><span>Anomalie</span>
                                        <div class="percentage float-right text-warning"><?php echo $anomaliePercents; ?> <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-warning" data-percent="<?php echo $anomaliePercents; ?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iq-details mb-2">
                                    <span>
                                    <?php
                                        if ($countTraite<=9) {
                                            echo '0'.$countTraite;
                                        }else {
                                            echo $countTraite;
                                        }
                                        $traitePercent = ($countTraite * 100)/($count != 0 ? $count : 1);
                                        $traitePercents = sprintf("%.2f", $traitePercent);
                                        ?> 
                                        </span><span>Traitée</span>
                                        <div class="percentage float-right text-success"><?php echo $traitePercents; ?> <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-success" data-percent="<?php echo $traitePercents; ?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iq-details mb-2">
                                        <span class="title">
                                    <?php
                                        if ($countYear<=9) {
                                            echo '0'.$countYear;
                                        }else {
                                            echo $countYear;
                                        }
                                        $traitePercent = ($countTraite * 100)/($count != 0 ? $count : 1);
                                        $annee = date("Y");
                                        ?> 
                                        </span><span>Demande de l'année <?php echo $annee; ?></span>
                                        <div class="percentage float-right text-dark">100 <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-dark" data-percent="100"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="iq-details mb-2">
                                        <span class="title"><span><?php
                                        if ($countWaitYear<=9) {
                                            echo '0'.$countWaitYear;
                                        }else {
                                            echo $countWaitYear;
                                        }
                                        $waitYearPercent = ($countWaitYear * 100)/($countYear != 0 ? $countYear : 1);
                                        $waitYearPercents = sprintf("%.2f", $waitYearPercent);
                                        ?> 
                                        </span>En attente de l'année <?php echo $annee; ?></span>
                                        <div class="percentage float-right text-dangeer"><?php echo $waitYearPercents;?> <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-danger" data-percent="<?php echo $waitYearPercents;?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iq-details">
                                        <span class="title"><span><?php
                                        if ($countAnomalieYear<=9) {
                                            echo '0'.$countAnomalieYear;
                                        }else {
                                            echo $countAnomalieYear;
                                        }
                                        $anomalieYearPercent = ($countAnomalieYear * 100)/($countYear != 0 ? $countYear : 1);
                                        $anomalieYearPercents = sprintf("%.2f", $anomalieYearPercent);
                                        ?> 
                                        </span>Anomalie de l'année <?php echo $annee; ?></span>
                                        <div class="percentage float-right text-warning"><?php echo $anomalieYearPercents; ?> <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-warning" data-percent="<?php echo $anomalieYearPercents; ?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iq-details">
                                        <span class="title"><span><?php
                                        if ($countTraiteYear<=9) {
                                            echo '0'.$countTraiteYear;
                                        }else {
                                            echo $countTraiteYear;
                                        }
                                        $traiteYearPercent = ($countTraiteYear * 100)/($countYear != 0 ? $countYear : 1);
                                        $traiteYearPercents = sprintf("%.2f", $traiteYearPercent);
                                        ?> 
                                        </span>Traitée de l'année <?php echo $annee; ?></span>
                                        <div class="percentage float-right text-success"><?php echo $traiteYearPercents; ?> <span>%</span></div>
                                        <div class="iq-progress-bar-linear d-inline-block w-100">
                                            <div class="iq-progress-bar">
                                            <span class="bg-success" data-percent="<?php echo $traiteYearPercents; ?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
                        <!-- </div> -->

                  </div>






              </div>
            </div>
        </div>
      <?php } ?>
    </div>


<!-- The Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="col-lg-12">
            <div class="iq-card-body">
                <div class="form-group row align-items-center">
                    <div class="col-md-12">
                        <div class="profile-img-edit">
                        <img class="profile-pic" src="" alt="utilisateur-pic">
                        
                        </div>
                    </div>
                </div>
                <div class=" row align-items-center mb-3">
                    <div class="form-group col-sm-6">
                        <label for="fname">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lname">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="immatricule">Immatricule:</label>
                        <input type="hidden" class="form-control" id="immat" name="immatricule" >
                        <input type="text" class="form-control immatricule-edit"  readonly>

                    </div>
                    <div class="form-group col-sm-6">
                        <label>Fonction:</label>
                        <select class="form-control" id="fonction" name="fonction">
                        
                            <option selected="" id="option"></option>
                            <option  id="option1"></option>
                            <option  id="option2"></option>
                            
                        </select>
                    </div>
                    <!-- <input type="text" name="statut" id="statut"> -->
                </div>
                <button type="reset" class="btn iq-bg-danger">Annuler <i class="fa fa-times"></i></button>
                <button type="submit" class="btn btn-primary mr-2" id="btnUpdateUser">Valider <i class="fa fa-check"></i></button>

<script>
    $('#btnUpdateUser').click(function() {
        // Récupérez les données à partir du formulaire
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var immatricule = document.getElementById('immat').value;
        var fonction = $('#fonction').val();
        console.log(immatricule)

        // Envoyez une requête AJAX pour mettre à jour les informations de l'utilisateur
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>userpagecontroller/updateUserDetails',
            data: {
                nom: nom,
                prenom: prenom,
                immatricule: immatricule,
                fonction: fonction
            },
            dataType: 'json',

            success: function(response) {
                console.log(JSON.stringify(response));
                // Rechargez la page userDetails après la mise à jour
                if(response.success){
                    var row = $(this).closest('.row');

                $('h3').text(nom);
                $('.prenom').text(prenom);
                $('.fonction').text(fonction);

                    $('#editModal').modal('hide'); // Fermez le modal si nécessaire
                swal("Employé modifié", "","success");
                setTimeout(function(){
                            swal.close();
                        }, 2000);
                }
                else{
                    swal("Erreur de modification", "","warning");
                    setTimeout(function(){
                            swal.close();
                        }, 2000);

                }
            

                
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>

            </div>
        </div>
        
        
      </div>
    </div>
  </div>
  
</div>
<?php foreach ($results as $info){ 
    $prenom = $info->prenom;
    $fonction = $info->fonction;
    // if ($fonction == "Comptable") {
        if ($fonction) {

    
    
?>
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
          
              <h4 class="card-title">Liste des Demandes Traitée par <span class="text-primary prenom"><?php echo $prenom; ?> </span></h4>
            
          </div>
        </div>
        <div class="iq-card-body">
          <div class="table-responsive">
              <table id="All" class="data-tables table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th></th>
                    <th>N° Dossier</th>
                    <th width="2%">Immatricule</th>
                    <th>Nom et Prenom</th>
                    <th>Cas</th>
                    <th>Budget</th>
                    <th>Date Arrivée</th>
                    <th>Status</th>
                    <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($byComptable as $validation){ 
                    //   $id = $validation->id;
                    //   $immatricule = $validation->immatricule;
                    //   $nom = $validation->NOM;
                    //   $prenom = $validation->PRENOMS;
                    //   $duDateVal = $validation->DuDateValidation;
                    //   $auDateVal = $validation->AuDateValidation;
                    //   $cas = $validation->Cas; 
                    //   $typeBudget = $validation->typeBudget;
                    //   $dateArrive = $validation->dateArrive;
                    //   $comImmatricule = $validation->comptable;
                                            $id = $validation['id'];
                        $numDossier = $validation['numDossier'];
                        $immatricule = $validation['immatricule'];
                        $nom = $validation['NOM'];
                        $prenom = $validation['PRENOMS'];
                        $duDateVal = $validation['DuDateValidation'];
                        $auDateVal = $validation['AuDateValidation'];
                        $cas = $validation['Cas'];
                        $typeBudget = $validation['typeBudget'];
                        $dateArrive = $validation['dateArrive'];
                        $comImmatricule = $validation['comptable'];
                        $state = $validation['state'];
                        $comPrenom = $validation['prenom'];

                      $elemDate = explode("-", $dateArrive);
                      $dateArrives = implode("-", array_reverse($elemDate));

                      if ($duDateVal == "" && $auDateVal == "") {
                        $statut = '<span class="badge badge-danger">En attente</span>';
                        // $editButton = ' <a  href="#modal-edit-'.$id.'" class="bg-primary" data-toggle="modal" data-placement="top" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>';
                        // $editButton = ' <a  href="#modal-edit-'.$id.'" class="bg-primary" data-toggle="modal" data-placement="top" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>';
                        $editButton = '<input type="hidden" value="'.$comImmatricule.'" name="comptable" class="" id="comptable'.$immatricule.'">
                        <a  class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" style="cursor:pointer" id="'.$immatricule.'" onclick="updateDemande('.$immatricule.')"><i class="ri-pencil-line"></i></a>';
                        $delButton = '<a href="#myModal'.$id.'" class="bg-primary" data-id="'.$id.'" data-toggle="modal" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>';
                      }
                      else{
                        $statut = '<span class="badge badge-success">Traitée</span>';
                        $editButton = ' <a class="bg-secondary disabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line"></i></a>';
                        $delButton = '<a href="#'.$id.'" class="bg-secondary disabled"><i class="ri-delete-bin-line"></i></a>';

                      }

                        if ($state == "incomplete") {
                            $statut = '<span class="badge badge-warning">Anomalie</span>';
                        }
                        else if ($state == "treated") {
                            $statut = '<span class="badge badge-success">Traitée</span>';
                        }
                        else if ($state == "pending") {
                            $statut = '<span class="badge badge-danger">En attente</span>';
                        }
                      
                    ?>
                    <!-- <div id="myModal<?php echo $id; ?>" class="modal fade">
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
                                  
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <form action="<?php echo base_url(); ?>index.php/backend/delValidation" method="post">
                                    <input type="text" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div> -->

                    <!-- modal edit comptable -->
                    <div id="modal-edit-<?php echo $id; ?>" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Comptable</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="edit-comptable-form" >

                                            <select class="custom-select" id="select-id" name="comptableId" required>
                                                <option value="">Sélectioné le comptable</option>
                                                <?php 
                                                $prenomsArray = array();
                                                foreach ($comptable as $comptab){ 
                                                    $imat = $comptab->imUser; 
                                                    $prenom = $comptab->prenom; 
                                                    $prenomsArray[$imat] = $prenom;
                                                ?>
                                                <option value="<?php echo $imat; ?>" <?php echo ($comImmatricule == $imat) ? "selected" : ""; ?>> <?php echo $prenom; ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" name="prenoms" value="<?php echo isset($prenomsArray[$comImmatricule]) ? $prenomsArray[$comImmatricule] : ''; ?>">
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                                            <input type="hidden" id="idnum"  name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-success">Valider</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

<!--  end edit comptable -->


                    <!-- suppr comptable -->

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
                                        <!-- <form action="<?php echo base_url(); ?>validationcontroller/delValidation" method="post"> -->
                                        <form id="delete-validation-form">

                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-danger">OUI</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- -->
                <tr id="line-delete-<?php echo $id; ?>">
                      <td></td>
                      <td><?php echo $numDossier; ?></td>
                        <td><?php echo $immatricule; ?></td>
                        <td><?php echo $nom.' '.$prenom; ?></td>
                        <td>
                          <!-- <p class="mb-0"><?php echo $cas; ?></p> -->
                          <p class="mb-0 cas-update-<?php echo $immatricule ?>"><?php echo $cas; ?></p>
                        </td>
                        <td>
                          <!-- <p class="mb-0"><?php echo $typeBudget; ?></p> -->
                          <p class="mb-0 type-budget-update-<?php echo $immatricule ?>"><?php echo $typeBudget; ?></p>
                        </td>
                        
                        <td>
                          <p class="mb-0"><?php echo $dateArrives; ?></p>
                        </td>
                        <td>
                          <p class="mb-0"><?php echo $statut; ?></p>
                        </td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                          <?php echo $editButton; ?> 
                            <?php echo $delButton; ?>

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
<?php
}else {
    echo " ";
}

} ?>

<script>

document.getElementById('gererUser').classList.add("active");

function updateDemande(immatricule) {
            var UpdatePage = $('#UpdatePage');
            var startPage = $('#startPage');
            var comptable = $('#comptable'+immatricule).val();
            console.log('immatricule:', immatricule);
            console.log('comptable:', comptable);
            // Envoie de la requête AJAX
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>adminpagecontroller/updateRequest', // Assurez-vous d'ajuster l'URL en conséquence
                data: { immatricule: immatricule, comptable:comptable },
                success: function (data) {
                    UpdatePage.show();
                    startPage.hide();
                    UpdatePage.html(data);
                    
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

    $('#editButton').click(function() {
        var row = $(this).closest('.row');
        var imgSrc = row.find('img').attr('src');
        var nom = row.find('h3').text();
        var prenom = row.find('.prenom').text();
        var im = row.find('p').text();
        var fonct = row.find('span').text();
        // var statut = row.find('h6').text();

        $('#editModal input[name="nom"]').val(nom);
        $('#editModal input[name="prenom"]').val(prenom);
        $('#editModal input[name="immatricule"]').val(im);
        $('.immatricule-edit').val(im);

        // $('#editModal input[name="statut"]').val(statut);
        $('#editModal img.profile-pic').attr('src', imgSrc);
        if (fonct === "Chef De Service") {
            $('#editModal option[id="option"]').val(fonct);
            $('#editModal option[id="option"]').text(fonct);
            $('#editModal option[id="option1"]').val("Comptable");
            $('#editModal option[id="option1"]').text("Comptable");
            $('#editModal option[id="option2"]').val("Chef de Bureau");
            $('#editModal option[id="option2"]').text("Chef de Bureau");
            $('#editModal option[id="option3"]').val("");
            $('#editModal option[id="option3"]').text("");
        } else if (fonct === "Chef de Bureau"){
            $('#editModal option[id="option"]').val(fonct);
            $('#editModal option[id="option"]').text(fonct);
            $('#editModal option[id="option1"]').val("Comptable");
            $('#editModal option[id="option1"]').text("Comptable");
            $('#editModal option[id="option2"]').val("Chef De Service");
            $('#editModal option[id="option2"]').text("Chef De Service");
            $('#editModal option[id="option3"]').val("");
            $('#editModal option[id="option3"]').text("");
        } else if (fonct === "Comptable"){
            $('#editModal option[id="option"]').val(fonct);
            $('#editModal option[id="option"]').text(fonct);
            $('#editModal option[id="option1"]').val("Chef de Bureau");
            $('#editModal option[id="option1"]').text("Chef de Bureau");
            $('#editModal option[id="option2"]').val("Chef De Service");
            $('#editModal option[id="option2"]').text("Chef De Service");
            $('#editModal option[id="option3"]').val("");
            $('#editModal option[id="option3"]').text("");
        } else{
            $('#editModal option[id="option"]').val("");
            $('#editModal option[id="option"]').text("Selectionne la fonction");
            $('#editModal option[id="option1"]').val("Comptable");
            $('#editModal option[id="option1"]').text("Comptable");
            $('#editModal option[id="option2"]').val("Chef de Bureau");
            $('#editModal option[id="option2"]').text("Chef de Bureau");
            $('#editModal option[id="option3"]').val("Chef De Service");
            $('#editModal option[id="option3"]').text("Chef De Service");
        }
    });


    

$(document).ready(function () {
        // Add an event listener for the form submission
        $('#switch-status-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData = $(this).serialize();


            $.ajax({
                type: 'POST', // Use GET method
                url: '<?php echo base_url("adminpagecontroller/changeUserStatut"); ?>' , // Append form data to the URL
                data: formData, // Use the data option for POST requests
                dataType: 'json',
                success: function (response) {
                    // Check the response
                    if (response.success) {
                        console.log("resp : "+ response.state);
                        // Update the UI with the new data (you need to implement this part)
                        if(response.state == "Deblocké"){
                            document.getElementById("lock-state-value-input").value = "Blocké";
                            document.getElementById("lock-state-div").style.display = "none";
                            document.getElementById("unlock-state-div").style.display = "inline-block";
                            swal("Employé debloqué", "","success");
                            
                        }
                        else if( response.state == "Blocké"){
                            document.getElementById("lock-state-value-input").value = "Deblocké";
                            document.getElementById("lock-state-div").style.display = "inline-block";
                            document.getElementById("unlock-state-div").style.display = "none";

                            swal("Employé bloqué", "","warning");
                        }
                       
                        setTimeout(function(){
                            swal.close();
                        }, 2000);
                        // Display a success message (you need to implement this part)
                        // alert(JSON.stringify(response));
                    } else {
                        // Display an error message (you need to implement this part)
                        alert(response.message);
                    }
                },
                error: function () {
                    // Handle AJAX error (you need to implement this part)
                    alert('Error during AJAX request');
                }
            });
        });



        // $('#edit-comptable-form').submit(function (e) {
        //     e.preventDefault(); // Prevent the default form submission

        //     // Get form data
        //     var formData = $(this).serialize();
        //     var row = $(this).closest('.row');

        //     var im = $('.current-comptable-immat').text();

        //     $.ajax({
        //         type: 'POST', // Use GET method
        //         url: '<?php
        //  echo base_url("validationcontroller/editValidationComptable");
         ?>' , // Append form data to the URL
        //         data: formData, // Use the data option for POST requests
        //         dataType: 'json',
        //         success: function (response) {
        //             // Check the response
        //             if (response.success) {
        //                 // Update the UI with the new data (you need to implement this part)
        //                 var selectElement = document.getElementById('select-id'); // Remplacez 'yourId' par l'ID de votre select
        //                 var desiredValue = response.comptable; // Remplacez 'VotreValeur' par la valeur de l'option dont vous voulez obtenir le texte

        //                 for (var i = 0; i < selectElement.options.length; i++) {
        //                     if (selectElement.options[i].value == desiredValue) {
        //                         var selectedText = selectElement.options[i].text;
        //                         // console.log("Texte sélectionné : " + selectedText);
        //                         // $('#comptable-im-' + response.id).text(selectedText);
        //                         console.log("new = "+ response.comptable);
        //                         console.log("old = "+ im);

        //                         if(response.comptable != im){
        //                             var deletedRow = $('#line-delete-'+response.id);
        //                             deletedRow.remove();
        //                         }
        //                         break;
        //                     }
        //                 }
        //                 $('#modal-edit-' + response.id).modal('hide');
        //                 swal("Edition avec succès", "","success");
        //                 setTimeout(function(){
        //                     swal.close();
        //                 }, 2000);
        //                 // Display a success message (you need to implement this part)
        //                 // alert(JSON.stringify(response));
        //             } else {
        //                 // Display an error message (you need to implement this part)
        //                 alert(response.message);
        //             }
        //         },
        //         error: function () {
        //             // Handle AJAX error (you need to implement this part)
        //             alert('Error during AJAX request');
        //         }
        //     });
        // });
     
        $('#delete-validation-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData1 = $(this).serialize();
            // Make a GET AJAX request
            // setTimeout(function () {
            $.ajax({
                type: 'POST', // Use GET method
                url: '<?php echo base_url("validationcontroller/delValidation"); ?>' , // Append form data to the URL
                data: formData1, // Use the data option for POST requests
                dataType: 'json',
                success: function (response) {
                    // Check the response
                    if (response.success) {
                        // Update the UI with the new data (you need to implement this part)
                        var deletedRow = $('#line-delete-'+response.id);
                        deletedRow.remove();

                        // Optionally, you can also close the modal or show a success message.
                        $('#myModal' + response.id).modal('hide');
                        swal("Suppression avec succès", "", "success");
                        setTimeout(function () {
                            swal.close();
                        }, 2000);



                        // Display a success message (you need to implement this part)
                        // alert(JSON.stringify(response));
                    } else {
                        // Display an error message (you need to implement this part)
                        alert(response.message);
                    }
                },
                error: function () {
                    // Handle AJAX error (you need to implement this part)
                    alert('Error during AJAX request');
                }
            });
        });


    });

</script>

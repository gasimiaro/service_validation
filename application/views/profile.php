<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
    $nom = $user['nom'];
    $prenom = $user['prenom']; 
    $immatricule = $user['imUser']; 
    $fonction = $user['fonction'];   
    $image = $user['photo']; 

    if ($image != "") {
        $imageUrl = base_url() . 'assets/template/images/user/' . $image;
    } else {
    $imageUrl = base_url() . 'assets/template/images/user/whatsapp-dp-for-boys.webp';
    }
?>
<div class="row profile-content">
    <div class="col-12 col-md-12 col-lg-4">
        <div class="iq-card">
        <div class="iq-card-body profile-page">
            <div class="profile-header">
                <div class="cover-container text-center">
                    <!-- <img src="<?php echo $imageUrl; ?>" alt="profile-bg" class="rounded-circle img-fluid" style="width: 35%"> -->
                    <div class="profile-img-edit">
                      <img class="profile-pic" src="<?php echo $imageUrl; ?>" alt="profile-pic" style="width: 190px; height: 180px;">
                      <div class="p-image">
                          <i class="ri-pencil-line upload-button"></i>
                          <input type="hidden" id="immatricule_photo" name="immatricule" value="<?php echo $immatricule ?>" >
                          <input id="file-upload"  name="userImageFile" class="file-upload" type="file" accept="image/*"/>
                      </div>
                    </div>

<!-- 
                    <div class="container">  
                        <br /><br /><br />  
                        <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
                              <input type="file" name="image_file" id="image_file" />  
                              <br />  
                              <br />  
                              <input type="hidden" name="immatricule" value="<?php echo $immatricule ?>" >
                              <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
                        </form>  
                        <br />  
                        <br />  
                        <div id="uploaded_image">  
                        </div>  
                    </div>   -->

                    <!-- <input type="button" id="upload_page" value="next" > -->

                    <div class="profile-detail mt-3">
                      <h3><?php echo $nom; ?></h3>
                      <h4><?php echo $prenom; ?></h4>
                      <p class="text-success h5">IM: <?php echo $immatricule; ?></p>
                      <p class="text-primary"><?php echo $fonction; ?></p>
                    </div>
                    <div class="iq-social d-inline-block align-items-center">
                    
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-8">
        
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
                    
                    $waitPercent = ($countWait * 100)/$count;
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
                    if ($countTraite<=9) {
                        echo '0'.$countTraite;
                    }else {
                        echo $countTraite;
                    }
                    $traitePercent = ($countTraite * 100)/$count;
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
                    $traitePercent = ($countTraite * 100)/$count;
                    $annee = date("Y");
                    ?> 
                    </span><span>Demande du l'année <?php echo $annee; ?></span>
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
                    $waitYearPercent = ($countWaitYear * 100)/$countYear;
                    $waitYearPercents = sprintf("%.2f", $waitYearPercent);
                    ?> 
                    </span>En attente du l'année <?php echo $annee; ?></span>
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
                    if ($countTraiteYear<=9) {
                        echo '0'.$countTraiteYear;
                    }else {
                        echo $countTraiteYear;
                    }
                    $traiteYearPercent = ($countTraiteYear * 100)/$countYear;
                    $traiteYearPercents = sprintf("%.2f", $traiteYearPercent);
                    ?> 
                    </span>Traitée du l'année <?php echo $annee; ?></span>
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
        
        <div class="iq-card-body" id="allList" >
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
                                  
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <form action="<?php echo base_url(); ?>index.php/backend/delValidation" method="post">
                                    <input type="text" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

<script>
    $(document).ready(function () {
        // Gérez le changement de fichier
        $('#file-upload').change(function () {
          var fileInput = document.getElementById('file-upload');
          var file = fileInput.files[0];
          var im = document.getElementById("immatricule_photo").value;
          if (file ) {
            var formData = new FormData();
            formData.append('immatricule', im);
            formData.append('userImageFile', file);


            $.ajax({
              type: 'POST',
              url: '<?php echo base_url("userpagecontroller/upload_image"); ?>',
              data: formData,
              contentType: false,
              processData: false,
              dataType: 'json',

              success: function(response) {
                console.log(response);
                if(response.success){

                  $("#header-user-photo").attr("src", '<?php echo base_url("assets/template/images/user/"); ?>' + response.new_file_name);


                  swal("Photo modifié!!!", "","success");
                        setTimeout(function(){
                            swal.close();
                        }, 2000);
                }
                // Traitez la réponse JSON si nécessaire
              },
              error: function(error) {
                console.error('Erreur lors du téléchargement de l\'image:', error);
              }
            });
          }
        });

      //   $('#upload_form').on('submit', function(e){  
      //      e.preventDefault();  
      //      if($('#image_file').val() == '')  
      //      {  
      //           alert("Please Select the File");  
      //      }  
      //      else  
      //      {  
      //           $.ajax({  
      //                url:"<?php echo base_url(); ?>userpagecontroller/ajax_upload",   
      //                method:"POST",  
      //                data:new FormData(this),  
      //                contentType: false,  
      //                cache: false,  
      //                processData:false,  
      //                success:function(data)  
      //                {  
      //                     $('#uploaded_image').html(data);  
      //                }  
      //           });  
      //      }  
      // });  


    });
</script>

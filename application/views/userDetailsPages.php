<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>
<div id="resultPage"></div>

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
            <div class="col-lg-8">
                <div class="d-flex align-items-top justify-content-between iq-music-play-detail">
                    <div class="music-detail">
                        <h3><?php echo $nom; ?></h3>
                        <div class="h4"><?php echo $prenom; ?></div>
                        <p class="mb-0"><?php echo $imat; ?></p>
                        <span><?php echo $fonction; ?></span>
                        <h6 style="display:none"><?php echo $statut; ?></h6>
                        
                        <div class="d-flex align-items-center">                                       
                        <a href="javascript:void(0);" id="editButton" class="btn btn-success iq-play mr-2" data-toggle="modal" data-target="#editModal"><h4 class="text-white"><i class="las la-edit h4"></i> Modifier</h4></a>
                        </div>
                    </div>
                    <div class="music-right">
                        <div class="d-flex align-items-center">
                           <!-- <div class="iq-circle" id="lock-state-div" style="display : <?php $statut == "Blocké" ? "" : "none" ?> ">
                                <form id="switch-status-form">

                                    <input type="hidden" name="imat" value="<?php echo $imat; ?>"> 
                                    <input type="hidden" value="Deblocké" name="statut">
                                    <button type="submit" style="display: inline-block; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;"><i class="fa fa-lock text-primary"></i></button>
                                </form>
                            </div> -->
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
                    </div>
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
                    $('#editModal').modal('hide'); // Fermez le modal si nécessaire
                swal("Employé modifié", "","success");
                }
                else{
                    swal("Erreur de modification", "","warning");

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
    if ($fonction == "Comptable") {
    
    
?>
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
          
              <h4 class="card-title">Liste des Demandes Traitée par <span class="text-primary"><?php echo $prenom; ?> </span></h4>
            
          </div>
        </div>
        <div class="iq-card-body">
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
                    <th>Status</th>
                    <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($byComptable as $validation){ 
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

                      $elemDate = explode("-", $dateArrive);
                      $dateArrives = implode("-", array_reverse($elemDate));

                      if ($duDateVal == "" && $auDateVal == "") {
                        $statut = '<span class="badge badge-danger">En attente</span>';
                        $delButton = '<a href="#myModal'.$id.'" class="bg-primary"  data-toggle="modal" data-original-title="Supprimer"><i class="ri-eye-bin-line"></i></a>';
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
    </div>
</div>
<?php
}else {
    echo " ";
}

} ?>

<script>


    $('#editButton').click(function() {
        var row = $(this).closest('.row');
        var imgSrc = row.find('img').attr('src');
        var nom = row.find('h3').text();
        var prenom = row.find('.h4').text();
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
    });

</script>

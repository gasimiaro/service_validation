<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>

<div id="resultPage"></div>

<div class="row" id="startPage">
    <div class="col-sm-12">
        <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Liste des Demandes Reçues</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <div class="btn-group">
                        <a href="#allList" class="btn btn-link" id="allButton" >Tous les demandes</a>
                        <a href="#pendingList" class="btn btn-danger" id="pendingButton" >En attente</a>
                        <a href="#incompleteList" class="btn btn-warning" id="incompleteButton" >Anomalie</a>
                        <a href="#completeList" class="btn btn-success" id="completeButton" >Traitée</a>
                    </div> 
                    
                </div>
            </div>
            <div class="iq-card-body" id="allList">
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
                        <!-- <th>Traité par</th> -->
                        <th>Status</th>
                        <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listValidation as $validation){ 


                        // if (is_object($validation)) {
                        //     $id = $validation->id;
                        //     $numDossier = $validation->numDossier;
                        //     $immatricule = $validation->immatricule;
                        //     $nom = $validation->NOM;
                        //     $prenom = $validation->PRENOMS;
                        //     $duDateVal = $validation->DuDateValidation;
                        //     $auDateVal = $validation->AuDateValidation;
                        //     $cas = $validation->Cas; 
                        //     $typeBudget = $validation->typeBudget;
                        //     $dateArrive = $validation->dateArrive;
                        //     $comImmatricule = $validation->comptable;
                        //     $state = $validation->state;
                        //     $comPrenom = $validation->prenom;
                        // } elseif (is_array($validation) && isset($validation['id'])) {
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
                        // }


                        $elemDate = explode("-", $dateArrive);
                        $dateArrives = implode("-", array_reverse($elemDate));

                        if ($duDateVal == "" && $auDateVal == "") {
                            // $statut = '<span class="badge badge-danger">En attente</span>';
                            $editButton = ' <a  href="#modal-edit-'.$id.'" class="bg-primary" data-toggle="modal" data-placement="top" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>';
                            $delButton = '<a href="#myModal'.$id.'" class="bg-primary" data-id="'.$id.'" data-toggle="modal" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>';
                        }
                        else{
                            // $statut = '<span class="badge badge-success">Traitée</span>';
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
                           <tr id="line-delete-<?php echo $id; ?>" data-state="<?php echo $state; ?>">
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
                            <!-- <td>
                            <p class="mb-0" id="comptable-im-<?php echo $id ?>"><?php echo $comPrenom; ?></p>
                            </td> -->
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

                                            
                                            <!-- <label for="#">Comptable</label> -->
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
                                        <form id="delete-validation-form">

                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-danger">OUI</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        
                        
                        <?php } ?>
                    </tbody>
                </table>
                
              </div>
            </div>

            <?php  include(APPPATH.'views/CompleteUserList.php'); ?>
            <?php  include(APPPATH.'views/incompleteUserList.php'); ?>


            <?php  include(APPPATH.'views/PendingUserList.php'); ?>




        </div>
    </div>
  
    </div>
</div>
<script>



$(document).ready(function () {

    document.getElementById('adminAllList').classList.add("active");

    /**************************************************************************************** */

        // // Fonction pour afficher les lignes en fonction de l'état
        // function filterTableRows(state) {
        //     $('#All tbody tr').hide(); // Masquer toutes les lignes du tableau
        //     $('#All tbody tr[data-state="' + state + '"]').show(); // Afficher les lignes correspondantes à l'état
        // }

        // // Gérer le clic sur le bouton "Tous les demandes"
        // $('#allButton').click(function () {
        //     $('#All tbody tr').show(); 
        // });

        // // Gérer le clic sur le bouton "En attente"
        // $('#pendingButton').click(function () {
        //     filterTableRows('pending');
        // });

        // // Gérer le clic sur le bouton "Anomalie"
        // $('#incompleteButton').click(function () {
        //     filterTableRows('incomplete');
        // });

        // // Gérer le clic sur le bouton "Traitée"
        // $('#completeButton').click(function () {
        //     filterTableRows('treated');
        // });

        // // Par défaut, afficher toutes les lignes au chargement de la page
        // $('#All tbody tr').show(); 
/******************************************************************************************************** */
        // Add an event listener for the form submission
        $('#edit-comptable-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData = $(this).serialize();


            $.ajax({
                type: 'POST', // Use GET method
                url: '<?php echo base_url("validationcontroller/editValidationComptable"); ?>' , // Append form data to the URL
                data: formData, // Use the data option for POST requests
                dataType: 'json',
                success: function (response) {
                    // Check the response
                    if (response.success) {
                        // Update the UI with the new data (you need to implement this part)
                        var selectElement = document.getElementById('select-id'); // Remplacez 'yourId' par l'ID de votre select
                        var desiredValue = response.comptable; // Remplacez 'VotreValeur' par la valeur de l'option dont vous voulez obtenir le texte

                        for (var i = 0; i < selectElement.options.length; i++) {
                            if (selectElement.options[i].value == desiredValue) {
                                var selectedText = selectElement.options[i].text;
                                // console.log("Texte sélectionné : " + selectedText);
                                $('#comptable-im-' + response.id).text(selectedText);
                                break;
                            }
                        }
                        $('#modal-edit-' + response.id).modal('hide');
                        swal("Edition avec succès", "","success");
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
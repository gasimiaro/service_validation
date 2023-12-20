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
                <h4 class="card-title">Liste des Demandes</h4>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <div class="btn-group">
                <a href="#allList" class="btn btn-link" id="allButton" >Tous les demandes</a>
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
                            // $editButton = ' <a  href="#modal-edit-'.$id.'" class="bg-primary" data-toggle="modal" data-placement="top" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>';
                            $editButton = ' <a  href="#modal-edit-'.$id.'" class="bg-primary" data-toggle="modal" data-placement="top" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>';
                            $delButton = '<a href="#myModal'.$id.'" class="bg-primary" data-id="'.$id.'" data-toggle="modal" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>';
                        }
                        else{
                            $statut = '<span class="badge badge-success">Traitée</span>';
                            $editButton = ' <a class="bg-secondary disabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line"></i></a>';
                            $delButton = '<a href="#'.$id.'" class="bg-secondary disabled"><i class="ri-delete-bin-line"></i></a>';

                        }
                        
                        ?>
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
                                        <!-- <p>Voullez-vous la editer ?</p> -->
                                        <!-- <form id="edit-comptable-form" action="<?php echo base_url(); ?>validationcontroller/editValidationComptable" method="post"> -->
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
                                        <!-- <form action="<?php echo base_url(); ?>validationcontroller/delValidation" method="post"> -->
                                        <form id="delete-validation-form">

                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-danger">OUI</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <tr id="line-delete-<?php echo $id; ?>">
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
                            <p class="mb-0" id="comptable-im-<?php echo $id ?>"><?php echo $comPrenom; ?></p>
                            </td>
                            <td>
                            <p class="mb-0"><?php echo $statut; ?></p>
                            </td>
                            <td>
                            <div class="flex align-items-center list-user-action">
                                <!-- <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-category.html"><i class="ri-pencil-line"></i></a> -->
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
                        }
                        else{
                            $statut = '<span class="badge badge-success">Traitée</span>';
                        }
                        
                        ?>
                        <tr id="line-delete-<?php echo $id; ?>">
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
                        }
                        else{
                            $statut = '<span class="badge badge-success">Traitée</span>';
                        }
                        
                        ?>
                        <tr id="line-delete-<?php echo $id; ?>">
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
</div>
<script>
//     var  id = document.getElementById("idnum").value;
//     var  compt = document.getElementById("sel-"+id).value;

// document.getElementById("sel-"+id).addEventListener('change',function(){
//     console.log("ito "+ this.value);
// })


// $('#test').on('submit', function(event) {
//   event.preventDefault(); // Prevent the form from submitting


//   const formAction = $(this).attr('action'); // Get the form action
// //   console.log("ireto "+$('#test').serialize())

//   $.ajax({
//     url: "<?php echo base_url(); ?>validationcontroller/editValidationComptable", // Replace with your endpoint URL
//     method: 'POST',
//     // data: $('#test').serialize(),
//     data: {
//         comptable: compt,
//                 id: id
//             },
//             dataType: 'json', // Add this line to specify the expected data type

//     success: function(data) {
//       console.log('message : ', data.message);
//       $('#comptable-im-'+id).text(data.comptable);
//     },
//     error: function(error) {
//       console.error('Error logging form action:', error);
//     }
//   });
// });



$(document).ready(function () {
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
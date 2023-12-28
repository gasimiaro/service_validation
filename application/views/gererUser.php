<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>
<div id="resultPage"></div>

<div class="row" id="startPage">
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between align-items-center">
                <div class="iq-header-title">
                    <h4 class="card-title">Employés</h4>
                </div>
                <div class="d-flex align-items-center iq-view">
                    <b class="mb-0 text-primary">
                        
                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nouveau Utlisateur</button></b>
                </div>
                <div id="feature-album-artist-slick-arrow" class="slick-aerrow-block"></div>
            </div>
            <div class="iq-card-body">
            <ul class="list-unstyled row feature-album-artist mb-0">
            <?php foreach ($comptables as $index => $user) { 
                $im = $user->imUser;
                $nom = $user->nom;
                $prenom = $user->prenom;
                $image = $user->photo;
                $fonction = $user->fonction;
                if ($image != "") {
                    $imageUrl = base_url() . 'assets/template/images/user/' . $image;
                } else {
                $imageUrl = base_url() . 'assets/template/images/user/whatsapp-dp-for-boys.webp';
                }

                if ($fonction == 'Chef De Service') {
                    $poste = "Chef de Service";
                    $alias = "Chef";
                }
                else if ($fonction == 'Chef de Bureau') {
                    $poste = "Chef de Bureau";
                    $alias = "Chef";
                } else if ($fonction == 'Comptable') {
                    $poste = 'Comptable';
                    $alias = "";
                }
                
                ?>
                <li class="col-lg-12  iq-music-box">
                    <div class="iq-thumb-artist">
                        <div class="iq-music-overlay"></div>
                        <a href="#">
                        <img src="<?php echo $imageUrl; ?>" class="w-100 img-fluid" alt="" style="width: 100px; height: 150px;">
                        </a>
                        <div class="overlay-music-icon">
                            <form action="<?php echo base_url(); ?>adminpagecontroller/userDetails" method="post">
                                <input type="hidden" name="imatComptable" id="" value="<?php echo $im; ?>">
                                <button type="submit" style="display: inline-block; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;">
                                    <i class="las la-eye"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="feature-list text-center">
                        <h6 class="font-weight-600  mb-0"><?php echo $alias.' '.$prenom; ?></h6>
                        <h6 class="font-weight-400  mb-0"><?php echo $poste; ?></h6>
                    </div>
                </li>
            <?php } ?>
                
            </ul>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Utilisateur</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                     
        
        <div class="iq-card-body">
            <!-- <form class="needs-validation" action="<?php echo base_url(); ?>userpagecontroller/addComptable" method="post" novalidate> -->
            <form id="form-add-user" novalidate>

                <div class="form-row">
                <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Immatricule</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white" id="validationTooltipUsernamePrepend"><i class="fa fa-user-circle"></i></span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" name="immatricule" required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Pseudonime</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white" id="validationTooltipUsernamePrepend"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" name="pseudo" required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Nom</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fa">N</i></span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltip01"  name="nom"  required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip02">Prenom</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fa">P</i></span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltip02"  name="prenom"  required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip04">Fonction</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white" id="validationTooltipUsernamePrepend"><i class="fa fa-id-card"></i></span>
                            </div>
                            <select class="form-control" id="validationTooltip04"  name="fonction"  required>
                                <option selected disabled value="">Selectionner</option>
                                <option value="Comptable">Comptable</option>
                                <option value="Chef de Bureau">Chef de Bureau</option>
                                <option value="Chef de Service">Chef de Service</option>
                            </select>
                            <div class="invalid-tooltip">
                                Please select a valid state.
                            </div>
                        </div>
                        
                    </div>
                    <input type="hidden"  name="passWord" value="mdp">

                    
                </div>
                
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer <i class="fa fa-times"></i></button>
        <button class="btn btn-info" type="submit">Valider <i class="fa fa-check"></i></button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>


$(document).ready(function () {
        // Add an event listener for the form submission
  
        document.getElementById('gererUser').classList.add("active");


        $('#form-add-user').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData1 = $(this).serialize();
            // Make a GET AJAX request
            // setTimeout(function () {
            $.ajax({
                type: 'POST', // Use GET method
                url: '<?php echo base_url("userpagecontroller/addComptable"); ?>' , // Append form data to the URL
                data: formData1, // Use the data option for POST requests
                dataType: 'json',
                success: function (response) {
                    // Check the response
                    if (response.success) {
                        // Update the UI with the new data (you need to implement this part)

                        var user = response.user; // Assuming your controller sends the user data in the response

                        var imageUrl =  '<?php echo base_url("assets/template/images/user/whatsapp-dp-for-boys.webp"); ?>';

                        var html = '<li class="col-lg-12 iq-music-box">' +
                            '<div class="iq-thumb-artist">' +
                            '<div class="iq-music-overlay"></div>' +
                            '<a href="#">' +
                            '<img src="' + imageUrl + '" class="w-100 img-fluid" alt="" style="width: 100px; height: 150px;">' +
                            '</a>' +
                            '<div class="overlay-music-icon">' +
                            '<form action="<?php echo base_url(); ?>adminpagecontroller/userDetails" method="post">' +
                            '<input type="hidden" name="imatComptable" id="" value="' + user.imUser + '">' +
                            '<button type="submit" style="display: inline-block; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;">' +
                            '<i class="las la-eye"></i>' +
                            '</button>' +
                            '</form>' +
                            '</div>' +
                            '</div>' +
                            '<div class="feature-list text-center">' +
                            '<h6 class="font-weight-600  mb-0">' + user.alias + ' ' + user.prenom + '</h6>' +
                            '<h6 class="font-weight-400  mb-0">' + user.poste + '</h6>' +
                            '</div>' +
                            '</li>';

                        // Append the new HTML content
                        $('.feature-album-artist li:last').append(html);

                        // Optionally, you can also close the modal or show a success message.
                        $('#myModal').modal('hide');
                        swal("Ajout avec succès", "", "success");
                        setTimeout(function () {
                            swal.close();
                        }, 2000);



                        // Display a success message (you need to implement this part)
                        // alert(JSON.stringify(response));
                    } else {
                        // Display an error message (you need to implement this part)
                        // alert(response.message);
                        swal(response.message, "", "warning");
                        setTimeout(function () {
                            swal.close();
                        }, 2000);
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
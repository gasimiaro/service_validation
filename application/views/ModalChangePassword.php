<div id="modal-password" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa fa-lock"></i>
                    <!-- <button type="submit" id="lock-state-div" style="display: <?php echo $statut == "Blocké" ? "inline-block" : "none" ?>; background: rgba(255, 255, 255, 0.5); border-radius: 50%; height: 40px; width: 40px; line-height: 40px; font-size: 25px;"><i class="fa fa-lock text-primary"></i></button> -->

                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <form id="edit-password-form" >

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="oldPass">Ancien mot de passe :</label>
                            <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Ecrivez l'ancien mot de passe..." required>
                            <input type="hidden" class="form-control" name="immatricule_c" id="immatricule_c" value="<?php echo $user['imUser'];  ?>">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="newPass">Nouveau mot de passe :</label>
                            <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Ecrivez le nouveau mot de passe..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rpass">Repetez le mot de passe :</label>
                            <input type="password" class="form-control" id="rPass" placeholder="Retaper le nouveau mot de passe... " required>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer justify-content-center">
                

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
        // Fonction pour vérifier la correspondance des mots de passe
        function checkPasswordMatch() {
            var newPass = document.getElementById('newPass').value;
            var rpass = document.getElementById('rPass').value;

            // Vérifier si les deux mots de passe sont identiques
            if (newPass === rpass) {
                // Changer la couleur de la bordure en vert
                document.getElementById('newPass').style.borderColor = 'green';
                document.getElementById('rPass').style.borderColor = 'green';
            } else {
                // Remettre la couleur de la bordure par défaut
                document.getElementById('newPass').style.borderColor = '';
                document.getElementById('rPass').style.borderColor = '';
            }
        }

        // Ajouter un écouteur d'événements à l'input rpass
        document.getElementById('rPass').addEventListener('input', checkPasswordMatch);
    });


    $('#edit-password-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var imUser = document.getElementById("immatricule_c").value;
            var oldPass = document.getElementById("oldPass").value;
            var newPass = document.getElementById("newPass").value;
            var rPass = document.getElementById("rPass").value;

            if(oldPass != "" && newPass == rPass){

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST', // Use GET method
                    url: '<?php echo base_url("userpagecontroller/editpassword"); ?>' , // Append form data to the URL
                    data: formData, // Use the data option for POST requests
                    dataType: 'json',
                    success: function (response) {
                        // Check the response
                        if (response.success) {
                            // Update the UI with the new data (you need to implement this part)
                            $('#edit-password-form')[0].reset();
                            document.getElementById('newPass').style.borderColor = '';
                             document.getElementById('rPass').style.borderColor = '';
                            $('#modal-password').modal('hide');
                            swal(response.message, "","success");
                            setTimeout(function(){
                                swal.close();
                            }, 2000);
                            // Display a success message (you need to implement this part)
                            // alert(JSON.stringify(response));
                        } else {


                            // Display an error message (you need to implement this part)
                            $('#edit-password-form')[0].reset();
                            document.getElementById('newPass').style.borderColor = '';
                             document.getElementById('rPass').style.borderColor = '';
                            swal(response.message, "","warning");
                            setTimeout(function(){
                                swal.close();
                            }, 2000);
                            // alert(response.message);
                        }
                    },
                    error: function () {
                        // Handle AJAX error (you need to implement this part)
                        alert('Error during AJAX request');
                    }
                });
            }
            else{
                swal("Les mots de passe ne se correspondent pas!!!", "","warning");
                setTimeout(function(){
                    swal.close();
                }, 2000);
            }
         
        });


</script>
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
                        <h4 class="card-title">Liste des Demandes traitées</h4>
                    </div>
                  
                    
                </div>
            </div>

            <?php  include(APPPATH.'views/CompleteAdminList.php'); ?>


            

        </div>
    </div>
  
    </div>
</div>
<script>



$(document).ready(function () {

        document.getElementById('completeList').style.display = "block";


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
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
                        <h4 class="card-title">Liste des Demandes avec anomalie</h4>
                    </div>
                  
                    
                </div>
            </div>

            <?php  include(APPPATH.'views/incompleteAdminList.php'); ?>


            

        </div>
    </div>
  
    </div>
</div>
<script>



$(document).ready(function () {

       
    });
    </script>
<div id="modal-disconnect" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa fa-times"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                    
                    <p?>Etes-vous sûre de vouloir vous déconnecter? </p>
                
                </div>
                <div class="modal-footer justify-content-center">
                
                <form action="<?php echo base_url(); ?>logincontroller/logout" method="post">

                <form id="edit-comptable-form" >
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-lg-12" id="traitement" style="display:none">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title" >Traitement de de demande du Validation des services precaires</h4>
                    
                    </div>
                </div>
                <div class="iq-card-body" id="Etat" style="display:none">
                    <form id="form-wizard1" class="text-center mt-4" action="<?php echo base_url(); ?>validationcontroller/ValidationService" method="post">
                        <ul id="top-tab-list" class="p-0">
                        <!-- <li id="confirm"> -->
                        <li class="active" id="account">
                        <a href="javascript:void();">
                        <i class="ri-check-fill"></i><span>Prise de Service</span>
                        </a>
                        </li>
                        <li id="payment">
                        <a href="javascript:void();">
                        <i class="ri-camera-fill"></i><span>Veille d'Integration</span>
                        </a>
                        </li>
                        
                        <!-- <li class="active" id="account"> -->
                        <li id="personal">
                        <a href="javascript:void();">
                        <i class="ri-user-fill"></i><span>Titularisation</span>
                        </a>
                        </li>

                        <li id="confirm">
                        <a href="javascript:void();">
                        <i class="ri-lock-unlock-line"></i><span>Validation</span>
                        </a>
                        </li>

                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4 text-left">Information sur Prise de Service:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 1 - 4</h2>
                                    </div>
                                </div>
                            
                                <div class="row" id="infoPriseService">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DATE DU PRISE DE SERVICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="datePriseService" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" id="corpsPriseService" name="corpsPriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" id="gradePriseService" name="gradePriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" id="indicePriseService" name="indicePriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" id="categPriseService" name="categPriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right" >Valider </button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button> -->
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
 
                        <fieldset>
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur Veille d'Integration:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DATE DU VEILLE D'INTEGRATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="dateVeilleIntegre" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="corpsVeilleIntegre" id="corpsVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="gradeVeilleIntegre" id="gradeVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="indiceVeilleIntegre" id="indiceVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="categVeilleIntegre" id="categVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>

                        </fieldset>
                        <fieldset>
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur Titularisation:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 3 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>INTEGRE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">i</span>
                                                </div>
                                                <input type="text" class="form-control" name="integre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DATE DE TITULARISATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="dateTitularisation" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="corpsTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="gradeTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="indiceTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="categTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row text-left">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur la Validation:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps" id="step1">Etape 4 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6">
                                        
                                        <input type="hidden" name="immatricule" id="imInptutEtat">
                                        <input type="hidden" name="cas" id="casInptutEtat">
                                        <div class="form-group">
                                            <label>POSTE DE TRAVAIL: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="poste" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DIRECTION DE TRAVAIL: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="text" class="form-control" name="direction" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE DE VALIDATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateValidation" class="form-control" id="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateValidation" class="form-control" id="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE RETARD DU VALIDATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateRetard" class="form-control" id="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateRetard" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button> -->
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right" >Valider </button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voullez-vous l'Inserer ?</p>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                        <button type="submit" class="btn btn-danger">OUI</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="iq-card-body" id="Prive" style="display:none">
                    <form id="form-wizard1" class="text-center mt-4 was-validated" action="<?php echo base_url(); ?>validationcontroller/ValidationService" method="post">
                        <ul id="top-tab-list" class="p-0">
                        </li>
                            <!-- <li id="confirm"> -->
                            <li class="active" id="account">
                            <a href="javascript:void();">
                            <i class="ri-check-fill"></i><span>CNaPS</span>
                            </a>
                            </li>
                            <li id="personal">
                            <a href="javascript:void();">
                            <i class="ri-user-fill"></i><span>Titularisation</span>
                            </a>
                            </li>

                            <!-- <li class="active" id="account"> -->
                            <li id="confirm">
                            <a href="javascript:void();">
                            <i class="ri-lock-unlock-line"></i><span>Validation</span>
                            </a>
                            </li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4 text-left">Information sur CNaPS:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 1 - 3</h2>
                                    </div>
                                </div>
                                <div class="row" id="infoTransfertCNaPS">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE DE TRANSFERT CNaPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateCNaPS" class="form-control" id="" value=" ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateCNaPS" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6" id="MontantPrive">
                                        <div class="form-group">
                                            <label>MONTANT CNaPS (Service Privé): *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" name="MontantPrive" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="MontantECD">
                                        <div class="form-group">
                                            <label>MONTANT CNaPS (ECD): *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" name="MontantECD"  placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Taux CNaPS : *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">%</span>
                                                </div>
                                                <input type="text" class="form-control" name="Tx" id="Tx"  placeholder="Tx">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Taux CNaPS PI: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">%</span>
                                                </div>
                                                <input type="text" class="form-control" name="TxUn" id="TxUn" placeholder="Tx1">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Taux CNaPS PP: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">%</span>
                                                </div>
                                                <input type="text" class="form-control" name="TxDeux" id="TxDeux" placeholder="Tx2">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" data-toggle="modal" data-target="#myModalPrive" class="btn btn-primary float-right">Valider</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button> -->
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur Titularisation:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 2 - 3</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>INTEGRE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">i</span>
                                                </div>
                                                <input type="text" class="form-control" name="integre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DATE DE TITULARISATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="dateTitularisation" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" name="corpsTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">G</span>
                                                </div>
                                                <input type="text" class="form-control" name="gradeTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">i</span>
                                                </div>
                                                <input type="text" class="form-control" name="indiceTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">Cat</span>
                                                </div>
                                                <input type="text" class="form-control" name="categTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>

                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row text-left">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur la Validation:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps" id="step1">Etape 3 - 3</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6">
                                        
                                        <input type="hidden" name="immatricule" id="imInptutPrive">
                                        <input type="hidden" name="cas" id="casInptutPrive">
                                        <div class="form-group">
                                            <label>POSTE DE TRAVAIL: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="poste" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DIRECTION DE TRAVAIL: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="text" class="form-control" name="direction" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE DE VALIDATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateValidation" class="form-control" id="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateValidation" class="form-control" id="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE RETARD DU VALIDATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateRetard" class="form-control" id="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateRetard" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button> -->
                            <button type="button" data-toggle="modal" data-target="#myModalPrive" class="btn btn-primary float-right">Valider</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>

                        <div id="myModalPrive" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voullez-vous l'Inserer ?</p>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                        <button type="submit" class="btn btn-danger">OUI</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="iq-card-body" id="EtatPrive" style="display:none">
                    <form id="form-wizard1" class="text-center mt-4" action="<?php echo base_url(); ?>validationcontroller/ValidationService" method="post">
                        <ul id="top-tab-list" class="p-0">
                                 <!-- <li id="confirms" style="display:none"> -->
                                 <li class="active" id="accounts">
                                    <a href="javascript:void();">
                                        <i class="ri-check-fill"></i><span>CNaPS</span>
                                    </a>
                                </li>
                                <li id="paymentss">
                                    <a href="javascript:void();">
                                        <i class="ri-camera-fill"></i><span>Prise de Service</span>
                                    </a>
                                </li>
                                <li id="payments">
                                    <a href="javascript:void();">
                                        <i class="ri-camera-fill"></i><span>Veille d'Integration</span>
                                    </a>
                                </li>
                                <li id="personals">
                                    <a href="javascript:void();">
                                        <i class="ri-user-fill"></i><span>Titularisation</span>
                                    </a>
                                </li>

                                <!-- <li class="active" id="accounts"> -->
                                <li id="confirms" style="display:none">
                                    <a href="javascript:void();">
                                        <i class="ri-lock-unlock-line"></i><span>Validation</span>
                                    </a>
                                </li>

                        </ul>
                        
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4 text-left">Information sur CNaPS:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 1 - 5</h2>
                                    </div>
                                </div>
                                <div class="row" id="infoTransfertCNaPS">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE DE TRANSFERT CNaPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateCNaPS" class="form-control" id="" value=" ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateCNaPS" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="MontantPrive">
                                        <div class="form-group">
                                            <label>MONTANT CNaPS (Service Privé): *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" name="MontantPrive" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="MontantECD">
                                        <div class="form-group">
                                            <label>MONTANT CNaPS (ECD): *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" name="MontantECD"  placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Taux CNaPS : *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">%</span>
                                                </div>
                                                <input type="text" class="form-control" name="Tx" id="Tx" placeholder="Tx">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Taux CNaPS PI: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">%</span>
                                                </div>
                                                <input type="text" class="form-control" name="TxUn" id="TxUn" placeholder="Tx1">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Taux CNaPS PP: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">%</span>
                                                </div>
                                                <input type="text" class="form-control" name="TxDeux" id="TxDeux" placeholder="Tx2">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" data-toggle="modal" data-target="#myModalEtatPrive" class="btn btn-primary float-right">Valider</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button> -->
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Suivant</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur Prise de Service:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 2 - 5</h2>
                                    </div>
                                </div>
                                <div class="row" id="infoPriseService">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DATE DU PRISE DE SERVICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="datePriseService" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">C</span>
                                                </div>
                                                <input type="text" class="form-control" id="corpsPriseService" name="corpsPriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" id="gradePriseService" name="gradePriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" id="indicePriseService" name="indicePriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" id="categPriseService" name="categPriseService" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur Veille d'Integration:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 3 - 5</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DATE DU VEILLE D'INTEGRATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="dateVeilleIntegre" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="corpsVeilleIntegre" id="corpsVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="gradeVeilleIntegre" id="gradeVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="indiceVeilleIntegre" id="indiceVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="categVeilleIntegre" id="categVeilleIntegre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Suivant</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>

                        <fieldset>
                            <div class="form-card text-left">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur Titularisation:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Etape 4 - 5</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>INTEGRE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">i</span>
                                                </div>
                                                <input type="text" class="form-control" name="integre" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DATE DE TITULARISATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="date" name="dateTitularisation" class="form-control" id="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CORPS: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="corpsTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>GRADE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="gradeTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>INDICE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="indiceTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CATEGORIE: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="categTitularisation" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" onclick="validationHideCnapsShow()">Suivant</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" onclick="validationShowCnapsHide()">Precedant</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row text-left">
                                    <div class="col-7">
                                        <h3 class="mb-4">Information sur la Validation:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps" id="step1">Etape 5 - 5</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6">
                                        
                                        <input type="hidden" name="immatricule" id="imInptutEtatPrive">
                                        <input type="hidden" name="cas" id="casInptutEtatPrive">
                                        <div class="form-group">
                                            <label>POSTE DE TRAVAIL: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">P</span>
                                                </div>
                                                <input type="text" class="form-control" name="poste" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DIRECTION DE TRAVAIL: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">D</span>
                                                </div>
                                                <input type="text" class="form-control" name="direction" placeholder="">
                                                <div class="valid-feedback">Remplit.</div>
                                                <div class="invalid-feedback">Veillez remplir le champ.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE DE VALIDATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateValidation" class="form-control" id="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateValidation" class="form-control" id="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>DATE RETARD DU VALIDATION: *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">DU</span>
                                                </div>
                                                <input type="date" name="duDateRetard" class="form-control" id="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">AU</span>
                                                </div>
                                                <input type="date" name="auDateRetard" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Suivant</button> -->
                            <button type="button" data-toggle="modal" data-target="#myModalEtatPrive" class="btn btn-primary float-right">Valider</button>
                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Précédent</button>
                            <button type="button" name="cancel" class="btn btn-secondary cancel action-button float-right" value="Cancel" onclick="cancelValidation()">Annuler</button>
                        </fieldset>
                        <div id="myModalEtatPrive" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voullez-vous l'Inserer ?</p>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                        <button type="submit" class="btn btn-danger">OUI</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
        function validationShowCnapsHide() {
            const Validation = document.getElementById('accounts');
            const CNaPS = document.getElementById('confirms');
            Validation.style.display = 'block';
            CNaPS.style.display = 'none';

        }
        function validationHideCnapsShow() {
            const Validation = document.getElementById('accounts');
            const CNaPS = document.getElementById('confirms');
            Validation.style.display = 'none';
            CNaPS.style.display = 'block';
        }
        function test() {
            document.getElementById('accounts').style.display = 'none';
        }
        function traitement(immatricule) {
            const startPage = document.getElementById('startPage');
            const traitement = document.getElementById('traitement');
            const Etat = document.getElementById('Etat');
            const Prive = document.getElementById('Prive');
            const EtatPrive = document.getElementById('EtatPrive');
            const cas = document.getElementById('Cas'+immatricule).value;
            const imInptutEtat = document.getElementById('imInptutEtat');
            const imInptutPrive = document.getElementById('imInptutPrive');
            const imInptutEtatPrive = document.getElementById('imInptutEtatPrive');
            const casInptutEtat = document.getElementById('casInptutEtat');
            const casInptutPrive = document.getElementById('casInptutPrive');
            const casInptutEtatPrive = document.getElementById('casInptutEtatPrive');
            const MontantPrive = document.getElementById('MontantPrive');
            const MontantECD = document.getElementById('MontantECD');

            startPage.style.display = 'none';
            traitement.style.display = 'block';

            if (cas === "EFA" || cas === "ELD-EFA") {
                // startPage.style.display = 'none';
                // traitement.style.display = 'block';
                Etat.style.display = 'block';
                imInptutEtat.value = immatricule;
                casInptutEtat.value = cas;
               
            }else if(cas === "ServicePrive" || cas === "ECD" || cas === "ServicePrive-ECD"){
                // startPage.style.display = 'none';
                // traitement.style.display = 'block';
                Prive.style.display = 'block';
                imInptutPrive.value = immatricule;
                casInptutPrive.value = cas;
                if(cas === "ServicePrive"){
                    MontantECD.style.display = 'none';
                }else if(cas === "ECD"){
                    MontantPrive.style.display = 'none';
                }else if(cas === "ServicePrive-ECD"){
                    MontantPrive.style.display = 'block';
                    MontantECD.style.display = 'block';
                }
            }else{
                // startPage.style.display = 'none';
                // traitement.style.display = 'block';
                EtatPrive.style.display = 'block';
                imInptutEtatPrive.value = immatricule;
                casInptutEtatPrive.value = cas;
            }
        }

        function cancelValidation(){
            // const startPage = document.getElementById('startPage');
            // const traitement = document.getElementById('traitement');
            // startPage.style.display = 'block';
            // traitement.style.display = 'none';
            location.reload();
        }
    </script>

              
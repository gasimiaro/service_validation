<?php if (!empty($results)): ?>
    <?php foreach ($results as $agent){ 
    $immatricule = $agent->imatricule; 
    $nom = $agent->NOM; 
    $prenoms = $agent->PRENOMS; 
    $indice = $agent->INDICE; 
    ?>
        <div class="row">
                <p>
                    Type de budget : &nbsp;
                </p>
                <div class="col-lg-8">
                    <div class="iq-card">
                        <div class="iq-card-body p-0">
                            <div class="iq-edit-list">
                                <ul class="iq-edit-profile d-flex nav nav-pills">
                                    <li class="col-md-4 p-0">
                                        <a class="nav-link" data-toggle="pill" href="#BGInfo">
                                            Budget Général
                                        </a>
                                    </li>
                                    <li class="col-md-4 p-0">
                                        <a class="nav-link" data-toggle="pill" href="#BAInfo">
                                            Budget Autonome
                                        </a>
                                    </li>
                                    <li class="col-md-4 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#BAGInfo">
                                        Budget Autonome-Général
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="iq-edit-list-data">
                        <div class="tab-content">
                                <div class="tab-pane fade" id="BGInfo" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Au Nom de <?php echo $nom.' '.$prenoms ;?> titulaire d'immatricule <?php echo $immatricule ;?></h4>
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="col-lg-12" id="CAS" style="display: noneS;">
                                                <div class="frame">
                                                    <button id="ServicePrive_BG" class="custom-btn btn-12" onclick="updateValueCasBG('ServicePrive')"><span>Cas Service Privé</span><span>Service Privé</span></button>
                                                    <button id="ECD_BG" class="custom-btn btn-12" onclick="updateValueCasBG('ECD')"><span>Cas ECD</span><span>ECD</span></button>
                                                    <button id="ELD_BG" class="custom-btn btn-12" onclick="updateValueCasBG('ELD')"><span>Cas ELD</span><span>ELD</span></button>
                                                    <button id="EFA_BG" class="custom-btn btn-12" onclick="updateValueCasBG('EFA')"><span>Cas EFA</span><span>EFA</span> </button>
                                                
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        
                                        <div class="iq-card-body" id="verifPiece" style="display: none;">
                                            <form  action="<?php echo base_url(); ?>validationcontroller/addValidation" method="post">
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6" id="pieceBASEBG">
                                                        <h4 class="mb-25">Piéce de base</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBG1">
                                                            <label class="custom-control-label" for="switchPieceBaseBG1">Formulaire de demande dûment rempli ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBG2">
                                                            <label class="custom-control-label" for="switchPieceBaseBG2">Arrêté d’intégration ou de nomination ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBG3">
                                                            <label class="custom-control-label" for="switchPieceBaseBG3">Arrêté de titularisation ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBG4">
                                                            <label class="custom-control-label" for="switchPieceBaseBG4">Relevé de Service bien détaillé <br>et signé par le responsable du personnel ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBG5">
                                                            <label class="custom-control-label" for="switchPieceBaseBG5">Photocopie de l’avis de crédit ou du bon de caisse ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBG6">
                                                            <label class="custom-control-label" for="switchPieceBaseBG6">Photocopie de la CIN.</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6" id="pieceSPECIFIQUEBG">
                                                        <div class="row specEFABG" id="specEFABG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour EFA</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABG1">
                                                                <label class="custom-control-label" for="switchPieceEFABG1">Première et dernièr contrat de travail;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABG2">
                                                                <label class="custom-control-label" for="switchPieceEFABG2">Avenant s'il a reclassement</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABG3">
                                                                <label class="custom-control-label" for="switchPieceEFABG3">Attestation de prise de service</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specECDBG" id="specECDBG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour ECD</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBG1">
                                                                <label class="custom-control-label" for="switchPieceECDBG1">Première et dernièr décision d'engagement;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBG2">
                                                                <label class="custom-control-label" for="switchPieceECDBG2">Cértificat de non interruption de service; </label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBG3">
                                                                <label class="custom-control-label" for="switchPieceECDBG3">Relevé de services émenant dans le CNaPS <br> (pour le transfert des cotisations)</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specSerPriveBG" id="specSerPriveBG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour Service Privé</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBG1">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBG1">Cértificat de Travail;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBG2">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBG2">Relevé de services émenant de la CNaPS <br>(pour le transfert des cotisations);</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBG3">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBG3">Lettre d'engagement de payer la part individuelle de 4%  <br>et la part patronale de 16%. (4% + 16%);</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specELDBG" id="specELDBG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour ELD</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceELDBG">
                                                                <label class="custom-control-label" for="switchPieceELDBG">Première et dernièr décision d'engagement
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4" id="informationBG" style="display: none;">
                                                        <h4 class="mb-25">Autre informaion</h4>
                                                        <input type="hidden" value="<?php echo $immatricule ;?>" name="immatricule">

                                                        <input type="text" value="BG" name="typeBudget" id="typeBudgetBG">

                                                        <input type="hidden" name="cas" id="casBG" >
                                                        <div class="form-group was-validated">
                                                            <label for="#">Comptable</label>
                                                            <select class="custom-select" name="comptable" required>
                                                                <option value="">Sélectioné le comptable</option>
                                                                <?php foreach ($comptable as $comptab){ 
                                                                    $imat = $comptab->imUser; 
                                                                    $prenom = $comptab->prenom; 
                                                                ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="valid-feedback">Remplit</div>
                                                            <div class="invalid-feedback">Veillez Sélectioné le comptable</div>
                                                        </div>
                                                        <div class="btn-group btn-group-lg">
                                                            <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                                            <button type="button" id="reset" class="btn iq-bg-danger">Annuler</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="BAGInfo" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Au Nom3 de <?php echo $nom.' '.$prenoms ;?> titulaire d'immatricule <?php echo $immatricule ;?></h4>
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="col-lg-12" id="CAS" style="display: noneS;">
                                                <div class="frame">
                                                    <button id="ServicePrive_BAG" class="custom-btn btn-12" onclick="updateValueCasBAG('ServicePrive')"><span>Cas Service Privé</span><span>Service Privé</span></button>
                                                    <button id="ECD_BAG" class="custom-btn btn-12" onclick="updateValueCasBAG('ECD')"><span>Cas ECD</span><span>ECD</span></button>
                                                    <button id="ELD_BAG" class="custom-btn btn-12" onclick="updateValueCasBAG('ELD')"><span>Cas ELD</span><span>ELD</span></button>
                                                    <button id="EFA_BAG" class="custom-btn btn-12" onclick="updateValueCasBAG('EFA')"><span>Cas EFA</span><span>EFA</span> </button>
                                                
                                                    
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        
                                        <div class="iq-card-body" id="verifPieceBAG" style="display : none;">
                                        <form  action="<?php echo base_url(); ?>validationcontroller/addValidation" method="post">
                                                
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6" id="pieceBASEBAG">
                                                        <h4 class="mb-25">Piéce de base</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBAG1">
                                                            <label class="custom-control-label" for="switchPieceBaseBAG1">Formulaire de demande dûment rempli ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBAG2">
                                                            <label class="custom-control-label" for="switchPieceBaseBAG2">Arrêté d’intégration ou de nomination ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBAG3">
                                                            <label class="custom-control-label" for="switchPieceBaseBAG3">Arrêté de titularisation ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBAG4">
                                                            <label class="custom-control-label" for="switchPieceBaseBAG4">Relevé de Service bien détaillé <br>et signé par le responsable du personnel ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBAG5">
                                                            <label class="custom-control-label" for="switchPieceBaseBAG5">Photocopie de l’avis de crédit ou du bon de caisse ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBAG6">
                                                            <label class="custom-control-label" for="switchPieceBaseBAG6">Photocopie de la CIN.</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6" id="pieceSPECIFIQUEBAG">
                                                        <div class="row specEFABAG" id="specEFABAG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour EFA</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABAG1">
                                                                <label class="custom-control-label" for="switchPieceEFABAG1">Première et dernièr contrat de travail;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABAG2">
                                                                <label class="custom-control-label" for="switchPieceEFABAG2">Avenant s'il a reclassement</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABAG3">
                                                                <label class="custom-control-label" for="switchPieceEFABAG3">Attestation de prise de service</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specECDBAG" id="specECDBAG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour ECD</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBAG1">
                                                                <label class="custom-control-label" for="switchPieceECDBAG1">Première et dernièr décision d'engagement;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBAG2">
                                                                <label class="custom-control-label" for="switchPieceECDBAG2">Cértificat de non interruption de service; </label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBAG3">
                                                                <label class="custom-control-label" for="switchPieceECDBAG3">Relevé de services émenant dans le CNaPS <br> (pour le transfert des cotisations)</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specSerPriveBAG" id="specSerPriveBAG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour Service Privé</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBAG1">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBAG1">Cértificat de Travail;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBAG2">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBAG2">Relevé de services émenant de la CNaPS <br>(pour le transfert des cotisations);</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBAG3">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBAG3">Lettre d'engagement de payer la part individuelle de 4%  <br>et la part patronale de 16%. (4% + 16%);</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specELDBAG" id="specELDBAG" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour ELD</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceELDBAG">
                                                                <label class="custom-control-label" for="switchPieceELDBAG">Première et dernièr décision d'engagement
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4" id="informationBAG" style="display: none;">
                                                        <h4 class="mb-25">Autre informaion</h4>
                                                        <input type="hidden" value="<?php echo $immatricule ;?>" name="immatricule">

                                                        <input type="text" value="BABG" name="typeBudget" id="typeBudgetBAG">

                                                        <input type="hidden" name="cas" id="casBAG" >
                                                        <div class="form-group was-validated">
                                                            <label for="#">Comptable</label>
                                                            <select class="custom-select" name="comptable" required>
                                                                <option value="">Sélectioné le comptable</option>
                                                                <?php foreach ($comptable as $comptab){ 
                                                                    $imat = $comptab->imUser; 
                                                                    $prenom = $comptab->prenom; 
                                                                ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="valid-feedback">Remplit</div>
                                                            <div class="invalid-feedback">Veillez Sélectioné le comptable</div>
                                                        </div>
                                                        <div class="btn-group btn-group-lg">
                                                            <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                                            <button type="button" id="reset" class="btn iq-bg-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 justify-content-center">
                                                        <div class="row specBAG" id="specBAG" style="display: nones;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour Budget Autonome</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceBAG">
                                                                <label class="custom-control-label" for="switchPieceBAG">Relevé des cotisations CPR 3% avec références des mandats de versement au Trésor public<br>
                                                                (visé et reconnu par le responsable du Trésor ou de la Perception ou ont été payeés le cotisations);</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="tab-pane fade" id="BAInfo" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Au Nom de <?php echo $nom.' '.$prenoms ;?> titulaire d'immatricule <?php echo $immatricule ;?></h4>
                                            
                                            
                                        </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="col-lg-12" id="CAS" style="display: noneS;">
                                                <div class="frame">
                                                    <button id="ServicePrive_BA" class="custom-btn btn-12" onclick="updateValueCasBA('ServicePrive')"><span>Cas Service Privé</span><span>Service Privé</span></button>
                                                    <button id="ECD_BA" class="custom-btn btn-12" onclick="updateValueCasBA('ECD')"><span>Cas ECD</span><span>ECD</span></button>
                                                    <button id="ELD_BA" class="custom-btn btn-12" onclick="updateValueCasBA('ELD')"><span>Cas ELD</span><span>ELD</span></button>
                                                    <button id="EFA_BA" class="custom-btn btn-12" onclick="updateValueCasBA('EFA')"><span>Cas EFA</span><span>EFA</span> </button>
                                                    
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        
                                        <div class="iq-card-body" id="verifPieceBA" style="display: none;">
                                        <form  action="<?php echo base_url(); ?>validationcontroller/addValidation" method="post">                                                
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6" id="pieceBASEBA">
                                                        <h4 class="mb-25">Piéce de base</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBA1">
                                                            <label class="custom-control-label" for="switchPieceBaseBA1">Formulaire de demande dûment rempli ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBA2">
                                                            <label class="custom-control-label" for="switchPieceBaseBA2">Arrêté d’intégration ou de nomination ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBA3">
                                                            <label class="custom-control-label" for="switchPieceBaseBA3">Arrêté de titularisation ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBA4">
                                                            <label class="custom-control-label" for="switchPieceBaseBA4">Relevé de Service bien détaillé <br>et signé par le responsable du personnel ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBA5">
                                                            <label class="custom-control-label" for="switchPieceBaseBA5">Photocopie de l’avis de crédit ou du bon de caisse ;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceBaseBA6">
                                                            <label class="custom-control-label" for="switchPieceBaseBA6">Photocopie de la CIN.</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6" id="pieceSPECIFIQUEBA">
                                                        <div class="row specEFABA" id="specEFABA" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour EFA</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABA1">
                                                                <label class="custom-control-label" for="switchPieceEFABA1">Première et dernièr contrat de travail;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABA2">
                                                                <label class="custom-control-label" for="switchPieceEFABA2">Avenant s'il a reclassement</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceEFABA3">
                                                                <label class="custom-control-label" for="switchPieceEFABA3">Attestation de prise de service</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specECDBA" id="specECDBA" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour ECD</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBA1">
                                                                <label class="custom-control-label" for="switchPieceECDBA1">Première et dernièr décision d'engagement;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBA2">
                                                                <label class="custom-control-label" for="switchPieceECDBA2">Cértificat de non interruption de service; </label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceECDBA3">
                                                                <label class="custom-control-label" for="switchPieceECDBA3">Relevé de services émenant dans le CNaPS <br> (pour le transfert des cotisations)</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specSerPriveBA" id="specSerPriveBA" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour Service Privé</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBA1">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBA1">Cértificat de Travail;</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBA2">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBA2">Relevé de services émenant de la CNaPS <br>(pour le transfert des cotisations);</label>
                                                            </div>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBA3">
                                                                <label class="custom-control-label" for="switchPieceSerPriveBA3">Lettre d'engagement de payer la part individuelle de 4%  <br>et la part patronale de 16%. (4% + 16%);</label>
                                                            </div>
                                                        </div>
                                                        <div class="row specELDBA" id="specELDBA" style="display: none;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour ELD</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceELDBA">
                                                                <label class="custom-control-label" for="switchPieceELDBA">Première et dernièr décision d'engagement
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4" id="informationBA" style="display: none;">
                                                        <h4 class="mb-25">Autre informaion</h4>
                                                        <input type="hidden" value="<?php echo $immatricule ;?>" name="immatricule">


                                                        <input type="text" value="BA" name="typeBudget" id="typeBudgetBA">


                                                        <input type="hidden" name="cas" id="casBA" >
                                                        <div class="form-group was-validated">
                                                            <label for="#">Comptable</label>
                                                            <select class="custom-select" name="comptable" required>
                                                                <option value="">Sélectioné le comptable</option>
                                                                <?php foreach ($comptable as $comptab){ 
                                                                    $imat = $comptab->imUser; 
                                                                    $prenom = $comptab->prenom; 
                                                                ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="valid-feedback">Remplit</div>
                                                            <div class="invalid-feedback">Veillez Sélectioné le comptable</div>
                                                        </div>
                                                        <div class="btn-group btn-group-lg">
                                                            <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                                            <button type="button" id="reset" class="btn iq-bg-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 justify-content-center">
                                                        <div class="row specBA" id="specBA" style="display: nones;">
                                                            <h4 class="mb-25">Piéce Spécifiquement pour Budget Autonome</h4>
                                                            <div class="col-4 col-md-9 custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="switchPieceBA">
                                                                <label class="custom-control-label" for="switchPieceBA">Relevé des cotisations CPR 3% avec références des mandats de versement au Trésor public<br>
                                                                (visé et reconnu par le responsable du Trésor ou de la Perception ou ont été payeés le cotisations);</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>

                               

                        </div>
                    </div>
                </div>
         </div>
<!-- </div>
</div> -->
<script>

    $("button").click(function(){
        $("h1, h2, p").addClass("blue");
        $("div").addClass("important");
    });
    
    function uncheckCheckboxes() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
    // Parcourez la liste des cases à cocher et decochez-les
    checkboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
    const reset = document.getElementById("reset");
    reset.addEventListener("click", function() {

        document.getElementById('informationBG').style.display = "none";
        $("#pieceBASEBG").removeClass("col-lg-4");
        $("#pieceBASEBG").addClass("col-lg-6");
        $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
        $("#pieceSPECIFIQUEBG").addClass("col-lg-6");

        document.getElementById('informationBA').style.display = "none";
        $("#pieceBASEBA").removeClass("col-lg-4");
        $("#pieceBASEBA").addClass("col-lg-6");
        $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
        $("#pieceSPECIFIQUEBA").addClass("col-lg-6");

        document.getElementById('informationBAG').style.display = "none";
        $("#pieceBASEBAG").removeClass("col-lg-4");
        $("#pieceBASEBAG").addClass("col-lg-6");
        $("#pieceSPECIFIQUEBAG").removeClass("col-lg-4");
        $("#pieceSPECIFIQUEBAG").addClass("col-lg-6");

        
        uncheckCheckboxes();
    });

    
    
    document.getElementById('informationBG').style.display = "none";
    $("#pieceBASEBG").removeClass("col-lg-4");
    $("#pieceBASEBG").addClass("col-lg-6");
    $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
    $("#pieceSPECIFIQUEBG").addClass("col-lg-6");

    document.getElementById('informationBA').style.display = "none";
    $("#pieceBASEBA").removeClass("col-lg-4");
    $("#pieceBASEBA").addClass("col-lg-6");
    $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
    $("#pieceSPECIFIQUEBA").addClass("col-lg-6");

    document.getElementById('informationBAG').style.display = "none";
        $("#pieceBASEBAG").removeClass("col-lg-4");
        $("#pieceBASEBAG").addClass("col-lg-6");
        $("#pieceSPECIFIQUEBAG").removeClass("col-lg-4");
        $("#pieceSPECIFIQUEBAG").addClass("col-lg-6");


}
    function updateValueCasBG(value) {
  
         var isActive = $("#"+value+"_BG span").hasClass("active");

            if (!isActive) {
                $("#"+value+"_BG span").addClass("active").css({
                    background: "linear-gradient(0deg, rgba(0,172,2,1) 0%, rgba(2,126,2,1) 100%)",
                    transition: "all 0.3s"
                });
            } else {
                $("#"+value+"_BG span").removeClass("active");

                $("#"+value+"_BG span").css({
                    background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", 
                    transition: "all 0.3s"
                });
            }
    


        const verifPiece = document.getElementById('verifPiece');
        const specEFA = document.getElementById('specEFABG');
        const specECD = document.getElementById('specECDBG');
        const specELD = document.getElementById('specELDBG');
        const specSerPrive = document.getElementById('specSerPriveBG');
        const information = document.getElementById('informationBG');
        const typeBudgetInput = document.getElementById('typeBudgetBG');
        const casInput = document.getElementById('casBG');

        const typeBudgetValue = typeBudgetInput.value;
        var currentValue = casInput.value;
        
        if (typeBudgetValue === "BG") {
            if (casInput.value) {
            var parts = currentValue.split('-');
                var index = parts.indexOf(value);    
                if (index === -1) {
                    casInput.value = currentValue + '-' + value;
                } else {
                    parts.splice(index, 1);
                    casInput.value = parts.join('-');

                }
            } else {
            casInput.value = value;
            }
        }

        if (casInput.value === "") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'none';
          uncheckCheckboxes();
        }else if (casInput.value === "EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ServicePrive") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'block';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }else if ( casInput.value === "ServicePrive-ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'block';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }
        // else if (casInput.value === "EFA-ECD") {
        //   specEFA.style.display = 'block';
        //   specECD.style.display = 'block';
        //   specELD.style.display = 'none';
        //   specSerPrive.style.display = 'none';
        //   verifPiece.style.display = 'block';
        //   uncheckCheckboxes();
        // }
        // else if (casInput.value === "ECD-ELD") {
        //   specEFA.style.display = 'none';
        //   specECD.style.display = 'block';
        //   specELD.style.display = 'block';
        //   specSerPrive.style.display = 'none';
        //   verifPiece.style.display = 'block';
        //   uncheckCheckboxes();
        // }
        else if (casInput.value === "ECD-ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }
        else if (casInput.value === "ECD-ELD-EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'block';
          uncheckCheckboxes();
        }
        else{
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPiece.style.display = 'none';
          casInput.value = "";

          $("#EFA_BG span, #ECD_BG span, #ELD_BG span, #ServicePrive_BG span").removeClass("active");

            $("#EFA_BG span, #ECD_BG span, #ELD_BG span, #ServicePrive_BG span").css({
                background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", 
                transition: "all 0.3s"
            });
          uncheckCheckboxes();
        }

        $(document).ready(function(){
            const switchPieceBaseBG1 = document.getElementById("switchPieceBaseBG1");
            const switchPieceBaseBG2 = document.getElementById("switchPieceBaseBG2");
            const switchPieceBaseBG3 = document.getElementById("switchPieceBaseBG3");
            const switchPieceBaseBG4 = document.getElementById("switchPieceBaseBG4");
            const switchPieceBaseBG5 = document.getElementById("switchPieceBaseBG5");
            const switchPieceBaseBG6 = document.getElementById("switchPieceBaseBG6");
            const switchPieceEFABG1 = document.getElementById("switchPieceEFABG1");
            const switchPieceEFABG2 = document.getElementById("switchPieceEFABG2");
            const switchPieceEFABG3 = document.getElementById("switchPieceEFABG3");
            const switchPieceECDBG1 = document.getElementById("switchPieceECDBG1");
            const switchPieceECDBG2 = document.getElementById("switchPieceECDBG2");
            const switchPieceECDBG3 = document.getElementById("switchPieceECDBG3");
            const switchPieceSerPriveBG1 = document.getElementById("switchPieceSerPriveBG1");
            const switchPieceSerPriveBG2 = document.getElementById("switchPieceSerPriveBG2");
            const switchPieceSerPriveBG3 = document.getElementById("switchPieceSerPriveBG3");
            const switchPieceELDBG = document.getElementById("switchPieceELDBG");

            const typeBudgetInput = document.getElementById('typeBudgetBG');
            const casInput = document.getElementById('casBG');
            const casValue = casInput.value;
            const typeBudget =typeBudgetInput.value;
            
            const pieceBASEBG = document.getElementById("pieceBASEBG")
            const pieceSPECIFIQUEBG = document.getElementById("pieceSPECIFIQUEBG")
            const informationBG = document.getElementById("informationBG")

            

            switchPieceBaseBG1.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBG2.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBG3.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBG4.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBG5.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBG6.addEventListener("change", checkIfAllChecked);
            switchPieceEFABG1.addEventListener("change", checkIfAllChecked);
            switchPieceEFABG2.addEventListener("change", checkIfAllChecked);
            switchPieceEFABG3.addEventListener("change", checkIfAllChecked);
            switchPieceECDBG1.addEventListener("change", checkIfAllChecked);
            switchPieceECDBG2.addEventListener("change", checkIfAllChecked);
            switchPieceECDBG3.addEventListener("change", checkIfAllChecked);
            switchPieceSerPriveBG1.addEventListener("change", checkIfAllChecked);
            switchPieceSerPriveBG2.addEventListener("change", checkIfAllChecked);
            switchPieceSerPriveBG3.addEventListener("change", checkIfAllChecked);
            switchPieceELDBG.addEventListener("change", checkIfAllChecked);

            function checkIfAllChecked() {
                if (switchPieceBaseBG1.checked && switchPieceBaseBG2.checked && switchPieceBaseBG3.checked && switchPieceBaseBG4.checked && switchPieceBaseBG5.checked && switchPieceBaseBG6.checked){
                    if (casValue === "EFA"|| casValue === "ECD" || casValue === "ELD" || casValue === "ServicePrive") {
                        if ((switchPieceEFABG1.checked && switchPieceEFABG2.checked && switchPieceEFABG3.checked) || (switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) || switchPieceELDBG.checked || (switchPieceSerPriveBG1.checked && switchPieceSerPriveBG2.checked && switchPieceSerPriveBG3.checked)) {
                            
                            informationBG.style.display = "block";
                            $("#pieceBASEBG").removeClass("col-lg-6");
                            $("#pieceBASEBG").addClass("col-lg-4");
                            $("#pieceSPECIFIQUEBG").removeClass("col-lg-6");
                            $("#pieceSPECIFIQUEBG").addClass("col-lg-4");
                        }else{
                            informationBG.style.display = "none";
                            $("#pieceBASEBG").removeClass("col-lg-4");
                            $("#pieceBASEBG").addClass("col-lg-6");
                            $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                            $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                        }
                    }else if (casValue === "ServicePrive-ECD") {
                        if ((switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) && (switchPieceSerPriveBG1.checked && switchPieceSerPriveBG2.checked && switchPieceSerPriveBG3.checked)) {
                            
                            informationBG.style.display = "block";
                            $("#pieceBASEBG").removeClass("col-lg-6");
                            $("#pieceBASEBG").addClass("col-lg-4");
                            $("#pieceSPECIFIQUEBG").removeClass("col-lg-6");
                            $("#pieceSPECIFIQUEBG").addClass("col-lg-4");
                        }else{
                            informationBG.style.display = "none";
                            $("#pieceBASEBG").removeClass("col-lg-4");
                            $("#pieceBASEBG").addClass("col-lg-6");
                            $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                            $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                        }
                    }
                    else if (casValue === "ECD-ELD-EFA" ) {
                        if ((switchPieceEFABG1.checked && switchPieceEFABG2.checked && switchPieceEFABG3.checked) && (switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) && switchPieceELDBG.checked) {
                            
                            informationBG.style.display = "block";
                            $("#pieceBASEBG").removeClass("col-lg-6");
                            $("#pieceBASEBG").addClass("col-lg-4");
                            $("#pieceSPECIFIQUEBG").removeClass("col-lg-6");
                            $("#pieceSPECIFIQUEBG").addClass("col-lg-4");
                        }else{
                            informationBG.style.display = "none";
                            $("#pieceBASEBG").removeClass("col-lg-4");
                            $("#pieceBASEBG").addClass("col-lg-6");
                            $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                            $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                        }
                    }
                    else{
                        informationBG.style.display = "none";
                        $("#pieceBASEBG").removeClass("col-lg-4");
                        $("#pieceBASEBG").addClass("col-lg-6");
                        $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                        $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                    }
                    
                }else{
                    informationBG.style.display = "none";
                    $("#pieceBASEBG").removeClass("col-lg-4");
                    $("#pieceBASEBG").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                }
            }

        });
        console.log("voakitika ny "+ casInput.value);

    }

    function updateValueCasBA(value) {


        var isActive = $("#"+value+"_BA span").hasClass("active");


if (!isActive) {
    $("#"+value+"_BA span").addClass("active").css({
        background: "linear-gradient(0deg, rgba(0,172,2,1) 0%, rgba(2,126,2,1) 100%)",
        transition: "all 0.3s"
    });
} else {
    $("#"+value+"_BA span").removeClass("active");

    $("#"+value+"_BA span").css({
        background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", // Remplacez cette valeur par le style d'origine que vous souhaitez
        transition: "all 0.3s"
    });
}



        const verifPieceBA = document.getElementById('verifPieceBA');
        const specEFA = document.getElementById('specEFABA');
        const specECD = document.getElementById('specECDBA');
        const specELD = document.getElementById('specELDBA');
        const specSerPrive = document.getElementById('specSerPriveBA');
        const information = document.getElementById('informationBA');
        const typeBudgetInput = document.getElementById('typeBudgetBA');
        const casInput = document.getElementById('casBA');

        const typeBudgetValue = typeBudgetInput.value;
        var currentValue = casInput.value;
        
        if (typeBudgetValue === "BA") {
            if (casInput.value) {
            var parts = currentValue.split('-');
                var index = parts.indexOf(value);
    
                if (index === -1) {
                    casInput.value = currentValue + '-' + value;
                } else {
                    parts.splice(index, 1);
                    casInput.value = parts.join('-');
                    //document.getElementById("information").style.display = "none";
                }
            } else {
            casInput.value = value;
            }
        }

        if (casInput.value === "") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'none';
          uncheckCheckboxes();
        }else if (casInput.value === "EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ServicePrive") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'block';
          verifPieceBA.style.display = 'block';
          uncheckCheckboxes();
        }
        else if (casInput.value === "ECD-ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'block';
          uncheckCheckboxes();
        }
        
        else if (casInput.value === "ECD-ELD-EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'block';
          uncheckCheckboxes();
        }else{
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPieceBA.style.display = 'none';
          casInput.value = "";
          $("#EFA_BA span, #ECD_BA span, #ELD_BA span, #ServicePrive_BA span").removeClass("active");

          $("#EFA_BA span, #ECD_BA span, #ELD_BA span, #ServicePrive_BA span").css({
            background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", 
            transition: "all 0.3s"
           });

          uncheckCheckboxes();
        }

        $(document).ready(function(){
            const switchPieceBaseBA1 = document.getElementById("switchPieceBaseBA1");
            const switchPieceBaseBA2 = document.getElementById("switchPieceBaseBA2");
            const switchPieceBaseBA3 = document.getElementById("switchPieceBaseBA3");
            const switchPieceBaseBA4 = document.getElementById("switchPieceBaseBA4");
            const switchPieceBaseBA5 = document.getElementById("switchPieceBaseBA5");
            const switchPieceBaseBA6 = document.getElementById("switchPieceBaseBA6");
            const switchPieceBA = document.getElementById("switchPieceBA");
            const switchPieceEFABA1 = document.getElementById("switchPieceEFABA1");
            const switchPieceEFABA2 = document.getElementById("switchPieceEFABA2");
            const switchPieceEFABA3 = document.getElementById("switchPieceEFABA3");
            const switchPieceECDBA1 = document.getElementById("switchPieceECDBA1");
            const switchPieceECDBA2 = document.getElementById("switchPieceECDBA2");
            const switchPieceECDBA3 = document.getElementById("switchPieceECDBA3");
            const switchPieceSerPriveBA1 = document.getElementById("switchPieceSerPriveBA1");
            const switchPieceSerPriveBA2 = document.getElementById("switchPieceSerPriveBA2");
            const switchPieceSerPriveBA3 = document.getElementById("switchPieceSerPriveBA3");
            const switchPieceELDBA = document.getElementById("switchPieceELDBA");

            const typeBudgetInput = document.getElementById('typeBudgetBA');
            const casInput = document.getElementById('casBA');
            const casValue = casInput.value;
            const typeBudget =typeBudgetInput.value;
            
            const pieceBASEBA = document.getElementById("pieceBASEBA")
            const pieceSPECIFIQUEBA = document.getElementById("pieceSPECIFIQUEBA")
            const informationBA = document.getElementById("informationBA")

            

            switchPieceBaseBA1.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBA2.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBA3.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBA4.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBA5.addEventListener("change", checkIfAllChecked);
            switchPieceBaseBA6.addEventListener("change", checkIfAllChecked);
            switchPieceBA.addEventListener("change", checkIfAllChecked);
            switchPieceEFABA1.addEventListener("change", checkIfAllChecked);
            switchPieceEFABA2.addEventListener("change", checkIfAllChecked);
            switchPieceEFABA3.addEventListener("change", checkIfAllChecked);
            switchPieceECDBA1.addEventListener("change", checkIfAllChecked);
            switchPieceECDBA2.addEventListener("change", checkIfAllChecked);
            switchPieceECDBA3.addEventListener("change", checkIfAllChecked);
            switchPieceSerPriveBA1.addEventListener("change", checkIfAllChecked);
            switchPieceSerPriveBA2.addEventListener("change", checkIfAllChecked);
            switchPieceSerPriveBA3.addEventListener("change", checkIfAllChecked);
            switchPieceELDBA.addEventListener("change", checkIfAllChecked);

            function checkIfAllChecked() {
                if (switchPieceBaseBA1.checked && switchPieceBaseBA2.checked && switchPieceBaseBA3.checked && switchPieceBaseBA4.checked && switchPieceBaseBA5.checked && switchPieceBaseBA6.checked && switchPieceBA.checked){
                    if (casValue === "EFA"|| casValue === "ECD" || casValue === "ELD" || casValue === "ServicePrive") {
                        if ((switchPieceEFABA1.checked && switchPieceEFABA2.checked && switchPieceEFABA3.checked) || (switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) || switchPieceELDBA.checked || (switchPieceSerPriveBA1.checked && switchPieceSerPriveBA2.checked && switchPieceSerPriveBA3.checked)) {
                            
                            informationBA.style.display = "block";
                            $("#pieceBASEBA").removeClass("col-lg-6");
                            $("#pieceBASEBA").addClass("col-lg-4");
                            $("#pieceSPECIFIQUEBA").removeClass("col-lg-6");
                            $("#pieceSPECIFIQUEBA").addClass("col-lg-4");
                        }else{
                            informationBA.style.display = "none";
                            $("#pieceBASEBA").removeClass("col-lg-4");
                            $("#pieceBASEBA").addClass("col-lg-6");
                            $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                            $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                        }
                    }
                    // else if ( casValue === "ServicePrive-ECD") {
                    //     if ((switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) && (switchPieceSerPriveBA1.checked && switchPieceSerPriveBA2.checked && switchPieceSerPriveBA3.checked)) {
                            
                    //         informationBA.style.display = "block";
                    //         $("#pieceBASEBA").removeClass("col-lg-6");
                    //         $("#pieceBASEBA").addClass("col-lg-4");
                    //         $("#pieceSPECIFIQUEBA").removeClass("col-lg-6");
                    //         $("#pieceSPECIFIQUEBA").addClass("col-lg-4");
                    //     }else{
                    //         informationBA.style.display = "none";
                    //         $("#pieceBASEBA").removeClass("col-lg-4");
                    //         $("#pieceBASEBA").addClass("col-lg-6");
                    //         $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                    //         $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                    //     }
                    // }
                    else if (casValue === "ECD-ELD-EFA" ) {
                        if ((switchPieceEFABA1.checked && switchPieceEFABA2.checked && switchPieceEFABA3.checked) && (switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) && switchPieceELDBA.checked) {
                            
                            informationBA.style.display = "block";
                            $("#pieceBASEBA").removeClass("col-lg-6");
                            $("#pieceBASEBA").addClass("col-lg-4");
                            $("#pieceSPECIFIQUEBA").removeClass("col-lg-6");
                            $("#pieceSPECIFIQUEBA").addClass("col-lg-4");
                        }else{
                            informationBA.style.display = "none";
                            $("#pieceBASEBA").removeClass("col-lg-4");
                            $("#pieceBASEBA").addClass("col-lg-6");
                            $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                            $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                        }
                    }
                    else{
                        informationBA.style.display = "none";
                        $("#pieceBASEBA").removeClass("col-lg-4");
                        $("#pieceBASEBA").addClass("col-lg-6");
                        $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                        $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                    }
                    
                }else{
                    informationBA.style.display = "none";
                    $("#pieceBASEBA").removeClass("col-lg-4");
                    $("#pieceBASEBA").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                }
            }

        });
    }

    
    function updateValueCasBAG(value) {

        let isActive = $("#"+value+"_BAG span").hasClass("active");

if (!isActive) {
    $("#"+value+"_BAG span").addClass("active").css({
        background: "linear-gradient(0deg, rgba(0,172,2,1) 0%, rgba(2,126,2,1) 100%)",
        transition: "all 0.3s"
    });
} else {
    $("#"+value+"_BAG span").removeClass("active");

    // Si le bouton était déjà actif, supprimez la classe "active" et rétablissez le style d'origine
    $("#"+value+"_BAG span").css({
        background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", // Remplacez cette valeur par le style d'origine que vous souhaitez
        transition: "all 0.3s"
    });
}
console.log("voakitika3");


let verifPieceBAG = document.getElementById('verifPieceBAG');
let specEFA = document.getElementById('specEFABAG');
let specECD = document.getElementById('specECDBAG');
let specELD = document.getElementById('specELDBAG');
let specSerPrive = document.getElementById('specSerPriveBAG');
let information = document.getElementById('informationBAG');
let typeBudgetInput = document.getElementById('typeBudgetBAG');
let casInput = document.getElementById('casBAG');

let typeBudgetValue = typeBudgetInput.value;
let currentValue = casInput.value;

if (typeBudgetValue === "BABG") {
    if (casInput.value) {
    var parts = currentValue.split('-');
        var index = parts.indexOf(value);

        if (index === -1) {
            casInput.value = currentValue + '-' + value;
        } else {
            parts.splice(index, 1);
            casInput.value = parts.join('-');
            //document.getElementById("information").style.display = "none";
        }
    } else {
    casInput.value = value;
    }
}

if (casInput.value === "") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBAG.style.display = 'none';
  uncheckCheckboxes();
}
else if (casInput.value === "EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPieceBAG.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verifPieceBAG.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          verifPieceBAG.style.display = 'block';
          uncheckCheckboxes();
        }else if (casInput.value === "ServicePrive") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'block';
          verifPieceBAG.style.display = 'block';
          uncheckCheckboxes();
        }
        else if (casInput.value === "ServicePrive-ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'block';
          verifPieceBAG.style.display = 'block';
          uncheckCheckboxes();
        }
        else if (casInput.value === "ServicePrive-ECD-ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'block';
          verifPieceBAG.style.display = 'block';
          uncheckCheckboxes();
        }

else if (casInput.value === "ServicePrive-ECD-ELD-EFA") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'block';
  verifPieceBAG.style.display = 'block';
  uncheckCheckboxes();
}

else if (casInput.value === "ELD-EFA") {
  specEFA.style.display = 'block';
  specECD.style.display = 'none';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPieceBAG.style.display = 'block';
  uncheckCheckboxes();
}else{
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBAG.style.display = 'none';
  casInput.value = "";

  $("#EFA_BAG span, #ECD_BAG span, #ELD_BAG span, #ServicePrive_BAG span").removeClass("active");

  $("#EFA_BAG span, #ECD_BAG span, #ELD_BAG span, #ServicePrive_BAG span").css({
    background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", 
    transition: "all 0.3s"
  });

  uncheckCheckboxes();
}

$(document).ready(function(){
    const switchPieceBaseBAG1 = document.getElementById("switchPieceBaseBAG1");
    const switchPieceBaseBAG2 = document.getElementById("switchPieceBaseBAG2");
    const switchPieceBaseBAG3 = document.getElementById("switchPieceBaseBAG3");
    const switchPieceBaseBAG4 = document.getElementById("switchPieceBaseBAG4");
    const switchPieceBaseBAG5 = document.getElementById("switchPieceBaseBAG5");
    const switchPieceBaseBAG6 = document.getElementById("switchPieceBaseBAG6");
    const switchPieceBAG = document.getElementById("switchPieceBAG");
    const switchPieceEFABAG1 = document.getElementById("switchPieceEFABAG1");
    const switchPieceEFABAG2 = document.getElementById("switchPieceEFABAG2");
    const switchPieceEFABAG3 = document.getElementById("switchPieceEFABAG3");
    const switchPieceECDBAG1 = document.getElementById("switchPieceECDBAG1");
    const switchPieceECDBAG2 = document.getElementById("switchPieceECDBAG2");
    const switchPieceECDBAG3 = document.getElementById("switchPieceECDBAG3");
    const switchPieceSerPriveBAG1 = document.getElementById("switchPieceSerPriveBAG1");
    const switchPieceSerPriveBAG2 = document.getElementById("switchPieceSerPriveBAG2");
    const switchPieceSerPriveBAG3 = document.getElementById("switchPieceSerPriveBAG3");
    const switchPieceELDBAG = document.getElementById("switchPieceELDBAG");

    const typeBudgetInput = document.getElementById('typeBudgetBAG');
    const casInput = document.getElementById('casBAG');
    const casValue = casInput.value;
    const typeBudget =typeBudgetInput.value;
    
    const pieceBASEBAG = document.getElementById("pieceBASEBAG")
    const pieceSPECIFIQUEBAG = document.getElementById("pieceSPECIFIQUEBAG")
    const informationBAG = document.getElementById("informationBAG")

    

    switchPieceBaseBAG1.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBAG2.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBAG3.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBAG4.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBAG5.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBAG6.addEventListener("change", checkIfAllChecked);
    switchPieceBAG.addEventListener("change", checkIfAllChecked);
    switchPieceEFABAG1.addEventListener("change", checkIfAllChecked);
    switchPieceEFABAG2.addEventListener("change", checkIfAllChecked);
    switchPieceEFABAG3.addEventListener("change", checkIfAllChecked);
    switchPieceECDBAG1.addEventListener("change", checkIfAllChecked);
    switchPieceECDBAG2.addEventListener("change", checkIfAllChecked);
    switchPieceECDBAG3.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBAG1.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBAG2.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBAG3.addEventListener("change", checkIfAllChecked);
    switchPieceELDBAG.addEventListener("change", checkIfAllChecked);

    function checkIfAllChecked() {
        if (switchPieceBaseBAG1.checked && switchPieceBaseBAG2.checked && switchPieceBaseBAG3.checked && switchPieceBaseBAG4.checked && switchPieceBaseBAG5.checked && switchPieceBaseBAG6.checked && switchPieceBAG.checked){
             if ( casValue === "ServicePrive-ECD-ELD-EFA") {
                if ((switchPieceECDBAG1.checked && switchPieceECDBAG2.checked && switchPieceECDBAG3.checked) && (switchPieceSerPriveBAG1.checked && switchPieceSerPriveBAG2.checked && switchPieceSerPriveBAG3.checked) && (switchPieceEFABAG1.checked && switchPieceEFABAG2.checked && switchPieceEFABAG3.checked) && switchPieceELDBAG.checked) {
                    
                    informationBAG.style.display = "block";
                    $("#pieceBASEBAG").removeClass("col-lg-6");
                    $("#pieceBASEBAG").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBAG").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBAG").addClass("col-lg-4");
                }else{
                    informationBAG.style.display = "none";
                    $("#pieceBASEBAG").removeClass("col-lg-4");
                    $("#pieceBASEBAG").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBAG").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBAG").addClass("col-lg-6");
                }
            }else if (casValue === "ELD-EFA" ) {
                if ((switchPieceEFABAG1.checked && switchPieceEFABAG2.checked && switchPieceEFABAG3.checked) && switchPieceELDBAG.checked) {
                    
                    informationBAG.style.display = "block";
                    $("#pieceBASEBAG").removeClass("col-lg-6");
                    $("#pieceBASEBAG").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBAG").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBAG").addClass("col-lg-4");
                }else{
                    informationBAG.style.display = "none";
                    $("#pieceBASEBAG").removeClass("col-lg-4");
                    $("#pieceBASEBAG").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBAG").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBAG").addClass("col-lg-6");
                }
            }
            else{
                informationBAG.style.display = "none";
                $("#pieceBASEBAG").removeClass("col-lg-4");
                $("#pieceBASEBAG").addClass("col-lg-6");
                $("#pieceSPECIFIQUEBAG").removeClass("col-lg-4");
                $("#pieceSPECIFIQUEBAG").addClass("col-lg-6");
            }
            
        }else{
            informationBAG.style.display = "none";
            $("#pieceBASEBAG").removeClass("col-lg-4");
            $("#pieceBASEBAG").addClass("col-lg-6");
            $("#pieceSPECIFIQUEBAG").removeClass("col-lg-4");
            $("#pieceSPECIFIQUEBAG").addClass("col-lg-6");
        }
    }

});
}




</script>
<?php } ?>
<?php else: ?>
    <h2>Aucun résultat trouvé.</h2>
<?php endif; ?>
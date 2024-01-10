<?php if (!empty($results)): ?>
    <?php foreach ($results as $value){ 
        $immatricule = $value->immatricule; 
        $nom = $value->NOM; 
        $prenoms = $value->PRENOMS;  
        $typeBudget = $value->typeBudget; 
        $cas = $value->Cas; 
        $imComptable = $value->comptable; 
        if ($typeBudget == "BG") {
            $activeBG = "active";
            $activeBA = "";
            $activeBABG = "";
            $tabPaneBG = "active show";
            $tabPaneBA = "";
            $tabPaneBABG = "";
            
        }elseif ($typeBudget == "BA") {
            $activeBA = "active";
            $activeBG = "";
            $activeBABG = "";
            $tabPaneBA = "active show";
            $tabPaneBG = "";
            $tabPaneBABG = "";
            
        }else {
            $activeBABG = "active";
            $activeBA = "";
            $activeBG = "";
            $tabPaneBABG = "active show";
            $tabPaneBA = "";
            $tabPaneBG = "";
          
        }
    ?>
    
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12  mb-5" >
                    <div class="iq-card" >
                        <div class="iq-card-body d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Au Nom de <span class="text-primary"><?php echo $nom.' '.$prenoms ;?></span> titulaire d'immatricule <span class="text-primary"><?php echo $immatricule ;?></span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="iq-card ">
                        <div class="iq-card-body p-0">
                            <div class="iq-edit-list">
                                <ul class="iq-edit-profile d-flex nav nav-pills">
                                    <li class="col-md-4 p-0">
                                        <a class="nav-link <?php echo $activeBG ;?> icon" data-icon="x" data-toggle="pill" href="#BGInfo" onclick="buttonBGClicked()">
                                            Budget Général
                                        </a>
                                    </li>
                                    <li class="col-md-4 p-0">
                                        <a class="nav-link <?php echo $activeBA ;?>" data-toggle="pill" href="#BAInfo" onclick="buttonBAClicked()">
                                            Budget Autonome
                                        </a>
                                    </li>
                                    <li class="col-md-4 p-0">
                                        <a class="nav-link <?php echo $activeBABG ;?>" data-toggle="pill" href="#BABGInfo" onclick="buttonBABGClicked()">
                                            Budget Autonome - Budget Général 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="iq-edit-list-data">
                        <div class="tab-content">
                            <div class="tab-pane fade <?php echo $tabPaneBG ;?>" id="BGInfo" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <!-- <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button> -->
                                        <div class="col-lg-12" id="CASBG" style="display: noneS;">
                                        
                                            <div class="frame">
                                                <button id="SerPrive" class="custom-btn btn-12 SerPriveBG" onclick="updateValueCasBG('ServicePrive')"><span class="spCasSerPriveBG">Cas Service Privé</span><span class="spSerPriveBG">Service Privé</span></button>
                                                <button id="ECD" class="custom-btn btn-12 ECDBG" onclick="updateValueCasBG('ECD')"><span class="spCasECDBG">Cas ECD</span><span class="spECDBG">ECD</span></button>
                                                <button id="ELD" class="custom-btn btn-12 ELDBG" onclick="updateValueCasBG('ELD')"><span class="spCasELDBG">Cas ELD</span><span class="spELDBG">ELD</span></button>
                                                <button id="EFAP" class="custom-btn btn-12 EFABG" onclick="updateValueCasBG('EFA')"><span class="spCasEFABG">Cas EFA</span><span class="spEFABG">EFA</span> </button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="iq-card-body" id="verifPieceBG" style="display: none;">
                                        <!-- <form  action="<?php echo base_url(); ?>adminpagecontroller/updateValidation" method="post"> -->
                                        <form class="update-validation-form">

                                            <div class=" row align-items-center">
                                                <div class="form-group col-sm-4" id="pieceBASEBG">
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
                                                <div class="form-group col-sm-4" id="pieceSPECIFIQUEBG">
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
                                                    <div class="row specELDBG" id="specELDBG" style="display: none;">
                                                        <h4 class="mb-25">Piéce Spécifiquement pour ELD</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceELDBG" >
                                                            <label class="custom-control-label" for="switchPieceELDBG">Première et dernièr décision d'engagement
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
                                                </div>
                                                <div class="col-lg-4" id="informationBG" style="display: none;">
                                                    <h4 class="mb-25">Autre information</h4>
                                                    <input type="hidden" value="<?php echo $immatricule ;?>" name="immatricule">
                                                    <input type="hidden" value="BG" name="typeBudget" id="typeBudgetBG">
                                                    <input type="hidden" value="<?php echo $cas ;?>" name="cas" id="casBG" >
                                                    <div class="form-group was-validated">
                                                        <label for="#">Comptable</label>
                                                        <select class="custom-select" name="comptable" required>
                                                            
                                                            <?php foreach ($showComptable as $comptab){ 
                                                                $imat = $comptab->imUser; 
                                                                $prenom = $comptab->prenom;
                                                                $pseudo =  $comptab->pseudo;
                                                                
                                                            ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom.' ('.$pseudo.')'; ?></option>
                                                            <?php } 
                                                             foreach ($showOtherComptable as $comptab){ 
                                                                $imat = $comptab->imUser; 
                                                                $prenom = $comptab->prenom;
                                                                $pseudo =  $comptab->pseudo;
                                                                
                                                            ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom.' ('.$pseudo.')'; ?></option>
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
          
                                    <script>
                                        if ($("#casBG").val() === "EFA") {
                                            document.querySelector('#verifPieceBG').style.display = 'block';
                                            document.querySelector('#specEFABG').style.display = 'block';
                                            document.querySelector('#informationBG').style.display = 'block';
                                            colorEFABGButtonClicked();
                                            switchPieceBaseBGChecked();
                                            switchPieceEFABGChecked();
                                        }else if ($("#casBG").val() === "ECD") {
                                            document.querySelector('#verifPieceBG').style.display = 'block';
                                            document.querySelector('#specECDBG').style.display = 'block';
                                            document.querySelector('#informationBG').style.display = 'block';
                                            colorECDBGButtonClicked();
                                            switchPieceBaseBGChecked();
                                            switchPieceECDBGChecked();
                                        }else if ($("#casBG").val() === "ServicePrive") {
                                            document.querySelector('#verifPieceBG').style.display = 'block';
                                            document.querySelector('#specSerPriveBG').style.display = 'block';
                                            document.querySelector('#informationBG').style.display = 'block';
                                            colorSerPriveBGButtonClicked();
                                            switchPieceBaseBGChecked();
                                            switchPieceSerPriveBGChecked()
                                        }else if ($("#casBG").val() === "ServicePrive-ECD") {
                                            document.querySelector('#verifPieceBG').style.display = 'block';
                                            document.querySelector('#specSerPriveBG').style.display = 'block';
                                            document.querySelector('#informationBG').style.display = 'block';
                                            colorSerPriveBGButtonClicked();
                                            switchPieceBaseBGChecked();
                                            switchPieceECDBGChecked();
                                            switchPieceSerPriveBGChecked()
                                        }else if ($("#casBG").val() === "ECD-ELD-EFA") {
                                            document.querySelector('#verifPieceBG').style.display = 'block';
                                            document.querySelector('#specEFABG').style.display = 'block';
                                            document.querySelector('#specELDBG').style.display = 'block';
                                            document.querySelector('#specECDBG').style.display = 'block';
                                            document.querySelector('#informationBG').style.display = 'block';
                                            colorEFABGButtonClicked();
                                            colorELDBGButtonClicked();
                                            colorECDBGButtonClicked();
                                            switchPieceBaseBGChecked();
                                            switchPieceEFABGChecked();
                                            switchPieceELDBGChecked();
                                            switchPieceECDBGChecked();
                                        }else{
                                            document.querySelector('#verifPieceBG').style.display = 'block';
                                            colorELDBGButtonClicked();
                                        }
                                        //Tous les pieces pour Budget Generale sont deja checkee
                                        function switchPieceBaseBGChecked(){
                                            var switchPieceBaseBG1 = document.getElementById('switchPieceBaseBG1');
                                            var switchPieceBaseBG2 = document.getElementById('switchPieceBaseBG2');
                                            var switchPieceBaseBG3 = document.getElementById('switchPieceBaseBG3');
                                            var switchPieceBaseBG4 = document.getElementById('switchPieceBaseBG4');
                                            var switchPieceBaseBG5 = document.getElementById('switchPieceBaseBG5');
                                            var switchPieceBaseBG6 = document.getElementById('switchPieceBaseBG6');

                                            switchPieceBaseBG1.checked = true;
                                            switchPieceBaseBG2.checked = true;
                                            switchPieceBaseBG3.checked = true;
                                            switchPieceBaseBG4.checked = true;
                                            switchPieceBaseBG5.checked = true;
                                            switchPieceBaseBG6.checked = true;
                                        }
                                        function switchPieceEFABGChecked(){
                                            var switchPieceEFABG1 = document.getElementById('switchPieceEFABG1');
                                            var switchPieceEFABG2 = document.getElementById('switchPieceEFABG2');
                                            var switchPieceEFABG3 = document.getElementById('switchPieceEFABG3');

                                            switchPieceEFABG1.checked = true;
                                            switchPieceEFABG2.checked = true;
                                            switchPieceEFABG3.checked = true;
                                        }

                                        function switchPieceELDBGChecked(){
                                            var switchPieceELDBG = document.getElementById('switchPieceELDBG');
                                            switchPieceELDBG.checked = true;
                                        }
                                        function switchPieceECDBGChecked(){
                                            var switchPieceECDBG1 = document.getElementById('switchPieceECDBG1');
                                            var switchPieceECDBG2 = document.getElementById('switchPieceECDBG2');
                                            var switchPieceECDBG3 = document.getElementById('switchPieceECDBG3');

                                            switchPieceECDBG1.checked = true;
                                            switchPieceECDBG2.checked = true;
                                            switchPieceECDBG3.checked = true;
                                        }
                                        function switchPieceSerPriveBGChecked(){
                                            var switchPieceSerPriveBG1 = document.getElementById('switchPieceSerPriveBG1');
                                            var switchPieceSerPriveBG2 = document.getElementById('switchPieceSerPriveBG2');
                                            var switchPieceSerPriveBG3 = document.getElementById('switchPieceSerPriveBG3');

                                            switchPieceSerPriveBG1.checked = true;
                                            switchPieceSerPriveBG2.checked = true;
                                            switchPieceSerPriveBG3.checked = true;
                                        }
                                        if ($("#casBA").val() === "EFA") {
                                            document.querySelector('#verifPieceBA').style.display = 'block';
                                            document.querySelector('#specEFABA').style.display = 'block';
                                            document.querySelector('#informationBA').style.display = 'block';
                                            colorEFABAButtonClicked();
                                            switchPieceBaseBAChecked();
                                            switchPieceEFABAChecked();
                                        }else if ($("#casBA").val() === "ECD"){
                                            document.querySelector('#verifPieceBA').style.display = 'block';
                                            document.querySelector('#specECDBA').style.display = 'block';
                                            document.querySelector('#informationBA').style.display = 'block';
                                            colorECDBAButtonClicked();
                                            switchPieceBaseBAChecked();
                                            switchPieceECDBAChecked();
                                        }else if ($("#casBA").val() === "ServicePrive"){
                                            document.querySelector('#verifPieceBA').style.display = 'block';
                                            document.querySelector('#specSerPriveBA').style.display = 'block';
                                            document.querySelector('#informationBA').style.display = 'block';
                                            colorSerPriveBAButtonClicked();
                                            switchPieceBaseBAChecked();
                                            switchPieceSerPriveBAChecked()
                                        }else if ($("#casBA").val() === "ServicePrive-ECD"){
                                            document.querySelector('#verifPieceBA').style.display = 'block';
                                            document.querySelector('#specECDBA').style.display = 'block';
                                            document.querySelector('#specSerPriveBA').style.display = 'block';
                                            document.querySelector('#informationBA').style.display = 'block';
                                            colorECDBAButtonClicked();
                                            colorSerPriveBAButtonClicked();
                                            switchPieceBaseBAChecked();
                                            switchPieceECDBAChecked();
                                            switchPieceSerPriveBAChecked()
                                        }else if ($("#casBA").val() === "ECD-ELD-EFA"){
                                            document.querySelector('#verifPieceBA').style.display = 'block';
                                            document.querySelector('#specEFABA').style.display = 'block';
                                            document.querySelector('#specELDBA').style.display = 'block';
                                            document.querySelector('#specECDBA').style.display = 'block';
                                            document.querySelector('#informationBA').style.display = 'block';
                                            colorEFABAButtonClicked();
                                            colorELDBAButtonClicked();
                                            colorECDBAButtonClicked();
                                            switchPieceBaseBAChecked();
                                            switchPieceEFABAChecked();
                                            switchPieceELDBAChecked();
                                            switchPieceECDBAChecked();
                                        }
                                        function switchPieceBaseBAChecked(){
                                            var switchPieceBaseBA1 = document.getElementById('switchPieceBaseBA1');
                                            var switchPieceBaseBA2 = document.getElementById('switchPieceBaseBA2');
                                            var switchPieceBaseBA3 = document.getElementById('switchPieceBaseBA3');
                                            var switchPieceBaseBA4 = document.getElementById('switchPieceBaseBA4');
                                            var switchPieceBaseBA5 = document.getElementById('switchPieceBaseBA5');
                                            var switchPieceBaseBA6 = document.getElementById('switchPieceBaseBA6');
                                            var switchPieceBA = document.getElementById('switchPieceBA');

                                            switchPieceBaseBA1.checked = true;
                                            switchPieceBaseBA2.checked = true;
                                            switchPieceBaseBA3.checked = true;
                                            switchPieceBaseBA4.checked = true;
                                            switchPieceBaseBA5.checked = true;
                                            switchPieceBaseBA6.checked = true;
                                            switchPieceBA.checked = true;
                                        }
                                        function switchPieceEFABAChecked(){
                                            var switchPieceEFABA1 = document.getElementById('switchPieceEFABA1');
                                            var switchPieceEFABA2 = document.getElementById('switchPieceEFABA2');
                                            var switchPieceEFABA3 = document.getElementById('switchPieceEFABA3');

                                            switchPieceEFABA1.checked = true;
                                            switchPieceEFABA2.checked = true;
                                            switchPieceEFABA3.checked = true;
                                        }
                                        function switchPieceELDBAChecked(){
                                            var switchPieceELDBA = document.getElementById('switchPieceELDBA');

                                            switchPieceELDBA.checked = true;
                                        }
                                        function switchPieceECDBAChecked(){
                                            var switchPieceECDBA1 = document.getElementById('switchPieceECDBA1');
                                            var switchPieceECDBA2 = document.getElementById('switchPieceECDBA2');
                                            var switchPieceECDBA3 = document.getElementById('switchPieceECDBA3');

                                            switchPieceECDBA1.checked = true;
                                            switchPieceECDBA2.checked = true;
                                            switchPieceECDBA3.checked = true;
                                        }
                                        function switchPieceSerPriveBAChecked(){
                                            var switchPieceSerPriveBA1 = document.getElementById('switchPieceSerPriveBA1');
                                            var switchPieceSerPriveBA3 = document.getElementById('switchPieceSerPriveBA2');
                                            var switchPieceSerPriveBA3 = document.getElementById('switchPieceSerPriveBA3');

                                            switchPieceSerPriveBA1.checked = true;
                                            switchPieceSerPriveBA2.checked = true;
                                            switchPieceSerPriveBA3.checked = true;
                                        }
                                        if ($("#casBABG").val() === "ELD-EFA") {
                                            document.querySelector('#verifPieceBABG').style.display = 'block';
                                            document.querySelector('#specEFABABG').style.display = 'block';
                                            document.querySelector('#specELDBABG').style.display = 'block';
                                            document.querySelector('#informationBABG').style.display = 'block';
                                            colorEFABABGButtonClicked();
                                            colorELDBABGButtonClicked();
                                            switchPieceBaseBABGChecked();
                                            switchPieceEFAELDBABGChecked();
                                        }else if($("#casBABG").val() === "ServicePrive-ECD-ELD-EFA"){
                                            document.querySelector('#verifPieceBABG').style.display = 'block';
                                            document.querySelector('#specEFABABG').style.display = 'block';
                                            document.querySelector('#specELDBABG').style.display = 'block';
                                            document.querySelector('#specECDBABG').style.display = 'block';
                                            document.querySelector('#specSerPriveBABG').style.display = 'block';
                                            document.querySelector('#informationBABG').style.display = 'block';
                                            colorEFABABGButtonClicked();
                                            colorELDBABGButtonClicked();
                                            colorECDBABGButtonClicked();
                                            colorSerPriveBABGButtonClicked();
                                            switchPieceBaseBABGChecked();
                                            switchPieceEFAELDBABGChecked();
                                            switchPieceECDSerPriveBABGChecked();
                                        }
                                        function switchPieceBaseBABGChecked(){
                                            var switchPieceBaseBABG1 = document.getElementById('switchPieceBaseBABG1');
                                            var switchPieceBaseBABG2 = document.getElementById('switchPieceBaseBABG2');
                                            var switchPieceBaseBABG3 = document.getElementById('switchPieceBaseBABG3');
                                            var switchPieceBaseBABG4 = document.getElementById('switchPieceBaseBABG4');
                                            var switchPieceBaseBABG5 = document.getElementById('switchPieceBaseBABG5');
                                            var switchPieceBaseBABG6 = document.getElementById('switchPieceBaseBABG6');
                                            var switchPieceBABG = document.getElementById('switchPieceBABG');

                                            switchPieceBaseBABG1.checked = true;
                                            switchPieceBaseBABG2.checked = true;
                                            switchPieceBaseBABG3.checked = true;
                                            switchPieceBaseBABG4.checked = true;
                                            switchPieceBaseBABG5.checked = true;
                                            switchPieceBaseBABG6.checked = true;
                                            switchPieceBABG.checked = true;
                                        }

                                        function switchPieceEFAELDBABGChecked(){
                                            var switchPieceEFABABG1 = document.getElementById('switchPieceEFABABG1');
                                            var switchPieceEFABABG2 = document.getElementById('switchPieceEFABABG2');
                                            var switchPieceEFABABG3 = document.getElementById('switchPieceEFABABG3');
                                            var switchPieceELDBABG = document.getElementById('switchPieceELDBABG');
                                            
                                            switchPieceEFABABG1.checked = true;
                                            switchPieceEFABABG2.checked = true;
                                            switchPieceEFABABG3.checked = true;
                                            switchPieceELDBABG.checked = true;

                                        }
                                        function switchPieceECDSerPriveBABGChecked() {
                                            var switchPieceECDBABG1 = document.getElementById('switchPieceECDBABG1');
                                            var switchPieceECDBABG2 = document.getElementById('switchPieceECDBABG2');
                                            var switchPieceECDBABG3 = document.getElementById('switchPieceECDBABG3');

                                            var switchPieceSerPriveBABG1 = document.getElementById('switchPieceSerPriveBABG1');
                                            var switchPieceSerPriveBABG2 = document.getElementById('switchPieceSerPriveBABG2');
                                            var switchPieceSerPriveBABG3 = document.getElementById('switchPieceSerPriveBABG3');

                                            switchPieceECDBABG1.checked = true;
                                            switchPieceECDBABG2.checked = true;
                                            switchPieceECDBABG3.checked = true;
                                            switchPieceSerPriveBABG1.checked = true;
                                            switchPieceSerPriveBABG2.checked = true;
                                            switchPieceSerPriveBABG3.checked = true;
                                        }
                                        //-------->COULEUR DE CAS BUTTON (PAGE BA) A CHAQUE FOIS CLICKED----------------
                                        function colorCasBAButtonDefault(){
                                            document.querySelector('.EFABA .spEFABA').style.background = '';
                                            document.querySelector('.EFABA .spCasEFABA').style.background = '';

                                            document.querySelector('.ELDBA .spELDBA').style.background = '';
                                            document.querySelector('.ELDBA .spCasELDBA').style.background = '';

                                            document.querySelector('.ECDBA .spECDBA').style.background = '';
                                            document.querySelector('.ECDBA .spCasECDBA').style.background = '';

                                            document.querySelector('.SerPriveBA .spSerPriveBA').style.background = '';
                                            document.querySelector('.SerPriveBA .spCasSerPriveBA').style.background = '';

                                        }
                                        function colorEFABAButtonDefault(){
                                            document.querySelector('.EFABA .spEFABA').style.background = '';
                                            document.querySelector('.EFABA .spCasEFABA').style.background = '';
                                        }
                                        function colorELDBAButtonDefault(){
                                            document.querySelector('.ELDBA .spELDBA').style.background = '';
                                            document.querySelector('.ELDBA .spCasELDBA').style.background = '';
                                        }
                                        function colorECDBAButtonDefault(){
                                            document.querySelector('.ECDBA .spECDBA').style.background = '';
                                            document.querySelector('.ECDBA .spCasECDBA').style.background = '';
                                        }
                                        function colorSerPriveBAButtonDefault(){
                                            document.querySelector('.SerPriveBA .spSerPriveBA').style.background = '';
                                            document.querySelector('.SerPriveBA .spCasSerPriveBA').style.background = '';
                                        }
                                        
                                        function colorEFABAButtonClicked(){
                                            
                                            document.querySelector('.EFABA .spEFABA').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.EFABA .spCasEFABA').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorELDBAButtonClicked(){
                                            document.querySelector('.ELDBA .spELDBA').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.ELDBA .spCasELDBA').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorECDBAButtonClicked(){
                                            document.querySelector('.ECDBA .spECDBA').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.ECDBA .spCasECDBA').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorSerPriveBAButtonClicked(){
                                            document.querySelector('.SerPriveBA .spSerPriveBA').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.SerPriveBA .spCasSerPriveBA').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }
                                        //--------/COULEUR DE CAS BUTTON (PAGE BA) A CHAQUE FOIS CLICKED----------------
                                        //-------->COULEUR DE CAS BUTTON (PAGE BG) A CHAQUE FOIS CLICKED----------------
                                        function colorCasBGButtonDefault(){
                                            document.querySelector('.EFABG .spEFABG').style.background = '';
                                            document.querySelector('.EFABG .spCasEFABG').style.background = '';

                                            document.querySelector('.ELDBG .spELDBG').style.background = '';
                                            document.querySelector('.ELDBG .spCasELDBG').style.background = '';

                                            document.querySelector('.ECDBG .spECDBG').style.background = '';
                                            document.querySelector('.ECDBG .spCasECDBG').style.background = '';

                                            document.querySelector('.SerPriveBG .spSerPriveBG').style.background = '';
                                            document.querySelector('.SerPriveBG .spCasSerPriveBG').style.background = '';

                                        }

                                        function colorEFABGButtonDefault(){
                                            document.querySelector('.EFABG .spEFABG').style.background = '';
                                            document.querySelector('.EFABG .spCasEFABG').style.background = '';
                                        }
                                        function colorELDBGButtonDefault(){
                                            document.querySelector('.ELDBG .spELDBG').style.background = '';
                                            document.querySelector('.ELDBG .spCasELDBG').style.background = '';
                                        }
                                        function colorECDBGButtonDefault(){
                                            document.querySelector('.ECDBG .spECDBG').style.background = '';
                                            document.querySelector('.ECDBG .spCasECDBG').style.background = '';
                                        }
                                        function colorSerPriveBGButtonDefault(){
                                            document.querySelector('.SerPriveBG .spSerPriveBG').style.background = '';
                                            document.querySelector('.SerPriveBG .spCasSerPriveBG').style.background = '';

                                        }

                                        function colorEFABGButtonClicked(){
                                            
                                            document.querySelector('.EFABG .spEFABG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.EFABG .spCasEFABG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorELDBGButtonClicked(){
                                            document.querySelector('.ELDBG .spELDBG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.ELDBG .spCasELDBG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorECDBGButtonClicked(){
                                            document.querySelector('.ECDBG .spECDBG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.ECDBG .spCasECDBG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorSerPriveBGButtonClicked(){
                                            document.querySelector('.SerPriveBG .spSerPriveBG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.SerPriveBG .spCasSerPriveBG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }
                                        
                                        //--------/COULEUR DE CAS BUTTON (PAGE BG) A CHAQUE FOIS CLICKED----------------
                                        //-------->COULEUR DE CAS BUTTON (PAGE BA-BG) A CHAQUE FOIS CLICKED----------------
                                        function colorCasBABGButtonDefault(){
                                            document.querySelector('.EFABABG .spEFABABG').style.background = '';
                                            document.querySelector('.EFABABG .spCasEFABABG').style.background = '';

                                            document.querySelector('.ELDBABG .spELDBABG').style.background = '';
                                            document.querySelector('.ELDBABG .spCasELDBABG').style.background = '';

                                            document.querySelector('.ECDBABG .spECDBABG').style.background = '';
                                            document.querySelector('.ECDBABG .spCasECDBABG').style.background = '';

                                            document.querySelector('.SerPriveBABG .spSerPriveBABG').style.background = '';
                                            document.querySelector('.SerPriveBABG .spCasSerPriveBABG').style.background = '';

                                        }

                                        function colorEFABABGButtonDefault(){
                                            document.querySelector('.EFABABG .spEFABABG').style.background = '';
                                            document.querySelector('.EFABABG .spCasEFABABG').style.background = '';
                                        }
                                        function colorELDBABGButtonDefault(){
                                            document.querySelector('.ELDBABG .spELDBABG').style.background = '';
                                            document.querySelector('.ELDBABG .spCasELDBABG').style.background = '';
                                        }
                                        function colorECDBABGButtonDefault(){
                                            document.querySelector('.ECDBABG .spECDBABG').style.background = '';
                                            document.querySelector('.ECDBABG .spCasECDBABG').style.background = '';
                                        }

                                        function colorEFABABGButtonClicked(){
                                            
                                            document.querySelector('.EFABABG .spEFABABG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.EFABABG .spCasEFABABG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorELDBABGButtonClicked(){
                                            document.querySelector('.ELDBABG .spELDBABG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.ELDBABG .spCasELDBABG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorECDBABGButtonClicked(){
                                            document.querySelector('.ECDBABG .spECDBABG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.ECDBABG .spCasECDBABG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }

                                        function colorSerPriveBABGButtonClicked(){
                                            document.querySelector('.SerPriveBABG .spSerPriveBABG').style.background = 'rgb(12, 227, 44)';
                                            document.querySelector('.SerPriveBABG .spCasSerPriveBABG').style.background = 'linear-gradient(0deg, rgb(53, 253, 13) 0%, rgb(64, 223, 10) 100%)';
                                        }
                                        //--------/COULEUR DE CAS BUTTON (PAGE BA-BG) A CHAQUE FOIS CLICKED----------------
                                        function uncheckCheckBoxesBA() {
                                            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                        
                                            // Parcourez la liste des cases à cocher et decochez-les
                                            checkboxes.forEach(function(checkbox) {
                                            checkbox.checked = false;
                                            });
                                            const reset = document.getElementById("reset");
                                            reset.addEventListener("click", function() {

                                                document.getElementById('informationBA').style.display = "none";
                                                $("#pieceBASEBA").removeClass("col-lg-4");
                                                $("#pieceBASEBA").addClass("col-lg-6");
                                                $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                                                $("#pieceSPECIFIQUEBA").addClass("col-lg-6");                                                
                                                uncheckCheckBoxesBA();
                                            });


                                            document.getElementById('informationBA').style.display = "none";
                                            $("#pieceBASEBA").removeClass("col-lg-4");
                                            $("#pieceBASEBA").addClass("col-lg-6");
                                            $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                                            $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                                        }
                                        function uncheckCheckBoxesBG() {
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
                                                uncheckCheckBoxesBG();
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
                                        }

                                        function uncheckCheckBoxesBABG() {
                                            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                        
                                            // Parcourez la liste des cases à cocher et decochez-les
                                            checkboxes.forEach(function(checkbox) {
                                            checkbox.checked = false;
                                            });
                                            const reset = document.getElementById("reset");
                                            reset.addEventListener("click", function() {

                                                document.getElementById('informationBABG').style.display = "none";
                                                $("#pieceBASEBABG").removeClass("col-lg-4");
                                                $("#pieceBASEBABG").addClass("col-lg-6");
                                                $("#pieceSPECIFIQUEBABG").removeClass("col-lg-4");
                                                $("#pieceSPECIFIQUEBABG").addClass("col-lg-6");                                                
                                                uncheckCheckBoxesBABG();
                                            });

                                            
                                            
                                            document.getElementById('informationBABG').style.display = "none";
                                            $("#pieceBASEBABG").removeClass("col-lg-4");
                                            $("#pieceBASEBABG").addClass("col-lg-6");
                                            $("#pieceSPECIFIQUEBABG").removeClass("col-lg-4");
                                            $("#pieceSPECIFIQUEBABG").addClass("col-lg-6");
                                        }

                                        function updateValueCasBG(value){
                                            const verifPiece = document.getElementById('verifPieceBG');
                                            const specEFA = document.getElementById('specEFABG');
                                            const specELD = document.getElementById('specELDBG');
                                            const specECD = document.getElementById('specECDBG');
                                            const specSerPrive = document.getElementById('specSerPriveBG');
                                            const information = document.getElementById('');
                                            const typeBudgetInput = document.getElementById('typeBudgetBG');
                                            const casInput = document.getElementById('casBG');

                                            const typeBudgetValue = typeBudgetInput.value;
                                            var currentCasValue = casInput.value;

                                            if (typeBudgetValue === "BG") {
                                                if (casInput.value) {
                                                    var parts = currentCasValue.split('-');
                                                    var index = parts.indexOf(value);

                                                    if(index === -1){
                                                        casInput.value = currentCasValue + '-' + value;
                                                    }else{
                                                        parts.splice(index, 1);
                                                        casInput.value = parts.join('-');
                                                    }
                                                }else{
                                                    casInput.value = value;
                                                }
                                            }

                                            if (casInput.value === "") {
                                                colorCasBGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'none';
                                                uncheckCheckBoxesBG();   
                                            }else if (casInput.value === "EFA"){
                                                colorEFABGButtonClicked();
                                                specEFA.style.display = 'block';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBG();
                                                
                                            }
                                            // else if (casInput.value === "ELD"){
                                            //     colorELDBGButtonClicked();
                                            //     colorECDBGButtonDefault();
                                            //     specEFA.style.display = 'none';
                                            //     specELD.style.display = 'block';
                                            //     specECD.style.display = 'none';
                                            //     specSerPrive.style.display = 'none';
                                            //     verifPiece.style.display = 'block';
                                            //     uncheckCheckBoxesBG();
                                            // }
                                            else if (casInput.value === "ECD"){
                                                colorECDBGButtonClicked();
                                                colorELDBGButtonDefault();
                                                colorSerPriveBGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBG();
                                            }else if (casInput.value === "ServicePrive"){
                                                colorSerPriveBGButtonClicked();
                                                colorECDBGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBG();
                                            }else if (casInput.value === "ServicePrive-ECD"){
                                                colorSerPriveBGButtonClicked();
                                                colorECDBGButtonClicked();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBG();
                                            }else if (casInput.value === "ECD-ELD"){
                                                colorECDBGButtonClicked();
                                                colorELDBGButtonClicked();
                                                colorEFABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBG();
                                            }else if (casInput.value === "ECD-ELD-EFA"){
                                                colorECDBGButtonClicked();
                                                colorELDBGButtonClicked();
                                                colorEFABGButtonClicked();
                                                specEFA.style.display = 'block';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBG();
                                            }else{
                                                colorCasBGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'none';
                                                casInput.value = "";
                                                uncheckCheckBoxesBG();
                                            }
                                        }

                                        $(document).ready(function () {
                                            const switchPieceBaseBG1 = document.getElementById("switchPieceBaseBG1");
                                            const switchPieceBaseBG2 = document.getElementById("switchPieceBaseBG2");
                                            const switchPieceBaseBG3 = document.getElementById("switchPieceBaseBG3");
                                            const switchPieceBaseBG4 = document.getElementById("switchPieceBaseBG4");
                                            const switchPieceBaseBG5 = document.getElementById("switchPieceBaseBG5");
                                            const switchPieceBaseBG6 = document.getElementById("switchPieceBaseBG6");
                                            
                                            const switchPieceEFABG1 = document.getElementById("switchPieceEFABG1");
                                            const switchPieceEFABG2 = document.getElementById("switchPieceEFABG2");
                                            const switchPieceEFABG3 = document.getElementById("switchPieceEFABG3");

                                            const switchPieceELDBG = document.getElementById("switchPieceELDBG");

                                            const switchPieceECDBG1 = document.getElementById("switchPieceECDBG1");
                                            const switchPieceECDBG2 = document.getElementById("switchPieceECDBG2");
                                            const switchPieceECDBG3 = document.getElementById("switchPieceECDBG3");

                                            const switchPieceSerPriveBG1 = document.getElementById("switchPieceSerPriveBG1");
                                            const switchPieceSerPriveBG2 = document.getElementById("switchPieceSerPriveBG2");
                                            const switchPieceSerPriveBG3 = document.getElementById("switchPieceSerPriveBG3");

                                            const typeBudgetInput = document.getElementById('typeBudgetBG');
                                            const casInput = document.getElementById('casBG');
                                            var CasValue = casInput.value;
                                            const typeBudget =typeBudgetInput.value;
                                            
                                            const pieceBASEBG = document.getElementById("pieceBASEBG");
                                            const pieceSPECIFIQUEBG = document.getElementById("pieceSPECIFIQUEBG");
                                            const informationBG = document.getElementById("informationBG");

                                            switchPieceBaseBG1.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceBaseBG2.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceBaseBG3.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceBaseBG4.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceBaseBG5.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceBaseBG6.addEventListener("change", checkIfAllCheckedForBG);

                                            switchPieceEFABG1.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceEFABG2.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceEFABG3.addEventListener("change", checkIfAllCheckedForBG);

                                            switchPieceELDBG.addEventListener("change", checkIfAllCheckedForBG);

                                            switchPieceECDBG1.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceECDBG2.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceECDBG3.addEventListener("change", checkIfAllCheckedForBG);

                                            switchPieceSerPriveBG1.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceSerPriveBG2.addEventListener("change", checkIfAllCheckedForBG);
                                            switchPieceSerPriveBG3.addEventListener("change", checkIfAllCheckedForBG);

                                            function checkIfAllCheckedForBG() {
                                                if (switchPieceBaseBG1.checked && switchPieceBaseBG2.checked && switchPieceBaseBG3.checked && switchPieceBaseBG4.checked && switchPieceBaseBG5.checked && switchPieceBaseBG6.checked) {
                                                    if (casInput.value === "EFA" || casInput.value === "ECD" || casInput.value === "ServicePrive"){
                                                        if (switchPieceEFABG1.checked && switchPieceEFABG2.checked && switchPieceEFABG3.checked || switchPieceELDBG.checked || switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked || switchPieceSerPriveBG1.checked && switchPieceSerPriveBG2.checked && switchPieceSerPriveBG3.checked) {
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
                                                    }else if(casInput.value === "ServicePrive-ECD"){
                                                        if(switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked && switchPieceSerPriveBG1.checked && switchPieceSerPriveBG2.checked && switchPieceSerPriveBG3.checked){
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
                                                    }else if(casInput.value === "ECD-ELD-EFA"){
                                                        if (switchPieceEFABG1.checked && switchPieceEFABG2.checked && switchPieceEFABG3.checked && switchPieceELDBG.checked && switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) {
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
                                                }else{
                                                    informationBG.style.display = "none";
                                                    $("#pieceBASEBG").removeClass("col-lg-4");
                                                    $("#pieceBASEBG").addClass("col-lg-6");
                                                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                                                    $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                                                }
                                            }


                                        });
                                        
                                        function buttonBAClicked(){
                                            const verifPieceBA = document.getElementById('verifPieceBA');
                                            const casInputBA = document.getElementById('casBA');
                                            uncheckCheckBoxesBA();
                                            colorCasBAButtonDefault();
                                            verifPieceBA.style.display = 'none';
                                            casInputBA.value = "";

                                            const verifPieceBG = document.getElementById('verifPieceBG');
                                            const casInputBG = document.getElementById('casBG');
                                            uncheckCheckBoxesBG();
                                            colorCasBGButtonDefault();
                                            verifPieceBG.style.display = 'none';
                                            casInputBG.value = "";

                                            const verifPieceBABG = document.getElementById('verifPieceBABG');
                                            const casInputBABG = document.getElementById('casBABG');
                                            uncheckCheckBoxesBABG();
                                            colorCasBABGButtonDefault();
                                            verifPieceBABG.style.display = 'none';
                                            casInputBABG.value = "";
                                        }
                                        function buttonBGClicked(){
                                            const verifPieceBA = document.getElementById('verifPieceBA');
                                            const casInputBA = document.getElementById('casBA');
                                            uncheckCheckBoxesBA();
                                            colorCasBAButtonDefault();
                                            verifPieceBA.style.display = 'none';
                                            casInputBA.value = "";

                                            const verifPieceBG = document.getElementById('verifPieceBG');
                                            const casInputBG = document.getElementById('casBG');
                                            uncheckCheckBoxesBG();
                                            colorCasBGButtonDefault();
                                            verifPieceBG.style.display = 'none';
                                            casInputBG.value = "";

                                            const verifPieceBABG = document.getElementById('verifPieceBABG');
                                            const casInputBABG = document.getElementById('casBABG');
                                            uncheckCheckBoxesBABG();
                                            colorCasBABGButtonDefault();
                                            verifPieceBABG.style.display = 'none';
                                            casInputBABG.value = "";
                                        }
                                        function buttonBABGClicked(){
                                            const verifPieceBA = document.getElementById('verifPieceBA');
                                            const casInputBA = document.getElementById('casBA');
                                            uncheckCheckBoxesBA();
                                            colorCasBAButtonDefault();
                                            verifPieceBA.style.display = 'none';
                                            casInputBA.value = "";
                                            

                                            const verifPieceBG = document.getElementById('verifPieceBG');
                                            const casInputBG = document.getElementById('casBG');
                                            uncheckCheckBoxesBG();
                                            colorCasBGButtonDefault();
                                            verifPieceBG.style.display = 'none';
                                            casInputBG.value = "";

                                            const verifPieceBABG = document.getElementById('verifPieceBABG');
                                            const casInputBABG = document.getElementById('casBABG');
                                            uncheckCheckBoxesBABG();
                                            colorCasBABGButtonDefault();
                                            verifPieceBABG.style.display = 'none';
                                            casInputBABG.value = "";
                                        }

                                        function updateValueCasBA(value){
                                            const verifPiece = document.getElementById('verifPieceBA');
                                            const specEFA = document.getElementById('specEFABA');
                                            const specELD = document.getElementById('specELDBA');
                                            const specECD = document.getElementById('specECDBA');
                                            const specSerPrive = document.getElementById('specSerPriveBA');
                                            const information = document.getElementById('informationBA');
                                            const typeBudgetInput = document.getElementById('typeBudgetBA');
                                            const casInput = document.getElementById('casBA');

                                            const typeBudgetValue = typeBudgetInput.value;
                                            var currentCasValue = casInput.value;

                                            if (typeBudgetValue === "BA") {
                                                if (casInput.value) {
                                                    var parts = currentCasValue.split('-');
                                                    var index = parts.indexOf(value);

                                                    if(index === -1){
                                                        casInput.value = currentCasValue + '-' + value;
                                                    }else{
                                                        parts.splice(index, 1);
                                                        casInput.value = parts.join('-');
                                                    }
                                                }else{
                                                    casInput.value = value;
                                                }
                                            }

                                            if (casInput.value === "") {
                                                colorCasBAButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'none';
                                                uncheckCheckBoxesBA();   
                                            }else if (casInput.value === "EFA"){
                                                colorEFABAButtonClicked();
                                                specEFA.style.display = 'block';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBA();
                                                
                                            }
                                            // else if (casInput.value === "ELD"){
                                            //     colorELDBAButtonClicked();
                                            //     //colorECDBGButtonDefault();
                                            //     specEFA.style.display = 'none';
                                            //     specELD.style.display = 'block';
                                            //     specECD.style.display = 'none';
                                            //     specSerPrive.style.display = 'none';
                                            //     verifPiece.style.display = 'block';
                                            //     //uncheckCheckBoxesBG();
                                            // }
                                            else if (casInput.value === "ECD"){
                                                colorECDBAButtonClicked();
                                                colorELDBAButtonDefault();
                                                colorSerPriveBAButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBA();
                                            }else if (casInput.value === "ServicePrive"){
                                                colorSerPriveBAButtonClicked();
                                                colorECDBAButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBA();
                                            }else if (casInput.value === "ServicePrive-ECD"){
                                                colorSerPriveBAButtonClicked();
                                                colorECDBAButtonClicked();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBA();
                                            }else if (casInput.value === "ECD-ELD"){
                                                colorECDBAButtonClicked();
                                                colorELDBAButtonClicked();
                                                colorEFABAButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBA();
                                            }else if (casInput.value === "ECD-ELD-EFA"){
                                                colorECDBAButtonClicked();
                                                colorELDBAButtonClicked();
                                                colorEFABAButtonClicked();
                                                specEFA.style.display = 'block';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBA();
                                            }else{
                                                colorCasBAButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'none';
                                                casInput.value = "";
                                                //uncheckCheckBoxesBG();
                                            }
                                        }
                                        $(document).ready(function () {
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

                                            const switchPieceELDBA = document.getElementById("switchPieceELDBA");

                                            const switchPieceECDBA1 = document.getElementById("switchPieceECDBA1");
                                            const switchPieceECDBA2 = document.getElementById("switchPieceECDBA2");
                                            const switchPieceECDBA3 = document.getElementById("switchPieceECDBA3");

                                            const switchPieceSerPriveBA1 = document.getElementById("switchPieceSerPriveBA1");
                                            const switchPieceSerPriveBA2 = document.getElementById("switchPieceSerPriveBA2");
                                            const switchPieceSerPriveBA3 = document.getElementById("switchPieceSerPriveBA3");

                                            const typeBudgetInput = document.getElementById('typeBudgetBA');
                                            const casInput = document.getElementById('casBA');
                                            var CasValue = casInput.value;
                                            const typeBudget =typeBudgetInput.value;

                                            const pieceBASEBA = document.getElementById("pieceBASEBA");
                                            const pieceSPECIFIQUEBA = document.getElementById("pieceSPECIFIQUEBA");
                                            const informationBA = document.getElementById("informationBA");

                                            switchPieceBaseBA1.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceBaseBA2.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceBaseBA3.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceBaseBA4.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceBaseBA5.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceBaseBA6.addEventListener("change", checkIfAllCheckedForBA);

                                            switchPieceBA.addEventListener("change", checkIfAllCheckedForBA);

                                            switchPieceEFABA1.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceEFABA2.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceEFABA3.addEventListener("change", checkIfAllCheckedForBA);
                                            
                                            switchPieceELDBA.addEventListener("change", checkIfAllCheckedForBA);

                                            switchPieceECDBA1.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceECDBA2.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceECDBA3.addEventListener("change", checkIfAllCheckedForBA);
                                            

                                            switchPieceSerPriveBA1.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceSerPriveBA2.addEventListener("change", checkIfAllCheckedForBA);
                                            switchPieceSerPriveBA3.addEventListener("change", checkIfAllCheckedForBA);
                                            
                                            function checkIfAllCheckedForBA() {
                                                if (switchPieceBaseBA1.checked && switchPieceBaseBA2.checked && switchPieceBaseBA3.checked && switchPieceBaseBA4.checked && switchPieceBaseBA5.checked && switchPieceBaseBA6.checked && switchPieceBA.checked){
                                                    if (casInput.value === "EFA") {
                                                        if (switchPieceEFABA1.checked  && switchPieceEFABA2.checked && switchPieceEFABA3.checked) {
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
                                                        
                                                    }else if (casInput.value === "ServicePrive"){
                                                        if (switchPieceSerPriveBA1.checked && switchPieceSerPriveBA2.checked && switchPieceSerPriveBA3.checked) {
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
                                                    }else if (casInput.value === "ECD"){
                                                        if (switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) {
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
                                                    }else if (casInput.value === "ServicePrive-ECD"){
                                                        if (switchPieceSerPriveBA1.checked && switchPieceSerPriveBA2.checked && switchPieceSerPriveBA3.checked && switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) {
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
                                                    }else if (casInput.value === "ECD-ELD-EFA"){
                                                        if (switchPieceEFABA1.checked  && switchPieceEFABA2.checked && switchPieceEFABA3.checked && switchPieceELDBA.checked && switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) {
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
                                                    }else{
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

                                        function updateValueCasBABG(value){
                                            const verifPiece = document.getElementById('verifPieceBABG');
                                            const specEFA = document.getElementById('specEFABABG');
                                            const specELD = document.getElementById('specELDBABG');
                                            const specECD = document.getElementById('specECDBABG');
                                            const specSerPrive = document.getElementById('specSerPriveBABG');
                                            const information = document.getElementById('informationBABG');
                                            const typeBudgetInput = document.getElementById('typeBudgetBABG');
                                            const casInput = document.getElementById('casBABG');

                                            const typeBudgetValue = typeBudgetInput.value;
                                            var currentCasValue = casInput.value;
                                            if (typeBudgetValue === "BA-BG") {
                                                if (casInput.value) {
                                                    var parts = currentCasValue.split('-');
                                                    var index = parts.indexOf(value);

                                                    if(index === -1){
                                                        casInput.value = currentCasValue + '-' + value;
                                                    }else{
                                                        parts.splice(index, 1);
                                                        casInput.value = parts.join('-');
                                                    }
                                                }else{
                                                    casInput.value = value;
                                                }
                                            }

                                            if (casInput.value === "") {
                                                colorCasBABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'none';
                                                uncheckCheckBoxesBABG();   
                                            }else if (casInput.value === "ELD"){
                                                colorELDBABGButtonClicked();
                                                colorEFABABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBABG();
                                                
                                            }else if (casInput.value === "ELD-EFA"){
                                                colorELDBABGButtonClicked();
                                                colorEFABABGButtonClicked();
                                                specEFA.style.display = 'block';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBABG();
                                                
                                            }else if (casInput.value === "ServicePrive"){
                                                colorSerPriveBABGButtonClicked();
                                                colorECDBABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBABG();
                                                
                                            }else if (casInput.value === "ServicePrive-ECD"){
                                                colorSerPriveBABGButtonClicked();
                                                colorECDBABGButtonClicked();
                                                colorELDBABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                uncheckCheckBoxesBABG();
                                                
                                            }else if (casInput.value === "ServicePrive-ECD-ELD"){
                                                colorSerPriveBABGButtonClicked();
                                                colorECDBABGButtonClicked();
                                                colorELDBABGButtonClicked();
                                                colorEFABABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                //uncheckCheckBoxesBABG();
                                                
                                            }else if (casInput.value === "ServicePrive-ECD-ELD-EFA"){
                                                colorSerPriveBABGButtonClicked();
                                                colorECDBABGButtonClicked();
                                                colorELDBABGButtonClicked();
                                                colorEFABABGButtonClicked();
                                                specEFA.style.display = 'block';
                                                specELD.style.display = 'block';
                                                specECD.style.display = 'block';
                                                specSerPrive.style.display = 'block';
                                                verifPiece.style.display = 'block';
                                                //uncheckCheckBoxesBABG();
                                                
                                            }else{
                                                colorCasBABGButtonDefault();
                                                specEFA.style.display = 'none';
                                                specELD.style.display = 'none';
                                                specECD.style.display = 'none';
                                                specSerPrive.style.display = 'none';
                                                verifPiece.style.display = 'none';
                                                casInput.value = "";
                                                uncheckCheckBoxesBABG();
                                                
                                            }
                                        }
                                        $(document).ready(function () {
                                            const switchPieceBaseBABG1 = document.getElementById("switchPieceBaseBABG1");
                                            const switchPieceBaseBABG2 = document.getElementById("switchPieceBaseBABG2");
                                            const switchPieceBaseBABG3 = document.getElementById("switchPieceBaseBABG3");
                                            const switchPieceBaseBABG4 = document.getElementById("switchPieceBaseBABG4");
                                            const switchPieceBaseBABG5 = document.getElementById("switchPieceBaseBABG5");
                                            const switchPieceBaseBABG6 = document.getElementById("switchPieceBaseBABG6");
                                            
                                            const switchPieceBABG = document.getElementById("switchPieceBABG");
                                            
                                            const switchPieceEFABABG1 = document.getElementById("switchPieceEFABABG1");
                                            const switchPieceEFABABG2 = document.getElementById("switchPieceEFABABG2");
                                            const switchPieceEFABABG3 = document.getElementById("switchPieceEFABABG3");

                                            const switchPieceELDBABG = document.getElementById("switchPieceELDBABG");

                                            const switchPieceECDBABG1 = document.getElementById("switchPieceECDBABG1");
                                            const switchPieceECDBABG2 = document.getElementById("switchPieceECDBABG2");
                                            const switchPieceECDBABG3 = document.getElementById("switchPieceECDBABG3");

                                            const switchPieceSerPriveBABG1 = document.getElementById("switchPieceSerPriveBABG1");
                                            const switchPieceSerPriveBABG2 = document.getElementById("switchPieceSerPriveBABG2");
                                            const switchPieceSerPriveBABG3 = document.getElementById("switchPieceSerPriveBABG3");

                                            const typeBudgetInput = document.getElementById('typeBudgetBABG');
                                            const casInput = document.getElementById('casBABG');
                                            var CasValue = casInput.value;
                                            const typeBudget =typeBudgetInput.value;
                                            
                                            const pieceBASEBABG = document.getElementById("pieceBASEBABABG");
                                            const pieceSPECIFIQUEBABG = document.getElementById("pieceSPECIFIQUEBABG");
                                            const informationBABG = document.getElementById("informationBABG");

                                            switchPieceBaseBABG1.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceBaseBABG2.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceBaseBABG3.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceBaseBABG4.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceBaseBABG5.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceBaseBABG6.addEventListener("change", checkIfAllCheckedForBABG);
                                            
                                            switchPieceBABG.addEventListener("change", checkIfAllCheckedForBABG);
                                            
                                            switchPieceEFABABG1.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceEFABABG2.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceEFABABG3.addEventListener("change", checkIfAllCheckedForBABG);

                                            switchPieceELDBABG.addEventListener("change", checkIfAllCheckedForBABG);

                                            switchPieceECDBABG1.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceECDBABG2.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceECDBABG3.addEventListener("change", checkIfAllCheckedForBABG);

                                            switchPieceSerPriveBABG1.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceSerPriveBABG2.addEventListener("change", checkIfAllCheckedForBABG);
                                            switchPieceSerPriveBABG3.addEventListener("change", checkIfAllCheckedForBABG);

                                            function checkIfAllCheckedForBABG() {
                                                if (switchPieceBaseBABG1.checked && switchPieceBaseBABG2.checked && switchPieceBaseBABG3.checked && switchPieceBaseBABG4.checked && switchPieceBaseBABG5.checked && switchPieceBaseBABG6.checked && switchPieceBABG.checked) {
                                                    if (casInput.value === "ELD-EFA" ){
                                                        if (switchPieceEFABABG1.checked && switchPieceEFABABG2.checked && switchPieceEFABABG3.checked && switchPieceELDBABG.checked) {
                                                            informationBABG.style.display = "block";
                                                            $("#pieceBASEBABG").removeClass("col-lg-6");
                                                            $("#pieceBASEBABG").addClass("col-lg-4");
                                                            $("#pieceSPECIFIQUEBABG").removeClass("col-lg-6");
                                                            $("#pieceSPECIFIQUEBABG").addClass("col-lg-4");
                                                        }else{
                                                            informationBABG.style.display = "none";
                                                            $("#pieceBASEBABG").removeClass("col-lg-4");
                                                            $("#pieceBASEBABG").addClass("col-lg-6");
                                                            $("#pieceSPECIFIQUEBABG").removeClass("col-lg-4");
                                                            $("#pieceSPECIFIQUEBABG").addClass("col-lg-6");
                                                        }
                                                    }else if(casInput.value === "ServicePrive-ECD-ELD-EFA"){
                                                        if (switchPieceEFABABG1.checked && switchPieceEFABABG2.checked && switchPieceEFABABG3.checked && switchPieceELDBABG.checked && switchPieceECDBABG1.checked && switchPieceECDBABG2.checked && switchPieceECDBABG3.checked && switchPieceSerPriveBABG1.checked && switchPieceSerPriveBABG2.checked && switchPieceSerPriveBABG3.checked) {
                                                            informationBABG.style.display = "block";
                                                            $("#pieceBASEBABG").removeClass("col-lg-6");
                                                            $("#pieceBASEBABG").addClass("col-lg-4");
                                                            $("#pieceSPECIFIQUEBABG").removeClass("col-lg-6");
                                                            $("#pieceSPECIFIQUEBABG").addClass("col-lg-4");
                                                        }else{
                                                            informationBABG.style.display = "none";
                                                            $("#pieceBASEBABG").removeClass("col-lg-4");
                                                            $("#pieceBASEBABG").addClass("col-lg-6");
                                                            $("#pieceSPECIFIQUEBABG").removeClass("col-lg-4");
                                                            $("#pieceSPECIFIQUEBABG").addClass("col-lg-6");
                                                        }
                                                    }
                                                }else{
                                                    informationBABG.style.display = "none";
                                                    $("#pieceBASEBABG").removeClass("col-lg-4");
                                                    $("#pieceBASEBABG").addClass("col-lg-6");
                                                    $("#pieceSPECIFIQUEBABG").removeClass("col-lg-4");
                                                    $("#pieceSPECIFIQUEBABG").addClass("col-lg-6");
                                                }
                                            }



                                        });
                                        
                                    </script>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php echo $tabPaneBA ;?>" id="BAInfo" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <div class="col-lg-12" id="CASBA" style="display: noneS;">
                                            <div class="frame">
                                                <button id="SerPriveBA" class="custom-btn btn-12 SerPriveBA" onclick="updateValueCasBA('ServicePrive')"><span class="spCasSerPriveBA">Cas Service Privé</span><span class="spSerPriveBA">Service Privé</span></button>
                                                <button id="ECDBA" class="custom-btn btn-12 ECDBA" onclick="updateValueCasBA('ECD')"><span class="spCasECDBA">Cas ECD</span><span class="spECDBA">ECD</span></button>
                                                <button id="ELDBA" class="custom-btn btn-12 ELDBA" onclick="updateValueCasBA('ELD')"><span class="spCasELDBA">Cas ELD</span><span class="spELDBA">ELD</span></button>
                                                <button id="EFABA" class="custom-btn btn-12 EFABA" onclick="updateValueCasBA('EFA')"><span class="spCasEFABA">Cas EFA</span><span class="spEFABA">EFA</span> </button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="iq-card-body" id="verifPieceBA" style="display: none;">
                                        <!-- <form  action="<?php echo base_url(); ?>adminpagecontroller/updateValidation" method="post"> -->
                                        <form class="update-validation-form">

                                            <div class=" row align-items-center">
                                                <div class="form-group col-sm-4" id="pieceBASEBA">
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
                                                <div class="form-group col-sm-4" id="pieceSPECIFIQUEBA">
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
                                                    <div class="row specELDBA" id="specELDBA" style="display: none;">
                                                        <h4 class="mb-25">Piéce Spécifiquement pour ELD</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceELDBA">
                                                            <label class="custom-control-label" for="switchPieceELDBA">Première et dernièr décision d'engagement
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
                                                </div>
                                                <div class="col-lg-4" id="informationBA" style="display: none;">
                                                    <h4 class="mb-25">Autre informaion</h4>
                                                    <input type="hidden" value="<?php echo $immatricule ;?>" name="immatricule">
                                                    <input type="hidden" value="BA" name="typeBudget" id="typeBudgetBA">
                                                    <input type="hidden" value="<?php echo $cas ;?>" name="cas" id="casBA" >
                                                    <div class="form-group was-validated">
                                                        <label for="#">Comptable</label>
                                                        <select class="custom-select" name="comptable" required>
                                                            <?php foreach ($showComptable as $comptab){ 
                                                                $imat = $comptab->imUser; 
                                                                $prenom = $comptab->prenom;
                                                                $pseudo =  $comptab->pseudo;
                                                                
                                                            ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom.' ('.$pseudo.')'; ?></option>
                                                            <?php } 
                                                             foreach ($showOtherComptable as $comptab){ 
                                                                $imat = $comptab->imUser; 
                                                                $prenom = $comptab->prenom;
                                                                $pseudo =  $comptab->pseudo;
                                                                
                                                            ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom.' ('.$pseudo.')'; ?></option>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php echo $tabPaneBABG ;?>" id="BABGInfo" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <div class="col-lg-12" id="CASBABG" style="display: noneS;">
                                            <div class="frame">
                                                <button id="SerPriveBABG" class="custom-btn btn-12 SerPriveBABG" onclick="updateValueCasBABG('ServicePrive')"><span class="spCasSerPriveBABG">Cas Service Privé</span><span class="spSerPriveBABG">Service Privé</span></button>
                                                <button id="ECDBABG" class="custom-btn btn-12 ECDBABG" onclick="updateValueCasBABG('ECD')"><span class="spCasECDBABG">Cas ECD</span><span class="spECDBABG">ECD</span></button>
                                                <button id="ELDBABG" class="custom-btn btn-12 ELDBABG" onclick="updateValueCasBABG('ELD')"><span class="spCasELDBABG">Cas ELD</span><span class="spELDBABG">ELD</span></button>
                                                <button id="EFABABG" class="custom-btn btn-12 EFABABG" onclick="updateValueCasBABG('EFA')"><span class="spCasEFABABG">Cas EFA</span><span class="spEFABABG">EFA</span> </button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="iq-card-body" id="verifPieceBABG" style="display: none;">
                                        <!-- <form  action="<?php echo base_url(); ?>adminpagecontroller/updateValidation" method="post"> -->
                                        <form class="update-validation-form">

                                            <div class=" row align-items-center">
                                                <div class="form-group col-sm-4" id="pieceBASEBABG">
                                                    <h4 class="mb-25">Piéce de base</h4>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBaseBABG1">
                                                        <label class="custom-control-label" for="switchPieceBaseBABG1">Formulaire de demande dûment rempli ;</label>
                                                    </div>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBaseBABG2">
                                                        <label class="custom-control-label" for="switchPieceBaseBABG2">Arrêté d’intégration ou de nomination ;</label>
                                                    </div>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBaseBABG3">
                                                        <label class="custom-control-label" for="switchPieceBaseBABG3">Arrêté de titularisation ;</label>
                                                    </div>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBaseBABG4">
                                                        <label class="custom-control-label" for="switchPieceBaseBABG4">Relevé de Service bien détaillé <br>et signé par le responsable du personnel ;</label>
                                                    </div>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBaseBABG5">
                                                        <label class="custom-control-label" for="switchPieceBaseBABG5">Photocopie de l’avis de crédit ou du bon de caisse ;</label>
                                                    </div>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBaseBABG6">
                                                        <label class="custom-control-label" for="switchPieceBaseBABG6">Photocopie de la CIN.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4" id="pieceSPECIFIQUEBABG">
                                                    <div class="row specEFABABG" id="specEFABABG" style="display: none;">
                                                        <h4 class="mb-25">Piéce Spécifiquement pour EFA</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceEFABABG1">
                                                            <label class="custom-control-label" for="switchPieceEFABABG1">Première et dernièr contrat de travail;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceEFABABG2">
                                                            <label class="custom-control-label" for="switchPieceEFABABG2">Avenant s'il a reclassement</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceEFABABG3">
                                                            <label class="custom-control-label" for="switchPieceEFABABG3">Attestation de prise de service</label>
                                                        </div>
                                                    </div>
                                                    <div class="row specELDBABG" id="specELDBABG" style="display: none;">
                                                        <h4 class="mb-25">Piéce Spécifiquement pour ELD</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceELDBABG">
                                                            <label class="custom-control-label" for="switchPieceELDBABG">Première et dernièr décision d'engagement
                                                        </div>
                                                    </div>
                                                    <div class="row specECDBABG" id="specECDBABG" style="display: none;">
                                                        <h4 class="mb-25">Piéce Spécifiquement pour ECD</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceECDBABG1">
                                                            <label class="custom-control-label" for="switchPieceECDBABG1">Première et dernièr décision d'engagement;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceECDBABG2">
                                                            <label class="custom-control-label" for="switchPieceECDBABG2">Cértificat de non interruption de service; </label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceECDBABG3">
                                                            <label class="custom-control-label" for="switchPieceECDBABG3">Relevé de services émenant dans le CNaPS <br> (pour le transfert des cotisations)</label>
                                                        </div>
                                                    </div>
                                                    <div class="row specSerPriveBABG" id="specSerPriveBABG" style="display: none;">
                                                        <h4 class="mb-25">Piéce Spécifiquement pour Service Privé</h4>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBABG1">
                                                            <label class="custom-control-label" for="switchPieceSerPriveBABG1">Cértificat de Travail;</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBABG2">
                                                            <label class="custom-control-label" for="switchPieceSerPriveBABG2">Relevé de services émenant de la CNaPS <br>(pour le transfert des cotisations);</label>
                                                        </div>
                                                        <div class="col-4 col-md-9 custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="switchPieceSerPriveBABG3">
                                                            <label class="custom-control-label" for="switchPieceSerPriveBABG3">Lettre d'engagement de payer la part individuelle de 4%  <br>et la part patronale de 16%. (4% + 16%);</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4" id="informationBABG" style="display: none;">
                                                    <h4 class="mb-25">Autre informaion</h4>
                                                    <input type="hidden" value="<?php echo $immatricule ;?>" name="immatricule">
                                                    
                                                    <input type="hidden" value="BA-BG" name="typeBudget" id="typeBudgetBABG">
                                                    <input type="hidden" value="<?php echo $cas ;?>" name="cas" id="casBABG" >
                                                    <div class="form-group was-validated">
                                                        <label for="#">Comptable</label>
                                                        <select class="custom-select" name="comptable" required>
                                                            <?php foreach ($showComptable as $comptab){ 
                                                                $imat = $comptab->imUser; 
                                                                $prenom = $comptab->prenom;
                                                                $pseudo =  $comptab->pseudo;
                                                                
                                                            ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom.' ('.$pseudo.')'; ?></option>
                                                            <?php } 
                                                             foreach ($showOtherComptable as $comptab){ 
                                                                $imat = $comptab->imUser; 
                                                                $prenom = $comptab->prenom;
                                                                $pseudo =  $comptab->pseudo;
                                                                
                                                            ?>
                                                                <option value="<?php echo $imat; ?>"><?php echo $prenom.' ('.$pseudo.')'; ?></option>
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
                                            <div class="col-lg-12 justify-content-center">
                                                <div class="row specBA" id="specBABG" style="display: nones;">
                                                    <h4 class="mb-25">Piéce Spécifiquement pour Budget Autonome</h4>
                                                    <div class="col-4 col-md-9 custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switchPieceBABG">
                                                        <label class="custom-control-label" for="switchPieceBABG">Relevé des cotisations CPR 3% avec références des mandats de versement au Trésor public<br>
                                                        (visé et reconnu par le responsable du Trésor ou de la Perception ou ont été payeés le cotisations);</label>
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
        </div>
    <?php } ?>    
<?php else: ?>
    <div class="row">
        
        <div class="col-lg-6">
            <img src="<?php echo base_url()?>assets/images/nodatafound.jpg" alt="" srcset="" style="width:70%">
        </div>
        <div class="col-lg-6">
            <h2 class="h1 mr-3">Aucun résultat trouvé.</h2>
        </div>
    </div>
<?php endif; ?>

<script>
        // function updateDemande(immatricule) {
        //     var UpdatePage = $('#UpdatePage');
        //     var startPage = $('#startPage');
        //     var comptable = $('#comptable'+immatricule).val();
        //     console.log('immatricule:', immatricule);
        //     console.log('comptable:', comptable);
        //     // Envoie de la requête AJAX
        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php echo base_url()?>adminpagecontroller/updateValidation', // Assurez-vous d'ajuster l'URL en conséquence
        //         data: { immatricule: immatricule, comptable:comptable },
        //         success: function (data) {
        //             UpdatePage.show();
        //             startPage.hide();
        //             UpdatePage.html(data);
                    
        //         },
        //         error: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }


        $('.update-validation-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            var UpdatePage = $('#UpdatePage');
            var startPage = $('#startPage');
            // Get form data
            var formData = $(this).serialize();
            console.log("formupdate : "+formData)
            // var row = $(this).closest('.row');

            // var im = $('.current-comptable-immat').text();

            $.ajax({
                type: 'POST', // Use GET method
                url: '<?php echo base_url("adminpagecontroller/updateValidation"); ?>' , // Append form data to the URL
                data: formData, // Use the data option for POST requests
                dataType: 'json',
                success: function (response) {
                    // Check the response
                    if (response.success) {
                        UpdatePage.hide();
                        startPage.show();
                        $('.type-budget-update-' + response.immatricule).html(response.typeBudget);
                        $('.cas-update-' + response.immatricule).html(response.cas);

                        $('.comptable-im-' + response.immatricule).html(response.comptableName);
                        // startPage.html(response.list);
                        swal("Edition avec succès", "","success");
                        setTimeout(function(){
                            swal.close();
                        }, 2000);
                        // console.log("data : "+ response.id + " , "+ response.comptable)

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
    </script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidationController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->model('validationmodel');
        $this->load->model('titularisationmodel');
        $this->load->model('veilleintegremodel');
        $this->load->model('priseservicemodel');
        $this->load->model('cnapsmodel');

        // $this->load->model('adminpagemodel');
        $this->load->library('session');
    }

    public function addValidation() {
        $immatricule = $this->input->post('immatricule');
        $typeBudgetBG = $this->input->post('typeBudget');
        $casBG = $this->input->post('cas');
        $comptable = $this->input->post('comptable');
        $dateArrive = date("Y-m-d");
        $check = $this->validationmodel->searchValidationByIM($immatricule);
          // Ajoutez une vérification si 0l'immatricule existe dans la table de validation
        
          if ($check) {
            // L'immatricule existe dans la table de validation, vous pouvez gérer cela ici
            
            $this->session->set_flashdata('error', 'L\'immatricule existe déjà dans <br> la traitement de validation, ');
              redirect('liste-demande');
            
        }else{
          // Appel de la méthode du modèle pour ajouter le nouvel utilisateur à la table validation
          $inserted = $this->validationmodel->addValidation($immatricule, $casBG, $typeBudgetBG, $dateArrive,$comptable);
  
          if ($inserted) {
              $this->session->set_flashdata('success', 'Insertion avec succes, ');
              redirect('liste-demande');
          } else {
              // Gérer l'erreur d'insertion
          }
        }
        
      }

      public function editValidationComptable(){
        $comptable = $this->input->post('comptableId');
        $prenoms = $this->input->post('prenoms');
        $idValidation = $this->input->post('id');
        $edited = $this->validationmodel->editValidation($idValidation,$comptable);
    
        if ($edited) {
            $response['success'] = true;
            $response['message'] = 'Edition avec succès'.$comptable." ".$idValidation;
            $response['id'] = $idValidation;
            $response['comptable'] = $comptable;
            // $response['prenoms'] = $prenoms;
            // $this->session->set_flashdata('success', 'Donnée a été suppmodifié, ');


        } else {
            $response['success'] = false;
            $response['message'] = 'Erreur lors de l\'édition';
        }
    
        echo json_encode($response);
    }

    public function delValidation(){
      $id = $this->input->post('id');
      $deleted = $this->validationmodel->deleteValidation($id);
      if ($deleted) {
        // $this->session->set_flashdata('success', 'Donnée a été supprimer, ');
        $response['success'] = true;
        $response['id'] = $id;

        
        // redirect('adminpage');
      }
      else {
        $response['success'] = false;
        $response['message'] = 'Erreur lors de la suppression';
    }
      echo json_encode($response);
    }

    public function receivedValidationPage(){
      $user = $this->session->userdata('user');
      $immatricule = $user['imUser'];
      $data['number'] = $this->validationmodel->Notification($immatricule);
      $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
      $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
      $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
      $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
      $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
      $data['validationData'] = $this->validationmodel->ValidationByComptable($immatricule);
    
      if($user && isset($user['fonction'])){ 
          if($user['fonction'] == 'Comptable'){
              $this->load->view('Header1', $data);
              $this->load->view('receivedValidationPage', $data);
              $this->load->view('Footer');
          } elseif ($user['fonction'] == 'Chef de Bureau') {
              redirect('/');
          }
      } else {
          redirect('/');
      }
    }
    
    public function ValidationService(){
    
      $immatricule = $this->input->post('immatricule');
      $cas = $this->input->post('cas');
      //information sur table validation
      $poste = $this->input->post('poste');
      $direction = $this->input->post('direction');
      $duDateValidation = $this->input->post('duDateValidation');
      $auDateValidation = $this->input->post('auDateValidation');
      $duDateRetard = $this->input->post('duDateRetard');
      $auDateRetard = $this->input->post('auDateRetard');
  
      //information sur table titularisation
      $Integre = $this->input->post('integre');
      $dateTitularisation = $this->input->post('dateTitularisation');
      $corpsTitularisation = $this->input->post('corpsTitularisation');
      $gradeTitularisation = $this->input->post('gradeTitularisation');
      $indiceTitularisation = $this->input->post('indiceTitularisation');
      $categTitularisation = $this->input->post('categTitularisation');
  
      // if($cas == "EFA" || $cas == "ELD-EFA" || $cas == "ServicePrive-ECD-ELD-EFA"){
        if (strpos($cas, 'EFA') !== false  ) {

        //information sur table veilleIntegre
        $dateVeilleInteg = $this->input->post('dateVeilleIntegre');
        $corpsVeilleInteg = $this->input->post('corpsVeilleIntegre');
        $gradeVeilleInteg = $this->input->post('gradeVeilleIntegre');
        $indiceVeilleInteg = $this->input->post('indiceVeilleIntegre');
        $categVeilleInteg = $this->input->post('categVeilleIntegre');
        
        //information sur table PriseService
        $datePriseService = $this->input->post('datePriseService');
        $corpsPriseService = $this->input->post('corpsPriseService');
        $gradePriseService = $this->input->post('gradePriseService');
        $indicePriseService = $this->input->post('indicePriseService');
        $categPriseService = $this->input->post('categPriseService');
      }else{
        //information sur table veilleIntegre
        $dateVeilleInteg = "";
        $corpsVeilleInteg = "";
        $gradeVeilleInteg = "";
        $indiceVeilleInteg = "";
        $categVeilleInteg = "";
  
          //information sur table PriseService
        $datePriseService = "";
        $corpsPriseService = "";
        $gradePriseService = "";
        $indicePriseService = "";
        $categPriseService = "";
  
      }
  
      // if ($cas == "ServicePrive" || $cas == "ECD" || $cas == "ServicePrive-ECD" || $cas == "ServicePrive-ECD-ELD-EFA") {
        if (strpos($cas, 'ServicePrive') !== false  || strpos($cas, 'ECD') !== false   ) {

        //information sur table CNaPS
        $duDateCNaPS = $this->input->post('duDateCNaPS');
        $auDateCNaPS = $this->input->post('auDateCNaPS');
        $MontantPrive = $this->input->post('MontantPrive');
        $MontantECD = $this->input->post('MontantECD');
        $Tx = $this->input->post('Tx');
        $TxUn = $this->input->post('TxUn');
        $TxDeux = $this->input->post('TxDeux');
      }else {
        //information sur table CNaPS
        $duDateCNaPS = "";
        $auDateCNaPS = "";
        $MontantPrive = "";
        $MontantECD = "";
        $Tx = "";
        $TxUn = "";
        $TxDeux = "";
      }
  
      $ReUpdateValidation = $this->validationmodel->ReUpdateValidation($immatricule, $poste, $direction, $duDateValidation, $auDateValidation, $duDateRetard, $auDateRetard);
      // $insertTitularisation = $this->titularisationmodel->insertTitularisation($immatricule, $Integre, $dateTitularisation, $corpsTitularisation, $gradeTitularisation, $indiceTitularisation, $categTitularisation);
      // $insertVeilleIntegration = $this->veilleintegremodel->insertVeilleIntegration($immatricule, $dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg);
      // $insertPriseService = $this->priseservicemodel->insertPriseService($immatricule, $datePriseService, $corpsPriseService, $gradePriseService, $indicePriseService, $categPriseService);
      // $insertCNaPS = $this->cnapsmodel->insertCNaPS($immatricule, $duDateCNaPS, $auDateCNaPS, $MontantPrive, $MontantECD, $Tx, $TxUn, $TxDeux);
  
      $insertTitularisation = $this->titularisationmodel->insertOrUpdateTitularisation($immatricule, $Integre, $dateTitularisation, $corpsTitularisation, $gradeTitularisation, $indiceTitularisation, $categTitularisation);
      $insertVeilleIntegration = $this->veilleintegremodel->insertOrUpdateVeilleIntegre($immatricule, $dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg);
      $insertPriseService = $this->priseservicemodel->insertOrUpdatePriseService($immatricule, $datePriseService, $corpsPriseService, $gradePriseService, $indicePriseService, $categPriseService);
      $insertCNaPS = $this->cnapsmodel->insertOrUpdateCnaps($immatricule, $duDateCNaPS, $auDateCNaPS, $MontantPrive, $MontantECD, $Tx, $TxUn, $TxDeux);
  

      if($ReUpdateValidation && $insertTitularisation && $insertVeilleIntegration && $insertPriseService && $insertCNaPS){
        $this->session->set_flashdata('success', 'Bien Validée, ');
        redirect('userpage');
      }
    }

    
    public function fillUpdateUserValidationForm(){
    
      $immatricule = $this->input->post('immatricule');
      $cas = $this->input->post('cas');
      //information sur table validation
        $validationInfo = $this->validationmodel->validationInfo($immatricule);
        $titularisationInfo = $this->titularisationmodel->titularisationInfo($immatricule);

        if (strpos($cas, 'EFA') !== false  ) {
          $veilleIntegreInfo = $this->veilleintegremodel->veilleIntegreInfo($immatricule);
          $priseServiceInfo = $this->priseservicemodel->priseServiceInfo($immatricule);
          $response['veilleIntegreInfo'] = $veilleIntegreInfo;
          $response['priseServiceInfo'] = $priseServiceInfo;

        }
        // if($cas === "ServicePrive" || $cas === "ECD" || $cas === "ServicePrive-ECD"){
          if (strpos($cas, 'ServicePrive') !== false  || strpos($cas, 'ECD') !== false   ) {

          $cnapsInfo = $this->cnapsmodel->cnapsInfo($immatricule);
          $response['cnapsInfo'] = $cnapsInfo;

        }
      // $response['success'] = true;
      // $response['poste'] = $validationInfo["Poste"];
      // $response['direction'] = $validationInfo["Direction"];
      if ($validationInfo ) {
        $response['success'] = true;
        //validation
        // $response['poste'] = $validationInfo["Poste"];
        // $response['direction'] = $validationInfo["Direction"];
        // $response['DuDateValidation'] = $validationInfo["DuDateValidation"];
        $response['validationInfo'] = $validationInfo;

        //titularisation
        $response['titularisationInfo'] = $titularisationInfo;

        // $response['tous'] = $validationInfo;
    } else {
        // Handle the case where no information is found
        $response['success'] = false;
        $response['error'] = "No information found for immatricule: $immatricule";
    }

      echo json_encode($response);

    }

    public function updateUserValidation(){
    
      $immatricule = $this->input->post('immatricule');
      $cas = $this->input->post('cas');
      //information sur table validation
      $poste = $this->input->post('poste');
      $direction = $this->input->post('direction');
      $duDateValidation = $this->input->post('duDateValidation');
      $auDateValidation = $this->input->post('auDateValidation');
      $duDateRetard = $this->input->post('duDateRetard');
      $auDateRetard = $this->input->post('auDateRetard');
  
      //information sur table titularisation
      $Integre = $this->input->post('integre');
      $dateTitularisation = $this->input->post('dateTitularisation');
      $corpsTitularisation = $this->input->post('corpsTitularisation');
      $gradeTitularisation = $this->input->post('gradeTitularisation');
      $indiceTitularisation = $this->input->post('indiceTitularisation');
      $categTitularisation = $this->input->post('categTitularisation');
  
      // if($cas == "EFA" || $cas == "ELD-EFA" || $cas == "ServicePrive-ECD-ELD-EFA"){
        if (strpos($cas, 'EFA') !== false  ) {
        //information sur table veilleIntegre
        $dateVeilleInteg = $this->input->post('dateVeilleIntegre');
        $corpsVeilleInteg = $this->input->post('corpsVeilleIntegre');
        $gradeVeilleInteg = $this->input->post('gradeVeilleIntegre');
        $indiceVeilleInteg = $this->input->post('indiceVeilleIntegre');
        $categVeilleInteg = $this->input->post('categVeilleIntegre');
        
        //information sur table PriseService
        $datePriseService = $this->input->post('datePriseService');
        $corpsPriseService = $this->input->post('corpsPriseService');
        $gradePriseService = $this->input->post('gradePriseService');
        $indicePriseService = $this->input->post('indicePriseService');
        $categPriseService = $this->input->post('categPriseService');
      }
  
      // if ($cas == "ServicePrive" || $cas == "ECD" || $cas == "ServicePrive-ECD" || $cas == "ServicePrive-ECD-ELD-EFA") {
        if (strpos($cas, 'ServicePrive') !== false  || strpos($cas, 'ECD') !== false   ) {

        //information sur table CNaPS
        $duDateCNaPS = $this->input->post('duDateCNaPS');
        $auDateCNaPS = $this->input->post('auDateCNaPS');
        $MontantPrive = $this->input->post('MontantPrive');
        $MontantECD = $this->input->post('MontantECD');
        $Tx = $this->input->post('Tx');
        $TxUn = $this->input->post('TxUn');
        $TxDeux = $this->input->post('TxDeux');
      }
  
      $ReUpdateValidation = $this->validationmodel->ReUpdateValidation($immatricule, $poste, $direction, $duDateValidation, $auDateValidation, $duDateRetard, $auDateRetard);
      $ReUpdateTitularisation = $this->titularisationmodel->ReUpdateTitularisation($immatricule, $Integre, $dateTitularisation, $corpsTitularisation, $gradeTitularisation, $indiceTitularisation, $categTitularisation);
      $ReUpdateVeilleIntegre = $this->veilleintegremodel->ReUpdateVeilleIntegre($immatricule, $dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg);
      $ReUpdatePriseService = $this->priseservicemodel->ReUpdatePriseService($immatricule, $datePriseService, $corpsPriseService, $gradePriseService, $indicePriseService, $categPriseService);
      $ReUpdateCnaps = $this->cnapsmodel->ReUpdateCnaps($immatricule, $duDateCNaPS, $auDateCNaPS, $MontantPrive, $MontantECD, $Tx, $TxUn, $TxDeux);
  
      if($ReUpdateValidation && $ReUpdateTitularisation && $ReUpdateVeilleIntegre && $ReUpdatePriseService
      && $ReUpdateCnaps){
        $this->session->set_flashdata('success', 'Modification Validée, ');
        redirect('userpage');
      }
    }


}
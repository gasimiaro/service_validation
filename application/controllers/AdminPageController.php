<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPageController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->model('comptablemodel');
        $this->load->model('agentmodel');

        $this->load->model('validationmodel');

        // $this->load->model('adminpagemodel');
        $this->load->library('session');
    }

    public function AdminPageHome(){
        $user = $this->session->userdata('user');
        $immatricule = $user['imUser'];
        $data['number'] = $this->validationmodel->Notification($immatricule);
        $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
        $data['pendingValidation'] = $this->validationmodel->pendingValidation();

        $data['count'] = $this->validationmodel->TotalNbValidation();
        $data['countYear'] = $this->validationmodel->YearNbValidation();
        $data['countTraite'] = $this->validationmodel->NbTraiteValidation();
        $allVAlidationFullTreat =  $this->validationmodel->AllValidationFullTreat('');
        $data['countFullTreat'] = $allVAlidationFullTreat['count'];
        // $data['listFullTreat'] = $allVAlidationFullTreat['list'];

        $allValidationIncompleteTreat =  $this->validationmodel->AllValidationIncompleteTreat('');
        $data['countIncompleteTreat'] = $allValidationIncompleteTreat['count'];
        // $data['listIncompleteTreat'] = $allValidationIncompleteTreat['list'];


        $data['countWait'] = $this->validationmodel->NbWaitValidation();
        // $data['comptable'] = $this->comptablemodel->comptable();

        $data['listValidation'] = $this->validationmodel->allValidation();

        $data['completeValidation'] = $this->validationmodel->completeValidation();
       //for graph
        $data['statCompleteValidation'] = $this->validationmodel->validationStateCompletePerMonth(date('Y'));
        $data['statIncompleteValidation'] = $this->validationmodel->validationStateIncompletePerMonth(date('Y'));

        // $validationStatePerMonth = $this->validationStateCompletePerMonth($annee);

        $data['statPendingValidation'] = $this->validationmodel->validationStatePendingPerMonth(date('Y'));

        $data['countValidationsByYear'] = $this->validationmodel->countValidationsByYear();
        $data['countValidationsBG'] = $this->validationmodel->countValidationsByTypeBudget('BG');
        $data['countValidationsBA'] = $this->validationmodel->countValidationsByTypeBudget('BA');
        $data['countValidationsBABG'] = $this->validationmodel->countValidationsByTypeBudget('BABG');
        $data['numberPerCasExist'] = $this->validationmodel->numberPerCasExist();



        $data['numberPerMonth'] = $this->validationmodel->numberPerMonth();
        // $data['numberBG'] = $this->validationmodel->numberBG();
        // $data['numberBA'] = $this->validationmodel->numberBA();
        // $data['numberBAG'] = $this->validationmodel->numberBAG();

    if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Chef de Bureau'){
          $this->load->view('adminHeader',$data);
          $this->load->view('adminHome',$data);
          $this->load->view('Footer');
          
        } elseif ($user['fonction'] == 'Comptable') {
            redirect('/login');
        }
    } else {
        redirect('/login');
    }
  }
  public function filterGraphStateValidation(){
    // Récupérer la valeur sélectionnée depuis la requête POST
    $selectedYearRange = $this->input->post('selectedYearRange');

    // Appeler les méthodes du modèle avec la bonne variable
    $statIncompleteValidation = $this->validationmodel->validationStateIncompletePerMonth($selectedYearRange);
    $statCompleteValidation = $this->validationmodel->validationStateCompletePerMonth($selectedYearRange);
    $statPendingValidation = $this->validationmodel->validationStatePendingPerMonth($selectedYearRange);

    // Préparer la réponse JSON
    $response['success'] = true;
    $response['statIncompleteValidation'] = $statIncompleteValidation;
    $response['statCompleteValidation'] = $statCompleteValidation;
    $response['statPendingValidation'] = $statPendingValidation;

    // Envoyer la réponse JSON
    echo json_encode($response);
}



  public function listRequestAdmin(){
    $user = $this->session->userdata('user');
    $immatricule = $user['imUser'];
    $data['number'] = $this->validationmodel->Notification($immatricule);
    $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
    $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
    $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
    $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
    $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
    // $data['validationData'] = $this->validationmodel->allBudgetValidationByCompt($immatricule);
    // $data['listValidation'] = $this->validationmodel->allValidation();
    // $data['completeValidation'] = $this->validationmodel->completeValidation();

    
    $allVAlidationFullTreat =  $this->validationmodel->AllValidationFullTreat('');
    $data['completeValidation'] = $allVAlidationFullTreat['list'];

    $allVAlidationIncompleteTreat =  $this->validationmodel->AllValidationIncompleteTreat('');
    $data['incompleteValidation'] = $allVAlidationIncompleteTreat['list'];
    $data['pendingValidation'] = $this->validationmodel->pendingValidation();

    // Convert objects to arrays
    $pendingArray = array_map(function($obj) {
      return (array)$obj;
    }, $data['pendingValidation']);


    $data['listValidation'] = array_merge(
      $pendingArray,
      $data['completeValidation'],
      $data['incompleteValidation']
  );

  usort($data['listValidation'], function($a, $b) {
    return $b['id'] - $a['id'];
});

    $data['comptable'] = $this->comptablemodel->comptable();


  
    if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Comptable'){
            $this->load->view('Header', $data);
            $this->load->view('listRequestAdminPage', $data);
            $this->load->view('Footer');
        } elseif ($user['fonction'] == 'Chef de Bureau') {
          $this->load->view('adminHeader', $data);
          $this->load->view('listRequestAdminPage', $data);
          $this->load->view('Footer');
        }
    } else {
        redirect('/login');
    }
  }

  public function listPendingAdmin(){
    $user = $this->session->userdata('user');
    $immatricule = $user['imUser'];
    $data['number'] = $this->validationmodel->Notification($immatricule);
    $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
    $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
    $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
    $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
    $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
    // $data['validationData'] = $this->validationmodel->allBudgetValidationByCompt($immatricule);
    $data['pendingValidation'] = $this->validationmodel->pendingValidation();
    $data['comptable'] = $this->comptablemodel->comptable();


  
    if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Comptable'){
            $this->load->view('Header', $data);
            $this->load->view('PendingAdminPage', $data);
            $this->load->view('Footer');
        } elseif ($user['fonction'] == 'Chef de Bureau') {
          $this->load->view('adminHeader', $data);
          $this->load->view('PendingAdminPage', $data);
          $this->load->view('Footer');
        }
    } else {
        redirect('/login');
    }
  }
  public function listCompleteAdmin(){
    $user = $this->session->userdata('user');
    $immatricule = $user['imUser'];
    $data['number'] = $this->validationmodel->Notification($immatricule);
    $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
    $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
    $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
    $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
    $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
    // $data['validationData'] = $this->validationmodel->allBudgetValidationByCompt($immatricule);

    $allVAlidationFullTreat =  $this->validationmodel->AllValidationFullTreat('');
    // $data['countFullTreat'] = $allVAlidationFullTreat['count'];
    $data['completeValidation'] = $allVAlidationFullTreat['list'];

    // $data['completeValidation'] = $this->validationmodel->completeValidation();
    $data['comptable'] = $this->comptablemodel->comptable();


  
    if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Comptable'){
            $this->load->view('Header', $data);
            $this->load->view('CompleteAdminPage', $data);
            $this->load->view('Footer');
        } elseif ($user['fonction'] == 'Chef de Bureau') {
          $this->load->view('adminHeader', $data);
          $this->load->view('CompleteAdminPage', $data);
          $this->load->view('Footer');
        }
    } else {
        redirect('/login');
    }
  }

  public function listIncompleteAdmin(){
    $user = $this->session->userdata('user');
    $immatricule = $user['imUser'];
    $data['number'] = $this->validationmodel->Notification($immatricule);
    $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
    $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
    $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
    $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
    $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
    // $data['validationData'] = $this->validationmodel->allBudgetValidationByCompt($immatricule);

    $allVAlidationIncompleteTreat =  $this->validationmodel->AllValidationIncompleteTreat('');
    // $data['countFullTreat'] = $allVAlidationFullTreat['count'];
    $data['incompleteValidation'] = $allVAlidationIncompleteTreat['list'];

    // $data['completeValidation'] = $this->validationmodel->completeValidation();
    $data['comptable'] = $this->comptablemodel->comptable();


  
    if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Comptable'){
            $this->load->view('Header', $data);
            $this->load->view('incompleteAdminPage', $data);
            $this->load->view('Footer');
        } elseif ($user['fonction'] == 'Chef de Bureau') {
          $this->load->view('adminHeader', $data);
          $this->load->view('incompleteAdminPage', $data);
          $this->load->view('Footer');
        }
    } else {
        redirect('/login');
    }
  }

  public function allBudgetDownPageAdmin(){
    $user = $this->session->userdata('user');
    $immatricule = $user['imUser'];
    // $data['number'] = $this->databasemodel->Notification($immatricule);
    // $data['newValidation'] = $this->databasemodel->NewValidation($immatricule);
    // $data['count'] = $this->databasemodel->TotalNbValidation();
    // $data['countYear'] = $this->databasemodel->YearNbValidationByCom($immatricule);
    // $data['countTraite'] = $this->databasemodel->NbTraiteValidationByCom($immatricule);
    // $data['countWait'] = $this->databasemodel->NbWaitValidationByCom($immatricule);
    // $data['validationData'] = $this->databasemodel->allBudgetValidation();
  
    if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Comptable'){
            $this->load->view('Header', $data);
            $this->load->view('allBudgetDownPage', $data);
            $this->load->view('Footer');
        } elseif ($user['fonction'] == 'Chef de Bureau') {
          $this->load->view('adminHeader', $data);
          $this->load->view('allBudgetDownPage', $data);
          $this->load->view('Footer');
        }
    } else {
        redirect('/login');
    }
  }

  public function updateNotification() {
    $view = '1';
    
    $immatricule = $this->input->post('immatricule');
    // Ajoutez votre logique pour mettre à jour les informations dans la base de données
    $viewed = $this->validationmodel-->updateNotification($immatricule,$view);
    if ($viewed) {
      redirect('gererUserPage');
  } else {
    redirect('gererUserPage');
  }
}

public function gererUser(){
      $user = $this->session->userdata('user');
      $immatricule = $user['imUser'];

      $data['comptables'] = $this->comptablemodel->comptables();
      $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
      $data['number'] = $this->validationmodel->Notification($immatricule);


      if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Chef de Bureau'){
          $this->load->view('adminHeader',$data);
          $this->load->view('gererUser', $data);
          $this->load->view('Footer');
          
        } elseif ($user['fonction'] == 'Comptable') {
            redirect('/');
        }
    } else {
        redirect('/');
    }
}

public function userDetails(){
      $immatricule = $this->input->post('imatComptable');
      $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
      $data['number'] = $this->validationmodel->Notification($immatricule);

      $data['results'] = $this->agentmodel->checkComptable($immatricule);



      $allVAlidationFullTreat =  $this->validationmodel->AllValidationFullTreat($immatricule);
      $data['completeValidation'] = $allVAlidationFullTreat['list'];
  
      $allVAlidationIncompleteTreat =  $this->validationmodel->AllValidationIncompleteTreat($immatricule);
      $data['incompleteValidation'] = $allVAlidationIncompleteTreat['list'];
      $data['pendingValidation'] = $this->validationmodel->pendingValidationByComptable($immatricule);
  
      // Convert objects to arrays
      $pendingArray = array_map(function($obj) {
        return (array)$obj;
      }, $data['pendingValidation']);
  
  
      $data['byComptable'] = array_merge(
        $pendingArray,
        $data['completeValidation'],
        $data['incompleteValidation']
    );
  
    usort($data['byComptable'], function($a, $b) {
      return $b['id'] - $a['id'];
    });

      $data['comptable'] = $this->comptablemodel->comptable();


                $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
          $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
          

          $allVAlidationFullTreat =  $this->validationmodel->AllValidationFullTreat($immatricule);
          $data['countTraite'] = $allVAlidationFullTreat['count'];
          // $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);

          $allVAlidationIncompleteTreat =  $this->validationmodel->AllValidationIncompleteTreat($immatricule);
          $data['countAnomalie'] = $allVAlidationIncompleteTreat['count'];

          $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);


          $allVAlidationFullTreat =  $this->validationmodel->AllValidationFullTreat($immatricule);
          $filteredResults = [];
          foreach ($allVAlidationFullTreat['list'] as $validation) {
            // Assuming dateArrive is a valid date field in your data
            $year = date('Y', strtotime($validation['dateArrive']));
        
            if ($year == date('Y')) {
                $filteredResults[] = $validation;
            }
        }
        $data['countTraiteYear'] = count($filteredResults);

        $allVAlidationIncompleteTreat =  $this->validationmodel->AllValidationIncompleteTreat($immatricule);
        $filteredResults1 = [];
          foreach ($allVAlidationIncompleteTreat['list'] as $validation) {
            // Assuming dateArrive is a valid date field in your data
            $year = date('Y', strtotime($validation['dateArrive']));
        
            if ($year == date('Y')) {
                $filteredResults1[] = $validation;
            }
        }
        $data['countAnomalieYear'] = count($filteredResults1);

          // $data['countTraiteYear'] = $this->validationmodel->NbTraiteValYearByCom($immatricule);

          $data['countWaitYear'] = $this->validationmodel->NbWaitValYearByCom($immatricule);

          $data['listValidation'] = $this->validationmodel->allValidationByComptable($immatricule);
          $data['completeValidation'] = $this->validationmodel->completeValidationByComptable($immatricule);
          $data['pendingValidation'] = $this->validationmodel->pendingValidationByComptable($immatricule);

      $this->load->view('adminHeader',$data);
      $this->load->view('userDetailsPages', $data);
      $this->load->view('Footer');
    }

    
  public function changeUserStatut(){
    $immatricule = $this->input->post('imat');
    $statut = $this->input->post('statut');
    $change = $this->comptablemodel->changeCopmtStatut($immatricule, $statut);
    // $results = $this->comptablemodel->checkComptable($immatricule);
    if ($change) {
      // $this->session->set_flashdata('success', 'Donnée a été supprimer, ');
      $response['success'] = true;
      $response['state'] = $statut;

      
      // redirect('adminpage');
    }
    else {
      $response['success'] = false;
      $response['message'] = 'Erreur lors du changement';
  }
  echo json_encode($response);

  }

}
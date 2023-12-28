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
        $data['countWait'] = $this->validationmodel->NbWaitValidation();
        $data['comptable'] = $this->comptablemodel->comptable();

        $data['listValidation'] = $this->validationmodel->allValidation();

        $data['completeValidation'] = $this->validationmodel->completeValidation();
       
        
        $data['numberPerMonth'] = $this->validationmodel->numberPerMonth();
        $data['numberBG'] = $this->validationmodel->numberBG();
        $data['numberBA'] = $this->validationmodel->numberBA();
        $data['numberBAG'] = $this->validationmodel->numberBAG();

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
    $data['listValidation'] = $this->validationmodel->allValidation();
    $data['completeValidation'] = $this->validationmodel->completeValidation();
    $data['pendingValidation'] = $this->validationmodel->pendingValidation();
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
    $data['completeValidation'] = $this->validationmodel->completeValidation();
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
      $data['byComptable'] = $this->agentmodel->byComptableValidation($immatricule);
      $data['comptable'] = $this->comptablemodel->comptable();


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


    
    // $this->load->view('adminHeader',$data);
    // $this->load->view('userDetailsPages', $data);
    // $this->load->view('Footer');
    
  }

}
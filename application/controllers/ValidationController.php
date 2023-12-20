<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidationController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->model('validationmodel');

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
            $this->session->set_flashdata('success', 'Donnée a été suppmodifié, ');


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
    

}
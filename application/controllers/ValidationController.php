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
              redirect('adminpage');
            
        }else{
          // Appel de la méthode du modèle pour ajouter le nouvel utilisateur à la table validation
          $inserted = $this->validationmodel->addValidation($immatricule, $casBG, $typeBudgetBG, $dateArrive,$comptable);
  
          if ($inserted) {
              $this->session->set_flashdata('success', 'Insertion avec succes, ');
              redirect('adminpage');
          } else {
              // Gérer l'erreur d'insertion
          }
        }
        
      }

}
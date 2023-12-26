<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPageController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->model('validationmodel');
        $this->load->model('comptablemodel');


        // $this->load->model('adminpagemodel');
        $this->load->library('session');
    }

    public function UserPageHome(){
        $user = $this->session->userdata('user');
        $immatricule = $user['imUser'];

        $data['number'] = $this->validationmodel->Notification($immatricule);
        $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
        $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
        $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
        $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
        $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
        $data['listValidation'] = $this->validationmodel->allValidationByComptable($immatricule);
        $data['validationData'] = $this->validationmodel->completeValidationByComptab($immatricule);
        $data['pendingValidation'] = $this->validationmodel->pendingValidationByComptable($immatricule);
      
        if($user && isset($user['fonction'])){ 
            if($user['fonction'] == 'Comptable'){
                $this->load->view('Header');
                $this->load->view('userHome');
                $this->load->view('Footer');
            } elseif ($user['fonction'] == 'Chef de Bureau') {
                redirect('/login');
            }
        } else {
            redirect('/login');
        }
      }

      public function addComptable(){
        $immatricule = $this->input->post('immatricule');
        $pseudo = $this->input->post('pseudo');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $fonction = $this->input->post('fonction');
        $passWord = $this->input->post('passWord');
    
        $check = $this->comptablemodel->checkComptableAgent($immatricule);
        if ($check) {
          $inserted = $this->comptablemodel->addComptable($immatricule, $pseudo, $nom, $prenom, $fonction, $passWord);
    
            if ($inserted) {
                // $this->session->set_flashdata('success', 'Insertion avec succes, ');
                // redirect('gererUserPage');
                $response['success'] = true;
                $response['message'] = "Insertion avec succès";
                if ($fonction == 'Chef De Service') {
                    $poste = "Chef de Service";
                    $alias = "Chef";
                }
                else if ($fonction == 'Chef de Bureau') {
                    $poste = "Chef de Bureau";
                    $alias = "Chef";
                } else if ($fonction == 'Comptable') {
                    $poste = 'Comptable';
                    $alias = "";
                }
                $response['user'] = [
                    'imUser' => $immatricule,
                    'alias' => $alias,
                    'poste' =>$poste,
                    'prenom' => $prenom
                ];

            } else {
            //   $this->session->set_flashdata('error', 'Il y a probleme, ');
            //   redirect('gererUserPage');
              $response['success'] = false;
              $response['message'] = "Il y a un erreur lors de l'insertion";
            }
        } else {
        //   $this->session->set_flashdata('error', 'L\'immatricule pas encore disponible<br> dans notre base de donnee, ');
        //   redirect('gererUserPage');
          $response['success'] = false;
          $response['message'] = "L\'immatricule pas encore disponible<br> dans notre base de donnee";
        }

        echo json_encode($response);
    
      }

      public function updateUserDetails() {
        $immatricule = $this->input->post('immatricule');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $fonction = $this->input->post('fonction');
        // $statut = $this->input->post('statut');
    
        // Ajoutez votre logique pour mettre à jour les informations dans la base de données
        $updated = $this->comptablemodel->updatedComptable($immatricule, $nom, $prenom, $fonction);
        if ($updated) {
        //   $this->session->set_flashdata('success', 'Insertion avec succes, ');
        //   redirect('gererUserPage');
        $response['success'] = true;
        $response['message'] = "Modification avec succès";
        $response['data'] = [     'imUser' => $immatricule,
        'fonction' =>$fonction,
        'prenom' => $prenom];

      } else {
        $response['success'] = false;
        $response['message'] = "Il y a un erreur lors de la modification";
        
      }
      echo json_encode($response);

    }

}
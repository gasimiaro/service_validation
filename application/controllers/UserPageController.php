<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPageController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->model('validationmodel');

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

}
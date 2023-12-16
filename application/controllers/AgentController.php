<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper

        $this->load->model('agentmodel');
        $this->load->model('typebudget');
        $this->load->model('comptablemodel');

        $this->load->library('session');
    }



public function searchAgent(){
      $immatricule = $this->input->post('immatricule'); 
  
      $data['results'] = $this->agentmodel->searchAgentByIM($immatricule);
      $data['typeBudget'] = $this->typebudget->typeBuget();
      $data['comptable'] = $this->comptablemodel->comptable();
      $this->load->view('searchResult', $data);
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->model('loginmodel');

        $this->load->model('comptablemodel');
        $this->load->library('session');
    }

	public function index(){
            if (!$this->session->userdata('user')) {
            $data['comptables'] = $this->comptablemodel->comptables();
            $this->load->view('loginPage',$data);
            } else{
                redirect('adminpage');
            }
        }


        public function login()
        {
            $imatricule = $_POST['imat'];
            $password = $_POST['password'];
        
            $data = $this->loginmodel->login($imatricule, $password);
        
            if ($data) {
                if ($data['fonction'] == 'Chef de Bureau') {
                    $this->session->set_userdata('user', $data);
                    $response['success'] = true;
                    $response['fonction'] = 'Chef de Bureau';

                    // redirect('adminpage');
                }else {
            
                    if ($data['statut'] == "Deblocké") {
                    $this->session->set_userdata('user', $data);
                    $response['success'] = true;
                    $response['fonction'] = 'Comptable';

                            // redirect('userpage');
                    }elseif ($data['statut'] == "Blocké") {
                        // $this->session->set_flashdata('error', 'Vous etes blocker, ');
                        $response['success'] = false;
                        $response['message'] =  'Vous êtes blocker';
                        
                    }
                }
            } else {
                // $this->session->set_flashdata('error', 'Invalide d\'authentification, ');
                // redirect('/login');
                $response['success'] = false;
                $response['message'] =  'On vous connait pas!!!';
            }
            echo json_encode($response);

        }
    
        public function logout() {
            $this->session->unset_userdata('user');
            redirect('/login');
        }
        
    }


    ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DefaultPage extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');  // Load the URL Helper
        $this->load->library('session');
    }

	public function index(){
         redirect('login');
      
        }
        
    }


    ?>
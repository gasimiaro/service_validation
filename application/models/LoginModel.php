<?php 
class LoginModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login($imatricule, $password){
        $query = $this->db->get_where('user', array('imUser'=>$imatricule, 'passWord'=>$password));
        $data = $query->row_array();
        return $query->row_array();
        
        if (isset($data['photo'])) {
            return $data;
          } else {
            return false;
          }
    }

}
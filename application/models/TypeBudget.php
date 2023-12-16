<?php 
class TypeBudget extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function typeBuget(){
        $sql = "SELECT * FROM typebudget";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

}
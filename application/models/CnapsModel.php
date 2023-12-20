<?php 
class CnapsModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getListCNaPS($immatricule) {
        $sql = "SELECT * FROM cnaps WHERE immatricule = ?";
        $query = $this->db->query($sql, array($immatricule));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

}
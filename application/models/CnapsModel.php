<?php 
class CnapsModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('BaremeModel');

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


    public function checkTreatCnaps($imAgent,$cas){

        $this->db->from('cnaps'); 
        $this->db->where("DuDateCNaPS != '' AND AuDateCNaPS != '' ");
        if (strpos($cas, 'ECD') !== false  ) {
            $this->db->where(" MontantECD != '0' ");
        }
        if (strpos($cas, 'ServicePrive') !== false  ) {
            $this->db->where(" MontantPrive != '0' ");
        }
        $this->db->where("immatricule =".$imAgent);
        $result = $this->db->get()->row_array();
        // $number =  $this->db->count_all_results();
    
        return $result ? 'Complete' : 'Empty';

    }
    
    /********************************************* */

}
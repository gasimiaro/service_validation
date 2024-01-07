<?php 
class VeilleIntegreModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('BaremeModel');

    }

    public function getListVeilleIntegre($immatricule) {
        $sql = "SELECT * FROM veilleintegre WHERE immatricule = ?";
        $query = $this->db->query($sql, array($immatricule));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

        /* check if validation treatement well */

public function checkTreatVeilleIntegre($imAgent){

    $this->db->from('veilleintegre'); 
    $this->db->where("Date != '' AND Corps != '' AND Grade != '' AND Indice != '' AND Categorie != ''");
    $this->db->where("immatricule =".$imAgent);
    $result = $this->db->get()->row_array();
    // $number =  $this->db->count_all_results();
    if($result){
        $bareme = new BaremeModel();
        $solde = $bareme->getBareme($result['Categorie'],$result['Indice'],$result['Date']);

            return $solde ? 'Complete' : 'Empty';
        
    }
    else{

        return  "Empty";
    }
    
}

/********************************************* */

}
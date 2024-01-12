<?php 
class PriseServiceModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('BaremeModel');

    }

    public function getListPriseService($immatricule) {
        $sql = "SELECT * FROM priseservice WHERE immatricule = ?";
        $query = $this->db->query($sql, array($immatricule));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }
    

            /* check if validation treatement well */

public function checkTreatPriseService($imAgent){

    $this->db->from('priseservice'); 
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

public function insertPriseService($immatricule, $datePriseService, $corpsPriseService, $gradePriseService, $indicePriseService, $categPriseService){
    $data = array(
        'immatricule' => $immatricule,
        'Date' => $datePriseService,
        'Corps' => $corpsPriseService,
        'Grade' => $gradePriseService,
        'Indice' => $indicePriseService,
        'Categorie' => $categPriseService
    );
    
    return $this->db->insert('priseservice', $data);
}
/********************************************* */

}
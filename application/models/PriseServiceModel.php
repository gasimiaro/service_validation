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
    

    public function priseServiceInfo($immatricule) {

        $this->db->from('priseservice');
        $this->db->where('immatricule', $immatricule);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            // Assuming you want only the first row if there are multiple results
            return $query->row_array();
        } else {
            return null; // or an empty array based on your preference
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

public function insertOrUpdatePriseService($immatricule, $datePriseService, $corpsPriseService, $gradePriseService, $indicePriseService, $categPriseService) {
    // Vérifier si l'immatricule existe déjà
    $existingData = $this->db->get_where('priseservice', array('immatricule' => $immatricule))->row_array();

    // Si l'immatricule existe, effectuer une mise à jour
    if ($existingData) {
        $updateData = array(
            'Date' => $datePriseService,
            'Corps' => $corpsPriseService,
            'Grade' => $gradePriseService,
            'Indice' => $indicePriseService,
            'Categorie' => $categPriseService
        );

        $this->db->where('immatricule', $immatricule);
        $this->db->update('priseservice', $updateData);

        return 'Mise à jour effectuée avec succès';
    } else {
        // Si l'immatricule n'existe pas, effectuer une insertion
        $insertData = array(
            'immatricule' => $immatricule,
            'Date' => $datePriseService,
            'Corps' => $corpsPriseService,
            'Grade' => $gradePriseService,
            'Indice' => $indicePriseService,
            'Categorie' => $categPriseService
        );

        $this->db->insert('priseservice', $insertData);

        return 'Insertion effectuée avec succès';
    }
}

/********************************************* */

}
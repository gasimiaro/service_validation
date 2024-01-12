<?php 
class TitularisationModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();

        $this->load->model('BaremeModel');

    }

    public function getListTitularisation($immatricule) {
        $sql = "SELECT * FROM titularisation WHERE immatricule = ?";
        $query = $this->db->query($sql, array($immatricule));
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

    /* check if validation treatement well */

    public function checkTreatTitularisation($imAgent){
        $this->db->from('titularisation'); 
        $this->db->where("integre != '' AND Date != '' AND Corps != '' AND Grade != '' AND Indice != '' AND Categorie != ''");
        $this->db->where("immatricule", $imAgent);
        $result = $this->db->get()->row_array();
    
        if($result) {
            $bareme = new BaremeModel();
            $solde = $bareme->getBareme($result['Categorie'], $result['Indice'], $result['Date']);
    
            return $solde ? 'Complete' : 'Empty';
        } else {
            return 'Empty';
        }
        // return "Complete";
    }
    
    public function insertTitularisation($immatricule, $Integre, $dateTitularisation, $corpsTitularisation, $gradeTitularisation, $indiceTitularisation, $categTitularisation){
        $data = array(
            'immatricule' => $immatricule,
            'integre' => $Integre,
            'Date' => $dateTitularisation,
            'Corps' => $corpsTitularisation,
            'Grade' => $gradeTitularisation,
            'Indice' => $indiceTitularisation,
            'Categorie' => $categTitularisation
        );
        
        return $this->db->insert('titularisation', $data);
    }
/********************************************* */

}
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
    public function titularisationInfo($immatricule) {

        $this->db->from('titularisation');
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

    // public function ReUpdateTitularisation($immatricule,  $Integre, $dateTitularisation, $corpsTitularisation, $gradeTitularisation, $indiceTitularisation, $categTitularisation){
    //     $data = array(
    //         'immatricule' => $immatricule,
    //         'integre' => $Integre,
    //         'Date' => $dateTitularisation,
    //         'Corps' => $corpsTitularisation,
    //         'Grade' => $gradeTitularisation,
    //         'Indice' => $indiceTitularisation,
    //         'Categorie' => $categTitularisation
    //     );

    //     $this->db->where('immatricule', $immatricule);

    //     return $this->db->update('titularisation', $data);
    // }
    public function insertOrUpdateTitularisation($immatricule, $Integre, $dateTitularisation, $corpsTitularisation, $gradeTitularisation, $indiceTitularisation, $categTitularisation){
        // Vérifier si l'immatricule existe déjà
        $existingData = $this->db->get_where('titularisation', array('immatricule' => $immatricule))->row_array();
    
        // Si l'immatricule existe, effectuer une mise à jour
        if ($existingData) {
            $updateData = array(
                'integre' => $Integre,
                'Date' => $dateTitularisation,
                'Corps' => $corpsTitularisation,
                'Grade' => $gradeTitularisation,
                'Indice' => $indiceTitularisation,
                'Categorie' => $categTitularisation
            );
    
            $this->db->where('immatricule', $immatricule);
            $this->db->update('titularisation', $updateData);
    
            return 'Mise à jour effectuée avec succès';
        } else {
            // Si l'immatricule n'existe pas, effectuer une insertion
            $insertData = array(
                'immatricule' => $immatricule,
                'integre' => $Integre,
                'Date' => $dateTitularisation,
                'Corps' => $corpsTitularisation,
                'Grade' => $gradeTitularisation,
                'Indice' => $indiceTitularisation,
                'Categorie' => $categTitularisation
            );
    
            $this->db->insert('titularisation', $insertData);
    
            return 'Insertion effectuée avec succès';
        }
    }
    
/********************************************* */

}
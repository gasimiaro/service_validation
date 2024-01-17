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

    public function veilleIntegreInfo($immatricule) {

        $this->db->from('veilleintegre');
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

public function insertVeilleIntegration($immatricule, $dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg){
    $data = array(
        'immatricule' => $immatricule,
        'Date' => $dateVeilleInteg,
        'Corps' => $corpsVeilleInteg,
        'Grade' => $gradeVeilleInteg,
        'Indice' => $indiceVeilleInteg,
        'Categorie' => $categVeilleInteg
    );
    
    return $this->db->insert('veilleintegre', $data);
}

// public function ReUpdateVeilleIntegre($immatricule,  $dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg){
//     $data = array(
//         'immatricule' => $immatricule,
//         'Date' => $dateVeilleInteg,
//         'Corps' => $corpsVeilleInteg,
//         'Grade' => $gradeVeilleInteg,
//         'Indice' => $indiceVeilleInteg,
//         'Categorie' => $categVeilleInteg
//     );

//     $this->db->where('immatricule', $immatricule);

//     return $this->db->update('veilleintegre', $data);
// }
public function insertOrUpdateVeilleIntegre($immatricule,$dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg){
    // Vérifier si l'immatricule existe déjà
    $existingData = $this->db->get_where('veilleintegre', array('immatricule' => $immatricule))->row_array();

    // Si l'immatricule existe, effectuer une mise à jour
    if ($existingData) {
        $updateData = array(
            'Date' => $dateVeilleInteg,
            'Corps' => $corpsVeilleInteg,
            'Grade' => $gradeVeilleInteg,
            'Indice' => $indiceVeilleInteg,
            'Categorie' => $categVeilleInteg
        );

        $this->db->where('immatricule', $immatricule);
        $this->db->update('veilleintegre', $updateData);

        return 'Mise à jour effectuée avec succès';
    } else {
        // Si l'immatricule n'existe pas, effectuer une insertion
        $insertData = array(
            'immatricule' => $immatricule,
            'Date' => $dateVeilleInteg,
            'Corps' => $corpsVeilleInteg,
            'Grade' => $gradeVeilleInteg,
            'Indice' => $indiceVeilleInteg,
            'Categorie' => $categVeilleInteg
        );

        $this->db->insert('veilleintegre', $insertData);

        return 'Insertion effectuée avec succès';
    }
}

/********************************************* */

}
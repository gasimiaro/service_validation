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

    public function cnapsInfo($immatricule) {

        $this->db->from('cnaps');
        $this->db->where('immatricule', $immatricule);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            // Assuming you want only the first row if there are multiple results
            return $query->row_array();
        } else {
            return null; // or an empty array based on your preference
        }
    }

    public function checkTreatCnaps($imAgent,$cas){

        $this->db->from('cnaps'); 
        $this->db->where("DuDateCNaPS != '' AND AuDateCNaPS != '' AND Tx != '' AND TxUn != '' AND TxDeux != '' ");
        if (strpos($cas, 'ECD') !== false  ) {
            $this->db->where(" MontantECD != '0' AND MontantECD != '' ");
        }
        if (strpos($cas, 'ServicePrive') !== false  ) {
            $this->db->where(" MontantServPrive != '0'  AND MontantServPrive != '' ");
        }
        $this->db->where("immatricule =".$imAgent);
        $result = $this->db->get()->row_array();
        // $number =  $this->db->count_all_results();
    
        return $result ? 'Complete' : 'Empty';

    }
    

    public function insertCNaPS($immatricule, $duDateCNaPS, $auDateCNaPS, $MontantPrive, $MontantECD, $Tx, $TxUn, $TxDeux){
        $data = array(
            'immatricule' => $immatricule,
            'DuDateCNaPS' => $duDateCNaPS,
            'AuDateCNaPS' => $auDateCNaPS,
            'MontantServPrive' => $MontantPrive,
            'MontantECD' => $MontantECD,
            'Tx' => $Tx,
            'TxUn' => $TxUn,
            'TxDeux' => $TxDeux,
        );
        
        return $this->db->insert('cnaps', $data);
    }

    // public function ReUpdateCnaps($immatricule,  $dateVeilleInteg, $corpsVeilleInteg, $gradeVeilleInteg, $indiceVeilleInteg, $categVeilleInteg){
    //     $data = array(
    //         'immatricule' => $immatricule,
    //         'DuDateCNaPS' => $duDateCNaPS,
    //         'AuDateCNaPS' => $auDateCNaPS,
    //         'MontantServPrive' => $MontantPrive,
    //         'MontantECD' => $MontantECD,
    //         'Tx' => $Tx,
    //         'TxUn' => $TxUn,
    //         'TxDeux' => $TxDeux,
    //     );
    
    //     $this->db->where('immatricule', $immatricule);
    
    //     return $this->db->update('cnaps', $data);
    // }

    public function insertOrUpdateCnaps($immatricule,  $duDateCNaPS, $auDateCNaPS, $MontantPrive, $MontantECD, $Tx, $TxUn, $TxDeux){
        // Vérifier si l'immatricule existe déjà
        $existingData = $this->db->get_where('cnaps', array('immatricule' => $immatricule))->row_array();
    
        // Si l'immatricule existe, effectuer une mise à jour
        if ($existingData) {
            $updateData = array(
                'DuDateCNaPS' => $duDateCNaPS,
                'AuDateCNaPS' => $auDateCNaPS,
                'MontantServPrive' => $MontantPrive,
                'MontantECD' => $MontantECD,
                'Tx' => $Tx,
                'TxUn' => $TxUn,
                'TxDeux' => $TxDeux,
            );
    
            $this->db->where('immatricule', $immatricule);
            $this->db->update('cnaps', $updateData);
    
            return 'Mise à jour effectuée avec succès';
        } else {
            // Si l'immatricule n'existe pas, effectuer une insertion
            $insertData = array(
                'immatricule' => $immatricule,
                'DuDateCNaPS' => $duDateCNaPS,
                'AuDateCNaPS' => $auDateCNaPS,
                'MontantServPrive' => $MontantPrive,
                'MontantECD' => $MontantECD,
                'Tx' => $Tx,
                'TxUn' => $TxUn,
                'TxDeux' => $TxDeux,
            );
    
            $this->db->insert('cnaps', $insertData);
    
            return 'Insertion effectuée avec succès';
        }
    }
    
    /********************************************* */

}
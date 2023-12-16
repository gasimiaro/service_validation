<?php 
class ValidationModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }


    public function searchValidationByIM($immatricule){
        $this->db->select('immatricule');
        $this->db->where('immatricule', $immatricule);
        $query = $this->db->get('validation');
        return $query->num_rows() > 0; // Renvoie vrai si le corps existe, faux sinon.
    }
    
    public function addValidation($immatricule, $cas, $typeBudget, $dateArrive, $comptable){
        $data = array(
            'immatricule' => $immatricule,
            'cas' => $cas,
            'typeBudget' => $typeBudget,
            'dateArrive' => $dateArrive,
            'comptable' => $comptable
        );
        return $this->db->insert('validation', $data);
    }

    public function allValidation(){
        $sql = "SELECT validation.*, agent.NOM, agent.PRENOMS, user.prenom FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function completeValidation(){
        $sql = "SELECT validation.immatricule, agent.NOM, agent.PRENOMS, 
                validation.DuDateValidation, validation.AuDateValidation, 
                validation.Cas, validation.typeBudget, validation.dateArrive, 
                validation.comptable, user.prenom FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser AND validation.DuDateValidation != '' AND validation.AuDateValidation != '' ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function pendingValidation(){
        $sql = "SELECT validation.immatricule, agent.NOM, agent.PRENOMS, 
                validation.DuDateValidation, validation.AuDateValidation, 
                validation.Cas, validation.typeBudget, validation.dateArrive, 
                validation.comptable, user.prenom FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser AND validation.DuDateValidation = '' AND validation.AuDateValidation = '' ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    private function getMonthName($monthNumber) {
        $monthNames = array(
            1 => 'Jan',
            2 => 'Fev',
            3 => 'Mar',
            4 => 'Avr',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec'
        );
    
        return $monthNames[$monthNumber];
    }

    public function numberPerMonth() {
        $sql = "SELECT MONTH(dateArrive) as Mois, COUNT(*) as nombre FROM `validation` GROUP BY MONTH(dateArrive) ORDER BY MONTH(dateArrive) ASC;";
        $query = $this->db->query($sql);
        $result = $query->result();
    
        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'mois' => $this->getMonthName($row->Mois), // Convertir le numéro du mois en nom du mois
                'nombre' => $row->nombre
            );
        }
    
        return $data;
    }

    public function numberBG() {
        $typeBudget = 'BG';
        $this->db->from('validation'); 
        $this->db->where('typeBudget', $typeBudget);
        return $this->db->count_all_results();
    }
    public function numberBA() {
        $typeBudget = 'BA';
        $this->db->from('validation'); 
        $this->db->where('typeBudget', $typeBudget);
        return $this->db->count_all_results();
    }
    public function numberBAG() {
        $typeBudget = 'BAG';
        $this->db->from('validation'); 
        $this->db->where('typeBudget', $typeBudget);
        return $this->db->count_all_results();
    }
    

    public function TotalNbValidation() {
        $this->db->from('validation'); 
        return $this->db->count_all_results();
    }

    public function YearNbValidation() {
        $annee = date("Y");
        $this->db->from('validation'); 
        $this->db->where('YEAR(dateArrive)', $annee);
        return $this->db->count_all_results();
    }
    

    public function NbWaitValidation() {
        $this->db->from('validation'); 
        $this->db->where("validation.DuDateValidation = '' OR validation.AuDateValidation = ''");
        return $this->db->count_all_results();
    }
    public function Notification($imComptable) {
        $this->db->from('validation');
        $this->db->where("validation.DuDateValidation = '' AND validation.AuDateValidation = ''");
        $this->db->where('view', '0'); 
        $this->db->where('comptable', $imComptable); 
        return $this->db->count_all_results();
    }


    public function NbTraiteValidation() {

    $this->db->from('validation'); 
    $this->db->where("validation.DuDateValidation != '' AND validation.AuDateValidation != ''");
    return $this->db->count_all_results();
}


public function NewValidation($imComptable){
    $sql = "SELECT validation.immatricule, agent.NOM, agent.PRENOMS, 
            validation.DuDateValidation, validation.AuDateValidation, 
            validation.Cas, validation.typeBudget, validation.dateArrive, 
            validation.comptable, user.prenom FROM validation, agent, user 
            WHERE validation.immatricule = agent.imatricule 
            AND validation.comptable = user.imUser AND validation.DuDateValidation = ''
            AND validation.AuDateValidation = '' AND validation.view = '0'
            AND validation.comptable = '$imComptable' ORDER BY validation.id DESC";
    $query = $this->db->query($sql);
    return $query->result();
}
public function updateNotification($imatricule, $view){
    
    $this->db->set('view', $view);
    $this->db->where('immatricule', $immatricule);

    $result = $this->db->update('validation');
    return $result;
}
public function TotalNbValidationByComp($imComptable) {
    $this->db->from('validation');
    $this->db->where('comptable', $imComptable); 
    return $this->db->count_all_results();
}
public function YearNbValidationByCom($imComptable) {
    $annee = date("Y");
    $this->db->from('validation'); 
    $this->db->where('YEAR(dateArrive)', $annee);
    $this->db->where('comptable', $imComptable); 
    return $this->db->count_all_results();
}
public function NbTraiteValidationByCom($imComptable) {
    $this->db->from('validation'); 
    $this->db->where("validation.DuDateValidation != '' AND validation.AuDateValidation != ''");
    $this->db->where('comptable', $imComptable); 
    return $this->db->count_all_results();
}

public function NbWaitValidationByCom($imComptable) {
    $this->db->from('validation');
    $this->db->where("validation.DuDateValidation = '' AND validation.AuDateValidation = ''");
    $this->db->where('comptable', $imComptable); 
    return $this->db->count_all_results();
}
public function NbTraiteValYearByCom($imComptable) {
    $annee = date("Y");
    $this->db->from('validation'); 
    $this->db->where("validation.DuDateValidation != '' AND validation.AuDateValidation != ''");
    $this->db->where('YEAR(dateArrive)', $annee);
    $this->db->where('comptable', $imComptable); 
    return $this->db->count_all_results();
}
public function NbWaitValYearByCom($imComptable) {
    $annee = date("Y");
    $this->db->from('validation');
    $this->db->where("validation.DuDateValidation = '' AND validation.AuDateValidation = ''");
    $this->db->where('YEAR(dateArrive)', $annee);
    $this->db->where('comptable', $imComptable); 
    return $this->db->count_all_results();
}

}
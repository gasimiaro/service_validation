<?php 
class ComptableModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }







public function comptables(){
        $sql = "SELECT * FROM user";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function checkComptableAgent($immatricule){
        $this->db->select('imatricule');
        $this->db->where('imatricule', $immatricule);
        $query = $this->db->get('agent');
        return $query->num_rows() > 0; // Renvoie vrai si le corps existe, faux sinon.
    }

    public function addComptable($immatricule, $pseudo, $nom, $prenom, $fonction, $passWord){
        $data = array(
            'imUser' => $immatricule,
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'fonction' => $fonction,
            'passWord' => $passWord
        );
        return $this->db->insert('user', $data);
    }

    public function checkComptable($immatricule){
        $sql = "SELECT * FROM user WHERE imUser = $immatricule";
       
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function changeCopmtStatut($immatricule, $statut){
        $dataStatut = array('statut' => $statut);
        $this->db->where('imUser', $immatricule);
        return $this->db->update('user', $dataStatut);
    }

    public function updatedComptable($immatricule, $nom, $prenom, $fonction) {
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'fonction' => $fonction
        );
        $this->db->where('imUser', $immatricule);
        $this->db->update('user', $data);
    
        return true; // Return true after successful update
    }
    

    public function comptable(){
        $sql = "SELECT * FROM user WHERE fonction = 'Comptable'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

 

    public function byComptableValidation($imComptable){
        $sql = "SELECT validation.*, agent.NOM, agent.PRENOMS, user.prenom, user.fonction FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser AND validation.comptable = '$imComptable'   ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
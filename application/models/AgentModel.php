<?php 
class AgentModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function searchAgentByIM($immatricule){
        $sql = "SELECT imatricule, NOM, PRENOMS, INDICE FROM agent WHERE imatricule = $immatricule";
       
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAgent($immatricule) {
        $sql = "SELECT * FROM agent WHERE imatricule = ?";
        $query = $this->db->query($sql, array($immatricule));
        $result = $query->row();
        return $result;
    }

 
    public function checkComptable($immatricule){
        $sql = "SELECT * FROM user WHERE imUser = $immatricule";
       
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function byComptableValidation($imComptable){
        $sql = "SELECT validation.*, agent.NOM, agent.PRENOMS, user.prenom, user.fonction FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser AND validation.comptable = '$imComptable'   ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }


}
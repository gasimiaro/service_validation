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


}
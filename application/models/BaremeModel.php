<?php 
class BaremeModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //----Verification de(s) bareme(s)------------
    public function getBareme($categorie, $indice, $date){
        $sql = "SELECT 
            CASE
            WHEN ? = 1 THEN bareme.cat_1
            WHEN ? = 2 THEN bareme.cat_2
            WHEN ? = 3 THEN bareme.cat_3
            WHEN ? = 4 THEN bareme.cat_4
            WHEN ? = 5 THEN bareme.cat_5
            WHEN ? = 6 THEN bareme.cat_6
            WHEN ? = 7 THEN bareme.cat_7
            WHEN ? = 8 THEN bareme.cat_8
            WHEN ? = 9 THEN bareme.cat_9
            WHEN ? = 10 THEN bareme.cat_10
            ELSE NULL
            END AS solde 
            FROM bareme 
            WHERE bareme.indice = ? AND bareme.annee <= YEAR(?)
            ORDER BY bareme.annee DESC 
            LIMIT 1 ";
    
        $query = $this->db->query($sql, array(
            $categorie, $categorie, $categorie, $categorie, $categorie,
            $categorie, $categorie, $categorie, $categorie, $categorie,
            $indice, $date
        ));
    
        $res = $query->row_array();
    
        if ($res && $res['solde'] !== NULL) {
            return $res['solde'];
        } else {
            return false; 
        }
    }
    
    


/********************************************* */

}
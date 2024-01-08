<?php 
class ValidationModel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();

        $this->load->model('TitularisationModel');
        $this->load->model('PriseServiceModel');
        $this->load->model('VeilleIntegreModel');
        $this->load->model('CnapsModel');
        $this->load->model('AgentModel');



    }


    public function searchValidationByIM($immatricule){
        $this->db->select('immatricule');
        $this->db->where('immatricule', $immatricule);
        $query = $this->db->get('validation');
        return $query->num_rows() > 0; // Renvoie vrai si le corps existe, faux sinon.
    }

    public function lastDirectory(){
        $lastValidation = $this->db->select('numDossier')
        ->from('validation')
        ->order_by('id', 'DESC')
        ->limit(1)
        ->get()
        ->row();

// Obtenir l'année actuelle
    $currentYear = date('Y');


    // Générer le nouveau numéro de dossier
    if ($lastValidation) {
        // Découper le numéro de dossier pour obtenir l'année
        $lastYear = substr($lastValidation->numDossier, 0, 4);

        if ($lastYear == $currentYear) {
            // Même année, incrémenter le nombre existant
            $lastNumber = intval(substr($lastValidation->numDossier, -3));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // Nouvelle année, commencer à partir de 001
            $newNumber = '001';
        }
    } else {
        // Aucun enregistrement existant, commencer à partir de 001
        $newNumber = '001';
    }

    // Générer le nouveau numéro de dossier complet
    $newNumDossier = $currentYear . '/' . $newNumber;
    return $newNumDossier;
    }
    
    public function addValidation($immatricule, $cas, $typeBudget, $dateArrive, $comptable){
        $data = array(
            'immatricule' => $immatricule,
            'cas' => $cas,
            'typeBudget' => $typeBudget,
            'dateArrive' => $dateArrive,
            'comptable' => $comptable,
            'numDossier' => $this->lastDirectory()
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
        $sql = "SELECT validation.numDossier, validation.id,validation.immatricule, agent.NOM, agent.PRENOMS, 
                validation.DuDateValidation, validation.AuDateValidation, 
                validation.Cas, validation.typeBudget, validation.dateArrive, 
                validation.comptable, user.prenom FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser AND validation.DuDateValidation != '' AND validation.AuDateValidation != '' ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function pendingValidation(){
        $sql = "SELECT validation.id,validation.numDossier,validation.immatricule, agent.NOM, agent.PRENOMS, 
                validation.DuDateValidation, validation.AuDateValidation, 
                validation.Cas, validation.typeBudget, validation.dateArrive, 
                validation.comptable, user.prenom FROM validation, agent, user 
                WHERE validation.immatricule = agent.imatricule 
                AND validation.comptable = user.imUser AND validation.DuDateValidation = '' AND validation.AuDateValidation = '' ORDER BY validation.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function validationStatePendingPerMonth($annee) {
        $result = array_fill(1, 12, 0); // Initialiser le tableau avec des zéros pour chaque mois

        $this->db->select('MONTH(dateArrive) as mois, COUNT(*) as nombre_attente');
        $this->db->from('validation');
        $this->db->where('YEAR(dateArrive)', $annee);
        $this->db->where('DuDateValidation', '');
        $this->db->where('AuDateValidation', '');
        $this->db->group_by('mois');

        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $result[$row->mois] = $row->nombre_attente;
        }
        $result = array_values($result);

        return $result;
    }

    // public function validationStateCompletePerMonth($annee) {
    //     $result = array_fill(1, 12, 0); // Initialiser le tableau avec des zéros pour chaque mois

    //     $this->db->select('MONTH(dateArrive) as mois, COUNT(*) as nombre_complete');
    //     $this->db->from('validation');
    //     $this->db->where('YEAR(dateArrive)', $annee);
    //     $this->db->where('DuDateValidation !=', '');
    //     $this->db->where('AuDateValidation !=', '');
    //     $this->db->group_by('mois');

    //     $query = $this->db->get();

    //     foreach ($query->result() as $row) {
    //         $result[$row->mois] = $row->nombre_complete;
    //     }
    //     $result = array_values($result);

    //     return $result;
    // }

    public function validationStateCompletePerMonth($annee) {
        $listTreat = $this->AllValidationFullTreat('');
                $allTreatValidation = $listTreat['list'];


        $result = array_fill(1, 12, 0);
    
        foreach ($allTreatValidation as $item) {
            $year = date('Y', strtotime($item['dateArrive'])); // Extract year from the date
            $month = date('n', strtotime($item['dateArrive'])); // Extract month from the date
    
            // if ($month >= 1 && $month <= 12 && $item['DuDateValidation'] != '' && $item['AuDateValidation'] != '') {
                if ($year == $annee && $month >= 1 && $month <= 12 ) {

                $result[$month]++;
            }
        }
    
        return array_values($result);
    }
    
    public function validationStateIncompletePerMonth($annee) {
        $listIncomplete = $this->AllValidationIncompleteTreat('');
                $allIncompleteValidation = $listIncomplete['list'];


        $result = array_fill(1, 12, 0);
    
        foreach ($allIncompleteValidation as $item) {
            $year = date('Y', strtotime($item['dateArrive'])); // Extract year from the date
            $month = date('n', strtotime($item['dateArrive'])); // Extract month from the date
    
            // if ($month >= 1 && $month <= 12 && $item['DuDateValidation'] != '' && $item['AuDateValidation'] != '') {
                if ($year == $annee && $month >= 1 && $month <= 12) {

                $result[$month]++;
            }
        }
    
        return array_values($result);
    }

    


    public function countValidationsByYear() {
        $startYear = 2022; // Année de départ
        $currentYear = date('Y');
        
        $this->db->select('YEAR(dateArrive) as year, COUNT(*) as count');
        $this->db->from('validation');
        $this->db->where('YEAR(dateArrive) >=', $startYear);
        $this->db->group_by('YEAR(dateArrive)');
        $query = $this->db->get();
        
        $result = array();
        for ($i = $startYear; $i <= $currentYear; $i++) {
            $result[$i] = 0;
        }
        
        foreach ($query->result() as $row) {
            $result[$row->year] = (int)$row->count;
        }
        $result = array_values($result);

        return $result;
    }

    public function countValidationsByTypeBudget($typeBudget) {
        $startYear = 2022; // Année de départ
        $currentYear = date('Y');
        
        $this->db->select('YEAR(dateArrive) as year, COUNT(*) as count');
        $this->db->from('validation');
        $this->db->where('YEAR(dateArrive) >=', $startYear);
        $this->db->where('typeBudget =', $typeBudget);
        $this->db->group_by('YEAR(dateArrive)');
        $query = $this->db->get();
        
        $result = array();
        for ($i = $startYear; $i <= $currentYear; $i++) {
            $result[$i] = 0;
        }
        
        foreach ($query->result() as $row) {
            $result[$row->year] = (int)$row->count;
        }
        $result = array_values($result);

        return $result;
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
    

/* check if validation treatement well */

public function checkTreatValidation($comptable){

    $this->db->from('validation'); 
    $this->db->where("Poste != '' AND Direction != '' AND DuDateValidation != '' AND AuDateValidation != ''");
    if($comptable != ''){
        $this->db->where('comptable', $comptable);
    }
    
    return $this->db->get()->result();
}

public function reCheckTreatValidation($imAgent){

    $this->db->from('validation'); 
    $this->db->where("Poste != '' AND Direction != '' AND DuDateValidation != '' AND AuDateValidation != ''");
    $this->db->where("immatricule =".$imAgent);
    $result = $this->db->get()->row_array();

    return $result ? 'Complete' : 'Empty';

}

public function checkIncompleteValidation($comptable){

    $this->db->from('validation'); 
    $this->db->where("DuDateValidation != '' AND AuDateValidation != ''");
    if($comptable != ''){
        $this->db->where('comptable', $comptable);
    }
    
    return $this->db->get()->result();
}
/********************************************* */


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

public function editValidation($idValidation, $comptable) {
    $data = array(

        'comptable' => $comptable
    );
    $this->db->where('id', $idValidation);
    $this->db->update('validation', $data);

    return true; // Return true after successful update
}
public function deleteValidation($id) {
    $this->db->where('id', $id);
    return $this->db->delete('validation');
}

public function allValidationByComptable($imComptable){
    $sql = "SELECT validation.*, agent.NOM, agent.PRENOMS, user.prenom FROM validation, agent, user 
            WHERE validation.immatricule = agent.imatricule 
            AND validation.comptable = user.imUser AND validation.comptable = '$imComptable' ORDER BY validation.id DESC";
    $query = $this->db->query($sql);
    return $query->result();
}
public function completeValidationByComptable($imComptable){
    $sql = "SELECT validation.*, titularisation.*, priseservice.*, veilleintegre.*,
            cnaps.*, agent.NOM, agent.PRENOMS, user.prenom FROM validation, 
            titularisation, priseservice, veilleintegre, cnaps, agent, user 
            WHERE validation.immatricule = titularisation.immatricule AND 
            validation.immatricule = priseservice.immatricule AND 
            validation.immatricule = veilleintegre.immatricule AND 
            validation.immatricule = agent.imatricule AND 
            validation.comptable = user.imUser AND 
            validation.comptable = '$imComptable' GROUP BY validation.immatricule 
            ORDER BY validation.id DESC";
    $query = $this->db->query($sql);
    return $query->result();
}

/*** get the list of full reat validation */

public function AllValidationFullTreat($comptable) {
    $allTreatValidation = $this->checkTreatValidation($comptable);
    $fullTreat = array();
    if($allTreatValidation){
        foreach( $allTreatValidation as $item){

            $titularisationModel = new TitularisationModel();
            $titularisationCheck = $titularisationModel->checkTreatTitularisation($item->immatricule);
            if($titularisationCheck == 'Complete'){

                if (strpos($item->Cas, 'EFA') !== false) {
                    $veilleIntegre = new VeilleintegreModel();
                    $veilleIntegreCheck = $veilleIntegre->checkTreatVeilleIntegre($item->immatricule);

                    if($veilleIntegreCheck == 'Complete'){
                        $priseService = new PriseServiceModel();
                        $priseServiceCheck = $priseService->checkTreatPriseService($item->immatricule);
                        if($priseServiceCheck == 'Complete'){
                            $item->state = 'treated';

                            $fullTreat[] = (array)$item;
                        }
                    }
                }
                if (strpos($item->Cas, 'ECD') !== false  || strpos($item->Cas, 'ServicePrive') !== false  ) {
            //    if($item->Cas == 'ECD' | $item->Cas == 'ServicePrive'  ){
                $cnaps = new CnapsModel();
                $cnapsCheck = $cnaps->checkTreatCnaps($item->immatricule);
                if($cnapsCheck == 'Complete'){
                    // $fullTreat += $item ;
                    $item->state = 'treated';
                    $fullTreat[] = (array)$item;

                }
               }

            }

        }
        return ['list' => $fullTreat, 'count' => count($fullTreat)];

    }
    return false;

}

public function AllValidationIncompleteTreat($comptable) {
    $allIncompleteValidation = $this->checkIncompleteValidation($comptable);
    $incompleteTreat = array();
    if($allIncompleteValidation){
        foreach( $allIncompleteValidation as $item){

            $validationReCheck = $this->reCheckTreatValidation($item->immatricule);
            if($validationReCheck == 'Complete'){
                $titularisationModel = new TitularisationModel();
                $titularisationCheck = $titularisationModel->checkTreatTitularisation($item->immatricule);
                if($titularisationCheck == 'Complete'){
    
                    if (strpos($item->Cas, 'EFA') !== false) {
                        $veilleIntegre = new VeilleintegreModel();
                        $veilleIntegreCheck = $veilleIntegre->checkTreatVeilleIntegre($item->immatricule);
    
                        if($veilleIntegreCheck == 'Complete'){
                            $priseService = new PriseServiceModel();
                            $priseServiceCheck = $priseService->checkTreatPriseService($item->immatricule);
                            if($priseServiceCheck == 'Empty'){
                                $item->state = 'incomplete';
    
                                $incompleteTreat[] = (array)$item;
                            }
                        }
                        else{
                            $item->state = 'incomplete';
                            $incompleteTreat[] = (array)$item;
                        }
                    }
                    if (strpos($item->Cas, 'ECD') !== false  || strpos($item->Cas, 'ServicePrive') !== false  ) {
                    $cnaps = new CnapsModel();
                    $cnapsCheck = $cnaps->checkTreatCnaps($item->immatricule);
                    if($cnapsCheck == 'Empty'){
                        // $fullTreat += $item ;
                        $item->state = 'incomplete';
                        $incompleteTreat[] = (array)$item;
    
                    }
                   }
    
                }
                else{
                    $item->state = 'incomplete';
                    $incompleteTreat[] = (array)$item;
                }
    
            }
            else{
                $item->state = 'incomplete';
                $incompleteTreat[] = (array)$item;
            }


        }
        return ['list' => $incompleteTreat, 'count' => count($incompleteTreat)];

    }
    return false;

}
/***************************************** */

public function completeValidationByComptab($imComptable) {
    // Appel de la fonction getListFullValidation
    $result = $this->getListFullValidation($imComptable);
    foreach ($result as $item) {
        $immatricule = $item->immatricule;
        $Poste = $item->Poste;
        $Direction = $item->Direction;
        $duDateValidation = $item->DuDateValidation;
        $auDateValidation = $item->AuDateValidation;
        $duDateRetard = $item->DuDateRetard;
        $auDateRetard = $item->AuDateRetard;
        $Cas = $item->Cas;
        $typeBudget = $item->typeBudget;
        $dateArrive = $item->dateArrive;

        $titularisationModel = new TitularisationModel();

        // Appeler la fonction getListTitularisation de la classe titularisationmodel
        $titularisationData = $titularisationModel->getListTitularisation($immatricule);

        //Titutarisation
        // $titularisationData = $this->getListTitularisation($immatricule);
        
        //$item->$IntegreTitul = isset($titularisationData[0]->integre) ? $titularisationData[0]->integre : '';
        
        $item->integration = isset($titularisationData[0]->integre) ? $titularisationData[0]->integre : '';
        $item->dateTitularisation = isset($titularisationData[0]->Date) ? $titularisationData[0]->Date : '';
        $item->corpsTitularisation = isset($titularisationData[0]->Corps) ? $titularisationData[0]->Corps : '';
        $item->gradeTitularisation = isset($titularisationData[0]->Grade) ? $titularisationData[0]->Grade : '';
        $item->indiceTitularisation = isset($titularisationData[0]->Indice) ? $titularisationData[0]->Indice : '';
        $item->categorieTitularisation = isset($titularisationData[0]->Categorie) ? $titularisationData[0]->Categorie : '';

        $Integration = $item->integration;
        $dateTitularisation = $item->dateTitularisation;
        $corpsTitularisation = $item->corpsTitularisation;
        $gradeTitularisation = $item->gradeTitularisation;
        $indiceTitularisation = $item->indiceTitularisation;
        $categorieTitularisation = $item->categorieTitularisation;

        //Prise de Service

        $priseservice = new PriseServiceModel();
        $priseServiceData = $priseservice->getListPriseService($immatricule);


        // $priseServiceData = $this->getListPriseService($immatricule);
        $item->datePriseService = isset($priseServiceData[0]->Date) ? $priseServiceData[0]->Date : '';
        $item->corpsPriseService = isset($priseServiceData[0]->Corps) ? $priseServiceData[0]->Corps : '';
        $item->gradePriseService = isset($priseServiceData[0]->Grade) ? $priseServiceData[0]->Grade : '';
        $item->indicePriseService = isset($priseServiceData[0]->Indice) ? $priseServiceData[0]->Indice : '';
        $item->categoriePriseService = isset($priseServiceData[0]->Categorie) ? $priseServiceData[0]->Categorie : '';

        
        $datePriseService = $item->datePriseService;
        $corpsPriseService = $item->corpsPriseService;
        $gradePriseService = $item->gradePriseService;
        $indicePriseService = $item->indicePriseService;
        $categoriePriseService = $item->categoriePriseService;

        //Veille d'integration
        $veilleIntegre = new VeilleintegreModel();
        $veilleIntegrationData = $veilleIntegre->getListVeilleIntegre($immatricule);

        // $veilleIntegrationData = $this->getListVeilleIntegre($immatricule);
        $item->dateVeilleIntegration = isset($veilleIntegrationData[0]->Date) ? $veilleIntegrationData[0]->Date : '';
        $item->corpsVeilleIntegration = isset($veilleIntegrationData[0]->Corps) ? $veilleIntegrationData[0]->Corps : '';
        $item->gradeVeilleIntegration = isset($veilleIntegrationData[0]->Grade) ? $veilleIntegrationData[0]->Grade : '';
        $item->indiceVeilleIntegration = isset($veilleIntegrationData[0]->Indice) ? $veilleIntegrationData[0]->Indice : '';
        $item->categorieVeilleIntegration = isset($veilleIntegrationData[0]->Categorie) ? $veilleIntegrationData[0]->Categorie : '';


        $dateVeilleIntegration = $item->dateVeilleIntegration;
        $corpsVeilleIntegration = $item->corpsVeilleIntegration;
        $gradeVeilleIntegration = $item->gradeVeilleIntegration;
        $indiceVeilleIntegration = $item->indiceVeilleIntegration;
        $categorieVeilleIntegration = $item->categorieVeilleIntegration;

        //CNaPS
        $cnaps = new CnapsModel();
        $CNaPSData = $cnaps->getListCNaPS($immatricule);

        // $CNaPSData = $this->getListCNaPS($immatricule);
        $item->duDateCNaPS = isset($CNaPSData[0]->DuDateCNaPS) ? $CNaPSData[0]->DuDateCNaPS : '';
        $item->auDateCNaPS = isset($CNaPSData[0]->AuDateCNaPS) ? $CNaPSData[0]->AuDateCNaPS : '';
        $item->Montant = isset($CNaPSData[0]->Montant) ? $CNaPSData[0]->Montant : '';



        //Agent
        $agent = new AgentModel();
        $agentData = $agent->getAgent($immatricule);

        // $agentData = $this->getAgent($immatricule);
        $item->NOM = $agentData->NOM ?? '';
        $item->PRENOM = $agentData->PRENOMS ?? '';
        $nom= $item->NOM;
        $prenom= $item->PRENOM;

    } 
    return $result;
}

public function pendingValidationByComptable($imComptable){
    $sql = "SELECT validation.immatricule, agent.NOM, agent.PRENOMS, 
            validation.DuDateValidation, validation.AuDateValidation, 
            validation.Cas, validation.typeBudget, validation.dateArrive, 
            validation.comptable, user.prenom FROM validation, agent, user 
            WHERE validation.immatricule = agent.imatricule 
            AND validation.comptable = user.imUser AND validation.DuDateValidation = '' AND validation.AuDateValidation = '' AND validation.comptable = '$imComptable' ORDER BY validation.id DESC";
    $query = $this->db->query($sql);
    return $query->result();
}

public function getListFullValidation($imComptable) {
    $sql = "SELECT * FROM validation WHERE validation.DuDateValidation != '' AND validation.AuDateValidation != '' AND  comptable = ? ORDER BY id DESC";
    $query = $this->db->query($sql, array($imComptable));
    
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); 
    }
}

public function numberPerCasExist(){
    $sql = "SELECT Cas, COUNT(*) as number FROM `validation` GROUP BY Cas ORDER BY number DESC;";
    $query = $this->db->query($sql);
    $result = $query->result();
    $data = array();
    foreach ($result as $row) {
        $data[] = array(
            'Cas' => $row->Cas,
            'nombre' => $row->number
        );
    }
    return $data;
}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPageController extends CI_Controller {

	function __construct(){
        parent::__construct();
        // $this->load->helper('url');  // Load the URL Helper
        $this->load->helper(array('form', 'url'));

        $this->load->model('validationmodel');
        $this->load->model('comptablemodel');

        $this->load->library('upload');
        // $this->load->model('adminpagemodel');
        $this->load->library('session');
    }

    public function UserPageHome(){
        $user = $this->session->userdata('user');
        $immatricule = $user['imUser'];

        $data['number'] = $this->validationmodel->Notification($immatricule);
        $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
        $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
        $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
        $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
        $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
        $data['listValidation'] = $this->validationmodel->allValidationByComptable($immatricule);
        $data['validationData'] = $this->validationmodel->completeValidationByComptab($immatricule);
        $data['pendingValidation'] = $this->validationmodel->pendingValidationByComptable($immatricule);
      
        if($user && isset($user['fonction'])){ 
            if($user['fonction'] == 'Comptable'){
                $this->load->view('Header',$data);
                $this->load->view('userHome',$data);
                $this->load->view('Footer');
            } elseif ($user['fonction'] == 'Chef de Bureau') {
                redirect('/login');
            }
        } else {
            redirect('/login');
        }
      }

      public function addComptable(){
        $immatricule = $this->input->post('immatricule');
        $pseudo = $this->input->post('pseudo');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $fonction = $this->input->post('fonction');
        $passWord = $this->input->post('passWord');
    
        $check = $this->comptablemodel->checkComptableAgent($immatricule);
        if ($check) {
          $inserted = $this->comptablemodel->addComptable($immatricule, $pseudo, $nom, $prenom, $fonction, $passWord);
    
            if ($inserted) {
                // $this->session->set_flashdata('success', 'Insertion avec succes, ');
                // redirect('gererUserPage');
                $response['success'] = true;
                $response['message'] = "Insertion avec succès";
                if ($fonction == 'Chef De Service') {
                    $poste = "Chef de Service";
                    $alias = "Chef";
                }
                else if ($fonction == 'Chef de Bureau') {
                    $poste = "Chef de Bureau";
                    $alias = "Chef";
                } else if ($fonction == 'Comptable') {
                    $poste = 'Comptable';
                    $alias = "";
                }
                $response['user'] = [
                    'imUser' => $immatricule,
                    'alias' => $alias,
                    'poste' =>$poste,
                    'prenom' => $prenom
                ];

            } else {
            //   $this->session->set_flashdata('error', 'Il y a probleme, ');
            //   redirect('gererUserPage');
              $response['success'] = false;
              $response['message'] = "Il y a un erreur lors de l'insertion";
            }
        } else {
        //   $this->session->set_flashdata('error', 'L\'immatricule pas encore disponible<br> dans notre base de donnee, ');
        //   redirect('gererUserPage');
          $response['success'] = false;
          $response['message'] = "L\'immatricule pas encore disponible<br> dans notre base de donnee";
        }

        echo json_encode($response);
    
      }

      public function updateUserDetails() {
        $immatricule = $this->input->post('immatricule');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $fonction = $this->input->post('fonction');
        // $statut = $this->input->post('statut');
    
        // Ajoutez votre logique pour mettre à jour les informations dans la base de données
        $updated = $this->comptablemodel->updatedComptable($immatricule, $nom, $prenom, $fonction);
        if ($updated) {
        //   $this->session->set_flashdata('success', 'Insertion avec succes, ');
        //   redirect('gererUserPage');
        $response['success'] = true;
        $response['message'] = "Modification avec succès";
        $response['data'] = [     'imUser' => $immatricule,
        'fonction' =>$fonction,
        'prenom' => $prenom];

      } else {
        $response['success'] = false;
        $response['message'] = "Il y a un erreur lors de la modification";
        
      }
      echo json_encode($response);

    }

    public function Profile(){
      $user = $this->session->userdata('user');
      
      if($user && isset($user['fonction'])){ 
        if($user['fonction'] == 'Chef de Bureau'){
          $this->load->view('adminHeader');
          $this->load->view('profile');
          $this->load->view('Footer');
          
        } elseif ($user['fonction'] == 'Comptable') {
          $immatricule = $user['imUser'];
          $data['number'] = $this->validationmodel->Notification($immatricule);
          $data['newValidation'] = $this->validationmodel->NewValidation($immatricule);
          $data['count'] = $this->validationmodel->TotalNbValidationByComp($immatricule);
          $data['countYear'] = $this->validationmodel->YearNbValidationByCom($immatricule);
          $data['countTraite'] = $this->validationmodel->NbTraiteValidationByCom($immatricule);
          $data['countWait'] = $this->validationmodel->NbWaitValidationByCom($immatricule);
          $data['countTraiteYear'] = $this->validationmodel->NbTraiteValYearByCom($immatricule);
          $data['countWaitYear'] = $this->validationmodel->NbWaitValYearByCom($immatricule);
          $data['listValidation'] = $this->validationmodel->allValidationByComptable($immatricule);
          $data['completeValidation'] = $this->validationmodel->completeValidationByComptable($immatricule);
          $data['pendingValidation'] = $this->validationmodel->pendingValidationByComptable($immatricule);
          $this->load->view('Header', $data);
          $this->load->view('profile', $data);
          $this->load->view('Footer');
        }
    } else {
        redirect('/');
    }
    }


   
    // public function do_upload()
    // {
    //   $config['upload_path'] = './assets/template/images/user/';
    //   $config['allowed_types'] = 'gif|jpg|png';
    //   $config['max_size'] = 8184; // in kilobytes

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('userfile'))
    //     {
    //         $error = array('error' => $this->upload->display_errors());
    //         // $this->load->view('upload_form', $error);
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         $this->load->view('upload_success', $data);
    //     }
    // }
    
    public function upload_image() {
      $immatricule = $this->input->post('immatricule');
      $config['upload_path']   = './assets/template/images/user/';  // Répertoire où vous souhaitez enregistrer les images
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']      = 2048;  // Taille maximale en kilo-octets (2MB dans cet exemple)

      $this->upload->initialize($config) ;

      if (!$this->upload->do_upload('userImageFile')) {
        // if (isset($_FILES['userImageFile']) && !empty($_FILES['userImageFile']['name'])) {


          $error = array('error' => $this->upload->display_errors());
          echo json_encode($error);
         
        
      } else {

        $data = $this->upload->data();

        // Get the original file extension
        $file_ext = pathinfo($_FILES["userImageFile"]["name"], PATHINFO_EXTENSION);

        // Construct the new file name with immatricule and original extension
        $new_file_name = $immatricule . '.' . $file_ext;

        // Rename the uploaded file
        rename($config['upload_path'] . $data["file_name"], $config['upload_path'] . $new_file_name);
       $data['update'] = $this->comptablemodel->updatedComptablePhoto($immatricule,$new_file_name);
       
        if ( $data['update']){
          $response['success'] = true;
          $response['new_file_name'] = $new_file_name;

        }
        echo json_encode($response);


      }
  }


//   function ajax_upload()  
//   {  
//     $immatricule = $this->input->post('immatricule');

//        if(isset($_FILES["image_file"]["name"]))  
//        {  
//          $config['upload_path']   = './assets/template/images/user/';  
//          $config['allowed_types'] = 'jpg|jpeg|png|gif';  
//             $this->load->library('upload');

//             // $this->load->library('upload', $config);  
//             $this->upload->initialize($config) ;

//             if(!$this->upload->do_upload('image_file'))  
//             {  
//                  echo $this->upload->display_errors();  
//             }  
//             else  
//             {  
//                  $data = $this->upload->data();  

//                 // Get the original file extension
//                 $file_ext = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);

//                 // Construct the new file name with immatricule and original extension
//                 $new_file_name = $immatricule . '.' . $file_ext;

//                 // Rename the uploaded file
//                 rename($config['upload_path'] . $data["file_name"], $config['upload_path'] . $new_file_name);
//                 $data['update'] = $this->comptablemodel->updatedComptablePhoto($immatricule,$new_file_name);


//                  echo '<img src="'.base_url().'assets/template/images/user/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
//             }  
//        }  
//   }  

public function editpassword(){
      $immatricule = $this->input->post('immatricule_c');
      $oldPass = $this->input->post('oldPass');
      $newPass = $this->input->post('newPass');

      $oldPass_db = $this->comptablemodel->getOldPass($immatricule);

      if($oldPass == $oldPass_db){
          if($oldPass == $newPass){
            $response['success'] = false;
            $response['message'] = 'C\'est votre ancien mot de passe!!!';
          }
          else{
            $change = $this->comptablemodel->updatePassword($immatricule, $newPass);
            if($change){
              $response['success'] = true;
              $response['message'] = 'Mot de passe modifié!!!';
            }
            else{
              $response['success'] = false;
              $response['message'] = 'Un erreur lors de la modification!!!';
            }
          }
      }
      else{
          $response['success'] = false;
          $response['message'] = 'Mot de passe Incorrect!!!';
          $response['oldPass'] = $oldPass;
          $response['oldPass_db'] = $oldPass_db;

      }

    echo json_encode($response);

}

}
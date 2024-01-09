<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/login');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Service de la Validation Precaire</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/template/images/drp.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/typography2.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/main.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/responsives.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toaste.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/casButton.css">
    
    
    <script src="<?php echo base_url()?>assets/template/js/jquery.min.js"></script>

 
   
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/datatable/responsive.dataTables.css">
<style>
   

    .modal-confirm {
        color: #636363;
        width: 400px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -10px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }

    .modal-confirm .modal-body {
        color: #999;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
        padding: 10px 15px 25px;
    }

    .modal-confirm .modal-footer a {
        color: #999;
    }

    .modal-confirm .icon-box {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        z-index: 9;
        text-align: center;
        border: 3px solid #f15e5e;
    }

    .modal-confirm .icon-box i {
        color: #f15e5e;
        font-size: 46px;
        display: inline-block;
        margin-top: 13px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
    }

    .modal-confirm .btn-secondary {
        background: #c1c1c1;
    }

    .modal-confirm .btn-secondary:hover,
    .modal-confirm .btn-secondary:focus {
        background: #a8a8a8;
    }

    .modal-confirm .btn-danger {
        background: #f15e5e;
    }

    .modal-confirm .btn-danger:hover,
    .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
<script>
$(document).ready(function() {
  
  $('#All').DataTable( {
      responsive: true,
      scrollX:false,
      language: {
        url: '<?php echo base_url()?>assets/datatable/fr-FR.json',
      }
  } );
  $('#Complete').DataTable( {
      responsive: true,
      scrollX:false,
      language: {
        url: '<?php echo base_url()?>assets/datatable/fr-FR.json',
      }
  } );
  $('#Pending').DataTable( {
      responsive: true,
      scrollX:false,
      language: {
        url: '<?php echo base_url()?>assets/datatable/fr-FR.json',
      }
  } );
  
  $("#allButton").click(function(){
    $("#allList").css("display", "block");
    $("#completeList").css("display", "none");
    $("#incompleteList").css("display", "none");
    $("#pendingList").css("display", "none");
  });
  $("#completeButton").click(function(){
    $("#allList").css("display", "none");
    $("#completeList").css("display", "block");
    $("#incompleteList").css("display", "none");
    $("#pendingList").css("display", "none");
    $("#imComplete").css("width", "2%");

  });
  $("#incompleteButton").click(function(){
    $("#allList").css("display", "none");
    $("#completeList").css("display", "none");
    $("#incompleteList").css("display", "block");
    $("#pendingList").css("display", "none");
    $("#imComplete").css("width", "2%");

  });
  $("#pendingButton").click(function(){
    $("#allList").css("display", "none");
    $("#completeList").css("display", "none");
    $("#incompleteList").css("display", "none");
    $("#pendingList").css("display", "block");
    $("#imPendig").css("width", "2%");
  });
} );

function listeClick(){
  const All = document.getElementById('All');
  const Complete = document.getElementById('Complete');
  const Pending = document.getElementById('Pending');
  All.style.display = "block";
  Complete.style.display = "none";
  Pending.style.display = "none";
  
}
</script>

<script src="<?php echo base_url()?>assets/template/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable/dataTables.responsive.js"></script>
<script src="<?php echo base_url()?>assets/template/js/dataTables.bootstrap4.min.js"></script>

  </head>
  <body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
                          <div id="modal-disconnect" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                          
                                          <p?>Etes-vous sûre de vouloir vous déconnecter? </p>
                                        
                                      </div>
                                      <div class="modal-footer justify-content-center">
                                      
                                      <form action="<?php echo base_url(); ?>logincontroller/logout" method="post">

                                        <form id="edit-comptable-form" >
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Se déconnecter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
          <div class="iq-sidebar-logo d-flex justify-content-between">
              <a href="index.html" class="header-logo">
                <img src="<?php echo base_url()?>assets/template/images/chart-1.jpg" class="img-fluid" alt="Logo">
                <div class="logo-title">
                    <span class="text-primary text-uppercase"></span> 
                </div>
              </a>
              <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                      <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                </div>
              </div>
          </div>
          <div id="sidebar-scrollbar">
              <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    
                    <!-- <li class="active">
                      <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Acceuil</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="admin" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                          <li class="active"><a href="<?php echo base_url(); ?>index.php/adminpagecontroller/AdminPageHome"><i class="las la-house-damage"></i>Tableau de bord</a></li>
                          <li><a href="<?php echo base_url(); ?>adminpagecontroller/listRequestAdmin"><i class="fa fa-download"></i>Liste des demandes</a></li>
                         
                      </ul>
                    </li> -->
                    <li id="adminHome" >
                      <a href="<?php echo base_url(); ?>adminpagecontroller/AdminPageHome" class="iq-waves-effect"><i class="las la-home iq-arrow-left"></i><span>Acceuil</span></a>
                    </li>
                    <li>
                      <a href="#demande" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="lab la-elementor iq-arrow-left"></i><span>Demande</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="demande" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          <li id="adminAllList"><a href="<?php echo base_url(); ?>adminpagecontroller/listRequestAdmin"><i class="ri-inbox-fill"></i>Demande reçue</a></li>
                          <li id="adminPendingList"><a href="<?php echo base_url(); ?>adminpagecontroller/listPendingAdmin"><i class="ion-alert"></i>Demande En attente</a></li>
                          <li id="AdminHome"><a href="<?php echo base_url(); ?>adminpagecontroller/listIncompleteAdmin"><i class="">?</i>Avoir d'anomalie</a></li>
                          <li id="adminCompleteList"><a href="<?php echo base_url(); ?>adminpagecontroller/listCompleteAdmin"><i class="fa fa-check-circle"></i>Demande Traité</a></li>
                         
                      </ul>
                    </li>
                   
                    <li id="gererUser">
                      <a href="<?php echo base_url(); ?>adminpagecontroller/gererUser" class="iq-waves-effect"><i class="las la-user-tie iq-arrow-left"></i><span>Utilisateur</span></a>
                      
                    </li>
                    <li id="myProfile"><a href="<?php echo base_url(); ?>userpagecontroller/Profile"><i class="las la-id-card-alt"></i>Mon Profile</a></li>
                    <li >
                      <!-- <a href="<?php echo base_url(); ?>" class="iq-waves-effect"><i class="ri-login-box-line iq-arrow-left"></i><span>Se Déconnecter</span></a> -->
                      <a  href="#modal-disconnect"  data-toggle="modal" data-placement="top" title="" data-original-title="Disconnect" class="iq-waves-effect"><i class="ri-login-box-line iq-arrow-left"></i><span>Se Déconnecter</span></a>
                    </li>
                    
                </ul>
              </nav>
          </div>
        </div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-menu-bt d-flex align-items-center">
                    <div class="wrapper-menu">
                      <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                    <div class="iq-navbar-logo d-flex justify-content-between">
                      <a href="index.html" class="header-logo">
                          <img src="<?php echo base_url()?>assets/template/images/chart-1.jpg" class="img-fluid rounded-normal" alt="">
                          <div class="pt-2 pl-2 logo-title">
                            <span class="text-primary text-uppercase">La Validation des Services</span>
                          </div>
                      </a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="list-unstyled iq-menu-top d-flex justify-content-between mb-0 p-0">
                      
                        <li>
                            <a href="albums.html">
                                <div class="pt-2 pl-2 logo-title">
                                    <span class="h4 text-primary text-uppercase typed-text"></span><span class="bg-primary cursor" style="display: inline-block; margin-left: 0.1rem; width: 3px; animation: blink 2s infinite;">&nbsp;</span>
                                
                            </div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto navbar-list">
                      <li class="nav-item nav-icon">
                          <div class="iq-search-bar">
                            <form action="#" class="searchbox needs-validation">
                                <div class="">
                                  <input type="text" maxlength="6" class="text search-input" placeholder="Immatricule ..." id="immatricule" name="immatricule" />
                                  <div class="valid-tooltip">
                                    .
                                </div>
                                </div>
                                <a class="search-link"  href="#"><i class="ri-search-line text-black"></i></a>
                                <a class="search-audio" href="#"><i class="las la-user text-black"></i></a>
                                <div id="immatriculeMessage"></div>
                            </form>
                          </div>
                      </li>
                     
                      <li class="nav-item nav-icon">
                          <a href="#" class="search-toggle iq-waves-effect text-black rounded">
                            <i class="ri-notification-line block"></i>
                            <?php if($number > 0){ ?>
                            <span class="notice-icon dots badge badge-primary"><?php echo $number; ?></span>
                            <?php } else{ ?>
                              <span class="notice-icon dots badge badge-info">0</span>
                            <?php } ?>
                          </a>
                          <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0">
                                  <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white">Tous Notifications<small class="badge  badge-light float-right pt-1"><?php echo isset($number) ? $number : 0; ?></small></h5>
                                  </div>
                                  <?php foreach ($newValidation as $newVal){ 
                                    $immatricule = $newVal->immatricule;
                                    $nom = $newVal->NOM;
                                    $prenom = $newVal->PRENOMS;
                                    $dateArrive = $newVal->dateArrive;
                                    
                                    $elemDate = explode("-", $dateArrive);
                                    $dateArrives = implode("-", array_reverse($elemDate));
                                    ?>
                                  <a href="#" class="iq-sub-card" id="Viewed">
                                    <div class="media align-items-center">
                                        <div class="">
                                            <div class="rounded-circle iq-bg-warning"><i class="ri-information-fill h2"></i></div>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Au titre de <?php echo $prenom; ?></h6>
                                            <small class="float-right">Du <?php echo $dateArrives; ?></small>
                                            <p class="mb-0"><?php echo $immatricule; ?></p>
                                            <input type="hidden" name="immatricule" id="immatricule" value="<?php echo $immatricule; ?>">
                                        </div>
                                    </div>
                                  </a>
                                  <script>
                                    $('#Viewed').on('click', function(){
                                        var view = 1;
                                        var immatricule = $('#immatricule').val();;


                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo site_url('adminpagecontroller/updateNotification') ?>",
                                                dataType: "JSON",
                                                data: {immatricule:immatricule, view:view},
                                                success: function(data){
                                                    

                                                }
                                            });

                                        

                                    });
                                  </script>
                                  <?php }?>
                                </div>
                            </div>
                          </div>
                      </li>
                     
                      <li class="line-height pt-3">
                          <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                          <?php $image = $user['photo']; 
                            if ($image != "") {
                              $imageUrl = base_url() . 'assets/template/images/user/' . $image;
                            } else {
                            $imageUrl = base_url() . 'assets/template/images/user/whatsapp-dp-for-boys.webp';
                            }
                          ?>
                            <img src="<?php echo $imageUrl; ?>" class="img-fluid rounded-circle" alt="user">
                          </a>
                          <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                  <div class="bg-primary p-3">
                                      <h5 class="mb-0 text-white line-height">Chef <?php echo $user['prenom']; ?></h5>
                                      <span class="text-white font-size-45">IM: <?php echo $user['imUser']; ?></span>
                                  </div>
                                  <a href="<?php echo base_url(); ?>userpagecontroller/Profile" class="iq-sub-card iq-bg-primary-hover">
                                      <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-file-user-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Mon Profile</h6>
                                            <p class="mb-0 font-size-12">Voir mes informatrion.</p>
                                        </div>
                                      </div>
                                  </a>
                                  <!-- <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                      <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-account-box-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Parametre de comptre</h6>
                                            <p class="mb-0 font-size-12">Mondier le parametre de mon compte.</p>
                                        </div>
                                      </div>
                                  </a> -->
                                  
                                  <div class="d-inline-block w-100 text-center p-3">
                                      <!-- <a class="bg-primary iq-sign-btn" href="<?php echo site_url('logincontroller/logout'); ?>" role="button">Deconnexion<i class="ri-login-box-line ml-2"></i></a> -->
                                      <a  href="#modal-disconnect"  data-toggle="modal" data-placement="top" title="" data-original-title="Disconnect" class="iq-waves-effect"><i class="ri-login-box-line iq-arrow-left"></i><span>Se Déconnecter</span></a>

                                  </div>
                                </div>
                            </div>
                          </div>  
                      </li>
                      <?php
          if ($this->session->flashdata('success')) {
              $checkColor = 'green';
              $progressColor = 'green';
          }elseif ($this->session->flashdata('warning')) {
              $checkColor = 'orange';
              $progressColor = 'orange';
          } elseif ($this->session->flashdata('error')) {
              $checkColor = 'red';
              $progressColor = 'red';
          }
          ?>


          <style>
          .toaste-content .check {
            background-color: <?php echo $checkColor; ?>;
          }

          .toaste .progress:before {
            background-color: <?php echo $progressColor; ?>;
          }
          </style>

          <?php
          if($this->session->flashdata('success')){
          ?>
          <div class="toaste active">
            <div class="toaste-content">
              <i class="fa fa-check check"></i>
              <div class="message">
                <span class="text text-1">SUCCESS</span>
                <span class="text text-2">
                  <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p></span>
              </div>
            </div>
            <i class="fa fa-times close"></i>
            <div class="progress active"></div>
          </div>
          <?php
          } elseif ($this->session->flashdata('error')){
          ?>
          <div class="toaste active">
            <div class="toaste-content">
              <i class="fa fa-times check"></i>
              <div class="message">
                <span class="text text-1">ERREUR</span>
                <span class="text text-2">
                  <p class="text-danger"><?php echo $this->session->flashdata('error'); ?></p></span>
              </div>
            </div>
            <i class="fa fa-times close"></i>
            <div class="progress active"></div>
          </div>
          <?php
          } elseif ($this->session->flashdata('warning')){
          ?>
          <div class="toaste active">
          <div class="toaste-content">
            <i class="fa fa-info check"></i>
            <div class="message">
              <span class="text text-1">Attention</span>
              <span class="text text-2">
                <p class="text-warning"><?php echo $this->session->flashdata('warning'); ?></p></span>
            </div>
          </div>
          <i class="fa fa-times close"></i>
          <div class="progress active"></div>
        </div>
        <?php
        }
        ?>
                    </ul>
                </div>
              </nav>
          </div>
        </div>
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
          <div class="container-fluid">
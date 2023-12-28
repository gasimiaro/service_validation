<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation des Services Precaire</title>
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/drp.png" type="image/x-icon" />
	
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toaste.css">


	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    
    <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css">

    

</head>
<body>

    <section class="bodyd">
        <div class="container" >
            <div class="login-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <img src="<?php echo base_url()?>assets/images/chart-1.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="header-title">
                  <span class="typed-text h3"></span><span class="cursor" style="display: inline-block; background-color: #ccc; margin-left: 0.1rem; width: 3px; animation: blink 2s infinite;">&nbsp;</span></h3>
						
        <?php
          if ($this->session->flashdata('success')) {
              $checkColor = 'green';
              $progressColor = 'green';
          } else {
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
              <i class="lni lni-checkmark check"></i>
              <div class="message">
                <span class="text text-1">SUCCESS</span>
                <span class="text text-2">
                  <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p></span>
              </div>
            </div>
            <i class="lni lni-close close"></i>
            <div class="progress active"></div>
          </div>
          <?php
          } elseif ($this->session->flashdata('error')){
          ?>
          <div class="toaste active">
            <div class="toaste-content">
              <i class="lni lni-close check"></i>
              <div class="message">
                <span class="text text-1">ERREUR</span>
                <span class="text text-2">
                  <p class="text-danger"><?php echo $this->session->flashdata('error'); ?></p></span>
              </div>
            </div>
            <i class="lni lni-close close"></i>
            <div class="progress active"></div>
          </div>
          <?php
          }
          ?>
                <!-- <form class="login-form" action="<?php echo base_url(); ?>logincontroller/login" method="post"> -->
                <form class="login-form" id="login-form">

                    <div class="input-group  input-group-lg">
                        <span class="input-group-text" style="height:48px; background-color:#ff6347; color:white"><i class="lni lni-user"></i></span>
                        <input type="text" class="form-control" name="imat" id="imatInput" placeholder="Immatricule" required>
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text " style="height:48px; background-color:#ff6347;  color:white"><i class="lni lni-key"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Mot de Passe" required>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                        <button class="btn btn-block" type="submit" style="background-color:#ff6347; color:white">S'authentifier <i class="lni lni-enter"></i></button>

                        </div>
                    </div>
                </form>
            </div>
                    <div class="col-sm-6 hide-on-mobile">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                            </ul>
                            <!-- The slideshow -->
                                
                            <div class="carousel-inner">
                                <?php foreach ($comptables as $index => $user) { 
                                    $immatriculeUser = $user->imUser;
                                    $nom = $user->nom;
                                    $prenom = $user->prenom;
                                    $image = $user->photo;
                                    $fonction = $user->fonction;
                                    if ($image != "") {
                                        $imageUrl = base_url() . 'assets/images/profile/' . $image;
                                    } else {
                                    $imageUrl = base_url() . 'assets/template/images/user/whatsapp-dp-for-boys.webp';
                                    }

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
                                    

                                    ?>
                                    <div class="carousel-item <?php if ($index === 0) echo 'active'; ?>" style="cursor : pointer" onclick="updateImmatricule('<?php echo $immatriculeUser; ?>')">
                                        <div class="slider-feature-card" >
                                            <img src="<?php echo $imageUrl; ?>" alt="Image de l'utilisateur" style="width:50%; height:120px " >
                                            <h4 class="slider-title"><?php echo $alias.' '.$prenom; ?></h4>
                                            <p class="slider-description"><?php echo $poste; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>






                    
                </div>
            </div>
        </div>
    </section>
	
	<script type='text/javascript' src='<?php echo base_url()?>assets/js/toaste.js'></script>
	<script src="<?php echo base_url()?>/assets/js/title.js"></script>
      <!-- sweet alert JavaScript -->
      <script src="<?php echo base_url()?>assets/template/js/sweetAlert.js"></script>

    <script>
    function updateImmatricule(immatricule) {
        // Update the input field with the clicked immatricule
        $('#imatInput').val(immatricule);
    }






    $(document).ready(function () {
        // Add an event listener for the form submission
        $('#login-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData = $(this).serialize();


            $.ajax({
                type: 'POST', // Use GET method
                url: '<?php echo base_url("logincontroller/login"); ?>' , // Append form data to the URL
                data: formData, // Use the data option for POST requests
                dataType: 'json',
                success: function (response) {
                    // Check the response
                    if (!response.success) {

                        swal(response.message, "Contacter l'administrateur!","warning");
                        setTimeout(function(){
                            swal.close();
                        }, 4000);
                        // Display a success message (you need to implement this part)
                        // alert(JSON.stringify(response));
                    } else {
                        // Display an error message (you need to implement this part)
                        swal("Vous etes connecter!!!", "","success");
                        setTimeout(function(){
                            swal.close();
                        }, 3000);
                        if(response.fonction == "Chef de Bureau"){
                            window.location.href = '<?php echo base_url("adminpage"); ?>';
                        }
                        else{
                            window.location.href = '<?php echo base_url("userpage"); ?>';
                        }
                    }
                },
                error: function () {
                    // Handle AJAX error (you need to implement this part)
                    alert('Error during AJAX request');
                }
            });
        });

    });


</script>

</body>
</html>

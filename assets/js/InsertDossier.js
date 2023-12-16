document.getElementById("EFA").addEventListener("click", function() {
    const spans = document.querySelectorAll(".btn-12 span");
  
    spans.forEach(function(span) {
      span.style.backgroundColor = "white";
      span.style.color = "white";
    });
  });
  
  
  $(document).ready(function() {
  
    
   
    $('#comptable').change(function() {
      if ($(this).val() !== '') {
        $('#subButton').prop('disabled', false);
      } else {
        $('#subButton').prop('disabled', true);
      }
    });
  });
  
    const BG = document.getElementById("BG");
      BG.addEventListener("click", function() {
      document.getElementById('verif_piece').style.display = 'none';
      document.getElementById('cas').value = "";
    });
    const BA = document.getElementById("BA");
    BA.addEventListener("click", function() {
      document.getElementById('verif_piece').style.display = 'none';
      document.getElementById('cas').value = "";
    });
    const BABG = document.getElementById("BABG");
    BABG.addEventListener("click", function() {
      document.getElementById('verif_piece').style.display = 'none';
      document.getElementById('cas').value = "";
    });
  
    function uncheckCheckboxes() {
    // Selectionnez tous les elements de type checkbox
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
    // Parcourez la liste des cases à cocher et decochez-les
    checkboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
  
    
    document.getElementById("piece_b").className = "col-lg-6";
          document.getElementById("piece_s").className = "col-lg-6";
          document.getElementById("piece_b").classList.remove("col-lg-4");
          document.getElementById("piece_s").classList.remove("col-lg-4");
  }
    function updateValue(value) {
        document.getElementById('type_budget').value = value;
        // Sélectionnez l'élément bouton
          const buttonBG = document.getElementById('BG');
          const buttonBA = document.getElementById('BA');
          const buttonBABG = document.getElementById('BABG');
          const frontBG = buttonBG.querySelector(".frontBG");
          const frontBA = buttonBA.querySelector(".frontBA");
          const frontBABG = buttonBABG.querySelector(".frontBABG");
          if (value === "BG") {
            buttonBG.style.background = "hsl(340deg 100% 32%)";
            frontBG.style.background = "hsl(345deg 100% 47%)";
            frontBG.style.color = "white";
  
            buttonBA.style.background = "whitesmoke";
            frontBA.style.background = "white";
            frontBA.style.color = "black";
  
            buttonBABG.style.background = "whitesmoke";
            frontBABG.style.background = "white";
            frontBABG.style.color = "black";
          }else if (value === "BA") {
            
            buttonBA.style.background = "hsl(340deg 100% 32%)";
            frontBA.style.background = "hsl(345deg 100% 47%)";
            frontBA.style.color = "white";
  
            buttonBG.style.background = "whitesmoke";
            frontBG.style.background = "white";
            frontBG.style.color = "black";
  
            buttonBABG.style.background = "whitesmoke";
            frontBABG.style.background = "white";
            frontBABG.style.color = "black";
          }else{
            buttonBABG.style.background = "hsl(340deg 100% 32%)";
            frontBABG.style.background = "hsl(345deg 100% 47%)";
            frontBABG.style.color = "white";
  
            buttonBA.style.background = "whitesmoke";
            frontBA.style.background = "white";
            frontBA.style.color = "black";
  
            buttonBG.style.background = "whitesmoke";
            frontBG.style.background = "white";
            frontBG.style.color = "black";
          }
    }
    
  
      function updateValueCas(value) {
        const specEFA = document.getElementById('spec_EFA');
        const specECD = document.getElementById('spec_ECD');
        const specELD = document.getElementById('spec_ELD');
        const specSerPrive = document.getElementById('spec_SerPrive');
        const specBA = document.getElementById('spec_BA');
        const typeBudgetInput = document.getElementById('type_budget');
        const casInput = document.getElementById('cas');
        
        const verif_piece = document.getElementById('verif_piece');
        const typeBudgetValue = typeBudgetInput.value;
        var currentValue = casInput.value;
  
      if (typeBudgetValue === "BA") {
            specBA.style.display = 'block';
          }else if (typeBudgetValue === "BG") {
            specBA.style.display = 'none';
          }
      if (typeBudgetValue === "BG" || typeBudgetValue === "BA" || typeBudgetValue === "BA-BG") {
        // Pour "BA-BG", vous pouvez concatener la valeur à l'existante
        if (casInput.value) {
          var parts = currentValue.split('-');
            var index = parts.indexOf(value);
  
            if (index === -1) {
                // Ajoutez la valeur si elle n'existe pas
                casInput.value = currentValue + '-' + value;
            } else {
                // Supprimez la valeur si elle existe dejà
                parts.splice(index, 1);
                casInput.value = parts.join('-');
                document.getElementById("information").style.display = "none";
            }
        } else {
          casInput.value = value;
        }
  
        if (casInput.value === "") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          verif_piece.style.display = 'none';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }
        else if (casInput.value === "EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          document.getElementById('verif_piece').style.display = 'block';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }
        else if (casInput.value === "ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'none';
          document.getElementById('verif_piece').style.display = 'block';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }else if (casInput.value === "ELD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'none';
          specELD.style.display = 'block';
          specSerPrive.style.display = 'none';
          document.getElementById('verif_piece').style.display = 'block';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }else if (casInput.value === "Service Prive") {
          
          specECD.style.display = 'none';
          specEFA.style.display = 'none';
          specELD.style.display = 'none';
          specSerPrive.style.display = 'block';
          document.getElementById('verif_piece').style.display = 'block';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }  else if (casInput.value === "EFA-ECD" || casInput.value === "ECD-EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          document.getElementById('verif_piece').style.display = 'block';
          specSerPrive.style.display = 'none';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }
        else if (casInput.value === "EFA-ELD" || casInput.value === "ELD-EFA") {
          specEFA.style.display = 'block';
          specECD.style.display = 'none';
          specELD.style.display = 'block';
          document.getElementById('verif_piece').style.display = 'block';
          specSerPrive.style.display = 'none';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }
        else if (casInput.value === "ECD-ELD" || casInput.value === "ELD-ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          document.getElementById('verif_piece').style.display = 'block';
          specSerPrive.style.display = 'none';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }else if (casInput.value === "ECD-Service Prive" || casInput.value === "Service Prive-ECD") {
          specEFA.style.display = 'none';
          specECD.style.display = 'block';
          specELD.style.display = 'none';
          document.getElementById('verif_piece').style.display = 'block';
          specSerPrive.style.display = 'block';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }
        else if (casInput.value === "EFA-ECD-ELD" || casInput.value === "ECD-ELD-EFA" || casInput.value === "ELD-EFA-ECD" || casInput.value === "ECD-EFA-ELD" || casInput.value === "ECD-EFA-ELD") {
          specEFA.style.display = 'block';
          specECD.style.display = 'block';
          specELD.style.display = 'block';
          document.getElementById('verif_piece').style.display = 'block';
          specSerPrive.style.display = 'none';
          document.getElementById("information").style.display = "none";
          uncheckCheckboxes();
        }
  
        
        
      }
      
      $(document).ready(function(){
          // Selectionnez les cases à cocher toggleSwitch1 &&toggleSwitch2&&toggleSwitch3&&toggleSwitch4&&toggleSwitch5&&toggleSwitch6
        const ToggleSwitch1 = document.getElementById("toggleSwitch1");
        const ToggleSwitch2 = document.getElementById("toggleSwitch2");
        const ToggleSwitch3 = document.getElementById("toggleSwitch3");
        const ToggleSwitch4 = document.getElementById("toggleSwitch4");
        const ToggleSwitch5 = document.getElementById("toggleSwitch5");
        const ToggleSwitch6 = document.getElementById("toggleSwitch6");
        const toggleSwitchEFA1 = document.getElementById("toggleSwitchEFA1");
        const toggleSwitchEFA2 = document.getElementById("toggleSwitchEFA2");
        const toggleSwitchEFA3 = document.getElementById("toggleSwitchEFA3");
        const toggleSwitchECD1 = document.getElementById("toggleSwitchECD1");
        const toggleSwitchECD2 = document.getElementById("toggleSwitchECD2");
        const toggleSwitchECD3 = document.getElementById("toggleSwitchECD3");
        const toggleSwitchELD = document.getElementById("toggleSwitchELD");
  
        const toggleSwitchSerPrive1 = document.getElementById("toggleSwitchSerPrive1");
        const toggleSwitchSerPrive2 = document.getElementById("toggleSwitchSerPrive2");
        const toggleSwitchSerPrive3 = document.getElementById("toggleSwitchSerPrive3");
  
        const toggleSwitchBA = document.getElementById("toggleSwitchBA");
  
        // Selectionnez le bouton Ajouter et form-select
        
        const information = document.getElementById("information");
        const poste = document.getElementById("poste");
        const direction = document.getElementById("direction");
        const comptables = document.getElementById("comptables");
        const submitButton = document.getElementById("subButton");
        
        const casInput = document.getElementById('cas');
        const typeBudgetInput = document.getElementById('type_budget');
        
        
  
        // ecoutez les evenements de changement pour les cases à cocher
        ToggleSwitch1.addEventListener("change", checkIfAllChecked);
        ToggleSwitch2.addEventListener("change", checkIfAllChecked);
        ToggleSwitch3.addEventListener("change", checkIfAllChecked);
        ToggleSwitch4.addEventListener("change", checkIfAllChecked);
        ToggleSwitch5.addEventListener("change", checkIfAllChecked);
        ToggleSwitch6.addEventListener("change", checkIfAllChecked);
        
        toggleSwitchEFA1.addEventListener("change", checkIfAllChecked);
        toggleSwitchEFA2.addEventListener("change", checkIfAllChecked);
        toggleSwitchEFA3.addEventListener("change", checkIfAllChecked);
        
        toggleSwitchECD1.addEventListener("change", checkIfAllChecked);
        toggleSwitchECD2.addEventListener("change", checkIfAllChecked);
        toggleSwitchECD3.addEventListener("change", checkIfAllChecked);
  
        
        toggleSwitchSerPrive1.addEventListener("change", checkIfAllChecked);
        toggleSwitchSerPrive2.addEventListener("change", checkIfAllChecked);
        toggleSwitchSerPrive3.addEventListener("change", checkIfAllChecked);
  
        toggleSwitchELD.addEventListener("change", checkIfAllChecked);
        
        toggleSwitchBA.addEventListener("change", checkIfAllChecked);
        
        function checkIfAllChecked() {
            if (ToggleSwitch1.checked && ToggleSwitch2.checked && ToggleSwitch3.checked && ToggleSwitch4.checked && ToggleSwitch5.checked && ToggleSwitch6.checked) {
                const casValue = casInput.value;
                const typeBudget =typeBudgetInput.value;
  
                if (casValue === "EFA" || casValue === "ECD" || casValue === "ELD" || casValue === "Service Prive") {
                  
                
                  if ((toggleSwitchEFA1.checked && toggleSwitchEFA2.checked && toggleSwitchEFA3.checked) || (toggleSwitchECD1.checked && toggleSwitchECD2.checked && toggleSwitchECD3.checked) || toggleSwitchELD.checked || (toggleSwitchSerPrive1.checked && toggleSwitchSerPrive2.checked && toggleSwitchSerPrive3.checked)) {
                    if(typeBudget === "BG"){
                      document.getElementById("information").style.display = "block";
                      $("#piece_b").removeClass("col-lg-6");
                      $("#piece_b").addClass("col-lg-4");
                      $("#piece_s").removeClass("col-lg-6");
                      $("#piece_s").addClass("col-lg-4");
                    }
                    else if (typeBudget === "BA" && toggleSwitchBA.checked) {
                      
                      document.getElementById("information").style.display = "block";
                      $("#piece_b").removeClass("col-lg-6");
                      $("#piece_b").addClass("col-lg-4");
                      $("#piece_s").removeClass("col-lg-6");
                      $("#piece_s").addClass("col-lg-4");
                    }else {
                      
                      
                    document.getElementById("information").style.display = "none";
                    $("#piece_b").removeClass("col-lg-4");
                    $("#piece_b").addClass("col-lg-6");
                    $("#piece_s").removeClass("col-lg-4");
                    $("#piece_s").addClass("col-lg-6");
                    }
  
                  } else {
                    document.getElementById("information").style.display = "none";
                    $("#piece_b").removeClass("col-lg-4");
                    $("#piece_b").addClass("col-lg-6");
                    $("#piece_s").removeClass("col-lg-4");
                    $("#piece_s").addClass("col-lg-6");
                  }
                }else{
                  if (casValue === "EFA-ECD-ELD" || casValue === "ECD-ELD-EFA" || casValue === "ELD-EFA-ECD" || casValue === "ECD-EFA-ELD" || casValue === "ECD-EFA-ELD") {
                    
                  
                    if ((toggleSwitchEFA1.checked && toggleSwitchEFA2.checked && toggleSwitchEFA3.checked) && (toggleSwitchECD1.checked && toggleSwitchECD2.checked && toggleSwitchECD3.checked) && toggleSwitchELD.checked) {
                      
                      document.getElementById("information").style.display = "block";
                      $("#piece_b").removeClass("col-lg-6");
                      $("#piece_b").addClass("col-lg-4");
                      $("#piece_s").removeClass("col-lg-6");
                      $("#piece_s").addClass("col-lg-4");
  
                    }
                    else {
                      document.getElementById("information").style.display = "none";
                      $("#piece_b").removeClass("col-lg-4");
                      $("#piece_b").addClass("col-lg-6");
                      $("#piece_s").removeClass("col-lg-4");
                      $("#piece_s").addClass("col-lg-6");
                    }
                  } else if (casValue === "EFA-ELD" || casValue === "ELD-EFA" || casValue === "ECD-ELD" || casValue === "ELD-ECD" || casValue === "ECD-Service Prive" ||casValue === "Service Prive-ECD") {
                    
                  
                    if ((toggleSwitchEFA1.checked && toggleSwitchEFA2.checked && toggleSwitchEFA3.checked && toggleSwitchECD1.checked && toggleSwitchECD2.checked && toggleSwitchECD3.checked) || (toggleSwitchEFA1.checked && toggleSwitchEFA2.checked && toggleSwitchEFA3.checked && toggleSwitchELD.checked) || (toggleSwitchECD1.checked && toggleSwitchECD2.checked && toggleSwitchECD3.checked && toggleSwitchELD.checked) || (toggleSwitchSerPrive1.checked && toggleSwitchSerPrive2.checked && toggleSwitchSerPrive3.checked && toggleSwitchECD1.checked && toggleSwitchECD2.checked && toggleSwitchECD3.checked)) {
                      
                      document.getElementById("information").style.display = "block";
                      $("#piece_b").removeClass("col-lg-6");
                      $("#piece_b").addClass("col-lg-4");
                      $("#piece_s").removeClass("col-lg-6");
                      $("#piece_s").addClass("col-lg-4");
  
                    }
                    else {
                      document.getElementById("information").style.display = "none";
                      $("#piece_b").removeClass("col-lg-4");
                      $("#piece_b").addClass("col-lg-6");
                      $("#piece_s").removeClass("col-lg-4");
                      $("#piece_s").addClass("col-lg-6");
                    }
                  }/*else if(casValue === "ECD-Service Prive" ||casValue === "Service Prive-ECD"){
                    if ((toggleSwitchECD1.checked && toggleSwitchECD2.checked && toggleSwitchECD3.checked && toggleSwitchSerPrive1.checked && toggleSwitchSerPrive2 && toggleSwitchSerPrive3)) {
                      
                      document.getElementById("information").style.display = "block";
                      $("#piece_b").removeClass("col-lg-6");
                      $("#piece_b").addClass("col-lg-4");
                      $("#piece_s").removeClass("col-lg-6");
                      $("#piece_s").addClass("col-lg-4");
  
                    }
                    else {
                      document.getElementById("information").style.display = "none";
                      $("#piece_b").removeClass("col-lg-4");
                      $("#piece_b").addClass("col-lg-6");
                      $("#piece_s").removeClass("col-lg-4");
                      $("#piece_s").addClass("col-lg-6");
                    }
                  }*/
                  else {
                    document.getElementById("information").style.display = "none";
                    $("#piece_b").removeClass("col-lg-4");
                    $("#piece_b").addClass("col-lg-6");
                    $("#piece_s").removeClass("col-lg-4");
                    $("#piece_s").addClass("col-lg-6");
                  }
                }
                
            } else {
                  document.getElementById("information").style.display = "none";
                  $("#piece_b").removeClass("col-lg-4");
                  $("#piece_b").addClass("col-lg-6");
                  $("#piece_s").removeClass("col-lg-4");
                  $("#piece_s").addClass("col-lg-6");
                }
        }
          
        
      });
    }
    
    
    // Fonction pour masquer le div "BGnBA" et les boutons
    function hideBGnBA() {
      document.getElementById("BGnBA").style.display = "none";
    }
  
    // Fonction pour afficher le div "BGnBA" et les boutons
    function showBGnBA() {
      document.getElementById("BGnBA").style.display = "block";
    }
  
    
    // evenement de clic sur le bouton "BG"
    document.getElementById("BG").addEventListener("click", function() {
      // Verifiez si le div "BGnBA" est actuellement affiche
  
      if (document.getElementById("BGnBA").style.display === "none") {
        // S'il est masque, affichez-le
        showBGnBA();
      } else {
        // S'il est dejà affiche, masquez-le
        //hideBGnBA();
      }
      //document.getElementById("BG").
      
    });
  
    // evenement de clic sur le bouton "BA"
    document.getElementById("BA").addEventListener("click", function() {
      // Verifiez si le div "BGnBA" est actuellement affiche
      if (document.getElementById("BGnBA").style.display === "none") {
        // S'il est masque, affichez-le
        showBGnBA();
      } else {
        // S'il est dejà affiche, masquez-le
        //hideBGnBA();
      }
    });
  
    // evenement de clic sur le bouton "BABG"
    document.getElementById("BABG").addEventListener("click", function() {
      // Verifiez si le div "BGnBA" est actuellement affiche
      if (document.getElementById("BGnBA").style.display === "none") {
        // S'il est masque, affichez-le
        showBGnBA();
      } else {
        // S'il est dejà affiche, masquez-le
        //hideBGnBA();
      }
    });
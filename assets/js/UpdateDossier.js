$(document).ready(function() {
  $('#compt').change(function() {
    if ($(this).val() !== '') {
      $('#subBtb').prop('disabled', false); // Correction ici
    } else {
      $('#subBtb').prop('disabled', true);
    }
  });
});

function updateValueBudget(value) {
  document.getElementById('typeVal').value = value;
  // Sélectionnez l'élément bouton
    const btnBG = document.getElementById('btnBG');
    const btnBA = document.getElementById('btnBA');
    const btnBABG = document.getElementById('btnBABG');
    const frontBGen = buttonBG.querySelector(".frontBGen");
    const frontBAut = buttonBA.querySelector(".frontBAut");
    const frontBABGen = buttonBABG.querySelector(".frontBABG");
    if (val === "BG") {
      btnBG.style.background = "hsl(340deg 100% 32%)";
      frontBGen.style.background = "hsl(345deg 100% 47%)";
      frontBGen.style.color = "white";

      btnBA.style.background = "whitesmoke";
      frontBAut.style.background = "white";
      frontBAut.style.color = "black";

      btnBABG.style.background = "whitesmoke";
      frontBABGen.style.background = "white";
      frontBABGen.style.color = "black";
    }else if (value === "BA") {
      
      btnBA.style.background = "hsl(340deg 100% 32%)";
      frontBAut.style.background = "hsl(345deg 100% 47%)";
      frontBAut.style.color = "white";

      btnBG.style.background = "whitesmoke";
      frontBGen.style.background = "white";
      frontBGen.style.color = "black";

      btnBABG.style.background = "whitesmoke";
      frontBABGen.style.background = "white";
      frontBABGen.style.color = "black";
    }else{
      btnBABG.style.background = "hsl(340deg 100% 32%)";
      frontBABGen.style.background = "hsl(345deg 100% 47%)";
      frontBABGen.style.color = "white";

      btnBA.style.background = "whitesmoke";
      frontBAut.style.background = "white";
      frontBAut.style.color = "black";

      btnBG.style.background = "whitesmoke";
      frontBGen.style.background = "white";
      frontBGen.style.color = "black";
    }
}
function updateCas(value) {
  const verificationPiece = document.getElementById('verification_piece');
  const specifiqueEFA = document.getElementById('specifique_EFA');
  const specifiqueECD = document.getElementById('specifique_ECD');
  const specifiqueELD = document.getElementById('specifique_ELD');
  const specifiqueSerPrive = document.getElementById('specifique_SerPrive');
  const specifiqueBA = document.getElementById('specifique_BA');
  const typeValInput = document.getElementById('typeVal');
  const casvalInput = document.getElementById('casval');

  const typeValInputValue = typeValInput.value;
  var currentValue = casvalInput.value;
  if (typeValInputValue === "BA" || typeValInputValue === "BA-BG") {
    specifiqueBA.style.display = 'block';
  }else if (typeValInputValue === "BG") {
    specifiqueBA.style.display = 'none';
  }

  if (typeValInputValue === "BG" || typeValInputValue === "BA" || typeValInputValue === "BA-BG"){

    if (casvalInput.value) {
        var parts = currentValue.split('-');
          var index = parts.indexOf(value);

          if (index === -1) {
              // Ajoutez la valeur si elle n'existe pas
              casvalInput.value = currentValue + '-' + value;
          } else {
              // Supprimez la valeur si elle existe dejà
              parts.splice(index, 1);
              casvalInput.value = parts.join('-');
              document.getElementById("OtherInfo").style.display = "none";
          }
      } else {
        casvalInput.value = value;
      }

      if (casvalInput.value === "") {
        verificationPiece.style.display = 'none';
        specifiqueEFA.style.display = 'none';
        specifiqueECD.style.display = 'none';
        specifiqueELD.style.display = 'none';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if(casvalInput.value === "EFA"){
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'block';
        specifiqueECD.style.display = 'none';
        specifiqueELD.style.display = 'none';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if(casvalInput.value === "ECD"){
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'none';
        specifiqueECD.style.display = 'block';
        specifiqueELD.style.display = 'none';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if(casvalInput.value === "ELD"){
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'none';
        specifiqueECD.style.display = 'none';
        specifiqueELD.style.display = 'block';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if(casvalInput.value === "Service Prive"){
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'none';
        specifiqueECD.style.display = 'none';
        specifiqueELD.style.display = 'none';
        specifiqueSerPrive.style.display = 'block';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if (casvalInput.value === "EFA-ECD" || casvalInput.value === "ECD-EFA") {
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'block';
        specifiqueECD.style.display = 'block';
        specifiqueELD.style.display = 'none';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if (casvalInput.value === "ECD-ELD" || casvalInput.value === "ELD-ECD") {
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'none';
        specifiqueECD.style.display = 'block';
        specifiqueELD.style.display = 'block';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if (casvalInput.value === "ECD-Service Prive" || casvalInput.value === "Service Prive-ECD") {
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'none';
        specifiqueECD.style.display = 'block';
        specifiqueELD.style.display = 'none';
        specifiqueSerPrive.style.display = 'block';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }else if (casvalInput.value === "EFA-ECD-ELD" || casvalInput.value === "ECD-ELD-EFA" || casvalInput.value === "ELD-EFA-ECD" || casvalInput.value === "ECD-EFA-ELD" || casvalInput.value === "ECD-EFA-ELD"){
        verificationPiece.style.display = 'block';
        specifiqueEFA.style.display = 'block';
        specifiqueECD.style.display = 'block';
        specifiqueELD.style.display = 'block';
        specifiqueSerPrive.style.display = 'none';
        //specifiqueBA.style.display = 'none';
        document.getElementById("OtherInfo").style.display = "none";
        uncheckCheckboxes();
      }
    }
}
function uncheckCheckboxes() {
  // Selectionnez tous les elements de type checkbox
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');

  // Parcourez la liste des cases à cocher et decochez-les
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
  });

  
  document.getElementById("piece_base").className = "col-lg-6";
        document.getElementById("piece_specifique").className = "col-lg-6";
        document.getElementById("piece_base").classList.remove("col-lg-4");
        document.getElementById("piece_specifique").classList.remove("col-lg-4");
}
$(document).ready(function () {
  const ToggleSwitchPB1 = document.getElementById("ToggleSwitchPB1");
  const ToggleSwitchPB2 = document.getElementById("ToggleSwitchPB2");
  const ToggleSwitchPB3 = document.getElementById("ToggleSwitchPB3");
  const ToggleSwitchPB4 = document.getElementById("ToggleSwitchPB4");
  const ToggleSwitchPB5 = document.getElementById("ToggleSwitchPB5");
  const ToggleSwitchPB6 = document.getElementById("ToggleSwitchPB6");
  const ToggleSwitchCasEFA1 = document.getElementById("ToggleSwitchCasEFA1");
  const ToggleSwitchCasEFA2 = document.getElementById("ToggleSwitchCasEFA2");
  const ToggleSwitchCasEFA3 = document.getElementById("ToggleSwitchCasEFA3");
  const ToggleSwitchCasECD1 = document.getElementById("ToggleSwitchCasECD1");
  const ToggleSwitchCasECD2 = document.getElementById("ToggleSwitchCasECD2");
  const ToggleSwitchCasECD3 = document.getElementById("ToggleSwitchCasECD3");
  const ToggleSwitchCasELD = document.getElementById("ToggleSwitchCasELD");

  const ToggleSwitchCasSerPrive1 = document.getElementById("ToggleSwitchCasSerPrive1");
  const ToggleSwitchCasSerPrive2 = document.getElementById("ToggleSwitchCasSerPrive2");
  const ToggleSwitchCasSerPrive3 = document.getElementById("ToggleSwitchCasSerPrive3");

  const ToggleSwitchBAut = document.getElementById("ToggleSwitchBAut");
  const casVal = document.getElementById('casval');
  const typeVal = document.getElementById('typeVal');
  
  ToggleSwitchPB1.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchPB2.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchPB3.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchPB4.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchPB5.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchPB6.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasEFA1.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasEFA2.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasEFA3.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasECD1.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasECD2.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasECD3.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasELD.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasSerPrive1.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasSerPrive2.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchCasSerPrive3.addEventListener("change", checkWhenAllChecked);
  ToggleSwitchBAut.addEventListener("change", checkWhenAllChecked);
  
  function checkWhenAllChecked() {
    if (ToggleSwitchPB1.checked && ToggleSwitchPB2.checked && ToggleSwitchPB3.checked && ToggleSwitchPB4.checked && ToggleSwitchPB5.checked && ToggleSwitchPB6.checked) {
      const casValeur = casVal.value;
      const type_budgetValeur = typeVal.value;
      if (casValeur === "EFA" || casValeur === "ECD" || casValeur === "ELD" || casValeur === "Service Prive"){
        if ((ToggleSwitchCasEFA1.checked && ToggleSwitchCasEFA2.checked && ToggleSwitchCasEFA3.checked) || (ToggleSwitchCasECD1.checked && ToggleSwitchCasECD2.checked && ToggleSwitchCasECD3.checked) || ToggleSwitchCasELD.checked || (ToggleSwitchCasSerPrive1.checked && ToggleSwitchCasSerPrive2.checked && ToggleSwitchCasSerPrive3.checked)) {
          if (type_budgetValeur === "BG") {
            document.getElementById("OtherInfo").style.display = "block";
            $("#piece_base").removeClass("col-lg-6");
            $("#piece_base").addClass("col-lg-4");
            $("#piece_specifique").removeClass("col-lg-6");
            $("#piece_specifique").addClass("col-lg-4");
          }else if (type_budgetValeur === "BA" && ToggleSwitchBAut.checked) {
            document.getElementById("OtherInfo").style.display = "block";
            $("#piece_base").removeClass("col-lg-6");
            $("#piece_base").addClass("col-lg-4");
            $("#piece_specifique").removeClass("col-lg-6");
            $("#piece_specifique").addClass("col-lg-4");
          }else {
            document.getElementById("OtherInfo").style.display = "none";
            $("#piece_base").removeClass("col-lg-4");
            $("#piece_base").addClass("col-lg-6");
            $("#piece_specifique").removeClass("col-lg-4");
            $("#piece_specifique").addClass("col-lg-6");
          }
        }else {
          document.getElementById("OtherInfo").style.display = "none";
          $("#piece_base").removeClass("col-lg-4");
          $("#piece_base").addClass("col-lg-6");
          $("#piece_specifique").removeClass("col-lg-4");
          $("#piece_specifique").addClass("col-lg-6");
        }
      }else{
        if (casValeur === "EFA-ECD-ELD" || casValeur === "ECD-ELD-EFA" || casValeur === "ELD-EFA-ECD" || casValue === "ECD-EFA-ELD" || casValue === "ECD-EFA-ELD") {
              if ((ToggleSwitchCasEFA1.checked && ToggleSwitchCasEFA2.checked && ToggleSwitchCasEFA3.checked) && (ToggleSwitchCasECD1.checked && ToggleSwitchCasECD2.checked && ToggleSwitchCasECD3.checked) && ToggleSwitchCasELD.checked) {
                
                document.getElementById("OtherInfo").style.display = "block";
                $("#piece_base").removeClass("col-lg-6");
                $("#piece_base").addClass("col-lg-4");
                $("#piece_specifique").removeClass("col-lg-6");
                $("#piece_specifique").addClass("col-lg-4");

              }else {
                document.getElementById("OtherInfo").style.display = "none";
                $("#piece_base").removeClass("col-lg-4");
                $("#piece_base").addClass("col-lg-6");
                $("#piece_specifique").removeClass("col-lg-4");
                $("#piece_specifique").addClass("col-lg-6");
              }
        }else if (casValeur === "EFA-ELD" || casValeur === "ELD-EFA" || casValeur === "ECD-ELD" || casValeur === "ELD-ECD" || casValeur === "ECD-Service Prive" ||casValeur === "Service Prive-ECD") {
       
              if ((ToggleSwitchCasEFA1.checked && ToggleSwitchCasEFA2.checked && ToggleSwitchCasEFA3.checked && ToggleSwitchCasECD1.checked && ToggleSwitchCasECD2.checked && ToggleSwitchCasECD3.checked) || (ToggleSwitchCasEFA1.checked && ToggleSwitchCasEFA2.checked && ToggleSwitchCasEFA3.checked && ToggleSwitchCasELD.checked) || (ToggleSwitchCasECD1.checked && ToggleSwitchCasECD2.checked && ToggleSwitchCasECD3.checked && ToggleSwitchCasELD.checked) || (ToggleSwitchCasSerPrive1.checked && ToggleSwitchCasSerPrive2.checked && ToggleSwitchCasSerPrive3.checked && ToggleSwitchCasECD1.checked && ToggleSwitchCasECD2.checked && ToggleSwitchCasECD1.checked)) {
                
                document.getElementById("OtherInfo").style.display = "block";
                $("#piece_base").removeClass("col-lg-6");
                $("#piece_base").addClass("col-lg-4");
                $("#piece_specifique").removeClass("col-lg-6");
                $("#piece_specifique").addClass("col-lg-4");

              }
              else {
                document.getElementById("OtherInfo").style.display = "none";
                $("#piece_base").removeClass("col-lg-4");
                $("#piece_base").addClass("col-lg-6");
                $("#piece_specifique").removeClass("col-lg-4");
                $("#piece_specifique").addClass("col-lg-6");
              }
            }else {
              document.getElementById("OtherInfo").style.display = "none";
              $("#piece_base").removeClass("col-lg-4");
              $("#piece_base").addClass("col-lg-6");
              $("#piece_specifique").removeClass("col-lg-4");
              $("#piece_specifique").addClass("col-lg-6");
            }
      }
    }
  }
});
function hideBGnBAElement() {
document.getElementById("BGnBAElement").style.display = "none";
}
function showBGnBAElement() {
document.getElementById("BGnBAElement").style.display = "block";
}

document.getElementById("btnBG").addEventListener("click", function() {

if (document.getElementById("BGnBAElement").style.display === "none") {
  showBGnBAElement();
} else {
  //hideBGnBA();
}

});
document.getElementById("btnBA").addEventListener("click", function() {
if (document.getElementById("BGnBAElement").style.display === "none") {
  showBGnBAElement();
} else {
  //hideBGnBA();
}
});
document.getElementById("btnBABG").addEventListener("click", function() {
if (document.getElementById("BGnBAElement").style.display === "none") {
  showBGnBAElement();
} else {
  //hideBGnBA();
}
});
$(".btn-12 span").click(function(){
    // console.log("voakitika");

    // $(".btn-12 span").style.backGround = "linear-gradient(0deg, rgba(0,172,2,1) 0%, rgba(2,126,2,1) 100%)";

});
$("button").click(function(){
$("h1, h2, p").addClass("blue");
$("div").addClass("important");
});

function uncheckCheckboxes() {
var checkboxes = document.querySelectorAll('input[type="checkbox"]');

// Parcourez la liste des cases à cocher et decochez-les
checkboxes.forEach(function(checkbox) {
checkbox.checked = false;
});
const reset = document.getElementById("reset");
reset.addEventListener("click", function() {

document.getElementById('informationBG').style.display = "none";
$("#pieceBASEBG").removeClass("col-lg-4");
$("#pieceBASEBG").addClass("col-lg-6");
$("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
$("#pieceSPECIFIQUEBG").addClass("col-lg-6");

ocument.getElementById('informationBA').style.display = "none";
$("#pieceBASEBA").removeClass("col-lg-4");
$("#pieceBASEBA").addClass("col-lg-6");
$("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
$("#pieceSPECIFIQUEBA").addClass("col-lg-6");

uncheckCheckboxes();
});



document.getElementById('informationBG').style.display = "none";
$("#pieceBASEBG").removeClass("col-lg-4");
$("#pieceBASEBG").addClass("col-lg-6");
$("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
$("#pieceSPECIFIQUEBG").addClass("col-lg-6");

document.getElementById('informationBA').style.display = "none";
$("#pieceBASEBA").removeClass("col-lg-4");
$("#pieceBASEBA").addClass("col-lg-6");
$("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
$("#pieceSPECIFIQUEBA").addClass("col-lg-6");
}
function updateValueCasBG(value) {

 // Supprimez la classe "active" de tous les éléments <span> dans tous les boutons

 var isActive = $("#"+value+" span").hasClass("active");

    // Supprimez la classe "active" de tous les éléments <span> dans tous les boutons

    // Si le bouton n'était pas actif, ajoutez la classe "active" et appliquez le nouveau style
    if (!isActive) {
        $("#"+value+" span").addClass("active").css({
            background: "linear-gradient(0deg, rgba(0,172,2,1) 0%, rgba(2,126,2,1) 100%)",
            transition: "all 0.3s"
        });
    } else {
        $("#"+value+" span").removeClass("active");

        // Si le bouton était déjà actif, supprimez la classe "active" et rétablissez le style d'origine
        $("#"+value+" span").css({
            background: "linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%)", // Remplacez cette valeur par le style d'origine que vous souhaitez
            transition: "all 0.3s"
        });
    }

console.log("voakitika");


const verifPiece = document.getElementById('verifPiece');
const specEFA = document.getElementById('specEFABG');
const specECD = document.getElementById('specECDBG');
const specELD = document.getElementById('specELDBG');
const specSerPrive = document.getElementById('specSerPriveBG');
const information = document.getElementById('informationBG');
const typeBudgetInput = document.getElementById('typeBudgetBG');
const casInput = document.getElementById('casBG');

const typeBudgetValue = typeBudgetInput.value;
var currentValue = casInput.value;

if (typeBudgetValue === "BG") {
    if (casInput.value) {
    var parts = currentValue.split('-');
        var index = parts.indexOf(value);

        if (index === -1) {
            casInput.value = currentValue + '-' + value;
        } else {
            parts.splice(index, 1);
            casInput.value = parts.join('-');
            //document.getElementById("information").style.display = "none";
        }
    } else {
    casInput.value = value;
    }
}

if (casInput.value === "") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'none';
  uncheckCheckboxes();
}else if (casInput.value === "EFA") {
  specEFA.style.display = 'block';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'block';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ELD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "Service Privé") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'block';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD-Service Privé" || casInput.value === "Service Privé-ECD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'block';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'block';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "EFA-ECD") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD-ELD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "EFA-ECD-ELD") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD-ELD-EFA") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'block';
  uncheckCheckboxes();
}else{
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPiece.style.display = 'none';
  casInput.value = "";
  uncheckCheckboxes();
}

$(document).ready(function(){
    const switchPieceBaseBG1 = document.getElementById("switchPieceBaseBG1");
    const switchPieceBaseBG2 = document.getElementById("switchPieceBaseBG2");
    const switchPieceBaseBG3 = document.getElementById("switchPieceBaseBG3");
    const switchPieceBaseBG4 = document.getElementById("switchPieceBaseBG4");
    const switchPieceBaseBG5 = document.getElementById("switchPieceBaseBG5");
    const switchPieceBaseBG6 = document.getElementById("switchPieceBaseBG6");
    const switchPieceEFABG1 = document.getElementById("switchPieceEFABG1");
    const switchPieceEFABG2 = document.getElementById("switchPieceEFABG2");
    const switchPieceEFABG3 = document.getElementById("switchPieceEFABG3");
    const switchPieceECDBG1 = document.getElementById("switchPieceECDBG1");
    const switchPieceECDBG2 = document.getElementById("switchPieceECDBG2");
    const switchPieceECDBG3 = document.getElementById("switchPieceECDBG3");
    const switchPieceSerPriveBG1 = document.getElementById("switchPieceSerPriveBG1");
    const switchPieceSerPriveBG2 = document.getElementById("switchPieceSerPriveBG2");
    const switchPieceSerPriveBG3 = document.getElementById("switchPieceSerPriveBG3");
    const switchPieceELDBG = document.getElementById("switchPieceELDBG");

    const typeBudgetInput = document.getElementById('typeBudgetBG');
    const casInput = document.getElementById('casBG');
    const casValue = casInput.value;
    const typeBudget =typeBudgetInput.value;
    
    const pieceBASEBG = document.getElementById("pieceBASEBG")
    const pieceSPECIFIQUEBG = document.getElementById("pieceSPECIFIQUEBG")
    const informationBG = document.getElementById("informationBG")

    

    switchPieceBaseBG1.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBG2.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBG3.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBG4.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBG5.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBG6.addEventListener("change", checkIfAllChecked);
    switchPieceEFABG1.addEventListener("change", checkIfAllChecked);
    switchPieceEFABG2.addEventListener("change", checkIfAllChecked);
    switchPieceEFABG3.addEventListener("change", checkIfAllChecked);
    switchPieceECDBG1.addEventListener("change", checkIfAllChecked);
    switchPieceECDBG2.addEventListener("change", checkIfAllChecked);
    switchPieceECDBG3.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBG1.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBG2.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBG3.addEventListener("change", checkIfAllChecked);
    switchPieceELDBG.addEventListener("change", checkIfAllChecked);

    function checkIfAllChecked() {
        if (switchPieceBaseBG1.checked && switchPieceBaseBG2.checked && switchPieceBaseBG3.checked && switchPieceBaseBG4.checked && switchPieceBaseBG5.checked && switchPieceBaseBG6.checked){
            if (casValue === "EFA"|| casValue === "ECD" || casValue === "ELD" || casValue === "Service Privé") {
                if ((switchPieceEFABG1.checked && switchPieceEFABG2.checked && switchPieceEFABG3.checked) || (switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) || switchPieceELDBG.checked || (switchPieceSerPriveBG1.checked && switchPieceSerPriveBG2.checked && switchPieceSerPriveBG3.checked)) {
                    
                    informationBG.style.display = "block";
                    $("#pieceBASEBG").removeClass("col-lg-6");
                    $("#pieceBASEBG").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-4");
                }else{
                    informationBG.style.display = "none";
                    $("#pieceBASEBG").removeClass("col-lg-4");
                    $("#pieceBASEBG").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                }
            }else if (casValue === "ECD-Service Privé" || casValue === "Service Privé-ECD") {
                if ((switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) && (switchPieceSerPriveBG1.checked && switchPieceSerPriveBG2.checked && switchPieceSerPriveBG3.checked)) {
                    
                    informationBG.style.display = "block";
                    $("#pieceBASEBG").removeClass("col-lg-6");
                    $("#pieceBASEBG").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-4");
                }else{
                    informationBG.style.display = "none";
                    $("#pieceBASEBG").removeClass("col-lg-4");
                    $("#pieceBASEBG").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                }
            }else if (casValue === "EFA-ECD-ELD" ) {
                if ((switchPieceEFABG1.checked && switchPieceEFABG2.checked && switchPieceEFABG3.checked) && (switchPieceECDBG1.checked && switchPieceECDBG2.checked && switchPieceECDBG3.checked) && switchPieceELDBG.checked) {
                    
                    informationBG.style.display = "block";
                    $("#pieceBASEBG").removeClass("col-lg-6");
                    $("#pieceBASEBG").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-4");
                }else{
                    informationBG.style.display = "none";
                    $("#pieceBASEBG").removeClass("col-lg-4");
                    $("#pieceBASEBG").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
                }
            }
            else{
                informationBG.style.display = "none";
                $("#pieceBASEBG").removeClass("col-lg-4");
                $("#pieceBASEBG").addClass("col-lg-6");
                $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
                $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
            }
            
        }else{
            informationBG.style.display = "none";
            $("#pieceBASEBG").removeClass("col-lg-4");
            $("#pieceBASEBG").addClass("col-lg-6");
            $("#pieceSPECIFIQUEBG").removeClass("col-lg-4");
            $("#pieceSPECIFIQUEBG").addClass("col-lg-6");
        }
    }

});
}

function updateValueCasBA(value) {
const verifPieceBA = document.getElementById('verifPieceBA');
const specEFA = document.getElementById('specEFABA');
const specECD = document.getElementById('specECDBA');
const specELD = document.getElementById('specELDBA');
const specSerPrive = document.getElementById('specSerPriveBA');
const information = document.getElementById('informationBA');
const typeBudgetInput = document.getElementById('typeBudgetBA');
const casInput = document.getElementById('casBA');

const typeBudgetValue = typeBudgetInput.value;
var currentValue = casInput.value;

if (typeBudgetValue === "BA") {
    if (casInput.value) {
    var parts = currentValue.split('-');
        var index = parts.indexOf(value);

        if (index === -1) {
            casInput.value = currentValue + '-' + value;
        } else {
            parts.splice(index, 1);
            casInput.value = parts.join('-');
            //document.getElementById("information").style.display = "none";
        }
    } else {
    casInput.value = value;
    }
}

if (casInput.value === "") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'none';
  uncheckCheckboxes();
}else if (casInput.value === "EFA") {
  specEFA.style.display = 'block';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'block';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ELD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "Service Privé") {
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'block';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD-Service Privé" || casInput.value === "Service Privé-ECD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'block';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'block';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "EFA-ECD") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD-ELD") {
  specEFA.style.display = 'none';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "EFA-ECD-ELD") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else if (casInput.value === "ECD-ELD-EFA") {
  specEFA.style.display = 'block';
  specECD.style.display = 'block';
  specELD.style.display = 'block';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'block';
  uncheckCheckboxes();
}else{
  specEFA.style.display = 'none';
  specECD.style.display = 'none';
  specELD.style.display = 'none';
  specSerPrive.style.display = 'none';
  verifPieceBA.style.display = 'none';
  casInput.value = "";
  uncheckCheckboxes();
}

$(document).ready(function(){
    const switchPieceBaseBA1 = document.getElementById("switchPieceBaseBA1");
    const switchPieceBaseBA2 = document.getElementById("switchPieceBaseBA2");
    const switchPieceBaseBA3 = document.getElementById("switchPieceBaseBA3");
    const switchPieceBaseBA4 = document.getElementById("switchPieceBaseBA4");
    const switchPieceBaseBA5 = document.getElementById("switchPieceBaseBA5");
    const switchPieceBaseBA6 = document.getElementById("switchPieceBaseBA6");
    const switchPieceBA = document.getElementById("switchPieceBA");
    const switchPieceEFABA1 = document.getElementById("switchPieceEFABA1");
    const switchPieceEFABA2 = document.getElementById("switchPieceEFABA2");
    const switchPieceEFABA3 = document.getElementById("switchPieceEFABA3");
    const switchPieceECDBA1 = document.getElementById("switchPieceECDBA1");
    const switchPieceECDBA2 = document.getElementById("switchPieceECDBA2");
    const switchPieceECDBA3 = document.getElementById("switchPieceECDBA3");
    const switchPieceSerPriveBA1 = document.getElementById("switchPieceSerPriveBA1");
    const switchPieceSerPriveBA2 = document.getElementById("switchPieceSerPriveBA2");
    const switchPieceSerPriveBA3 = document.getElementById("switchPieceSerPriveBA3");
    const switchPieceELDBA = document.getElementById("switchPieceELDBA");

    const typeBudgetInput = document.getElementById('typeBudgetBA');
    const casInput = document.getElementById('casBA');
    const casValue = casInput.value;
    const typeBudget =typeBudgetInput.value;
    
    const pieceBASEBA = document.getElementById("pieceBASEBA")
    const pieceSPECIFIQUEBA = document.getElementById("pieceSPECIFIQUEBA")
    const informationBA = document.getElementById("informationBA")

    

    switchPieceBaseBA1.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBA2.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBA3.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBA4.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBA5.addEventListener("change", checkIfAllChecked);
    switchPieceBaseBA6.addEventListener("change", checkIfAllChecked);
    switchPieceBA.addEventListener("change", checkIfAllChecked);
    switchPieceEFABA1.addEventListener("change", checkIfAllChecked);
    switchPieceEFABA2.addEventListener("change", checkIfAllChecked);
    switchPieceEFABA3.addEventListener("change", checkIfAllChecked);
    switchPieceECDBA1.addEventListener("change", checkIfAllChecked);
    switchPieceECDBA2.addEventListener("change", checkIfAllChecked);
    switchPieceECDBA3.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBA1.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBA2.addEventListener("change", checkIfAllChecked);
    switchPieceSerPriveBA3.addEventListener("change", checkIfAllChecked);
    switchPieceELDBA.addEventListener("change", checkIfAllChecked);

    function checkIfAllChecked() {
        if (switchPieceBaseBA1.checked && switchPieceBaseBA2.checked && switchPieceBaseBA3.checked && switchPieceBaseBA4.checked && switchPieceBaseBA5.checked && switchPieceBaseBA6.checked && switchPieceBA.checked){
            if (casValue === "EFA"|| casValue === "ECD" || casValue === "ELD" || casValue === "Service Privé") {
                if ((switchPieceEFABA1.checked && switchPieceEFABA2.checked && switchPieceEFABA3.checked) || (switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) || switchPieceELDBA.checked || (switchPieceSerPriveBA1.checked && switchPieceSerPriveBA2.checked && switchPieceSerPriveBA3.checked)) {
                    
                    informationBA.style.display = "block";
                    $("#pieceBASEBA").removeClass("col-lg-6");
                    $("#pieceBASEBA").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-4");
                }else{
                    informationBA.style.display = "none";
                    $("#pieceBASEBA").removeClass("col-lg-4");
                    $("#pieceBASEBA").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                }
            }else if (casValue === "ECD-Service Privé" || casValue === "Service Privé-ECD") {
                if ((switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) && (switchPieceSerPriveBA1.checked && switchPieceSerPriveBA2.checked && switchPieceSerPriveBA3.checked)) {
                    
                    informationBA.style.display = "block";
                    $("#pieceBASEBA").removeClass("col-lg-6");
                    $("#pieceBASEBA").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-4");
                }else{
                    informationBA.style.display = "none";
                    $("#pieceBASEBA").removeClass("col-lg-4");
                    $("#pieceBASEBA").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                }
            }else if (casValue === "EFA-ECD-ELD" ) {
                if ((switchPieceEFABA1.checked && switchPieceEFABA2.checked && switchPieceEFABA3.checked) && (switchPieceECDBA1.checked && switchPieceECDBA2.checked && switchPieceECDBA3.checked) && switchPieceELDBA.checked) {
                    
                    informationBA.style.display = "block";
                    $("#pieceBASEBA").removeClass("col-lg-6");
                    $("#pieceBASEBA").addClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-4");
                }else{
                    informationBA.style.display = "none";
                    $("#pieceBASEBA").removeClass("col-lg-4");
                    $("#pieceBASEBA").addClass("col-lg-6");
                    $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                    $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
                }
            }
            else{
                informationBA.style.display = "none";
                $("#pieceBASEBA").removeClass("col-lg-4");
                $("#pieceBASEBA").addClass("col-lg-6");
                $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
                $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
            }
            
        }else{
            informationBA.style.display = "none";
            $("#pieceBASEBA").removeClass("col-lg-4");
            $("#pieceBASEBA").addClass("col-lg-6");
            $("#pieceSPECIFIQUEBA").removeClass("col-lg-4");
            $("#pieceSPECIFIQUEBA").addClass("col-lg-6");
        }
    }

});
}
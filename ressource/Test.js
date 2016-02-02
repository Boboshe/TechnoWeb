/**
 * Created by Mohamed-Amine on 28/01/2016.
 */

function validerFormulaire(elem, message) {
    var x = document.forms["formulaire"]["nom"].value;
    var y = document.forms["formulaire"]["prenom"].value;

    //Il faudra faire apparaître la liste des personnes qui peuvent se connecter ou pas
    if (x != "TEROOATEA" && x!=null){
        alert("Erreur de nom");
        //$().tooltip('show');
    } else { //nom => OK
        if (y == "Boris"|| y == "boris") //IDEM
            //return true;
            document.form.submit();
        else {
            alert("Erreur de prénom");
            //$().tooltip('show');
        }        
    }
    return false;
}


function checkInput(elem, garde) {

    if( elem != null && elem != garde)
        return false;
    else
    {
        elem.toggleEnabled();
        return true;
    }

    if(document.getElementById("textfield").value == ""){
        document.getElementById("showDiv").style.display="block";
    }
}

function checkNull(ele) {
    if(document.getElementById("textfield").value == "")
        alert(ele + "Null");
}

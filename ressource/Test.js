/**
 * Created by Mohamed-Amine on 28/01/2016.
 */

function validerFormulaire(elem, message) {
    var x = document.forms["formulaire"]["nom"].value;

    if (x == null || x == "Boulbars" || x == "boulbars")
        return true;
    else
    {
        alert("Erreur nom");
        $().tooltip('show');
        return false;
    }
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

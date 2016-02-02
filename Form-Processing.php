<?php
/**
 * Created by PhpStorm.
 * User: Mohamed-Amine
 * Date: 25/01/2016
 * Time: 08:34
 */


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$numero = $_POST['numero'];
$severite = $_POST['optionsRadios'];
//$photo = $_FILES[image]['photo']; // ça ça marche pas
$description = $_POST['description'];
$type = $_POST['typeIncident'];

$reference = array();


echo "Nom : {$nom} <br />";
echo "Pr&eacutenom : {$prenom} <br />";
echo "Email : {$email} <br />";
echo "Num&eacutero : {$numero} <br />";
echo "Description : {$description} <br />";
echo "Type : {$type} <br />";
echo "Adresse : {$adresse} <br />";
echo "S&eacutev&eacuterite : {$severite} <br /><br />";

echo "R&eacutef&eacuterence : ";

if (isset($_POST['check_web'])) {
    echo "[check_web]: ".$_POST['check_web'];
    $reference[0]=$_POST['check_web'];
}
if (isset($_POST['check_email'])){
    echo "[check_email]: ".$_POST['check_email'];
    $reference[1]=$_POST['check_email'];
}
if (isset($_POST['check_tel'])){
    echo "[check_tel]: ".$_POST['check_tel'];
    $reference[2]=$_POST['check_tel']; 
}
echo "<br />";

/* Traitement de l'image par Amine
if (isset($_FILES['image'])) {
    $aExtraInfo = getimagesize($_FILES['image']['photo']);
    $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['photo']));
}

echo "<h2>PHOTO</h2>";
echo "<img src={$sImage} alt=Image/>";
*/

//Déplacement
echo serialize($_POST)."<br />";
echo serialize($_FILES)."<br />";
//echo serialize($HTTP_POST_FILES)."<br />";

    if(!empty($_FILES['photo'])){
        $filenamme = $_FILES['photo']['name'];

        if(@copy($_FILES['photo']['tmp_name'],$destination)){
            echo "Success";
        } else {
            echo "Failed";
        }
    }

/* UPLOAD - OpenClassroom */
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)

{
    


   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0){
        echo "=> Erreur de fichier <br />";
        return FALSE;
     }
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize){
        echo "=> Erreur de taille <br />";
        return FALSE;
    }
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)){
        echo "=> Erreur d'extension <br />";
        return FALSE;
    }

   
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);

}
//EXEMPLES
$upload1 = upload('photo',"img/".$_FILES['photo']['name'],1048576, array('png','gif','jpg','jpeg') );
if ($upload1) echo "Upload de l'icone réussi!<br />";
else echo " Echec du upload<br />";
/*

  $upload1 = upload('icone','uploads/monicone1',15360, array('png','gif','jpg','jpeg') );
  $upload2 = upload('mon_fichier','uploads/file112',1048576, FALSE );

  if ($upload1) "Upload de l'icone réussi!<br />";
  if ($upload2) "Upload du fichier réussi!<br />";

*/


/*
$object = new Incident($description, $type, $adresse, $severite, $reference, "");
echo "Desccription" . $object->getDescription();
$database = new Connection("localhost", "root", "root");
echo $database->insertIntoIncident($object);
$database->closeConnection();
*/

/*

// La connection à la DB //
$db;
try {
    $db = new PDO("mysql:host=localhost;dbname=mysql", "root", "root") or die(print_r($db->errorInfo(), true));
    echo 'Connected to database';
} catch (PDOException $e) {
    echo $e->getMessage()."\n Erreur connection";
}

// L'insertion dans la table incident //
try {
    $rqt = "INSERT INTO Mairie.Incident(Description, Type, Adresse, Severite, Reference, Image)
            VALUES ('$description', '$type', '$adresse', '$severite', '$reference','')";

    $count = $db->exec($rqt) or die(print_r($db->errorInfo(), true));
    echo 'Execution successfull'. "\n";
    }
catch (PDOException $e)
    {
    echo $e->getMessage() . "\n Erreur insertion";
    }

echo "Nombre de lignes insérées : ".$count;

// Déconnexion de la DB //

$db = null;
echo 'Discoonnected from database'. "\n";

*/
?>
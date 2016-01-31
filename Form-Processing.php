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
$photo = $_FILES[image]['photo'];
$description = $_POST['description'];
$type = $_POST['typeIncident'];


if (isset($_POST['check_web']))
    $reference = $_POST['check_web'];
if (isset($_POST['check_tel']))
    $reference = $_POST['check_tel'];
if (isset($_POST['check_email']))
    $reference = $_POST['check_email'];


echo "Nom : {$nom} <br />";
echo "Prénom : {$prenom} <br />";

echo "Adresse : {$adresse} <br />";
echo "Type : {$type} <br />";
echo "Description : {$description} <br />";
echo "severite : {$severite} <br />";
echo "Référence : {$reference} <br />";

if (isset($_FILES['image'])) {
    $aExtraInfo = getimagesize($_FILES['image']['photo']);
    $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['photo']));
}

echo "<h2>PHOTO</h2>";
echo "<img src={$sImage} alt=Image/>";

/*
$object = new Incident($description, $type, $adresse, $severite, $reference, "");
echo "Desccription" . $object->getDescription();
$database = new Connection("localhost", "root", "root");
echo $database->insertIntoIncident($object);
$database->closeConnection();
*/

$db;

/*** La connection à la DB ***/
try {
    $db = new PDO("mysql:host=localhost;dbname=mysql", "root", "root") or die(print_r($db->errorInfo(), true));
    echo 'Connected to database';
} catch (PDOException $e) {
    echo $e->getMessage()."\n Erreur connection";
}

/*** L'insertion dans la table incident ***/
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

/*** Déconnexion de la DB ***/

$db = null;
echo 'Discoonnected from database'. "\n";

?>
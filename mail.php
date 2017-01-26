<?php
require_once('mailer.php');
$servername='localhost';
$username='root';
$password='';
$dbname='portfolio';


$nom=$_REQUEST['nom'];
$email=$_REQUEST['email'];
$objet=$_REQUEST['objet'];
$message=$_REQUEST['message'];


try {

$basedonnee=new PDO ("mysql:host=$servername;dbname=$dbname" , $username , $password);
$basedonnee-> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {

  die('erreur');

}

$requete=$basedonnee->prepare("INSERT INTO formulaire (nom , email , objet ,message) VALUES (:nom , :email, :objet, :message)");

$requete->bindParam(':nom' , $nom, PDO::PARAM_STR);
$requete->bindParam(':email' , $email, PDO::PARAM_STR);
$requete->bindParam(':objet' , $objet, PDO::PARAM_STR);
$requete->bindParam(':message' , $message, PDO::PARAM_STR);
$requete-> execute();
$last_id = $basedonnee->lastInsertId();

echo ('le message a bien été envoyé ! votre id est '.$last_id);

$sth = $basedonnee->prepare("SELECT nom, email, objet, message FROM formulaire");
$sth->execute();



$result = $sth->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($result);

echo "</pre>";

echo "votre nom est ".$result['nom']."<br>";
echo "votre email est ".$result['email']."<br>";
echo "votre objet est ".$result['objet']."<br>";
echo "votre objet est ".$result['message']."<br>";


bite();






?>

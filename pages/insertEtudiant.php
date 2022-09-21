<?php
require_once('identifier.php');
require_once('connexiondb.php');
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$idFiliere=isset($_POST['idConvention'])?$_POST['idConvention']:1;

$requete="insert into etudiant(nom,prenom,mail,idConvention) values(?,?,?,?)";
$params=array($nom,$prenom,$mail,$idConvention);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('location:etudiant.php');

?>

<?php
require_once('identifier.php');
require_once('connexiondb.php');

$nom=isset($_POST['nom'])?$_POST['nom']:"";
$niveau=isset($_POST['nbHeure'])?strtoupper($_POST['nbHeure']):"";

$requete="insert into convention(nom,nbHeure) values(?,?)";
$params=array($nom,$nbHeure);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('location:convention.php');
?>

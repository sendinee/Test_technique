<?php
require_once('identifier.php');

require_once('connexiondb.php');

$idattestation=isset($_POST['idattestation'])?$_POST['idattestation']:0;

$nom=isset($_POST['nom'])?$_POST['nom']:"";

$nbHeure=isset($_POST['nbHeure'])?($_POST['nbHeure']):"";

$requete="update attestation set nom=?,nbHeure=? where idattestation=?";

$params=array($nom,$nbHeure,$idattestation);

$resultat=$pdo->prepare($requete);

$resultat->execute($params);

header('location:attestation.php');
?>

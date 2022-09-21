<?php
require_once('identifier.php');
require_once('connexiondb.php');

$nom=isset($_POST['nom'])?$_POST['nom']:"";
$idConvention=isset($_POST['idconvention'])?$_POST['idconvention']:"";
$message=isset($_POST['message'])?strtoupper($_POST['message']):"";

$requete="insert into attestation(nom,idconvention,message) values(?,?,?)";
$params=array($nom,$idConvention,$message);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('location:convention.php');
?>

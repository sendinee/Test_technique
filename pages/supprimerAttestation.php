<?php
session_start();
if(isset($_SESSION['attestation'])){

    require_once('connexiondb.php');

    $idAttestation=isset($_GET['idAttestation'])?$_GET['idAttestation']:0;

    $requete="delete from attestation where idAttestation=?";

    $params=array($idAttestation);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);

    header('location:attestation.php');
}

?>

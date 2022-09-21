<?php
require_once('identifier.php');
require_once('connexiondb.php');
$idE=isset($_POST['idE'])?$_POST['idE']:0;
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$email=isset($_POST['email'])?strtoupper($_POST['email']):"";
$idConvention=isset($_POST['idConvention')?$_POST['idConvention']:1;

if(!empty($nom)){
    $requete="update etudiant set nom=?,prenom=?,mail=?,idConvention=? where idEtudiant=?";
    $params=array($nom,$prenom,$mail,$idConvention,$idE);
}else{
    $requete="update etudiant set nom=?,prenom=?,mail=?,idconvention=? where idConvention=?";
    $params=array($nom,$prenom,$mail,$idConvention,$idE);
}

$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('location:etudiant.php');

?>

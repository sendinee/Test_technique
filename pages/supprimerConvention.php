<?php
session_start();
if(isset($_SESSION['user'])){

    require_once('connexiondb.php');
    $idc=isset($_GET['idC'])?$_GET['idC']:0;

    $requeteEtudiant="select count(*) countEtudiant from etudiant where idConvention=$idc";
    $resultatEtudiant=$pdo->query($requeteEtudiant);
    $tabCountEtudiant=$resultatEtudiant->fetch();
    $nbrEtudiant=$tabCountEtudiant['countEtudiant'];

    if($nbrEtudiant==0){
        $requete="delete from convention where idConvention=?";
        $params=array($idc);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);
        header('location:convention.php');
    }else{
        $msg="Suppression impossible: Vous devez supprimer tous les etudiants inscris dans cette feuille de convention";
        header("location:alerte.php?message=$msg");
    }

}else {
    header('location:login.php');
}




?>

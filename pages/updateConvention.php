<?php
require_once('identifier.php');

require_once('connexiondb.php');

$idc=isset($_POST['idC'])?$_POST['idC']:0;

$nom=isset($_POST['nom'])?$_POST['nom']:"";

$nbHeure=isset($_POST['nbHeure'])?($_POST['nbheure']):"";

$requete="update convention set nom=?,nbHeure=? where idConvention=?";

$params=array($nom,$nbHeure,$idc);

$resultat=$pdo->prepare($requete);

$resultat->execute($params);

header('location:convention.php');
?>

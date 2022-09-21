<?php
require_once('identifier.php');
require_once('connexiondb.php');
$idC=isset($_GET['idC'])?$_GET['idC']:0;
$requete="select * from convention where idConvention=$idc";
$resultat=$pdo->query($requete);
$convention=$resultat->fetch();
$nomc=$convention['nom'];
$niveau=strtolower($convention['niveau']);
?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Editer une convention</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Editer la convention :</div>
        <div class="panel-body">
            <form method="post" action="updateConvention.php" class="form">
                <div class="form-group">
                    <label for="nbHeure">id de la Convention: <?php echo $idc ?></label>
                    <input type="hidden" name="idC"
                           class="form-control"
                           value="<?php echo $idc ?>"/>
                </div>

                <div class="form-group">
                    <label for="niveau">Nom:</label>
                    <input type="text" name="nom"
                           placeholder="Nom"
                           class="form-control"
                           value="<?php echo $nomc ?>"/>
                </div>

                <div class="form-group">
                    <label for="niveau">NbHeure:</label>
                    <select name="niveau" class="form-control" id="nbHeure">
                        <option value="100" <?php if($nbHeure==="100")  echo "selected" ?>>100</option>
                        <option value="90"  <?php if($nbHeure==="90")   echo "selected" ?>>90</option>
                        <option value="80"  <?php if($nbHeure==="80")   echo "selected" ?>>80</option>
                        <option value="70"  <?php if($nbHeure==="70")   echo "selected" ?>>70</option>
                        <option value="60"  <?php if($nbHeure==="60")   echo "selected" ?>>60</option>
                        <option value="50"  <?php if($nbHeure==="50")   echo "selected" ?>>50</option>
                        <option value="40"  <?php if($nbHeure==="40")   echo "selected" ?>>40</option>
                        <option value="30"  <?php if($nbHeure==="30")   echo "selected" ?>>30</option>
                        <option value="20"  <?php if($nbHeure==="20")   echo "selected" ?>>20</option>
                        <option value="10"  <?php if($nbHeure==="10")   echo "selected" ?>>10</option>
                        <option value="0"   <?php if($nbHeure==="0")    echo "selected" ?>>0</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-save"></span>
                    Enregistrer
                </button>

            </form>
        </div>
    </div>
</div>
</body>
</HTML>

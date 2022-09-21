<?php
require_once('identifier.php');
require_once('connexiondb.php');
$idE=isset($_GET['idE'])?$_GET['idE']:0;
$requeteE="select * from etudiant where idEtudiant=$idE";
$resultatE=$pdo->query($requeteE);
$etudiant=$resultatE->fetch();
$nom=$etudiant['nom'];
$prenom=$etudiant['prenom'];
$mail=$etudiant['mail'];
$idConvention=$etudiant['idConvention'];

$requeteF="select * from filiere";
$resultatF=$pdo->query($requeteF);

?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Editer un étudiant</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Editer un étudiant :</div>
        <div class="panel-body">
            <form method="post" action="updateEtudiant.php" class="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="idE">id de l'Etudiant: <?php echo $idE ?></label>
                    <input type="hidden" name="idE" class="form-control" value="<?php echo $idE ?>"/>
                </div>
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $nom ?>"/>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                           value="<?php echo $prenom ?>"/>
                </div>
                <div class="form-group">
                    <label for="mail">Mail :</label>
                    <input type="text" name="mail" placeholder="Mail" class="form-control"
                           value="<?php echo $mail ?>"/>
                </div>
                <div class="form-group">
                    <label for="idConvention">Convention:</label>
                    <select name="idConvention" class="form-control" id="idConvention">
                        <?php while($convention=$resultatC->fetch()) { ?>
                            <option value="<?php echo $convention['idConvention'] ?>"
                                <?php if($idConvention===$convention['idConvention']) echo "selected" ?>>
                                <?php echo $convention['nom'] ?>
                            </option>
                        <?php }?>
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

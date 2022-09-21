<?php
require_once('identifier.php');
require_once('connexiondb.php');

$requeteC="select * from convention";
$resultatC=$pdo->query($requeteC);

?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Nouveau Etudiant</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Les informations du nouveau etudiant :</div>
        <div class="panel-body">
            <form method="post" action="insertStagiaire.php" class="form"  enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="prenom">Mail :</label>
                    <input type="text" name="mail" placeholder="Mail" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="idConvention">Convention:</label>
                    <select name="idConvention" class="form-control" id="idConvention">
                        <?php while($convention=$resultatC->fetch()) { ?>
                            <option value="<?php echo $convention['idConvention'] ?>">
                                <?php echo $convention['nomCoonvention'] ?>
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
</HTML><?php
require_once('identifier.php');
require_once('connexiondb.php');

$requeteC="select * from convention;
$resultatC=$pdo->query($requeteC);

?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Nouveau Etudiant</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Les informations du nouveau étudiant :</div>
        <div class="panel-body">
            <form method="post" action="insertEtudiant.php" class="form"  enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="mail">Mail :</label>
                    <input type="text" name="mail" placeholder="Mail" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="idConvention">Convention:</label>
                    <select name="idConvention" class="form-control" id="idConvention">
                        <?php while($convention=$resultatC->fetch()) { ?>
                            <option value="<?php echo $convention['idConvention'] ?>">
                                <?php echo $convention['nomConvention'] ?>
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

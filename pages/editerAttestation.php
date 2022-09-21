<?php
require_once('identifier.php');
require_once('connexiondb.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$requete="select * from attestation where idattestation=$id";

$resultat=$pdo->query($requete);
$attestation=$resultat->fetch();
$nom=$nom['nom'];
$idconvention=$idconvention['idconvention'];
$message=$message['message'];

?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Editer une attestation</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Editer une attestation :</div>
        <div class="panel-body">
            <form method="post" action="updateAttestation.php" class="form">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="hidden" name="nom" placeholder="nom" class="form-control" value="<?php echo $nom ?>"/>
                </div>
                <div class="form-group">
                    <label for="idConvention"> Id Convention :</label>
                    <input type="text" name="convention" placeholder="Convention" class="form-control" value="<?php echo $idconvention ?>"/>
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" placeholder="message" value="<?php echo $message ?>"rows="5" cols="33"></textarea>
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

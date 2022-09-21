<?php
require_once('identifier.php');
?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <tit>Nouvelle Convention</tit>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Veuillez saisir les données de la nouvelle convention</div>
        <div class="panel-body">
            <form method="post" action="insertConvention.php" class="form">

                <div class="form-group">
                    <label for="nom">Nom de la convention:</label>
                    <input type="text" name="nom"
                           placeholder="Convention"
                           class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="nbHeure">NbHeure:</label>
                    <select name="nbHeure" class="form-control" id="nbHeure">
                        <option value="100">100</option>
                        <option value="90">90</option>
                        <option value="80" selected>80</option>
                        <option value="70">70</option>
                        <option value="60">60</option>
                        <option value="50">50</option>
                        <option value="40">40</option>
                        <option value="30">30</option>
                        <option value="20">20</option>
                        <option value="10">10</option>
                        <option value="0">0</option>
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

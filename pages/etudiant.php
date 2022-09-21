<?php
require_once('identifier.php');

require_once("connexiondb.php");

$nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
$idfiliere=isset($_GET['idconvention'])?$_GET['idconvention']:0;

$size=isset($_GET['size'])?$_GET['size']:5;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

$requeteConvention="select * from convention";

if($idconvention==0){
    $requeteEtudiant="select idEtudiant,nom,prenom,mail
                from convention as c,etudiant as e
                where c.idConvention=e.idEtudiant
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                order by idEtudiant
                limit $size
                offset $offset";

    $requeteCount="select count(*) countE from etudiant
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
}else{
    $requeteEtudiant="select idEtudiant,nom,prenom,mail
                from convention as c,etudiant as e
                where c.idCenvention=e.idConvention
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and c.idConvention=$idconvention
                 order by idEtudiant
                limit $size
                offset $offset";

    $requeteCount="select count(*) countE from etudiant
                where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idConvention=$idconvention";
}

$resultatConvention=$pdo->query($requeteConvention);
$resultatEtuidant=$pdo->query($requeteEtudiant);
$resultatCount=$pdo->query($requeteCount);

$tabCount=$resultatCount->fetch();
$nbrStagiaire=$tabCount['countE'];
$reste=$nbrEtudiant % $size;
if($reste===0)
    $nbrPage=$nbrEtudiant/$size;
else
    $nbrPage=floor($nbrEtudiant/$size)+1;
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Test Technique</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php require("menu.php"); ?>

<div class="container">
    <div class="panel panel-success margetop60">

        <div class="panel-heading">Rechercher des étudiants</div>

        <div class="panel-body">
            <form method="get" action="etudiant.php" class="form-inline">
                <div class="form-group">

                    <input type="text" name="nomPrenom"
                           placeholder="Nom et prénom"
                           class="form-control"
                           value="<?php echo $nomPrenom ?>"/>
                </div>
                <label for="idconvention">Convention:</label>

                <select name="idconvention" class="form-control" id="idconvention"
                        onchange="this.form.submit()">

                    <option value=0>Toutes les convention</option>

                    <?php while ($convention=$resultatConvention->fetch()) { ?>

                        <option value="<?php echo $convention['idConvention'] ?>"

                            <?php if($convention['idConvention']===$idconvention) echo "selected" ?>>

                            <?php echo $convention['mail'] ?>

                        </option>

                    <?php } ?>

                </select>

                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                    Chercher...
                </button>

                &nbsp;&nbsp;
                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>

                    <a href="nouveauEtudiant.php">

                        <span class="glyphicon glyphicon-plus"></span>
                        Nouveau Etudiant

                    </a>

                <?php }?>
            </form>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Liste des Etudiants (<?php echo $nbrEtudiant ?> Etudiants)</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id Etudiant</th> <th>Nom</th> <th>Prénom</th>
                    <th>Convention</th>
                    <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                        <th>Actions</th>
                    <?php }?>
                </tr>
                </thead>

                <tbody>
                <?php while($etudiant=$resultatEtudiant->fetch()){ ?>
                    <tr>
                        <td><?php echo $etudiant['idEtudiant'] ?> </td>
                        <td><?php echo $etudiant['nom'] ?> </td>
                        <td><?php echo $etudiant['prenom'] ?> </td>
                        <td><?php echo $etudiant['mail'] ?> </td>

                        <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                            <td>
                                <a href="editerEtudiant.php?idS=<?php echo $etudiant['idEtudiant'] ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Etes vous sur de vouloir supprimer le etudiant')"
                                   href="supprimerEtudiant.php?idS=<?php echo $etudiant['idEtudiant'] ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        <?php }?>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div>
                <ul class="pagination">
                    <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                        <li class="<?php if($i==$page) echo 'active' ?>">
                            <a href="etudiants.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idconvention=<?php echo $idconvention ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</HTML>

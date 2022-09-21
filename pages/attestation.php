<?php
require_once('role.php');
require_once("connexiondb.php");
$login=isset($_GET['login'])?$_GET['login']:"";

$size=isset($_GET['size'])?$_GET['size']:3;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

$requeteAttestation="select * from attestation where login like '%$login%'";
$requeteCount="select count(*) countE from attestation";

$resultatAttestation=$pdo->query($requeteAttestation);
$resultatCount=$pdo->query($requeteCount);

$tabCount=$resultatCount->fetch();
$nbrAttestation=$tabCount['countAttestation'];
$reste=$nbrAttestation % $size;
if($reste===0)
    $nbrPage=$nbrAttestation/$size;
else
    $nbrPage=floor($nbrAttestation/$size)+1;
?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Gestion des attestations</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">
    <div class="panel panel-success margetop60">
        <div class="panel-heading">Rechercher des attestations</div>
        <div class="panel-body">
            <form method="get" action="attestation.php" class="form-inline">
                <div class="form-group">
                    <input type="text" name="attestation"
                           placeholder="Attestation"
                           class="form-control"
                           value="<?php echo $login ?>"/>
                </div>
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                    Chercher...
                </button>
            </form>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Liste des attestations (<?php echo $nbrAttestation ?> attestations)</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>nom</th> <th>idConvention</th> <th>message</th>
                </tr>
                </thead>

                <tbody>
                <?php while($user=$resultatAttestation->fetch()){ ?>
                    <tr class="<?php echo $attestation['etat']==1?'success':'danger'?>">
                        <td><?php echo $attestation['nom'] ?> </td>
                        <td><?php echo $attestation['idConvention'] ?> </td>
                        <td><?php echo $attestation['message'] ?> </td>
                        <td>
                            <a href="editerAttestation.php?idAttestation=<?php echo $attestation['idattestation'] ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            &nbsp;&nbsp;
                            <a onclick="return confirm('Etes vous sûre de vouloir supprimer cette attestation ?')"
                               href="supprimerAttestation.php?idAttestation=<?php echo $attestation['idattestation'] ?>">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            &nbsp;&nbsp;
                            <a href="activerAttestation.php?idAttestation=<?php echo $attestation['idattestation'] ?>&etat=<?php echo $attestation['etat']  ?>">
                                <?php
                                if($user['etat']==1)
                                    echo '<span class="glyphicon glyphicon-remove"></span>';
                                else
                                    echo '<span class="glyphicon glyphicon-ok"></span>';
                                ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div>
                <ul class="pagination">
                    <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                        <li class="<?php if($i==$page) echo 'active' ?>">
                            <a href="Attestation.php?page=<?php echo $i;?>&login=<?php echo $login ?>">
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

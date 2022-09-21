<?php
require_once('identifier.php');
require_once("connexiondb.php");

/*
if(isset($_GET['nomC']))
    $nomc=$_GET['nomC'];
else
    $nomc="";
*/

$nom=isset($_GET['nom'])?$_GET['nom']:"";
$nbHeure=isset($_GET['nbHeure'])?$_GET['nbHeure']:"all";

$size=isset($_GET['size'])?$_GET['size']:6;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

if($niveau=="all"){
    $requete="select * from convention
                where nom like '%$nom%'
                limit $size
                offset $offset";

    $requeteCount="select count(*) countC from convention
                where nom like '%$nom%'";
}else{
    $requete="select * from convention
                where nomFiliere like '%$nom%'
                and niveau='$niveau'
                limit $size
                offset $offset";

    $requeteCount="select count(*) countC from convention
                where nomConvention like '%$nom%'
                and niveau='$niveau'";
}

$resultatC=$pdo->query($requete);

$resultatCount=$pdo->query($requeteCount);
$tabCount=$resultatCount->fetch();
$nbrConvention=$tabCount['countC'];
$reste=$nbrConvention % $size;   // % operateur modulo: le reste de la division
//euclidienne de $nbrConvention par $size
if($reste===0) //$nbrConvention est un multiple de $size
    $nbrPage=$nbrConvention/$size;
else
    $nbrPage=floor($nbrConvention/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Gestion des conventions</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php"); ?>

<div class="container">
    <div class="panel panel-success margetop60">

        <div class="panel-heading">Rechercher des conventions</div>
        <div class="panel-body">

            <form method="get" action="convention.php" class="form-inline">

                <div class="form-group">

                    <input type="text" name="nom"
                           placeholder="Convention"
                           class="form-control"
                           value="<?php echo $nom ?>"/>

                </div>

                <label for="nbHeure">Nombre d'Heure :</label>
                <select name="nbHeure" class="form-control" id="nbHeure"
                        onchange="this.form.submit()">
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

                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                    Chercher...
                </button>

                &nbsp;&nbsp;

                <?php if ($_SESSION['user']['role']=='ADMIN') {?>

                    <a href="nouvelleConvention.php">

                        <span class="glyphicon glyphicon-plus"></span>

                        Nouvelle Convention

                    </a>

                <?php } ?>

            </form>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Liste des conventions (<?php echo $nbrConvention ?> Conventions)</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id convention</th><th>Nom </th><th>Nbrheure</th>
                    <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                        <th>Actions</th>
                    <?php }?>
                </tr>
                </thead>

                <tbody>
                <?php while($filiere=$resultatC->fetch()){ ?>
                    <tr>
                        <td><?php echo $convention['idConvention'] ?> </td>
                        <td><?php echo $filiere['nomFiliere'] ?> </td>
                        <td><?php echo $filiere['niveau'] ?> </td>

                        <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                            <td>
                                <a href="editerConvention.php?idF=<?php echo $convention['idConvention'] ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Etes vous sur de vouloir supprimer cette convention ?')"
                                   href="supprimerConvention.php?idF=<?php echo $convention['idConvention'] ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        <?php }?>

                    </tr>
                <?PHP } ?>
                </tbody>
            </table>
            <div>
                <ul class="pagination">
                    <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                        <li class="<?php if($i==$page) echo 'active' ?>">
                            <a href="convention.php?page=<?php echo $i;?>&nom=<?php echo $nom ?>&nbHeure=<?php echo $nbrHeure ?>">
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

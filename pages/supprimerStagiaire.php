<?php
        session_start();
        if(isset($_SESSION['user']) ){
            
            if($_SESSION['user']{
               
                require_once('connexiondb.php');
                
                $idS=isset($_GET['idE'])?$_GET['idE']:0;

                $requete="delete from etudiant where idEtudiant=?";
                
                $params=array($idS);
                
                $resultat=$pdo->prepare($requete);
                
                $resultat->execute($params);
                
                header('location:etudiant.php');
                
            }else{
                $message="Vous n'avez pas le privilège de supprimer un etudiant!!!";
                
                $url='etudiant.php';
                
                header("location:alerte.php?message=$message&url=$url"); 
            }
           
        }else {
                header('location:login.php');
        }
?>

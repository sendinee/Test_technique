# Test_technique

----------------------

#Exercice libre pour candidat

##Objectif
Créer une application qui répond à un besoin précis avec un temps limité.

##Besoin
L'entreprise FormationPlus à besoin de faciliter l'envoie d'attestations à leurs élèves.
Pour le moment un POC est demandé, il s'agira de faire un formulaire qui a pour objectif d'insérer une attestation en base de données.
Un schéma de base de données à déjà été réalisé par FormationPlus il est imposé.

Les tables Etudiant et Convention doivent être remplies avec des données fictives.
  * Un étudiant a une convention.
  * Une convention est liée à un ou plusieurs étudiants.
  * Une attestation est liée à un étudiant et une convention.
  
Le formulaire doit comprendre trois champs : 
  * Au choix : un select avec la liste des étudiants / Un champ text auto complémentation
  * un champ text non modifiable qui contient le nom convention liée à l'étudiant
  * Un champ TextAera qui contient un texte généré avec les informations sélectionnées avant. (correspond au champ message)
  
##Le texte à généré : 
"Bonjour #NOM_ETUDIANT# #PRENOM_ETUDIANT#,

Vous avez suivi #nbHeur# de formation chez FormationPlus.
Pouvez-vous nous retourner ce mail avec la pièce jointe signée.

Cordialement,
FormationPlus" 

Le message une fois généré doit être modifiable à souhait.
Enfin, il faut un bouton pour réaliser une insertion en base de données.


##Contrainte 
Tous les langages sont autorisés.
Tous les frameworks sont autorisés.
Tous les SGDB sont autorisés.
Interdiction d'utiliser un CMS.
Le code et un dump de la base de données doivent être versionnés sur github ou gitlab.
Un fichier readme.md doit être disponible à la racine du projet, il doit détailler la procédure à suivre pour installer et lancer le projet.


##Bonus
* L'application dispose d'un Dockerfile, il est possible de lancer l'application via Docker (lancement via docker run ou docker￾compose)
* Des tests unitaires/fonctionnels sont disponibles
* Une API REST est disponible pour accéder aux données présentes dans la base de données
* Une documentation dynamique (swagger) est en place pour tester l'api


##Dépôt
Le dépôt doit être effectué sur github ou gitlab, une fois le lien fournis il doit être possible de git clone le projet  

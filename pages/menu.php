<?php
    //require_once('identifier.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="../index.php" class="navbar-brand">Test Technique</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="etudiant.php">
                    <i class="fa fa-users"></i>
                    &nbsp Les Etudiants
                </a>
            </li>
			
			<li><a href="convention.php">
                    <i class="fa fa-tags"></i>
                    &nbsp Les Conventions
                </a>
            </li>
					
            <li><a href="attestation.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Les Attestations
                </a>
            </li>

		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerAttestation.php?id=<?php echo $_SESSION['attestation']['idattestation'] ?>">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['attestation']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="fa fa-sign-out"></i>
					&nbsp Se Déconnecter
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>

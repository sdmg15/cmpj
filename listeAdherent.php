<?php 
include_once("C:\wamp\www\CMPJ\Vendors\Entity\adherent.php");
include_once("C:\wamp\www\CMPJ\Controleurs\HTTPRequest.php");
include_once("C:\wamp\www\CMPJ\Controleurs\HTTPResponse.php");
include_once("C:\wamp\www\CMPJ\Model\AdherentManagerPDO.php");
include_once("C:\wamp\www\CMPJ\Model\PDOFactory.php");

$manager = new AdherentManagerPDO(PDOFactory::getPdoInstance());
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulaire d'inscription CMPJ MAYO-LOUTI</title>
		<meta charset="utf-8" content="text/html">
		<link rel="stylesheet" href="css/Envision.css" >
	</head>
	<body>
		<div id="wrap">	
			<header>
				<h1><a href="./">FICHE D'INSCRIPTION  </a></h1>
				 <p>CMPJ du Mayo-louti</p>
				
			</header>
				<nav>
					<ul>
						<li>
			  <?php 
					 $liens = [
			             'Accueil' => 'bootstrap.php',
			             'Liste des adhérents' => 'listeAdherent.php',
		                      ];
                foreach ($liens as $k => $v)
				{
			       if($_SERVER['REQUEST_URI'] == $k)
				   {
					   echo '<a href="'.$v.'" class="active">'.$k.'</a>';
				   }
				   else 
				   {
					   echo '<a href="'.$v.'">'.$k.' </a>';
				   }
		         }
			  ?>
			 </ul>
			</nav>
				<div id="content-wrap"> 
					
					
					<?php 
						if(isset($_GET['id']))
					   {
						if(!$manager->Exists((int) $_GET['id']))
						{
							echo '<p class="prev"><a href="listeAdherent.php" id="prev-btn" data-tip="<--"> Retour à la liste des adhérents</a></p>';
							echo $message = ' <p class="error">L\'adhérent spécifié n\'est pas inscrit ou à été supprimé.</p>';
						}
						else 
						{
							echo '<p class="prev"><a href="listeAdherent.php" id="prev-btn" data-tip="<--"> Retour à la liste des adhérents</a></p>';
							$un = $manager->getUnique((int) $_GET['id']);
							echo '<h2 style="text-align: center; margin-top: 20px;">Informations sur l\'adhérent <b><small>'.$un->getNom().' '.$un->getPrenom().'</small></b></h2>';
							
						?>  
								   <table id="unique">  
								     <tr>
										<th>Nom</th>
										<td><?=$un->getNom()?></td>
									</tr>
									<tr>
										<th>Prénom</th>
										<td><?= $un->getPrenom()?></td>
									</tr>
									<tr>
										<th>sexe</th>
										<td><?=$un->getSexe()?></td>
									</tr>
									<tr>
										<th>Date inscription </th>
										<td><?=$un->getDateInscription()->format('d/m/Y')?></td>
									</tr>
									<tr>
										<th>Date de naissance </th>
										<td><?=$un->getDateNaissance()->format('d/m/Y')?></td>
									</tr>
									<tr>
										<th>lieu</th>
										<td><?=$un->getLieu()?></td>
									</tr>
									<tr>
										<th>Region originaire</th>
										<td><?=$un->getRegion()?></td>
									</tr>
									<tr>
										<th>Département</th>
										<td><?=$un->getDepart()?></td>
									</tr>
									<tr>
										<th>ethnie</th>
										<td><?=$un->getEthnie()?></td>
									</tr>
									<tr>
										<th>Nationalité</th>
										<td><?=$un->getNationalite()?></td>
									</tr>
									<tr>
										<th>Profession mère/père/parrain</th>
										<td><?=$un->getProf()?></td>
									</tr>
									<tr>
										<th>situation matrimoniale </th>
										<td><?=$un->getSituation()?></td>
									</tr>
									<tr>
										<th>lieu de résidence</th>
										<td><?=$un->getLieu()?></td>
									</tr>
									<tr>
										<th>Adresse</th>
										<td><?= $un->getAddr()?></td>
									</tr>
									<tr>
										<th>TEL</th>
										<td><?=($un->getTelperso() == ' ')?'-------- ': $un->getTelperso();?></td>
									</tr>
									<tr>
										<th>Sos TEL</th>
										<td><?=empty($un->getSosTel())? '-----': $un->getSosTel()?></td>
									</tr>
									<tr>
										<th>Sos nom</th>
										<td><?=$un->getSosName()?></td>
									</tr>
									<tr>
										<th>diplome le plus Elévé</th>
										<td><?=$un->getDiplome()?></td>
									</tr>
									<tr>
										<th>Date et lieu d'obtention</th>
										<td><?= empty($un->getPlace())? '<em><small>undefined</small><em>': $un->getPlace()?></td>
									</tr>
									<tr>
										<th>Langue parler</th>
										<td><?=$un->getLang()?>
									</tr>
									<tr>
										<th>Filière</th>
										<td><?=$un->getFiliere()?>
									</tr>
						</table>
						<p class="prev"><a id="prev-btn" href="modifier.php?modifier=<?php echo isset($_GET['id'])? (int) $_GET['id']:'';?>">Modifier ses informations</a></p>
						<?php 
						}						 
					  }
					else 
					{
					 echo '<h2 style="text-align: center">LISTE DE TOUS LES ADHERENTS</h2>';
						$listeAdherent = $manager->getList();
						if(empty($listeAdherent))
						{
							echo '<p class="flash"> Pas d\'adhérents inscrit pour le moment.</p>';
						}
						else 
						{
					?>
				          <table>  
						     
							  <tr><th>Nom</th><th>Prénom</th><th>sexe</th><th>Date inscription </th><th>Date de naissance </th><th>lieu</th><th></th></tr>
					<?php 
					foreach($listeAdherent as $un)
					{
						echo '<tr><td>'.$un->getNom().'</td><td>'.$un->getPrenom().'</td><td>'.$un->getSexe().'</td><td>'.$un->getDateInscription()->format('d/m/Y').'</td><td>'.$un->getDateNaissance()->format('d/m/Y').'</td><td>'.$un->getLieu().'</td><td><a href="?id='.$un->getId().'">Plus....</td></tr>';
						
					}
						}
					}
						?>
						</table>
			</div>
				<footer>
						<p>
						 <b class="align-left">© CMPJ MAYO-LOUTI <?= date('Y')?></b><br>
						<em>Chef centre : <b>M.GODWE DJONDANDI</b><br></em>
						<span class="powered"><small>Enhanced by Sonkeng Donfack Maldini<a href="mailto:sonkengmaldini@gmail.com">  sonkengmaldini@gmail.com <br></small></span>
					</p>
				</footer>
		</div>
	</body>
</html>

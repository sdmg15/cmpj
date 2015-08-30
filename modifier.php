<?php
include_once("C:\wamp\www\CMPJ\Vendors\Entity\adherent.php");
include_once("C:\wamp\www\CMPJ\Controleurs\HTTPRequest.php");
include_once("C:\wamp\www\CMPJ\Controleurs\HTTPResponse.php");
include_once("C:\wamp\www\CMPJ\Model\AdherentManagerPDO.php");
include_once("C:\wamp\www\CMPJ\Model\PDOFactory.php");


$request = new HTTPRequest;

$manager = new AdherentManagerPDO(PDOFactory::getPdoInstance());
if(isset($_GET['modifier']))
{
	
	if(!$manager->Exists((int) $_GET['modifier']))
	{
		$message = 'NOT FOUND.';
	}
	else
	{
		$adherent = $manager->getUnique((int) $_GET['modifier']);
	}
}

if($request->postExists('nom'))
{
	//on hydrate les  données 
	
	$adherent = new Adherent([ 
	'nom' => $request->postData('nom'),
	'prenom' => $request->postData('prenom'),
	'dateNaissance' => $request->postData('date'),
	'lieu' => $request->postData('lieuNaissance'),
	'sexe' => $request->postData('sexe'),
	'region'=> $request->postData('region'),
	'departement' => $request->postData('departement'),
	'ethnie' => $request->postData('ethnie'),
	'nationalite' => $request->postData('nationalite'),
	'profession_mere_parrain' => $request->postData('profession'),
	'situationMatrimoniale' => $request->postData('situation'),
	'lieuResidence' => $request->postData('lieuResidence'),
	'adresse' => $request->postData('addr'),
	'telPerso' => $request->postData('telPerso'), 
    'sosTel' => $request->postData('sosTel'),
    'sosName' => $request->postData('sosName'), //champ à ajouter en BD
    'diplomeEleve' => $request->postData('diplome'),
	'dateObtentionPlace' => $request->postData('dateObtention'),
	'speakLanguage' => $request->postData('speakLanguage'),
	'filiere' => $request->postData('option')]);
	
	$adherent->setId((int) $_GET['modifier']);
	if($adherent->isvalid())
	{
		$manager->update($adherent);
		$message = 'Informations bien modifiées ';
	}
else 
{
	$erreurs = $adherent->getErreurs();
}	

}

	
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
			  <a href=bootstrap.php>Accueil</a><a href=listeAdherent.php>Liste des adhérents </a>			 </ul>
			</nav>
				<div id="content-wrap">
				 <p id="number"> Modification des informationss de l'adhérent </p>
				 <p class="flash"><?= (isset($message))? $message:' '?></p>
				 <!-- here is the form -->
					<?php include_once('FormSet.php')?>
				</div>
			
				<footer>
					<p>
						 <b class="align-left">© CMPJ MAYO-LOUTI 2015</b><br>
						<em>Chef centre : <b>M.GODWE DJONDANDI</b><br>
						<span class="powered"><small>Enhanced by Sonkeng Donfack Maldini<br><a href="mailto:sonkengmaldini@gmail.com">sonkengmaldini@gmail.com</small></span>
					</p>
				</footer>
		</div>
		
	</body>
</html>
		

 
				<form method="post" action="">
						<label name="nom">Nom: </label>
							<?php if(isset($erreurs) && in_array(Adherent::NOM_INVALIDE,$erreurs)) echo '<span class="error"> Nom invalide</span>';?>							
							<input type="text" name="nom" id="nom" value="<?= isset($adherent)? $adherent->getNom(): ' '?>"><br>
						<label>Prénom: </label>
							<?php if(isset($erreurs) && in_array(Adherent::PRENOM_INVALIDE,$erreurs)) echo '<span class="error"> Prenom invalide</span>';?>	
							<input type="text" name="prenom" value="<?=isset($adherent)? $adherent->getPrenom(): ' '?>"><br>
						<label>Date Naissance: </label>
							<?php if(isset($erreurs) && in_array(Adherent::DATE_NAISSANCE_INVALIDE,$erreurs)) echo '<span class="error">Date de naissance invalide</span>';?>							 
							 <input type="text" name="date" placeholder="format AAAA-MM-JJ" value="<?php if(isset($adherent) && is_string($adherent->getDateNaissance())) { $date = new Datetime($adherent->getDateNaissance());echo $date->format('Y-m-d');} else  {echo $adherent->getDateNaissance()->format('Y-m-d');}?>"><br>	 
						<label >Lieu de naissace: </label>
							<?php if(isset($erreurs) && in_array(Adherent::LIEU_INVALIDE,$erreurs)) echo '<span class="error"> Lieu de naissance invalide</span>';?>
							
							<input type="text" name="lieuNaissance" value="<?=isset($adherent)? $adherent->getLieu():' '?>">
							
						<label id="sexe">Sexe: </label> <input type="radio" name="sexe" id="sexe" value="M" checked="checked">M, <input type="radio" name="sexe" id="sexe" value="F">F<br>
						<label >Région d'origine: </label>
							<?php if(isset($erreurs) && in_array(Adherent::REGION_INVALIDE,$erreurs)) echo '<span class="error"> région d\'origine invalide</span>';?>							
							<input type="text" name="region" value="<?=isset($adherent)? $adherent->getRegion(): ' '?>">
						<label>Département: </label>
							<?php if(isset($erreurs) && in_array(Adherent::DEPARTEMENT_INVALIDE,$erreurs)) echo '<span class="error">Département invalide</span>';?>
							<input type="text" name="departement" value="<?=isset($adherent)?$adherent->getDepart():' '?>">
						<label >Ethnie: </label>
							<?php if(isset($erreurs) && in_array(Adherent::ETHNIE_INVALIDE,$erreurs)) echo'<span class="error"> Ethnie inavlide</span>';?>
							<input type="text" name="ethnie" value="<?= isset($adherent)?$adherent->getEthnie(): ' '?>">
						<label >Nationalité </label>
							<?php if(isset($erreurs) && in_array(Adherent::NATIONALITE_INVALIDE,$erreurs)) echo '<span class="error"> Nationalité invalide </span>';?>
							<input type="text" name="nationalite" value="<?=isset($adherent)? $adherent->getNationalite(): ' '?>">
						<label>Profession du père/Mère ou Parrain</label>
							<?php if(isset($erreurs) && in_array(Adherent::PROF_INVALIDE,$erreurs)) echo '<span class="error"> Profession invalide</span>'?>
							<input type="text" name="profession" value="<?=isset($adherent)? $adherent->getProf(): ' '?>">
						<label>Situation Matrimoniale:</label> 
							<span> <input type="radio" name="situation" value="mariée"> Marié(e), <input type="radio" name="situation" value="celibataire" checked="checked">Célibataire, <input type="radio" name="situation" value="Divorcé(e)">Divorcé(e), Veuf(ve)<input type="radio" name="situation" value="veuf(ve)"><br></span>
						<label >Lieu de résidence</label>
							<?php if(isset($erreurs) && in_array(Adherent::LIEU_INVALIDE,$erreurs)) echo '<span class="error"> Lieu de résidence invalide</span>';?>
							<input type="text" name="lieuResidence" value="<?=isset($adherent)?$adherent->getLieuR(): ''?>">
						<label >Adresse complète: </label>
							<input type="text" name="addr" value="<?=isset($adherent)?$adherent->getAddr():' '?>">
						<label id="tel">TEL:</label>
							<input type="text" name="telPerso" value="<?= isset($adherent)? $adherent->getTelperso(): ' '?>"><!-- champ à ajouter en BD --> 
						<label>Personne à contacter en cas de necessité:</label>
							<input type="text" name="sosName" placeholder="Nom " value="<?=isset($adherent)?  $adherent->getSosName():' '?>"> TEL: <input type="text" name="sosTel" placeholder="TEL" value="<?=isset($adherent)? $adherent->getSosTel(): ' '?>">
						<label>Diplôme le plus élevé: </label>
							<?php if(isset($erreurs) && in_array(Adherent::DIPLOME_INVALIDE,$erreurs)) echo'<span class="error">Diplôme invalide</span>';?>							
							<input type="text" name="diplome" value="<?=isset($adherent)? $adherent->getDiplome(): ' '?>">
							
						<label>Date et lieu d'obtention: </label>
							<input type="text" name="dateObtention" value="<?=isset($adherent)? $adherent->getPlace(): ' '?>">
						<label >Langue parler: </label>
							<span><input type="radio" name="speakLanguage" value="fr" checked="checked">Français, <input type="radio" name="speakLanguage" value="Anglais">Anglais, <input type="radio" name="speakLanguage" value="Anglais et Français">Anglais et Français. 
						<label>Option choisie pour la formation au cmpj: </label>
							<input type="radio" name="option" value="Arts Ménagers" checked="checked">Arts Ménagers, <input type="radio" name="option" value="sécrétariat bureautique">Sécrétariat bureautique<br><br>

								<input type="submit" value="modifier les informations">
					</form>	


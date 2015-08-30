<?php 


class AdherentManagerPDO
{
	protected $base;
	public function __construct(PDO $base)
	{
		$this->base = $base;
	}
	public function getList()
	{
		$q = $this->base->query("SELECT * FROM adherents WHERE  nom NOT IN(' ',' ') ORDER BY nom,sexe");
		$q->setFetchMode(PDO::FETCH_CLASS,'Adherent');
		$listeAdherent = $q->fetchAll();
		foreach($listeAdherent as $data)
		{
			$data->setDateInscription(new DateTime($data->getDateInscription()), new DateTimezone('Africa/douala'));
			$data->setDateNaissance(new DateTime($data->getDateNaissance()));
		}
		$q->closeCursor();
		return $listeAdherent;
	}
	
	public function getUnique($info)
	{
		$q = $this->base->prepare('SELECT * FROM adherents WHERE id=:id');
		$q->bindValue(':id',$info,PDO::PARAM_INT);
		$q->execute();
		
		$q->setFetchMode(PDO::FETCH_CLASS,'Adherent');
		$data = $q->fetch();
		$data->setDateInscription(new DateTime($data->getDateInscription()), new DateTimezone('Africa/douala'));
		$data->setDateNaissance(new DateTime($data->getDateNaissance()), new DateTimezone('Africa/douala'));
		return $data;
	}
	
	public function count()
	{
		return $this->base->query("SELECT  COUNT(*) FROM adherents WHERE nom NOT IN(' ',' ')")->fetchColumn();
	}
	
	public function add(Adherent $data)
	{
		$q= $this->base->prepare('INSERT INTO adherents SET nom=:nom,prenom =:prenom,dateNaissance=:dn,lieu=:lieu,sexe=:sexe,region=:region,departement=:departement,ethnie=:ethnie,nationalite=:nat,profession_mere_parrain = :profession_mere_parrain,situationMatrimoniale=:situationMatrimoniale,lieuResidence=:lieuResidence,adresse=:adresse,telperso=:telperso,sosTel=:sosTel,sosName=:sosName,diplomeEleve=:diplomeEleve,dateAndObtentionPlace=:dateAndObtentionPlace,speakLanguage=:speakLanguage,filiere=:filiere,dateInscription=NOW()');
		$q->execute([
		'nom' => $data->getNom(),
		'prenom' => $data->getPrenom(),
		'dn' => $data->getDateNaissance(),
		'lieu' => $data->getLieu(),
		'sexe' => $data->getSexe(),
		'region' => $data->getRegion(),
		'departement' => $data->getDepart(),
		'ethnie' => $data->getEthnie(),
		'nat' => $data->getNationalite(),
		'profession_mere_parrain' => $data->getProf(),
		'situationMatrimoniale' => $data->getSituation(),
		'lieuResidence' => $data->getLieuR(),
		'adresse' => $data->getAddr(),
		'telperso' => $data->getTelperso(),
		'sosTel' => $data->getSosTel(),
		'sosName' => $data->getSosName(),
		'diplomeEleve' => $data->getDiplome(),
		'dateAndObtentionPlace' => $data->getPlace(),
		'speakLanguage' => $data->getLang(),
		'filiere' => $data->getFiliere()
		]);
		
	}
	
	public function update(Adherent $data)
	{
			$q= $this->base->prepare('UPDATE adherents SET nom=:nom,prenom=:prenom,dateNaissance=:dn,lieu=:lieu,sexe=:sexe,region=:region,departement=:departement,ethnie=:ethnie,nationalite=:nat,profession_mere_parrain=:profession_mere_parrain,situationMatrimoniale=:situationMatrimoniale,lieuResidence=:lieuResidence,adresse=:adresse,telperso=:telperso,sosTel=:sosTel,sosName=:sosName,diplomeEleve=:diplomeEleve,dateAndObtentionPlace=:dateAndObtentionPlace,speakLanguage=:speakLanguage,filiere=:filiere WHERE id=:id');
		$q->execute(array(
		'nom' => $data->getNom(),
		'prenom' => $data->getPrenom(),
		'dn' => $data->getDateNaissance(),
		'lieu' => $data->getLieu(),
		'sexe' => $data->getSexe(),
		'region' => $data->getRegion(),
		'departement' => $data->getDepart(),
		'ethnie' => $data->getEthnie(),
		'nat' => $data->getNationalite(),
		'profession_mere_parrain' => $data->getProf(),
		'situationMatrimoniale' => $data->getSituation(),
		'lieuResidence' => $data->getLieuR(),
		'adresse' => $data->getAddr(),
		'telperso' => $data->getTelperso(),
		'sosTel' => $data->getSosTel(),
		'sosName' => $data->getSosName(),
		'diplomeEleve' => $data->getDiplome(),
		'dateAndObtentionPlace' => $data->getPlace(),
		'speakLanguage' => $data->getLang(),
		'filiere' => $data->getFiliere(),
		'id' => $data->getId()
		));
	}
	
	public function save(Adherent $data)
	{
		if($data->isValid())
		{
		 $this->add($data);
		}
		else 
		{
			throw new RunTimeException('an adherent must be valid to be registerd, please check data and pull request again.');
		}
	}
	
 public function Exists($id)
 {
	 return (bool) $this->base->query('SELECT * FROM adherents WHERE id='.(int)$id)->fetchColumn();
 }
 
}
































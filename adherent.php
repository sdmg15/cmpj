<?php
class Adherent 
{
	protected $id,
	          $nom,
			  $prenom,
			  $dateNaissance,
			  $lieu,
			  $sexe,
			  $region,
			  $departement,
			  $ethnie,
			  $nationalite,
			  $profession_mere_parrain,
			  $situationMatrimoniale,
			  $lieuResidence,
			  $adresse,
			  $telperso,
			  $sosTel,
			  $sosName,
			  $diplomeEleve,
			  $dateAndObtentionPlace,
			  $speakLanguage,
			  $filiere,
			  $erreurs = [],
			  $dateInscription;
			  
	const NOM_INVALIDE = 1,
		  PRENOM_INVALIDE = 2,
		  DATE_NAISSANCE_INVALIDE= 3,
		  LIEU_INVALIDE = 4,
		  REGION_INVALIDE= 5,
		  DEPARTEMENT_INVALIDE= 6,
		  ETHNIE_INVALIDE = 7,
		  NATIONALITE_INVALIDE = 8,
		  PROF_INVALIDE = 9,
		  DIPLOME_INVALIDE=10,
		  TEL_INVALIDE = 11,
		  SEXE_INVALIDE =12,
		  LANGUE_INVALIDE = 13;
			  
	
	public function __construct(array $data = [])
	{
		if(is_array($data))
		{
		 $this->hydrater($data);
		}
		else 
		{
			throw new InvalideArgumentExceptio('Les données passées au constructeurs doivent corrects.');
		}
	}
	
	public function hydrater(array $adh)
	{
		foreach($adh as $cle => $value)
		{
			$methode = 'set'.ucfirst($cle);
			if(is_callable([$this,$methode]))
			{
				$this->$methode($value);
			}
		}
	}
	
	//merde les setters de cette putain classe seront longs............................
	
	public function setId($id)
	{
		$this->id = (int) $id;
	}
	
	public function setNom($nom)
	{
		if(!is_string($nom) || empty($nom))
		{
			$this->erreurs[] = self::NOM_INVALIDE;
		}
		else 
		{
			$this->nom = $nom;
		}
	}
	
	public function setPrenom($nomp)
	{
		if(!is_string($nomp) || empty($nomp))
		{
			$this->erreurs[] = self::PRENOM_INVALIDE;
		}
		$this->prenom = $nomp;
	}
	
	public function setDateNaissance($date)
	{
		if(!is_string($date) || empty($date))
		{
			$this->erreurs[] = self::DATE_NAISSANCE_INVALIDE;
		}
		
		$this->dateNaissance = $date;
	}
	
	public function setLieu($li)
	{
		if(!is_string($li) || empty($li))
		{
			$this->erreurs[] = self::LIEU_INVALIDE;
		}
		$this->lieu = $li;
		
	}
	
	public function setSexe($sexe)
	{
		if(!is_string($sexe) || empty($sexe))
		{
			$this->erreurs[] = self::SEXE_INVALIDE;
		}
		
		$this->sexe = $sexe;
	}
	
	public function setRegion($reg)
	{
		if(!is_string($reg) || empty($reg))
		{
			$this->erreurs[] = self::REGION_INVALIDE;
		}
		$this->region = $reg;
	}
	
	public function setDepartement($dep)
	{
		if(!is_string($dep) || empty($dep))
		{
			$this->erreurs[] = self::DEPARTEMENT_INVALIDE;
		}
		
		$this->departement = $dep;
	}
	  
	 public function setEthnie($eth)
	 {
		 if(empty($eth))
		 {
			 $this->erreurs[] = self::ETHNIE_INVALIDE;
		 }
		 $this->ethnie = $eth;
	 }	 
	 
	 public function setNationalite($nat)
	 {
		 if(empty($nat) || !is_string($nat))
		 {
			 $this->erreurs[] = self::NATIONALITE_INVALIDE;
		 }
		 $this->nationalite = $nat;
	 }
	 
	 public function setProfession_mere_parrain($prof)
	 {
		 if(!empty($prof))
		 {
			 $this->profession_mere_parrain = $prof;
		 }
		 else 
		 {
			 $this->erreurs[] = self::PROF_INVALIDE;
		 }
	 }
	 
	 public function setSituationMatrimoniale($sit)
	 {
		 if(is_string($sit))
		 {
			 $this->situationMatrimoniale = $sit;
		 }
	 }
	 
	 public function setLieuResidence($place)
	 {
		 if(is_string($place) || !empty($place))
		 {
			 $this->lieuResidence = $place;
		 }
		 else 
		 {
			 $this->erreurs[] = self::LIEU_INVALIDE;
		 }
	 }
	 
	 public function setAdresse($add)
	 {
		 if(is_string($add))
		 {
			 $this->adresse = $add;
		 }
	 }
	 
	 public function setTelperso($tel)
	 {
		 $this->telperso  = $tel;
	 }
	 
	 public function setSosTel($sos)
	 {
		 $this->sosTel = $sos;
	 }
	 
	 public function setSosName($nom)
	 {
		 if(!is_string($nom) || empty($nom))
		 {
			 $this->erreurs[] = ' sos nom invalide ';
		 }
		 $this->sosName = $nom;

	 }
	 
	 public function setDiplomeEleve($dip)
	 {
		 if(!is_string($dip) || empty($dip))
		 {
			 $this->erreurs[] = self::DIPLOME_INVALIDE;
		 }
		 $this->diplomeEleve = $dip;
	 }
	 
	 public function setDateAndObtentionPlace($place)
	 {
		 $this->dateAndObtentionPlace = $place;
	 }
	 
	 public function setSpeakLanguage($lang)
	 {
		 if(empty($lang)  || !is_string($lang))
		 {
			 $this->erreurs[] = self::LANGUE_INVALIDE;
		 }
		 $this->speakLanguage = $lang;
	 }
	 
	 public function setFiliere($file)
	 {
		 $this->filiere = $file;
	 }
	 
	 public function setDateInscription(DateTime $date)
	 {
		 $this->dateInscription = $date;
	 }
	 
	 //merde une nouvelle fois les getters ..........
	 
	 public function getId()
	 {
		 return $this->id;
	 }
	 
	 public function getNom(){ return $this->nom;}
	 public function getPrenom(){ return $this->prenom;}
	 public function getDateNaissance(){ return $this->dateNaissance;}
	 public function getLieu(){ return $this->lieu;}
	 public function getSexe(){ return $this->sexe;}
	 public function getRegion(){return $this->region;}
	 public function getDepart(){ return $this->departement;}
	 public function getEthnie(){return $this->ethnie;}
	 public function getNationalite(){return $this->nationalite;}
	 
	 public function getProf(){return $this->profession_mere_parrain;}
	 public function getSituation(){return $this->situationMatrimoniale;}
	 public function getLieuR(){return $this->lieuResidence;}
	 public function getAddr(){return $this->adresse;}
	 public function getTelperso(){return $this->telperso;}
	 public function getSosTel(){return $this->sosTel;}
	 public function getSosName(){return $this->sosName;}
	 
	 public function getDiplome(){return $this->diplomeEleve;}
	 public function getPlace(){return $this->dateAndObtentionPlace;}
	 public function getLang(){return $this->speakLanguage;}
	 public function getFiliere(){return $this->filiere;}
	 public function getDateInscription(){ return $this->dateInscription;}
	 public function getErreurs(){return $this->erreurs;}
	 
	 //les autres méthodes ;
	 
	 public function isNew()
	 {
		return empty($this->id);
	 }
	 
	 public function isValid()
	 {
		 return !(empty($this->nom) || empty($this->prenom) || empty($this->dateNaissance) || empty($this->lieu) || empty($this->region) || empty($this->departement) || empty($this->ethnie) || empty($this->sexe) || empty($this->nationalite) || empty($this->speakLanguage) || empty($this->filiere) || empty($this->situationMatrimoniale) || empty($this->adresse));
	 }
		
	 
}

















































































































































































































































<?php

require_once('db_config.php');
require('Projet.php');

class ProjetManager
{
	private $_db;

	public function __construct()
	{
		$this->setDb(DbConfig::dbConnect());
	}

	//Ajouter un Utilisateur
	public function add(Projet $projets)
	{
		$query = $this->_db->prepare('INSERT INTO projets(titre, description, tailleGroupe, dateDebut, dateFin) VALUES(:titre, :description, :tailleGroupe, :dateDebut, :dateFin)');

		$query->bindValue(':titre', $projets->titre(), PDO::PARAM_STR);
		$query->bindValue(':description', $projets->description(), PDO::PARAM_STR);
		$query->bindValue(':tailleGroupe', $projets->tailleGroupe(), PDO::PARAM_INT);
		$query->bindValue(':dateDebut', $projets->dateDebut());
		$query->bindValue(':dateFin', $projets->dateFin());

		$query->execute();
	}

	public function get($id)
	{
		$id = (int) $id;
		$query = $this->_db->prepare('SELECT * FROM projets WHERE pid = :id');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		return new Projet($data);
	}

	public function getProjets()
	{
		$projetspublish = [];

		$query = $this->_db->query('SELECT * FROM projets');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i = 0; $i < count($data); $i++) {
			$projet = new Projet($data[$i]);
			array_push($projetspublish, $projet);
		}

		return $projetspublish;
	}

	public function update(Projet $projets)
	{
		$query = $this->_db->prepare('UPDATE projets SET titre = :titre, description = :description, tailleGroupe = :tailleGroupe, dateDebut = :dateDebut, dateFin = :dateFin  WHERE pid = :pid');

		$query->bindValue(':pid', $projets->pid(), PDO::PARAM_INT);
		$query->bindValue(':titre', $projets->titre(), PDO::PARAM_STR);
		$query->bindValue(':description', $projets->description(), PDO::PARAM_STR);
		$query->bindValue(':tailleGroupe', $projets->tailleGroupe(), PDO::PARAM_INT);
		$query->bindValue(':dateDebut', $projets->dateDebut());
		$query->bindValue(':dateFin', $projets->dateFin());

		$query->execute();
	}


	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}

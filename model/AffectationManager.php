<?php

require_once('db_config.php');
require('affectation.php');

class AffectationManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Affectation $affectation)
	{
		$query = $this->_db->prepare('INSERT INTO affectation(gid , cid) VALUES(:gid, :cid)');

        $query->bindValue(':gid', $affectation->gid(), PDO::PARAM_INT);
        $query->bindValue(':cid', $affectation->cid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function delete(Affectation $affectation)
	{
		$query = $this->_db->prepare('DELETE FROM affectation WHERE gid = :gid');
		$query->bindValue(':gid' , $affectation->gid()->gid(), PDO::PARAM_INT);
		$query->execute();
	}

	public function get($id)
	{
		$id = (int) $id;
		$groupe = new GroupeManager;
		$choix = new ChoixManager;

		$query = $this->_db->prepare('SELECT * FROM affectation WHERE gid = :gid');
		$query->bindValue(':gid', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		$affectation = new Affectation($data);
		$affectation->setGid($groupe->get($data["gid"]));
		$affectation->setCid($choix->get($data["cid"]));

		return $affectation;
	}

	public function getAffectations()
	{
		$affectationpublish=[];
		$groupeManager = new GroupeManager;
		$choixManager = new ChoixManager;

		$query = $this->_db->query('SELECT * FROM affectation');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$affectation = new Affectation($data[$i]);
			$affectation->setGid($groupeManager->get($data[$i]["gid"]));
			$affectation->setCid($choixManager->get($data[$i]["cid"]));
			array_push($affectationpublish, $affectation); 
		} 

		return $affectationpublish;
	}

	public function update(Affectation $affectation)
	{
		$query = $this->_db->prepare('UPDATE affectation SET gid = :gid, cid = :cid WHERE gid = :gid');

		$query->bindValue(':gid', $affectation->gid(), PDO::PARAM_INT);
		$query->bindValue(':cid', $affectation->cid(), PDO::PARAM_INT);

		$query->execute();
	}



	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
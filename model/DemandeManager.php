<?php

require_once('db_config.php');
require('demande.php');

class DemandeManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Demande $demande)
	{
		$query = $this->_db->prepare('INSERT INTO demande(gid , uid) VALUES(:gid, :uid)');

        $query->bindValue(':gid', $demande->gid(), PDO::PARAM_INT);
        $query->bindValue(':uid', $demande->uid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function delete(Demande $demande)
	{
		$query = $this->_db->prepare('DELETE FROM demande WHERE gid = :gid');
		$query->bindValue(':gid' , $demande->gid(), PDO::PARAM_INT);
		$query->execute();
	}

	public function get($id)
	{
		$id = (int) $id;

		$query = $this->_db->prepare('SELECT * FROM demande WHERE gid = :gid');
		$query->bindValue(':gid', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		return new Demande($data);
	}

	public function getDemandes()
	{
		$demandespublish=[];
		$userManager = new UserManager;

		$query = $this->_db->query('SELECT * FROM demande');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$demande = new Demande($data[$i]);
			$demande->setUid($userManager->get($data[$i]["uid"]));
			array_push($demandespublish, $demande); 
		} 

		return $demandespublish;
	}

	public function getDemandesUser(User $user)
	{
		$demandespublish=[];

		$query = $this->_db->prepare('SELECT * FROM demande WHERE uid = :uid');
		$query->bindValue(':uid', $user->uid(), PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$demande = new Demande($data[$i]);
			array_push($demandespublish, $demande); 
		} 

		return $demandespublish;
	}

	public function update(Demande $demandes)
	{
		$query = $this->_db->prepare('UPDATE demande SET gid=:gid,uid = :uid, source = :source WHERE gid = :gid');

		$query->bindValue(':gid', $demandes->gid(), PDO::PARAM_INT);
		$query->bindValue(':uid', $demandes->uid(), PDO::PARAM_INT);
		$query->bindValue(':source', $demandes->source(), PDO::PARAM_STR);


		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
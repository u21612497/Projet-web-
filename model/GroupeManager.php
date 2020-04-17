<?php

require_once('db_config.php');
require('Groupe.php');

class GroupeManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Groupe $groupes)
	{
		$query = $this->_db->prepare('INSERT INTO groupes(pid) VALUES(:pid)');

		$query->bindValue(':pid', $groupes->pid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function delete(Groupe $groupe)
	{
		$query = $this->_db->prepare('DELETE FROM groupes WHERE gid = :gid');
		$query->bindValue(':gid' , $groupe->gid(), PDO::PARAM_INT);
		$query->execute();
	}

	public function get($id)
	{
		$id = (int) $id;
		$projet = new ProjetManager;

		$query = $this->_db->prepare('SELECT * FROM groupes WHERE gid = :gid');
		$query->bindValue(':gid', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		$groupe = new Groupe($data);
		$groupe->setPid($projet->get($data["pid"]));

		return $groupe;
	}

	public function getGroupes()
	{
		$groupespublish=[];
		$projet = new ProjetManager;

		$query = $this->_db->query('SELECT * FROM groupes');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$groupe = new Groupe($data[$i]);
			$groupe->setPid($projet->get($data[$i]["pid"]));
			array_push($groupespublish, $groupe); 
		} 

		return $groupespublish;
	}

	public function getByAssociation(Association $association)
	{
		$query = $this->_db->prepare('SELECT * FROM groupes WHERE gid = :gid');
		$query->bindValue(':gid', $association->gid(), PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(\PDO::FETCH_ASSOC);


		$groupe = new Groupe($data);


		return $groupe;
	}

	public function update(Groupe $groupes)
	{
		$query = $this->_db->prepare('UPDATE groupes SET gid = :gid, pid = :pid WHERE gid = :gid');

		$query->bindValue(':gid', $groupes->gid(), PDO::PARAM_INT);
		$query->bindValue(':pid', $groupes->pid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
<?php

require_once('db_config.php');
require('Association.php');

class AssociationManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(Association $associations)
	{
		$query = $this->_db->prepare('INSERT INTO association(gid , uid) VALUES(:gid, :uid)');

        $query->bindValue(':gid', $associations->gid(), PDO::PARAM_INT);
        $query->bindValue(':uid', $associations->uid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function delete(Association $association)
	{
		$query = $this->_db->prepare('DELETE FROM association WHERE gid = :gid');
		$query->bindValue(':gid' , $association->gid(), PDO::PARAM_INT);
		$query->execute();
	}

	public function get($id)
	{
		$id = (int) $id;
		$groupe = new GroupeManager;
		$user = new UserManager;

		$query = $this->_db->prepare('SELECT * FROM association WHERE gid = :gid');
		$query->bindValue(':gid', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		$association = new Association($data);
		$association->setGid($groupe->get($data["gid"]));
		$association->setUid($user->get($data["uid"]));

		return $association;
	}

	public function getAssociations()
	{
		$associationpublish=[];
		$groupeManager = new GroupeManager;
		$userManager = new UserManager;

		$query = $this->_db->query('SELECT * FROM association');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$association = new association($data[$i]);
			$association->setGid($groupeManager->get($data[$i]["gid"]));
			$association->setUid($userManager->get($data[$i]["uid"]));
			array_push($associationpublish, $association); 
		} 

		return $associationpublish;
	}

	public function getByUser(User $user)
	{
		$query = $this->_db->prepare('SELECT * FROM association WHERE uid = :uid');
		$query->bindValue(':uid', $user->uid(), PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(\PDO::FETCH_ASSOC);


		$association = new Association($data);


		return $association;
	}

	public function update(association $association)
	{
		$query = $this->_db->prepare('UPDATE association SET gid = :gid, uid = :uid WHERE gid = :gid');

		$query->bindValue(':gid', $association->gid(), PDO::PARAM_INT);
		$query->bindValue(':uid', $association->uid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
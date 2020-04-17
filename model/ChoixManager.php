<?php

require_once('db_config.php');
require('Choix.php');

class ChoixManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(choix $choix)
	{
		$query = $this->_db->prepare('INSERT INTO choix(nom , pid) VALUES(:nom, :pid)');

        $query->bindValue(':nom', $choix->nom(), PDO::PARAM_STR);
        $query->bindValue(':pid', $choix->pid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function delete(Choix $choix)
	{
		$query = $this->_db->prepare('DELETE FROM choix WHERE cid = :cid');
		$query->bindValue(':cid' , $choix->cid(), PDO::PARAM_INT);
		$query->execute();
	}

	public function get($id)
	{
		$id = (int) $id;
		$projet = new ProjetManager;

		$query = $this->_db->prepare('SELECT * FROM choix WHERE cid = :cid');
		$query->bindValue(':cid', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		$choix = new Choix($data);
		$choix->setPid($projet->get($data["pid"]));

		return $choix;
	}

	public function getChoix()
	{
		$choixpublish=[];
		$projet = new ProjetManager;

		$query = $this->_db->query('SELECT * FROM choix');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$choix = new Choix($data[$i]);
			$choix->setPid($projet->get($data[$i]["pid"]));
			array_push($choixpublish, $choix); 
		} 

		return $choixpublish;
	}

	public function update(Choix $choix)
	{
		$query = $this->_db->prepare('UPDATE choix SET cid = :cid, nom = :nom, pid = :pid WHERE cid = :cid');

		$query->bindValue(':cid', $choix->cid(), PDO::PARAM_INT);
		$query->bindValue(':nom', $choix->nom(), PDO::PARAM_STR);
		$query->bindValue(':pid', $choix->pid(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
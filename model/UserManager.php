<?php

require_once('db_config.php');
require('User.php');

class UserManager
{
	private $_db;

	public function __construct()
  	{
    	$this->setDb(DbConfig::dbConnect());
 	}

 	//Ajouter un Utilisateur
	public function add(User $users)
	{
		$query = $this->_db->prepare('INSERT INTO users(login, nom, prenom, mdp, role) VALUES(:login, :nom, :prenom, :mdp, :role)');

		$pass_hash = password_hash($users->mdp(), PASSWORD_DEFAULT);

		$query->bindValue(':login', $users->login(), PDO::PARAM_STR);
		$query->bindValue(':nom', $users->nom(), PDO::PARAM_STR);
		$query->bindValue(':prenom', $users->prenom(), PDO::PARAM_STR);
		$query->bindValue(':mdp', $pass_hash);
        $query->bindValue(':role', $users->role());

		$query->execute();
	}

	//Connecter un Utilisateur
	public function connect($login)
	{
		$login = (string) $login;

		$query = $this->_db->prepare('SELECT * FROM users WHERE login = :login');
		$query->execute(array(':login' => $login));
		$data = $query->fetch();

		return new User($data);

	}

	public function delete(User $user)
	{
		$query = $this->_db->prepare('DELETE FROM users WHERE uid = :uid');
		$query->bindValue(':uid' , $user->uid(), PDO::PARAM_INT);
		$query->execute();
	}

	//Vérifier l'existance d'un login
	public function loginExist($login)
	{
		$login = (string) $login;

		$query = $this->_db->prepare('SELECT uid FROM users WHERE login = :login');
		$query->execute(array(':login' => $login));
		$data = $query->fetch(PDO::FETCH_ASSOC);

		return $data;
	}

	public function getLogin($login)
	{
		$login = (string) $login;

		$query = $this->_db->prepare('SELECT * FROM users WHERE login = :login');
		$query->execute(array(':login' => $login));
		$data = $query->fetch();

		return $data;

	}

	public function get($id)
	{
		$id = (int) $id;

		$query = $this->_db->prepare('SELECT * FROM users WHERE uid = :uid');
		$query->bindValue(':uid', $id, PDO::PARAM_INT);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);

		return new User($data);
	}

	public function getUsers()
	{
		$userspublish=[];

		$query = $this->_db->query('SELECT * FROM users');
		$data = $query->fetchAll(\PDO::FETCH_ASSOC);

		for ($i=0; $i< count($data); $i++) 
		{ 
			$userpublish = new User($data[$i]);
			array_push($userspublish, $userpublish); 
		} 

		return $userspublish;
	}

	//Modifier un utilisateur avec un mot de passe différent
	public function update(User $user)
	{
		$query = $this->_db->prepare('UPDATE users SET login = :login, nom = :nom, prenom = :prenom, mdp = :mdp WHERE uid = :uid');

		$pass_hash = password_hash($user->mdp(), PASSWORD_DEFAULT);

		$query->bindValue(':uid', $user->uid(), PDO::PARAM_INT);
		$query->bindValue(':login', $user->login(), PDO::PARAM_STR);
		$query->bindValue(':nom', $user->nom(), PDO::PARAM_STR);
		$query->bindValue(':prenom', $user->prenom(), PDO::PARAM_STR);
		$query->bindValue(':mdp', $pass_hash);

		$query->execute();
	}


	//Modifier un utilisateur avec le même mot de passe
	public function updateNoMdp(User $user)
	{
		$query = $this->_db->prepare('UPDATE users SET login = :login, nom = :nom, prenom = :prenom WHERE uid = :uid');

		$query->bindValue(':uid', $user->uid(), PDO::PARAM_INT);
		$query->bindValue(':login', $user->login(), PDO::PARAM_STR);
		$query->bindValue(':nom', $user->nom(), PDO::PARAM_STR);
		$query->bindValue(':prenom', $user->prenom(), PDO::PARAM_STR);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
<?php

class Projet
{
	private $_pid;
	private $_titre;
	private $_description;
	private $_tailleGroupe;
	private $_dateDebut;
	private $_dateFin;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$method = 'set' . ucfirst($key);

			if (method_exists($this, $method)) 
			{
				$this->$method($value);
			}
		}
	}

	//Getters

	public function pid() { return $this->_pid; }
	public function titre() { return $this->_titre; }
	public function description() { return $this->_description; }
	public function tailleGroupe() { return $this->_tailleGroupe; }
	public function dateDebut() { return $this->_dateDebut; }
	public function dateFin() { return $this->_dateFin; }


	//Setters

	public function setPid($pid)
	{
		$pid = (int) $pid;

		if ($pid >0)
		{
			$this->_pid = $pid;
		}
	}

	public function setTitre($titre)
	{
		if(is_string($titre))
		{
			$this->_titre = $titre;
		}
	}

	public function setDescription($description)
	{
		if(is_string($description))
		{
			$this->_description = $description;
		}
	}

	public function setTailleGroupe($tailleGroupe)
	{
		if($tailleGroupe > 0)
		{
			$this->_tailleGroupe = $tailleGroupe;
		}
	}

	public function setDateDebut($dateDebut)
	{
		$this->_dateDebut = $dateDebut;
	}

	public function setDateFin($dateFin)
	{
		$this->_dateFin = $dateFin;
	}
}
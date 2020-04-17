<?php

class Choix
{
    private $_cid;
    private $_nom;
	private $_pid;

	public function __construct(array $data)
    {
        $this->hydrate($data);
    }
 
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
 
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

	//Getters

    public function cid() { return $this->_cid; }
    public function nom() { return $this->_nom; }
	public function pid()	{ return $this->_pid;	}

	//Setters

	public function setCid($cid)
	{
		$cid = (int) $cid;

		if ($cid >0)
		{
			$this->_cid = $cid;
		}
    }
    
    public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->_nom = $nom;
		}
	}

	public function setPid($pid)
	{
			$this->_pid = $pid;
	}
}
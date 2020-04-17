<?php

class Affectation
{
	private $_gid;
	private $_cid;

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

	public function gid() { return $this->_gid; }
	public function cid()	{ return $this->_cid;	}

	//Setters

	public function setGid($gid)
	{
		$this->_gid = $gid;
	}

	public function setCid($cid)
	{
			$this->_cid = $cid;
	}
}
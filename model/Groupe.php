<?php

class Groupe
{
	private $_gid;
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

	public function gid() { return $this->_gid; }
	public function pid()	{ return $this->_pid;	}

	//Setters

	public function setGid($gid)
	{
		$gid = (int) $gid;

		if ($gid >0)
		{
			$this->_gid = $gid;
		}
	}

	public function setPid($pid)
	{
		$this->_pid = $pid;
	}
}
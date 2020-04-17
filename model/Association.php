<?php

class Association
{
	private $_gid;
	private $_uid;

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
	public function uid()	{ return $this->_uid;	}

	//Setters

	public function setGid($gid)
	{
		$this->_gid = $gid;
	}

	public function setUid($uid)
	{
			$this->_uid = $uid;
	}
}
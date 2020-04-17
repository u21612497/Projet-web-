<?php

class Demande
{
    private $_gid;
	private $_uid;
    private $_source;

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
    public function source() { return $this->_source; }

	//Setters

	public function setGid($gid)
	{

		$this->_gid = $gid;
    }
    
	public function setUid($uid)
	{
		$this->_uid = $uid;
    }
    
    public function setSource($source)
	{
		if (is_string($source))
		{
			$this->_source = $source;
		}
	}

}
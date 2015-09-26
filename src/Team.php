<?php

namespace App ;

use App\Exceptions\TeamIsFull;
use App\Exceptions\UserAlreadyOnTeam;
use App\User;

class Team 
{
	private $name;
	private $size;
	private $users = [];

	public function __construct($name, $size)
	{
		$this->name = $name;
		$this->size = $size;
	}


	
	public function name()
	{
		return $this->name ;
	}

	
   
    public function size()
    {
        return $this->size;
    }

     public function addMany(array $users)
    {
    	foreach ($users as $user) {
    		$this->add($user) ;
    	}
    }

    public function add(User $user)
    {
    	if ($this->atCapacity()) {
    		throw new TeamIsFull;    		
    	}

        if ($user->isOnTeam()) {
            throw new UserAlreadyOnTeam ;
        }

    	$this->users[] =  $user; 
    } 



    protected  function atCapacity()
    {
    	return count($this->users) == $this->size() ;
    }  

    public function members()
    {
    	return $this->users ;
    }
}
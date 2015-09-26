<?php



namespace App ;
use App\Team;
/**
 * summary
 */
class User 
{
	private $name;
	private $team;

    /**
     * summary
     */
    public function __construct($name)
    {
        
		$this->name = $name;
    }

    public function joinTeam(Team $team)
    {
    	$this->team = $team;
    }

    public function isOnTeam()
    {
        return !! $this->team ;
    }
}

<?php 

//require './vendor/autoload.php';

use App\User;
use App\Team;

/**
 * TeamTest
 *
 * 
 */
class TeamTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    function a_team_has_a_name_and_a_size()
    {    	
    	 $team = $this->newTeam();
    	 $this->assertEquals('Acme', $team->name(), 'cest pas egal');
    	 $this->assertEquals(2, $team->size(), 'no no no NO');

    }

    /** @test */
    function a_team_can_add_a_user ()
    {
    	$team = $this->newTeam() ;
    	$team->add(new User('Faycal')) ;
    	$this->assertCount(1, $team->members(), 'Quelque chose va mal , trés mal');
    } 

    /** @test */
    function a_team_can_add_multiple_users_at_once ()
    {
    	$team = $this->newTeam() ;
    	$team->addMany([
    		new user('Jordan'),
    		new User('Fox')
    		]);
    	$this->assertCount(2,$team->members(), 'Not The right count');

    } 

    /** 
    * @test
    * 
    * @expectedException App\Exceptions\TeamIsFull 
    */
    function it_does_not_allow_new_members_once_the_maximum_size_has_been_reached()
    {
    	$team= $this->newTeam()->addMany([

    			new User('bb'),
    			new User('cc'),
    			new User('dd')

    		]) ;

    	$this->assertCount(3, $team->members(), 'The Bad Behavour');
    } 

    /** 
    * @test
    * 
    * @exepectedException \App\Exceptions\UserAlreadyOnTeam
    */

    public function a_user_may_not_join_a_team_if_they_are_already_on_once()
    {
        $user = new User('Bill');
        $user->joinTeam($this->newTeam()) ;

        $james = new User('james');
        $this->newTeam('New Team')->add($james);
    }

    protected function newTeam($name='Acme' ,  $size=2)
    {
        return new Team($name , $size);
    }
}

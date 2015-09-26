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
    	 $team = new Team('Acme' , 5);
    	 $this->assertEquals('Acme', $team->name(), 'cest pas egal');
    	 $this->assertEquals(5, $team->size(), 'no no no NO');

    }

    /** @test */
    function a_team_can_add_a_user ()
    {
    	$team = new team('Acme' , 5) ;
    	$team->add(new User('Faycal')) ;

    	$this->assertCount(1, $team->members(), 'Quelque chose va mal , trés mal');
    } 

    /** @test */
    function a_team_can_add_multiple_users_at_once ()
    {
    	$team = new Team('Acme' , 5) ;
    	$team->addMany([
    		new user('Jordan'),
    		new User('Fox'),
    		new User('Bellicimo')
    		]);
    	$this->assertCount(3,$team->members(), 'Not The right count');

    } 

    /** 
    * @test
    * 
    * @expectedException App\Exceptions\TeamIsFull 
    */
    function it_does_not_allow_new_members_once_the_maximum_size_has_been_reached()
    {
    	$team= new Team('Acme' , 2) ;

    	$team->addMany([

    			new User('bb'),
    			new User('cc'),
    			new User('dd')

    		]) ;

    	$this->assertCount(2, $team->members(), 'The Bad Behavour');
    } 
}

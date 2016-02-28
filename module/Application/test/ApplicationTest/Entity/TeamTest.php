<?php
/*
 * A series of tests for the Config entity
 */
namespace ApplicationTest\Team;

use Application\Controller\TeamController;
use ApplicationTest\Bootstrap;
use Application\Entity\Team;

class TeamTest extends \PHPUnit_Framework_TestCase{
  
  /**
   * @var \Application\Entity\Team
   */
  protected $team;
  protected $em;
  protected $doctrine;
  /**
   * Set up the class for testing. 
   */
  public function setUp(){
    $this->team = new Team();

    $this->em = $this->getMock('EntityManager', array('persist', 'flush','findOneBy'));
    $this->em
        ->expects($this->any())
        ->method('persist')
        ->will($this->returnValue(true));
    $this->em
        ->expects($this->any())
        ->method('flush')
        ->will($this->returnValue(true));
    $this->doctrine = $this->getMock('Doctrine', array('getEntityManager'));
    $this->doctrine
        ->expects($this->any())
        ->method('getEntityManager')
        ->will($this->returnValue($this->em));

  }
  public function testCanGetUserById()
  {
    // Create a dummy user entity
    $mockTeam = new \Application\Entity\Team();
    $mockTeam->setName('david');
    $mockTeam->setUri('img/team/david.jpg');
    $this->em->flush();

    $this->em
        ->expects($this->any())
        ->method('findOneBy')
        ->will($this->returnValue($mockTeam));

    // Mock the entity manager, find should return our dummy user


    // Create a new instance of the user service injecting our mocked entity manager
    $team = $this->em->findOneBy(array('name' => 'david' ),array("id" => "DESC"));


    // Check the response is a user entity
    $this->assertInstanceOf('Application\Entity\Team', $team, 'f1 failed');

    // Check that the returned entity is our dummy user
    $this->assertEquals('david', $team->getName(), 'f2 failed');

}
}
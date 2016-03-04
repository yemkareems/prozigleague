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
    $mockTeam = new \Application\Entity\Team();
    $mockTeam->setName('testTeam');
    $mockTeam->setUri('img/team/testTeam.jpg');
    $this->em->flush();

    $this->em
        ->expects($this->any())
        ->method('findOneBy')
        ->will($this->returnValue($mockTeam));

    $team = $this->em->findOneBy(array('name' => 'testTeam' ),array("id" => "DESC"));

    // Check the response is a user entity
    $this->assertInstanceOf('Application\Entity\Team', $team, 'f1 failed');

    // Check that the returned entity is our dummy user
    $this->assertEquals('david', $team->getName(), 'f2 failed');
  }
}

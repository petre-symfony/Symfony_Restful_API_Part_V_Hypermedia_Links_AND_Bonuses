<?php
namespace AppBundle\Tests\Controller\Api;

use AppBundle\Test\ApiTestCase;

class BattleControllerTest extends ApiTestCase {
  protected function setUp(){
    parent::setUp();
    $this->createUser('weaverryan');
  }
  
  public function testPOSTCreateBattle(){
    $project = $this->createProject('my_project');
    $programmer = $this->createProgrammer([
      'nickname' => 'Fred'
    ], 'weaverryan');
    
  }
}

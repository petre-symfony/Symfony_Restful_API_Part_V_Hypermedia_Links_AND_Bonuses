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
    
    $data = array(
      'projectId'    => $project->getId(),
      'programmerId' => $programmer->getId()
    );
    
    $response = $this->client->post('/api/battles', [
      'body'    => json_encode($data),
      'headers' => $this->getAuthorizedHeaders('weaverryan')
    ]);
    
    $this->assertEquals(201, $response->getStatusCode());
    $this->asserter()->assertResponsePropertyExists($response, 'didProgrammerWin');
    $this->asserter()->assertResponsePropertyEquals($response, 'project', $project->getId());
    $this->asserter()->assertResponsePropertyEquals($response, 'programmer', 'Fred');
    //to do later
    //$this->assertTrue($response->hasHeader('Location'))
  }
  
  public function testPOSTBattleValidationErrors(){
    $this->createUser('someone_else');
    $programmer = $this->createProgrammer([
      'nickname' => 'Fred',
      'avatarNumber' => 5,   
    ], 'someone_else');
    
    $data = array(
      'projectId'    => null,
      'programmerId' => $programmer->getId()
    );
    
    $response = $this->client->post('/api/battles', [
      'body'    => json_encode($data),
      'headers' => $this->getAuthorizedHeaders('weaverryan')
    ]);
    
    $this->assertEquals(400, $response->getStatusCode());
    $this->asserter()->assertResponsePropertyExists($response, 'errors.projectId');
    $this->asserter()->assertResponsePropertyEquals(
      $response,
      'errors.projectId[0]', 
      'This value should not be blank.'
    );
    $this->asserter()->assertResponsePropertyEquals(
      $response,
      'errors.programmerId[0]', 
      '????'
    );
  }
}

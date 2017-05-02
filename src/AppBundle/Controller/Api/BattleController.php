<?php
namespace AppBundle\Controller\Api;

use AppBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class BattleController extends BaseController {
  /**
   * @Route("/api/battles")
   * @Method("POST")
   */
  public function newAction(Request $request){
    
  }
}

<?php
namespace AppBundle\Controller\Api;

use AppBundle\Controller\BaseController;
use AppBundle\Form\Model\BattleModel;
use AppBundle\Form\BattleType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class BattleController extends BaseController {
  /**
   * @Route("/api/battles")
   * @Method("POST")
   */
  public function newAction(Request $request){
    $battleModel = new BattleModel();
    $form = $this->createForm(BattleType::class, $battleModel);
    $this->processForm($request, $form);
    
    if(!$form->isValid()){
      $this->throwApiProblemValidationException($form);
    }
    
    //todo - set Location header
    $battle = $this->getBattleManager()->battle(
      $battleModel->getProgrammer(),
      $battleModel->getProject()
    );
    
    return $this->createApiResponse($battle, 201);
  }
}

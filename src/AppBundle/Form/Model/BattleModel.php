<?php
namespace AppBundle\Form\Model;

use AppBundle\Entity\Programmer;
use AppBundle\Entity\Project;
use Symfony\Component\Validator\Constraints as Assert;

class BattleModel {
  /**
   *
   * @Assert\NotBlank()
   */
  private $project;
  
  /**
   *
   * @Assert\NotBlank()
   */
  private $programmer;
  
  /**
   * 
   * @return Project
   */
  public function getProject() {
    return $this->project;
  }
  
  /**
   * 
   * @var Project
   */
  public function setProject(Project $project){
    $this->project = $project;
  }
  
  /**
   * 
   * @return Programmer
   */
  public function getProgrammer() {
    return $this->programmer;
  }
  
  /**
   * 
   * @var Programmer
   */
  public function setProgrammer(Programmer $programmer){
    $this->programmer = $programmer;
  }
}

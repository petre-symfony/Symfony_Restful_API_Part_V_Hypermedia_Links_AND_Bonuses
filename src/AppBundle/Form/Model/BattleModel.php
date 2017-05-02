<?php
namespace AppBundle\Form\Model;

use AppBundle\Entity\Programmer;
use AppBundle\Entity\Project;

class BattleModel {
  private $project;
  
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

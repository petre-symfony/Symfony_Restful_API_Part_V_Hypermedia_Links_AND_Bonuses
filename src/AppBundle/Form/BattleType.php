<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Form\Model\BattleModel;

class BattleType extends AbstractType {
 
  public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
      ->add('projectId', EntityType::class, [
        'class' => 'AppBundle\Entity\Project',
        'property_path' => 'project'
      ])
      ->add('programmerId', EntityType::class, [
        'class' => 'AppBundle\Entity\Programmer',
        'property_path' => 'programmer' 
      ]);  
    } 
   
  public function configureOptions(OptionsResolver $resolver){
    $resolver->setDefaults([
      'data_class' => BattleModel::class,
      'csrf_protection' => false  
    ]);  
  }
}

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
      ->add('project', EntityType::class, [
        'class' => 'AppBundle\Entity\Project'
      ])
      ->add('programmer', EntityType::class, [
        'class' => 'AppBundle\Entity\Programmer'
      ]);  
    } 
   
  public function configureOptions(OptionsResolver $resolver){
    $resolver->setDefaults([
      'data_class' => BattleModel::class,
      'csrf_protection' => false  
    ]);  
  }
}

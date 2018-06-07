<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 14/05/18
 * Time: 11:52
 */

namespace AppBundle\Form;

use AppBundle\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('name',         TextType::class)
            ->add('firstname',    TextType::class)
            ->add('gender',       TextType::class)
            ->add('biography',    TextType::class)
            ->add('kingdom',      KingdomType::class);
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Person'
        ));
    }
}
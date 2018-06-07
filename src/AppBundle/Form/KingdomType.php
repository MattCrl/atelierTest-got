<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 14/05/18
 * Time: 11:42
 */

namespace AppBundle\Form;

use AppBundle\AppBundle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class KingdomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('capital', TextType::class)
            ->add('nbInhabitant', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \AppBundle\Entity\Kingdom::class
        ]);
    }

}
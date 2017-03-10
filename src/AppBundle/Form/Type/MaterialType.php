<?php
namespace AppBundle\Form\Type;
use AppBundle\Entity\Alumno;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\local;
use AppBundle\Entity\material;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class MaterialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('locales')
            ->add('marca')
            ->add('modelo')
            ->add('numserie')
            ->add('unidades')
            ->add('proveedore')
            ->add('ubicacion')
            ->add('fechaAlta')
            ->add('fechaBaja');

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => material::class
        ]);
    }
}
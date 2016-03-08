<?php

namespace WebTFEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SaveOperationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stockId')
            ->add('operationId')
            ->add('modificationDate')
            ->add('userId')
            ->add('articleId')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebTFEBundle\Entity\SaveOperation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webtfebundle_saveoperation';
    }
}

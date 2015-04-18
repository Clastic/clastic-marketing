<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ReferenceTypeExtension
 */
class ReferenceFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)
            ->findTab('general')
            ->add('screenshot')
            ->add('link')
            ->add('description', 'wysiwyg');
    }
}

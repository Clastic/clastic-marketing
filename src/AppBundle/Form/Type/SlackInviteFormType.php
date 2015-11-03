<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SlackInviteFormType extends AbstractType
{
    /**
     * @var string
     */
    private $action;

    /**
     * SlackInviteFormType constructor.
     * @param string $action
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->setAction($this->action)
            ->add('email', 'email', [
                'required' => true,
            ])
            ->add('submit', 'submit', [
                'attr' => ['class' => 'btn btn-warning btn-block'],
                'label' => 'Get invite',
            ]);
    }

    public function getName()
    {
        return 'slack_invite';
    }
}

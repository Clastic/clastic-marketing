<?php

namespace AppBundle\Module;

use Clastic\NodeBundle\Module\NodeModuleInterface;

/**
 * Reference
 */
class ReferenceModule implements NodeModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Reference';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'reference';
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return 'AppBundle:Reference';
    }

    /**
     * @return string|bool
     */
    public function getDetailTemplate()
    {
        return 'AppBundle:Reference:detail.html.twig';
    }
}

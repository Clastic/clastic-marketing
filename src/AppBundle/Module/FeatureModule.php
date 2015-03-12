<?php
/**
 * This file is part of the Clastic package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Module;

use Clastic\NodeBundle\Module\NodeModuleInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class FeatureModule implements NodeModuleInterface
{
    /**
     * The name of the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Feature';
    }

    /**
     * The name of the module.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'feature';
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return 'AppBundle:Feature';
    }

    /**
     * @return string|bool
     */
    public function getDetailTemplate()
    {
        return '';
    }
}

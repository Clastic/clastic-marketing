<?php

namespace AppBundle\Entity;

use Clastic\NodeBundle\Node\NodeReferenceInterface;
use Clastic\NodeBundle\Node\NodeReferenceTrait;

/**
 * Reference
 */
class Reference implements NodeReferenceInterface
{
    use NodeReferenceTrait;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $screenshot;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $link;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set screenshot
     *
     * @param string $screenshot
     *
     * @return Reference
     */
    public function setScreenshot($screenshot)
    {
        $this->screenshot = $screenshot;

        return $this;
    }

    /**
     * Get screenshot
     *
     * @return string
     */
    public function getScreenshot()
    {
        return $this->screenshot;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Reference
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
}


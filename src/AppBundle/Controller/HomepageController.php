<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $features = $this->getDoctrine()->getRepository('AppBundle:Feature')
            ->findBy(array(), array(
                'weight' => 'ASC',
            ));

        $references = $this->getDoctrine()->getRepository('AppBundle:Reference')
            ->findBy(array(), array(), 2);

        return $this->render('AppBundle:Homepage:index.html.twig', array(
            'features' => $features,
            'references' => $references,
        ));
    }
}

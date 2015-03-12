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

        return $this->render('AppBundle:Homepage:index.html.twig', array(
            'features' => $features,
        ));
    }
}

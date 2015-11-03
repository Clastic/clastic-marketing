<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\SlackInviteFormType;
use CL\Slack\Payload\UsersListPayload;
use CL\Slack\Payload\UsersListPayloadResponse;
use Doctrine\Common\Cache\CacheProvider;
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

        $slackForm = $this->createForm(new SlackInviteFormType($this->generateUrl('slack_invite')));

        return $this->render('AppBundle:Homepage:index.html.twig', array(
            'features' => $features,
            'references' => $references,
            'slackForm' => $slackForm->createView(),
            'slackUserCount' => $this->getSlackUserCount(),
        ));
    }

    private function getSlackUserCount()
    {
        $cache = $this->getApiCache();
        $key = 'user_list_count';

        $count = $cache->fetch($key);
        if ($count !== false) {
            return $count;
        }

        /** @var UsersListPayloadResponse $response */
        $response = $this->get('cl_slack.api_client')
            ->send(new UsersListPayload());

        $count = count($response->getUsers());

        $cache->save($key, $count, 36000);

        return $count;
    }

    /**
     * @return CacheProvider
     */
    private function getApiCache()
    {
        return $this->get('cache.file');
    }
}

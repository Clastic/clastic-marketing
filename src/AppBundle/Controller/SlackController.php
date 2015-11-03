<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\SlackInviteFormType;
use CL\Slack\Exception\SlackException;
use CL\Slack\Payload\UsersAdminInvitePayload;
use CL\Slack\Payload\UsersAdminInvitePayloadResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SlackController extends Controller
{
    /**
     * @Route("/slack/invite", name="slack_invite")
     */
    public function inviteAction(Request $request)
    {
        $form = $this->createForm(new SlackInviteFormType(null));
        $form->handleRequest($request);

        $payload = new UsersAdminInvitePayload();
        $payload->setEmail($form->getData()['email']);

        try {
            /** @var UsersAdminInvitePayloadResponse $payload */
            $payload = $this->get('cl_slack.api_client')->send($payload);

            switch ($payload->getError()) {
                case 'already_invited':
                    $this->addFlash('info', 'An invitation was already send.');
                    break;
                default:
                    $this->addFlash('success', 'Your invite was send.');
            }
        } catch (SlackException $e) {
            $this->addFlash('error', 'Something went wrong!');
        }

        return $this->redirectToRoute('homepage');
    }
}

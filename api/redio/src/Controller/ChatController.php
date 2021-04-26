<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route("/push", name="push")
     * @param Request $request
     * @param HubInterface $publisher
     * @return Response
     */
    public function push(Request $request, HubInterface $publisher): Response
    {
        $message = $request->query->get('message');
        $result = $publisher->publish(
            new Update(
                'https://example.com/chat',
                json_encode(['message' => $message],
            )
        ));

        return $this->json('Done ' . $result);
    }
}
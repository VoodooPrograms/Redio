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
            $result = $publisher->publish(new Update(
                'https://example.com/my-private-topic',
                json_encode(['message' => 'hello!'],
                )
            ));

            return $this->json('Done ' . $result);
        }
    }
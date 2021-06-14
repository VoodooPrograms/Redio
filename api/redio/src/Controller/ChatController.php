<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ChatController extends AbstractController
{
    protected UserInterface $user;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
    }

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
                json_encode(['user' => $this->user->getUsername(), 'message' => $message],
            )
        ));

        return $this->json('Done ' . $result);
    }
}
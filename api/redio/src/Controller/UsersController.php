<?php

namespace App\Controller;

use App\DataObject\UserDataObject;
use App\Service\UserService\UserServiceInterface;
use App\Service\ValidatorService\ValidatorServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UsersController extends AbstractController
{
    private UserServiceInterface $userService;
    private SerializerInterface $serializer;
    private ValidatorServiceInterface $validatorService;

    public function __construct(
        UserServiceInterface $userService,
        SerializerInterface $serializer,
        ValidatorServiceInterface $validatorService
    ) {
        $this->userService = $userService;
        $this->serializer = $serializer;
        $this->validatorService = $validatorService;
    }

    /**
     * @Route("/api/users/{user_id}", name="users.show", methods="GET")
     *
     * @param int $user_id
     * @return Response
     */
    public function show(int $user_id): Response
    {
        $user = $this->userService->getById($user_id);

        return new Response(
            $this->serializer->serialize($user, 'json', ['groups' => 'index']),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/users", name="users.store", methods="POST")
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $userDTO = $this->validatorService->validate($request, UserDataObject::class);

        if ($userDTO instanceof Response) return $userDTO;

        $this->userService->create($userDTO);

        return new Response('User created', Response::HTTP_CREATED);
    }


    /**
     * @Route("/api/users/{user_id}", name="users.update", methods="PUT")
     *
     * @param Request $request
     * @param int $user_id
     * @return Response
     */
    public function update(Request $request, int $user_id): Response
    {
        $userDTO = $this->validatorService->validate($request, UserDataObject::class);

        if ($userDTO instanceof Response) return $userDTO;

        $this->userService->update($userDTO, $user_id);

        return new Response('User updated', Response::HTTP_OK);
    }
}

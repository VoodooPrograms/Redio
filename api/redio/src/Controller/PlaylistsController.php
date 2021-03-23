<?php

namespace App\Controller;

use App\Service\PlaylistService\PlaylistServiceInterface;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class PlaylistsController extends AbstractController
{
    private PlaylistServiceInterface $playlistService;
    private SerializerInterface $serializer;

    public function __construct(
        PlaylistServiceInterface $playlistService,
        SerializerInterface $serializer
    ) {
        $this->playlistService = $playlistService;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/api/playlists", name="playlists.index", methods="GET")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the collection of playlists"
     * )
     * @SWG\Tag(name="playlists")
     */
    public function index(): Response
    {
        return new Response(
            $this->serializer->serialize($this->playlistService->getAll(), 'json', ['groups' => 'index']),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/playlists/{playlist_id}", name="playlists.show", methods="GET")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns single playlist"
     * )
     * @SWG\Parameter(
     *     name="playlist_id",
     *     in="path",
     *     required=true,
     *     type="integer",
     *     description="Playlist id"
     * )
     * @SWG\Tag(name="playlists")
     *
     * @param int $playlist_id
     * @return Response
     */
    public function show(int $playlist_id): Response
    {
        $playlist = $this->playlistService->getById($playlist_id);

        return new Response(
            $this->serializer->serialize($playlist, 'json', ['groups' => 'index']),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/playlists", name="playlists.store", methods="POST")
     *
     * @SWG\Response(
     *     response=201,
     *     description="Create new playlist"
     * )
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Playlist name"
     * )
     * @SWG\Parameter(
     *     name="user_id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="Playlist owner"
     * )
     * @SWG\Parameter(
     *     name="image_uri",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Playlist poster"
     * )
     * @SWG\Parameter(
     *     name="tags",
     *     in="formData",
     *     required=true,
     *     type="array",
     *     @SWG\Items(
     *         type="string"
     *     ),
     *     description="Playlist tags"
     * )
     * @SWG\Tag(name="playlists")
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return new Response('TODO', Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/playlists/{playlist_id}", name="playlists.update", methods="PUT")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Update single playlist data"
     * )
     * @SWG\Parameter(
     *     name="playlist_id",
     *     in="path",
     *     required=true,
     *     type="integer",
     *     description="Playlist id"
     * )
     * @SWG\Parameter(
     *     name="name",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Playlist name"
     * )
     * @SWG\Parameter(
     *     name="user_id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="Playlist owner"
     * )
     * @SWG\Parameter(
     *     name="image_uri",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Playlist poster"
     * )
     * @SWG\Parameter(
     *     name="tags",
     *     in="formData",
     *     required=true,
     *     type="array",
     *     @SWG\Items(
     *         type="string"
     *     ),
     *     description="Playlist tags"
     * )
     * @SWG\Tag(name="playlists")
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        return new Response('TODO', Response::HTTP_OK);
    }

    /**
     * @Route("/api/playlists/{playlist_id}", name="playlists.delete", methods="DELETE")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Delete single playlist"
     * )
     * @SWG\Parameter(
     *     name="playlist_id",
     *     in="path",
     *     required=true,
     *     type="integer",
     *     description="Playlist id"
     * )
     * @SWG\Tag(name="playlists")
     *
     * @param int $playlist_id
     * @return Response
     */
    public function delete(int $playlist_id): Response
    {
        return new Response('TODO', Response::HTTP_OK);
    }
}
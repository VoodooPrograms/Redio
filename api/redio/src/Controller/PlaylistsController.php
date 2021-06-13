<?php

namespace App\Controller;

use App\DataObject\PlaylistDataObject;
use App\Service\PlaylistService\PlaylistServiceInterface;
use App\Service\ValidatorService\ValidatorServiceInterface;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlaylistsController extends AbstractController
{
    private PlaylistServiceInterface $playlistService;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private ValidatorServiceInterface $validatorService;

    public function __construct(
        PlaylistServiceInterface $playlistService,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ValidatorServiceInterface $validatorService
    ) {
        $this->playlistService = $playlistService;
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->validatorService = $validatorService;
    }

    /**
     * @Route("/api/playlists", name="playlists.index", methods="GET")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the collection of playlists"
     * )
     * @SWG\Tag(name="playlists")
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $playlists = $this->playlistService->getAll();

        array_map(
            fn($playlist) => $playlist->setImageUri($request->getSchemeAndHttpHost() . '/storage/photo/' . $playlist->getImageUri()),
            $playlists
        );

        return new Response(
            $this->serializer->serialize($playlists, 'json', ['groups' => 'index']),
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
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $playlistDTO = $this->validatorService->validate($request, PlaylistDataObject::class);

        if ($playlistDTO instanceof Response) return $playlistDTO;

        $this->playlistService->create($playlistDTO);

        return new Response('Playlist created', Response::HTTP_CREATED);
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
        $playlistDTO = $this->validatorService->validate($request, PlaylistDataObject::class);

        if ($playlistDTO instanceof Response) return $playlistDTO;

        $this->playlistService->update($playlistDTO, $id);

        return new Response('Playlist updated', Response::HTTP_OK);
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
        $this->playlistService->delete($playlist_id);

        return new Response('Playlist deleted', Response::HTTP_OK);
    }
}
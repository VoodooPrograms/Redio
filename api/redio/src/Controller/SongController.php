<?php

namespace App\Controller;

use App\DataObject\SongDataObject;
use App\Service\SongService\SongServiceInterface;
use App\Service\ValidatorService\ValidatorServiceInterface;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SongController extends AbstractController
{
    private SongServiceInterface $songService;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private ValidatorServiceInterface $validatorService;

    public function __construct(
        SongServiceInterface $songService,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ValidatorServiceInterface $validatorService
    )
    {
        $this->songService = $songService;
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->validatorService = $validatorService;
    }

    /**
     * @Route("/api/song", name="song.index", methods="GET")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the collection of songs"
     * )
     * @SWG\Tag(name="song")
     */
    public function index(): Response
    {
        return new Response(
            $this->serializer->serialize($this->songService->getAll(), 'json', ['groups' => 'index']),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/song/{song_id}", name="song.show", methods="GET")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns single song"
     * )
     * @SWG\Parameter(
     *     name="song_id",
     *     in="path",
     *     required=true,
     *     type="integer",
     *     description="Song id"
     * )
     * @SWG\Tag(name="song")
     *
     * @param int $song_id
     * @return Response
     */
    public function show(int $song_id): Response
    {
        $song = $this->songService->getById($song_id);

        return new Response(
            $this->serializer->serialize($song, 'json', ['groups' => 'index']),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/song", name="song.store", methods="POST")
     *
     * @SWG\Response(
     *     response=201,
     *     description="Create new Song"
     * )
     * @SWG\Parameter(
     *     name="yt_uri",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Youtube uri"
     * )
     * @SWG\Parameter(
     *     name="playlist_id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="Playlist ID"
     * )
     * @SWG\Tag(name="song")
     *
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $songDTO = $this->validatorService->validate($request, SongDataObject::class);

        if ($songDTO instanceof Response) return $songDTO;

        $this->songService->create($songDTO);

        return new Response('Song created', Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/song/{song_id}", name="song.update", methods="PUT")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Update single song data"
     * )
     * @SWG\Parameter(
     *     name="song_id",
     *     in="path",
     *     required=true,
     *     type="integer",
     *     description="Song id"
     * )
     * @SWG\Parameter(
     *     name="yt_uri",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Youtube uri"
     * )
     * @SWG\Tag(name="song")
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $songDTO = $this->validatorService->validate($request, SongDataObject::class);

        if ($songDTO instanceof Response) return $songDTO;

        $this->songService->update($songDTO, $id);

        return new Response('Song updated', Response::HTTP_OK);
    }

    /**
     * @Route("/api/song/{song_id}", name="song.delete", methods="DELETE")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Delete single song"
     * )
     * @SWG\Parameter(
     *     name="song_id",
     *     in="path",
     *     required=true,
     *     type="integer",
     *     description="song id"
     * )
     * @SWG\Tag(name="song")
     *
     * @param int $song_id
     * @return Response
     */
    public function delete(int $song_id): Response
    {
        $this->songService->delete($song_id);

        return new Response('Song deleted', Response::HTTP_OK);
    }
}
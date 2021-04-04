<?php

namespace App\Service\ValidatorService;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorService implements ValidatorServiceInterface
{
    protected ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(Request $request, string $dtoClassName)
    {
        $playlistDTO = new $dtoClassName($request->request->all());

        $errors = $this->validator->validate($playlistDTO);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        return $playlistDTO;
    }
}
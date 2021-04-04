<?php

namespace App\Service\ValidatorService;

use Symfony\Component\HttpFoundation\Request;

interface ValidatorServiceInterface
{
    public function validate(Request $request, string $dtoClassName);
}
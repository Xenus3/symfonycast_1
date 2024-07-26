<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController

{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]//<\d+> is a regular expression to force the route to only accept digits return a 404 error instead of interenal server error 500
    public function getSong(int $id, LoggerInterface $logger) : Response
    {
        // TODO query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Returning API reponse for song '.$id);
        // Return a Json response
        return new JsonResponse($song);
    }
}
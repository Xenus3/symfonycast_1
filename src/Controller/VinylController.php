<?php


namespace App\Controller;

use LDAP\Result;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController
{
    #[Route('/')]
    public function homepage() : Response 
    {
       return new Response("Title: PB and Jams");
    }

    #[Route('/browse/{musicCategory}')]
    public function browse(string $musicCategory = null /*this makes the url extention optional*/): Response 
    {
        if ($musicCategory) {
        //return new Response('Breakup vinyl? Angsty 90s rock? Browse the collection!');
        $title = str_replace('-', ' ', $musicCategory);
        }else{
            $title = 'All Genres';
        }

        return new Response('Genre: '.$title);
    }
}
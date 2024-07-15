<?php


namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController extends AbstractController
{

    private $tracks = [
        ['song' => 'Gangsta Paradide', 'artist' => 'Coolio'],
        ['song' =>'Waterfalls', 'artist' => 'TLC'],
        ['song' =>'Creep' , 'artist' => 'Radiohead'],
        ['song' =>'Kiss from a Rose' , 'artist' => 'Seal'],
        ['song' =>'On Bended Knee' , 'artist' => 'Boyz II Men'],
        ['song' =>'Fantasy' , 'artist' => 'Mariah Carey']
    ];


    #[Route('/')]
    public function homepage() : Response 
    {
       //return new Response("Title: PB and Jams");
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $this->tracks,
        ]);
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
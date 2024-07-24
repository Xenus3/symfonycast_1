<?php


namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function \symfony\component\string\u;

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
    
    


    #[Route('/', name: "app_homepage")]
    public function homepage() : Response 
    {
        //dd($this->tracks); //dd stands for dump and die
       //return new Response("Title: PB and Jams");
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $this->tracks,
        ]);
    }

    #[Route('/browse/{musicCategory}', name: "app_browse")]
    public function browse(string $musicCategory = null /*this makes the url extention optional*/): Response 
    {
        
        // the u() function creates Unicode strings
        $genre = $musicCategory ? u(str_replace('-', ' ', $musicCategory))->title(true) : null;

        return $this->render("vinyl/browse.html.twig", [
            'genre' => $genre,
        ]);
    }
}
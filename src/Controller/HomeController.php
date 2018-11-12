<?php

namespace App\Controller; 

use Twig\Environment; 
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController{

    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(PropertyRepository $repository)
    {

        $properties = $repository->findLatest(); 

        return $this->render('pages/home.html.twig',[
            'properties' => $properties,

        ]);
    }
    
}

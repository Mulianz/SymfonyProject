<?php
// src/Controller/PersonnageController.php
namespace App\Controller;

use App\Entity\Personnages;  // Assurez-vous que c'est bien 'Personnages' avec un P majuscule
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    #[Route("/personnages", name:"personnage_list")]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Utilisez 'Personnages' avec un P majuscule
        $personnages = $entityManager->getRepository(Personnages::class)->findAll();

        return $this->render('personnage/index.html.twig', [
            'personnages' => $personnages,
        ]);
    }

    #[Route("/personnage/{id}", name:"personnage_detail")]
    public function show(Personnages $personnage): Response
    {
        return $this->render('personnage/show.html.twig', [
            'personnage' => $personnage,
        ]);
    }
}

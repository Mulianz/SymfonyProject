<?php
namespace App\Controller;

use App\Entity\Personnages;  // Assurez-vous que c'est bien 'Personnages' avec un P majuscule
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;  // Ajout de l'importation de la classe Request
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    #[Route("/personnages", name:"personnage_list")]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Vérifier si l'utilisateur est connecté
        $user = $request->getSession()->get('users');
        
        if (!$user) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            return $this->redirectToRoute('app_login');
        }

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


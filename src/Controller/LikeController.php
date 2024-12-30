<?php
// src/Controller/LikeController.php
namespace App\Controller;
use App\Entity\Likes; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like/{filmId}', name: 'like_film', methods: ['POST'])]
    public function likeFilm(int $filmId): Response
    {
        // Vérifie si l'utilisateur est connecté
        $user = $this->getUser();

        if (!$user) {
            // L'utilisateur n'est pas connecté
            return $this->redirectToRoute('app_login');
        }

        // L'utilisateur est connecté
        // Logique pour aimer le film ici

        return $this->render('like/like_confirmation.html.twig');
    }
}

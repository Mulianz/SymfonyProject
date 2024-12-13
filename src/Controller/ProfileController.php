<?php

namespace App\Controller;

use App\Repository\LikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profil')]
    public function profil(LikeRepository $likeRepository): Response
    {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour accéder à votre profil.');
            return $this->redirectToRoute('app_login'); // Redirige vers la page de connexion si non connecté
        }

        // Récupérer les films likés par l'utilisateur
        $likedFilms = $likeRepository->findBy(['user' => $user]);

        return $this->render('profile/profil.html.twig', [
            'user' => $user,
            'likedFilms' => $likedFilms,
        ]);
    }
}
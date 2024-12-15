<?php

namespace App\Controller;

use App\Repository\LikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profil')]
    public function profil(LikeRepository $likeRepository, Request $request): Response
    {
        $user = $request->getSession()->get('users');
    
        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour accéder à votre profil.');
            return $this->redirectToRoute('app_login'); // Redirige vers la page de connexion si non connecté
        }

        // Récupérer les films likés par l'utilisateur
        $likedFilms = $likeRepository->findBy(['user' => $user]);

        return $this->render('profil/profil.html.twig', [
            'users' => $user,
            'likedFilms' => $likedFilms,
        ]);
    }
}
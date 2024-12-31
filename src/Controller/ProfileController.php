<?php

namespace App\Controller;

use App\Repository\LikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profil')]
    public function profil(LikeRepository $likeRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $request->getSession()->get('users');
        
        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour accéder à votre profil.');
            return $this->redirectToRoute('app_login');
        }
    
        // Gestion du bouton Dislike
        if ($request->isMethod('POST')) {
            $filmId = $request->request->get('film_id');
            $like = $likeRepository->findOneBy(['user' => $user, 'film' => $filmId]);
    
            if ($like) {
                $entityManager->remove($like);
                $entityManager->flush();
                $this->addFlash('success', 'Le film a été retiré de vos likes.');
            }
        }
    
        // Récupérer les films likés par l'utilisateur
        $likedFilms = $likeRepository->findBy(['user' => $user]);
    
        return $this->render('profil/profil.html.twig', [
            'users' => $user,
            'likedFilms' => $likedFilms,
        ]);
    }
    
}
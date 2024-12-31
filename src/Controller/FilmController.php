<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Likes;
use App\Entity\Users;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;use App\Repository\LikesRepository;




class FilmController extends AbstractController
{
    #[Route('/', name: 'app_films')]
    public function index(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();  // Récupère tous les films

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    // src/Controller/FilmController.php

    #[Route('/films/{id}', name: 'film_show')]
    public function show(Film $film): Response
    {
        return $this->render('film/show.html.twig', [
            'film' => $film,
        ]);
    }

        #[Route('/films/{id}/like', name: 'app_film_like', methods: ['POST'])]
    public function like(Film $film, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer les données de session
        $session = $request->getSession();
        $userData = $session->get('users');

        if (!$userData) {
            $this->addFlash('error', 'Vous devez être connecté pour liker un film.');
            return $this->redirectToRoute('app_login');
        }

        // Récupérer l'utilisateur depuis l'ID stocké dans la session
        $user = $entityManager->getRepository(Users::class)->find($userData['id']);

        if (!$user) {
            $this->addFlash('error', 'Utilisateur non trouvé.');
            return $this->redirectToRoute('app_login');
        }

        // Vérifier si l'utilisateur a déjà liké ce film
        $existingLike = $entityManager->getRepository(Likes::class)->findOneBy([
            'user' => $user,
            'film' => $film,
        ]);

        if ($existingLike) {
            // Si un like existe, le supprimer
            $entityManager->remove($existingLike);
            $entityManager->flush();

            $this->addFlash('success', 'Vous avez retiré votre like de ce film.');
        } else {
            // Sinon, ajouter un nouveau like
            $like = new Likes();
            $like->setUser($user);
            $like->setFilm($film);

            $entityManager->persist($like);
            $entityManager->flush();

            $this->addFlash('success', 'Vous avez aimé ce film !');
        }

        return $this->redirectToRoute('app_films');
        }
        private function isFilmLikedByUser(Film $film, Users $user, LikesRepository $likesRepository): bool
{
    return (bool) $likesRepository->findOneBy([
        'film' => $film,
        'user' => $user,
    ]);
}

}

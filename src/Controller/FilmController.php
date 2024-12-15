<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Like;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/', name: 'app_films')]
    public function index(FilmRepository $filmRepository): Response
    {
        dd("ici");
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

    #[Route('/films/{id}/like', name: 'app_film_like')]
    public function like(Film $film, EntityManagerInterface $entityManager): Response
    {
    $user = $this->getUser();  // Récupère l'utilisateur connecté
    if (!$user) {
        $this->addFlash('error', 'Vous devez être connecté pour liker un film.');
        return $this->redirectToRoute('app_login'); // Redirige vers la page de connexion
    }

    // Vérifiez si l'utilisateur a déjà liké ce film
    $existingLike = $entityManager->getRepository(Like::class)->findOneBy([
        'user' => $user,
        'film' => $film,
    ]);

    if (!$existingLike) {
        $like = new Like();
        $like->setUser($user);
        $like->setFilm($film);

        $entityManager->persist($like);
        $entityManager->flush();
        $this->addFlash('success', 'Vous avez aimé ce film!');
    } else {
        $this->addFlash('warning', 'Vous avez déjà aimé ce film!');
    }

    return $this->redirectToRoute('app_films');  // Redirige vers la liste des films
}

}

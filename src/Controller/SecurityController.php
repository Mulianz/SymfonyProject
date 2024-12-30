<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FilmRepository;

class SecurityController extends AbstractController
{
    private $passwordHasher;
    private $entityManager;

    public function __construct(
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ) {
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
    }

    // Affichage du formulaire de connexion
    #[Route('/login', name: 'app_login', methods: ['GET'])]
    public function loginForm(): Response
    {
        return $this->render('security/login.html.twig', [
            'error' => null,
        ]);
    }

    // Traitement du formulaire de connexion
    #[Route('/login', name: 'app_login_post', methods: ['POST'])]
    public function login(Request $request): Response
    {
        // Récupérer les données du formulaire
        $data = $request->request->all();
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        // Vérifier si l'email et le mot de passe sont fournis
        if (!$email || !$password) {
            $this->addFlash('error', 'Email ou mot de passe incorect');
            return $this->redirectToRoute('app_login');
        }

        // Trouver l'utilisateur en fonction de l'email
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);

        if (!$user) {
            $this->addFlash('error', 'Email ou mot de passe incorect');
            return $this->redirectToRoute('app_login');
        }

        // Vérifier si le mot de passe est valide
        if (!$this->passwordHasher->isPasswordValid($user, $password)) {
            $this->addFlash('error', 'Email ou mot de passe incorect');
            return $this->redirectToRoute('app_login');
        }

        // Si l'utilisateur est authentifié, créer une session
        $session = $request->getSession();
        // Stocker les informations de l'utilisateur dans la session
        $session->set('users', [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'roles' => $user->getRoles(),
            'pseudo' => $user->getPseudo(),
        ]);

        // Rediriger vers la page d'accueil
        return $this->redirectToRoute('app_films');
    }

    // Page d'accueil (route /)
    #[Route('/', name: 'app_films', methods: ['GET'])]
    public function home(Request $request, FilmRepository $filmRepository): Response
    {
        // Récupérer les données de la session
        $users = $request->getSession()->get('users');
        // Vérifier si les données sont présentes dans la session
        if (!$users) {
            return $this->redirectToRoute('app_login'); // Rediriger vers la page de login si l'utilisateur n'est pas connecté
        }

        // Passer les données à la vue
        $films = $filmRepository->findAll();  // Récupère tous les films

        return $this->render('film/index.html.twig', [
            'films' => $films,
            'users' => $users,
        ]);
    }

    // Déconnexion de l'utilisateur (effacer la session)
    #[Route('/logout', name: 'app_logout')]
    public function logout(Request $request): RedirectResponse
    {
        // Déconnecter l'utilisateur en supprimant la session
        $request->getSession()->remove('users');
        
        // Rediriger vers la page d'accueil ou une autre page après la déconnexion
        return $this->redirectToRoute('app_films');  // Par exemple, rediriger vers la liste des films
    }
}

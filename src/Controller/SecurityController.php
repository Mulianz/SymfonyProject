<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;

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
            return $this->render('security/login.html.twig', [
                'error' => 'Email et mot de passe requis',
            ]);
        }

        // Trouver l'utilisateur en fonction de l'email
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);

        if (!$user) {
            return $this->render('security/login.html.twig', [
                'error' => 'Utilisateur non trouvé',
            ]);
        }

        // Vérifier si le mot de passe est valide
        if (!$this->passwordHasher->isPasswordValid($user, $password)) {
            return $this->render('security/login.html.twig', [
                'error' => 'Mot de passe invalide',
            ]);
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
        return $this->redirectToRoute('app_home');
    }

    // Page d'accueil (route /)
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function home(Request $request): Response
    {
        // Récupérer les données de la session
        $users = $request->getSession()->get('users');

        // Vérifier si les données sont présentes dans la session
        if (!$users) {
            return $this->redirectToRoute('app_login'); // Rediriger vers la page de login si l'utilisateur n'est pas connecté
        }

        // Passer les données à la vue
        return $this->render('base.html.twig', [
            'users' => $users, // Passe l'utilisateur connecté à la vue
        ]);
    }

    // Déconnexion de l'utilisateur (effacer la session)
    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(Request $request): Response
    {
        // Effacer les données de session
        $request->getSession()->invalidate();

        // Rediriger vers la page de connexion
        return $this->redirectToRoute('app_login');
    }
}

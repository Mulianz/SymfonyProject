<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

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
        // Passer 'error' avec null pour le cas où aucune erreur ne s'est produite
        return $this->render('security/login.html.twig', [
            'error' => null, 
        ]);
    }

    // Traitement du formulaire de connexion
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
    // Stockez l'utilisateur dans la session sous la clé 'users'
    $session->set('users', [
        'id' => $user->getId(),
        'email' => $user->getEmail(),
        'roles' => $user->getRoles(),
        'pseudo' => $user->getPseudo(),  // Ajouter le pseudo ici
    ]);

    // Rediriger vers la page d'accueil
    return $this->redirectToRoute('app_home');
}

// Page d'accueil (route /)
#[Route('/', name: 'app_home', methods: ['GET'])]
public function home(Request $request): Response
{
    // Vérifiez si l'utilisateur est connecté
    $users = $request->getSession()->get('users');

    if (!$users) {
        return $this->redirectToRoute('app_login'); // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    }

    // Passer l'utilisateur connecté au template
    return $this->render('home.html.twig', [
        'users' => $users,  // Passez l'utilisateur connecté
    ]);
}

}

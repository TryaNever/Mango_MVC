<?php
namespace App\Controllers;

use App\EntityManager;
use App\Models\Author;
use App\Validator;

class AuthorController extends Controller
{
    private $em;

    public function __construct()
    {
        parent::__construct();
        $this->em = new EntityManager();
    }

    public function login()
    {
        if (empty($_POST)) {
            return $this->render('auth/login.html.twig');
        }

        $validator = new Validator();
        $userClass = $validator->validate($_POST, Author::class);
        $errors = $userClass->getErrors();

        $userMatch = null;
        $authError = 'Email ou mot de passe incorrect';

        if (!empty($_POST['email']) && empty($errors['email'])) {
            $userMatch = $this->em->findById('users', $_POST['email'], 'email');

            if (!$userMatch) {
                $userClass->setError('email', $authError);
            }
        }

        if ($userMatch && empty($errors['password'])) {
            if (!password_verify($_POST['password'], $userMatch['password'])) {
                $userClass->setError('password', $authError);
            }
        }

        if ($userMatch && empty($userClass->getErrors())) {
            $_SESSION['user'] = $userMatch;
            header('Location: /');
            exit;
        }

        return $this->render('auth/login.html.twig', [
            'data' => $_POST ?? [],
            'errors' => $userClass->getErrors(),
        ]);
    }

    public function register()
    {
        if (empty($_POST)) {
            return $this->render('auth/register.html.twig');
        }

        $validator = new Validator();
        $userClass = $validator->validate($_POST, Author::class);
        $errors = $userClass->getErrors();
        $authError = 'Email déja utiliser';
        $status = false;

        if (empty($errors)) {
            $status = $this->em->insertOne("users", $userClass->getAllData(), "email");
            if (!$status) {
                $userClass->setError('email', $authError);
            }
        }

        if ($status && empty($userClass->getErrors())) {
            $_SESSION['user'] = $status;
            header('Location: /');
            exit;
        }

        return $this->render('auth/register.html.twig', [
            'data' => $_POST ?? [],
            'errors' => $userClass->getErrors(),
        ]);
    }

}

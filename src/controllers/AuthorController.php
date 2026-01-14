<?php
namespace App\Controllers;

use App\EntityManager;

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
        $this->render('auth/login.html.twig', []);
    }

}

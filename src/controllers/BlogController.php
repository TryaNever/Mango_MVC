<?php
namespace App\Controllers;

use App\EntityManager;

class BlogController extends Controller
{
    private $em;

    public function __construct()
    {
        parent::__construct();
        $this->em = new EntityManager();
    }

    public function index()
    {
        $blogs = $this->em->findAll('blogs');
        $this->render('blogs.html.twig', ['blogs' => $blogs]);
    }

    public function show($id)
    {
        $blog = $this->em->findById('blogs', $id);
        if (!$blog) {
            http_response_code(404);
            include __DIR__ . '/../../views/errors/page404.php';
            exit;
        }
        $this->render('blog.html.twig', ['blog' => $blog]);
    }
}

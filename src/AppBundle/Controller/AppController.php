<?php declare(strict_types = 1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() : Response
    {
        return $this->render('app/index.html.twig', []);
    }
}

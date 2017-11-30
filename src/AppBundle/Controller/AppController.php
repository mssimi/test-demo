<?php declare(strict_types = 1);

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */
    public function contactAction(Request $request) : Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // send mail logic..
            $this->addFlash('success', 'Question send!');
            return $this->redirectToRoute('contact');
        }

        return $this->render('app/contact.html.twig', [
           'form' => $form->createView()
        ]);
    }
}

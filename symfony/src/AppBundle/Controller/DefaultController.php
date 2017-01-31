<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/hello/{persona}", name="hello_page")
     *
     * @param $persona string
     * @return Response
     */
    public function helloAction($persona = 'carlo')
    {
        $ciao = 'Ciao ' . ucfirst($persona) . '!';
        return new Response($ciao);
    }

    /**
     * @Route("/old-url")
     */
    public function oldAction() {
        return $this->redirectToRoute('hello_page', array(
            'persona' => 'alessandro'
        ));
    }

    /**
     * @Route("/page/{numero}")
     * @Template()
     */
    public function pageAction(Request $request, $numero = 1) {
        $foo = $request->query->get('foo');

        return [
            'numero' => $numero,
            'foo' => $foo
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 14/05/18
 * Time: 11:12
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class PersonController
 * @package AppBundle\Controller
 * @Route("person")
 */
class PersonController extends Controller
{
    /**
     * @Route("/", name="persons")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $persons = $em->getRepository('AppBundle:Person')->findAll();

        return $this->render('default/persons.html.twig', [
            'persons' => $persons,
        ]);

    }

    /**
     * @Route("/add", name="add")
     */
    public function addAction(Request $request, SessionInterface $session)
    {
        $person = new Person();    //On instancie un objet Person
        $form = $this->createForm('AppBundle\Form\PersonType', $person);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            $this->addFlash('success', 'Success');

            return $this->redirectToRoute('persons');
        }

        // createView() permet à la vue d’afficher le formulaire
        return $this->render('default/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/show/{id}", name="person")
     */
    public function showPersonAction(Person $persons)
    {
        return $this->render('default/show.html.twig', [
            'person' => $persons
        ]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 04/06/18
 * Time: 10:02
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function contactAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\ContactType', null, [
            'action' => $this->generateUrl('app_contact'),
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isValid()) {
            if($this->sendEmail($form->getData())) {

                return $this->redirectToRoute('homepage');
            } else {
                var_dump("Errooooor :(");
            }
        }


    }


}
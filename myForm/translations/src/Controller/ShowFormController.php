<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\User;
use App\Form\AddressType;
use App\Form\DemoType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowFormController extends AbstractController
{
    #[Route('/', name: 'app_show_form')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(DemoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd( $form->getData() );
        }

        return $this->renderForm('show_form/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/user', name: 'app_user')]
    public function user(Request $request, UserRepository $userRepository): Response
    {
        $user = new User;

        $form = $this->createForm(UserType::class, $user);

        // dd($request);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            dd( $user );
        }

        return $this->renderForm('show_form/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/address', name: 'app_addresses')]
    public function address(Request $request): Response
    {
        $form = $this->createForm(AddressType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd( $form->getData() );
        }

        return $this->renderForm('show_form/index.html.twig', [
            'form' => $form,
        ]);
    }
}

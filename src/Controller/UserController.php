<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/new', name: 'new_user')]
    public function new(Request $oRequest, EntityManagerInterface $oEM): Response
    {
        $oUser = new User();
        $Form = $this->createForm(UserForm::class, $oUser);
        $Form->handleRequest($oRequest);

        if ($Form->isSubmitted() && $Form->isValid()) {
            $oUser = $Form->getData();
            $oEM->persist($oUser);
            $oEM->flush();

            return $this->redirectToRoute('new_user_success', ['iId' => $oUser->getId()]);
        }

        return $this->render('user/user.success.html.twig', [
            'oForm' => $Form->createView(),
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/UserForm/new_success/{iId}', name: 'new_user_success')]
    public function new_success($iId): Response
    {
        return $this->render('user/new_success.html.twig', [
            'iId' => $iId,
        ]);
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\UserOld;

class UserController extends Controller{

    /**
     *
     * @Route("/user", name="user")
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserAction(Request $request){
        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:UserOld')
            ->findAll();

        $formatted = [];
            foreach ($users as $user){
            $formatted[] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'datePostUser' => $user->getDatePostUser(),
                'typeUser' => $user->getTypeUser(),
            ];
        }

        return new JsonResponse($formatted);
    }

    public function postUserAction(){

    }

    public function editUserAction(){

    }
}
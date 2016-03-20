<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 07/03/2016
 * Time: 13:54
 */

namespace WebTFEBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use WebTFEBundle\Entity\User;
use WebTFEBundle\Services\UserServices;

class ApiAuthController extends controller
{
    /**
     * This method permit login user and return a token to get credidentials on all api-methods.
     *
     * @param Request $request
     * @ApiDoc(
     *  resource=true,
     *  description="Login",
     *  filters={
     *      {"name"="username", "dataType"="string"},
     *      {"name"="password", "dataType"="string"}
     *  },
     *  tags={
     *         "Not Implemented" = "#7C0000"
     *     }
     * )
     * @return JsonResponse
     *
     */

    public function login_checkAction(Request $request) {
        // Retrieve username and password
        $name = $request->get('username');
        $password = $request->get('password');

        $password = sha1($password);

        // Verificate data in database
        $user = $this->getDoctrine()->getRepository('WebTFEBundle:User')->findOneBy(array(
            'name' => $name,
            'password' => $password
        ));

        if($user) {
            // Create token
            $user->createToken();

            // Save user with the token in DB

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $response=$this->render('WebTFEBundle:Add:cstock-csave-citem.html.twig',array('token'=>$user->getToken()));

            $response->headers->setCookie(new Cookie('token', $user->getToken()));

            return $response;

        }

        return $this->render('WebTFEBundle:Login:login-inscription.html.twig',array('erreur_login' =>'Username et/ou mot de passe invalide !'));
    }

    /**
     * This method permit logout user. Token is in headers.
     *
     * @param Request $request
     * @ApiDoc(
     *  resource=true,
     *  description="Logout",
     *  tags={
     *         "Not Implemented" = "#7C0000"
     *     }
     * )
     * @return JsonResponse
     */
    public function logoutAction(Request $request) {
        // Catch token from header
        $user=$this->getUser();
        if($user)
        {
            $token = null;
            $user->setToken($token);
            $this->container->get("security.context")->setToken(null);

            $em = $this->getDoctrine()->getManager();

            $em->flush();
        }

        return $this->redirect($this->generateUrl('webtfe_login_view'));
    }

    public function addAction()
    {
        return $this->render('@WebTFE/Add/cstock-csave-citem.html.twig',array());
    }
    public function loginAction(Request $request)
    {
        return $this->render('WebTFEBundle:Login:login-inscription.html.twig',array());
    }

    public function affAction()
    {
        return $this->render('@WebTFE/Stock/item-stock-save.html.twig',array());
    }

    public function inscriptionAction(Request $request)
    {
        $name = $request->request->get("username");
        $password = $request->get("password");
        $confirm_password = $request->get("confirm_password");
        if($name and $password and $confirm_password)
        {
            if($password == $confirm_password)
            {
                $password = sha1($password);
                $em = $this->getDoctrine()->getEntityManager();
                $user = new User();
                $em->persist($user);
                $user->setName($name);
                $user->setPassword($password);
                $user->createToken();
                $em->flush();

                $stocks=$this->getDoctrine()->getRepository('WebTFEBundle:Stock')->findAll();
                return $this->render('WebTFEBundle:Login:login-inscription.html.twig',array('token'=>$user->getToken()));
            }else
            {
                return $this->render('WebTFEBundle:Login:login-inscription.html.twig',array('erreur_inscription' =>'mot de passe invalide'));
            }
        }else
        {
            return $this->render('WebTFEBundle:Login:login-inscription.html.twig',array('erreur_inscription' =>'Champ(s) imcomplet(s)'));
        }

    }
}
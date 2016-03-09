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

    public function loginAction(Request $request) {
        // Retrieve username and password
        $username = $request->get('username');
        $password = $request->get('password');

        $password = sha1($password);

        // Verificate data in database
        $user = $this->getDoctrine()->getRepository('ApiModComBundle:User')->findOneBy(array(
            'name' => $username,
            'password' => $password
        ));

        if($user) {
            // Create token
            $user->createToken();

            // Save user with the token in DB

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            // Return service#user
            $services_user =  $this->get('user.services');
            return new JsonResponse($services_user->format_response($user));
        }

        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(403);
        return $jsonResponse;
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
        $token = $request->headers->get('token');
        if($token)
        {
            $user = $this->getDoctrine()->getRepository('ApiModComBundle:User')->findOneBy(array('token' => $token));
            // Delete token in db
            if($user) {
                $token = null;
                $user->setToken($token);

                $em = $this->getDoctrine()->getManager();

                $em->flush();
                return new JsonResponse();
            }
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(403);
        return $jsonResponse;
    }
}
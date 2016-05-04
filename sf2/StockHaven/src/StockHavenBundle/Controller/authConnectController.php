<?php

namespace StockHavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthConnectController extends Controller
{
    public function loginAction(Request $request)
    {
        // We recover the fs_user_id
        $username = $request->get('username');
        $password = $request->get('password');

        $password = urldecode($password);

        $password = sha1($password);
        //return new JsonResponse(array('accountName' => $password,'fsUserId'=>$username));

        // check that in the db
        $user = $this->getDoctrine()->getRepository('ApiModComBundle:User')->findOneBy(array(
            'name' => $username,
            'password' => $password,
        ));
        if($user)
        {

            // Create token
            $user->createToken();

            // Save the token in the DB
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            // return service user
            $service_user = $this->get('user.services');
            return new JsonResponse($service_user->format_response($user));
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(403);
        return $jsonResponse;
    }
}

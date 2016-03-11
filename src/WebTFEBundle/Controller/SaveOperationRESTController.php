<?php

namespace WebTFEBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use WebTFEBundle\Entity\SaveOperation;
use WebTFEBundle\Form\SaveOperationType;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View as FOSView;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
 * Add controller.
 * @RouteResource("Add")
 */
class SaveOperationRESTController extends VoryxController
{
    /**
     * Get a Add entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return Response
     *
     */
    public function getAction(SaveOperation $entity)
    {
        $services_saveoperation =  $this->get('saveoperation.services');
        return new JsonResponse($services_saveoperation->format_response($entity));
    }
    /**
     * Get all Add entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     *
     * @return Response
     *
     */
    public function cgetAction()
    {
        $entities = $this->getDoctrine()->getRepository('WebTFEBundle:SaveOperation')->findAll();
        $services_saveoperation =  $this->get('saveoperation.services');
        if ($entities) {
            $results = [];
            foreach($entities as $e)
            {
                $results[] = $services_saveoperation->format_response($e);
            }
            return new JsonResponse($results);
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(404);
        return $jsonResponse;
    }
    /**
     * Create a Add entity.
     *
     * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     *
     * @return Response
     *
     */
    public function postAction(Request $request)
    {
        $entity = new SaveOperation();
        $form = $this->createForm(new SaveOperationType(), $entity, array("method" => $request->getMethod()));
        $this->removeExtraFields($request, $form);
        //$form->handleRequest($request);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $services_saveoperation =  $this->get('saveoperation.services');

            $jsonResponse = new JsonResponse($services_saveoperation->format_response($entity));
            $jsonResponse->setStatusCode(201);
            return $jsonResponse;
        }

        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(400);
        return $jsonResponse;
    }
    /**
     * Update a Add entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, SaveOperation $entity)
    {
        $services_saveoperation =  $this->get('saveoperation.services');
        $em = $this->getDoctrine()->getManager();
        $request->setMethod('PATCH'); //Treat all PUTs as PATCH
        $form = $this->createForm(new SaveOperation(), $entity, array("method" => $request->getMethod()));
        $this->removeExtraFields($request, $form);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->flush();

            return new JsonResponse($services_saveoperation->format_response($entity));
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(404);
        return $jsonResponse;
    }
    /**
     * Partial Update to a Add entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function patchAction(Request $request, SaveOperation $entity)
    {
        return $this->putAction($request, $entity);
    }
    /**
     * Delete a Add entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function deleteAction(Request $request, SaveOperation $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return new JsonResponse(array());
    }
}

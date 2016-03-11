<?php

namespace WebTFEBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use WebTFEBundle\Entity\Item;
use WebTFEBundle\Form\ItemType;

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
 * Item controller.
 * @RouteResource("Item")
 */
class ItemRESTController extends VoryxController
{
    /**
     * Get a Item entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return Response
     *
     */
    public function getAction(Item $entity)
    {
        $services_item =  $this->get('item.services');
        return new JsonResponse($services_item->format_response($entity));
    }

    public function itemAction()
    {
        return $this->render('@WebTFE/Item/create_item-item.html.twig');
    }
    /**
     * Get all Item entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     *
     * @return Response
     */
    public function cgetAction()
    {
        $entities = $this->getDoctrine()->getRepository('WebTFEBundle:Item')->findAll();
        $services_item =  $this->get('item.services');
        if ($entities) {
            $results = [];
            foreach($entities as $e)
            {
                $results[] = $services_item->format_response($e);
            }
            return new JsonResponse($results);
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(404);
        return $jsonResponse;
    }
    /**
     * Create a Item entity.
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
        $entity = new Item();
        $form = $this->createForm(new Item(), $entity, array("method" => $request->getMethod()));
        $this->removeExtraFields($request, $form);
        //$form->handleRequest($request);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $services_item =  $this->get('item.services');

            $jsonResponse = new JsonResponse($services_item->format_response($entity));
            $jsonResponse->setStatusCode(201);
            return $jsonResponse;
        }

        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(400);
        return $jsonResponse;
    }
    /**
     * Update a Item entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, Item $entity)
    {
        $services_item =  $this->get('item.services');
        $em = $this->getDoctrine()->getManager();
        $request->setMethod('PATCH'); //Treat all PUTs as PATCH
        $form = $this->createForm(new ItemType(), $entity, array("method" => $request->getMethod()));
        $this->removeExtraFields($request, $form);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->flush();

            return new JsonResponse($services_item->format_response($entity));
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(404);
        return $jsonResponse;
    }
    /**
     * Partial Update to a Item entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function patchAction(Request $request, Item $entity)
    {
        return $this->putAction($request, $entity);
    }
    /**
     * Delete a Item entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function deleteAction(Request $request, Item $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return new JsonResponse(array());
    }
}

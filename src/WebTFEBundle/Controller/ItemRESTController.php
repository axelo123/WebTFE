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
        $type_id=$request->request->get('type_id');
        $currency_id=$request->request->get('currency_id');
        $barcode_id=$request->request->get('barcode_id');
        //verification des 3 paramettre recuperer
        if (  $type_id and $currency_id and $barcode_id)
        {
            $repo_type=$this->getDoctrine()->getRepository('WebTFEBundle:Type');
            $type = $repo_type->find($type_id);
            $repo_currency=$this->getDoctrine()->getRepository('WebTFEBundle:Currency');
            $currency = $repo_currency->find($currency_id);
            $repo_barcode=$this->getDoctrine()->getRepository('WebTFEBundle:Barcode');
            $barcode=$repo_barcode->find($barcode_id);
            //verification des fs_email
            if($type and $currency and $barcode)
            {
                $entity = new Item();
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $entity->setBarcodeId($barcode);
                $entity->setTypeId($type);
                $entity->setCurrencyId($currency);
                $services_item = $this->get('item.services');
                $em->flush();
                $jsonResponse = new JsonResponse($services_item->format_response($entity));
                $jsonResponse->setStatusCode(201);
                return $jsonResponse;
            }

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

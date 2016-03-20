<?php

namespace WebTFEBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use WebTFEBundle\Entity\Item;
use WebTFEBundle\Entity\Stock;
use WebTFEBundle\Form\StockType;

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
 * Stock controller.
 * @RouteResource("Stock")
 */
class StockRESTController extends VoryxController
{
    /**
     * Get a Stock entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return Response
     *
     */
    public function getAction(Stock $entity)
    {
        $services_stock =  $this->get('stock.services');
        return new JsonResponse($services_stock->format_response($entity));
    }
    /**
     * Get all Stock entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     *
     * @return Response
     *
     */
    public function cgetAction()
    {
        $entities = $this->getDoctrine()->getRepository('WebTFEBundle:Stock')->findAll();
        $services_stock =  $this->get('stock.services');
        if ($entities) {
            $results = [];
            foreach($entities as $e)
            {
                $results[] = $services_stock->format_response($e);
            }
            return new JsonResponse($results);
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(404);
        return $jsonResponse;
    }

    public function stockAction()
    {
        $json=json_decode($this->cgetAction());
        return $this->render('item-stock-save.html.twig',array('stocks'=>$json));

    }
    /**
     * Create a Stock entity.
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
        $user_creator_id=$request->request->get('user_creator_id');
        $barcode_id=$request->request->get('barcode_id');
        $name=$request->request->get('name');
        $is_delete=$request->request->get('is_delete');
        //verification des 3 paramettre recuperer
        if (  $user_creator_id and $barcode_id)
        {
            $repo_user=$this->getDoctrine()->getRepository('WebTFEBundle:User');
            $user = $repo_user->find($user_creator_id);
            $repo_barcode=$this->getDoctrine()->getRepository('WebTFEBundle:Barcode');
            $barcode=$repo_barcode->find($barcode_id);
            //verification des fs_email
            if($user and $barcode)
            {
                $entity = new Stock();
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $entity->setBarcodeId($barcode);
                $entity->setUserCreatorId($user);
                $entity->setName($name);
                $entity->setIsDelete($is_delete);
                $services_stock = $this->get('stock.services');
                $em->flush();
                $jsonResponse = new JsonResponse($services_stock->format_response($entity));
                $jsonResponse->setStatusCode(201);
                return $jsonResponse;
            }

        }

        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(400);
        return $jsonResponse;
    }
    /**
     * Update a Stock entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, Stock $entity)
    {
        $services_stock =  $this->get('stock.services');
        $em = $this->getDoctrine()->getManager();
        $request->setMethod('PATCH'); //Treat all PUTs as PATCH
        $form = $this->createForm(new StockType(), $entity, array("method" => $request->getMethod()));
        $this->removeExtraFields($request, $form);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->flush();

            return new JsonResponse($services_stock->format_response($entity));
        }
        $jsonResponse = new JsonResponse();
        $jsonResponse->setStatusCode(404);
        return $jsonResponse;
    }
    /**
     * Partial Update to a Stock entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function patchAction(Request $request, Stock $entity)
    {
        return $this->putAction($request, $entity);
    }
    /**
     * Delete a Stock entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function deleteAction(Request $request, Stock $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return new JsonResponse(array());
    }

}

<?php

namespace WebTFEBundle\Services;

use WebTFEBundle\Entity\Stock;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class StockServices
{
    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    public function format_response(Stock $stock)
    {
        if($stock)
        {
            $user_services = $this->container->get('user.services');
            return array(
                "id"=>$stock->getId(),
                "name"=>$stock->getName(),
                "user_creator_id"=>$user_services->format_response($stock->getUserCreatorId()),
                "is_delete"=>$stock->getIsDelete(),
                "barcode_id"=>$stock->getBarcodeId()
            );
        }
        return array();

    }
}

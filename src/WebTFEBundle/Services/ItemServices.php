<?php

namespace WebTFEBundle\Services;

use WebTFEBundle\Entity\Item;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ItemServices
{
    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    public function format_response(Item $item)
    {
        if($item)
        {
            $barcode_services = $this->container->get('barcode.services');
            $currency_services = $this->container->get('currency.services');
            $type_services = $this->container->get('type.services');
            return array(
                "id"=>$item->getId(),
                "name"=>$item->getName(),
                "type_id"=>$type_services->format_response($item->getTypeId()),
                "quantity"=>$item->getQuantity(),
                "is_delete"=>$item->getIsDelete(),
                "count_update"=>$item->getCountUpdate(),
                "currency_id"=>$currency_services->format_response($item->getCurrencyId()),
                "price"=>$item->getPrice(),
                "description"=>$item->getDescription(),
                "barcode_id"=>$barcode_services->format_response($item->getBarcodeId())
            );
        }
        return array();

    }
}

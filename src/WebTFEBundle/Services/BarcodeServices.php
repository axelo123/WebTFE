<?php

namespace WebTFEBundle\Services;

use WebTFEBundle\Entity\Barcode;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BarcodeServices
{
    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    public function format_response(Barcode $barcode)
    {
        if($barcode)
        {
            return array(
                "id"=>$barcode->getId(),
                "barcode"=>$barcode->getBarcode()
            );
        }
        return array();

    }
}

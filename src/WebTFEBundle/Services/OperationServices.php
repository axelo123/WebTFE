<?php

namespace WebTFEBundle\Services;

use WebTFEBundle\Entity\Operation;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class OperationServices
{
    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    public function format_response(Operation $operation)
    {
        if($operation)
        {
            return array(
                "id"=>$operation->getId(),
                "name"=>$operation->getName()
            );
        }
        return array();

    }
}

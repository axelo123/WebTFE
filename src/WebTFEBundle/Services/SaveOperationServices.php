<?php

namespace WebTFEBundle\Services;

use WebTFEBundle\Entity\SaveOperation;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SaveOperationServices
{
    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    public function format_response(SaveOperation $save_operation)
    {
        if($save_operation)
        {
            $stock_services = $this->container->get('stock.services');
            $operation_services = $this->container->get('operation.services');
            $user_services = $this->container->get('user.services');
            $item_services = $this->container->get('item.services');
            return array(
                "id"=>$save_operation->getId(),
                "stock_id"=>$stock_services->format_response($save_operation->getStockId()),
                "operation_id"=>$operation_services->format_response($save_operation->getOperationId()),
                "modification_date"=>$save_operation->getModificationDate(),
                "user_id"=>$user_services->format_response($save_operation->getUserId()),
                "article_id"=>$item_services->format_response($save_operation->getArticleId())
            );
        }
        return array();

    }
}

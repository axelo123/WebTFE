<?php

namespace WebTFEBundle\Services;

use WebTFEBundle\Entity\Stock_User;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Stock_UserServices
{
    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    public function format_response(Stock_User $stock_user)
    {
        if($stock_user)
        {
            $stock_services = $this->container->get('stock.services');
            $user_services = $this->container->get('user.services');
            return array(
                "id"=>$stock_user->getId(),
                "user_id"=>$user_services->format_response($stock_user->getUserId()),
                "stock_id"=>$stock_services->format_response($stock_user->getStockId()),
                "parent_id"=>$user_services->format_response($stock_user->getParentId())
            );
        }
        return array();

    }
}

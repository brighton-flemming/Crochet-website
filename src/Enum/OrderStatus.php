<?php

namespace App\Enum;

enum OrderStatus: string
{
    case IN_TRANSIT = 'in_transit';
    case SHIPPED = 'shipped';
    case IN_DELIVERY = 'in_delivery';
    case DELIVERED = 'delivered';
    case AWAITING_PICKUP = 'awaiting_pickup';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}



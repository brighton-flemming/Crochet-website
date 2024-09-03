<?php

namespace App\Enum;

enum PaymentStatus: string
{
    case UNPAID = 'unpaid';
    case PENDING = 'pending';
    case PAID = 'paid';
    case REFUNDED = 'refunded';

}

<?php

namespace Callmeaf\Media\Enums;

enum MediaDisk: string
{
    case UPLOADS = 'uploads';
    case USERS = 'users';
    case PRODUCTS = 'products';
    case VARIATIONS = 'variations';
    case PAYMENTS = 'payments';
}

<?php

namespace Callmeaf\Media\Enums;

enum MediaDisk: string
{
    case UPLOADS = 'uploads';
    case USERS = 'users';
    case PRODUCTS = 'products';
    case PRODUCT_CATEGORIES = 'product_categories';
    case VARIATIONS = 'variations';
    case PAYMENTS = 'payments';
    case ADDRESSES = 'addresses';
}

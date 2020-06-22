<?php
/**
 * Created by PhpStorm.
 * User: GiangNT
 * Date: 20/02/2020
 * Time: 12:58 PM
 */

namespace App\Common;


class Constant
{
    CONST LANGUAGE_SUPPORT = [
        'en',
        'vi',
        'ko',
    ];
    CONST PATH_API = 'api';
    CONST PATH_ADMIN = 'admin';
    CONST PATH_AUTH = 'auth';

    CONST PARAM_LANG = 'lang';

    CONST DB_ACTIVE_FLAG = '1';
    CONST DB_INACTIVE_FLAG = '0';

    CONST DB_ORDER_STATUS_NEW = 'new';
    CONST DB_ORDER_STATUS_SYS_FAIL = 'system fail';
    CONST DB_ORDER_STATUS_NOT_PAID = 'not paid';
    CONST DB_ORDER_STATUS_PAID = 'paid';
    CONST DB_ORDER_STATUS_SHIPPING = 'shipping';
    CONST DB_ORDER_STATUS_COMPLETE = 'complete';

    // Root images storage path
    CONST PATH_ROOT_IMAGES = 'public/images/';

    //Product column sort
    CONST DB_PRODUCT_COLUMN_SORT_MAPPING = [
        'id' => 'p_id',
        'code' => 'p_code',
        'name' => 'p_name',
        'price' => 'p_sell_price',
    ];

    // Unit by Gigabyte(GB)
    CONST DB_PRODUCT_DATA_CAPACITY = [
        '1', '2', '3', '4', '5',
        '6', '7', '8', '9', '10',
    ];

    // Unit by minutes
    CONST DB_PRODUCT_VOICE = [
        '30', '60', '90', '120'
    ];

    // Unit by WEEK
    CONST DB_PRODUCT_DURATION = [
        '1', '2', '3', '4'
    ];

    // No unit
    CONST DB_PRODUCT_CARRIER = [
        'mobiphone', 'vinaphone', 'viettel',
    ];

    // No unit
    CONST DB_PRODUCT_NETWORK = [
        '3g', '4g', '5g',
    ];

    // No unit
    CONST DB_PRODUCT_SIM_SIZE = [
        'mini', 'micro', 'nano', 'e-sim',
    ];

    // No unit
    CONST DB_MERCHANT_TYPE = [
        'coffee', 'movie', 'spa', 'theater', 'health'
    ];

}

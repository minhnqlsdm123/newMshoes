<?php
/**
 * Created by PhpStorm.
 * User: GiangNT
 * Date: 21/02/2020
 * Time: 8:33 AM
 */

/**
 * For Laravel framework related functions
 */

use App\Common\Constant;
use Illuminate\Support\Str;

/**
 * Generate URL resource asset for back-end operator (admin)
 *
 * @param string $asset Asset Name
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 */
function assetBo($asset = "")
{
    return url("assets/" . Constant::PATH_ADMIN . "/" . $asset);
}

/**
 * Generate URL storage asset (like upload file)
 *
 * @param string $asset
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 */
function assetStorage($asset = "")
{
    return url("storage/" . $asset);
}

/**
 * Generate URL storage image (like upload file)
 *
 * @param string $asset
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 */
function imagesStorage($asset = "")
{
    return url("storage/images/" . $asset);
}

/**
 * Generate storage image path
 * 
 * @param array $listImage
 * @param bool $withFullURL
 * @return \Illuminate\Support\Collection
 */
function adminStorageImage($listImage = [], $withFullURL = false){
    return collect($listImage)->map(function ($item, $key) use ($withFullURL) {
        if ($withFullURL) {
            $item['url'] = imagesStorage($item['url']);
        } else {
            $item['url'] = 'images/' . $item['url'];
        }
        return $item;
    });
}

/**
 * Generate URL for router back-end operator (admin)
 *
 * @param string $name
 * @param array $parameters
 * @param bool $absolute
 * @return string
 */
function routerBo($name = "", $parameters= [], $absolute = true)
{
    $locateCurrent = app()->getLocale();
    $parameters = collect(['locate' => $locateCurrent])->merge($parameters)->all();
    return route($name, $parameters, $absolute);
}

/**
 * Generate URL for route front-end extend
 *
 * @param string $name
 * @param array $parameters
 * @return string
 */
function routerExt($name = "", $parameters= [])
{
    $locateCurrent = app()->getLocale();
    $parameters = collect(['locate' => $locateCurrent])->merge($parameters)->all();
    return route($name, $parameters);
}

function addActionForHeaderTable($arrHeader = [], $flgAction = true)
{
    $headerTransform = [];

    if (count($arrHeader) > 1) {
        $headerTransform = $arrHeader;
        if ($flgAction) {
            array_push($headerTransform, __('common.bo-action'));
        }
    }

    return $headerTransform;
}

function statusToString($status)
{
    return $status == 1 ? __('common.status-active') : __('common.status-inactive');
}

function checkAndTake(&$value, $defaultSet = '', $trimFlg = false)
{
    $value = isset($value) ? $value : $defaultSet;
    if ($trimFlg) {
        $value = trim($value);
    }
    return $value;
}

function itemsArrayToString($arrData = [], $key = 'id', $delimiter = ','){
    $str = '';
    if (!empty($arrData)) {
        $str = collect($arrData)->implode($key, $delimiter);
    }
    return $str;
}

function stringItemsToArray($strItems = '', $delimiter = ','){
    $arrData = [];
    if (!empty($strItems)) {
        $arrData = collect(explode($delimiter, $strItems))->filter()->all();
    }
    return $arrData;
}


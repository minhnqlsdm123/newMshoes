<?php


namespace App\Repositories;


use App\Model\Brand;

class BrandsRepo
{
    public function getBrandsManage(){
        $list=Brand::all();
        return $list;
    }
}
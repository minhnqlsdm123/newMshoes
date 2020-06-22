<?php


namespace App\Repositories;


use App\Model\Brand;
use Illuminate\Support\Str;

class BrandsRepo
{
    public function getBrandsManage(){
        $list=Brand::all();
        return $list;
    }

    public function insertBrand($data=[]){

        $resultInsert = false;
        if (count($data) >0){
            $brand = new Brand();
            $brand->name=$data['name'];
            $brand->description=$data['description'];
            $brand->country=$data['country'];
            $brand->slug= Str::slug($data['name']);
            $brand->save();

            $resultInsert=true;
        }

        return $resultInsert;
    }
}

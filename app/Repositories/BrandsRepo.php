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

    public function getBrandById($id_brand){
        $brand=Brand::where('id_brand','=',$id_brand)->first();
        return $brand;
    }

    public function updateBrand($data=[], $id_brand){
        $resultInsert = false;
        if (count($data) > 0){
            $id_cat = $id_brand;
            $brand = $this->getBrandById($id_brand);
            $brand->name = $data['name'];
            $brand->description = $data['description'];
            $brand->country = $data['country'];
            $brand->slug = Str::slug($data['name'],'-');
            $brand->save();

            $resultInsert = true;
        }

        return $resultInsert;
    }
    public function deleteBrand($id_brand){
        $resultDelete = false;
        $brand = Brand::where('id_brand',$id_brand)->delete();
        if ($brand == 1){
            $resultDelete=true;
        }
        return $resultDelete;
    }
}

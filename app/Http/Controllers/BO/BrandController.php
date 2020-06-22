<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\iController\iBrandsManage;
use App\Repositories\BrandsRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends _AppBOController implements iBrandsManage
{
    public function __construct()
    {
        parent::__construct();
        $this->repo=new BrandsRepo();


    }

    public function getListBrands(Request $request)
    {
        $headers=[];
        $listBrands=$this->repo->getBrandsManage();
        $headers=[
            'id_brand',
            'name',
            'description',
            'country',
            'created_at',
            'action'
        ];

        return view('BO.manage.brand.allBrand',[
           'listBrands'=>$listBrands,
           'headers'=>$headers
        ]);


    }

    public function addBrand(Request $request)
    {
        // TODO: Implement addBrand() method.
    }

    public function updateBrand(Request $request, $lang, $id_brand)
    {
        // TODO: Implement updateBrand() method.
    }

    public function deleteBrand(Request $request)
    {
        // TODO: Implement deleteBrand() method.
    }
}

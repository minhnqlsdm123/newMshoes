<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\iController\iBrandsManage;
use App\Repositories\BrandsRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
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
        if ($request->isMethod('post')){
            $validator=Validator::make($request->all(),[
               'name'=>'required|string|unique:brands',
                'description'=>'required|string',
                'country'=>'required|string'
            ]);
            if ($validator->fails()){
                $request->flash();
                return view('BO.manage.brand.addNewBrand')->withErrors($validator);
            }

            $rs = $this->repo->insertBrand($request->all());

            return redirect(route('BrandManage'))->with('status','Brand '.$request->input('name').' added !');

        }else{
            return view('BO.manage.brand.addNewBrand');
        }
    }

    public function updateBrand(Request $request,$id_brand)
    {
        $brand=$this->repo->getBrandById($id_brand);
//        dd($brand);

        if ($request->isMethod('post')){
            $validator=Validator::make($request->all(),[
                'name'=>'required|string',
                'description'=>'required|string',
                'country'=>'required|string'
            ]);
            if ($validator->fails()){
                $request->flash();
                return view('BO.manage.updateBrand')->withErrors($validator);

            }
            $rs=$this->repo->updateBrand($request->all(),$brand['id_brand']);

            return redirect(route('BrandManage'))->with('status', 'Brand ' . $request->input('name') . ' edited!');
        }else{
            return view('BO.manage.brand.updateBrand',['brand'=>$brand]);
        }
    }

    public function deleteBrand(Request $request)
    {
        $requestData = $request->all();
//        dd($requestData);
        $resultDelete = false;
        if ($request->isMethod('post')) {
            $brandId = $requestData['code'];
            $resultDelete = $this->repo->deleteBrand($brandId);
            $message = __('message-success-delete');
            return response()->json(array('resultDelete'=>$resultDelete,'message'=>$message));
        }
    }
}

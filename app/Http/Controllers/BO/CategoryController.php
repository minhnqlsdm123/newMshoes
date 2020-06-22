<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Http\Controllers\iController\iCategoriesManage;
use App\Model\Category;
use App\Repositories\CategoriesRepo;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class CategoryController extends _AppBOController implements iCategoriesManage
{
    private $repo=null;

    public function __construct(){

        parent::__construct();

        $this->repo = new CategoriesRepo();
    }

    public function getListCategories(Request $request)
    {
        $headers = [];
        $listCategory=$this->repo->getCategoriesManege();
        $headers = [
            'id_cat',
            'name',
            'slug',
            'created_at',
            'action'
        ];
        if(is_null($listCategory)){
            $headers=$listCategory->first()->toArray();
            $headers = addActionForHeaderTable((collect($headers))->keys()->toArray(), true);
        }


        return view('BO.manage.category.allCategories',[
            'listCategory'=>$listCategory,
            'headers'=>$headers
        ]);
    }

    public function addCategory(Request $request)
    {

        if ($request->isMethod('post')){
                $validator=Validator::make($request->all(),[
                    'name'=>'required|string'
                ]);
                if ($validator->fails()) {
                    $request->flash();
                    return view('BO.manage.category.addNewCategory')->withErrors($validator);
                }

                    $rs = $this->repo->insertCategory($request->all());

                    return redirect(routerBo('CategoryManage'))->with('status', 'Category ' . $request->input('name') . ' added!');
            }else{
                    return view('BO.manage.category.addNewCategory');
                }

    }

    public function updateCategory(Request $request, $id_cat)
    {
        $category = $this->repo->getCategoryById($id_cat);
//        dd($category);

        if ($request->isMethod('post')){
            $validator=Validator::make($request->all(),[
                'name'=>'required|string'
            ]);
            if ($validator->fails()) {
                $request->flash();
                return view('BO.manage.category.updateCategory')->withErrors($validator);
            }

            $rs = $this->repo->updateCategory($request->all(),$category['id_cat']);

            return redirect(routerBo('CategoryManage'))->with('status', 'Category ' . $request->input('name') . ' edited!');
        }else{
            return view('BO.manage.category.updateCategory', ['category'=>$category]);
        }
    }

    public function deleteCategory(Request $request)
    {
//        $dataRequest = $request->all();
//        $CategoryID = $request->input('code');
//        $rs = $this->repo->deleteCategory($CategoryID);
//
//        return response()->json($rs);

        $requestData = $request->all();
        $resultDelete = false;
        if ($request->isMethod('post')) {
            $categoryID = $requestData['code'];
            $resultDelete = $this->repo->deleteCategory($categoryID);
            $message = __('message-success-delete');
            return response()->json(array('resultDelete'=>$resultDelete,'message'=>$message));
        }
    }

}

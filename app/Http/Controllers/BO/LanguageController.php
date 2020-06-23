<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\iController\iLanguageManage;
use App\Model\Language;
use App\Repositories\LanguagesRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class LanguageController extends _AppBOController implements iLanguageManage
{
    public function __construct()
    {
        parent::__construct();
        $this->repo = new LanguagesRepo();
    }


    public function getListLanguages(Request $request)
    {
        $headers=[];
        $headers = [];
        $listLanguage = $this->repo->getLanguagesManage();
        if ($listLanguage->count() > 0) {
            $headers = $listLanguage->first()->toArray();
            $headers = addActionForHeaderTable((collect($headers))->keys()->toArray(), true);
        }

        return view('BO.manage.language.allLanguages',[
            'listLanguage'=>$listLanguage,
            'headers'=>$headers
        ]);
    }

    public function addLanguage(Request $request)
    {
        if ($request->isMethod('post')) {
//            dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'code' => 'required|string'
            ]);

            if ($validator->fails()) {
                $request->flash();
                return view('BO.manage.language.addNewLanguage')->withErrors($validator);
            }
            $rs = $this->repo->insertLanguage($request->all());

            return redirect(routerBo('LanguageManage'))->with('status', 'Language ' . $request->input('name') . ' added!');
        }else{
            return view('BO.manage.language.addNewLanguage');
        }
    }

    public function updateLanguage(Request $request, $code)
    {
        // TODO: Implement updateLanguage() method.
    }

    public function deleteLanguage(Request $request)
    {
        $resultDelete = false;
        $code = $request->code;
        $langItem = Language::where('code', $code)->first();
        if ($langItem) {
            $langItem->is_active = 0;
            $langItem->save();
            $langItem->delete();
            $resultDelete = true;
            $message = __('message-success-delete');
            return response()->json(array('resultDelete'=>$resultDelete,'message'=>$message));
        }

    }
}

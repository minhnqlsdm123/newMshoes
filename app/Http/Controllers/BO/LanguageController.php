<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\iController\iLanguageManage;
use App\Repositories\LanguagesRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // TODO: Implement addLanguage() method.
    }

    public function updateLanguage(Request $request, $code)
    {
        // TODO: Implement updateLanguage() method.
    }

    public function deleteLanguage(Request $request)
    {
        // TODO: Implement deleteLanguage() method.
    }
}

<?php


namespace App\Http\Controllers\iController;
use Illuminate\Http\Request;

interface iLanguageManage
{
    public function getListLanguages(Request $request);

    public function addLanguage(Request $request);

    public function updateLanguage(Request $request,$code);

    public function deleteLanguage(Request $request);
}

<?php


namespace App\Repositories;


use App\Model\Language;

class LanguagesRepo
{
    public function getAllLanguages(){
        $list = Language::where('is_active', 1)->select(['code', 'name', 'is_active'])->get();
        return $list;
    }

    public function getLanguagesManage(){
        $list = Language::where('deleted_at')->select(['code', 'name', 'is_active'])->get();
        return $list;
    }

}

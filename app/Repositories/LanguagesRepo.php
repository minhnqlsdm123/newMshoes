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

    public function insertLanguage($data=[] ){
        $resultInsert=false;
        if (count($data)>0){
            $language=new Language();
            $language->code=$data['code'];
            $language->name=$data['name'];
            $language->is_active=$data['isActive'];
            $language->save();
            $resultInsert=true;
        }
        return $resultInsert;

    }

    public function updateLanguage($data=[],$code){
        $resultUpdate=false;
        $objLang = Language::where('code',$code)->first();
        if(count($data)>0){
            $objLang->code = $data['code'];
            $objLang->name = $data['name'];
            $objLang->is_active = $data['isActive'];
            $objLang->save();
            $resultUpdate=true;
        }
        return $resultUpdate;
    }


    public function deleteLanguage($code){
        $resultDelete=true;
        $language=Language::where('code',$code)->delete();
//        if ($language==1){
//            $resultDelete=true;
//        }
        return $resultDelete;
    }

}

<?php

namespace App\Repositories;

use App\Model\Category;
use Illuminate\Support\Str;

class CategoriesRepo
{
    public function getCategoriesManege(){
        $list=Category::orderBy('id_cat', 'desc')->get();
        return $list;
    }

        public function insertCategory($data=[] ){

            $resultInsert = false;
            if (count($data) > 0){
                $category = new Category();
                $category->name = $data['name'];
                $category->slug = Str::slug($data['name'],'-');
                $category->save();

                $resultInsert = true;
            }

            return $resultInsert;
    }

    public function getCategoryById($id_cat){
        $category = Category::where('id_cat',$id_cat)->first();
        return $category;
    }

    public function updateCategory($data=[], $id_Cat){
        $resultInsert = false;
        if (count($data) > 0){
            $id_cat = $id_Cat;
            $category = $this->getCategoryById($id_cat);
            $category->name = $data['name'];
            $category->slug = Str::slug($data['name'],'-');
            $category->save();

            $resultInsert = true;
        }

        return $resultInsert;
    }

    public function deleteCategory($id){
        $resultDelete = false;
        $category = Category::where('id_cat', $id)->delete();

        if ($category == 1) {
            $resultDelete = true;
        }
        return $resultDelete;

    }
}

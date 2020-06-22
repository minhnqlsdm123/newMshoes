<?php

namespace App\Http\Controllers\iController;

use Illuminate\Http\Request;


interface iCategoriesManage
{
    public function getListCategories(Request $request);

    public function addCategory(Request $request);

    public function updateCategory(Request $request,$id_cat);

    public function deleteCategory(Request $request);
}

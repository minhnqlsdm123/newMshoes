<?php


namespace App\Http\Controllers\iController;


use Illuminate\Http\Request;

interface iBrandsManage
{
    public function getListBrands(Request $request);

    public function addBrand(Request $request);

    public function updateBrand(Request $request, $id_brand);

    public function deleteBrand(Request $request);
}

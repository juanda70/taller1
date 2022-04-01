<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\Productbreed;
use App\Models\Product;
use Lang;

class ProductBreedController extends Controller
{
    //
    public function index($id)
    {
        $breed = Breed::find($id);
        $cont=0;
        $idProducts = array();
        $breedId = $id;
        $productbreeds = Productbreed::where('breed_id', $breedId)->get();
        foreach ($productbreeds as $productbreeds) {
            $idProducts[$cont] = $productbreeds->getProductId();
            $cont= $cont+1;
        }
        $viewData = [];
        $viewData["title"] = Lang::get("Products - Online Store");
        $viewData["subtitle"] =  $breed->getName()." ".Lang::get("Products");
        $viewData["products"] = Product::findMany($idProducts);
        
        return view('productbreed.index')->with("viewData", $viewData);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Productbreed;
use App\Models\breed;
use Lang;

class ProductController extends Controller
{

    public function index()
    {
        
        $viewData = [];
        $viewData["title"] = Lang::get("Products - Online Store");
        $viewData["subtitle"] =  Lang::get("List of products");
        $viewData["products"] = Product::with('productbreeds')->get();
        $viewData["breeds"] = breed::get();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName().Lang::get(" - Online Store");
        $viewData["subtitle"] =  $product->getName().Lang::get(" - Product information");
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}

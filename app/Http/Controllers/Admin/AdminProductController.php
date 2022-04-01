<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setMaker($request->input('maker'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setCategoty($request->input('categoty'));
        $newProduct->setQuantifyAvailable($request->input('quantifyAvailable'));
        if ($request->hasFile('image')) {
            /**$imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName); */
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $nameImage);
            $newProduct->setImage($nameImage);
        }
        $newProduct->save();

        /**if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        } */

        return back();
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Product - Online Store";
        $viewData["product"] = Product::findOrFail($id);
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setMaker($request->input('maker'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setCategoty($request->input('categoty'));
        $product->setQuantifyAvailable($request->input('quantifyAvailable'));

        if ($request->hasFile('image')) {
            /**$imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName); */
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $nameImage);
            $product->setImage($nameImage);
        }

        $product->save();
        return redirect()->route('admin.product.index');
    }
}

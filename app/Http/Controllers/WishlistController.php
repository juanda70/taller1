<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Productwishlist;

class wishlistController extends Controller
{
    //
    public function index()
    {
        $cont=0;
        $idProducts = array();
        $idUser = auth()->id();
        $idwishlist = Wishlist::findOrFail($idUser);
        $Productwishlist = Productwishlist::where('wishlist_id', $idwishlist->getId())->get();
        foreach ($Productwishlist as $wishlist)
        {
            $idProducts[$cont] = $wishlist->getProductId();

        }
        $viewData = [];
        $viewData["title"] = "wishlist - Online Store";
        $viewData["subtitle"] =  "List of wishlist";
        $viewData["wishlists"] = Product::findMany($idProducts);

        return view('wishlist.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $pet = Pet::findOrFail($id);
        $breed = Breed::findOrFail($pet->getBreedId());
        $viewData["title"] = $pet->getName()." - Online Store";
        $viewData["subtitle"] =  $pet->getName()." - pet information";
        $viewData["pet"] = $pet;
        $viewData["breed"] = $breed;
        return view('pet.show')->with("viewData", $viewData);
    }
    public function create()
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create pet";
        $viewData["breeds"] = Breed::all();
        return view('pet.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        Pet::validate($request);
        $pet = new Pet();
        $pet->setName($request->name);
        $pet->setWeight($request->weight);
        $pet->setDateBirth($request->dateBirth);
        $pet->setGender($request->gender);
        $pet->setBreedId($request->breed_id);
        $pet->setUserId(auth()->id());
        $pet->save();
        return back()->with("msg",__('message.Item created Successfully'));

    }
    public function destroy($id)
    {
        Pet::destroy($id);
        return view('pet.delete');
    }
}

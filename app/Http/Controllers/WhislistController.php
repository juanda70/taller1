<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Whislist;
use App\Models\Productwhislist;
use App\Models\Product;

class WhislistController extends Controller
{
    //
    public function index()
    {
        $cont=0;
        $idProducts = array();
        $idUser = auth()->id();
        $idWhislist = Whislist::findOrFail($idUser);
        $Productwhislist = Productwhislist::where('whislist_id', $idWhislist->getId())->get();
        foreach ($Productwhislist as $whislist)
        {
            $idProducts[$cont] = $whislist->getProductId();
           
        }
        $viewData = [];
        $viewData["title"] = "whislist - Online Store";
        $viewData["subtitle"] =  "List of whislist";
        $viewData["whislists"] = Product::findMany($idProducts);
        
        return view('whislist.index')->with("viewData", $viewData);
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

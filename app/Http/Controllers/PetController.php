<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Breed;
class PetController extends Controller
{
    //
   
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "pets - Online Store";
        $viewData["subtitle"] =  "List of pets";
        
        $viewData["pets"] = Pet::orderBy('id','DESC')->get();
        $viewData["breeds"] = Breed::with('pets')->get();

        return view('pet.index')->with("viewData", $viewData);
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
        print($request);
        Pet::create($request->only(["name","weight","dateBirth","gender","breed_id"]));

        return back()->with("msg",'Elemento creado satisfactoriamente');

    }
    public function destroy($id)
    {
        Pet::destroy($id);
        return view('pet.delete');
    }
}



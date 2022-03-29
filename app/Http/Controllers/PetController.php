<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Breed;
class PetController extends Controller
{
    //
   
    public function index()
    {
        $idUser = auth()->id();
        $viewData = [];
        $viewData["title"] = "pets - Online Store";
        $viewData["subtitle"] =  "List of pets";
        $viewData["pets"] = Pet::where('user_id', $idUser)->get();
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
    public function edit($id)
    {
        $viewData = [];
        $pet = Pet::findOrFail($id);
        $breed = Breed::findOrFail($pet->getBreedId());
        $viewData["title"] = $pet->getName()." - Online Store";
        $viewData["subtitle"] =  $pet->getName()." - pet information";
        $viewData["pet"] = $pet;
        $viewData["breeds"] = Breed::with('pets')->get();
        return view('pet.edit')->with("viewData", $viewData);
    }
    public function update(Request $request,$id)
    {
        Pet::validate($request);
        $pet = Pet::findOrFail($id);
        $pet->setName($request->name);
        $pet->setWeight($request->weight);
        $pet->setDateBirth($request->dateBirth);
        $pet->setGender($request->gender);
        $pet->setBreedId($request->breed_id);
        $pet->save();
        return back()->with("msg", __('message.Item Updated Successfully'));

    }
}



<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRoleController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - Online Store";
        $viewData["users"] = User::all();
        return view('admin.role.index')->with("viewData", $viewData);
    }

    public function delete($id)
    {
        User::destroy($id);
        return back();
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit User - Online Store";
        $viewData["user"] = User::findOrFail($id);
        return view('admin.role.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        User::validate($request);
        $user = User::findOrFail($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setRole($request->input('role'));
        $user->save();
        return redirect()->route('admin.role.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist.index', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(Product::find($product_id))
            {
                $wish = new Wishlist();
                $wish->product_id = $product_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product added to wishlist"]);
            }
            else{
                return response()->json(['status' => "Product doesnot exist"]);
            }
        }
        else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
}

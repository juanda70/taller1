<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Productwishlist;
use App\Models\Product;
use Lang;

class WishListController extends Controller
{
    //
    public function index()
    {
        $cont=0;
        $idProducts = array();
        $idUser = auth()->id();
        $idWishlist = Wishlist::findOrFail($idUser);
        $ProductWishlist = Productwishlist::where('wishlist_id', $idWishlist->getId())->get();
        foreach ($ProductWishlist as $wishlist) {
            $idProducts[$cont] = $wishlist->getProductId();
            $cont= $cont+1;
        }
        $viewData = [];
        $viewData["title"] = Lang::get("Wishlist - Online Store");
        $viewData["subtitle"] =  Lang::get("Wishlist");
        $viewData["wishlists"] = Product::findMany($idProducts);
        
        return view('wishlist.index')->with("viewData", $viewData);
    }
    public function saveWishlist()
    {
       
        $wishlist = new Wishlist();
        $wishlist->setUserId(auth()->id());
        $wishlist->save();
        return back()->with("msg", Lang::get('Wishlist created Successfully'));
    }
    public function save($id)
    {
        $idUser = auth()->id();
        $idWishlist = Wishlist::findOrFail($idUser);
        $productWishList = new Productwishlist();
        $productWishList->setWishListId($idUser);
        $productWishList->setProductId($id);
        $productWishList->save();
        return view('wishlist.save');
    }
    public function destroy($id)
    {
        Productwishlist::destroy($id);
        return view('wishlist.delete');
    }
}

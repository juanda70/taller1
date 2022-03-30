<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public static function validate($request){
        $request->validate([
            "user_id" => "required|numeric"
        ]);
    }
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function ProductWishList(){
        return $this->hasMany(Productwishlist::class);
    }

    public function getProductWishList(){
        return $this->productWishList;
    }

    public function setProductWishList($productWishList){
        $this->productWishList = $productWishList;
    }
    public function getProductWishListId(){
        return $this->productWishList_id;
    }

    public function setProductWishListId($productWishList){
        $this->productWishList_id = $productWishList;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getUserId()
    {
        return $this->breed_id;
    }
    public function setUserId($user_id)
    {
        return $this->user_id = $user_id;
    }
}

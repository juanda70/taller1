<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productwishlist extends Model
{
    use HasFactory;
    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }
    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt){
        $this->attributes['created_at'] = $createdAt;
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
    
    public function getProduct(){
        return $this->product;
    }

    public function setProduct($product){
        $this->product = $product;
    }
    public function getProductId(){
        return $this->attributes['product_id'];
    }

    public function setProductId($productId){
        $this->attributes['product_id'] = $productId;
    }
    public function wishList(){
        return $this->belongsTo(Wishlist::class);
    }
    
    public function getWishList(){
        return $this->product;
    }

    public function setWishList($product){
        $this->product = $product;
    }
    public function getWishListId(){
        return $this->attributes['WishList_id'];
    }

    public function setWishListId($WishListId){
        $this->attributes['WishList_id'] = $WishListId;
    }
}

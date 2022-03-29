<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productwhislist extends Model
{
    
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
    public function whislist(){
        return $this->belongsTo(whislist::class);
    }
    
    public function getWhisList(){
        return $this->product;
    }

    public function setWhisList($product){
        $this->product = $product;
    }
    public function getWhisListId(){
        return $this->attributes['WhisList_id'];
    }

    public function setWhisListId($WhisListId){
        $this->attributes['WhisList_id'] = $WhisListId;
    }
}

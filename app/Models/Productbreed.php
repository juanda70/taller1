<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productbreed extends Model
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
    public function breed(){
        return $this->belongsTo(Breed::class);
    }
    public function getBreedId()
    {
        return $this->breed_id;
    }
    public function setBreedId($breed_id)
    {
        return $this->breed_id = $breed_id;
    }

}
